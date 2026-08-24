<?php
/**
 * Template Name: Community - Friaries
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
    $friaries_hero_bg = franciscan_get_page_field( 'community-friaries', 'hero_image', '' );
    if ( empty( $friaries_hero_bg ) ) {
        $friaries_hero_bg = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png';
    }
    ?>
    <section style="padding: 12rem 2rem 8rem 2rem; background-image: url('<?php echo esc_url( $friaries_hero_bg ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.7);"></div>
        <div style="max-width: 800px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.8rem, 5.2vw, 4.5rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;"><?php echo esc_html( franciscan_get_page_field( 'community-friaries', 'hero_title', 'OUR FRIARIES & ASHRAMS' ) ); ?></h1>
        </div>
    </section>



    <section class="page-hero" style="position: relative; padding: 3rem 2rem 0; background: #FFF;">
        <div style="position: relative; width: 100%; display: flex; flex-direction: column; justify-content: center; background: linear-gradient(135deg, #4A2A18, #6b3d28); min-height: 380px; border-radius: 24px; padding: 4rem 2rem; max-width: 1400px; margin: 0 auto;">
            <div style="position: relative; z-index: 2;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem;">
                    <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%;"></span>
                    <span style="color: #fff; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; font-family: 'Instrument Sans';"><?php echo esc_html( franciscan_get_page_field( 'community-friaries', 'card_badge', 'OUR FRIARIES' ) ); ?></span>
                </div>
                <h2 style="font-family: 'Phudu'; font-size: clamp(2.6rem, 4.2vw, 62px); font-weight: 600; color: #fff; text-transform: uppercase; line-height: 1.05; margin-bottom: 1.5rem;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-friaries', 'card_title', 'HOUSES OF PRAYER AND SERVICE' ) ); ?>
                </h2>
                <p style="font-family: 'Instrument Sans'; font-size: 1.1rem; color: rgba(255,255,255,0.9); max-width: 600px;">
                    <?php echo esc_html( franciscan_get_page_field( 'community-friaries', 'card_subtitle', 'Communities across India and beyond, rooted in the Franciscan charism of poverty, prayer, and service.' ) ); ?>
                </p>
            </div>
        </div>
    </section>

    

        <div style="max-width: 1200px; margin: 0 auto; padding: clamp(3rem, 8vw, 5rem) 2rem;">
        <h2 style="font-family: 'Phudu', sans-serif; font-size: 2.2rem; font-weight: 900; color: #1c1917; margin-bottom: 2.5rem; text-align: center;">OUR FRIARIES</h2>
        <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.5rem; font-weight: 700; color: #4a2a18; margin-top: 3rem; margin-bottom: 1.5rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem;">ARCHDIOCESE OF RANCHI</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1157.JPG' ); ?>" alt="Franciscan Ashram (Provincial Residence)" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram (Provincial Residence)</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Harmu Housing Colony, Ranchi – 834002, JHARKHAND, Estd. 1978</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.28 PM (1).jpeg' ); ?>" alt="Franciscan Training Institute" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Training Institute</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">Purulia Road (Dr. Camil Bulcke Path), P. Box No. 123, Ranchi – 834001, JHARKHAND, Estd. 1954</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1157.JPG' ); ?>" alt="Franciscan Ashram Banhora" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram Banhora</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Hehel, Ranchi – 834005, JHARKHAND, Estd. 1988</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.30.24 AM.jpeg' ); ?>" alt="Franciscan Ashram" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Getalsud (Via – Tatisilwai), Ranchi – 835101, JHARKHAND, Estd. 2002</p>
                </div>
            </div>
        </div>
        <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.5rem; font-weight: 700; color: #4a2a18; margin-top: 3rem; margin-bottom: 1.5rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem;">DIOCESE OF KHUNTI</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (2).jpeg' ); ?>" alt="St. Anthony’s Monastery" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">St. Anthony’s Monastery</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Dorma (Via – Torpa), Khunti – 835227, JHARKHAND, Estd. 1970</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2531.JPG' ); ?>" alt="Franciscan Ashram Gaurbera" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram Gaurbera</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Bhamini (Via - Muruhu), Khunti – 835216, JHARKHAND, Estd. 1986</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1166.JPG' ); ?>" alt="Assisi Bhavan" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Assisi Bhavan</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Dorma (Via – Torpa), Khunti – 835227, JHARKHAND, Estd. 2006</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-02-15 at 9.44.56 AM (1).jpeg' ); ?>" alt="Vinay Bhavan" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Vinay Bhavan</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Bichna, Khunti - 835210, Jharkhand, Estd. 2009</p>
                </div>
            </div>
        </div>
        <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.5rem; font-weight: 700; color: #4a2a18; margin-top: 3rem; margin-bottom: 1.5rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem;">DIOCESE OF SIMDEGA</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/Fr. Manoj Vengathanam Minister Provincial.jpg' ); ?>" alt="Franciscan Ashram Bhukumunda" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram Bhukumunda</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Targa, Simdega – 835226, JHARKHAND, Estd. 1987</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1018.JPG' ); ?>" alt="St. Joseph’s Church Kuruskela" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">St. Joseph’s Church Kuruskela</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">Simdega - 835228, JHARKHAND, Estd. 2012</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2012.JPG' ); ?>" alt="Catholic Church Behrinbasa" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Catholic Church Behrinbasa</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Behrinbasa, Simdega – 835226, JHARKHAND, Estd. 2013</p>
                </div>
            </div>
        </div>
        <!-- Single Friary Dioceses Grouped in a 3-Column Row -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem; margin-top: 3rem; margin-bottom: 2rem; align-items: start;">
            <!-- Diocese of Gumla -->
            <div>
                <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.35rem; font-weight: 700; color: #4a2a18; margin-top: 0; margin-bottom: 1.2rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem;">DIOCESE OF GUMLA</h3>
                <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff; height: 100%;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2531.JPG' ); ?>" alt="Franciscan Ashram Murumkela" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1.5rem; flex-grow: 1;">
                        <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram Murumkela</h4>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Kansir (Via – Chainpur), Gumla – 835206, JHARKHAND, Estd. 1998</p>
                    </div>
                </div>
            </div>

            <!-- Diocese of Purnea -->
            <div>
                <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.35rem; font-weight: 700; color: #4a2a18; margin-top: 0; margin-bottom: 1.2rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem;">DIOCESE OF PURNEA</h3>
                <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff; height: 100%;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.28 PM (1).jpeg' ); ?>" alt="Franciscan Ashram Thakurganj" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1.5rem; flex-grow: 1;">
                        <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram Thakurganj</h4>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Thakurganj, Kishanganj – 855116, BIHAR, Estd. 1996</p>
                    </div>
                </div>
            </div>

            <!-- Diocese of Bagdogra -->
            <div>
                <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.35rem; font-weight: 700; color: #4a2a18; margin-top: 0; margin-bottom: 1.2rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem;">DIOCESE OF BAGDOGRA</h3>
                <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff; height: 100%;">
                    <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.26 PM.jpeg' ); ?>" alt="Franciscan Ashram Adhikari" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1.5rem; flex-grow: 1;">
                        <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram Adhikari</h4>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Adhikari (Via – Khoribari), Darjeeling – 734427, WEST BENGAL, Estd. 1982.</p>
                    </div>
                </div>
            </div>
        </div>
        <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.5rem; font-weight: 700; color: #4a2a18; margin-top: 3rem; margin-bottom: 1.5rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem;">DIOCESE OF JALPAIGURI</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1166.JPG' ); ?>" alt="Franciscan Ashram Hasimara" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram Hasimara</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Hasimara, Jalpaiguri – 735215, WEST BENGAL, Estd. 1984</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-10 at 4.28.52 AM.jpeg' ); ?>" alt="Franciscan Ashram Chel-Line" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram Chel-Line</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">Sylee, P.O. Mal, Jalpaiguri - 735221, WEST BENGAL, Estd. 2018</p>
                </div>
            </div>
        </div>
        <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.5rem; font-weight: 700; color: #4a2a18; margin-top: 3rem; margin-bottom: 1.5rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem;">DIOCESE OF ROURKELA</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2529.JPG' ); ?>" alt="Franciscan Ashram (St. Francis Xavier Church) Deorapara" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram (St. Francis Xavier Church) Deorapara</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Lohondabud, Sundergarh – 700022, ODISHA, Estd. 2003</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1018.JPG' ); ?>" alt="Sneh Bhavan Jamunadipa" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Sneh Bhavan Jamunadipa</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">P.O. Kuarmunda, Rourkela, ODISHA-770039, Estd. 2014</p>
                </div>
            </div>
        </div>
        <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.5rem; font-weight: 700; color: #4a2a18; margin-top: 3rem; margin-bottom: 1.5rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem;">DIOCESE OF BONGAIGAON</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 580px)); gap: 2rem; margin-bottom: 2rem;">
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 1.39.48 PM (1).jpeg' ); ?>" alt="Franciscan Ashram Kashiabari" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Franciscan Ashram Kashiabari</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">Village Sindrijhora, P.O. Kashiabari Kokrajhar, ASSAM - 783360</p>
                </div>
            </div>
        </div>
        <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.5rem; font-weight: 700; color: #4a2a18; margin-top: 3rem; margin-bottom: 1.5rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem;">OUTSIDE INDIA</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.26 PM (2).jpeg' ); ?>" alt="Pater Nicholas Tudu" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Pater Nicholas Tudu</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">TOR, Pfarrei Mariä Himmelfahrt, Schulstr.1, 84051 Essenbach</p>
                </div>
            </div>
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column; background: #fff;">
                <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG20230215103348.jpg.jpeg' ); ?>" alt="Pater Daison Thaikkattil" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 1.5rem;">
                    <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.1rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem;">Pater Daison Thaikkattil</h4>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.5; margin: 0;">TOR, Kirch Strasse 3a, 79793 Wutoeschingen, Germany</p>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER + BOTTOM WIDGETS + BIBLE MODAL UNIFIED SECTION -->
<!-- Use exact copy from home page for all inner pages -->



<?php
get_footer();
