<?php
/**
 * Theme Setup and Asset Enqueuing
 *
 * @package Franciscan_Society
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function franciscan_theme_setup() {
    // Enable dynamic document title
    add_theme_support( 'title-tag' );

    // Enable Featured Images
    add_theme_support( 'post-thumbnails' );

    // HTML5 markup support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Custom Logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Register Navigation Menus
    register_nav_menus( array(
        'primary_menu'        => __( 'Primary Navigation Menu', 'franciscan-society' ),
        'footer_quick_links'  => __( 'Footer Quick Links', 'franciscan-society' ),
        'footer_services'     => __( 'Footer Services Links', 'franciscan-society' ),
    ) );
}
add_action( 'after_setup_theme', 'franciscan_theme_setup' );

function franciscan_enqueue_assets() {
    // 1. Optimized Google Fonts (Essential weights only with font-display: swap)
    wp_enqueue_style(
        'franciscan-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,400&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Phudu:wght@500;600;700;800&display=swap',
        array(),
        null
    );

    // 2. Design System & Theme Styles
    $theme_ver   = FRANCISCAN_THEME_VERSION;
    $styles_file = FRANCISCAN_THEME_DIR . '/assets/css/styles.css';
    if ( file_exists( $styles_file ) ) {
        $theme_ver .= '.' . filemtime( $styles_file );
    }

    wp_enqueue_style(
        'franciscan-design-system',
        FRANCISCAN_THEME_URI . '/assets/css/design-system.css',
        array(),
        $theme_ver
    );

    wp_enqueue_style(
        'franciscan-main-styles',
        FRANCISCAN_THEME_URI . '/assets/css/styles.css',
        array( 'franciscan-design-system' ),
        $theme_ver
    );

    wp_enqueue_style(
        'franciscan-bible-widget-style',
        FRANCISCAN_THEME_URI . '/assets/css/bible-widget.css',
        array(),
        $theme_ver
    );

    // 3. GSAP & ScrollTrigger
    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        array(),
        '3.12.5',
        true
    );

    wp_enqueue_script(
        'gsap-scroll-trigger',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
        array( 'gsap' ),
        '3.12.5',
        true
    );

    // 4. DotLottie Web Component
    wp_enqueue_script(
        'dotlottie-wc',
        'https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.4/dist/dotlottie-wc.js',
        array(),
        '0.9.4',
        array( 'strategy' => 'defer', 'in_footer' => true )
    );

    // 5. Custom JS Modules
    wp_enqueue_script(
        'franciscan-animations',
        FRANCISCAN_THEME_URI . '/assets/js/animations.js',
        array( 'gsap', 'gsap-scroll-trigger' ),
        FRANCISCAN_THEME_VERSION,
        true
    );

    wp_enqueue_script(
        'franciscan-bible-widget',
        FRANCISCAN_THEME_URI . '/assets/js/bible-widget.js',
        array(),
        FRANCISCAN_THEME_VERSION,
        true
    );

    wp_enqueue_script(
        'franciscan-main-js',
        FRANCISCAN_THEME_URI . '/assets/js/main.js',
        array( 'gsap' ),
        FRANCISCAN_THEME_VERSION,
        true
    );

    // Pass AJAX and localized variables
    wp_enqueue_script(
        'franciscan-form-validator',
        FRANCISCAN_THEME_URI . '/assets/js/form-validator.js',
        array(),
        FRANCISCAN_THEME_VERSION,
        true
    );

    wp_localize_script( 'franciscan-main-js', 'franciscan_ajax', array(
        'ajax_url'   => admin_url( 'admin-ajax.php' ),
        'nonce'      => wp_create_nonce( 'franciscan_nonce' ),
        'theme_uri'  => FRANCISCAN_THEME_URI,
        'site_url'   => home_url( '/' ),
        'recaptcha_site_key' => function_exists( 'franciscan_get_option' ) ? franciscan_get_option( 'recaptcha_site_key', '' ) : '',
    ) );
    wp_localize_script( 'franciscan-form-validator', 'franciscan_ajax', array(
        'ajax_url'   => admin_url( 'admin-ajax.php' ),
        'nonce'      => wp_create_nonce( 'franciscan_nonce' ),
        'theme_uri'  => FRANCISCAN_THEME_URI,
        'site_url'   => home_url( '/' ),
        'recaptcha_site_key' => function_exists( 'franciscan_get_option' ) ? franciscan_get_option( 'recaptcha_site_key', '' ) : '',
    ) );
}
add_action( 'wp_enqueue_scripts', 'franciscan_enqueue_assets' );

// High-performance Script Loader Filter (defer non-critical JS)
function franciscan_defer_scripts( $tag, $handle, $src ) {
    if ( is_admin() ) {
        return $tag;
    }
    if ( 'dotlottie-wc' === $handle ) {
        return '<script type="module" src="' . esc_url( $src ) . '"></script>';
    }
    $defer_handles = array(
        'gsap',
        'gsap-scroll-trigger',
        'franciscan-animations',
        'franciscan-bible-widget',
        'franciscan-main-js',
        'franciscan-form-validator',
    );
    if ( in_array( $handle, $defer_handles, true ) ) {
        if ( false === strpos( $tag, 'defer' ) ) {
            $tag = str_replace( ' src=', ' defer src=', $tag );
        }
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'franciscan_defer_scripts', 10, 3 );

// Dequeue unused Gutenberg & Block styles to eliminate render-blocking CSS
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
    wp_dequeue_style( 'classic-theme-styles' );
}, 100 );

// Disable core emoji scripts and styles for instant FCP
add_action( 'init', function() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
} );

// High-speed Resource Hints for early DNS resolution & TLS handshakes
add_filter( 'wp_resource_hints', function( $hints, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $hints[] = array(
            'href'        => 'https://fonts.googleapis.com',
            'crossorigin' => 'use-credentials',
        );
        $hints[] = array(
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => '',
        );
        $hints[] = array(
            'href'        => 'https://cdnjs.cloudflare.com',
            'crossorigin' => '',
        );
    }
    return $hints;
}, 10, 2 );

// Remove static asset query strings for better CDN / proxy caching (preserve theme assets for cache busting)
function franciscan_remove_ver_query_args( $src ) {
    if ( ! is_admin() && strpos( $src, '?ver=' ) ) {
        if ( false !== strpos( $src, 'themes/franciscan-society' ) ) {
            return $src;
        }
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'style_loader_src', 'franciscan_remove_ver_query_args', 15, 1 );
add_filter( 'script_loader_src', 'franciscan_remove_ver_query_args', 15, 1 );


/**
 * Redirect legacy detail URLs to dynamic post permalinks
 */
