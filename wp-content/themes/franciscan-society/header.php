<?php
/**
 * The Header for Franciscan Society Theme
 *
 * @package Franciscan_Society
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/fav.png' ); ?>">
    <link rel="shortcut icon" href="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/fav.png' ); ?>">
    <link rel="apple-touch-icon" href="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/fav.png' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#8b6f47">
    <?php
    // Dynamic Page & Global SEO Metadata
    $current_page_slug = 'home';
    if ( is_front_page() || is_home() ) {
        $current_page_slug = 'home';
    } elseif ( is_page() ) {
        global $post;
        $current_page_slug = $post ? $post->post_name : 'home';
    }
    $page_seo = function_exists( 'franciscan_get_page_content' ) ? franciscan_get_page_content( $current_page_slug ) : array();
    $global_seo = function_exists( 'franciscan_get_options' ) ? franciscan_get_options() : array();
    $meta_title = ! empty( $page_seo['meta_title'] ) ? $page_seo['meta_title'] : ( ! empty( $global_seo['seo_default_title'] ) ? $global_seo['seo_default_title'] : ( is_front_page() ? get_bloginfo( 'name' ) . ' | Third Order Regular of St. Francis - Ranchi Province' : wp_get_document_title() ) );
    $meta_desc  = ! empty( $page_seo['meta_description'] ) ? $page_seo['meta_description'] : ( ! empty( $global_seo['seo_default_desc'] ) ? $global_seo['seo_default_desc'] : 'The Franciscan Society - Third Order Regular of St. Francis in Ranchi Province. Conversion, contemplation, and service in Jharkhand and global missions.' );
    $meta_keys  = ! empty( $page_seo['meta_keywords'] ) ? $page_seo['meta_keywords'] : ( ! empty( $global_seo['seo_keywords'] ) ? $global_seo['seo_keywords'] : 'Franciscan, Third Order Regular, St. Francis, Ranchi, Catholic, religious community' );
    
    // Determine appropriate Meta / OG Image for the current page
    $meta_image = '';
    if ( ! empty( $page_seo['meta_og_image'] ) ) {
        $meta_image = $page_seo['meta_og_image'];
    } elseif ( is_singular() && has_post_thumbnail() ) {
        $meta_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
    } elseif ( ! empty( $page_seo['hero_image'] ) ) {
        $meta_image = $page_seo['hero_image'];
    } elseif ( ! empty( $page_seo['section_1_image'] ) ) {
        $meta_image = $page_seo['section_1_image'];
    } else {
        // Page-specific default imagery
        switch ( $current_page_slug ) {
            case 'ministries-pastoral':
                $meta_image = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 1.39.44 PM.jpeg';
                break;
            case 'ministries-education':
                $meta_image = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.39.44 AM (1).jpeg';
                break;
            case 'ministries-formation':
                $meta_image = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.30.25 AM (1).jpeg';
                break;
            case 'ministries':
                $meta_image = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png';
                break;
            case 'about':
                $meta_image = FRANCISCAN_THEME_URI . '/assets/images/church-bg.jpg';
                break;
            case 'gallery':
                $meta_image = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (2).jpeg';
                break;
            case 'contact':
                $meta_image = FRANCISCAN_THEME_URI . '/assets/images/church-bg.jpg';
                break;
            default:
                // Primary Hero Banner as general fallback
                $meta_image = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/hero-banner-aug20.jpeg';
                break;
        }
    }
    $canonical_url = home_url( add_query_arg( array(), $GLOBALS['wp']->request ?? '' ) );
    ?>
    <title><?php echo esc_html( $meta_title ); ?></title>
    <meta name="description" content="<?php echo esc_attr( $meta_desc ); ?>">
    <meta name="keywords" content="<?php echo esc_attr( $meta_keys ); ?>">
    <link rel="canonical" href="<?php echo esc_url( $canonical_url ); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo esc_attr( $meta_title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $meta_desc ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $canonical_url ); ?>">
    <meta property="og:image" content="<?php echo esc_url( $meta_image ); ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $meta_title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $meta_desc ); ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $meta_image ); ?>">

    <!-- Apple Mobile Tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Phudu:wght@400..900&family=DM+Sans:wght@400..900&display=swap" rel="stylesheet">
    
    <style>
        /* Global body padding for fixed header */
         body.home { padding-top: 0 !important; }

        @media (max-width: 991px) {
          
        }

        /* Mobile layout (force full bleed � no side gaps) */
        @media (max-width: 991px) {
            html, body { margin: 0 !important; padding: 0 !important; overflow-x: hidden !important; }
            #site-wrapper { margin: 0 !important; padding: 0 !important; overflow-x: hidden !important; }
            #main-content { margin: 0 !important; padding: 0 !important; }
            .hero-section {
                padding: 0 !important;
                margin: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
                left: 0 !important;
                right: 0 !important;
                overflow: hidden !important;
                box-sizing: border-box !important;
            }
            .hero-section > div,
            .hero-section > div.hero-container,
            .hero-container {
                border-radius: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
                min-height: auto !important;
                box-shadow: none !important;
                overflow: visible !important;
            }
            #hero-bg-video {
                display: block !important;
                border-radius: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                aspect-ratio: 16/9 !important;
                position: relative !important;
                left: 0 !important;
                right: 0 !important;
                margin: 0 !important;
                padding: 0 !important;
                object-fit: cover !important;
            }
        }
        
        /* Mobile counters center alignment */
        @media (max-width: 991px) {
            .responsive-grid-3 {
                text-align: center !important;
                grid-template-columns: 1fr !important;
                gap: 1.5rem !important;
            }
            .responsive-grid-3 > div {
                border-right: none !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.25) !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
                padding-bottom: 1.5rem !important;
            }
            .responsive-grid-3 > div:last-child {
                border-bottom: none !important;
                padding-bottom: 0 !important;
            }
        }
        /* Desktop layout */
        @media (min-width: 992px) {
            .hero-section { padding: 0 1.5rem 0 1.5rem !important; margin-top: 0 !important; }
            .hero-section > div.hero-container { min-height: 100vh; border-radius: 0 0 24px 24px; box-shadow: 0 20px 50px rgba(0,0,0,0.18); max-width: 1400px; margin: 0 auto; }
            #hero-bg-video { border-radius: 0 0 24px 24px; position: absolute; inset: 0; width: 100%; height: 120%; object-fit: cover; z-index: 1; }
        }
        
        /* Mobile counters center alignment */
        @media (max-width: 991px) {
            .responsive-grid-3 {
                text-align: center !important;
                grid-template-columns: 1fr !important;
                gap: 1.5rem !important;
            }
            .responsive-grid-3 > div {
                border-right: none !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.25) !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
                padding-bottom: 1.5rem !important;
            }
            .responsive-grid-3 > div:last-child {
                border-bottom: none !important;
                padding-bottom: 0 !important;
            }
        }
        /* Hide sticky widgets when mobile menu is open */
        @media (max-width: 991px) {
            body.menu-open #welcome-scroll-bible-container,
            body.menu-open #bottom-widgets-container,
            body.menu-open [style*="position: sticky"],
            body.menu-open [style*="position: fixed"][style*="bottom"] {
                display: none !important;
            }
        }

        /* Menu item consistency */
        .mobile-nav-drawer .drawer-nav > a,
        .mobile-nav-drawer .drawer-nav .submenu-toggle {
            font-family: 'Instrument Sans', sans-serif !important;
            font-size: 1.1rem !important;
            font-weight: 600 !important;
            margin-bottom: 1rem !important;
            display: block !important;
            transition: color 0.2s ease !important;
        }

        .mobile-nav-drawer .drawer-nav > a:hover,
        .mobile-nav-drawer .drawer-nav > a:focus,
        .mobile-nav-drawer .drawer-nav .submenu-toggle:hover,
        .mobile-nav-drawer .drawer-nav .submenu-toggle:focus {
            color: #e6c888 !important;
        }

        .submenu {
            display: none !important;
        }

        .submenu.open {
            display: flex !important;
        }

        .submenu-toggle {
            background: none;
            border: none;
            color: #fff;
            padding: 0;
            cursor: pointer;
        }

        .submenu-toggle.active .submenu-arrow {
            transform: rotate(180deg);
        }

        .submenu a {
            margin-bottom: 0.5rem !important;
            display: block !important;
            font-size: 1.1rem !important;
            color: #d6d3d1 !important;
            transition: color 0.2s ease !important;
        }

        .submenu a:hover,
        .submenu a:focus {
            color: #e6c888 !important;
        }

        @media (max-width: 991px) {
            body.menu-open #bottom-widgets-container,
            body.menu-open #welcome-scroll-bible-container {
                display: none !important;
            }
        }

        footer {
            position: relative;
            z-index: 10 !important;
        }
            /* Mobile hero buttons - ensure both visible */
        @media (max-width: 991px) {
            .hero-buttons-row {
                flex-direction: column !important;
                gap: 1rem !important;
                width: 100% !important;
            }
            .hero-buttons-row a {
                width: 100% !important;
                text-align: center !important;
                padding: 1.2rem 1.5rem !important;
                display: flex !important;
                opacity: 1 !important;
                visibility: visible !important;
            }
            .btn-fill-animation {
                display: flex !important;
                opacity: 1 !important;
                visibility: visible !important;
                width: 100% !important;
            }
            .btn-fill-outline {
                background-color: transparent !important;
                border: 1.5px solid rgba(255, 255, 255, 0.9) !important;
                color: #ffffff !important;
                display: flex !important;
                opacity: 1 !important;
                visibility: visible !important;
                width: 100% !important;
            }
            .btn-fill-outline:hover {
                color: #4A2A18 !important;
            }
        }
        
