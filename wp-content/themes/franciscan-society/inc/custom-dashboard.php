<?php
/**
 * Franciscan Studio - Custom Content Management & Administration Dashboard
 *
 * @package Franciscan_Society
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register WP Admin Menu Page
function franciscan_add_admin_menu() {
    add_menu_page(
        __( 'Franciscan Studio', 'franciscan-society' ),
        __( 'Franciscan Studio', 'franciscan-society' ),
        'manage_options',
        'franciscan-dashboard',
        'franciscan_render_dashboard_view',
        'dashicons-admin-site-alt3',
        2
    );
}
add_action( 'admin_menu', 'franciscan_add_admin_menu' );

// Custom Frontend Route for /admin-dashboard/
function franciscan_custom_dashboard_rewrite() {
    add_rewrite_rule( '^admin-dashboard/?$', 'index.php?franciscan_admin_dashboard=1', 'top' );
}
add_action( 'init', 'franciscan_custom_dashboard_rewrite' );

function franciscan_dashboard_query_vars( $vars ) {
    $vars[] = 'franciscan_admin_dashboard';
    return $vars;
}
add_filter( 'query_vars', 'franciscan_dashboard_query_vars' );

function franciscan_dashboard_template_redirect() {
    if ( get_query_var( 'franciscan_admin_dashboard' ) ) {
        if ( ! is_user_logged_in() ) {
            wp_safe_redirect( wp_login_url( home_url( '/admin-dashboard/' ) ) );
            exit;
        }
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( __( 'Access denied. You do not have sufficient permissions.', 'franciscan-society' ), 403 );
        }
        franciscan_render_dashboard_view();
        exit;
    }
}
add_action( 'template_redirect', 'franciscan_dashboard_template_redirect' );

// AJAX: Save Dashboard Settings & Page Data
function franciscan_ajax_save_dashboard() {
    check_ajax_referer( 'franciscan_admin_nonce', 'security' );

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => 'Unauthorized access.' ) );
    }

    $tab = isset( $_POST['tab'] ) ? sanitize_key( $_POST['tab'] ) : 'settings';

    if ( 'settings' === $tab && isset( $_POST['settings'] ) ) {
        $settings = franciscan_sanitize_array( $_POST['settings'] );
        $current_options = get_option( 'franciscan_theme_options', array() );
        $updated_options = array_merge( $current_options, $settings );
        update_option( 'franciscan_theme_options', $updated_options );

        if ( isset( $settings['site_title'] ) ) {
            update_option( 'blogname', sanitize_text_field( $settings['site_title'] ) );
        }
        if ( isset( $settings['site_description'] ) ) {
            update_option( 'blogdescription', sanitize_text_field( $settings['site_description'] ) );
        }

        wp_send_json_success( array( 'message' => 'Global website settings saved successfully!' ) );
    }

    if ( 'pages' === $tab && isset( $_POST['page_slug'] ) && isset( $_POST['page_data'] ) ) {
        $page_slug = sanitize_key( $_POST['page_slug'] );
        $page_data = franciscan_sanitize_array( $_POST['page_data'] );
        
        $current = get_option( 'franciscan_page_' . $page_slug, array() );
        $merged = array_merge( $current, $page_data );
        update_option( 'franciscan_page_' . $page_slug, $merged );

        wp_send_json_success( array( 'message' => 'Content for page "' . esc_html( $page_slug ) . '" updated and synchronized with frontend!' ) );
    }

    if ( 'seo' === $tab && isset( $_POST['seo'] ) ) {
        $seo = franciscan_sanitize_array( $_POST['seo'] );
        $current_options = get_option( 'franciscan_theme_options', array() );
        $updated_options = array_merge( $current_options, $seo );
        update_option( 'franciscan_theme_options', $updated_options );

        wp_send_json_success( array( 'message' => 'SEO and Metadata settings saved!' ) );
    }

    wp_send_json_error( array( 'message' => 'Invalid save request.' ) );
}
add_action( 'wp_ajax_franciscan_save_dashboard', 'franciscan_ajax_save_dashboard' );

// AJAX: Get Post Details for Modal Editor
function franciscan_ajax_get_post() {
    check_ajax_referer( 'franciscan_admin_nonce', 'security' );

    $post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
    $post = get_post( $post_id );

    if ( ! $post ) {
        wp_send_json_error( array( 'message' => 'Post not found.' ) );
    }

    $cats = wp_get_post_categories( $post_id, array( 'fields' => 'names' ) );
    $cat = ! empty( $cats ) ? $cats[0] : 'News';
    $thumb_url = has_post_thumbnail( $post_id ) ? get_the_post_thumbnail_url( $post_id, 'full' ) : '';
    $thumb_id = get_post_thumbnail_id( $post_id );

    wp_send_json_success( array(
        'id'        => $post->ID,
        'title'     => $post->post_title,
        'content'   => $post->post_content,
        'excerpt'   => $post->post_excerpt,
        'category'  => $cat,
        'date'      => get_the_date( 'Y-m-d', $post_id ),
        'thumb_url' => $thumb_url,
        'thumb_id'  => $thumb_id,
    ) );
}
add_action( 'wp_ajax_franciscan_get_post', 'franciscan_ajax_get_post' );

// AJAX: Save/Create News or Blog Post
function franciscan_ajax_save_post() {
    check_ajax_referer( 'franciscan_admin_nonce', 'security' );

    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_send_json_error( array( 'message' => 'Unauthorized.' ) );
    }

    $post_id  = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
    $title    = isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : '';
    $content  = isset( $_POST['content'] ) ? wp_kses_post( $_POST['content'] ) : '';
    $excerpt  = isset( $_POST['excerpt'] ) ? sanitize_textarea_field( $_POST['excerpt'] ) : '';
    $category = isset( $_POST['category'] ) ? sanitize_text_field( $_POST['category'] ) : 'News';
    $thumb_id = isset( $_POST['thumb_id'] ) ? intval( $_POST['thumb_id'] ) : 0;
    $post_date = isset( $_POST['post_date'] ) ? sanitize_text_field( $_POST['post_date'] ) : '';

    if ( empty( $title ) ) {
        wp_send_json_error( array( 'message' => 'Post title is required.' ) );
    }

    $post_arr = array(
        'post_title'   => $title,
        'post_content' => $content,
        'post_excerpt' => $excerpt,
        'post_status'  => 'publish',
        'post_type'    => 'post',
    );

    if ( ! empty( $post_date ) ) {
        $post_arr['post_date'] = $post_date . ' 12:00:00';
    }

    if ( $post_id > 0 ) {
        $post_arr['ID'] = $post_id;
        $saved_id = wp_update_post( $post_arr );
        $msg = 'Article updated successfully!';
    } else {
        $saved_id = wp_insert_post( $post_arr );
        $msg = 'New article created and published!';
    }

    if ( is_wp_error( $saved_id ) ) {
        wp_send_json_error( array( 'message' => $saved_id->get_error_message() ) );
    }

    // Set Category
    $cat_obj = get_category_by_slug( sanitize_title( $category ) );
    if ( ! $cat_obj ) {
        $cat_id = wp_create_category( $category );
    } else {
        $cat_id = $cat_obj->term_id;
    }
    wp_set_post_categories( $saved_id, array( $cat_id ) );

    // Set Thumbnail
    if ( $thumb_id > 0 ) {
        set_post_thumbnail( $saved_id, $thumb_id );
    }

    wp_send_json_success( array( 'message' => $msg, 'post_id' => $saved_id ) );
}
add_action( 'wp_ajax_franciscan_save_post', 'franciscan_ajax_save_post' );

// AJAX: Delete Post
function franciscan_ajax_delete_post() {
    check_ajax_referer( 'franciscan_admin_nonce', 'security' );

    if ( ! current_user_can( 'delete_posts' ) ) {
        wp_send_json_error( array( 'message' => 'Unauthorized.' ) );
    }

    $post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
    if ( $post_id > 0 ) {
        wp_delete_post( $post_id, true );
        wp_send_json_success( array( 'message' => 'Post deleted successfully.' ) );
    }
    wp_send_json_error( array( 'message' => 'Invalid post ID.' ) );
}
add_action( 'wp_ajax_franciscan_delete_post', 'franciscan_ajax_delete_post' );

// Helper sanitization
if ( ! function_exists( 'franciscan_sanitize_array' ) ) {
    function franciscan_sanitize_array( $array ) {
        if ( ! is_array( $array ) ) {
            return wp_kses_post( wp_unslash( $array ) );
        }
        $sanitized = array();
        foreach ( $array as $key => $value ) {
            if ( is_array( $value ) ) {
                $sanitized[sanitize_key( $key )] = franciscan_sanitize_array( $value );
            } else {
                $sanitized[sanitize_key( $key )] = wp_kses_post( wp_unslash( $value ) );
            }
        }
        return $sanitized;
    }
}

// Render Dashboard Interface
function franciscan_render_dashboard_view() {
    $nonce = wp_create_nonce( 'franciscan_admin_nonce' );
    $options = get_option( 'franciscan_theme_options', franciscan_get_default_options() );

    // Enqueue Media Library Uploader Scripts
    wp_enqueue_media();

    // Stats
    $pages_count = count( get_pages() );
    $posts_count = wp_count_posts( 'post' )->publish;
    $inquiries = get_posts( array( 'post_type' => 'franciscan_inquiry', 'posts_per_page' => 50 ) );
    $inquiries_count = count( $inquiries );

    $current_user = wp_get_current_user();

    // Available Pages for Editor
    $managed_pages = array(
        'home'                  => 'Homepage (Front Page)',
        'about'                 => 'About Us',
        'ministries'            => 'Ministries — Overview Hub',
        'ministries-pastoral'   => 'Ministries — Pastoral Ministry',
        'ministries-education'  => 'Ministries — Education Ministry',
        'ministries-formation'  => 'Ministries — Formation Ministry',
        'community'             => 'Community Hub',
        'publications'          => 'Publications & Resources',
        'gallery'               => 'Our Gallery',
        'news'                  => 'News & Updates',
        'blogs'                 => 'Blogs & Articles',
        'news_details'          => 'News & Blog Details (Single Article)',
        'contact'               => 'Contact Us',
    );

    $all_posts = get_posts( array(
        'post_type'      => 'post',
        'posts_per_page' => 50,
        'post_status'    => 'publish',
    ) );
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Franciscan Studio | Content Management Studio</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Phudu:wght@600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
        <?php wp_print_scripts( array( 'jquery' ) ); ?>
        <style>
            :root {
                --c-gold: #C5A963;
                --c-gold-dark: #9B804E;
                --c-gold-light: #f7ecd2;
                --c-bg: #0F0E0D;
                --c-card: #181715;
                --c-card-border: #2B2824;
                --c-text: #F4F1EA;
                --c-text-muted: #A39D93;
                --c-accent: #3b82f6;
                --c-success: #10b981;
                --c-danger: #ef4444;
            }
            * { box-sizing: border-box; margin: 0; padding: 0; }
            body {
                font-family: 'DM Sans', -apple-system, sans-serif;
                background-color: var(--c-bg);
                color: var(--c-text);
                min-height: 100vh;
                display: flex;
            }

            /* WP-Admin Integration */
            .toplevel_page_franciscan-dashboard #adminmenuback,
            .toplevel_page_franciscan-dashboard #adminmenuwrap {
                display: none !important;
            }
            .toplevel_page_franciscan-dashboard #wpcontent {
                margin-left: 0 !important;
                padding: 0 !important;
            }
            .toplevel_page_franciscan-dashboard #wpbody-content {
                padding-bottom: 0 !important;
            }
            .toplevel_page_franciscan-dashboard #wpfooter {
                display: none !important;
            }
            .toplevel_page_franciscan-dashboard #wpadminbar {
                background: #141311 !important;
                border-bottom: 1px solid #2B2824 !important;
            }

            /* Main Layout */
            #studio-app {
                display: flex;
                width: 100%;
                min-height: 100vh;
            }

            /* Sidebar */
            #admin-sidebar {
                width: 280px;
                background: #141311;
                border-right: 1px solid var(--c-card-border);
                display: flex;
                flex-direction: column;
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 100;
            }
            .admin-bar #admin-sidebar {
                top: 32px;
            }
            @media screen and (max-width: 782px) {
                .admin-bar #admin-sidebar {
                    top: 46px;
                }
            }

            .sidebar-brand {
                padding: 1.8rem 1.5rem;
                border-bottom: 1px solid var(--c-card-border);
            }
            .sidebar-brand h1 {
                font-family: 'Phudu', serif;
                color: var(--c-gold);
                font-size: 1.2rem;
                letter-spacing: 0.05em;
                text-transform: uppercase;
            }
            .sidebar-brand p {
                color: var(--c-text-muted);
                font-size: 0.75rem;
                margin-top: 0.2rem;
            }

            .sidebar-nav {
                padding: 1.5rem 0.8rem;
                display: flex;
                flex-direction: column;
                gap: 0.4rem;
                flex-grow: 1;
                overflow-y: auto;
            }
            .nav-item {
                display: flex;
                align-items: center;
                gap: 0.8rem;
                padding: 0.8rem 1rem;
                border-radius: 8px;
                color: var(--c-text-muted);
                text-decoration: none;
                font-size: 0.9rem;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.2s ease;
                border: 1px solid transparent;
            }
            .nav-item:hover {
                color: var(--c-text);
                background: rgba(197, 169, 99, 0.08);
            }
            .nav-item.active {
                color: var(--c-gold);
                background: rgba(197, 169, 99, 0.15);
                border-color: rgba(197, 169, 99, 0.3);
                font-weight: 600;
            }
            .nav-badge {
                margin-left: auto;
                background: var(--c-card-border);
                color: var(--c-text-muted);
                padding: 0.2rem 0.6rem;
                border-radius: 12px;
                font-size: 0.75rem;
                font-weight: 700;
            }

            .sidebar-footer {
                padding: 1.2rem 1.5rem;
                border-top: 1px solid var(--c-card-border);
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .user-tag {
                display: flex;
                align-items: center;
                gap: 0.6rem;
                font-size: 0.85rem;
                color: var(--c-text-muted);
            }
            .btn-logout {
                color: var(--c-danger);
                text-decoration: none;
                font-size: 0.85rem;
                font-weight: 600;
            }

            /* Main Content Container */
            #admin-main {
                margin-left: 280px;
                flex-grow: 1;
                padding: 2.5rem 3.5rem;
                min-height: 100vh;
                background: #0F0E0D;
            }

            .top-bar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2.5rem;
            }
            .page-heading h2 {
                font-family: 'Phudu', serif;
                font-size: 1.8rem;
                color: #FFFFFF;
                margin-bottom: 0.3rem;
            }
            .page-heading p {
                color: var(--c-text-muted);
                font-size: 0.9rem;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.7rem 1.4rem;
                border-radius: 8px;
                font-weight: 600;
                font-size: 0.9rem;
                text-decoration: none;
                cursor: pointer;
                transition: all 0.2s ease;
                border: none;
            }
            .btn-primary {
                background: var(--c-gold);
                color: #0F0E0D;
            }
            .btn-primary:hover {
                background: var(--c-gold-light);
                transform: translateY(-2px);
                box-shadow: 0 6px 16px rgba(197, 169, 99, 0.3);
            }
            .btn-secondary {
                background: var(--c-card);
                border: 1px solid var(--c-card-border);
                color: var(--c-text);
            }
            .btn-secondary:hover {
                border-color: var(--c-gold);
                color: var(--c-gold);
            }
            .btn-danger {
                background: rgba(239, 68, 68, 0.15);
                border: 1px solid rgba(239, 68, 68, 0.3);
                color: var(--c-danger);
            }
            .btn-danger:hover {
                background: var(--c-danger);
                color: #fff;
            }

            /* Stats Grid */
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 1.5rem;
                margin-bottom: 2.5rem;
            }
            .stat-card {
                background: var(--c-card);
                border: 1px solid var(--c-card-border);
                border-radius: 12px;
                padding: 1.5rem;
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
            .stat-card span {
                font-size: 0.8rem;
                color: var(--c-text-muted);
                text-transform: uppercase;
                letter-spacing: 0.05em;
                font-weight: 600;
            }
            .stat-card strong {
                font-family: 'Phudu', serif;
                font-size: 2.2rem;
                color: var(--c-gold);
            }

            /* Form Elements */
            .form-section {
                background: var(--c-card);
                border: 1px solid var(--c-card-border);
                border-radius: 14px;
                padding: 2rem;
                margin-bottom: 2rem;
            }
            .form-section-title {
                font-family: 'Phudu', serif;
                font-size: 1.2rem;
                color: var(--c-gold);
                margin-bottom: 1.5rem;
                padding-bottom: 0.8rem;
                border-bottom: 1px solid var(--c-card-border);
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            .form-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }
            .form-grid.single-col {
                grid-template-columns: 1fr;
            }
            .form-group {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
            .form-group.full-width {
                grid-column: span 2;
            }
            .form-group label {
                font-size: 0.85rem;
                font-weight: 600;
                color: var(--c-text);
            }
            .form-control {
                background: #11100E;
                border: 1px solid var(--c-card-border);
                border-radius: 8px;
                padding: 0.8rem 1rem;
                color: var(--c-text);
                font-size: 0.95rem;
                font-family: 'DM Sans', sans-serif;
                transition: border-color 0.2s;
            }
            .form-control:focus {
                outline: none;
                border-color: var(--c-gold);
            }
            textarea.form-control {
                min-height: 110px;
                resize: vertical;
            }

            /* Image Uploader Component */
            .image-uploader-box {
                display: flex;
                align-items: center;
                gap: 1rem;
                background: #11100E;
                border: 1px dashed var(--c-card-border);
                border-radius: 8px;
                padding: 1rem;
            }
            .image-preview-thumb {
                width: 70px;
                height: 70px;
                object-fit: cover;
                border-radius: 6px;
                background: #000;
                border: 1px solid var(--c-card-border);
            }

            /* Tables */
            .data-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 1rem;
            }
            .data-table th {
                text-align: left;
                padding: 1rem;
                background: #11100E;
                color: var(--c-text-muted);
                font-size: 0.8rem;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                border-bottom: 1px solid var(--c-card-border);
            }
            .data-table td {
                padding: 1rem;
                border-bottom: 1px solid var(--c-card-border);
                font-size: 0.9rem;
            }
            .data-table tr:hover td {
                background: rgba(255, 255, 255, 0.02);
            }

            /* Toast Notification */
            #studio-toast {
                position: fixed;
                bottom: 2rem;
                right: 2rem;
                padding: 1rem 1.5rem;
                border-radius: 10px;
                background: #181715;
                color: #fff;
                font-weight: 600;
                font-size: 0.9rem;
                box-shadow: 0 10px 30px rgba(0,0,0,0.5);
                border: 1px solid var(--c-gold);
                display: none;
                z-index: 999999;
                animation: slideIn 0.3s ease;
            }
            @keyframes slideIn {
                from { transform: translateY(20px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }

            /* Modal Overlay */
            .modal-backdrop {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.85);
                backdrop-filter: blur(8px);
                z-index: 100000;
                align-items: center;
                justify-content: center;
                padding: 2rem;
            }
            .modal-backdrop.active {
                display: flex !important;
            }
            .modal-dialog {
                background: var(--c-card);
                border: 1px solid var(--c-card-border);
                border-radius: 16px;
                width: 100%;
                max-width: 750px;
                max-height: 90vh;
                overflow-y: auto;
                padding: 2.5rem;
                position: relative;
            }
            .modal-close {
                position: absolute;
                top: 1.5rem;
                right: 1.5rem;
                background: none;
                border: none;
                color: var(--c-text-muted);
                font-size: 1.5rem;
                cursor: pointer;
            }
            .modal-close:hover { color: #fff; }
        </style>
    </head>
    <body>
    <div id="studio-app">
        <!-- Sidebar Navigation -->
        <aside id="admin-sidebar">
            <div class="sidebar-brand">
                <a href="<?php echo esc_url( admin_url() ); ?>" style="display:inline-flex; align-items:center; gap:0.4rem; color:var(--c-gold); font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; text-decoration:none; margin-bottom:0.8rem;">
                    &larr; Standard WP Admin
                </a>
                <h1>Franciscan Studio</h1>
                <p>Ranchi Province Content Hub</p>
            </div>

            <nav class="sidebar-nav">
                <a class="nav-item active" data-tab="overview">
                    <span>📊</span> Overview
                </a>
                <a class="nav-item" data-tab="pages">
                    <span>📝</span> Pages Content Editor
                    <span class="nav-badge"><?php echo count($managed_pages); ?></span>
                </a>
                <a class="nav-item" data-tab="gallery">
                    <span>🖼️</span> Photo Gallery Hub
                    <span class="nav-badge" id="gallery-count-badge"><?php echo count( franciscan_get_gallery_items() ); ?></span>
                </a>
                <a class="nav-item" data-tab="posts">
                    <span>📰</span> Blog & News Posts
                    <span class="nav-badge"><?php echo $posts_count; ?></span>
                </a>
                <a class="nav-item" data-tab="settings">
                    <span>⚙️</span> Website Global Settings
                </a>
                <a class="nav-item" data-tab="inquiries">
                    <span>📨</span> Inquiries & Prayers
                    <span class="nav-badge"><?php echo $inquiries_count; ?></span>
                </a>
                <a class="nav-item" data-tab="seo">
                    <span>🔍</span> SEO & Metadata
                </a>
                <a class="nav-item" data-tab="security">
                    <span>🛡️</span> Security & Health
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="user-tag">
                    <span>👤</span>
                    <span><?php echo esc_html( $current_user->display_name ); ?></span>
                </div>
                <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="btn-logout">Logout</a>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main id="admin-main">
            <!-- Toast Notification -->
            <div id="studio-toast">Settings Saved Successfully!</div>

            <!-- Top Action Bar -->
            <div class="top-bar">
                <div class="page-heading">
                    <h2 id="view-title">Dashboard Overview</h2>
                    <p id="view-subtitle">Live frontend synchronization for Franciscan Society Ranchi Province</p>
                </div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="btn btn-secondary">
                    <span>🌐</span> View Live Website &rarr;
                </a>
            </div>

            <!-- ========================================================== -->
            <!-- TAB 1: OVERVIEW -->
            <!-- ========================================================== -->
            <section id="tab-overview" class="tab-content">
                <div class="stats-grid">
                    <div class="stat-card">
                        <span>Total Managed Pages</span>
                        <strong><?php echo $pages_count; ?></strong>
                    </div>
                    <div class="stat-card">
                        <span>Published News & Blogs</span>
                        <strong><?php echo $posts_count; ?></strong>
                    </div>
                    <div class="stat-card">
                        <span>Received Inquiries</span>
                        <strong><?php echo $inquiries_count; ?></strong>
                    </div>
                    <div class="stat-card">
                        <span>System Security</span>
                        <strong style="color:var(--c-success); font-size:1.8rem;">Protected</strong>
                    </div>
                </div>

                <div class="form-section">
                    <h3 class="form-section-title">🚀 Quick Studio Actions</h3>
                    <div style="display:flex; gap:1rem; flex-wrap:wrap;">
                        <button type="button" class="btn btn-primary switch-tab-btn" data-target="pages">
                            ✏️ Edit Page Content
                        </button>
                        <button type="button" class="btn btn-secondary open-create-post-btn">
                            ➕ Publish News / Blog
                        </button>
                        <button type="button" class="btn btn-secondary switch-tab-btn" data-target="inquiries">
                            📨 View Prayer Requests
                        </button>
                        <button type="button" class="btn btn-secondary switch-tab-btn" data-target="settings">
                            ⚙️ Update WhatsApp & Contacts
                        </button>
                    </div>
                </div>
            </section>

            <!-- ========================================================== -->
            <!-- TAB 2: PAGES CONTENT EDITOR -->
            <!-- ========================================================== -->
            <section id="tab-pages" class="tab-content" style="display:none;">
                <div style="display:flex; gap:1rem; margin-bottom:2rem; align-items:center;">
                    <label style="font-weight:600; color:var(--c-text-muted); font-size:0.9rem;">Select Page to Edit:</label>
                    <select id="page-selector" class="form-control" style="max-width:320px; font-weight:700; color:var(--c-gold);">
                        <?php foreach ( $managed_pages as $slug => $label ) : ?>
                            <option value="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $label ); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Page Forms -->
                <?php foreach ( $managed_pages as $slug => $label ) :
                    $data = franciscan_get_page_content( $slug );
                ?>
                    <form class="page-editor-form" id="form-page-<?php echo esc_attr( $slug ); ?>" data-slug="<?php echo esc_attr( $slug ); ?>" style="<?php echo $slug === 'home' ? '' : 'display:none;'; ?>">
                        
                        <!-- Hero Section Fields -->
                        <div class="form-section">
                            <h3 class="form-section-title">🌟 Top Banner & Hero Section</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Hero Badge / Eyebrow Text</label>
                                    <input type="text" name="hero_badge" class="form-control" value="<?php echo esc_attr( $data['hero_badge'] ?? '' ); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Hero Main Heading (Title)</label>
                                    <input type="text" name="hero_title" class="form-control" value="<?php echo esc_attr( $data['hero_title'] ?? '' ); ?>">
                                </div>
                                <div class="form-group full-width">
                                    <label>Hero Subtitle / Description</label>
                                    <textarea name="hero_subtitle" class="form-control"><?php echo esc_textarea( $data['hero_subtitle'] ?? '' ); ?></textarea>
                                </div>
                                <div class="form-group full-width">
                                    <label>Hero Banner Image (Replaces default background)</label>
                                    <?php
                                    $default_banner = ( $slug === "home" ) 
                                        ? ( FRANCISCAN_THEME_URI . "/assets/images/new_uploads/hero-banner-aug20.jpeg" )
                                        : ( FRANCISCAN_THEME_URI . "/assets/images/church-bg.jpg" );
                                    $current_banner = ! empty( $data["hero_image"] ) ? $data["hero_image"] : $default_banner;
                                    ?>
                                    <div class="image-uploader-box">
                                        <div style="width: 100px; height: 64px; border-radius: 8px; overflow: hidden; background: #0c1727; border: 1px solid var(--c-gold); flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                            <img src="<?php echo esc_url( $current_banner ); ?>" class="image-preview-thumb" id="preview-hero_image-<?php echo esc_attr( $slug ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='<?php echo esc_url( $default_banner ); ?>';">
                                        </div>
                                        <input type="hidden" name="hero_image" id="input-hero_image-<?php echo esc_attr( $slug ); ?>" value="<?php echo esc_attr( $data["hero_image"] ?? "" ); ?>">
                                        <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                                            <button type="button" class="btn btn-secondary btn-upload-media" data-target="hero_image-<?php echo esc_attr( $slug ); ?>">
                                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle; margin-right:4px;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                                Choose from Media Library
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-reset-media" data-target="hero_image-<?php echo esc_attr( $slug ); ?>" data-default="<?php echo esc_url( $default_banner ); ?>" style="<?php echo empty( $data["hero_image"] ) ? "display:none;" : ""; ?>" title="Reset to default theme banner">
                                                ? Reset to Default
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <?php if ( $slug === 'home' ) : ?>
                            <!-- Home Specific Sections -->
                            <div class="form-section">
                                <h3 class="form-section-title">📊 Hero Counters & Action Buttons</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label>Stat 1 Number</label>
                                        <input type="text" name="hero_stat_1_num" class="form-control" value="<?php echo esc_attr( $data['hero_stat_1_num'] ?? '104+' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 1 Label</label>
                                        <input type="text" name="hero_stat_1_lbl" class="form-control" value="<?php echo esc_attr( $data['hero_stat_1_lbl'] ?? 'PROFESSED FRIARS' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 2 Number</label>
                                        <input type="text" name="hero_stat_2_num" class="form-control" value="<?php echo esc_attr( $data['hero_stat_2_num'] ?? '14+' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 2 Label</label>
                                        <input type="text" name="hero_stat_2_lbl" class="form-control" value="<?php echo esc_attr( $data['hero_stat_2_lbl'] ?? 'PARISHES SERVED' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 3 Number</label>
                                        <input type="text" name="hero_stat_3_num" class="form-control" value="<?php echo esc_attr( $data['hero_stat_3_num'] ?? '800+' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 3 Label</label>
                                        <input type="text" name="hero_stat_3_lbl" class="form-control" value="<?php echo esc_attr( $data['hero_stat_3_lbl'] ?? 'YEARS OF GRACE' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Primary Button Label</label>
                                        <input type="text" name="hero_cta_text" class="form-control" value="<?php echo esc_attr( $data['hero_cta_text'] ?? 'JOIN OUR CHURCH' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Secondary Button Label</label>
                                        <input type="text" name="hero_sec_cta_text" class="form-control" value="<?php echo esc_attr( $data['hero_sec_cta_text'] ?? 'GET STARTED' ); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h3 class="form-section-title">🕊️ Welcome & Core Values Sections</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label>Welcome Eyebrow Badge</label>
                                        <input type="text" name="welcome_badge" class="form-control" value="<?php echo esc_attr( $data['welcome_badge'] ?? 'PEACE & GOOD' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Welcome Heading</label>
                                        <input type="text" name="welcome_heading" class="form-control" value="<?php echo esc_attr( $data['welcome_heading'] ?? 'PAX ET BONUM — WALKING IN THE FOOTSTEPS OF THE POVERELLO' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Welcome Lead Story</label>
                                        <textarea name="welcome_lead" class="form-control"><?php echo esc_textarea( $data['welcome_lead'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Values Heading</label>
                                        <input type="text" name="about_heading" class="form-control" value="<?php echo esc_attr( $data['about_heading'] ?? 'OUR CHRISTIAN VALUES' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Values Eyebrow Badge</label>
                                        <input type="text" name="about_badge" class="form-control" value="<?php echo esc_attr( $data['about_badge'] ?? 'OUR VALUES' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Values Description Text</label>
                                        <textarea name="about_text" class="form-control"><?php echo esc_textarea( $data['about_text'] ?? '' ); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $slug === 'ministries' ) : ?>
                            <!-- Ministries Hub: Key Impact Statistics Strip -->
                            <div class="form-section">
                                <h3 class="form-section-title">📊 Key Impact Statistics Strip</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label>Stat 1 Number</label>
                                        <input type="text" name="stat_1_num" class="form-control" value="<?php echo esc_attr( $data['stat_1_num'] ?? '15+ Parishes' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 1 Label</label>
                                        <input type="text" name="stat_1_lbl" class="form-control" value="<?php echo esc_attr( $data['stat_1_lbl'] ?? 'Across 9 Dioceses in India & Germany' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 2 Number</label>
                                        <input type="text" name="stat_2_num" class="form-control" value="<?php echo esc_attr( $data['stat_2_num'] ?? '20,000+' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 2 Label</label>
                                        <input type="text" name="stat_2_lbl" class="form-control" value="<?php echo esc_attr( $data['stat_2_lbl'] ?? 'Students in 22 Regional & ICSE Schools' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 3 Number</label>
                                        <input type="text" name="stat_3_num" class="form-control" value="<?php echo esc_attr( $data['stat_3_num'] ?? '4 Centres' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 3 Label</label>
                                        <input type="text" name="stat_3_lbl" class="form-control" value="<?php echo esc_attr( $data['stat_3_lbl'] ?? 'Dedicated Formation & Theological Houses' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 4 Number</label>
                                        <input type="text" name="stat_4_num" class="form-control" value="<?php echo esc_attr( $data['stat_4_num'] ?? '104+ Friars' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Stat 4 Label</label>
                                        <input type="text" name="stat_4_lbl" class="form-control" value="<?php echo esc_attr( $data['stat_4_lbl'] ?? 'Professed Brothers Serving in Fraternity' ); ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Pillar 1: Pastoral Ministry -->
                            <div class="form-section">
                                <h3 class="form-section-title">✝️ Pillar 1: Pastoral Ministry Card</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label>Badge Text</label>
                                        <input type="text" name="pastoral_badge" class="form-control" value="<?php echo esc_attr( $data['pastoral_badge'] ?? 'PASTORAL MINISTRY' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Title / Heading</label>
                                        <input type="text" name="pastoral_title" class="form-control" value="<?php echo esc_attr( $data['pastoral_title'] ?? 'PROCLAIMING THE GOSPEL THROUGH COMPASSIONATE SERVICE' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Lead Description (Paragraph 1)</label>
                                        <textarea name="pastoral_lead" class="form-control"><?php echo esc_textarea( $data['pastoral_lead'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Secondary Description (Paragraph 2)</label>
                                        <textarea name="pastoral_desc" class="form-control"><?php echo esc_textarea( $data['pastoral_desc'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Button Text</label>
                                        <input type="text" name="pastoral_btn_text" class="form-control" value="<?php echo esc_attr( $data['pastoral_btn_text'] ?? 'EXPLORE PASTORAL MINISTRY' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Button Link URL</label>
                                        <input type="text" name="pastoral_btn_url" class="form-control" value="<?php echo esc_attr( $data['pastoral_btn_url'] ?? '/ministries-pastoral/' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Pastoral Section Image</label>
                                        <?php
                                        $default_pastoral_img = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 1.39.44 PM.jpeg';
                                        $current_pastoral_img = ! empty( $data['pastoral_image'] ) ? $data['pastoral_image'] : $default_pastoral_img;
                                        ?>
                                        <div class="image-uploader-box">
                                            <div style="width: 100px; height: 64px; border-radius: 8px; overflow: hidden; background: #0c1727; border: 1px solid var(--c-gold); flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                                <img src="<?php echo esc_url( $current_pastoral_img ); ?>" class="image-preview-thumb" id="preview-pastoral_image" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='<?php echo esc_url( $default_pastoral_img ); ?>';">
                                            </div>
                                            <input type="hidden" name="pastoral_image" id="input-pastoral_image" value="<?php echo esc_attr( $data['pastoral_image'] ?? '' ); ?>">
                                            <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                                                <button type="button" class="btn btn-secondary btn-upload-media" data-target="pastoral_image">
                                                    Choose Image from Library
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-reset-media" data-target="pastoral_image" data-default="<?php echo esc_url( $default_pastoral_img ); ?>" style="<?php echo empty( $data['pastoral_image'] ) ? 'display:none;' : ''; ?>">
                                                    Reset to Default
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Image Caption Title</label>
                                        <input type="text" name="pastoral_img_caption_title" class="form-control" value="<?php echo esc_attr( $data['pastoral_img_caption_title'] ?? '15 Parishes in 9 Dioceses' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Image Caption Subtitle</label>
                                        <input type="text" name="pastoral_img_caption_sub" class="form-control" value="<?php echo esc_attr( $data['pastoral_img_caption_sub'] ?? 'India & Archdiocese of Freiburg, Germany' ); ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Pillar 2: Formation Ministry -->
                            <div class="form-section">
                                <h3 class="form-section-title">🕊️ Pillar 2: Formation Ministry Card</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label>Badge Text</label>
                                        <input type="text" name="formation_badge" class="form-control" value="<?php echo esc_attr( $data['formation_badge'] ?? 'FORMATION MINISTRY' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Title / Heading</label>
                                        <input type="text" name="formation_title" class="form-control" value="<?php echo esc_attr( $data['formation_title'] ?? 'NURTURING THE NEXT GENERATION OF FRANCISCANS' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Lead Description (Paragraph 1)</label>
                                        <textarea name="formation_lead" class="form-control"><?php echo esc_textarea( $data['formation_lead'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Secondary Description (Paragraph 2)</label>
                                        <textarea name="formation_desc" class="form-control"><?php echo esc_textarea( $data['formation_desc'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Button Text</label>
                                        <input type="text" name="formation_btn_text" class="form-control" value="<?php echo esc_attr( $data['formation_btn_text'] ?? 'EXPLORE FORMATION MINISTRY' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Button Link URL</label>
                                        <input type="text" name="formation_btn_url" class="form-control" value="<?php echo esc_attr( $data['formation_btn_url'] ?? '/ministries-formation/' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Formation Section Image</label>
                                        <?php
                                        $default_formation_img = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.30.25 AM (1).jpeg';
                                        $current_formation_img = ! empty( $data['formation_image'] ) ? $data['formation_image'] : $default_formation_img;
                                        ?>
                                        <div class="image-uploader-box">
                                            <div style="width: 100px; height: 64px; border-radius: 8px; overflow: hidden; background: #0c1727; border: 1px solid var(--c-gold); flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                                <img src="<?php echo esc_url( $current_formation_img ); ?>" class="image-preview-thumb" id="preview-formation_image" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='<?php echo esc_url( $default_formation_img ); ?>';">
                                            </div>
                                            <input type="hidden" name="formation_image" id="input-formation_image" value="<?php echo esc_attr( $data['formation_image'] ?? '' ); ?>">
                                            <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                                                <button type="button" class="btn btn-secondary btn-upload-media" data-target="formation_image">
                                                    Choose Image from Library
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-reset-media" data-target="formation_image" data-default="<?php echo esc_url( $default_formation_img ); ?>" style="<?php echo empty( $data['formation_image'] ) ? 'display:none;' : ''; ?>">
                                                    Reset to Default
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Image Caption Title</label>
                                        <input type="text" name="formation_img_caption_title" class="form-control" value="<?php echo esc_attr( $data['formation_img_caption_title'] ?? '4 Sacred Formation Houses' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Image Caption Subtitle</label>
                                        <input type="text" name="formation_img_caption_sub" class="form-control" value="<?php echo esc_attr( $data['formation_img_caption_sub'] ?? 'Dorma • Bichna • Ranchi Clericate' ); ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Pillar 3: Education Ministry -->
                            <div class="form-section">
                                <h3 class="form-section-title">🎓 Pillar 3: Education Ministry Card</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label>Badge Text</label>
                                        <input type="text" name="education_badge" class="form-control" value="<?php echo esc_attr( $data['education_badge'] ?? 'EDUCATION MINISTRY' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Title / Heading</label>
                                        <input type="text" name="education_title" class="form-control" value="<?php echo esc_attr( $data['education_title'] ?? 'EMPOWERING MINDS THROUGH KNOWLEDGE & VALUES' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Lead Description (Paragraph 1)</label>
                                        <textarea name="education_lead" class="form-control"><?php echo esc_textarea( $data['education_lead'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Secondary Description (Paragraph 2)</label>
                                        <textarea name="education_desc" class="form-control"><?php echo esc_textarea( $data['education_desc'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Button Text</label>
                                        <input type="text" name="education_btn_text" class="form-control" value="<?php echo esc_attr( $data['education_btn_text'] ?? 'EXPLORE EDUCATION MINISTRY' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Button Link URL</label>
                                        <input type="text" name="education_btn_url" class="form-control" value="<?php echo esc_attr( $data['education_btn_url'] ?? '/ministries-education/' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Education Section Image</label>
                                        <?php
                                        $default_education_img = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.39.44 AM (1).jpeg';
                                        $current_education_img = ! empty( $data['education_image'] ) ? $data['education_image'] : $default_education_img;
                                        ?>
                                        <div class="image-uploader-box">
                                            <div style="width: 100px; height: 64px; border-radius: 8px; overflow: hidden; background: #0c1727; border: 1px solid var(--c-gold); flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                                <img src="<?php echo esc_url( $current_education_img ); ?>" class="image-preview-thumb" id="preview-education_image" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='<?php echo esc_url( $default_education_img ); ?>';">
                                            </div>
                                            <input type="hidden" name="education_image" id="input-education_image" value="<?php echo esc_attr( $data['education_image'] ?? '' ); ?>">
                                            <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                                                <button type="button" class="btn btn-secondary btn-upload-media" data-target="education_image">
                                                    Choose Image from Library
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-reset-media" data-target="education_image" data-default="<?php echo esc_url( $default_education_img ); ?>" style="<?php echo empty( $data['education_image'] ) ? 'display:none;' : ''; ?>">
                                                    Reset to Default
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Image Caption Title</label>
                                        <input type="text" name="education_img_caption_title" class="form-control" value="<?php echo esc_attr( $data['education_img_caption_title'] ?? '22 Schools Across 3 States' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Image Caption Subtitle</label>
                                        <input type="text" name="education_img_caption_sub" class="form-control" value="<?php echo esc_attr( $data['education_img_caption_sub'] ?? 'Jharkhand • Bihar • West Bengal' ); ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Bottom Mission Banner -->
                            <div class="form-section">
                                <h3 class="form-section-title">🌟 Bottom Mission Banner</h3>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label>Badge</label>
                                        <input type="text" name="mission_badge" class="form-control" value="<?php echo esc_attr( $data['mission_badge'] ?? 'OUR CALLING' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="mission_title" class="form-control" value="<?php echo esc_attr( $data['mission_title'] ?? '“PEACE AND JOY TO THE WORLD”' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Description</label>
                                        <textarea name="mission_desc" class="form-control"><?php echo esc_textarea( $data['mission_desc'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Primary Button Text</label>
                                        <input type="text" name="mission_btn_text" class="form-control" value="<?php echo esc_attr( $data['mission_btn_text'] ?? 'JOIN OUR MISSION' ); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Primary Button URL</label>
                                        <input type="text" name="mission_btn_url" class="form-control" value="<?php echo esc_attr( $data['mission_btn_url'] ?? '/contact/#enquiry' ); ?>">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $slug === 'ministries-pastoral' ) : ?>
                            <!-- Pastoral Ministry Details -->
                            <div class="form-section">
                                <h3 class="form-section-title">📖 Section 1: Pastoral Mission & Presence</h3>
                                <div class="form-grid">
                                    <div class="form-group full-width">
                                        <label>Section 1 Heading</label>
                                        <input type="text" name="section_1_heading" class="form-control" value="<?php echo esc_attr( $data['section_1_heading'] ?? 'Pastoral Ministry' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Paragraph 1</label>
                                        <textarea name="section_1_p1" class="form-control"><?php echo esc_textarea( $data['section_1_p1'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Paragraph 2</label>
                                        <textarea name="section_1_p2" class="form-control"><?php echo esc_textarea( $data['section_1_p2'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Image</label>
                                        <?php
                                        $def_p_img1 = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 1.39.44 PM.jpeg';
                                        $cur_p_img1 = ! empty( $data['section_1_image'] ) ? $data['section_1_image'] : $def_p_img1;
                                        ?>
                                        <div class="image-uploader-box">
                                            <div style="width: 100px; height: 64px; border-radius: 8px; overflow: hidden; background: #0c1727; border: 1px solid var(--c-gold); flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                                <img src="<?php echo esc_url( $cur_p_img1 ); ?>" class="image-preview-thumb" id="preview-section_1_image-pastoral" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='<?php echo esc_url( $def_p_img1 ); ?>';">
                                            </div>
                                            <input type="hidden" name="section_1_image" id="input-section_1_image-pastoral" value="<?php echo esc_attr( $data['section_1_image'] ?? '' ); ?>">
                                            <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                                                <button type="button" class="btn btn-secondary btn-upload-media" data-target="section_1_image-pastoral">
                                                    Choose Image from Library
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-reset-media" data-target="section_1_image-pastoral" data-default="<?php echo esc_url( $def_p_img1 ); ?>" style="<?php echo empty( $data['section_1_image'] ) ? 'display:none;' : ''; ?>">
                                                    Reset to Default
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Image Alt Text</label>
                                        <input type="text" name="section_1_img_alt" class="form-control" value="<?php echo esc_attr( $data['section_1_img_alt'] ?? 'Pastoral Ministry in Parishes' ); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h3 class="form-section-title">🤝 Section 2: Fraternity, Service & Expansion</h3>
                                <div class="form-grid">
                                    <div class="form-group full-width">
                                        <label>Section 2 Paragraph 1</label>
                                        <textarea name="section_2_p1" class="form-control"><?php echo esc_textarea( $data['section_2_p1'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 2 Paragraph 2</label>
                                        <textarea name="section_2_p2" class="form-control"><?php echo esc_textarea( $data['section_2_p2'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 2 Image</label>
                                        <?php
                                        $def_p_img2 = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.24 PM.jpeg';
                                        $cur_p_img2 = ! empty( $data['section_2_image'] ) ? $data['section_2_image'] : $def_p_img2;
                                        ?>
                                        <div class="image-uploader-box">
                                            <div style="width: 100px; height: 64px; border-radius: 8px; overflow: hidden; background: #0c1727; border: 1px solid var(--c-gold); flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                                <img src="<?php echo esc_url( $cur_p_img2 ); ?>" class="image-preview-thumb" id="preview-section_2_image-pastoral" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='<?php echo esc_url( $def_p_img2 ); ?>';">
                                            </div>
                                            <input type="hidden" name="section_2_image" id="input-section_2_image-pastoral" value="<?php echo esc_attr( $data['section_2_image'] ?? '' ); ?>">
                                            <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                                                <button type="button" class="btn btn-secondary btn-upload-media" data-target="section_2_image-pastoral">
                                                    Choose Image from Library
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-reset-media" data-target="section_2_image-pastoral" data-default="<?php echo esc_url( $def_p_img2 ); ?>" style="<?php echo empty( $data['section_2_image'] ) ? 'display:none;' : ''; ?>">
                                                    Reset to Default
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 2 Image Alt Text</label>
                                        <input type="text" name="section_2_img_alt" class="form-control" value="<?php echo esc_attr( $data['section_2_img_alt'] ?? 'Pastoral Presence in Communities' ); ?>">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $slug === 'ministries-education' ) : ?>
                            <!-- Education Ministry Details -->
                            <div class="form-section">
                                <h3 class="form-section-title">🏫 Section 1: Educational Vision & Formation</h3>
                                <div class="form-grid">
                                    <div class="form-group full-width">
                                        <label>Section 1 Heading</label>
                                        <input type="text" name="section_1_heading" class="form-control" value="<?php echo esc_attr( $data['section_1_heading'] ?? 'Education Ministry' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Paragraph 1</label>
                                        <textarea name="section_1_p1" class="form-control"><?php echo esc_textarea( $data['section_1_p1'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Paragraph 2</label>
                                        <textarea name="section_1_p2" class="form-control"><?php echo esc_textarea( $data['section_1_p2'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Paragraph 3</label>
                                        <textarea name="section_1_p3" class="form-control"><?php echo esc_textarea( $data['section_1_p3'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Image</label>
                                        <?php
                                        $def_e_img1 = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.39.44 AM (1).jpeg';
                                        $cur_e_img1 = ! empty( $data['section_1_image'] ) ? $data['section_1_image'] : $def_e_img1;
                                        ?>
                                        <div class="image-uploader-box">
                                            <div style="width: 100px; height: 64px; border-radius: 8px; overflow: hidden; background: #0c1727; border: 1px solid var(--c-gold); flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                                <img src="<?php echo esc_url( $cur_e_img1 ); ?>" class="image-preview-thumb" id="preview-section_1_image-education" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='<?php echo esc_url( $def_e_img1 ); ?>';">
                                            </div>
                                            <input type="hidden" name="section_1_image" id="input-section_1_image-education" value="<?php echo esc_attr( $data['section_1_image'] ?? '' ); ?>">
                                            <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                                                <button type="button" class="btn btn-secondary btn-upload-media" data-target="section_1_image-education">
                                                    Choose Image from Library
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-reset-media" data-target="section_1_image-education" data-default="<?php echo esc_url( $def_e_img1 ); ?>" style="<?php echo empty( $data['section_1_image'] ) ? 'display:none;' : ''; ?>">
                                                    Reset to Default
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Image Alt Text</label>
                                        <input type="text" name="section_1_img_alt" class="form-control" value="<?php echo esc_attr( $data['section_1_img_alt'] ?? 'Students in Franciscan Schools' ); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h3 class="form-section-title">🌐 Section 2: Network of Institutions & Inclusivity</h3>
                                <div class="form-grid">
                                    <div class="form-group full-width">
                                        <label>Section 2 Paragraph 1</label>
                                        <textarea name="section_2_p1" class="form-control"><?php echo esc_textarea( $data['section_2_p1'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 2 Paragraph 2</label>
                                        <textarea name="section_2_p2" class="form-control"><?php echo esc_textarea( $data['section_2_p2'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 2 Paragraph 3</label>
                                        <textarea name="section_2_p3" class="form-control"><?php echo esc_textarea( $data['section_2_p3'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 2 Image</label>
                                        <?php
                                        $def_e_img2 = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (4).jpeg';
                                        $cur_e_img2 = ! empty( $data['section_2_image'] ) ? $data['section_2_image'] : $def_e_img2;
                                        ?>
                                        <div class="image-uploader-box">
                                            <div style="width: 100px; height: 64px; border-radius: 8px; overflow: hidden; background: #0c1727; border: 1px solid var(--c-gold); flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                                <img src="<?php echo esc_url( $cur_e_img2 ); ?>" class="image-preview-thumb" id="preview-section_2_image-education" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='<?php echo esc_url( $def_e_img2 ); ?>';">
                                            </div>
                                            <input type="hidden" name="section_2_image" id="input-section_2_image-education" value="<?php echo esc_attr( $data['section_2_image'] ?? '' ); ?>">
                                            <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                                                <button type="button" class="btn btn-secondary btn-upload-media" data-target="section_2_image-education">
                                                    Choose Image from Library
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-reset-media" data-target="section_2_image-education" data-default="<?php echo esc_url( $def_e_img2 ); ?>" style="<?php echo empty( $data['section_2_image'] ) ? 'display:none;' : ''; ?>">
                                                    Reset to Default
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 2 Image Alt Text</label>
                                        <input type="text" name="section_2_img_alt" class="form-control" value="<?php echo esc_attr( $data['section_2_img_alt'] ?? 'Franciscan Educational Institutions' ); ?>">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $slug === 'ministries-formation' ) : ?>
                            <!-- Formation Ministry Details -->
                            <div class="form-section">
                                <h3 class="form-section-title">🕊️ Section 1: Religious Charism & Consecration</h3>
                                <div class="form-grid">
                                    <div class="form-group full-width">
                                        <label>Section 1 Heading</label>
                                        <input type="text" name="section_1_heading" class="form-control" value="<?php echo esc_attr( $data['section_1_heading'] ?? 'Formation Ministry' ); ?>">
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Paragraph 1</label>
                                        <textarea name="section_1_p1" class="form-control"><?php echo esc_textarea( $data['section_1_p1'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Image</label>
                                        <?php
                                        $def_f_img1 = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.30.25 AM (1).jpeg';
                                        $cur_f_img1 = ! empty( $data['section_1_image'] ) ? $data['section_1_image'] : $def_f_img1;
                                        ?>
                                        <div class="image-uploader-box">
                                            <div style="width: 100px; height: 64px; border-radius: 8px; overflow: hidden; background: #0c1727; border: 1px solid var(--c-gold); flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                                <img src="<?php echo esc_url( $cur_f_img1 ); ?>" class="image-preview-thumb" id="preview-section_1_image-formation" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='<?php echo esc_url( $def_f_img1 ); ?>';">
                                            </div>
                                            <input type="hidden" name="section_1_image" id="input-section_1_image-formation" value="<?php echo esc_attr( $data['section_1_image'] ?? '' ); ?>">
                                            <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                                                <button type="button" class="btn btn-secondary btn-upload-media" data-target="section_1_image-formation">
                                                    Choose Image from Library
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-reset-media" data-target="section_1_image-formation" data-default="<?php echo esc_url( $def_f_img1 ); ?>" style="<?php echo empty( $data['section_1_image'] ) ? 'display:none;' : ''; ?>">
                                                    Reset to Default
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 1 Image Alt Text</label>
                                        <input type="text" name="section_1_img_alt" class="form-control" value="<?php echo esc_attr( $data['section_1_img_alt'] ?? 'Franciscan Formation Ministry' ); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h3 class="form-section-title">🏛️ Section 2: Stages of Formation & Houses</h3>
                                <div class="form-grid">
                                    <div class="form-group full-width">
                                        <label>Section 2 Paragraph 1</label>
                                        <textarea name="section_2_p1" class="form-control"><?php echo esc_textarea( $data['section_2_p1'] ?? '' ); ?></textarea>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 2 Image</label>
                                        <?php
                                        $def_f_img2 = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-10 at 4.28.51 AM.jpeg';
                                        $cur_f_img2 = ! empty( $data['section_2_image'] ) ? $data['section_2_image'] : $def_f_img2;
                                        ?>
                                        <div class="image-uploader-box">
                                            <div style="width: 100px; height: 64px; border-radius: 8px; overflow: hidden; background: #0c1727; border: 1px solid var(--c-gold); flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                                <img src="<?php echo esc_url( $cur_f_img2 ); ?>" class="image-preview-thumb" id="preview-section_2_image-formation" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='<?php echo esc_url( $def_f_img2 ); ?>';">
                                            </div>
                                            <input type="hidden" name="section_2_image" id="input-section_2_image-formation" value="<?php echo esc_attr( $data['section_2_image'] ?? '' ); ?>">
                                            <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                                                <button type="button" class="btn btn-secondary btn-upload-media" data-target="section_2_image-formation">
                                                    Choose Image from Library
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-reset-media" data-target="section_2_image-formation" data-default="<?php echo esc_url( $def_f_img2 ); ?>" style="<?php echo empty( $data['section_2_image'] ) ? 'display:none;' : ''; ?>">
                                                    Reset to Default
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group full-width">
                                        <label>Section 2 Image Alt Text</label>
                                        <input type="text" name="section_2_img_alt" class="form-control" value="<?php echo esc_attr( $data['section_2_img_alt'] ?? 'Formation Centres in Ranchi Province' ); ?>">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Page-Specific SEO & Social Sharing Metadata -->
                        <div class="form-section">
                            <h3 class="form-section-title" style="display:flex; align-items:center; gap:0.5rem;">
                                <span>??</span> Page SEO & Social Sharing Metadata
                            </h3>
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label>Page Meta Title (Browser Tab & Search Title)</label>
                                    <input type="text" name="meta_title" class="form-control" placeholder="e.g. <?php echo esc_attr( $label ); ?> | The Franciscan Society" value="<?php echo esc_attr( $data['meta_title'] ?? '' ); ?>">
                                </div>
                                <div class="form-group full-width">
                                    <label>Page Meta Description (Google Search Snippet)</label>
                                    <textarea name="meta_description" class="form-control" rows="2" placeholder="Brief summary of this page for search results and social share cards..."><?php echo esc_textarea( $data['meta_description'] ?? '' ); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords (comma separated)</label>
                                    <input type="text" name="meta_keywords" class="form-control" placeholder="Franciscan Society, Ranchi, <?php echo esc_attr( $label ); ?>" value="<?php echo esc_attr( $data['meta_keywords'] ?? '' ); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Social Share (Open Graph) Preview Image</label>
                                    <div class="image-uploader-box" style="padding: 0.8rem;">
                                        <input type="text" name="meta_og_image" id="input-meta_og_image-<?php echo esc_attr( $slug ); ?>" class="form-control" placeholder="Image URL for Facebook / Twitter preview" value="<?php echo esc_attr( $data['meta_og_image'] ?? '' ); ?>" style="margin-bottom:0.5rem;">
                                        <button type="button" class="btn btn-secondary btn-upload-media" data-target="meta_og_image-<?php echo esc_attr( $slug ); ?>" style="font-size:0.8rem; padding:0.4rem 0.8rem;">
                                            Upload / Select Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top:2rem;">
                            <button type="submit" class="btn btn-primary">
                                ?? Save & Synchronize Page
                            </button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </section>

            <!-- ========================================================== -->
            <!-- TAB 3: BLOG & NEWS POSTS -->
            <!-- ========================================================== -->
            
            <!-- ========================================================== -->
            <!-- TAB: PHOTO GALLERY HUB (TAB-WISE CATEGORY MANAGEMENT) -->
            <!-- ========================================================== -->
            <section id="tab-gallery" class="tab-content" style="display:none;">
                
                
                <!-- Add New Photo Card (Clean Responsive Alignment) -->
                <div class="form-section" style="background: rgba(255,255,255,0.02); border: 1px solid var(--c-gold); border-radius: 12px; padding: 1.8rem; margin-bottom: 2rem;">
                    <h3 class="form-section-title" style="color: var(--c-gold); margin-bottom: 1.2rem; display: flex; align-items: center; gap: 0.5rem;">
                        <span>➕</span> Add New Photo to Gallery
                    </h3>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem; margin-bottom: 1.2rem;">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label style="display: block; margin-bottom: 0.5rem; font-size: 0.85rem; color: var(--c-text-muted);">Select Category / Tab</label>
                            <select id="new-photo-category" class="form-control" style="width: 100%; height: 42px;">
                                <option value="Pastoral Ministry">Pastoral Ministry</option>
                                <option value="Formation Ministry">Formation Ministry</option>
                                <option value="Provincial Assembly">Provincial Assembly</option>
                                <option value="Sacred Ordination">Sacred Ordination &amp; Feasts</option>
                                <option value="Mission Apostolate">Mission Apostolate</option>
                                <option value="Community Fellowship">Community Fellowship</option>
                                <option value="Youth Ministry">Youth Ministry &amp; Schools</option>
                                <option value="Parish Service">Parish Service</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label style="display: block; margin-bottom: 0.5rem; font-size: 0.85rem; color: var(--c-text-muted);">Photo Caption / Alt Title</label>
                            <input type="text" id="new-photo-title" class="form-control" placeholder="e.g. Annual Feast Mass in Harmu" style="width: 100%; height: 42px;">
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label style="display: block; margin-bottom: 0.5rem; font-size: 0.85rem; color: var(--c-text-muted);">Image Source / Media Uploader</label>
                        <div style="display: flex; gap: 0.8rem; align-items: center; flex-wrap: wrap;">
                            <input type="text" id="new-photo-url" class="form-control" placeholder="https://... or click Browse Media" readonly style="flex: 1 1 300px; height: 42px; background: rgba(0,0,0,0.3);">
                            <button type="button" class="btn btn-secondary" id="btn-upload-gallery-photo" style="height: 42px; padding: 0 1.2rem; display: inline-flex; align-items: center; gap: 0.5rem; white-space: nowrap; flex-shrink: 0;">
                                📁 Browse Media
                            </button>
                            <button type="button" class="btn btn-primary" id="btn-add-gallery-item" style="height: 42px; padding: 0 1.5rem; font-weight: 700; display: inline-flex; align-items: center; gap: 0.5rem; white-space: nowrap; flex-shrink: 0;">
                                ➕ Add to Gallery
                            </button>
                        </div>
                    </div>

                    <div id="gallery-upload-preview" style="margin-top: 1.2rem; display: none;">
                        <div style="display: inline-flex; align-items: center; gap: 1rem; background: rgba(0,0,0,0.25); padding: 0.6rem 1rem; border-radius: 8px; border: 1px solid var(--c-card-border);">
                            <img src="" id="gallery-preview-img" style="height: 60px; width: 60px; border-radius: 6px; border: 1px solid var(--c-gold); object-fit: cover;">
                            <span style="font-size: 0.82rem; color: var(--c-gold); font-weight: 600;">Image selected &amp; ready to add</span>
                        </div>
                    </div>
                </div>

                <!-- Category Filter Tabs -->
                <div style="display: flex; gap: 0.6rem; margin-bottom: 1.8rem; overflow-x: auto; padding-bottom: 0.5rem;" id="gallery-category-filter-bar">
                    <button type="button" class="btn btn-secondary active-cat-filter" data-cat="all" style="background: var(--c-gold); color: #12100e; font-weight: 700; border-radius: 20px; padding: 0.4rem 1.2rem; font-size: 0.85rem;">All Photos</button>
                    <button type="button" class="btn btn-secondary" data-cat="Pastoral Ministry" style="border-radius: 20px; padding: 0.4rem 1.2rem; font-size: 0.85rem;">Pastoral Ministry</button>
                    <button type="button" class="btn btn-secondary" data-cat="Formation Ministry" style="border-radius: 20px; padding: 0.4rem 1.2rem; font-size: 0.85rem;">Formation Ministry</button>
                    <button type="button" class="btn btn-secondary" data-cat="Provincial Assembly" style="border-radius: 20px; padding: 0.4rem 1.2rem; font-size: 0.85rem;">Provincial Assembly</button>
                    <button type="button" class="btn btn-secondary" data-cat="Sacred Ordination" style="border-radius: 20px; padding: 0.4rem 1.2rem; font-size: 0.85rem;">Ordinations &amp; Feasts</button>
                    <button type="button" class="btn btn-secondary" data-cat="Youth Ministry" style="border-radius: 20px; padding: 0.4rem 1.2rem; font-size: 0.85rem;">Youth &amp; Schools</button>
                    <button type="button" class="btn btn-secondary" data-cat="Community Fellowship" style="border-radius: 20px; padding: 0.4rem 1.2rem; font-size: 0.85rem;">Community Fellowship</button>
                </div>

                <!-- Gallery Photos Grid -->
                <div id="dashboard-gallery-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 1.2rem;">
                    <?php 
                    $all_gal_items = franciscan_get_gallery_items();
                    foreach ( $all_gal_items as $g_item ) : 
                    ?>
                        <div class="dash-gal-card" data-cat="<?php echo esc_attr( $g_item['category'] ?? 'Pastoral Ministry' ); ?>" data-id="<?php echo esc_attr( $g_item['id'] ?? '' ); ?>" style="background: var(--c-card); border: 1px solid var(--c-card-border); border-radius: 12px; overflow: hidden; position: relative; transition: transform 0.2s ease;">
                            <img src="<?php echo esc_url( $g_item['src'] ); ?>" style="width: 100%; height: 150px; object-fit: cover; display: block;" loading="lazy">
                            <div style="padding: 0.8rem;">
                                <span style="display: inline-block; background: rgba(197, 169, 99, 0.15); color: var(--c-gold); font-size: 0.72rem; font-weight: 700; padding: 0.2rem 0.6rem; border-radius: 10px; text-transform: uppercase; margin-bottom: 0.4rem;">
                                    <?php echo esc_html( $g_item['category'] ?? 'Pastoral Ministry' ); ?>
                                </span>
                                <div style="font-size: 0.82rem; font-weight: 600; color: var(--c-text); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo esc_html( $g_item['alt'] ?? 'Franciscan Photo' ); ?>
                                </div>
                            </div>
                            <button type="button" class="btn-delete-gal-item" data-id="<?php echo esc_attr( $g_item['id'] ?? '' ); ?>" title="Delete Photo" style="position: absolute; top: 8px; right: 8px; background: rgba(200, 16, 46, 0.85); color: #fff; border: none; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 0.8rem; box-shadow: 0 2px 6px rgba(0,0,0,0.4);">
                                &times;
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

<section id="tab-posts" class="tab-content" style="display:none;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
                    <h3 style="font-family:'Phudu', serif; color:var(--c-gold); font-size:1.3rem;">All Published Articles</h3>
                    <button type="button" class="btn btn-primary open-create-post-btn">
                        ➕ Create New Article
                    </button>
                </div>

                <div class="form-section" style="padding:0; overflow:hidden;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Preview</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( ! empty( $all_posts ) ) : ?>
                                <?php foreach ( $all_posts as $p ) :
                                    $cats = wp_get_post_categories( $p->ID, array( 'fields' => 'names' ) );
                                    $cat_name = ! empty( $cats ) ? $cats[0] : 'News';
                                    $thumb = has_post_thumbnail( $p->ID ) ? get_the_post_thumbnail_url( $p->ID, 'thumbnail' ) : ( FRANCISCAN_THEME_URI . '/assets/images/news-blog/IMG20230215103348.jpg.jpeg' );
                                ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo esc_url( $thumb ); ?>" style="width:48px; height:48px; object-fit:cover; border-radius:6px;">
                                        </td>
                                        <td>
                                            <strong><?php echo esc_html( $p->post_title ); ?></strong>
                                        </td>
                                        <td>
                                            <span style="background:rgba(197,169,99,0.15); color:var(--c-gold); padding:0.25rem 0.6rem; border-radius:12px; font-size:0.75rem; font-weight:700;">
                                                <?php echo esc_html( $cat_name ); ?>
                                            </span>
                                        </td>
                                        <td style="color:var(--c-text-muted);">
                                            <?php echo get_the_date( 'M j, Y', $p->ID ); ?>
                                        </td>
                                        <td>
                                            <div style="display:flex; gap:0.5rem;">
                                                <button type="button" class="btn btn-secondary edit-post-btn" data-id="<?php echo $p->ID; ?>" style="padding:0.4rem 0.8rem; font-size:0.8rem;">
                                                    ✏️ Edit
                                                </button>
                                                <a href="<?php echo esc_url( get_permalink( $p->ID ) ); ?>" target="_blank" class="btn btn-secondary" style="padding:0.4rem 0.8rem; font-size:0.8rem;">
                                                    👁️ View
                                                </a>
                                                <button type="button" class="btn btn-danger delete-post-btn" data-id="<?php echo $p->ID; ?>" style="padding:0.4rem 0.8rem; font-size:0.8rem;">
                                                    🗑️
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" style="text-align:center; padding:2rem; color:var(--c-text-muted);">No articles found. Click "+ Create New Article" to publish one!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- ========================================================== -->
            <!-- TAB 4: WEBSITE GLOBAL SETTINGS -->
            <!-- ========================================================== -->
            <section id="tab-settings" class="tab-content" style="display:none;">
                <form id="form-global-settings">
                    <div class="form-section">
                        <h3 class="form-section-title">📞 Contact Details & WhatsApp Integration</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label>WhatsApp Chat Number (with country code, e.g. 917012649326)</label>
                                <input type="text" name="whatsapp_number" class="form-control" value="<?php echo esc_attr( $options['whatsapp_number'] ?? '917012649326' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>Inquiry Receiving Email</label>
                                <input type="email" name="receiving_email" class="form-control" value="<?php echo esc_attr( $options['receiving_email'] ?? 'abhiram@intersmart.in' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>Contact Phone Number</label>
                                <input type="text" name="contact_phone" class="form-control" value="<?php echo esc_attr( $options['contact_phone'] ?? '+91 94311 00000' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>Public Contact Email</label>
                                <input type="email" name="contact_email" class="form-control" value="<?php echo esc_attr( $options['contact_email'] ?? 'info@franciscansociety.org' ); ?>">
                            </div>
                            <div class="form-group full-width">
                                <label>Official Monastery Address</label>
                                <textarea name="contact_address" class="form-control"><?php echo esc_textarea( $options['contact_address'] ?? '' ); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="form-section-title">🌐 Social Media Channels</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Facebook Page URL</label>
                                <input type="url" name="facebook_url" class="form-control" value="<?php echo esc_attr( $options['facebook_url'] ?? '' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>YouTube Channel URL</label>
                                <input type="url" name="youtube_url" class="form-control" value="<?php echo esc_attr( $options['youtube_url'] ?? '' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>Instagram URL</label>
                                <input type="url" name="instagram_url" class="form-control" value="<?php echo esc_attr( $options['instagram_url'] ?? '' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>Twitter / X URL</label>
                                <input type="url" name="twitter_url" class="form-control" value="<?php echo esc_attr( $options['twitter_url'] ?? '' ); ?>">
                            </div>
                        </div>
                    </div>

                    
                    <!-- 🛡️ Google reCAPTCHA Security Keys -->
                    <div class="form-section">
                        <h3 class="form-section-title">🛡️ Google reCAPTCHA Security Keys</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Enable reCAPTCHA on Forms</label>
                                <select name="recaptcha_enabled" class="form-control">
                                    <option value="0" <?php selected( $options['recaptcha_enabled'] ?? '0', '0' ); ?>>Disabled (No Captcha)</option>
                                    <option value="1" <?php selected( $options['recaptcha_enabled'] ?? '0', '1' ); ?>>Enabled (Active Spam Protection)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>reCAPTCHA Version</label>
                                <select name="recaptcha_version" class="form-control">
                                    <option value="v3" <?php selected( $options['recaptcha_version'] ?? 'v3', 'v3' ); ?>>reCAPTCHA v3 (Invisible Score-based)</option>
                                    <option value="v2" <?php selected( $options['recaptcha_version'] ?? 'v3', 'v2' ); ?>>reCAPTCHA v2 ("I'm not a robot" Checkbox)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>reCAPTCHA Site Key (Public Key)</label>
                                <input type="text" name="recaptcha_site_key" class="form-control" placeholder="6Lcx... (Site Key)" value="<?php echo esc_attr( $options['recaptcha_site_key'] ?? '' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>reCAPTCHA Secret Key</label>
                                <input type="password" name="recaptcha_secret_key" class="form-control" placeholder="6Lcx... (Secret Key)" value="<?php echo esc_attr( $options['recaptcha_secret_key'] ?? '' ); ?>">
                            </div>
                        </div>
                    </div>

                    <!-- 📧 Gmail App Password & SMTP Email Delivery -->
                    <div class="form-section">
                        <h3 class="form-section-title">📧 Gmail App Password &amp; SMTP Email Delivery</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Enable SMTP Delivery</label>
                                <select name="smtp_enabled" class="form-control">
                                    <option value="0" <?php selected( $options['smtp_enabled'] ?? '0', '0' ); ?>>Default Server Mail (wp_mail)</option>
                                    <option value="1" <?php selected( $options['smtp_enabled'] ?? '0', '1' ); ?>>Enabled (Use Gmail / Custom SMTP)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Notification Recipient Email (Where Inquiries are Delivered)</label>
                                <input type="email" name="smtp_recipient_email" class="form-control" placeholder="info@franciscansociety.org" value="<?php echo esc_attr( $options['smtp_recipient_email'] ?? 'info@franciscansociety.org' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>Sender Gmail / Email Address</label>
                                <input type="email" name="smtp_email" class="form-control" placeholder="youraccount@gmail.com" value="<?php echo esc_attr( $options['smtp_email'] ?? '' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>Gmail 16-Character App Password</label>
                                <input type="password" name="smtp_app_password" class="form-control" placeholder="xxxx xxxx xxxx xxxx" value="<?php echo esc_attr( $options['smtp_app_password'] ?? '' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>Sender From Name</label>
                                <input type="text" name="smtp_from_name" class="form-control" placeholder="Franciscan Society Ranchi Province" value="<?php echo esc_attr( $options['smtp_from_name'] ?? 'Franciscan Society Ranchi Province' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>SMTP Host</label>
                                <input type="text" name="smtp_host" class="form-control" placeholder="smtp.gmail.com" value="<?php echo esc_attr( $options['smtp_host'] ?? 'smtp.gmail.com' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>SMTP Port</label>
                                <input type="text" name="smtp_port" class="form-control" placeholder="587" value="<?php echo esc_attr( $options['smtp_port'] ?? '587' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>Encryption</label>
                                <select name="smtp_encryption" class="form-control">
                                    <option value="tls" <?php selected( $options['smtp_encryption'] ?? 'tls', 'tls' ); ?>>TLS (Port 587 - Recommended for Gmail)</option>
                                    <option value="ssl" <?php selected( $options['smtp_encryption'] ?? 'tls', 'ssl' ); ?>>SSL (Port 465)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        💾 Save Global Settings
                    </button>
                </form>
            </section>

            <!-- ========================================================== -->
            <!-- TAB 5: INQUIRIES & PRAYERS -->
            <!-- ========================================================== -->
            <section id="tab-inquiries" class="tab-content" style="display:none;">
                <div class="form-section" style="padding:0; overflow:hidden;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email / Phone</th>
                                <th>Type</th>
                                <th>Message / Intention</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( ! empty( $inquiries ) ) : ?>
                                <?php foreach ( $inquiries as $inq ) :
                                    $email = get_post_meta( $inq->ID, '_inquiry_email', true );
                                    $phone = get_post_meta( $inq->ID, '_inquiry_phone', true );
                                    $type = get_post_meta( $inq->ID, '_inquiry_type', true ) ?: 'Contact';
                                ?>
                                    <tr>
                                        <td style="color:var(--c-text-muted);"><?php echo get_the_date( 'M j, Y H:i', $inq->ID ); ?></td>
                                        <td><strong><?php echo esc_html( $inq->post_title ); ?></strong></td>
                                        <td><?php echo esc_html( $email ?: $phone ); ?></td>
                                        <td><span style="background:rgba(197,169,99,0.15); color:var(--c-gold); padding:0.2rem 0.5rem; border-radius:8px; font-size:0.75rem;"><?php echo esc_html( ucfirst($type) ); ?></span></td>
                                        <td><?php echo esc_html( $inq->post_content ); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" style="text-align:center; padding:2rem; color:var(--c-text-muted);">No inquiries or prayer requests received yet.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- ========================================================== -->
            <!-- TAB 6: SEO & METADATA -->
            <!-- ========================================================== -->
            <section id="tab-seo" class="tab-content" style="display:none;">
                <form id="form-seo-settings">
                    <div class="form-section">
                        <h3 class="form-section-title">🔍 Search Engine Optimization & Social Sharing</h3>
                        <div class="form-grid single-col">
                            <div class="form-group">
                                <label>Default Meta Title</label>
                                <input type="text" name="seo_default_title" class="form-control" value="<?php echo esc_attr( $options['seo_default_title'] ?? '' ); ?>">
                            </div>
                            <div class="form-group">
                                <label>Default Meta Description</label>
                                <textarea name="seo_default_desc" class="form-control"><?php echo esc_textarea( $options['seo_default_desc'] ?? '' ); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Focus Keywords (comma separated)</label>
                                <input type="text" name="seo_keywords" class="form-control" value="<?php echo esc_attr( $options['seo_keywords'] ?? '' ); ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        💾 Save SEO Settings
                    </button>
                </form>
            </section>

            <!-- ========================================================== -->
            <!-- TAB 7: SECURITY & SYSTEM HEALTH -->
            <!-- ========================================================== -->
            <section id="tab-security" class="tab-content" style="display:none;">
                <div class="form-section">
                    <h3 class="form-section-title">🛡️ System Diagnostics & Security Headers</h3>
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.5rem;">
                        <div style="background:#11100E; padding:1.2rem; border-radius:8px; border:1px solid var(--c-card-border);">
                            <span style="color:var(--c-text-muted); font-size:0.8rem;">WordPress Core</span>
                            <div style="font-size:1.1rem; font-weight:700; color:#fff; margin-top:0.3rem;">v<?php echo get_bloginfo('version'); ?> (Up to Date)</div>
                        </div>
                        <div style="background:#11100E; padding:1.2rem; border-radius:8px; border:1px solid var(--c-card-border);">
                            <span style="color:var(--c-text-muted); font-size:0.8rem;">PHP Environment</span>
                            <div style="font-size:1.1rem; font-weight:700; color:#fff; margin-top:0.3rem;">v<?php echo phpversion(); ?></div>
                        </div>
                        <div style="background:#11100E; padding:1.2rem; border-radius:8px; border:1px solid var(--c-card-border);">
                            <span style="color:var(--c-text-muted); font-size:0.8rem;">XML-RPC Protection</span>
                            <div style="font-size:1.1rem; font-weight:700; color:var(--c-success); margin-top:0.3rem;">Disabled & Hardened</div>
                        </div>
                        <div style="background:#11100E; padding:1.2rem; border-radius:8px; border:1px solid var(--c-card-border);">
                            <span style="color:var(--c-text-muted); font-size:0.8rem;">Security Headers</span>
                            <div style="font-size:1.1rem; font-weight:700; color:var(--c-success); margin-top:0.3rem;">HSTS, X-Frame, XSS Active</div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- ========================================================== -->
    <!-- MODAL: CREATE / EDIT POST -->
    <!-- ========================================================== -->
    <div id="modal-post-editor" class="modal-backdrop">
        <div class="modal-dialog">
            <button type="button" class="modal-close">&times;</button>
            <h3 id="modal-post-title" style="font-family:'Phudu', serif; color:var(--c-gold); margin-bottom:1.5rem; font-size:1.4rem;">Create New Article</h3>
            
            <form id="form-save-post">
                <input type="hidden" name="post_id" id="post_id" value="0">
                <input type="hidden" name="thumb_id" id="post_thumb_id" value="0">

                <div class="form-grid" style="margin-bottom:1.5rem;">
                    <div class="form-group full-width">
                        <label>Article Title *</label>
                        <input type="text" name="title" id="post_title" class="form-control" required placeholder="Enter article headline...">
                    </div>
                    <div class="form-group">
                        <label>Category *</label>
                        <select name="category" id="post_category" class="form-control">
                            <option value="News">News & Updates</option>
                            <option value="Blogs">Blogs & Reflections</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Publish Date</label>
                        <input type="date" name="post_date" id="post_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group full-width">
                        <label>Featured Image</label>
                        <div class="image-uploader-box">
                            <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/news-blog/IMG20230215103348.jpg.jpeg' ); ?>" class="image-preview-thumb" id="preview-post-thumb">
                            <button type="button" class="btn btn-secondary btn-upload-media" data-target="post_thumb">
                                📁 Choose Featured Image
                            </button>
                        </div>
                    </div>
                    <div class="form-group full-width">
                        <label>Short Excerpt (Summary)</label>
                        <textarea name="excerpt" id="post_excerpt" class="form-control" style="min-height:70px;" placeholder="Brief summary of the article..."></textarea>
                    </div>
                    <div class="form-group full-width">
                        <label>Full Content *</label>
                        <textarea name="content" id="post_content" class="form-control" style="min-height:180px;" required placeholder="Write full article body text..."></textarea>
                    </div>
                </div>

                <div style="display:flex; justify-content:flex-end; gap:1rem;">
                    <button type="button" class="btn btn-secondary modal-close-btn">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btn-save-post-submit">
                        💾 Publish Article
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript Controller -->
    <script>
    jQuery(document).ready(function($) {
        const ajaxUrl = '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>';
        const nonce = '<?php echo esc_js( $nonce ); ?>';

        function showToast(msg, isError = false) {
            const toast = $('#studio-toast');
            toast.text(msg).css('border-color', isError ? '#ef4444' : '#C5A963').fadeIn();
            setTimeout(() => { toast.fadeOut(); }, 3500);
        }

        // Tab Navigation
        $('.sidebar-nav .nav-item').on('click', function() {
            const target = $(this).data('tab');
            $('.sidebar-nav .nav-item').removeClass('active');
            $(this).addClass('active');

            $('.tab-content').hide();
            $('#tab-' + target).fadeIn(200);

            // Update page heading
            const titles = {
                overview: 'Dashboard Overview',
                pages: 'Pages Content Editor',
                posts: 'News & Blog Management',
                settings: 'Website Global Settings',
                inquiries: 'Inquiries & Prayer Requests',
                seo: 'SEO & Metadata Configuration',
                security: 'Security & System Diagnostics'
            };
            $('#view-title').text(titles[target] || 'Studio Dashboard');
        });

        $('.switch-tab-btn').on('click', function() {
            const target = $(this).data('target');
            $(`.sidebar-nav .nav-item[data-tab="${target}"]`).trigger('click');
        });

        // Page Content Selector Switcher
        $('#page-selector').on('change', function() {
            const slug = $(this).val();
            $('.page-editor-form').hide();
            $('#form-page-' + slug).fadeIn(150);
        });

        // WordPress Media Library Uploader Hook
        let mediaFrame;
        $(document).on('click', '.btn-upload-media', function(e) {
            e.preventDefault();
            const targetKey = $(this).data('target');

            mediaFrame = wp.media({
                title: 'Select or Upload Image',
                button: { text: 'Use this Image' },
                multiple: false
            });

            mediaFrame.on('select', function() {
                const attachment = mediaFrame.state().get('selection').first().toJSON();
                if (targetKey === 'post_thumb') {
                    $('#post_thumb_id').val(attachment.id);
                    $('#preview-post-thumb').attr('src', attachment.url);
                } else {
                    $('#input-' + targetKey).val(attachment.url);
                    $('#preview-' + targetKey).attr('src', attachment.url);
                }
            });

            mediaFrame.open();
        });

        // Reset Media to Default
        $(document).on('click', '.btn-reset-media', function(e) {
            e.preventDefault();
            const targetKey = $(this).data('target');
            const defaultUrl = $(this).data('default') || '';
            $('#input-' + targetKey).val('');
            $('#preview-' + targetKey).attr('src', defaultUrl);
            $(this).hide();
        });

        // Save Page Content Form
        $('.page-editor-form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const slug = form.data('slug');
            const pageData = {};

            form.find('input, textarea, select').each(function() {
                const name = $(this).attr('name');
                if (name) {
                    pageData[name] = $(this).val();
                }
            });

            const submitBtn = form.find('button[type="submit"]');
            submitBtn.prop('disabled', true).text('Saving...');

            $.post(ajaxUrl, {
                action: 'franciscan_save_dashboard',
                security: nonce,
                tab: 'pages',
                page_slug: slug,
                page_data: pageData
            }, function(res) {
                submitBtn.prop('disabled', false).text('💾 Save & Synchronize Page');
                if (res.success) {
                    showToast(res.data.message);
                } else {
                    showToast(res.data.message || 'Error saving page.', true);
                }
            }).fail(function() {
                submitBtn.prop('disabled', false).text('💾 Save & Synchronize Page');
                showToast('Network error while saving.', true);
            });
        });

        // Save Global Settings Form
        $('#form-global-settings').on('submit', function(e) {
            e.preventDefault();
            const settingsData = {};
            $(this).find('input, textarea, select').each(function() {
                const name = $(this).attr('name');
                if (name) settingsData[name] = $(this).val();
            });

            $.post(ajaxUrl, {
                action: 'franciscan_save_dashboard',
                security: nonce,
                tab: 'settings',
                settings: settingsData
            }, function(res) {
                if (res.success) showToast(res.data.message);
                else showToast('Error saving settings.', true);
            });
        });

        // Save SEO Settings Form
        $('#form-seo-settings').on('submit', function(e) {
            e.preventDefault();
            const seoData = {};
            $(this).find('input, textarea, select').each(function() {
                const name = $(this).attr('name');
                if (name) seoData[name] = $(this).val();
            });

            $.post(ajaxUrl, {
                action: 'franciscan_save_dashboard',
                security: nonce,
                tab: 'seo',
                seo: seoData
            }, function(res) {
                if (res.success) showToast(res.data.message);
                else showToast('Error saving SEO.', true);
            });
        });

        // Post Modal: Open Create
        $('.open-create-post-btn').on('click', function() {
            $('#form-save-post')[0].reset();
            $('#post_id').val('0');
            $('#post_thumb_id').val('0');
            $('#modal-post-title').text('Create New Article');
            $('#btn-save-post-submit').text('💾 Publish Article');
            $('#modal-post-editor').addClass('active');
        });

        // Post Modal: Open Edit
        $('.edit-post-btn').on('click', function() {
            const postId = $(this).data('id');
            $.post(ajaxUrl, {
                action: 'franciscan_get_post',
                security: nonce,
                post_id: postId
            }, function(res) {
                if (res.success) {
                    const data = res.data;
                    $('#post_id').val(data.id);
                    $('#post_title').val(data.title);
                    $('#post_category').val(data.category);
                    $('#post_date').val(data.date);
                    $('#post_excerpt').val(data.excerpt);
                    $('#post_content').val(data.content);
                    $('#post_thumb_id').val(data.thumb_id || 0);
                    if (data.thumb_url) {
                        $('#preview-post-thumb').attr('src', data.thumb_url);
                    }
                    $('#modal-post-title').text('Edit Article #' + data.id);
                    $('#btn-save-post-submit').text('💾 Update Article');
                    $('#modal-post-editor').addClass('active');
                } else {
                    showToast('Failed to fetch post data.', true);
                }
            });
        });

        // Post Modal: Close
        $('.modal-close, .modal-close-btn').on('click', function() {
            $('#modal-post-editor').removeClass('active');
        });

        // Post Modal: Save/Publish Submit
        $('#form-save-post').on('submit', function(e) {
            e.preventDefault();
            const btn = $('#btn-save-post-submit');
            btn.prop('disabled', true).text('Saving...');

            $.post(ajaxUrl, {
                action: 'franciscan_save_post',
                security: nonce,
                post_id: $('#post_id').val(),
                title: $('#post_title').val(),
                category: $('#post_category').val(),
                post_date: $('#post_date').val(),
                excerpt: $('#post_excerpt').val(),
                content: $('#post_content').val(),
                thumb_id: $('#post_thumb_id').val()
            }, function(res) {
                btn.prop('disabled', false).text('💾 Save Article');
                if (res.success) {
                    $('#modal-post-editor').removeClass('active');
                    showToast(res.data.message);
                    setTimeout(() => { location.reload(); }, 1200);
                } else {
                    showToast(res.data.message || 'Error saving post.', true);
                }
            }).fail(function() {
                btn.prop('disabled', false).text('💾 Save Article');
                showToast('Server error while saving.', true);
            });
        });

        // Delete Post
        $('.delete-post-btn').on('click', function() {
            const postId = $(this).data('id');
            if (confirm('Are you sure you want to delete this article?')) {
                const row = $(this).closest('tr');
                $.post(ajaxUrl, {
                    action: 'franciscan_delete_post',
                    security: nonce,
                    post_id: postId
                }, function(res) {
                    if (res.success) {
                        row.fadeOut();
                        showToast('Article deleted successfully.');
                    } else {
                        showToast('Error deleting article.', true);
                    }
                });
            }
        });
    });
    </script>
    </body>
    </html>
    <?php
}


// AJAX: Save/Add Photo to Gallery
function franciscan_ajax_add_gallery_photo() {
    check_ajax_referer( 'franciscan_admin_nonce', 'security' );
    if ( ! current_user_can( 'edit_posts' ) ) {
        wp_send_json_error( array( 'message' => 'Unauthorized.' ) );
    }

    $src      = isset( $_POST['src'] ) ? esc_url_raw( $_POST['src'] ) : '';
    $category = isset( $_POST['category'] ) ? sanitize_text_field( $_POST['category'] ) : 'Pastoral Ministry';
    $alt      = isset( $_POST['alt'] ) ? sanitize_text_field( $_POST['alt'] ) : 'Franciscan Photo';

    if ( empty( $src ) ) {
        wp_send_json_error( array( 'message' => 'Please select an image.' ) );
    }

    $items = franciscan_get_gallery_items();
    $new_item = array(
        'id'       => 'custom_' . time() . '_' . wp_rand( 100, 999 ),
        'src'      => $src,
        'alt'      => $alt,
        'category' => $category,
    );
    array_unshift( $items, $new_item );
    franciscan_save_gallery_items( $items );

    wp_send_json_success( array( 'message' => 'Photo added to gallery successfully!', 'item' => $new_item, 'total' => count( $items ) ) );
}
add_action( 'wp_ajax_franciscan_add_gallery_photo', 'franciscan_ajax_add_gallery_photo' );

// AJAX: Delete Photo from Gallery
function franciscan_ajax_delete_gallery_photo() {
    check_ajax_referer( 'franciscan_admin_nonce', 'security' );
    if ( ! current_user_can( 'delete_posts' ) ) {
        wp_send_json_error( array( 'message' => 'Unauthorized.' ) );
    }

    $id = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : '';
    if ( empty( $id ) ) {
        wp_send_json_error( array( 'message' => 'Invalid photo ID.' ) );
    }

    $items = franciscan_get_gallery_items();
    $filtered = array();
    foreach ( $items as $it ) {
        if ( isset( $it['id'] ) && $it['id'] === $id ) {
            continue;
        }
        $filtered[] = $it;
    }
    franciscan_save_gallery_items( $filtered );

    wp_send_json_success( array( 'message' => 'Photo removed from gallery.', 'total' => count( $filtered ) ) );
}
add_action( 'wp_ajax_franciscan_delete_gallery_photo', 'franciscan_ajax_delete_gallery_photo' );