add_action( 'template_redirect', function() {
    $uri = $_SERVER['REQUEST_URI'] ?? '';
    $map = array(
        'news-detail-1.html'  => 42,
        'news-detail-2.html'  => 43,
        'news-detail-3.html'  => 44,
        'news-detail-4.html'  => 45,
        'news-detail-5.html'  => 46,
        'news-detail-6.html'  => 47,
        'news-detail.html'    => 42,
        'blogs-detail-1.html' => 48,
        'blogs-detail-2.html' => 49,
        'blogs-detail-3.html' => 50,
        'blogs-detail-4.html' => 51,
        'blogs-detail-5.html' => 52,
        'blogs-detail-6.html' => 53,
        'blogs-detail.html'   => 48,
    );
    foreach ( $map as $file => $post_id ) {
        if ( strpos( $uri, $file ) !== false ) {
            $target = get_permalink( $post_id );
            if ( $target ) {
                wp_redirect( $target, 301 );
                exit;
            }
        }
    }
} );


/**
 * Universal Favicon for Frontend, WP Admin, and Franciscan Studio Custom Dashboard.
 */
function franciscan_render_universal_favicon() {
    $custom_icon = function_exists( 'get_site_icon_url' ) ? get_site_icon_url( 64 ) : '';
    $favicon_url = ! empty( $custom_icon ) ? $custom_icon : FRANCISCAN_THEME_URI . '/assets/images/logo.svg';
    ?>
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( $favicon_url ); ?>" />
    <link rel="alternate icon" href="<?php echo esc_url( $favicon_url ); ?>" />
    <link rel="apple-touch-icon" href="<?php echo esc_url( $favicon_url ); ?>" />
    <?php
}
add_action( 'wp_head', 'franciscan_render_universal_favicon', 1 );
add_action( 'admin_head', 'franciscan_render_universal_favicon', 1 );
add_action( 'login_head', 'franciscan_render_universal_favicon', 1 );



/**
 * Automatically route all WordPress outgoing emails through Gmail App Password / SMTP
 */