/* ============================================================
   SLIDER ARROWS HOVER ANIMATION (Blogs & News Sections)
   ============================================================ */
.slider-btn,
button.slider-btn,
.slider-btn--prev,
.slider-btn--next {
    width: 48px !important;
    height: 48px !important;
    min-width: 48px !important;
    min-height: 48px !important;
    border-radius: 50% !important;
    background-color: #4A2A18 !important;
    border: 1.5px solid #4A2A18 !important;
    color: #ffffff !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 1.35rem !important;
    line-height: 1 !important;
    cursor: pointer !important;
    box-shadow: 0 4px 14px rgba(74, 42, 24, 0.25) !important;
    transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease, transform 0.25s ease, box-shadow 0.3s ease !important;
    outline: none !important;
    position: relative !important;
    z-index: 10 !important;
    overflow: hidden !important;
    padding: 0 !important;
}

.slider-btn::before,
.slider-btn::after,
button.slider-btn::before,
button.slider-btn::after {
    display: none !important;
    content: none !important;
}

.slider-btn:hover,
button.slider-btn:hover,
.slider-btn--prev:hover,
.slider-btn--next:hover,
.slider-btn:focus,
button.slider-btn:focus {
    background-color: #e6c888 !important;
    border-color: #e6c888 !important;
    color: #4A2A18 !important;
    transform: scale(1.1) translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(230, 200, 136, 0.4) !important;
}

.slider-btn:hover *,
button.slider-btn:hover *,
.slider-btn:focus *,
button.slider-btn:focus * {
    color: #4A2A18 !important;
}

.slider-btn:active,
button.slider-btn:active {
    transform: scale(0.95) !important;
}

    
/* ============================================================
   MOBILE HEADER: Left Hamburger + Right Logo Emblem (No Text)
   ============================================================ */
@media (max-width: 991px) {
    .fs-header {
        padding: 0.5rem 1.25rem !important;
    }
    .fs-header-inner {
        position: relative !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        width: 100% !important;
        min-height: 48px !important;
        padding: 0 !important;
        margin: 0 auto !important;
    }
    .fs-header-actions {
        order: 1 !important;
        display: flex !important;
        align-items: center !important;
        z-index: 110 !important;
        position: static !important;
        transform: none !important;
        left: auto !important;
        top: auto !important;
        margin: 0 !important;
    }
    .fs-logo {
        order: 2 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-end !important;
        text-decoration: none !important;
        margin: 0 !important;
        padding: 0 !important;
        z-index: 106 !important;
        position: static !important;
        transform: none !important;
        left: auto !important;
        top: auto !important;
    }
    .fs-logo img {
        display: block !important;
        height: 38px !important;
        width: auto !important;
        max-width: 48px !important;
        object-fit: contain !important;
        position: static !important;
        transform: none !important;
        left: auto !important;
        top: auto !important;
        margin: 0 !important;
        filter: drop-shadow(0 2px 6px rgba(0,0,0,0.4)) !important;
    }
    .fs-logo-text {
        display: none !important;
    }
}
@media (max-width: 380px) {
    .fs-logo img {
        height: 32px !important;
    }
}

    </style>

    <style>
       body.home { padding-top: 0 !important; }
    </style>

    <script type="application/ld+json">
{
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "The Franciscan Society",
      "description": "Third Order Regular of St. Francis - Ranchi Province",
      "url": "https://franciscansociety.org",
      "logo": "https://franciscansociety.org/assets/images/logo.svg",
      "sameAs": [
            "https://www.facebook.com/profile.php?id=61593681501900",
            "https://www.instagram.com/torranchiprovince/"
      ],
      "address": {
            "@type": "PostalAddress",
            "addressCountry": "IN",
            "addressRegion": "Jharkhand",
            "addressLocality": "Ranchi"
      }
}
    </script>
                        <style id="custom-menu-active-styles">

/* ============================================================
   UNIFIED RESPONSIVE NAVIGATION BREAKPOINT (1200px)
   ============================================================ */
@media (min-width: 1201px) {
    .fs-desktop-nav {
        display: flex !important;
        gap: clamp(0.75rem, 1.3vw, 1.75rem) !important;
        align-items: center !important;
    }
    .fs-desktop-nav a,
    .fs-desktop-nav button,
    .fs-desktop-nav .fs-mega-toggle {
        font-size: clamp(0.82rem, 0.88vw, 0.9rem) !important;
        white-space: nowrap !important;
    }
    .fs-mobile-toggle,
    .fs-mobile-nav,
    .mobile-nav-drawer {
        display: none !important;
    }
    .fs-logo-text {
        display: flex !important;
    }
}

/* Invisible hover bridge between navbar toggle and dropdown menu */
.fs-mega-menu::before {
    content: "" !important;
    position: absolute !important;
    top: -20px !important;
    left: -15px !important;
    right: -15px !important;
    height: 25px !important;
    background: transparent !important;
    display: block !important;
    pointer-events: auto !important;
    z-index: 1000000 !important;
}

