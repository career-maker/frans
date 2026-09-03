<?php
/**
 * Template Name: Community - Friars Directory
 *
 * @package Franciscan_Society
 */

get_header();
?>

<style>
        @media (max-width: 991px) { html, body { margin: 0; padding: 0; } body.menu-open #welcome-scroll-bible-container { display: none !important; } }

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

<main id="main-content" style="padding-top: 0; background-color: #FFF;">
    <!-- Page Hero -->
    <?php
    $friars_hero_bg = franciscan_get_page_field( 'community-friars', 'hero_image', '' );
    if ( empty( $friars_hero_bg ) || false !== strpos( $friars_hero_bg, 'ChatGPT_Image' ) ) {
        $friars_hero_bg = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/friars-banner.jpg';
    }
    ?>
    <section style="padding: 12rem 2rem 8rem 2rem; background-image: url('<?php echo esc_url( $friars_hero_bg ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.7);"></div>
        <div style="max-width: 800px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.8rem, 5.2vw, 4.5rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;"><?php echo esc_html( franciscan_get_page_field( 'community-friars', 'hero_title', 'OUR FRIARS' ) ); ?></h1>
        </div>
    </section>



    <section class="page-hero" style="position: relative; padding: 3rem 2rem 0; background: #FFF;">
        <div class="has-vine-watermark" style="position: relative; width: 100%; display: flex; flex-direction: column; justify-content: center; background: linear-gradient(135deg, #4A2A18, #6b3d28); min-height: 380px; border-radius: 24px; padding: 4rem clamp(2rem, 5vw, 4rem); max-width: 1400px; margin: 0 auto; overflow: hidden; box-shadow: 0 15px 35px rgba(74,42,24,0.18);">
            <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/shapes/vine-corner-watermark.png' ); ?>" class="vine-corner-watermark" alt="" aria-hidden="true" style="position: absolute; top: 0; right: 0; width: clamp(280px, 36vw, 540px); height: 100%; object-fit: contain; object-position: top right; pointer-events: none; opacity: 0.38; filter: brightness(1.6) contrast(1.1); z-index: 1;">
            <div style="position: relative; z-index: 2;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem;">
                    <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%;"></span>
                    <span style="color: #fff; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; font-family: 'Instrument Sans';"><?php echo esc_html( franciscan_get_page_field( 'community-friars', 'card_badge', 'OUR FRIARS' ) ); ?></span>
                </div>
                <h2 style="font-family: 'Phudu'; font-size: clamp(2.6rem, 4.2vw, 62px); font-weight: 600; color: #fff; text-transform: uppercase; line-height: 1.05; margin-bottom: 1.5rem;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-friars', 'card_title', 'BROTHERS IN CHRIST' ) ); ?>
                </h2>
                <p style="font-family: 'Instrument Sans'; font-size: 1.1rem; color: rgba(255,255,255,0.9); max-width: 600px;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-friars', 'card_subtitle', 'Over 104 professed friars dedicated to prayer, community, and active ministry.' ) ); ?>
                </p>
            </div>
        </div>
    </section>

    

        <div style="max-width: 1200px; margin: 0 auto; padding: clamp(3rem, 8vw, 5rem) 2rem;">
        <h2 style="font-family: 'Phudu', sans-serif; font-size: 2.2rem; font-weight: 900; color: #1c1917; margin-bottom: 2.5rem; text-align: center;">OUR FRIARS</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 2rem; margin-bottom: 5rem;">
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-anselem-kullu.png' ); ?>" alt="Fr. Anselm Kullu" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Anselm Kullu</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-jerome-alookaran.png' ); ?>" alt="Fr. Jerome Alookaran" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Jerome Alookaran</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-simon-gahatraj.png' ); ?>" alt="Br. Simon Gahatraj" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Simon Gahatraj</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-cyril-kochuvilayil.png' ); ?>" alt="Fr. Cyril Kochuvilayil" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Cyril Kochuvilayil</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-kujur-marianus.png' ); ?>" alt="Fr. Marianus Kujur" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Marianus Kujur</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-hilarius-barla.png' ); ?>" alt="Fr. Hilarius Barla" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Hilarius Barla</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-john-thakadiyel.png' ); ?>" alt="Fr. John Thakadiyel" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. John Thakadiyel</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-nicolus-tudu.png' ); ?>" alt="Fr. Nicholas Tudu" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Nicholas Tudu</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-donatus-xaxa.png' ); ?>" alt="Fr. Donatus Xaxa" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Donatus Xaxa</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-antony-hemrom.png' ); ?>" alt="Fr. Anthony Hemrom" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Anthony Hemrom</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-donatus-tirkey.png' ); ?>" alt="Fr. Donatus Tirkey" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Donatus Tirkey</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-soren-anthony.png' ); ?>" alt="Fr. Anthony Soren" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Anthony Soren</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-alphonse-ekka.png' ); ?>" alt="Fr. Alphonse Ekka" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Alphonse Ekka</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-philip-kaduthanam.png' ); ?>" alt="Fr. Philip Kaduthanam" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Philip Kaduthanam</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-mathew-kanayinkal.png' ); ?>" alt="Fr. Mathew Kanayinkal" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Mathew Kanayinkal</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-oscar-hebro.png' ); ?>" alt="Br. Oscar Hemrom" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Oscar Hemrom</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-george-mailadil.png' ); ?>" alt="Fr. George Mailadil" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. George Mailadil</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-subash-p-tete.png' ); ?>" alt="Br. Subhash P. Tete" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Subhash P. Tete</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-herman-kujur.png' ); ?>" alt="Fr. Herman Kujur" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Herman Kujur</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-john-horo.png' ); ?>" alt="Fr. John Horo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. John Horo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-vijay-ekka.png' ); ?>" alt="Fr. Vijay Kumar Ekka" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Vijay Kumar Ekka</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-bigit-bage.png' ); ?>" alt="Fr. Bigit Bage" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Bigit Bage</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-ajeet-xalxo.png' ); ?>" alt="Fr. Ajit Xalxo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Ajit Xalxo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-daison-thaikattil.png' ); ?>" alt="Fr. Daison Thaikattil" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Daison Thaikattil</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-anand-kumar-barla.png' ); ?>" alt="Fr. Anand Kumar Barla" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Anand Kumar Barla</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-leander-kerketta.png' ); ?>" alt="Fr. Leander Kerketta" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Leander Kerketta</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-isidor-baa.png' ); ?>" alt="Fr. Esidor Baa" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Esidor Baa</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-suman-kishore-dhan.png' ); ?>" alt="Fr. Suman Kishore Dhan" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Suman Kishore Dhan</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-isidor-kerketta.png' ); ?>" alt="Fr. Isidore Kerketta" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Isidore Kerketta</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-carlous-kiro.png' ); ?>" alt="Fr. Carolus Kiro" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Carolus Kiro</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-ranjan-prakash-ekka.png' ); ?>" alt="Fr. Ranjan Prakash Ekka" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Ranjan Prakash Ekka</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-abhay-tigga.png' ); ?>" alt="Fr. Abhay Tigga" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Abhay Tigga</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-manoj-vengathanam.png' ); ?>" alt="Fr. Manoj Vengathanam" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Manoj Vengathanam</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-manoj-kullu.png' ); ?>" alt="Fr. Manoj Kullu" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Manoj Kullu</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-shaji-alappurath.png' ); ?>" alt="Fr. Shaji Alapurath" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Shaji Alapurath</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-benjamin-tiru.png' ); ?>" alt="Fr. Benjamin Tiru" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Benjamin Tiru</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-vincy-illickal.png' ); ?>" alt="Fr. Vincy Illickal" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Vincy Illickal</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-xavier-kindo.png' ); ?>" alt="Fr. Xavier Kindo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Xavier Kindo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-raju-tirkey.png' ); ?>" alt="Fr. Raju Tirkey" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Raju Tirkey</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-bara-anthres.png' ); ?>" alt="Fr. Anthers Bara" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Anthers Bara</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-ambose-lakra.png' ); ?>" alt="Fr. Ambose Lakra" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Ambose Lakra</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-benidict-tirkey.png' ); ?>" alt="Fr. Benedict Tirkey" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Benedict Tirkey</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-paulinus-kiro.png' ); ?>" alt="Fr. Paulinus Kiro" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Paulinus Kiro</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-bijay-tirkey.png' ); ?>" alt="Fr. Bijay Prakash Tirkey" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Bijay Prakash Tirkey</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-joseph-toppo.png' ); ?>" alt="Fr. Joseph Toppo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Joseph Toppo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-gigesh-meckal.png' ); ?>" alt="Fr. Gigesh Meckel" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Gigesh Meckel</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-ajit-tiru.png' ); ?>" alt="Fr. Ajit Tiru" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Ajit Tiru</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-anup-toppo.png' ); ?>" alt="Fr. Anup Toppo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Anup Toppo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-deepak-ekka.png' ); ?>" alt="Fr. Deepak Ekka" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Deepak Ekka</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-amit-ekka.png' ); ?>" alt="Fr. Amit Ekka" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Amit Ekka</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-chandar-kujur.png' ); ?>" alt="Fr. Chander Kujur" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Chander Kujur</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-sumit-tigga.png' ); ?>" alt="Fr. Sumit Bilsan Tigga" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Sumit Bilsan Tigga</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-ajeet-paul-kerketta.png' ); ?>" alt="Fr. Ajeet Paul Kerketta" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Ajeet Paul Kerketta</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-naveen-kukur.png' ); ?>" alt="Fr. Naveen Kujur" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Naveen Kujur</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-pradeep-lakra.png' ); ?>" alt="Fr. Pradeep Lakra" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Pradeep Lakra</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-prashant-xalxo.png' ); ?>" alt="Fr. Prashant Xalxo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Prashant Xalxo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-willson-ludun.png' ); ?>" alt="Fr. Wilson Lugun" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Wilson Lugun</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-anshu-anand-tiru.png' ); ?>" alt="Fr. Anshu Anand Tiru" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Anshu Anand Tiru</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-mathias-kandulna.png' ); ?>" alt="Fr. Matias Kandulna" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Matias Kandulna</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-anand-barla.png' ); ?>" alt="Fr. Anand Barla" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Anand Barla</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-mukesh-ekka.png' ); ?>" alt="Fr. Mukesh Ekka" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Mukesh Ekka</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-rohit-ekka.png' ); ?>" alt="Fr. Rohit Ekka" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Rohit Ekka</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-anil-soreng.png' ); ?>" alt="Fr. Anil Soreng" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Anil Soreng</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-amit-kuamr-beck.png' ); ?>" alt="Fr. Amit Kumar Beck" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Amit Kumar Beck</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-flourence-tirkey.png' ); ?>" alt="Fr. Flourence Tirkey" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Flourence Tirkey</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-jugal-barla.png' ); ?>" alt="Fr. Jugal Barla" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Jugal Barla</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-udit-lakra.png' ); ?>" alt="Fr. Udit lakra" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Udit lakra</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-albert-kindo.png' ); ?>" alt="Fr. Albert Kindo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Albert Kindo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-sujit-lakra.png' ); ?>" alt="Fr. Sujit Lakra" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Sujit Lakra</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-sumit-tirkey.png' ); ?>" alt="Fr. Sumit Tirkey" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Sumit Tirkey</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-kuldeep-ekka.png' ); ?>" alt="Fr. Kuldeep Ekka" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Kuldeep Ekka</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-ajit-topno.png' ); ?>" alt="Br. Ajit Topno" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Ajit Topno</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-kishor-jariya.png' ); ?>" alt="Br. Kishor Jaria" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Kishor Jaria</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-santosh-toppo.png' ); ?>" alt="Fr. Santosh Toppo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Santosh Toppo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-mukesh-toppo.png' ); ?>" alt="Br. Mukesh Toppo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Mukesh Toppo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/fr-jasman-toppo.png' ); ?>" alt="Fr. Jasman Toppo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Fr. Jasman Toppo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-anselem-mundu.png' ); ?>" alt="Br. Anselm Mundu" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Anselm Mundu</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-oskar-soreng.png' ); ?>" alt="Br. Oskar Soreng" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Oskar Soreng</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-amardeep-lakra.png' ); ?>" alt="Br. Amardeep Lakra" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Amardeep Lakra</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-harshit-kerketta.png' ); ?>" alt="Br. Harshit Kerketta" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Harshit Kerketta</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-william-minz.png' ); ?>" alt="Br. William Minz" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. William Minz</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-roshan-soreng.png' ); ?>" alt="Br. Roshan Soreng" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Roshan Soreng</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-bikash-kiro.png' ); ?>" alt="Br. Bikash Kiro" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Bikash Kiro</h4>
            </div>
                    <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-santosh-toppo.png' ); ?>" alt="Br. Santosh Toppo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Santosh Toppo</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-kuldeep-ekka.png' ); ?>" alt="Br. Kuldeep Ekka" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Kuldeep Ekka</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-abrahm-soren.png' ); ?>" alt="Br. Abrahm Soren" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Abrahm Soren</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-joseph-kullu.png' ); ?>" alt="Br. Joseph Kullu" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Joseph Kullu</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-linus-kerketta.png' ); ?>" alt="Br. Linus Kerketta" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Linus Kerketta</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-mohit-dungdung.png' ); ?>" alt="Br. Mohit Dungdung" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Mohit Dungdung</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-sudeep-barwa.png' ); ?>" alt="Br. Sudeep Barwa" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Sudeep Barwa</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-ashish-bhengra.png' ); ?>" alt="Br. Ashish Bhengra" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Ashish Bhengra</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-arpan-kongari.png' ); ?>" alt="Br. Arpan Kongari" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Arpan Kongari</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-kishor-bage.png' ); ?>" alt="Br. Kishor Bage" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Kishor Bage</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-michael-topno.png' ); ?>" alt="Br. Michael Topno" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Michael Topno</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-naman-kandulna.png' ); ?>" alt="Br. Naman Kandulna" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Naman Kandulna</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-patrick-topno.png' ); ?>" alt="Br. Patrick Topno" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Patrick Topno</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.1); border: 2px solid #e6c888;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/br-praful-xaxa.png' ); ?>" alt="Br. Praful Xaxa" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0;">Br. Praful Xaxa</h4>
            </div>
        </div>
        
                <h2 style="font-family: 'Phudu', sans-serif; font-size: 2.2rem; font-weight: 900; color: #1c1917; margin-bottom: 2.5rem; text-align: center; border-top: 1px solid #e5e5e5; padding-top: 4rem;">DECEASED FRIARS</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 2rem; margin-bottom: 5rem;">
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.15); border: 2px solid #e6c888; background: #2a160b; position: relative;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/deceased/br-carlus-bara.jpeg' ); ?>" alt="Br. Carlus Bara" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0 0 0.35rem 0;">Br. Carlus Bara</h4>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 600; color: #78716c; margin: 0;">&#10013; 28.07.2002</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.15); border: 2px solid #e6c888; background: #2a160b; position: relative;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/deceased/br-michael-bhengra.jpeg' ); ?>" alt="Br. Michael Bhengra" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0 0 0.35rem 0;">Br. Michael Bhengra</h4>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 600; color: #78716c; margin: 0;">&#10013; 23.07.2003</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.15); border: 2px solid #e6c888; background: #2a160b; position: relative;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/deceased/fr-george-palamattam.jpeg' ); ?>" alt="Fr. George Palamattam" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0 0 0.35rem 0;">Fr. George Palamattam</h4>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.15); border: 2px solid #e6c888; background: #2a160b; position: relative;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/deceased/br-benedict-kullu.jpg' ); ?>" alt="Br. Benedict Kullu" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0 0 0.35rem 0;">Br. Benedict Kullu</h4>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 600; color: #78716c; margin: 0;">&#10013; 28.01.2021</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.15); border: 2px solid #e6c888; background: #2a160b; position: relative;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/deceased/fr-gregory-kerketta.jpg' ); ?>" alt="Fr. Gregory Kerketta" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0 0 0.35rem 0;">Fr. Gregory Kerketta</h4>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 600; color: #78716c; margin: 0;">&#10013; 20.04.2021</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.15); border: 2px solid #e6c888; background: #2a160b; position: relative;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/deceased/fr-donatus-soreng.jpg' ); ?>" alt="Fr. Donatus Soreng" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0 0 0.35rem 0;">Fr. Donatus Soreng</h4>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 600; color: #78716c; margin: 0;">&#10013; 11.05.2021</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.15); border: 2px solid #e6c888; background: #2a160b; position: relative;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/deceased/fr-fabian.jpg' ); ?>" alt="Fr. Fabian" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0 0 0.35rem 0;">Fr. Fabian</h4>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 600; color: #78716c; margin: 0;">&#10013; 20.01.2025</p>
            </div>
            <div style="text-align: center;">
                <div style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem auto; box-shadow: 0 10px 20px rgba(0,0,0,0.15); border: 2px solid #e6c888; background: #2a160b; position: relative;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/friars/deceased/fr-sushil-prawin-tiru.png' ); ?>" alt="Fr. Sushil Prawin Tiru" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 700; color: #4a2a18; margin: 0 0 0.35rem 0;">Fr. Sushil Prawin Tiru</h4>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 600; color: #78716c; margin: 0;">&#10013; 07.01.2026</p>
            </div>
        </div>
    </div>
    <!-- FOOTER + BOTTOM WIDGETS + BIBLE MODAL UNIFIED SECTION -->
<!-- Use exact copy from home page for all inner pages -->



<?php
get_footer();