function franciscan_configure_smtp_phpmailer( $phpmailer ) {
    $smtp_email = franciscan_get_option( 'smtp_email', 'sectorranchi09@gmail.com' );
    $smtp_pass  = str_replace( ' ', '', (string) franciscan_get_option( 'smtp_app_password', 'jvvb fhvb xods okst' ) );
    $smtp_enabled = franciscan_get_option( 'smtp_enabled', '1' );

    // If credentials are present, route email through authenticated SMTP
    if ( $smtp_enabled !== '0' || ( ! empty( $smtp_email ) && ! empty( $smtp_pass ) ) ) {
        if ( ! empty( $smtp_email ) && ! empty( $smtp_pass ) ) {
            $phpmailer->isSMTP();
            $phpmailer->Host          = franciscan_get_option( 'smtp_host', 'smtp.gmail.com' );
            $phpmailer->SMTPAuth      = true;
            $phpmailer->Port          = intval( franciscan_get_option( 'smtp_port', 587 ) );
            $phpmailer->Username      = $smtp_email;
            $phpmailer->Password      = $smtp_pass;
            $phpmailer->SMTPSecure    = franciscan_get_option( 'smtp_encryption', 'tls' );
            $phpmailer->From          = $smtp_email;
            $phpmailer->FromName      = franciscan_get_option( 'smtp_from_name', 'Franciscan Society Ranchi Province' );
            
            // Connection & timeout configuration
            $phpmailer->Timeout       = 15;
            $phpmailer->Timelimit     = 15;
            $phpmailer->SMTPAutoTLS   = true;
            $phpmailer->SMTPKeepAlive = false;
            $phpmailer->SMTPOptions   = array(
                'ssl' => array(
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ),
            );
        }
    }
}
add_action( 'phpmailer_init', 'franciscan_configure_smtp_phpmailer' );


/**
 * Register Custom Article Header Banner Image Meta Box for Single Posts
 */