@media (max-width: 1200px) {
    .fs-desktop-nav {
        display: none !important;
    }
    .fs-mega-menu {
        display: none !important;
    }
}
    .fs-mobile-toggle {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 44px !important;
        height: 44px !important;
        padding: 0 !important;
        background: transparent !important;
        border: none !important;
        cursor: pointer !important;
        z-index: 120 !important;
    }
    .fs-mobile-toggle span {
        display: flex !important;
        flex-direction: column !important;
        justify-content: space-between !important;
        width: 24px !important;
        height: 17px !important;
    }
    .fs-mobile-toggle span span {
        display: block !important;
        width: 100% !important;
        height: 2.5px !important;
        background-color: #ffffff !important;
        border-radius: 2px !important;
    }
    .fs-header-actions {
        order: 1 !important;
        display: flex !important;
        align-items: center !important;
    }
    .fs-logo {
        order: 2 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-end !important;
    }
    .fs-logo img {
        height: 38px !important;
        width: auto !important;
        max-width: 48px !important;
    }
    .fs-logo-text {
        display: none !important;
    }
}



/* ============================================================
   RESPONSIVE TABLET & DESKTOP NAVIGATION BREAKPOINT (1200px)
   ============================================================ */
@media (min-width: 1201px) {
    .fs-desktop-nav {
        display: flex !important;
        gap: clamp(0.75rem, 1.3vw, 1.8rem) !important;
        align-items: center !important;
    }
    .fs-desktop-nav a,
    .fs-desktop-nav button,
    .fs-desktop-nav .fs-mega-toggle {
        font-size: clamp(0.82rem, 0.9vw, 0.9rem) !important;
        white-space: nowrap !important;
    }
    .fs-mobile-toggle {
        display: none !important;
    }
    .fs-mobile-nav,
    .mobile-nav-drawer {
        display: none !important;
    }
    .fs-header-inner {
        max-width: 1440px !important;
        width: 100% !important;
    }
}

@media (max-width: 1200px) {
    .fs-desktop-nav {
        display: none !important;
    }
    .fs-mega-menu {
        display: none !important;
    }
    .fs-mobile-toggle {
        display: flex !important;
    }
    .fs-header-actions {
        order: 1 !important;
        display: flex !important;
        align-items: center !important;
    }
    .fs-logo {
        order: 2 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-end !important;
    }
    .fs-logo img {
        height: 38px !important;
        width: auto !important;
        max-width: 48px !important;
    }
    .fs-logo-text {
        display: none !important;
    }
}



/* ============================================================
   NAV MENU & DROPDOWN HOVER IDENTICAL GOLD STYLING
   ============================================================ */
.fs-desktop-nav a,
.fs-desktop-nav button,
.fs-desktop-nav .fs-mega-toggle,
button.fs-mega-toggle,
.fs-header .fs-desktop-nav button,
.fs-header .fs-desktop-nav a {
    color: #ffffff !important;
    background: transparent !important;
    background-color: transparent !important;
    border: none !important;
    outline: none !important;
    box-shadow: none !important;
    font-family: 'DM Sans', sans-serif !important;
    font-size: 0.88rem !important;
    font-weight: 600 !important;
    text-decoration: none !important;
    cursor: pointer !important;
    transition: color 0.2s ease !important;
    opacity: 1 !important;
    display: inline-flex !important;
    align-items: center !important;
}

.fs-desktop-nav a:hover,
.fs-desktop-nav button:hover,
.fs-desktop-nav .fs-mega-toggle:hover,
.fs-desktop-nav .fs-mega-toggle:focus,
.fs-desktop-nav .fs-mega-toggle.hover-active,
.fs-desktop-nav .fs-mega-toggle.active,
button.fs-mega-toggle:hover,
button.fs-mega-toggle:focus,
button.fs-mega-toggle.hover-active,
button.fs-mega-toggle.active,
.fs-header .fs-desktop-nav button:hover,
.fs-header .fs-desktop-nav button:focus,
.fs-header .fs-desktop-nav button.hover-active,
.fs-header .fs-desktop-nav a:hover,
.fs-header .fs-desktop-nav a:focus,
.fs-header .fs-desktop-nav a.active {
    color: #e6c888 !important;
    background: transparent !important;
    background-color: transparent !important;
    opacity: 1 !important;
}

.fs-desktop-nav .fs-mega-toggle::after,
button.fs-mega-toggle::after,
.fs-header .fs-desktop-nav button::after {
    content: ' ▼' !important;
    font-size: 0.6rem !important;
    margin-left: 0.4rem !important;
    color: #ffffff !important;
    transition: color 0.2s ease, transform 0.2s ease !important;
    display: inline-block !important;
}

.fs-desktop-nav .fs-mega-toggle:hover::after,
.fs-desktop-nav .fs-mega-toggle:focus::after,
.fs-desktop-nav .fs-mega-toggle.hover-active::after,
.fs-desktop-nav .fs-mega-toggle.active::after,
button.fs-mega-toggle:hover::after,
button.fs-mega-toggle:focus::after,
button.fs-mega-toggle.hover-active::after,
button.fs-mega-toggle.active::after,
.fs-header .fs-desktop-nav button:hover::after,
.fs-header .fs-desktop-nav button:focus::after,
.fs-header .fs-desktop-nav button.hover-active::after {
    color: #e6c888 !important;
}



/* ============================================================
   NAV MENU & DROPDOWN HOVER BRIGHTNESS & VISIBILITY FIX
   ============================================================ */
.fs-desktop-nav a,
.fs-desktop-nav button,
.fs-desktop-nav .fs-mega-toggle,
button.fs-mega-toggle {
    color: #ffffff !important;
    background: transparent !important;
    background-color: transparent !important;
    border: none !important;
    outline: none !important;
    box-shadow: none !important;
    font-family: 'DM Sans', sans-serif !important;
    font-size: 0.88rem !important;
    font-weight: 600 !important;
    text-decoration: none !important;
    cursor: pointer !important;
    transition: color 0.2s ease !important;
    opacity: 1 !important;
}

.fs-desktop-nav a:hover,
.fs-desktop-nav button:hover,
.fs-desktop-nav .fs-mega-toggle:hover,
.fs-desktop-nav .fs-mega-toggle:focus,
.fs-desktop-nav .fs-mega-toggle.active,
button.fs-mega-toggle:hover,
button.fs-mega-toggle:focus {
    color: #e6c888 !important;
    background: transparent !important;
    background-color: transparent !important;
    opacity: 1 !important;
}

.fs-desktop-nav .fs-mega-toggle::after,
button.fs-mega-toggle::after {
    content: ' ▼' !important;
    font-size: 0.6rem !important;
    margin-left: 0.4rem !important;
    color: #ffffff !important;
    transition: color 0.2s ease, transform 0.2s ease !important;
    display: inline-block !important;
}

.fs-desktop-nav .fs-mega-toggle:hover::after,
.fs-desktop-nav .fs-mega-toggle:focus::after,
button.fs-mega-toggle:hover::after,
button.fs-mega-toggle:focus::after {
    color: #e6c888 !important;
}

