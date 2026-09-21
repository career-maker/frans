<?php
/**
 * Performance layer: server rules, compression, WebP delivery, responsive
 * upload images, critical CSS and self-hosted font wiring.
 *
 * @package Franciscan_Society
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/** Bump to make every site re-write its .htaccess block on the next request. */
define( 'FRANCISCAN_PERF_VERSION', '4' );

/* -------------------------------------------------------------------------
 * 1. Apache rules: gzip + long-lived caching for static assets.
 *
 * The site's .htaccess is not part of the git deploy (it is server specific),
 * so the theme maintains its own marker block the first time it runs.
 * Every directive is wrapped in <IfModule>, so a host without the module just
 * ignores it.
 * ---------------------------------------------------------------------- */
function franciscan_htaccess_rules() {
    return array(
        '<IfModule mod_mime.c>',
        '  AddType font/woff2 .woff2',
        '  AddType image/webp .webp',
        '  AddType image/avif .avif',
        '  AddType video/mp4 .mp4',
        '</IfModule>',
        '<IfModule mod_deflate.c>',
        '  <IfModule mod_filter.c>',
        '    AddOutputFilterByType DEFLATE text/html text/plain text/css text/xml text/javascript',
        '    AddOutputFilterByType DEFLATE application/javascript application/x-javascript application/json',
        '    AddOutputFilterByType DEFLATE application/xml application/xhtml+xml application/rss+xml',
        '    AddOutputFilterByType DEFLATE image/svg+xml font/ttf font/otf application/vnd.ms-fontobject',
        '  </IfModule>',
        '</IfModule>',
        '<IfModule mod_expires.c>',
        '  ExpiresActive On',
        '  ExpiresByType text/css "access plus 1 year"',
        '  ExpiresByType text/javascript "access plus 1 year"',
        '  ExpiresByType application/javascript "access plus 1 year"',
        '  ExpiresByType application/x-javascript "access plus 1 year"',
        '  ExpiresByType image/jpeg "access plus 1 year"',
        '  ExpiresByType image/png "access plus 1 year"',
        '  ExpiresByType image/gif "access plus 1 year"',
        '  ExpiresByType image/webp "access plus 1 year"',
        '  ExpiresByType image/avif "access plus 1 year"',
        '  ExpiresByType image/svg+xml "access plus 1 year"',
        '  ExpiresByType image/x-icon "access plus 1 year"',
        '  ExpiresByType image/vnd.microsoft.icon "access plus 1 year"',
        '  ExpiresByType video/mp4 "access plus 1 year"',
        '  ExpiresByType video/webm "access plus 1 year"',
        '  ExpiresByType audio/mpeg "access plus 1 year"',
        '  ExpiresByType font/woff2 "access plus 1 year"',
        '  ExpiresByType font/woff "access plus 1 year"',
        '  ExpiresByType font/ttf "access plus 1 year"',
        '  ExpiresByType application/pdf "access plus 1 month"',
        '</IfModule>',
        '<IfModule mod_headers.c>',
        '  <FilesMatch "\.(css|js|woff2?|ttf|otf|svg|webp|avif|png|jpe?g|gif|ico|mp4|webm|mp3)$">',
        '    Header set Cache-Control "public, max-age=31536000"',
        '  </FilesMatch>',
        '</IfModule>',
    );
}

function franciscan_maybe_write_htaccess() {
    if ( FRANCISCAN_PERF_VERSION === get_option( 'franciscan_perf_htaccess' ) ) {
        return;
    }
    global $is_apache;
    if ( ! $is_apache || is_multisite() ) {
        return;
    }
    // Record the attempt first: a read-only file system (or the loopback check below, which is itself a
    // request) must not retry on every page load.
    update_option( 'franciscan_perf_htaccess', FRANCISCAN_PERF_VERSION );

    $file = ABSPATH . '.htaccess';
    $ok   = false;
    if ( ( file_exists( $file ) && is_writable( $file ) ) || ( ! file_exists( $file ) && is_writable( ABSPATH ) ) ) {
        if ( ! function_exists( 'insert_with_markers' ) ) {
            require_once ABSPATH . 'wp-admin/includes/misc.php';
        }
        $ok = insert_with_markers( $file, 'Franciscan Performance', franciscan_htaccess_rules() );
        if ( $ok ) {
            // Safety net: if the server rejects the new rules (HTTP 5xx), take them out again immediately.
            $probe = wp_remote_get( add_query_arg( 'fs_htaccess_probe', time(), home_url( '/' ) ), array( 'timeout' => 8, 'redirection' => 0, 'sslverify' => false ) );
            if ( ! is_wp_error( $probe ) && (int) wp_remote_retrieve_response_code( $probe ) >= 500 ) {
                insert_with_markers( $file, 'Franciscan Performance', array() );
                $ok = false;
            }
        }
    }
    update_option( 'franciscan_perf_htaccess_ok', $ok ? '1' : '0' );
}
add_action( 'init', 'franciscan_maybe_write_htaccess', 20 );

