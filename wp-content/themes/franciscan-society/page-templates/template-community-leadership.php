<?php
/**
 * Template Name: Community - Leadership
 *
 * @package Franciscan_Society
 */

get_header();
?>

<style>
        @media (max-width: 991px) { html, body { margin: 0; padding: 0; } body.menu-open #welcome-scroll-bible-container { display: none !important; } }

        /* Leadership Section Eyebrows & Bullets */
        .leadership-eyebrow-container {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 0.6rem !important;
            max-width: 100% !important;
            margin: 0 auto 0.8rem auto !important;
            text-align: center !important;
        }
        .leadership-eyebrow-bullet {
            width: 6px !important;
            height: 6px !important;
            min-width: 6px !important;
            min-height: 6px !important;
            background-color: #4A2A18 !important;
            border-radius: 50% !important;
            display: inline-block !important;
            flex-shrink: 0 !important;
        }
        @media (max-width: 768px) {
            .leadership-eyebrow-container {
                align-items: flex-start !important;
                text-align: left !important;
                max-width: 92% !important;
            }
            .leadership-eyebrow-bullet {
                margin-top: 0.35rem !important;
            }
            .leadership-eyebrow-text {
                text-align: left !important;
            }
            .leadership-hero-badge {
                align-items: flex-start !important;
                border-radius: 20px !important;
                padding: 0.55rem 1rem !important;
            }
            .leadership-hero-badge .leadership-hero-bullet {
                margin-top: 0.32rem !important;
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

        footer { z-index: 10 !important; }
    
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
            .leadership-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)) !important;
                gap: 1.25rem !important;
            }
        }

        @media (max-width: 480px) {
            .leadership-grid {
                grid-template-columns: 1fr !important;
                gap: 1.25rem !important;
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
        .council-card {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }
        .council-card:hover {
            transform: translateY(-6px) !important;
            box-shadow: 0 18px 40px rgba(74, 42, 24, 0.12) !important;
        }
    </style><main id="main-content" style="padding-top: 0; background-color: #FFFFFF;">
    <!-- Page Hero Banner -->
    <?php
    $ldr_hero_bg = franciscan_get_page_field( 'community-leadership', 'hero_image', '' );
    if ( empty( $ldr_hero_bg ) || false !== strpos( $ldr_hero_bg, 'ChatGPT_Image' ) ) {
        $ldr_hero_bg = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/leadership-banner.jpg';
    }
    $ldr_hero_desc = franciscan_get_page_field( 'community-leadership', 'hero_subtitle', '' );
    if ( empty( $ldr_hero_desc ) ) {
        $ldr_hero_desc = franciscan_get_page_field( 'community-leadership', 'card_subtitle', 'Guiding the Province in fraternity, governance, and mission.' );
    }
    ?>
    <section class="page-hero-banner" style="background-image: url('<?php echo esc_url( $ldr_hero_bg ); ?>');">
        <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.74);"></div>
        <div style="max-width: 900px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <div class="leadership-hero-badge" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.6rem; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 0.5rem 1.2rem; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.2); max-width: 95%;">
                <span class="leadership-hero-bullet" style="width: 8px; height: 8px; min-width: 8px; min-height: 8px; background-color: #e6c888; border-radius: 50%; display: inline-block; flex-shrink: 0;"></span>
                <span style="color: #ffffff; font-size: 0.85rem; font-weight: 700; letter-spacing: 0.04em; font-family: 'Instrument Sans', sans-serif; line-height: 1.4; text-align: left;"><?php echo esc_html( franciscan_get_page_field( 'community-leadership', 'hero_badge', 'To lead is to serve; to be greater is to become lesser.' ) ); ?></span>
            </div>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.8rem, 5.2vw, 4.5rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;"><?php echo esc_html( franciscan_get_page_field( 'community-leadership', 'hero_title', 'LEADERSHIP' ) ); ?></h1>
            <?php if ( ! empty( $ldr_hero_desc ) ) : ?>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(1rem, 1.8vw, 1.18rem); color: rgba(255, 255, 255, 0.92); max-width: 760px; margin: 0.8rem auto 0; line-height: 1.6; font-weight: 400;">
                    <?php echo nl2br( esc_html( $ldr_hero_desc ) ); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Hero Banner Card with Vine Watermark -->
    <?php
    $ldr_default_text = 'Led by the Minister Provincial and provincial leadership team committed to spiritual excellence.';
    $ldr_card_desc = franciscan_get_page_field( 'community-leadership', 'card_subtitle', '' );
    if ( empty( $ldr_card_desc ) || $ldr_card_desc === $ldr_default_text ) {
        $ldr_custom_hero = franciscan_get_page_field( 'community-leadership', 'hero_subtitle', '' );
        if ( ! empty( $ldr_custom_hero ) && 'Guiding the Province in fraternity, governance, and mission.' !== $ldr_custom_hero ) {
            $ldr_card_desc = $ldr_custom_hero;
        } else {
            $ldr_card_desc = $ldr_default_text;
        }
    }
    ?>
    <section class="page-hero" style="position: relative; background-color: #FFFFFF; padding: 2rem 2rem 0 2rem; box-sizing: border-box;">
        <div class="has-vine-watermark" style="position: relative; width: 100%; display: flex; flex-direction: column; justify-content: center; box-sizing: border-box; background: linear-gradient(135deg, #4A2A18 0%, #6b3d28 100%); min-height: 300px; border-radius: 24px; padding: clamp(2.5rem, 5vw, 3.8rem) clamp(1.8rem, 5vw, 3.5rem); max-width: 1400px; margin: 0 auto; overflow: hidden; box-shadow: 0 15px 35px rgba(74,42,24,0.18);">
            <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/shapes/vine-corner-watermark.png' ); ?>" class="vine-corner-watermark" alt="" aria-hidden="true" style="opacity: 0.38; filter: brightness(1.6) contrast(1.1);">
            <div style="position: relative; z-index: 2;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.2rem;">
                    <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                    <?php
                    $ldr_badge = franciscan_get_page_field( 'community-leadership', 'card_badge', 'GOVERNANCE' );
                    if ( empty( $ldr_badge ) || preg_match( '/^GOVERNANCE\s*\d*$/i', trim( $ldr_badge ) ) ) {
                        $ldr_badge = 'GOVERNANCE';
                    } else {
                        $ldr_badge = preg_replace( '/(\D+)\d+$/', '$1', trim( $ldr_badge ) );
                    }
                    ?>
                    <span style="color: #ffffff; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( $ldr_badge ); ?></span>
                </div>
                <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3.8vw, 44px); font-weight: 600; color: #ffffff; text-transform: uppercase; line-height: 1.15; letter-spacing: -0.01em; margin-bottom: 1.2rem; max-width: 800px;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-leadership', 'card_title', 'SERVING IN COMMUNION' ) ); ?>
                </h2>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; font-weight: 400; color: rgba(255, 255, 255, 0.9); line-height: 1.52; max-width: 650px; margin: 0;">
                    <?php echo nl2br( esc_html( $ldr_card_desc ) ); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Leadership Section -->
    <section style="padding: clamp(3rem, 6vw, 5rem) 0; background: #FFFFFF; color: #1c1917;">
        <div style="max-width: 1140px; margin: 0 auto; padding: 0 clamp(1.25rem, 4vw, 2.5rem); box-sizing: border-box;">

            <!-- GENERAL COUNCIL -->
            <div style="text-align: center; margin-bottom: 2.5rem;">
                <div class="leadership-eyebrow-container">
                    <span class="leadership-eyebrow-bullet"></span>
                    <?php
                    $general_eyebrow = franciscan_get_page_field( 'community-leadership', 'general_eyebrow', '' );
                    if ( empty( $general_eyebrow ) || $general_eyebrow === 'LEADERSHIP OF THE ORDER' ) {
                        $general_eyebrow = 'To lead is to serve; to be greater is to become lesser.';
                    }
                    ?>
                    <span class="leadership-eyebrow-text" style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif; line-height: 1.45;"><?php echo esc_html( $general_eyebrow ); ?></span>
                </div>
                <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3.5vw, 2.6rem); font-weight: 700; color: #1c1917; text-transform: uppercase; margin: 0 0 1rem 0;"><?php echo esc_html( franciscan_get_page_field( 'community-leadership', 'general_heading', 'GENERAL COUNCIL' ) ); ?></h2>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.52; max-width: 750px; margin: 0 auto;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-leadership', 'general_subtitle', 'The General Council guides the Franciscan Third Order Regular globally, ensuring fidelity to our charism and mission across all provinces and regions.' ) ); ?>
                </p>
            </div>

            <div class="leadership-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem; margin-bottom: 5rem;">
                <?php
                $general_council = franciscan_get_general_council();
                foreach ( $general_council as $member ) :
                    $raw_img = ! empty( $member['image'] ) ? $member['image'] : ( ! empty( $member['photo'] ) ? $member['photo'] : '' );
                    $photo   = ! empty( $raw_img ) ? franciscan_resolve_friar_image_url( $raw_img ) : FRANCISCAN_THEME_URI . '/assets/images/general-council/placeholder.jpg';
                    $role    = $member['role'] ?? '';
                    $name    = $member['name'] ?? '';
                    $region  = $member['region'] ?? '';
                    $address = $member['address'] ?? '';
                    $phone   = $member['phone'] ?? '';
                    $email   = $member['email'] ?? '';
                ?>
                <div class="council-card" style="text-align: center; background: #FAF7F0; padding: 2.5rem 1.8rem 2rem 1.8rem; border-radius: 24px; border: 1px solid rgba(74,42,24,0.08); box-shadow: 0 10px 30px rgba(74,42,24,0.05); display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div>
                        <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1.3rem auto; box-shadow: 0 10px 25px rgba(74,42,24,0.16); border: 3px solid #e6c888; background: #ffffff;">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( $name ); ?>" style="width: 100%; height: 100%; object-fit: cover; object-position: top center; display: block;">
                        </div>
                        <?php if ( ! empty( $role ) ) : ?>
                        <div style="margin-bottom: 0.6rem;">
                            <span style="display: inline-block; background: #4A2A18; color: #e6c888; font-family: 'Instrument Sans', sans-serif; font-size: 0.76rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; padding: 0.35rem 0.9rem; border-radius: 50px;"><?php echo esc_html( $role ); ?></span>
                        </div>
                        <?php endif; ?>
                        <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.18rem; font-weight: 700; color: #1c1917; margin: 0 0 0.45rem 0; line-height: 1.3;"><?php echo esc_html( $name ); ?></h4>
                        <?php if ( ! empty( $region ) ) : ?>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; color: #8c5b36; font-weight: 600; margin: 0 0 1.2rem 0; line-height: 1.4;"><?php echo esc_html( $region ); ?></p>
                        <?php endif; ?>
                    </div>

                    <?php if ( ! empty( $address ) || ! empty( $phone ) || ! empty( $email ) ) : ?>
                    <div style="border-top: 1px solid rgba(74,42,24,0.08); padding-top: 1.2rem; margin-top: 0.5rem; text-align: left; background: #ffffff; border-radius: 16px; padding: 1.2rem 1.4rem; border: 1px solid rgba(74,42,24,0.05);">
                        <?php if ( ! empty( $address ) ) : ?>
                        <div style="display: flex; align-items: flex-start; gap: 0.6rem; margin-bottom: 0.65rem;">
                            <svg style="width: 16px; height: 16px; color: #4A2A18; flex-shrink: 0; margin-top: 2px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.82rem; color: #57534e; line-height: 1.45;"><?php echo esc_html( $address ); ?></span>
                        </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $phone ) ) : ?>
                        <div style="display: flex; align-items: center; gap: 0.6rem; margin-bottom: 0.65rem;">
                            <svg style="width: 16px; height: 16px; color: #4A2A18; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" style="font-family: 'Instrument Sans', sans-serif; font-size: 0.84rem; color: #1c1917; font-weight: 600; text-decoration: none;"><?php echo esc_html( $phone ); ?></a>
                        </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $email ) ) : ?>
                        <div style="display: flex; align-items: center; gap: 0.6rem;">
                            <svg style="width: 16px; height: 16px; color: #4A2A18; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <a href="mailto:<?php echo esc_attr( $email ); ?>" style="font-family: 'Instrument Sans', sans-serif; font-size: 0.84rem; color: #4A2A18; font-weight: 600; text-decoration: underline; text-underline-offset: 2px;"><?php echo esc_html( $email ); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- PROVINCIAL COUNCIL -->
            <div style="text-align: center; margin-bottom: 2.5rem; padding-top: 3rem; border-top: 1px solid rgba(74,42,24,0.1);">
                <div class="leadership-eyebrow-container">
                    <span class="leadership-eyebrow-bullet"></span>
                    <?php
                    $provincial_eyebrow = franciscan_get_page_field( 'community-leadership', 'provincial_eyebrow', '' );
                    if ( empty( $provincial_eyebrow ) || $provincial_eyebrow === 'RANCHI PROVINCE LEADERSHIP' ) {
                        $provincial_eyebrow = 'To lead is to serve; to be greater is to become lesser.';
                    }
                    ?>
                    <span class="leadership-eyebrow-text" style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif; line-height: 1.45;"><?php echo esc_html( $provincial_eyebrow ); ?></span>
                </div>
                <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3.5vw, 2.6rem); font-weight: 700; color: #1c1917; text-transform: uppercase; margin: 0 0 1rem 0;"><?php echo esc_html( franciscan_get_page_field( 'community-leadership', 'provincial_heading', 'PROVINCIAL COUNCIL' ) ); ?></h2>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.52; max-width: 750px; margin: 0 auto;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-leadership', 'provincial_subtitle', "The Provincial Council oversees the spiritual and apostolic life of our community in Ranchi Province, ensuring our friars flourish in their vocations and effectively serve the Church's mission across India." ) ); ?>
                </p>
            </div>

            <div class="leadership-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 1.75rem;">
                <?php
                $provincial_council = franciscan_get_provincial_council();
                foreach ( $provincial_council as $member ) :
                    $raw_prov_img = ! empty( $member['image'] ) ? $member['image'] : ( ! empty( $member['photo'] ) ? $member['photo'] : '' );
                    $photo = ! empty( $raw_prov_img ) ? franciscan_resolve_friar_image_url( $raw_prov_img ) : FRANCISCAN_THEME_URI . '/assets/images/general-council/placeholder.jpg';
                    $role  = $member['role'] ?? '';
                    $name  = $member['name'] ?? '';
                ?>
                <div style="text-align: center; background: #FAF7F0; padding: 2.2rem 1.5rem; border-radius: 20px; border: 1px solid rgba(74,42,24,0.06); box-shadow: 0 4px 20px rgba(74,42,24,0.04); display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <div style="width: 130px; height: 130px; border-radius: 50%; overflow: hidden; margin: 0 auto 1.2rem auto; box-shadow: 0 8px 20px rgba(74,42,24,0.14); border: 3px solid #e6c888; background: #ffffff;">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( $name ); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        </div>
                        <?php if ( ! empty( $role ) ) : ?>
                        <div style="min-height: 48px; display: flex; align-items: center; justify-content: center; margin-bottom: 0.35rem;">
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.76rem; color: #78716c; margin: 0; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 800; line-height: 1.35;">
                                <?php echo nl2br( esc_html( $role ) ); ?>
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.05rem; font-weight: 700; color: #1c1917; margin: 0;"><?php echo esc_html( $name ); ?></h4>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
</main>

    
<!-- FOOTER + BOTTOM WIDGETS + BIBLE MODAL UNIFIED SECTION -->
<!-- Use exact copy from home page for all inner pages -->



<?php
get_footer();