/* Dropdown menu item styling */
.fs-mega-menu {
    background: #0c1727 !important;
    border: 1px solid rgba(230, 200, 136, 0.25) !important;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4) !important;
    border-radius: 8px !important;
}

.fs-mega-col a {
    color: #d6d3d1 !important;
    font-size: 0.92rem !important;
    font-weight: 500 !important;
}

.fs-mega-col a:hover {
    color: #e6c888 !important;
    background: rgba(230, 200, 136, 0.12) !important;
}

/* ============================================================
   LOGO & LOGO TITLE HOVER LOCK (NO HOVER COLOR CHANGE OR ANIMATION)
   ============================================================ */
.fs-logo,
.fs-logo:hover,
.fs-logo:focus,
.fs-logo:active {
    text-decoration: none !important;
    background: transparent !important;
    background-color: transparent !important;
    transform: none !important;
    box-shadow: none !important;
    opacity: 1 !important;
    cursor: pointer !important;
}

.fs-logo *,
.fs-logo:hover *,
.fs-logo:focus *,
.fs-logo:active *,
.fs-logo span,
.fs-logo:hover span,
.fs-logo-name,
.fs-logo-sub,
.fs-logo:hover .fs-logo-name,
.fs-logo:hover .fs-logo-sub {
    color: #ffffff !important;
    transform: none !important;
    text-decoration: none !important;
    transition: none !important;
}

.fs-logo img,
.fs-logo:hover img,
.fs-logo:focus img {
    transform: none !important;
    transition: none !important;
    filter: none !important;
    animation: none !important;
}


        /* Keep toggle highlighted when mega menu is open and highlight active page */
        .fs-desktop-nav a.active,
        .fs-desktop-nav button.active,
        .fs-desktop-nav button.hover-active {
            color: #e6c888 !important;
            font-weight: 800 !important;
        }
        .fs-desktop-nav button.active::after,
        .fs-desktop-nav button.hover-active::after {
            color: #e6c888 !important;
        }

        /* BUTTON TEXT RECOVERY */
        .btn-fill-animation,
        .btn-fill-outline,
        a.btn-chocolate,
        .header-cta-btn {
            position: relative !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 0.5rem !important;
            text-decoration: none !important;
            overflow: hidden !important;
        }
        .btn-fill-animation span,
        .btn-fill-outline span,
        .btn-fill-animation svg,
        .btn-fill-outline svg {
            position: relative !important;
            z-index: 4 !important;
            color: inherit !important;
            opacity: 1 !important;
            visibility: visible !important;
            transform: none !important;
        }
        .btn-fill-animation .btn-arrow,
        .btn-fill-outline .btn-arrow {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        /* Mobile hamburger toggle */
        .fs-mobile-toggle,
        .fs-mobile-toggle:hover,
        .fs-mobile-toggle:focus,
        .fs-mobile-toggle:active {
            background: transparent !important;
            background-color: transparent !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
            transform: none !important;
            -webkit-tap-highlight-color: transparent !important;
        }
        .fs-mobile-toggle::before,
        .fs-mobile-toggle::after,
        .fs-mobile-toggle:hover::before,
        .fs-mobile-toggle:hover::after,
        .fs-mobile-toggle:active::before,
        .fs-mobile-toggle:active::after,
        .fs-mobile-toggle:focus::before,
        .fs-mobile-toggle:focus::after {
            display: none !important;
            content: none !important;
            opacity: 0 !important;
        }
        .fs-mobile-toggle span span {
            background: #ffffff !important;
        }

        /* Mobile Header: Centered Logo Emblem + Right-Aligned Logo Title */
        @media (max-width: 991px) {
            .fs-header {
                padding: 0.5rem 1rem !important;
            }
            .fs-header-inner {
                position: relative !important;
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                width: 100% !important;
                min-height: 48px !important;
            }
                    .fs-header-inner {
      position: relative !important;
      display: flex !important;
      align-items: center !important;
      justify-content: space-between !important;
      width: 100% !important;
      min-height: 48px !important;
      padding: 0 !important;
    }
    .fs-header-actions {
      order: 1 !important;
      display: flex !important;
      align-items: center !important;
      z-index: 110 !important;
      position: static !important;
      transform: none !important;
    }
    .fs-logo {
      order: 2 !important;
      display: flex !important;
      align-items: center !important;
      justify-content: flex-end !important;
      text-decoration: none !important;
      position: static !important;
      transform: none !important;
    }
    .fs-logo img {
      display: block !important;
      height: 38px !important;
      width: auto !important;
      max-width: 48px !important;
      object-fit: contain !important;
      position: static !important;
      transform: none !important;
      filter: drop-shadow(0 2px 6px rgba(0,0,0,0.4)) !important;
    }
    .fs-logo-text {
      display: none !important;
    }
        }
        @media (max-width: 380px) {
            .fs-logo img {
                height: 28px !important;
            }
            .fs-logo-name {
                font-size: 0.46rem !important;
            }
            .fs-logo-sub {
                font-size: 0.36rem !important;
            }
        }

        /* Mobile Close Button in Drawer Menu */
        .fs-mobile-close {
            align-self: flex-end !important;
            background: rgba(255, 255, 255, 0.15) !important;
            border: 1px solid rgba(255, 255, 255, 0.35) !important;
            color: #ffffff !important;
            width: 44px !important;
            height: 44px !important;
            min-width: 44px !important;
            min-height: 44px !important;
            border-radius: 50% !important;
            font-size: 28px !important;
            line-height: 1 !important;
            font-family: Arial, sans-serif !important;
            font-weight: 300 !important;
            cursor: pointer !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            margin-bottom: 1.5rem !important;
            flex-shrink: 0 !important;
            padding: 0 !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3) !important;
            transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease !important;
            outline: none !important;
        }
        .fs-mobile-close:hover,
        .fs-mobile-close:focus {
            background: #e6c888 !important;
            color: #0c1727 !important;
            transform: rotate(90deg) !important;
        }
    </style>

    <?php wp_head(); ?>