/* -------------------------------------------------------------------------
 * 2. Compress the HTML document when the web server does not.
 *    (Static files are covered by the .htaccess block above.)
 * ---------------------------------------------------------------------- */
function franciscan_enable_html_compression() {
    if ( is_admin() || headers_sent() || ! extension_loaded( 'zlib' ) || ini_get( 'zlib.output_compression' ) ) {
        return;
    }
    foreach ( ob_list_handlers() as $handler ) {
        if ( false !== stripos( $handler, 'gzhandler' ) || false !== stripos( $handler, 'zlib' ) ) {
            return;
        }
    }
    @ini_set( 'zlib.output_compression', 'On' );
    @ini_set( 'zlib.output_compression_level', '6' );
}
add_action( 'template_redirect', 'franciscan_enable_html_compression', 0 );

/* -------------------------------------------------------------------------
 * 3. Output filter: serve .webp siblings of theme images, load Malayalam
 *    web fonts only on pages that actually contain Malayalam text.
 * ---------------------------------------------------------------------- */
function franciscan_start_output_filter() {
    if ( is_admin() || is_feed() || is_robots() || is_trackback() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) || isset( $_GET['fs_raw'] ) ) {
        return;
    }
    ob_start( 'franciscan_filter_html' );
}
add_action( 'template_redirect', 'franciscan_start_output_filter', 1 );

function franciscan_filter_html( $html ) {
    if ( strlen( $html ) < 512 || false === stripos( $html, '<html' ) ) {
        return $html;
    }
    try {
        $out = franciscan_swap_webp( $html );
        $out = franciscan_inject_malayalam_fonts( $out );
        if ( is_front_page() ) {
            $out = franciscan_defer_lazy_images( $out );
        }
        if ( ! is_string( $out ) || '' === $out ) {
            return $html;
        }
        franciscan_maybe_store_page_cache( $out );
        return $out;
    } catch ( \Throwable $e ) {
        return $html;
    }
}

function franciscan_swap_webp( $html ) {
    static $exists = array();
    $dir    = FRANCISCAN_THEME_DIR . '/assets/images/';
    $mobile = wp_is_mobile();
    $stash  = array();

    // Social / SEO metadata must keep pointing at the original JPEG/PNG.
    $protected = '~<meta\b[^>]*>|<script\b[^>]*type=["\']application/ld\+json["\'][^>]*>.*?</script>|<link\b[^>]*rel=["\'](?:canonical|alternate|shortlink|icon|shortcut icon|apple-touch-icon)["\'][^>]*>~is';
    $work = preg_replace_callback(
        $protected,
        function ( $m ) use ( &$stash ) {
            $key           = '<!--fs-keep-' . count( $stash ) . '-->';
            $stash[ $key ] = $m[0];
            return $key;
        },
        $html
    );
    if ( null === $work ) {
        return $html;
    }

    $swapped = preg_replace_callback(
        '~assets/images/([^"\'<>]*?)\.(png|jpe?g)(?=["\'<>)\s?#&,]|$)~i',
        function ( $m ) use ( $dir, $mobile, &$exists ) {
            $base = rawurldecode( html_entity_decode( $m[1], ENT_QUOTES ) );
            if ( ! isset( $exists[ $base ] ) ) {
                // 0 = no WebP, 1 = WebP, 2 = WebP plus a 900px "-sm" rendition for phones
                $exists[ $base ] = 0;
                if ( false === strpos( $base, '..' ) && is_file( $dir . $base . '.webp' ) ) {
                    $exists[ $base ] = is_file( $dir . $base . '-sm.webp' ) ? 2 : 1;
                }
            }
            if ( ! $exists[ $base ] ) {
                return $m[0];
            }
            return 'assets/images/' . $m[1] . ( $mobile && 2 === $exists[ $base ] ? '-sm.webp' : '.webp' );
        },
        $work
    );
    if ( null === $swapped ) {
        return $html;
    }

    return $stash ? strtr( $swapped, $stash ) : $swapped;
}

