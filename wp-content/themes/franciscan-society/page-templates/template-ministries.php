<?php
/**
 * Template Name: Ministries Hub
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
    <!-- Page Hero -->
    <section style="padding: 11rem 2rem 7rem 2rem; background-image: url('<?php echo esc_url( franciscan_get_page_field( "ministries", "hero_image", FRANCISCAN_THEME_URI . "/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png" ) ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.74);"></div>
        <div style="max-width: 900px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <div style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 0.5rem 1.2rem; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.2);">
                <span style="width: 8px; height: 8px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #ffffff; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( "ministries", "hero_badge", "SERVING GOD & PEOPLE" ) ); ?></span> 
            </div>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.8rem, 5.2vw, 4.5rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;"><?php echo esc_html( franciscan_get_page_field( "ministries", "hero_title", "OUR MINISTRIES" ) ); ?></h1>
            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #e7e2d6; max-width: 680px; margin: 0 auto; line-height: 1.6;">
                <?php echo esc_html( franciscan_get_page_field( "ministries", "hero_subtitle", "Living the Gospel through pastoral care, spiritual formation, and transformative education across India and abroad." ) ); ?>
            </p>
        </div>
    </section>
        <!-- Key Impact Stats Strip -->
        <section style="background: #FAF7F0; padding: clamp(2rem, 4vw, 3.5rem) 0; border-bottom: 1px solid #ede7db;">
            <div style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 4vw, 2.5rem);">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem;">
                    
                    <div style="background: #ffffff; padding: 2rem 1.8rem; border-radius: 20px; border: 1px solid rgba(74,42,24,0.08); box-shadow: 0 8px 25px rgba(74,42,24,0.05); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div style="width: 46px; height: 46px; border-radius: 12px; background: rgba(74,42,24,0.08); display: flex; align-items: center; justify-content: center; color: #4A2A18; margin-bottom: 1.2rem;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        </div>
                        <div style="font-family: 'Phudu', sans-serif; font-size: 2.4rem; font-weight: 700; color: #4A2A18; line-height: 1; margin-bottom: 0.4rem;"><?php echo esc_html( franciscan_get_page_field( "ministries", "stat_1_num", "15+ Parishes" ) ); ?></div>
                        <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; color: #78716c; font-weight: 500;"><?php echo esc_html( franciscan_get_page_field( "ministries", "stat_1_lbl", "Across 9 Dioceses in India & Germany" ) ); ?></div>
                    </div>

                    <div style="background: #ffffff; padding: 2rem 1.8rem; border-radius: 20px; border: 1px solid rgba(74,42,24,0.08); box-shadow: 0 8px 25px rgba(74,42,24,0.05); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div style="width: 46px; height: 46px; border-radius: 12px; background: rgba(196,164,90,0.15); display: flex; align-items: center; justify-content: center; color: #a8813a; margin-bottom: 1.2rem;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        </div>
                        <div style="font-family: 'Phudu', sans-serif; font-size: 2.4rem; font-weight: 700; color: #1c1917; line-height: 1; margin-bottom: 0.4rem;"><?php echo esc_html( franciscan_get_page_field( "ministries", "stat_2_num", "20,000+" ) ); ?></div>
                        <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; color: #78716c; font-weight: 500;"><?php echo esc_html( franciscan_get_page_field( "ministries", "stat_2_lbl", "Students in 22 Regional & ICSE Schools" ) ); ?></div>
                    </div>

                    <div style="background: #ffffff; padding: 2rem 1.8rem; border-radius: 20px; border: 1px solid rgba(74,42,24,0.08); box-shadow: 0 8px 25px rgba(74,42,24,0.05); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div style="width: 46px; height: 46px; border-radius: 12px; background: rgba(74,42,24,0.08); display: flex; align-items: center; justify-content: center; color: #4A2A18; margin-bottom: 1.2rem;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        </div>
                        <div style="font-family: 'Phudu', sans-serif; font-size: 2.4rem; font-weight: 700; color: #4A2A18; line-height: 1; margin-bottom: 0.4rem;"><?php echo esc_html( franciscan_get_page_field( "ministries", "stat_3_num", "4 Centres" ) ); ?></div>
                        <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; color: #78716c; font-weight: 500;"><?php echo esc_html( franciscan_get_page_field( "ministries", "stat_3_lbl", "Dedicated Formation & Theological Houses" ) ); ?></div>
                    </div>

                    <div style="background: #ffffff; padding: 2rem 1.8rem; border-radius: 20px; border: 1px solid rgba(74,42,24,0.08); box-shadow: 0 8px 25px rgba(74,42,24,0.05); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-4px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div style="width: 46px; height: 46px; border-radius: 12px; background: rgba(196,164,90,0.15); display: flex; align-items: center; justify-content: center; color: #a8813a; margin-bottom: 1.2rem;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <div style="font-family: 'Phudu', sans-serif; font-size: 2.4rem; font-weight: 700; color: #1c1917; line-height: 1; margin-bottom: 0.4rem;"><?php echo esc_html( franciscan_get_page_field( "ministries", "stat_4_num", "104+ Friars" ) ); ?></div>
                        <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; color: #78716c; font-weight: 500;"><?php echo esc_html( franciscan_get_page_field( "ministries", "stat_4_lbl", "Professed Brothers Serving in Fraternity" ) ); ?></div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Main Ministries Section -->
        <section style="padding: clamp(3.5rem, 6vw, 6rem) 0; background-color: #FFFFFF; color: #1c1917;">
            <div style="max-width: 1320px; margin: 0 auto; padding: 0 clamp(1rem, 4vw, 2.5rem);">

                <!-- Ministry 1: Pastoral Ministry -->
                <div style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: clamp(2.5rem, 5vw, 4.5rem); align-items: center; margin-bottom: clamp(4rem, 7vw, 6.5rem);" class="responsive-ministry-row">
                    <div>
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.2rem;">
                            <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                            <span style="color: #4A2A18; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( "ministries", "pastoral_badge", "PASTORAL MINISTRY" ) ); ?></span>
                        </div>
                        <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3.2vw, 2.7rem); font-weight: 700; color: #1c1917; text-transform: uppercase; line-height: 1.2; margin: 0 0 1.5rem 0;">
                            <?php echo esc_html( franciscan_get_page_field( "ministries", "pastoral_title", "PROCLAIMING THE GOSPEL THROUGH COMPASSIONATE SERVICE" ) ); ?>
                        </h2>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.52; margin-bottom: 1.2rem;">
                            <?php echo esc_html( franciscan_get_page_field( "ministries", "pastoral_lead", "St. Francis gathered brothers around him to become heralds of the Good News. Inspired by this vision, the TOR Franciscans of the Province actively engage in pastoral ministry in parishes. Through this vital service to the Church, the friars dedicate themselves wholeheartedly to the mission of evangelization by their pastoral presence and ministry." ) ); ?>
                        </p>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.52; margin-bottom: 1.8rem;">
                            <?php echo esc_html( franciscan_get_page_field( "ministries", "pastoral_desc", "Their ministry extends beyond the celebration of the sacraments to a compassionate and attentive presence among the people—caring for the sick and elderly, pastoral counseling, and family visits across 15 parishes in India and the Archdiocese of Freiburg, Germany." ) ); ?>
                        </p>

                        <!-- Key Pillars Grid -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">Sacramental Life</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">Care for the Sick</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">Family Visitation</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">Ongoing Conversion</span>
                            </div>
                        </div>

                        <a href="<?php echo esc_url( home_url( franciscan_get_page_field( "ministries", "pastoral_btn_url", "/ministries-pastoral/" ) ) ); ?>" class="btn-fill-animation" style="display: inline-flex; align-items: center; gap: 0.6rem; background: #4A2A18; color: #ffffff; padding: 0.95rem 2rem; border-radius: 8px; font-family: 'Instrument Sans', sans-serif; font-weight: 800; font-size: 0.88rem; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;">
                            <span><?php echo esc_html( franciscan_get_page_field( "ministries", "pastoral_btn_text", "EXPLORE PASTORAL MINISTRY" ) ); ?></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                        </a>
                    </div>

                    <div style="position: relative; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 50px rgba(74,42,24,0.15); border: 2px solid rgba(230,200,136,0.3);">
                        <img loading="lazy" decoding="async" src="<?php echo esc_url( franciscan_get_page_field( "ministries", "pastoral_image", FRANCISCAN_THEME_URI . "/assets/images/gallery/WhatsApp Image 2026-08-07 at 1.39.44 PM.jpeg" ) ); ?>" alt="Pastoral Ministry in Action" style="width: 100%; height: 520px; object-fit: cover; display: block; transition: transform 0.6s ease;" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(12,11,10,0.85)); padding: 2rem 1.8rem; color: #ffffff;">
                            <div style="font-family: 'Phudu', sans-serif; font-size: 1.15rem; font-weight: 700; text-transform: uppercase;"><?php echo esc_html( franciscan_get_page_field( "ministries", "pastoral_img_caption_title", "15 Parishes in 9 Dioceses" ) ); ?></div>
                            <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; color: #e6c888;"><?php echo esc_html( franciscan_get_page_field( "ministries", "pastoral_img_caption_sub", "India & Archdiocese of Freiburg, Germany" ) ); ?></div>
                        </div>
                    </div>
                </div>

                <!-- Ministry 2: Formation Ministry (Inverted Layout) -->
                <div style="display: grid; grid-template-columns: 0.9fr 1.1fr; gap: clamp(2.5rem, 5vw, 4.5rem); align-items: center; margin-bottom: clamp(4rem, 7vw, 6.5rem);" class="responsive-ministry-row">
                    <div style="position: relative; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 50px rgba(74,42,24,0.15); border: 2px solid rgba(230,200,136,0.3);">
                        <img loading="lazy" decoding="async" src="<?php echo esc_url( franciscan_get_page_field( "ministries", "formation_image", FRANCISCAN_THEME_URI . "/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.30.25 AM (1).jpeg" ) ); ?>" alt="Franciscan Formation and Consecrated Life" style="width: 100%; height: 520px; object-fit: cover; display: block; transition: transform 0.6s ease;" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(12,11,10,0.85)); padding: 2rem 1.8rem; color: #ffffff;">
                            <div style="font-family: 'Phudu', sans-serif; font-size: 1.15rem; font-weight: 700; text-transform: uppercase;"><?php echo esc_html( franciscan_get_page_field( "ministries", "formation_img_caption_title", "4 Sacred Formation Houses" ) ); ?></div>
                            <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; color: #e6c888;"><?php echo esc_html( franciscan_get_page_field( "ministries", "formation_img_caption_sub", "Dorma • Bichna • Ranchi Clericate" ) ); ?></div>
                        </div>
                    </div>

                    <div>
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.2rem;">
                            <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                            <span style="color: #4A2A18; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( "ministries", "formation_badge", "FORMATION MINISTRY" ) ); ?></span>
                        </div>
                        <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3.2vw, 2.7rem); font-weight: 700; color: #1c1917; text-transform: uppercase; line-height: 1.2; margin: 0 0 1.5rem 0;">
                            <?php echo esc_html( franciscan_get_page_field( "ministries", "formation_title", "NURTURING THE NEXT GENERATION OF FRANCISCANS" ) ); ?>
                        </h2>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.52; margin-bottom: 1.2rem;">
                            <?php echo esc_html( franciscan_get_page_field( "ministries", "formation_lead", "Formation is the foundational ministry through which the Franciscan TOR charism and spirituality are creatively and faithfully proposed to successive generations. As Pope John Paul II emphasized in Vita Consecrata, formation is a dynamic, lifelong process that leads to ongoing conversion." ) ); ?>
                        </p>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.52; margin-bottom: 1.8rem;">
                            <?php echo esc_html( franciscan_get_page_field( "ministries", "formation_desc", "The Province operates two Minor Seminaries (Dorma and Ranchi), the Novitiate House in Bichna (Khunti), and the Clericate at Purulia Road (Ranchi), providing holistic spiritual, intellectual, human, and pastoral preparation for religious consecration." ) ); ?>
                        </p>

                        <!-- Key Pillars Grid -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">Spiritual Direction</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">Theological Studies</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">Franciscan Charism</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">Fraternal Living</span>
                            </div>
                        </div>

                        <a href="<?php echo esc_url( home_url( franciscan_get_page_field( "ministries", "formation_btn_url", "/ministries-formation/" ) ) ); ?>" class="btn-fill-animation" style="display: inline-flex; align-items: center; gap: 0.6rem; background: #4A2A18; color: #ffffff; padding: 0.95rem 2rem; border-radius: 8px; font-family: 'Instrument Sans', sans-serif; font-weight: 800; font-size: 0.88rem; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;">
                            <span><?php echo esc_html( franciscan_get_page_field( "ministries", "formation_btn_text", "EXPLORE FORMATION MINISTRY" ) ); ?></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                        </a>
                    </div>
                </div>

                <!-- Ministry 3: Education Ministry -->
                <div style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: clamp(2.5rem, 5vw, 4.5rem); align-items: center;" class="responsive-ministry-row">
                    <div>
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.2rem;">
                            <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                            <span style="color: #4A2A18; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( "ministries", "education_badge", "EDUCATION MINISTRY" ) ); ?></span>
                        </div>
                        <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3.2vw, 2.7rem); font-weight: 700; color: #1c1917; text-transform: uppercase; line-height: 1.2; margin: 0 0 1.5rem 0;">
                            <?php echo esc_html( franciscan_get_page_field( "ministries", "education_title", "EMPOWERING MINDS THROUGH KNOWLEDGE & VALUES" ) ); ?>
                        </h2>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.52; margin-bottom: 1.2rem;">
                            <?php echo esc_html( franciscan_get_page_field( "ministries", "education_lead", "Guided by the motto, “Peace and Joy to the World,” our educational apostolate serves over 20,000 students across Jharkhand, Bihar, and West Bengal. Operating five Hindi-medium high schools, eleven middle schools, and six English-medium schools affiliated with CISCE and CBSE boards." ) ); ?>
                        </p>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.52; margin-bottom: 1.8rem;">
                            <?php echo esc_html( franciscan_get_page_field( "ministries", "education_desc", "Open to students of all faiths and backgrounds, our schools provide balanced, holistic education nurturing moral, intellectual, emotional, and spiritual development." ) ); ?>
                        </p>

                        <!-- Key Pillars Grid -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">20,000+ Students</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">22 Total Institutions</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">CISCE &amp; CBSE Affiliations</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; background: #FAF7F0; padding: 0.85rem 1.1rem; border-radius: 12px; border: 1px solid rgba(74,42,24,0.06);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4A2A18" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span style="font-family: 'Instrument Sans', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1c1917;">Value-Based Education</span>
                            </div>
                        </div>

                        <a href="<?php echo esc_url( home_url( franciscan_get_page_field( "ministries", "education_btn_url", "/ministries-education/" ) ) ); ?>" class="btn-fill-animation" style="display: inline-flex; align-items: center; gap: 0.6rem; background: #4A2A18; color: #ffffff; padding: 0.95rem 2rem; border-radius: 8px; font-family: 'Instrument Sans', sans-serif; font-weight: 800; font-size: 0.88rem; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;">
                            <span><?php echo esc_html( franciscan_get_page_field( "ministries", "education_btn_text", "EXPLORE EDUCATION MINISTRY" ) ); ?></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                        </a>
                    </div>

                    <div style="position: relative; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 50px rgba(74,42,24,0.15); border: 2px solid rgba(230,200,136,0.3);">
                        <img loading="lazy" decoding="async" src="<?php echo esc_url( franciscan_get_page_field( "ministries", "education_image", FRANCISCAN_THEME_URI . "/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.39.44 AM (1).jpeg" ) ); ?>" alt="Education Ministry in Franciscan Schools" style="width: 100%; height: 520px; object-fit: cover; display: block; transition: transform 0.6s ease;" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(12,11,10,0.85)); padding: 2rem 1.8rem; color: #ffffff;">
                            <div style="font-family: 'Phudu', sans-serif; font-size: 1.15rem; font-weight: 700; text-transform: uppercase;"><?php echo esc_html( franciscan_get_page_field( "ministries", "education_img_caption_title", "22 Schools Across 3 States" ) ); ?></div>
                            <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; color: #e6c888;"><?php echo esc_html( franciscan_get_page_field( "ministries", "education_img_caption_sub", "Jharkhand • Bihar • West Bengal" ) ); ?></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Franciscan Ministry Mission Banner -->
        <section class="has-vine-watermark" style="position: relative; background: #0c0b0a; color: #ffffff; padding: clamp(4rem, 7vw, 6rem) 0; overflow: hidden;">
            <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/shapes/vine-corner-watermark.png' ); ?>" class="vine-corner-watermark" alt="" aria-hidden="true" style="opacity: 0.35; filter: brightness(1.6);">
            <div style="max-width: 1100px; margin: 0 auto; padding: 0 clamp(1.5rem, 5vw, 3rem); text-align: center; position: relative; z-index: 2;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(230,200,136,0.15); padding: 0.45rem 1.2rem; border-radius: 50px; border: 1px solid rgba(230,200,136,0.3); margin-bottom: 1.8rem;">
                    <span style="color: #e6c888; font-size: 0.82rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( "ministries", "mission_badge", "OUR CALLING" ) ); ?></span>
                </div>
                <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.2rem, 4vw, 3.4rem); font-weight: 700; color: #ffffff; text-transform: uppercase; line-height: 1.2; margin: 0 0 1.5rem 0; letter-spacing: -0.01em;">
                    <?php echo esc_html( franciscan_get_page_field( "ministries", "mission_title", "“PEACE AND JOY TO THE WORLD”" ) ); ?>
                </h2>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(1.05rem, 1.8vw, 1.2rem); color: #d6d3d1; max-width: 780px; margin: 0 auto 2.5rem auto; line-height: 1.52;">
                    <?php echo esc_html( franciscan_get_page_field( "ministries", "mission_desc", "Whether in rural parish mission stations, classrooms of growing minds, or quiet contemplative chapels, our friars serve as instruments of Christ’s peace and fraternal love." ) ); ?>
                </p>
                <div style="display: flex; gap: 1.2rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url( home_url( franciscan_get_page_field( "ministries", "mission_btn_url", "/contact/#enquiry" ) ) ); ?>" class="btn-fill-animation" style="display: inline-flex; align-items: center; gap: 0.6rem; background: #e6c888; color: #1c1917; padding: 1rem 2.4rem; border-radius: 8px; font-family: 'Instrument Sans', sans-serif; font-weight: 800; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;">
                        <span><?php echo esc_html( franciscan_get_page_field( "ministries", "mission_btn_text", "JOIN OUR MISSION" ) ); ?></span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                    </a>
                    <a href="<?php echo esc_url( home_url( franciscan_get_page_field( "ministries", "mission_sec_btn_url", "/about/" ) ) ); ?>" style="display: inline-flex; align-items: center; gap: 0.6rem; background: transparent; color: #ffffff; border: 1.5px solid rgba(255,255,255,0.4); padding: 1rem 2.4rem; border-radius: 8px; font-family: 'Instrument Sans', sans-serif; font-weight: 800; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#e6c888'; this.style.color='#e6c888';" onmouseout="this.style.borderColor='rgba(255,255,255,0.4)'; this.style.color='#ffffff';">
                        <span><?php echo esc_html( franciscan_get_page_field( "ministries", "mission_sec_btn_text", "LEARN ABOUT US" ) ); ?></span>
                    </a>
                </div>
            </div>
        </section>

        <style>
            @media (max-width: 900px) {
                .responsive-ministry-row {
                    grid-template-columns: 1fr !important;
                    gap: 2rem !important;
                }
                .responsive-ministry-row > div:first-child {
                    order: 2 !important;
                }
                .responsive-ministry-row > div:last-child {
                    order: 1 !important;
                }
            }
        </style>
    </main>

<!-- Footer -->

<!-- FOOTER + BOTTOM WIDGETS + BIBLE MODAL UNIFIED SECTION -->
<!-- Use exact copy from home page for all inner pages -->



<?php
get_footer();