<style id="fs-universal-header-rules">
  /* Global body reset */
  body, body.home, body:not(.home) {
    margin: 0 !important;
    padding-top: 0 !important;
  }

  /* Fixed Header Base (Initial state: Generous padding over hero) */
  .fs-header {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    z-index: 1000 !important;
    background: transparent !important;
    padding: 1.8rem 3.5rem !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.12) !important;
    transform: translateY(0) !important;
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), padding 0.3s ease, background 0.3s ease, backdrop-filter 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease !important;
    will-change: transform, padding;
  }

  .fs-logo img {
    transition: height 0.3s ease, width 0.3s ease !important;
  }

  /* Scrolled State: Compact Half-Height Sticky Header */
  .fs-header.scrolled {
    padding: 0.65rem 3rem !important;
    background: rgba(12, 11, 10, 0.94) !important;
    backdrop-filter: blur(14px) !important;
    -webkit-backdrop-filter: blur(14px) !important;
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.45) !important;
    border-bottom: 1px solid rgba(230, 200, 136, 0.25) !important;
  }
  .fs-header.scrolled .fs-logo img {
    height: 38px !important;
  }
  .fs-header.scrolled .fs-logo-name {
    font-size: 0.68rem !important;
  }
  .fs-header.scrolled .fs-logo-sub {
    font-size: 0.58rem !important;
  }
  .fs-header.scrolled .fs-desktop-nav {
    gap: 1.5rem !important;
  }
  .fs-header.scrolled .fs-desktop-nav a,
  .fs-header.scrolled .fs-desktop-nav button {
    font-size: 0.82rem !important;
  }
  .fs-header.scrolled .fs-enquire-btn {
    font-size: 0.82rem !important;
  }

  /* Hidden State (When scrolling DOWN) */
  .fs-header.header-hidden {
    transform: translateY(-100%) !important;
    pointer-events: none !important;
  }

  /* Admin bar offset when logged into WordPress */
  
  /* WordPress Admin Bar Header Alignment */
  .fs-header {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    width: 100% !important;
  }
  body.admin-bar .fs-header {
    top: 32px !important;
  }
  @media screen and (max-width: 782px) {
    body.admin-bar .fs-header {
      top: 46px !important;
    }
  }
  @media screen and (max-width: 600px) {
    /* In WordPress on <= 600px, #wpadminbar is position: absolute, so fixed header MUST be top: 0 with no gap */
    body.admin-bar .fs-header {
      top: 0 !important;
    }
  }


  /* Responsive compact header on mobile */
  @media (max-width: 991px) {
    .fs-header {
      padding: 1rem 1.5rem !important;
    }
    .fs-header.scrolled {
      padding: 0.5rem 1.25rem !important;
    }
    .fs-header.scrolled .fs-logo img {
      height: 32px !important;
    }
  }

  /* Single Post & 404 Pages: dark header by default */
  body.single-post .fs-header,
  body.error404 .fs-header {
    background: rgba(12, 23, 39, 0.96) !important;
    padding: 0.75rem 3rem !important;
  }
  body.single-post,
  body.error404 {
    padding-top: 75px !important;
  }
  @media (max-width: 991px) {
    body.single-post,
    body.error404 {
      padding-top: 60px !important;
    }
  }
</style>