/**
 * Native loading="lazy" still fetches every image within ~1250px of the viewport straight away, which on a
 * phone is most of the home page. Images marked lazy are therefore parked in data-fs-src / data-fs-srcset
 * and attached by an IntersectionObserver (assets/js/main.js) when they are 150px from the viewport, so
 * nothing but the first screen competes with the first paint. A <noscript> copy keeps them visible without JS.
 */
function franciscan_defer_lazy_images( $html ) {
    // Never touch markup that lives inside <script> (JS template strings), <style> or <noscript>.
    $stash = array();
    $work  = preg_replace_callback(
        '~<(script|style|noscript)\b[^>]*>.*?</\1>~is',
        function ( $m ) use ( &$stash ) {
            $key           = '<!--fs-skip-' . count( $stash ) . '-->';
            $stash[ $key ] = $m[0];
            return $key;
        },
        $html
    );
    if ( null === $work ) {
        return $html;
    }

    $out = preg_replace_callback(
        '~<img\b((?:[^>"\']|"[^"]*"|\'[^\']*\')*)>~i',
        function ( $m ) {
            $attrs = $m[1];
            if ( ! preg_match( '~\bloading\s*=\s*(["\'])lazy\1~i', $attrs ) || false !== strpos( $attrs, 'data-fs-src' ) ) {
                return $m[0];
            }
            if ( ! preg_match( '~(?<![\w-])src\s*=\s*(["\'])(.*?)\1~is', $attrs, $src ) ) {
                return $m[0];
            }
            if ( 0 === strpos( $src[2], 'data:' ) ) {
                return $m[0];
            }
            $w = preg_match( '~(?<![\w-])width\s*=\s*["\']?(\d+)~i', $attrs, $wm ) ? (int) $wm[1] : 0;
            $h = preg_match( '~(?<![\w-])height\s*=\s*["\']?(\d+)~i', $attrs, $hm ) ? (int) $hm[1] : 0;
            $placeholder = 'data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 ' . ( $w ? $w : 1 ) . ' ' . ( $h ? $h : 1 ) . '%27%3E%3C/svg%3E';

            $new = preg_replace( '~(?<![\w-])src\s*=\s*(["\'])(.*?)\1~is', 'src="' . $placeholder . '" data-fs-src=$1$2$1', $attrs, 1 );
            $new = preg_replace( '~(?<![\w-])srcset\s*=\s*(["\'])(.*?)\1~is', 'data-fs-srcset=$1$2$1', $new, 1 );
            if ( null === $new ) {
                return $m[0];
            }
            return '<img' . $new . '><noscript>' . $m[0] . '</noscript>';
        },
        $work
    );
    if ( null === $out ) {
        return $html;
    }
    return $stash ? strtr( $out, $stash ) : $out;
}

function franciscan_inject_malayalam_fonts( $html ) {
    if ( ! preg_match( '/[\x{0D00}-\x{0D7F}]/u', $html ) ) {
        return $html;
    }
    $href = 'https://fonts.googleapis.com/css2?family=Anek+Malayalam:wght@400;500;600;700;800&family=Gayathri:wght@400;700&family=Manjari:wght@400;700&family=Noto+Sans+Malayalam:wght@300;400;500;600;700;800&display=swap';
    $tag  = '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'
        . '<link rel="stylesheet" href="' . esc_url( $href ) . '" media="print" onload="this.media=\'all\';this.onload=null">'
        . '<noscript><link rel="stylesheet" href="' . esc_url( $href ) . '"></noscript>';
    return preg_replace( '~</head>~i', $tag . '</head>', $html, 1 );
}

/* -------------------------------------------------------------------------
 * 4. Responsive attributes for images stored in the media library.
 *    Returns ' srcset=".." sizes=".." width=".." height=".."' (or '').
 * ---------------------------------------------------------------------- */