function franciscan_register_post_banner_metabox() {
    add_meta_box(
        'franciscan_post_banner_box',
        '? Article Header Banner Image (Overrides Default)',
        'franciscan_render_post_banner_metabox',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'franciscan_register_post_banner_metabox' );

function franciscan_render_post_banner_metabox( $post ) {
    wp_nonce_field( 'franciscan_post_banner_nonce', 'franciscan_banner_nonce' );
    $banner_img = get_post_meta( $post->ID, '_franciscan_banner_image', true );
    ?>
    <div style="padding: 10px 0;">
        <p style="margin-bottom: 8px; color: #666;">Choose a custom hero banner image for this article. If left blank, the global banner from Franciscan Studio will be displayed.</p>
        <div style="display: flex; gap: 10px; align-items: center;">
            <input type="text" name="franciscan_banner_image" id="franciscan_banner_image_input" value="<?php echo esc_attr( $banner_img ); ?>" style="width: 70%;" placeholder="https://... or click Choose Image" />
            <button type="button" class="button button-secondary" id="franciscan_banner_upload_btn">Upload / Select Image</button>
            <?php if ( ! empty( $banner_img ) ) : ?>
                <button type="button" class="button" id="franciscan_banner_clear_btn" onclick="document.getElementById('franciscan_banner_image_input').value=''; document.getElementById('franciscan_banner_preview').style.display='none';">Clear</button>
            <?php endif; ?>
        </div>
        <div id="franciscan_banner_preview" style="margin-top: 12px; max-width: 320px; <?php echo empty( $banner_img ) ? 'display:none;' : ''; ?>">
            <img src="<?php echo esc_url( $banner_img ); ?>" style="width: 100%; height: auto; border-radius: 8px; border: 1px solid #ddd;" />
        </div>
    </div>
    <script>
    jQuery(document).ready(function($){
        var frame;
        $('#franciscan_banner_upload_btn').on('click', function(e){
            e.preventDefault();
            if (frame) { frame.open(); return; }
            frame = wp.media({
                title: 'Select Article Banner Image',
                button: { text: 'Use this image' },
                multiple: false
            });
            frame.on('select', function(){
                var attachment = frame.state().get('selection').first().toJSON();
                $('#franciscan_banner_image_input').val(attachment.url);
                $('#franciscan_banner_preview').show().find('img').attr('src', attachment.url);
            });
            frame.open();
        });
    });
    </script>
    <?php
}

function franciscan_save_post_banner_metabox( $post_id ) {
    if ( ! isset( $_POST['franciscan_banner_nonce'] ) || ! wp_verify_nonce( $_POST['franciscan_banner_nonce'], 'franciscan_post_banner_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( isset( $_POST['franciscan_banner_image'] ) ) {
        update_post_meta( $post_id, '_franciscan_banner_image', sanitize_text_field( $_POST['franciscan_banner_image'] ) );
    }
}
add_action( 'save_post', 'franciscan_save_post_banner_metabox' );

/**
 * Automatically clean up unwanted dummy news posts and preserve legitimate news post
 */
function franciscan_cleanup_dummy_news_posts() {
    if ( get_option( 'franciscan_cleaned_dummy_news_v3' ) ) {
        return;
    }

    $unwanted_slugs = array(
        'strengthening-your-faith-through-consistent-daily-prayer-life',
        'trusting-god-fully-during-life-struggles-and-trials',
        'staying-spiritually-strong-through-community-faith-and-fraternity',
        'expanding-franciscan-educational-missions-in-rural-jharkhand',
        'youth-spiritual-retreat-franciscan-fellowship-in-ranchi',
        'solemn-celebration-of-provincial-feast-day-and-jubilees',
    );

    foreach ( $unwanted_slugs as $slug ) {
        $post = get_page_by_path( $slug, OBJECT, 'post' );
        if ( $post ) {
            wp_delete_post( $post->ID, true );
        }
    }

    // Ensure 'News' category exists
    $news_cat = get_term_by( 'slug', 'news', 'category' );
    if ( ! $news_cat ) {
        $cat_id = wp_create_category( 'News' );
    } else {
        $cat_id = $news_cat->term_id;
    }

    // Ensure the legitimate news article exists with rich content
    $legit_slug = 'seminar-on-new-labour-code-held-at-hardag-ranchi';
    $existing = get_page_by_path( $legit_slug, OBJECT, 'post' );
    
    $article_content = '<p>A one-day seminar on <strong>"New Labour Code"</strong> was organized by the St. Francis Province, Ranchi, on 29 August 2026 at Moments Resorts, Hardag, Ranchi. The seminar was attended by around fifty participants. Besides the TOR friars involved in the education ministry, the programme was attended by several principals from different parts of Jharkhand.</p>' . "\n\n" .
        '<p>The programme was graced by the presence of Very Rev. Fr. <strong>Manoj Vengathanam, TOR</strong>, Minister Provincial of Ranchi Province.</p>' . "\n\n" .
        '<p>Mr. <strong>Shammi Joseph Tigga</strong>, Welfare Commissioner (C), served as the resource person and led the two sessions of the seminar. The sessions offered a comprehensive introduction to the four Labour Codes, namely the <em>Code on Wages</em>, the <em>Industrial Relations Code</em>, the <em>Code on Social Security</em>, and the <em>Occupational Safety, Health and Working Conditions Code</em>. The presentations highlighted important provisions relating to minimum wages, timely payment of wages, social security, industrial relations, workplace safety, and the welfare and working conditions of employees.</p>' . "\n\n" .
        '<p>The seminar provided the participants with a valuable opportunity for learning, dialogue, and reflection on the implications of the new Labour Codes, particularly in the context of educational institutions and employment practices.</p>' . "\n\n" .
        '<p>The programme was coordinated by <strong>Fr. Manoj Kullu, TOR</strong>, and <strong>Fr. Shaji Alappurath, TOR</strong>.</p>';

    if ( ! $existing ) {
        $post_93 = get_post( 93 );
        if ( $post_93 && 'post' === $post_93->post_type ) {
            wp_update_post( array(
                'ID'           => 93,
                'post_title'   => 'Seminar on "New Labour Code" Held at Hardag, Ranchi',
                'post_name'    => $legit_slug,
                'post_content' => $article_content,
                'post_excerpt' => 'A one-day seminar on "New Labour Code" was organized by the St. Francis Province, Ranchi, on 29 August 2026 at Moments Resorts, Hardag, Ranchi. Attended by around fifty participants including TOR friars and principals from across Jharkhand.',
                'post_status'  => 'publish',
                'post_date'    => '2026-08-29 10:00:00',
            ) );
            wp_set_post_categories( 93, array( $cat_id ) );
        } else {
            $inserted = wp_insert_post( array(
                'post_title'   => 'Seminar on "New Labour Code" Held at Hardag, Ranchi',
                'post_name'    => $legit_slug,
                'post_content' => $article_content,
                'post_excerpt' => 'A one-day seminar on "New Labour Code" was organized by the St. Francis Province, Ranchi, on 29 August 2026 at Moments Resorts, Hardag, Ranchi. Attended by around fifty participants including TOR friars and principals from across Jharkhand.',
                'post_status'  => 'publish',
                'post_type'    => 'post',
                'post_date'    => '2026-08-29 10:00:00',
            ) );
            if ( $inserted && ! is_wp_error( $inserted ) ) {
                wp_set_post_categories( $inserted, array( $cat_id ) );
            }
        }
    }

    update_option( 'franciscan_cleaned_dummy_news_v3', 1 );
}
add_action( 'init', 'franciscan_cleanup_dummy_news_posts' );