<style id="fs-guaranteed-transparent-header-styles">
    /* Guaranteed 100% Transparent Header in Normal State on ALL Pages */
    html, body {
        padding-top: 0 !important;
        margin: 0 !important;
    }
    body:not(.single-post):not(.error404) {
        padding-top: 0 !important;
    }
    body.single-post,
    body.error404 {
        padding-top: 80px !important;
    }

    .fs-header,
    header.fs-header,
    header.fs-menu,
    header.site-header {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        z-index: 1000 !important;
        background: transparent !important;
        background-color: transparent !important;
        box-shadow: none !important;
        border: none !important;
        transition: background 0.35s ease, backdrop-filter 0.35s ease, padding 0.35s ease, transform 0.35s ease !important;
    }

    /* Only apply solid glassmorphism when scrolled down */
    .fs-header.scrolled,
    header.fs-header.scrolled,
    header.fs-menu.scrolled {
        background: rgba(12, 11, 10, 0.94) !important;
        background-color: rgba(12, 11, 10, 0.94) !important;
        backdrop-filter: blur(14px) !important;
        -webkit-backdrop-filter: blur(14px) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
    }

    /* Mobile header */
    @media (max-width: 991px) {
        .fs-header,
        header.fs-header {
            background: transparent !important;
            background-color: transparent !important;
        }
        .fs-header.scrolled,
        .fs-header.mobile-sticky {
            background: rgba(12, 11, 10, 0.96) !important;
            background-color: rgba(12, 11, 10, 0.96) !important;
            backdrop-filter: blur(10px) !important;
            -webkit-backdrop-filter: blur(10px) !important;
        }
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Montserrat:wght@400;500;600;700;800&family=Phudu:wght@500;600;700;800;900&family=Instrument+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="background:#FFFFFF; color:#1c2430; font-family:var(--font-body); line-height:1.7; margin:0;">
<?php wp_body_open(); ?>

<!-- Franciscan Society - Responsive Menu Component -->
<style>
  /* Reset & Base */
  .fs-menu * { box-sizing: border-box; }
  .fs-menu { margin: 0; padding: 0; }

  /* Desktop Navigation */
  .fs-header {
    background: transparent;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 100;
    padding: 2.2rem 3.5rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
    transition: background 0.3s ease, backdrop-filter 0.3s ease;
  }

  /* Scrolled state - show dark background */
  .fs-header.scrolled {
    background: rgba(12, 11, 10, 0.85);
    backdrop-filter: blur(8px);
  }

  .fs-header-inner {
    max-width: 1360px;
    width: 100%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .fs-logo {
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    z-index: 101;
    position: relative;
    aria-label: "Franciscan Friars of the Third Order Regular, Province of St Francis of Assisi Ranchi";
  }

  .fs-logo img {
    height: 58px;
    width: auto;
  }

  .fs-logo-text {
    display: flex;
    flex-direction: column;
  }

  .fs-logo-name {
    font-family: 'Instrument Sans', sans-serif;
    font-weight: 600;
    font-size: 0.75rem;
    color: #fff;
    line-height: 1.2;
  }

  .fs-logo-sub {
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.65rem;
    color: #fff;
    line-height: 1.2;
  }

  /* Desktop Nav */
  .fs-desktop-nav {
    display: none;
    gap: 2rem;
    align-items: center;
  }

  .fs-desktop-nav a,
  .fs-desktop-nav button {
    color: #fff;
    font-weight: 600;
    font-size: 0.88rem;
    text-decoration: none;
    font-family: 'DM Sans', sans-serif;
    background: none;
    border: none;
    cursor: pointer;
    transition: color 0.2s ease;
    position: relative;
  }

  .fs-desktop-nav a,
  .fs-desktop-nav button {
    background: transparent !important;
    background-color: transparent !important;
  }

  .fs-desktop-nav a:hover,
  .fs-desktop-nav button:hover,
  .fs-desktop-nav a:active,
  .fs-desktop-nav button:active {
    color: #e6c888 !important;
    background: transparent !important;
    background-color: transparent !important;
    box-shadow: none !important;
  }

  .fs-desktop-nav a:focus,
  .fs-desktop-nav button:focus {
    background: transparent !important;
    background-color: transparent !important;
    outline: none !important;
    box-shadow: none !important;
  }

  /* Arrow for items with submenus */
  .fs-desktop-nav .fs-mega-toggle::after {
    content: ' ▼';
    font-size: 0.6rem;
    margin-left: 0.5rem;
    transition: color 0.2s ease, transform 0.2s ease;
    display: inline-block;
  }

  .fs-desktop-nav .fs-mega-toggle:hover::after {
    color: #e6c888 !important;
  }

  .fs-desktop-nav a.active {
    color: #e6c888;
    font-weight: 800;
  }

  /* Hide button animation on mega-toggle (dropdown buttons) */
  .fs-mega-toggle::before {
    display: none !important;
  }

  /* Dropdown Menu (replaces mega menu) */
  .fs-mega-menu {
    display: none;
    position: fixed;
    top: 80px;
    width: 230px;
    background: rgba(12, 23, 39, 0.98);
    padding: 0.6rem 0;
    z-index: 999999 !important;
    box-shadow: 0 12px 36px rgba(0,0,0,0.45);
    backdrop-filter: blur(12px);
    border-radius: 6px;
    pointer-events: auto !important;
  }

  #ministries-mega {
  }

  #community-mega {
  }

  .fs-mega-menu.show {
    display: block !important;
  }

  .fs-mega-grid {
    display: flex;
    flex-direction: column;
  }

  .fs-mega-col {
    padding: 0;
  }

  .fs-mega-col h3 {
    display: none;
  }

  .fs-mega-col a {
    display: block;
    color: #d6d3d1;
    text-decoration: none;
    font-family: 'Instrument Sans', sans-serif;
    font-size: 0.9rem;
    padding: 0.7rem 1.5rem;
    transition: all 0.2s ease;
    margin: 0;
  }

  .fs-mega-col a:first-child {
    padding-top: 1rem;
  }

  .fs-mega-col a:last-child {
    padding-bottom: 1rem;
  }

  .fs-mega-col a:hover {
    color: #e6c888;
    background: rgba(230, 200, 136, 0.1);
    padding-left: 1.8rem;
  }

  /* Header Actions */
  .fs-header-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    z-index: 101;
    position: relative;
  }

  .fs-enquire-btn {
    background: none;
    border: none;
    color: #fff;
    font-weight: 600;
    font-size: 0.88rem;
    text-decoration: none;
    cursor: pointer;
    font-family: 'Instrument Sans', sans-serif;
    transition: color 0.2s ease;
  }

  .fs-enquire-btn:hover {
    color: #e6c888;
  }

  /* Mobile Hamburger */
  .fs-mobile-toggle {
    display: none;
    background: none;
    border: none;
    color: #fff;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0;
    z-index: 101;
  }

  .fs-mobile-toggle span {
    display: flex;
    flex-direction: column;
    gap: 4px;
  }

  .fs-mobile-toggle span span {
    width: 24px;
    height: 2px;
    background: #fff;
    transition: all 0.3s ease;
  }

  /* Mobile Menu */
  .fs-mobile-nav {
    display: none;
    position: fixed;
    top: 0;
    right: -100%;
    width: 100%;
    height: 100vh;
    overflow-y: auto;
    background: rgba(12, 23, 39, 0.95);
    color: #fff;
    z-index: 9999;
    padding: 2rem;
    transition: right 0.4s ease;
    flex-direction: column;
    gap: 1.5rem;
  }

  .fs-mobile-nav.active {
    right: 0;
  }

  .fs-mobile-close {
    align-self: flex-end;
    background: #fff;
    border: none;
    color: #0c1727;
    width: 45px;
    height: 45px;
    border-radius: 8px;
    font-size: 1.5rem;
    font-weight: bold;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .fs-mobile-nav a,
  .fs-mobile-submenu-toggle {
    color: #fff;
    font-weight: 600;
    text-decoration: none;
    font-size: 1.1rem;
    background: none;
    border: none;
    text-align: left;
    cursor: pointer;
    font-family: 'Instrument Sans', sans-serif;
    transition: color 0.2s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding: 0;
  }

  .fs-mobile-nav a:hover,
  .fs-mobile-submenu-toggle:hover {
    color: #e6c888;
  }

  .fs-mobile-submenu-toggle {
    margin-bottom: 1rem;
  }

  .fs-mobile-submenu-arrow {
    display: inline-flex; align-items: center; justify-content: center;
    margin-left: 0.5rem;
    transition: transform 0.3s ease;
  }

  .fs-mobile-submenu-toggle.active .fs-mobile-submenu-arrow {
    transform: rotate(180deg);
  }

  .fs-mobile-submenu {
    display: none;
    flex-direction: column;
    gap: 0.5rem;
    padding-left: 1.5rem;
    margin-top: 0.8rem;
  }

  .fs-mobile-submenu.open {
    display: flex;
  }

  .fs-mobile-submenu a {
    font-size: 0.95rem;
    color: #d6d3d1;
    font-weight: 500;
    margin-bottom: 0;
  }

  .fs-mobile-submenu a:hover {
    color: #e6c888;
  }

  /* Responsive */
  

  @media (max-width: 991px) {
    .fs-header {
      padding: 0.6rem 0.5rem;
    }

    .fs-header-inner {
      max-width: 100%;
    }

    .fs-logo {
      gap: 0.5rem;
    }

                .fs-header-inner {
      position: relative !important;
      display: flex !important;
      align-items: center !important;
      justify-content: space-between !important;
      width: 100% !important;
      min-height: 48px !important;
      padding: 0 !important;
    }
    .fs-header-actions {
      order: 1 !important;
      display: flex !important;
      align-items: center !important;
      z-index: 110 !important;
      position: static !important;
      transform: none !important;
    }
    .fs-logo {
      order: 2 !important;
      display: flex !important;
      align-items: center !important;
      justify-content: flex-end !important;
      text-decoration: none !important;
      position: static !important;
      transform: none !important;
    }
    .fs-logo img {
      display: block !important;
      height: 38px !important;
      width: auto !important;
      max-width: 48px !important;
      object-fit: contain !important;
      position: static !important;
      transform: none !important;
      filter: drop-shadow(0 2px 6px rgba(0,0,0,0.4)) !important;
    }
    .fs-logo-text {
      display: none !important;
    }

    .fs-mobile-toggle {
      font-size: 1.2rem;
    }

    /* Mobile counters - center alignment */
    .responsive-grid-3 {
      text-align: center !important;
      grid-template-columns: 1fr !important;
      gap: 1.5rem !important;
    }
    .responsive-grid-3 > div {
      border-right: none !important;
      border-bottom: 1px solid rgba(255, 255, 255, 0.25) !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      padding-bottom: 1.5rem !important;
    }
    .responsive-grid-3 > div:last-child {
      border-bottom: none !important;
      padding-bottom: 0 !important;
    }

    /* Mobile hero buttons - ensure GET STARTED visible */
    .hero-buttons-row {
      flex-direction: column !important;
      gap: 1rem !important;
      width: 100% !important;
    }
    .hero-buttons-row a {
      width: 100% !important;
      text-align: center !important;
      padding: 1.2rem 1.5rem !important;
    }
    .btn-fill-outline {
      background-color: transparent !important;
      border: 1.5px solid rgba(255, 255, 255, 0.9) !important;
      color: #ffffff !important;
    }

    .fs-mobile-toggle span span {
      width: 20px;
      height: 1.5px;
    }

    /* Mobile header transition behavior */
    .fs-header {
      transition: background 0.3s ease, backdrop-filter 0.3s ease, opacity 0.3s ease, transform 0.3s ease !important;
    }

    .fs-header.mobile-scrolled {
      opacity: 0;
      transform: translateY(-100%);
      pointer-events: none;
    }

    .fs-header.mobile-sticky { position: fixed !important; top: 0 !important; background: rgba(12, 11, 10, 0.95) !important; backdrop-filter: blur(8px) !important; z-index: 999; }

    .fs-desktop-nav {
      display: none;
    }
    .fs-mega-menu {
      display: none !important;
    }
    .fs-mobile-toggle {
      display: flex;
    }
    .fs-mobile-nav {
      display: flex;
    }
  }

  /* Widget container fixes */
  #bottom-widgets-container {
    position: fixed;
    bottom: 0;
    right: 0;
    z-index: 98;
    display: flex;
    gap: 1rem;
    padding: 2rem;
    pointer-events: auto;
  }

  #welcome-scroll-bible-container {
    z-index: 98 !important;
  }

  footer {
    position: relative;
    z-index: 100 !important;
  }

  /* Ensure proper spacing */
  main, #main-content {
    position: relative;
    z-index: 1;
  }