function franciscan_responsive_attrs( $url, $sizes = '100vw' ) {
    $url = (string) $url;
    if ( '' === $url || false === strpos( $url, '/wp-content/uploads/' ) ) {
        return '';
    }
    $key  = 'fsri_' . md5( $url );
    $data = get_transient( $key );
    if ( false === $data ) {
        $data = array();
        $id   = attachment_url_to_postid( $url );
        if ( $id ) {
            $meta = wp_get_attachment_metadata( $id );
            if ( ! empty( $meta['width'] ) && ! empty( $meta['height'] ) ) {
                $srcset = wp_calculate_image_srcset( array( (int) $meta['width'], (int) $meta['height'] ), $url, $meta, $id );
                $data   = array(
                    'srcset' => $srcset ? $srcset : '',
                    'w'      => (int) $meta['width'],
                    'h'      => (int) $meta['height'],
                );
            }
        }
        set_transient( $key, $data, DAY_IN_SECONDS );
    }
    if ( empty( $data ) ) {
        return '';
    }
    $out = '';
    if ( ! empty( $data['srcset'] ) ) {
        $out .= ' srcset="' . esc_attr( $data['srcset'] ) . '" sizes="' . esc_attr( $sizes ) . '"';
    }
    return $out . ' width="' . (int) $data['w'] . '" height="' . (int) $data['h'] . '"';
}

/**
 * URL of a smaller registered size of an uploaded image (e.g. 'large' = 1024px), or the original URL when
 * the file is not a media-library attachment.
 */
function franciscan_upload_size_url( $url, $size = 'large' ) {
    $url = (string) $url;
    if ( '' === $url || false === strpos( $url, '/wp-content/uploads/' ) ) {
        return $url;
    }
    $key    = 'fsus_' . md5( $url . $size );
    $cached = get_transient( $key );
    if ( false === $cached ) {
        $cached = '';
        $id     = attachment_url_to_postid( $url );
        if ( $id ) {
            $src = wp_get_attachment_image_src( $id, $size );
            if ( $src && ! empty( $src[0] ) ) {
                $cached = $src[0];
            }
        }
        set_transient( $key, $cached, DAY_IN_SECONDS );
    }
    return $cached ? $cached : $url;
}

/* -------------------------------------------------------------------------
 * 5. Critical CSS (inlined) + full stylesheet loaded without blocking render.
 *    Files are produced by tools/build-critical.mjs.
 * ---------------------------------------------------------------------- */
function franciscan_critical_css_path() {
    if ( isset( $_GET['fs_nocritical'] ) ) {
        return '';
    }
    $name = '';
    if ( is_front_page() ) {
        $name = 'critical-home.css';
    }
    if ( '' === $name ) {
        return '';
    }
    $file = FRANCISCAN_THEME_DIR . '/assets/css/' . $name;
    return is_file( $file ) ? $file : '';
}

function franciscan_print_critical_css() {
    $file = franciscan_critical_css_path();
    if ( ! $file ) {
        return;
    }
    $css = file_get_contents( $file );
    if ( false === $css || '' === $css ) {
        return;
    }
    $css = str_replace( '{{T}}', FRANCISCAN_THEME_URI . '/assets', $css );
    echo '<style id="fs-critical">' . $css . "</style>\n"; // phpcs:ignore WordPress.Security.EscapeOutput
}
add_action( 'wp_head', 'franciscan_print_critical_css', 7 );

/**
 * When critical CSS is inlined, the full stylesheet is not needed for the first paint. It is attached after the
 * load event, or on the first user input (hover / menu / scroll states live only in the full sheet), so its
 * download and parse never sit in front of the Largest Contentful Paint. <noscript> keeps it for no-JS clients.
 */
function franciscan_async_stylesheet( $tag, $handle, $href ) {
    if ( 'franciscan-theme' !== $handle || ! franciscan_critical_css_path() ) {
        return $tag;
    }
    $loader = '(function(){var d=0;function l(){if(d)return;d=1;var k=document.createElement("link");k.rel="stylesheet";k.id="franciscan-theme-css";k.href=' . wp_json_encode( $href ) . ';document.head.appendChild(k)}'
        . 'addEventListener("load",l);["pointerdown","touchstart","keydown","scroll","wheel","mousemove"].forEach(function(e){addEventListener(e,l,{once:true,passive:true})})})();';
    return '<script>' . $loader . "</script>\n"
        . '<noscript><link rel="stylesheet" href="' . esc_url( $href ) . '"></noscript>' . "\n";
}
add_filter( 'style_loader_tag', 'franciscan_async_stylesheet', 10, 3 );

