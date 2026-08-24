<?php
/**
 * Template Name: About Us
 *
 * @package Franciscan_Society
 */

get_header();
?>

<style>
        @media (max-width: 991px) {
            /* Hide sticky widgets when mobile menu is open */
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
      body { padding-top: 100px; }
    </style>
<style>
        /* Internal page solid header override */
        .fs-header,
        .fs-header.scrolled,
        
    </style>
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

@media (max-width: 1200px) {
    .fs-desktop-nav,
    .fs-mega-menu {
        display: none !important;
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

<main id="main-content" style="padding-top: 0; background-color: #FFFFFF;">

        <!-- 1. Hero Section (Rounded Card Container on Cream Canvas) -->
        
    <!-- Page Hero -->
    <?php
    $about_hero_bg = franciscan_get_page_field( 'about', 'hero_image', '' );
    if ( empty( $about_hero_bg ) ) {
        $about_hero_bg = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png';
    }
    ?>
    <section style="padding: 12rem 2rem 8rem 2rem; background-image: url('<?php echo esc_url( $about_hero_bg ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.7);"></div>
        <div style="max-width: 800px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <div style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 0.5rem 1rem; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.2);">
                <span style="width: 8px; height: 8px; background-color: #c8102e; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #ffffff; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( "about", "hero_badge", "WHO WE ARE" ) ); ?></span>
            </div>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.8rem, 5.2vw, 4.5rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;"><?php echo esc_html( franciscan_get_page_field( "about", "hero_title", "ABOUT US" ) ); ?></h1>
        </div>
    </section>
    <section id="about-section" style="position: relative; padding: 5.5rem 0 0 0; background-color: #FFFFFF; color: #1c1917; overflow: hidden;">
            <div class="responsive-grid-about" style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 5vw, 3rem); display: grid; gap: 4.5rem; align-items: center;">
                
                <!-- Left Column: Main Image with Working Video Card Overlay -->
                <?php
                $about_sec_img = franciscan_get_page_field( 'about', 'about_section_img', '' );
                if ( empty( $about_sec_img ) ) {
                    $about_sec_img = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_48_39_PM.png';
                }
                $about_sec_video = franciscan_get_page_field( 'about', 'about_video_url', '' );
                if ( empty( $about_sec_video ) ) {
                    $about_sec_video = FRANCISCAN_THEME_URI . '/assets/videos/hero-bg.mp4';
                }
                ?>
                <div style="position: relative; border-radius: 24px;">
                    <div class="about-img-container" style="position: relative; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);">
                        <img loading="lazy" decoding="async" src="<?php echo esc_url( $about_sec_img ); ?>" style="width: 100%; height: 460px; object-fit: cover; border-radius: 24px; display: block;" alt="Franciscan Rosary & Prayer">
                    </div>
                    
                    <!-- Inset Video Overlay Card (Positioned inside bottom-right corner) -->
                    <div class="about-video-card" style="position: absolute; bottom: 20px; right: 20px; background: #ffffff; padding: 10px; border-radius: 16px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.18); width: 185px; text-align: center; z-index: 10;">
                        <div style="position: relative; border-radius: 12px; overflow: hidden; height: 95px; background-color: #1c1917;">
                            <video src="<?php echo esc_url( $about_sec_video ); ?>" style="width: 100%; height: 100%; object-fit: cover; pointer-events: none;" autoplay loop muted playsinline></video>
                            <a rel="noopener noreferrer" href="https://youtube.com/@tormediaranchi3804?si=UPTCSJUSj9tbcjeB" target="_blank" class="video-play-btn" aria-label="Watch our video on YouTube">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </a>
                        </div>
                        <span style="display: block; margin-top: 8px; font-weight: 800; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; color: #1c1917; font-family: 'Instrument Sans', sans-serif;">WATCH OUR VIDEO</span>
                    </div>
                </div>

                <!-- Right Column: Text Content & Mission/Vision Grid -->
                <div>
                    <!-- Eyebrow Tag -->
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                        <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                        <span style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'about', 'about_eyebrow', 'ABOUT US' ) ); ?></span>
                    </div>

                    <!-- Main Section Title in Phudu 600 -->
                    <h2 style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.2rem, 3.2vw, 2.9rem) !important; font-weight: 600 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.1; letter-spacing: -0.01em; margin-bottom: 1.4rem;">
                        <?php echo esc_html( franciscan_get_page_field( 'about', 'about_section_heading', 'OUR STORY FAITH MISSION AND VISION TOGETHER' ) ); ?>
                    </h2>

                    <!-- Body Description in Instrument Sans -->
                    <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.95rem; color: #57534e; line-height: 1.65; margin-bottom: 2rem;">
                        <?php echo esc_html( franciscan_get_page_field( 'about', 'about_section_text', 'The Third Order Regular (TOR) of St. Francis traces its origins to the ancient Order of Penance from the 4th century. Established in Ranchi in 1996 and elevated to a full Province on 20 March 2006.' ) ); ?>
                    </p>

                    <!-- Mission & Vision 2-Column Grid -->
                    <div class="responsive-grid-2" style="display: grid; gap: 1.8rem; border-bottom: 1px solid rgba(0, 0, 0, 0.1); padding-bottom: 2rem; margin-bottom: 2rem;">
                        <div style="display: flex; gap: 1rem; align-items: flex-start;">
                            <div style="width: 38px; height: 38px; background: #4A2A18; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.9rem; flex-shrink: 0; box-shadow: 0 4px 10px rgba(74,42,24,0.3);">&#10013;</div>
                            <div>
                                <h4 style="font-family: 'Phudu', sans-serif !important; font-size: 0.92rem; font-weight: 600; text-transform: uppercase; margin-bottom: 0.3rem; color: #1c1917;"><?php echo esc_html( franciscan_get_page_field( 'about', 'about_mission_title', 'OUR MISSION' ) ); ?></h4>
                                <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.8rem; color: #78716c; line-height: 1.45; margin: 0;"><?php echo esc_html( franciscan_get_page_field( 'about', 'about_mission_text', 'Serving 15 parishes & 22 schools across Ranchi and global mission fields.' ) ); ?></p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 1rem; align-items: flex-start;">
                            <div style="width: 38px; height: 38px; background: #4A2A18; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.9rem; flex-shrink: 0; box-shadow: 0 4px 10px rgba(74,42,24,0.3);">&#10013;</div>
                            <div>
                                <h4 style="font-family: 'Phudu', sans-serif !important; font-size: 0.92rem; font-weight: 600; text-transform: uppercase; margin-bottom: 0.3rem; color: #1c1917;"><?php echo esc_html( franciscan_get_page_field( 'about', 'about_vision_title', 'OUR VISION' ) ); ?></h4>
                                <p style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.8rem; color: #78716c; line-height: 1.45; margin: 0;"><?php echo esc_html( franciscan_get_page_field( 'about', 'about_vision_text', 'Promoting peace, joy, and dignity under "Peace and Joy to the World".' ) ); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Minister Provincial Avatar Row -->
                    <?php
                    $about_prov_avatar = franciscan_get_page_field( 'about', 'about_provincial_avatar', '' );
                    if ( empty( $about_prov_avatar ) ) {
                        $about_prov_avatar = FRANCISCAN_THEME_URI . '/assets/images/fr-manoj-vengathanam.png';
                    }
                    ?>
                    <div style="display: flex; align-items: center; gap: 2rem; flex-wrap: wrap;">
                        <div style="display: flex; align-items: center; gap: 0.85rem;">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( $about_prov_avatar ); ?>" style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover;" alt="<?php echo esc_attr( franciscan_get_page_field( 'about', 'about_provincial_name', 'Fr. Manoj Vengathanam, TOR' ) ); ?>">
                            <div>
                                <div style="font-family: 'Phudu', sans-serif !important; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; color: #1c1917;"><?php echo esc_html( franciscan_get_page_field( 'about', 'about_provincial_name', 'FR. MANOJ VENGATHANAM, TOR' ) ); ?></div>
                                <div style="font-family: 'Instrument Sans', sans-serif !important; font-size: 0.75rem; color: #78716c;"><?php echo esc_html( franciscan_get_page_field( 'about', 'about_provincial_title', 'Minister Provincial' ) ); ?></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Large Watermark Medium Speed Marquee Text -->
            <style>
                @keyframes marquee-scroll {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }
                .marquee-track-scroll {
                    display: flex !important;
                    width: max-content !important;
                    white-space: nowrap !important;
                    animation: marquee-scroll 22s linear infinite !important;
                    will-change: transform;
                }
            </style>
            <div style="width: 100% !important; max-width: 100% !important; overflow-x: hidden !important; overflow-y: hidden !important; white-space: nowrap !important; padding: 3rem 0 1rem 0 !important; margin-top: 2rem !important; pointer-events: none !important; user-select: none !important; position: relative !important;">
                <div class="marquee-track-scroll">
                    <span style="font-family: 'Phudu', sans-serif !important; font-size: clamp(3.5rem, 6vw, 5.5rem) !important; font-weight: 700 !important; text-transform: uppercase !important; color: transparent !important; -webkit-text-stroke: 1.5px rgba(0, 0, 0, 0.15) !important; letter-spacing: 0.04em !important; white-space: nowrap !important; padding-right: 4rem !important; display: inline-block !important;">
                        &#10013; PEACE AND JOY TO THE WORLD &#10013; CONVERSION, CONTEMPLATION, POVERTY &amp; HUMILITY &#10013; THE LORD IS MY SHEPHERD &#10013; ST. FRANCIS OF ASSISI &#10013; PROVINCE OF ST. FRANCIS RANCHI &nbsp;
                    </span>
                    <span style="font-family: 'Phudu', sans-serif !important; font-size: clamp(3.5rem, 6vw, 5.5rem) !important; font-weight: 700 !important; text-transform: uppercase !important; color: transparent !important; -webkit-text-stroke: 1.5px rgba(0, 0, 0, 0.15) !important; letter-spacing: 0.04em !important; white-space: nowrap !important; padding-right: 4rem !important; display: inline-block !important;">
                        &#10013; PEACE AND JOY TO THE WORLD &#10013; CONVERSION, CONTEMPLATION, POVERTY &amp; HUMILITY &#10013; THE LORD IS MY SHEPHERD &#10013; ST. FRANCIS OF ASSISI &#10013; PROVINCE OF ST. FRANCIS RANCHI &nbsp;
                    </span>

                </div>
            </div>
        </section>

        <!-- Our Mission Section -->
        <section id="mission-section" style="padding: 6.5rem 0; background-color: #ffffff; color: #1c1917; box-sizing: border-box; overflow: hidden;">
            <div style="max-width: 1320px; margin: 0 auto; padding: 0 3rem; display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: center;">
                
                <!-- Left Content -->
                <div class="gsap-fade-up">
                    <div style="display: inline-flex; align-items: center; gap: 0.6rem; margin-bottom: 1.5rem;">
                        <span style="width: 8px; height: 8px; background-color: #c8102e; border-radius: 50%; display: inline-block;"></span>
                        <span style="color: #1c1917; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'about', 'mission_eyebrow', 'Our Values' ) ); ?></span>
                    </div>

                    <h2 style="font-family: 'Phudu', sans-serif !important; font-size: clamp(2.5rem, 4vw, 3.8rem) !important; font-weight: 700 !important; color: #1c1917 !important; text-transform: uppercase; line-height: 1.1; letter-spacing: -0.01em; margin-bottom: 1.5rem;">
                        <?php echo esc_html( franciscan_get_page_field( 'about', 'mission_values_heading', 'OUR CHRISTIAN VALUES THAT LEAD OUR MINISTRY' ) ); ?>
                    </h2>

                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.6; margin-bottom: 3rem; max-width: 90%;">
                        <?php echo esc_html( franciscan_get_page_field( 'about', 'mission_values_text', 'Our Christian values are the foundation of everything we do as a church. Guided by faith, love, compassion, and integrity, we are committed to serving God.' ) ); ?>
                    </p>

                    <!-- Split Info Box -->
                    <div style="border-radius: 16px; padding: 2.5rem; display: flex; gap: 2rem; position: relative; margin-bottom: 3rem;">
                        <!-- Red Left Border Accent -->
                        <div style="position: absolute; left: 0; top: 15%; bottom: 15%; width: 4px; background-color: #c8102e; border-radius: 0 4px 4px 0;"></div>
                        
                        <div style="flex: 1; padding-left: 1rem;">
                            <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.3rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.8rem; color: #1c1917;"><?php echo esc_html( franciscan_get_page_field( 'about', 'prayer_support_title', 'PRAYER SUPPORT' ) ); ?></h4>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #78716c; line-height: 1.5; margin: 0;"><?php echo esc_html( franciscan_get_page_field( 'about', 'prayer_support_desc', 'Our Prayer Support accompanies you in faith during every stage of life.' ) ); ?></p>
                        </div>
                        <div style="width: 1px; background-color: #e7e5e4;"></div>
                        <div style="flex: 1;">
                            <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.3rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.8rem; color: #1c1917;"><?php echo esc_html( franciscan_get_page_field( 'about', 'fellowship_title', 'FELLOWSHIP GROUPS' ) ); ?></h4>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #78716c; line-height: 1.5; margin: 0;"><?php echo esc_html( franciscan_get_page_field( 'about', 'fellowship_desc', 'Join our vibrant fellowship groups and grow together in faith and community.' ) ); ?></p>
                        </div>
                    </div>

                    <!-- Call to Action Row -->
                    <?php
                    $contact_phone = franciscan_get_option( 'contact_phone', '+91 651 234 5678' );
                    $tel_href      = 'tel:+' . preg_replace( '/[^0-9]/', '', $contact_phone );
                    ?>
                    <div style="display: flex; align-items: center; gap: 2.5rem;">
                        <a href="<?php echo esc_url( $tel_href ); ?>" style="display: flex; align-items: center; gap: 1rem; text-decoration: none;">
                            <div style="width: 54px; height: 54px; background-color: #1c1917; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #ffffff; font-size: 1.3rem;">
                                &#128222;
                            </div>
                            <div>
                                <div style="font-family: 'Phudu', sans-serif; font-weight: 700; font-size: 1.2rem; text-transform: uppercase; color: #1c1917; margin-bottom: 0.2rem;"><?php echo esc_html( franciscan_get_page_field( 'about', 'call_us_label', 'CALL US!' ) ); ?></div>
                                <div style="font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; color: #78716c;"><?php echo esc_html( $contact_phone ); ?></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Right Images -->
                <?php
                $about_mission_church = franciscan_get_page_field( 'about', 'mission_church_img', '' );
                if ( empty( $about_mission_church ) ) {
                    $about_mission_church = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png';
                }
                $about_mission_priest = franciscan_get_page_field( 'about', 'mission_priest_img', '' );
                if ( empty( $about_mission_priest ) ) {
                    $about_mission_priest = FRANCISCAN_THEME_URI . '/assets/images/mission-father.png';
                }
                ?>
                <div class="gsap-fade-left hover-trigger" style="position: relative; height: 650px;">
                    <!-- Left Church Image -->
                    <div class="about-img-container mission-church-img">
                        <img loading="lazy" decoding="async" src="<?php echo esc_url( $about_mission_church ); ?>" alt="Church Interior" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    
                    <!-- Right Father Image -->
                    <div class="mission-priest-container">
                        <img loading="lazy" decoding="async" class="priest-zoom" src="<?php echo esc_url( $about_mission_priest ); ?>" alt="Priest" style="width: 100%; height: auto; object-fit: contain; object-position: bottom center; max-height: 100%;">
                    </div>
                </div>

            </div>
        </section>

    <!-- Charism & Foundation Section - Redesigned -->
    <!-- ============================================================
         OUR CHARISM SECTION (EXACT SCREENSHOT MATCH)
         ============================================================ -->
    <section id="charism-section" style="background-color: #FAF7F2; padding: clamp(4rem, 7vw, 6.5rem) 2rem; position: relative; overflow: hidden;">
        <div style="max-width: 1320px; margin: 0 auto;">
            
            <!-- Section Header: Centered Heading & Accent Bar -->
            <div style="text-align: center; margin-bottom: clamp(2.5rem, 5vw, 4rem);">
                <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.2rem, 4.5vw, 3.2rem); font-weight: 800; color: #1c1917; text-transform: uppercase; margin: 0; letter-spacing: -0.01em;">
                    <?php echo esc_html( franciscan_get_page_field( 'about', 'charism_heading', 'OUR CHARISM' ) ); ?>
                </h2>
                <div style="width: 42px; height: 3.5px; background: #4A2A18; margin: 0.85rem auto 0 auto; border-radius: 2px;"></div>
            </div>

            <!-- 2-Column Content Grid -->
            <div class="charism-layout-grid" style="display: grid; grid-template-columns: 1.15fr 1fr; gap: clamp(2.5rem, 5vw, 5rem); align-items: center;">
                
                <!-- Left Column: Identity & Pillars Grid -->
                <div>
                    <!-- Eyebrow -->
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                        <span style="color: #4A2A18; font-size: 1.1rem; font-weight: bold; line-height: 1;">&#8224;</span>
                        <span style="font-family: 'Montserrat', sans-serif; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; color: #4A2A18;">
                            <?php echo esc_html( franciscan_get_page_field( 'about', 'charism_eyebrow', 'CORE FRANCISCAN IDENTITY' ) ); ?>
                        </span>
                    </div>

                    <!-- Statement Headline (High-Contrast Serif: Cormorant Garamond) -->
                    <h3 style="font-family: 'Cormorant Garamond', 'Playfair Display', serif; font-size: clamp(2.2rem, 3.6vw, 3rem); font-weight: 600; color: #1c1917; line-height: 1.2; margin: 0 0 0.5rem 0; letter-spacing: -0.01em;">
                        <?php echo nl2br( esc_html( franciscan_get_page_field( 'about', 'charism_statement', "Conversion, contemplation,\npoverty, and humility" ) ) ); ?>
                    </h3>

                    <!-- Brown Underline Bar -->
                    <div style="width: 34px; height: 3.5px; background: #4A2A18; margin: 1.2rem 0 1.5rem 0; border-radius: 2px;"></div>

                    <!-- Paragraph Text (Montserrat clean sans) -->
                    <p style="font-family: 'Montserrat', sans-serif; font-size: 0.95rem; line-height: 1.75; color: #57534e; margin: 0 0 2.5rem 0;">
                        <?php echo esc_html( franciscan_get_page_field( 'about', 'charism_text', "lie at the heart of Franciscan identity. The fundamental charism of the Third Order Regular is penance, understood as ongoing conversion. This involves turning to God in love, reconciliation with Him, harmony with oneself, and charity toward one's neighbour." ) ); ?>
                    </p>

                    <!-- 4 Core Pillars Grid (2x2) -->
                    <div class="charism-pillars-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
                        
                        <!-- Card 1: Ongoing Conversion -->
                        <div style="background: #FFFFFF; border: 1px solid #E8E4DC; border-radius: 12px; padding: 1.1rem 1.25rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                            <div style="width: 42px; height: 42px; border-radius: 50%; background: #4A2A18; color: #ffffff; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
                            </div>
                            <span style="font-family: 'Montserrat', sans-serif; font-size: 0.88rem; font-weight: 700; color: #1c1917; line-height: 1.3;">
                                <?php echo nl2br( esc_html( franciscan_get_page_field( 'about', 'charism_p1_title', "Ongoing\nConversion" ) ) ); ?>
                            </span>
                        </div>

                        <!-- Card 2: Poverty & Humility -->
                        <div style="background: #FFFFFF; border: 1px solid #E8E4DC; border-radius: 12px; padding: 1.1rem 1.25rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                            <div style="width: 42px; height: 42px; border-radius: 50%; background: #4A2A18; color: #ffffff; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.47a1 1 0 00.99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 002-2V10h2.15a1 1 0 00.99-.84l.58-3.47a2 2 0 00-1.34-2.23z"/></svg>
                            </div>
                            <span style="font-family: 'Montserrat', sans-serif; font-size: 0.88rem; font-weight: 700; color: #1c1917; line-height: 1.3;">
                                <?php echo nl2br( esc_html( franciscan_get_page_field( 'about', 'charism_p2_title', "Poverty &\nHumility" ) ) ); ?>
                            </span>
                        </div>

                        <!-- Card 3: Charity to All -->
                        <div style="background: #FFFFFF; border: 1px solid #E8E4DC; border-radius: 12px; padding: 1.1rem 1.25rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                            <div style="width: 42px; height: 42px; border-radius: 50%; background: #4A2A18; color: #ffffff; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                            </div>
                            <span style="font-family: 'Montserrat', sans-serif; font-size: 0.88rem; font-weight: 700; color: #1c1917; line-height: 1.3;">
                                <?php echo nl2br( esc_html( franciscan_get_page_field( 'about', 'charism_p3_title', "Charity\nto All" ) ) ); ?>
                            </span>
                        </div>

                        <!-- Card 4: Reconciled in Love -->
                        <div style="background: #FFFFFF; border: 1px solid #E8E4DC; border-radius: 12px; padding: 1.1rem 1.25rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                            <div style="width: 42px; height: 42px; border-radius: 50%; background: #4A2A18; color: #ffffff; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M10 2v6H4v4h6v10h4v-10h6V8h-6V2h-4z"/></svg>
                            </div>
                            <span style="font-family: 'Montserrat', sans-serif; font-size: 0.88rem; font-weight: 700; color: #1c1917; line-height: 1.3;">
                                <?php echo nl2br( esc_html( franciscan_get_page_field( 'about', 'charism_p4_title', "Reconciled\nin Love" ) ) ); ?>
                            </span>
                        </div>

                    </div>
                </div>

                <!-- Right Column: Asymmetric Arched Artwork Image -->
                <?php
                $charism_img = franciscan_get_page_field( 'about', 'charism_image', '' );
                if ( empty( $charism_img ) ) {
                    $charism_img = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_24_08_PM.png';
                }
                ?>
                <div class="charism-image-col">
                    <div class="charism-image-frame" style="border-top-left-radius: 140px; border-bottom-left-radius: 24px; border-top-right-radius: 24px; border-bottom-right-radius: 24px; overflow: hidden; position: relative; min-height: 490px; height: 100%; box-shadow: 0 20px 50px rgba(0,0,0,0.12); background-color: #2A1610;">
                        <img 
                            src="<?php echo esc_url( $charism_img ); ?>" 
                            alt="Franciscan Friars TOR Charism Sanctuary" 
                            style="width: 100%; height: 100%; min-height: 490px; object-fit: cover; display: block;"
                        >
                        <!-- Bottom Gradient Badge -->
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2.5rem 2rem 1.8rem 2rem; background: linear-gradient(to top, rgba(12, 10, 8, 0.90) 0%, rgba(12, 10, 8, 0.4) 60%, transparent 100%); display: flex; align-items: center; justify-content: center; gap: 0.6rem;">
                            <span style="width: 7px; height: 7px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                            <span style="font-family: 'Cormorant Garamond', serif; font-size: 1.05rem; font-weight: 700; color: #e6c888; text-transform: uppercase; letter-spacing: 0.16em;">
                                <?php echo esc_html( franciscan_get_page_field( 'about', 'charism_badge_text', 'TOR FRANCISCAN CHARISM' ) ); ?>
                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                VanillaTilt.init(document.querySelectorAll(".blog-padded-card"), {
                    max: 8,
                    speed: 600,
                    glare: true,
                    "max-glare": 0.15,
                    scale: 1.02,
                    perspective: 1200
                });
            });
        </script>
        <!-- Magnetic Buttons Interaction -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const magneticElements = document.querySelectorAll('.header-cta-btn, .btn-fill-animation, .btn-fill-outline, .cta-dock__trigger');
                
                magneticElements.forEach(elem => {
                    elem.style.transition = 'transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                    
                    elem.addEventListener('mousemove', (e) => {
                        const rect = elem.getBoundingClientRect();
                        const x = e.clientX - rect.left - rect.width / 2;
                        const y = e.clientY - rect.top - rect.height / 2;
                        
                        elem.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px)`;
                        

                    });

                    elem.addEventListener('mouseleave', () => {
                        elem.style.transform = `translate(0px, 0px)`;

                    });
                });
            });
        </script>


    <!-- CTA to Community Page -->
    <section style="padding: clamp(2rem, 4vw, 3.5rem) 2rem; background-color: #FFFFFF; text-align: center; max-width: 900px; margin: 0 auto;">
        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.8; margin-bottom: 1.5rem;">
            <?php echo esc_html( franciscan_get_page_field( 'about', 'community_cta_text', 'To learn more about our leadership, friaries across India, and the friars serving in our Province, visit our Community page.' ) ); ?>
        </p>
        <a href="<?php echo esc_url( home_url( franciscan_get_page_field( 'about', 'community_cta_btn_url', '/community-history/' ) ) ); ?>" style="display: inline-block; background: #4A2A18; color: white; padding: 1rem 2rem; border-radius: 8px; font-family: 'Instrument Sans', sans-serif; font-weight: 800; font-size: 0.88rem; text-transform: uppercase; letter-spacing: 0.06em; text-decoration: none; transition: all 0.3s ease;">
            <?php echo esc_html( franciscan_get_page_field( 'about', 'community_cta_btn_text', 'EXPLORE THE HISTORY' ) ); ?>
        </a>
    </section>

</main>

<!-- Footer -->

<!-- FOOTER + BOTTOM WIDGETS + BIBLE MODAL UNIFIED SECTION -->
<!-- Use exact copy from home page for all inner pages -->



<?php
get_footer();