</style>

<!-- Header -->
<header class="fs-header fs-menu">
  <div class="fs-header-inner">
    <!-- Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="fs-logo">
      <img  loading="lazy" decoding="async"src="<?php echo esc_url( FRANCISCAN_THEME_URI . "/assets/images/logo.svg" ); ?>" alt="Franciscan Society" width="48" height="58">
      <div class="fs-logo-text">
        <span class="fs-logo-name">Franciscan Friars of the Third Order Regular</span>
        <span class="fs-logo-sub">Province of St Francis of Assisi Ranchi</span>
      </div>
    </a>

    <!-- Desktop Navigation -->
    <nav class="fs-desktop-nav">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a>
      <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Gallery</a>
      <button class="fs-mega-toggle" data-menu="ministries">Ministries</button>
      <button class="fs-mega-toggle" data-menu="community">Community</button>
      <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">News</a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
    </nav>

    <!-- Header Actions -->
    <div class="fs-header-actions">
      <button class="fs-mobile-toggle" aria-label="Open menu">
        <span><span></span><span></span><span></span></span>
      </button>
    </div>
  </div>
</header>

<!-- Mega Menus (Desktop) -->
<div class="fs-mega-menu" id="ministries-mega">
  <div class="fs-mega-grid">
    <div class="fs-mega-col">
      <h3>Ministries</h3>
      <a href="<?php echo esc_url( home_url( '/ministries-pastoral/' ) ); ?>">Pastoral Ministry</a>
      <a href="<?php echo esc_url( home_url( '/ministries-formation/' ) ); ?>">Formation Ministry</a>
      <a href="<?php echo esc_url( home_url( '/ministries-education/' ) ); ?>">Education Ministry</a>
      <a href="<?php echo esc_url( home_url( '/publications/' ) ); ?>">Publications</a>
    </div>
  </div>
</div>

<div class="fs-mega-menu" id="community-mega">
  <div class="fs-mega-grid">
    <div class="fs-mega-col">
      <h3>Community</h3>
      <a href="<?php echo esc_url( home_url( '/community-history/' ) ); ?>">Our History</a>
      <a href="<?php echo esc_url( home_url( '/community-rule/' ) ); ?>">Third Order Rule</a>
      <a href="<?php echo esc_url( home_url( '/community-leadership/' ) ); ?>">Leadership</a>
      <a href="<?php echo esc_url( home_url( '/community-friars/' ) ); ?>">Our Friars</a>
      <a href="<?php echo esc_url( home_url( '/community-friaries/' ) ); ?>">Our Friaries</a>
    </div>
  </div>
</div>

<!-- Mobile Navigation -->
<nav class="fs-mobile-nav" id="mobile-nav">
  <button class="fs-mobile-close">&times;</button>

  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
  <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a>
  <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Gallery</a>

  <button class="fs-mobile-submenu-toggle" data-target="ministries-submenu">
    Ministries
    <span class="fs-mobile-submenu-arrow"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg></span>
  </button>
  <div class="fs-mobile-submenu" id="ministries-submenu">
    
    <a href="<?php echo esc_url( home_url( '/ministries-pastoral/' ) ); ?>">Pastoral Ministry</a>
    <a href="<?php echo esc_url( home_url( '/ministries-formation/' ) ); ?>">Formation Ministry</a>
    <a href="<?php echo esc_url( home_url( '/ministries-education/' ) ); ?>">Education Ministry</a>
    <a href="<?php echo esc_url( home_url( '/publications/' ) ); ?>">Publications</a>
  </div>

  <button class="fs-mobile-submenu-toggle" data-target="community-submenu">
    Community
    <span class="fs-mobile-submenu-arrow"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg></span>
  </button>
  <div class="fs-mobile-submenu" id="community-submenu">
    
    <a href="<?php echo esc_url( home_url( '/community-history/' ) ); ?>">Our History</a>
    <a href="<?php echo esc_url( home_url( '/community-rule/' ) ); ?>">Third Order Rule</a>
    <a href="<?php echo esc_url( home_url( '/community-leadership/' ) ); ?>">Leadership</a>
    <a href="<?php echo esc_url( home_url( '/community-friars/' ) ); ?>">Our Friars</a>
    <a href="<?php echo esc_url( home_url( '/community-friaries/' ) ); ?>">Our Friaries</a>
  </div>
  <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">News</a>
  <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
</nav>

