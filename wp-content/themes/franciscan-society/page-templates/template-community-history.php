<?php
/**
 * Template Name: Community - History & Heritage
 *
 * @package Franciscan_Society
 */

get_header();
?>

<style>
        @media (max-width: 991px) {
            html, body { margin: 0 !important; padding: 0 !important; overflow-x: hidden !important; }
            /* Hide sticky widgets when mobile menu is open */
            body.menu-open #welcome-scroll-bible-container,
            body.menu-open [style*="position: sticky"],
            body.menu-open [style*="position: fixed"][style*="bottom"] {
                display: none !important;
            }
        }
        @media (min-width: 992px) {
            .page-hero { padding: 1.5rem 1.5rem 0 1.5rem !important; }
            .page-hero > div { min-height: 500px; border-radius: 24px; box-shadow: 0 20px 50px rgba(0,0,0,0.18); max-width: 1400px; margin: 0 auto; }
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
        /* Internal page solid header override & responsive mobile styles */
        .fs-header,
        .fs-header.scrolled,
        

        .page-hero-banner {
            position: relative;
            padding: 10rem 2rem 4rem 2rem;
            background-size: cover;
            background-position: center;
            overflow: hidden;
            text-align: center;
        }

        @media (max-width: 991px) {
            .page-hero-banner {
                padding: 6.5rem 1.25rem 2rem 1.25rem !important;
            }
            .page-hero-banner h1 {
                font-size: clamp(2rem, 6.5vw, 2.8rem) !important;
            }
            .page-hero {
                padding: 1.25rem 1rem 0 1rem !important;
            }
            .page-hero .has-vine-watermark,
            .page-hero > div {
                min-height: auto !important;
                padding: 2.2rem 1.5rem !important;
                border-radius: 18px !important;
            }
            .page-hero h2 {
                font-size: clamp(1.6rem, 5vw, 2.2rem) !important;
            }
            .responsive-ministry-grid {
                display: flex !important;
                flex-direction: column !important;
                gap: 2rem !important;
            }
            .responsive-ministry-grid > div:last-child {
                width: 100% !important;
            }
            .responsive-ministry-grid img {
                height: 260px !important;
                width: 100% !important;
                max-width: 100% !important;
            }
        }
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
    </style><main id="main-content" style="padding-top: 0; background-color: #FFFFFF;">
    <!-- Page Hero Banner -->
    <?php
    $hist_hero_bg = franciscan_get_page_field( 'community-history', 'hero_image', '' );
    if ( empty( $hist_hero_bg ) ) {
        $hist_hero_bg = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png';
    }
    ?>
    <section class="page-hero-banner" style="background-image: url('<?php echo esc_url( $hist_hero_bg ); ?>');">
        <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.74);"></div>
        <div style="max-width: 900px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <div style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 0.5rem 1.2rem; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.2);">
                <span style="width: 8px; height: 8px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #ffffff; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'community-history', 'hero_badge', 'HERITAGE' ) ); ?></span>
            </div>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.8rem, 5.2vw, 4.5rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;"><?php echo esc_html( franciscan_get_page_field( 'community-history', 'hero_title', 'HISTORY OF THE PROVINCE' ) ); ?></h1>
        </div>
    </section>

    <!-- Hero Banner Card with Vine Watermark -->
    <section class="page-hero" style="position: relative; background-color: #FFFFFF; padding: 2rem 2rem 0 2rem; box-sizing: border-box;">
        <div class="has-vine-watermark" style="position: relative; width: 100%; display: flex; flex-direction: column; justify-content: center; box-sizing: border-box; background: linear-gradient(135deg, #4A2A18 0%, #6b3d28 100%); min-height: 300px; border-radius: 24px; padding: clamp(2.5rem, 5vw, 3.8rem) clamp(1.8rem, 5vw, 3.5rem); max-width: 1400px; margin: 0 auto; overflow: hidden; box-shadow: 0 15px 35px rgba(74,42,24,0.18);">
            <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/shapes/vine-corner-watermark.png' ); ?>" class="vine-corner-watermark" alt="" aria-hidden="true" style="opacity: 0.38; filter: brightness(1.6) contrast(1.1);">
            <div style="position: relative; z-index: 2;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.2rem;">
                    <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                    <span style="color: #ffffff; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'community-history', 'heritage_badge', 'OUR HERITAGE' ) ); ?></span>
                </div>
                <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3.8vw, 44px); font-weight: 600; color: #ffffff; text-transform: uppercase; line-height: 1.15; letter-spacing: -0.01em; margin-bottom: 1.2rem; max-width: 800px;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-history', 'heritage_title', 'A LEGACY OF FAITH AND SERVICE' ) ); ?>
                </h2>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; font-weight: 400; color: rgba(255, 255, 255, 0.9); line-height: 1.7; max-width: 650px; margin: 0;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-history', 'heritage_text', 'Tracing our origins from the ancient 4th-century Order of Penance, to St. Francis of Assisi, to thirty years of dedicated growth in Ranchi Province.' ) ); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Structured Historical Narrative -->
    <section style="padding: clamp(3.5rem, 6vw, 6rem) 0; background: #FFFFFF; color: #1c1917;">
        <div style="max-width: 1140px; margin: 0 auto; padding: 0 clamp(1rem, 4vw, 2.5rem);">

            <!-- Era 1: Ancient Roots & St. Francis -->
            <div style="background: #FAF7F0; border-radius: 24px; padding: clamp(2rem, 5vw, 3.5rem); border: 1px solid rgba(74,42,24,0.08); margin-bottom: 3rem;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                    <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%;"></span>
                    <span style="color: #4A2A18; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( 'community-history', 'era1_badge', 'ORIGINS & ROOTS' ) ); ?></span>
                </div>
                <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.6rem, 2.6vw, 2.1rem); font-weight: 700; color: #1c1917; text-transform: uppercase; margin: 0 0 1.5rem 0;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-history', 'era1_title', 'The Order of Penance & St. Francis of Assisi' ) ); ?>
                </h3>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin-bottom: 1.25rem;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-history', 'era1_p1', 'The Third Order Regular (TOR) of St. Francis traces its origins to the ancient Order of Penance, which dates back to the fourth century AD. Men and women voluntarily embraced lives of penance for the sake of the Kingdom of God and their own spiritual growth.' ) ); ?>
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin-bottom: 1.25rem;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-history', 'era1_p2', 'During his early conversion experience, St. Francis of Assisi (1181–1226) became associated with the Order of Penance, an itinerant movement known as the Penitents of Assisi. He addressed them through an Exhortation, encouraging them to lead holy lives of penance.' ) ); ?>
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin: 0;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-history', 'era1_p3', 'Among the early Franciscan penitents were both Seculars and Regulars who lived according to a regula (rule of life). The Regulars embraced religious life characterized by the profession of vows, observance of the Third Order Rule, and communal living in hermitages.' ) ); ?>
                </p>
            </div>

            <!-- Era 2: Papal Unification & Generalate -->
            <div style="display: grid; grid-template-columns: 1.15fr 0.85fr; gap: clamp(2rem, 4vw, 3.5rem); align-items: center; margin-bottom: 3rem;" class="responsive-ministry-grid">
                <div>
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                        <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%;"></span>
                        <span style="color: #4A2A18; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Instrument Sans', sans-serif;">PAPAL CONFIRMATION</span>
                    </div>
                    <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.6rem, 2.6vw, 2.1rem); font-weight: 700; color: #1c1917; text-transform: uppercase; margin: 0 0 1.5rem 0;">
                        Unification &amp; The Generalate in Rome
                    </h3>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin-bottom: 1.25rem;">
                        In 1447, Pope Nicholas V, through the bull <em>Pastoralis Officii</em>, united approximately sixty communities of male Franciscan tertiaries in Italy under a single Minister General. This marked the formal beginning of the Third Order Regular of St. Francis. In 1512, the Order established its headquarters at the Basilica of Saints Cosmas and Damian in Rome, where its Generalate remains to this day.
                    </p>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin: 0;">
                        The Third Order Regular received a revised Rule from Pope Pius XI in 1927 through the document <em>Rerum Conditio</em>. This Rule was renewed on 8 December 1982 by Pope John Paul II through the apostolic letter <em>Franciscanum Vitae Propositum</em>, becoming the Rule and Life of nearly four hundred Franciscan Third Order congregations of men and women throughout the world.
                    </p>
                </div>
                <div style="border-radius: 20px; overflow: hidden; box-shadow: 0 15px 35px rgba(74,42,24,0.12); border: 2px solid rgba(230,200,136,0.3); background: #FAF7F0;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_24_08_PM.png' ); ?>" alt="Franciscan Heritage" style="width: 100%; height: 420px; object-fit: cover; display: block;">
                </div>
            </div>

            <!-- Franciscan Identity Highlight Box -->
            <div style="background: linear-gradient(135deg, #FAF7F0, #f2ece1); border-left: 5px solid #4A2A18; border-radius: 16px; padding: 2.2rem 2.5rem; margin-bottom: 3rem; box-shadow: 0 8px 25px rgba(74,42,24,0.05);">
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.3rem; font-weight: 700; color: #4A2A18; text-transform: uppercase; margin: 0 0 0.8rem 0;">
                    Franciscan Identity &amp; Global Presence
                </h4>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin-bottom: 1rem;">
                    Conversion, contemplation, poverty, and humility lie at the heart of Franciscan identity. The fundamental charism of the Third Order Regular, however, is penance, understood as ongoing conversion. This involves turning to God in love, reconciliation with Him, harmony with oneself, and charity toward one’s neighbour.
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin: 0;">
                    Today, the Order comprises three provinces in India; two provinces each in Italy and the United States; one province each in Sri Lanka, Spain and Croatia; vice provinces in South Africa, Brazil, Paraguay, and Mexico; delegations in the Philippines, France, Sweden, and Bangladesh; and a commissariat of the Spanish Province in Peru.
                </p>
            </div>

            <!-- Era 3: History in India and Ranchi Province -->
            <div style="background: #FAF7F0; border-radius: 24px; padding: clamp(2rem, 5vw, 3.5rem); border: 1px solid rgba(74,42,24,0.08); margin-bottom: 4rem;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                    <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%;"></span>
                    <span style="color: #4A2A18; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Instrument Sans', sans-serif;">THE INDIAN MISSION</span>
                </div>
                <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.6rem, 2.6vw, 2.1rem); font-weight: 700; color: #1c1917; text-transform: uppercase; margin: 0 0 1.5rem 0;">
                    The History of the TOR in India &amp; Ranchi Province
                </h3>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin-bottom: 1.25rem;">
                    The history of the TOR in India began in 1938 when missionaries from the Province of the Sacred Heart of Jesus, USA, arrived in Bhagalpur, Bihar. The mission steadily grew and was established as a Commissariat in 1945. In 1971, it was elevated to the status of a Province under the title Province of St. Thomas the Apostle.
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin-bottom: 1.25rem;">
                    In 1996, the Commissariat of St. Francis was established at Ranchi. On 4 October 1999, the Most Rev. Bonaventure Midili, TOR, Minister General, elevated it to the status of a Vice Province. The Vice Province of St. Francis was formally inaugurated by him in Ranchi on 8 December 1999.
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin-bottom: 1.25rem;">
                    Recognizing the remarkable growth and expansion of the Vice Province between 1999 and 2005, as well as the strategic importance of India for the future of the Order, the Most Rev. Ilija Živković, TOR, Minister General, elevated it to a full-fledged Province on 20 March 2006. The ceremony took place in Ranchi during a Eucharistic celebration presided over by the Most Rev. Dr. Vincent Barwa, Auxiliary Bishop of Ranchi.
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin-bottom: 1.25rem;">
                    The Province presently has 104 professed friars, including 84 solemnly professed and 19 temporarily professed members. Among them are 71 priests and 3 brothers. The Province has 28 major seminarians, 4 novices, 9 pre-novices, and 36 candidates.
                </p>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.85; margin: 0;">
                    The Province maintains four houses in the Archdiocese of Ranchi, four in Khunti, three in Simdega, two in Rourkela, two in Jalpaiguri, and one each in the dioceses of Bagdogra, Gumla, Purnea, and Bongaigaon. The friars serve the People of God through ministry in 14 parishes and 22 schools. Two friars are currently engaged in ministry abroad. The Province has three formation houses: one in Ranchi, one in Dorma, and one in Bichna.
                </p>
            </div>



        </div>
    </section>
</main>



<?php
get_footer();