/** Preload the two fonts every page paints with. */
function franciscan_preload_fonts() {
    foreach ( array( 'phudu-normal-400-900-latin.woff2', 'instrument-sans-normal-400-700-latin.woff2' ) as $font ) {
        if ( is_file( FRANCISCAN_THEME_DIR . '/assets/fonts/' . $font ) ) {
            echo '<link rel="preload" href="' . esc_url( FRANCISCAN_THEME_URI . '/assets/fonts/' . $font ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
        }
    }
}
add_action( 'wp_head', 'franciscan_preload_fonts', 2 );

/* -------------------------------------------------------------------------
 * 6. Full-page cache for anonymous visitors.
 *
 * Rendering a page through WordPress + the theme options costs 200-800 ms of server time on shared
 * hosting, which is added to every metric (FCP/LCP) of a first visit. Finished HTML is stored as a
 * file and served straight from theme load, before the main query and template run.
 *
 * Only plain GET requests without a query string and without login / comment / password cookies are
 * cached. The cache is emptied whenever content, menus, widgets or theme options change, when the
 * theme's own files change (deploy), and it expires after FRANCISCAN_PAGE_CACHE_TTL.
 * Append any query string (e.g. ?fs_nocache=1) to bypass it; responses carry an X-FS-Cache header.
 * ---------------------------------------------------------------------- */
define( 'FRANCISCAN_PAGE_CACHE_TTL', HOUR_IN_SECONDS );

function franciscan_page_cache_dir() {
    return WP_CONTENT_DIR . '/cache/franciscan-pages/';
}

/** Changes whenever a template / script / stylesheet that shapes the HTML is deployed. */
function franciscan_page_cache_signature() {
    static $sig = null;
    if ( null !== $sig ) {
        return $sig;
    }
    $dir   = get_template_directory();
    $files = array( 'functions.php', 'header.php', 'footer.php', 'front-page.php', 'page.php', 'single.php', 'inc/performance.php', 'inc/setup.php', 'assets/css/theme.min.css', 'assets/css/critical-home.css', 'assets/js/main.js' );
    $sig   = FRANCISCAN_THEME_VERSION;
    foreach ( $files as $f ) {
        $sig .= '|' . (int) @filemtime( $dir . '/' . $f );
    }
    $tpl = glob( $dir . '/page-templates/*.php' );
    if ( $tpl ) {
        $sig .= '|' . max( array_map( 'filemtime', $tpl ) );
    }
    $sig = md5( $sig );
    return $sig;
}

function franciscan_page_cache_file() {
    $host   = isset( $_SERVER['HTTP_HOST'] ) ? strtolower( (string) $_SERVER['HTTP_HOST'] ) : '';
    $uri    = isset( $_SERVER['REQUEST_URI'] ) ? (string) $_SERVER['REQUEST_URI'] : '/';
    $scheme = ( ! empty( $_SERVER['HTTPS'] ) && 'off' !== $_SERVER['HTTPS'] ) ? 'https' : 'http';
    // Phones get smaller image renditions, so they are cached separately from desktops.
    $device = wp_is_mobile() ? 'm' : 'd';
    return franciscan_page_cache_dir() . md5( $scheme . '://' . $host . $uri . '|' . $device . '|' . franciscan_page_cache_signature() ) . '.html';
}

function franciscan_page_cache_bypass() {
    if ( ! isset( $_SERVER['REQUEST_METHOD'] ) || 'GET' !== $_SERVER['REQUEST_METHOD'] ) {
        return true;
    }
    if ( ! empty( $_SERVER['QUERY_STRING'] ) ) {
        return true;
    }
    if ( defined( 'WP_ADMIN' ) || defined( 'DOING_AJAX' ) || defined( 'DOING_CRON' ) || defined( 'XMLRPC_REQUEST' ) || defined( 'WP_INSTALLING' ) ) {
        return true;
    }
    foreach ( array_keys( $_COOKIE ) as $name ) {
        if ( 0 === strpos( $name, 'wordpress_logged_in_' ) || 0 === strpos( $name, 'wp-postpass_' ) || 0 === strpos( $name, 'comment_author_' ) || 'wordpress_no_cache' === $name ) {
            return true;
        }
    }
    return false;
}

/** Serve a cached copy (if any) and stop. Runs as soon as the theme is loaded. */
function franciscan_serve_cached_page() {
    if ( PHP_SAPI === 'cli' || franciscan_page_cache_bypass() || headers_sent() ) {
        return;
    }
    $file = franciscan_page_cache_file();
    if ( ! is_file( $file ) || ( time() - (int) filemtime( $file ) ) > FRANCISCAN_PAGE_CACHE_TTL ) {
        return;
    }
    if ( extension_loaded( 'zlib' ) && ! ini_get( 'zlib.output_compression' ) ) {
        @ini_set( 'zlib.output_compression', 'On' );
        @ini_set( 'zlib.output_compression_level', '6' );
    }
    header( 'Content-Type: text/html; charset=UTF-8' );
    header( 'X-FS-Cache: HIT' );
    if ( function_exists( 'franciscan_send_security_headers' ) ) { // normally added on send_headers, which a cache hit skips
        franciscan_send_security_headers();
    }
    readfile( $file );
    exit;
}
franciscan_serve_cached_page();

function franciscan_maybe_store_page_cache( $html ) {
    if ( ! headers_sent() ) {
        header( 'X-FS-Cache: MISS' );
    }
    if ( franciscan_page_cache_bypass() || is_user_logged_in() || is_search() || is_404() || is_preview() || is_customize_preview() || is_feed() ) {
        return;
    }
    if ( ! ( is_front_page() || is_home() || is_singular() || is_archive() ) || ( is_singular() && post_password_required() ) ) {
        return;
    }
    if ( 200 !== http_response_code() || false === strpos( $html, '</html>' ) ) {
        return;
    }
    $dir = franciscan_page_cache_dir();
    if ( ! is_dir( $dir ) ) {
        wp_mkdir_p( $dir );
        @file_put_contents( $dir . 'index.php', "<?php // Silence is golden.\n" );
    }
    if ( ! is_dir( $dir ) || ! is_writable( $dir ) ) {
        return;
    }
    $file = franciscan_page_cache_file();
    $tmp  = $file . '.' . uniqid( '', true ) . '.tmp';
    if ( false !== @file_put_contents( $tmp, $html, LOCK_EX ) ) {
        if ( ! @rename( $tmp, $file ) ) {
            @unlink( $tmp );
        }
    }

    // Now and then drop copies nobody can be served any more (expired, or written before a deploy).
    if ( 1 === wp_rand( 1, 40 ) ) {
        foreach ( (array) glob( $dir . '*.html' ) as $old ) {
            if ( filemtime( $old ) < time() - 2 * FRANCISCAN_PAGE_CACHE_TTL ) {
                @unlink( $old );
            }
        }
    }
}

function franciscan_purge_page_cache() {
    $files = glob( franciscan_page_cache_dir() . '*.html' );
    if ( $files ) {
        foreach ( $files as $f ) {
            @unlink( $f );
        }
    }
}
foreach ( array( 'save_post', 'deleted_post', 'trashed_post', 'edit_attachment', 'delete_attachment', 'wp_update_nav_menu', 'wp_update_nav_menu_item', 'wp_delete_nav_menu', 'created_term', 'edited_term', 'delete_term', 'switch_theme', 'customize_save_after', 'upgrader_process_complete' ) as $franciscan_purge_hook ) {
    add_action( $franciscan_purge_hook, 'franciscan_purge_page_cache' );
}
unset( $franciscan_purge_hook );

/** Theme options (Franciscan Studio) and the handful of core options that change what a page shows. */
function franciscan_purge_page_cache_on_option( $option ) {
    if ( preg_match( '/^(franciscan_(?!perf)|theme_mods_|blogname$|blogdescription$|permalink_structure$|show_on_front$|page_on_front$|page_for_posts$|site_icon$|home$|siteurl$|nav_menu_options$|sidebars_widgets$|widget_)/', (string) $option ) ) {
        franciscan_purge_page_cache();
    }
}
foreach ( array( 'added_option', 'updated_option', 'deleted_option' ) as $franciscan_purge_hook ) {
    add_action( $franciscan_purge_hook, 'franciscan_purge_page_cache_on_option' );
}
unset( $franciscan_purge_hook );