<script>
  // Menu toggle functionality
  document.addEventListener('DOMContentLoaded', function() {
    // Mobile hamburger toggle
    const mobileToggle = document.querySelector('.fs-mobile-toggle');
    const mobileNav = document.getElementById('mobile-nav');
    const mobileClose = document.querySelector('.fs-mobile-close');

    if (mobileToggle) {
      mobileToggle.addEventListener('click', () => {
        mobileNav.classList.add('active');
        document.body.classList.add('menu-open');
      });
    }

    if (mobileClose) {
      mobileClose.addEventListener('click', () => {
        mobileNav.classList.remove('active');
        document.body.classList.remove('menu-open');
      });
    }

    // Mobile submenu toggle
    const submenuToggles = document.querySelectorAll('.fs-mobile-submenu-toggle');
    submenuToggles.forEach(toggle => {
      toggle.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('data-target');
        const submenu = document.getElementById(targetId);
        submenu.classList.toggle('open');
        this.classList.toggle('active');
      });
    });

    // Desktop dropdown menu hover with dynamic viewport positioning
    const megaToggles = document.querySelectorAll('.fs-mega-toggle');
    let activeHoverTimeout = null;

    function positionDropdown(toggle, megaMenu) {
      const toggleRect = toggle.getBoundingClientRect();
      megaMenu.style.left = Math.max(10, (toggleRect.left - 6)) + "px";
      megaMenu.style.top = (toggleRect.bottom + 2) + "px";
    }

    megaToggles.forEach(toggle => {
      const menuId = toggle.getAttribute('data-menu') + '-mega';
      const megaMenu = document.getElementById(menuId);
      if (!megaMenu) return;

      const openDropdown = function() {
        if (activeHoverTimeout) {
          clearTimeout(activeHoverTimeout);
          activeHoverTimeout = null;
        }
        document.querySelectorAll('.fs-mega-menu').forEach(menu => {
          if (menu.id !== menuId) {
            menu.classList.remove('show');
          }
        });
        document.querySelectorAll('.fs-mega-toggle').forEach(t => {
          if (t !== toggle) t.classList.remove('active');
        });
        
        positionDropdown(toggle, megaMenu);
        megaMenu.classList.add('show');
        toggle.classList.add('active');
      };

      const queueCloseDropdown = function() {
        if (activeHoverTimeout) clearTimeout(activeHoverTimeout);
        activeHoverTimeout = setTimeout(() => {
          megaMenu.classList.remove('show');
          toggle.classList.remove('active');
        }, 350);
      };

      // Hover on Toggle Button
      toggle.addEventListener('mouseenter', openDropdown);
      toggle.addEventListener('mouseover', openDropdown);
      toggle.addEventListener('mousemove', function() {
        if (activeHoverTimeout) {
          clearTimeout(activeHoverTimeout);
          activeHoverTimeout = null;
        }
      });
      toggle.addEventListener('mouseleave', queueCloseDropdown);

      // Click on Toggle to Toggle / Keep Open
      toggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        if (megaMenu.classList.contains('show')) {
          megaMenu.classList.remove('show');
          toggle.classList.remove('active');
        } else {
          openDropdown();
        }
      });

      // Hover on Dropdown Menu & Child Items
      megaMenu.addEventListener('mouseenter', function() {
        if (activeHoverTimeout) {
          clearTimeout(activeHoverTimeout);
          activeHoverTimeout = null;
        }
        megaMenu.classList.add('show');
        toggle.classList.add('active');
      });
      megaMenu.addEventListener('mouseover', function() {
        if (activeHoverTimeout) {
          clearTimeout(activeHoverTimeout);
          activeHoverTimeout = null;
        }
        megaMenu.classList.add('show');
        toggle.classList.add('active');
      });
      megaMenu.addEventListener('mousemove', function() {
        if (activeHoverTimeout) {
          clearTimeout(activeHoverTimeout);
          activeHoverTimeout = null;
        }
      });
      megaMenu.addEventListener('mouseleave', queueCloseDropdown);
    });

    // Reposition open menus on window resize or scroll
    window.addEventListener('resize', function() {
      document.querySelectorAll('.fs-mega-menu.show').forEach(menu => {
        const menuKey = menu.id.replace('-mega', '');
        const toggle = document.querySelector(`[data-menu="${menuKey}"]`);
        if (toggle) positionDropdown(toggle, menu);
      });
    });

    // Close mega menu on click outside
    document.addEventListener('click', function(e) {
      if (!e.target.closest('.fs-desktop-nav') && !e.target.closest('.fs-mega-menu')) {
        document.querySelectorAll('.fs-mega-menu').forEach(menu => {
          menu.classList.remove('show');
        });
        document.querySelectorAll('.fs-mega-toggle').forEach(t => {
          t.classList.remove('active');
        });
      }
    });

    // Hide widgets when menu open
    const observer = new MutationObserver(() => {
      const widgetsContainer = document.getElementById('bottom-widgets-container');
      if (widgetsContainer && document.body.classList.contains('menu-open')) {
        widgetsContainer.style.display = 'none';
      } else if (widgetsContainer) {
        widgetsContainer.style.display = '';
      }
    });

    observer.observe(document.body, { attributes: true, attributeFilter: ['class'] });
  });

  // Smart Sticky Header (Hide on scroll down, Show on scroll up)
  (function() {
    let lastScrollY = window.scrollY;
    let ticking = false;
    const threshold = 6;

    window.addEventListener('scroll', function() {
      if (!ticking) {
        window.requestAnimationFrame(function() {
          const header = document.querySelector('.fs-header');
          if (!header) {
            ticking = false;
            return;
          }

          if (document.body.classList.contains('menu-open')) {
            header.classList.remove('header-hidden');
            ticking = false;
            return;
          }

          const currentScrollY = window.scrollY;
          const diff = currentScrollY - lastScrollY;

          // 1. When at very top (<= 30px)
          if (currentScrollY <= 30) {
            header.classList.remove('scrolled');
            header.classList.remove('header-hidden');
          } 
          // 2. When scrolled past top (> 30px)
          else {
            header.classList.add('scrolled');

            if (Math.abs(diff) >= threshold) {
              if (diff > 0 && currentScrollY > 90) {
                // Scrolling DOWN -> Hide sticky header
                header.classList.add('header-hidden');
                document.querySelectorAll('.fs-mega-menu').forEach(function(m) {
                  m.classList.remove('show');
                });
              } else if (diff < 0) {
                // Scrolling UP -> Reveal sticky header
                header.classList.remove('header-hidden');
              }
            }
          }

          lastScrollY = currentScrollY <= 0 ? 0 : currentScrollY;
          ticking = false;
        });
        ticking = true;
      }
    }, { passive: true });
  })();
</script>









<!-- Preloader with Expanding Circle -->
<div id="cinematic-preloader" style="position: fixed; inset: 0; width: 100vw; height: 100vh; background: #FFFFFF; z-index: 999999; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: hidden; pointer-events: auto; transition: opacity 0.5s cubic-bezier(0.16, 1, 0.3, 1);">
    <div id="preloader-circle" style="position: relative; width: 140px; height: 140px; background-color: #4A2A18; border-radius: 50%; display: flex; align-items: center; justify-content: center; z-index: 1000000; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);">
        <img loading="eager" id="preloader-logo" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/logo.svg' ); ?>" alt="Franciscan Preloader Logo" style="width: 60px; height: auto; filter: brightness(0) invert(1);">
    </div>
</div>

<script>
// Universal Cinematic Preloader Dismissal Engine
(function() {
    let preloaderDismissed = false;

    function dismissPreloader() {
        if (preloaderDismissed) return;
        const preloader = document.getElementById('cinematic-preloader');
        if (!preloader) return;
        preloaderDismissed = true;
        const circle = document.getElementById('preloader-circle');

        if (typeof gsap !== 'undefined') {
            const tl = gsap.timeline({
                onComplete: function() {
                    preloader.style.display = 'none';
                    preloader.style.pointerEvents = 'none';
                    document.body.classList.remove('is-loading');
                }
            });
            if (circle) {
                tl.to(circle, { scale: 0.88, duration: 0.25, ease: 'power2.in' })
                  .to(circle, { scale: 28, duration: 0.65, ease: 'power4.inOut' }, '+=0.04');
            }
            tl.to(preloader, { opacity: 0, duration: 0.4, ease: 'power2.out' }, '-=0.35');
        } else {
            if (circle) {
                circle.style.transform = 'scale(25)';
                circle.style.transition = 'transform 0.6s ease';
            }
            preloader.style.opacity = '0';
            setTimeout(function() {
                preloader.style.display = 'none';
                preloader.style.pointerEvents = 'none';
                document.body.classList.remove('is-loading');
            }, 550);
        }
    }

    // Trigger on window load or DOMContentLoaded
    if (document.readyState === 'complete') {
        setTimeout(dismissPreloader, 200);
    } else {
        window.addEventListener('load', function() {
            setTimeout(dismissPreloader, 250);
        });
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(dismissPreloader, 450);
        });
    }

    // Bulletproof Failsafe: Never allow screen to remain stuck past 1.2 seconds
    setTimeout(dismissPreloader, 1200);
})();
</script>

<div id="site-wrapper">
  
  <!-- Scroll Progress Bar -->
  <div id="scroll-progress-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 3px; z-index: 9999999; background: transparent; pointer-events: none;">
      <div id="scroll-progress-bar" style="width: 0%; height: 100%; background: linear-gradient(90deg, #e6c888, #a8813a); transition: width 0.1s ease-out;"></div>
  </div>
  <script>
      document.addEventListener("DOMContentLoaded", () => {
          const progressBar = document.getElementById("scroll-progress-bar");
          window.addEventListener("scroll", () => {
              const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
              const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
              const progress = (scrollTop / scrollHeight) * 100;
              progressBar.style.width = progress + "%";
          });
      });
  </script>

<!-- Main Content Area with Cream Background (#FAF7F0) -->
    
