<?php
/**
 * Template Name: Publications & Resources
 *
 * @package Franciscan_Society
 */

get_header();
?>

<style>
        @media (max-width: 991px) {
            /* Hide sticky widgets when mobile menu is open */
            body.menu-open #welcome-scroll-bible-container,
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
    <!-- Page Hero -->
    <section class="page-hero-banner" style="padding: 11rem 2rem 7rem 2rem; background-image: url('<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png' ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.72);"></div>
        <div style="max-width: 800px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <div style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 0.5rem 1.2rem; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.2);">
                <span style="width: 8px; height: 8px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #ffffff; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( "publications", "hero_badge", "PROVINCIAL CHRONICLES" ) ); ?>
            </div>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.8rem, 5.2vw, 4.5rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;"><?php echo esc_html( franciscan_get_page_field( "publications", "hero_title", "PUBLICATIONS & MEDIA" ) ); ?></h1>
        </div>
    </section>
        <!-- Publications & Articles List -->
        <section class="has-vine-watermark" style="position: relative; padding: clamp(3.5rem, 6vw, 5.5rem) 0; background-color: #FFFFFF; color: #1c1917; min-height: 600px; overflow: hidden;">
            <img src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/shapes/vine-corner-watermark.png' ); ?>" class="vine-corner-watermark" alt="" aria-hidden="true">
            <div style="max-width: 1200px; margin: 0 auto; padding: 0 clamp(1rem, 4vw, 2.5rem); position: relative; z-index: 2;">
                
                <!-- Section Header -->
                <div style="text-align: center; margin-bottom: clamp(3rem, 6vw, 4.5rem);">
                    <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 4vw, 2.8rem); font-weight: 700; color: #1c1917; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 0.8rem;">
                        ARTICLES &amp; RESEARCH
                    </h2>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #78716c; max-width: 650px; margin: 0 auto;">
                        Scholarly papers, theological treatises, and peer-reviewed publications authored by our Franciscan Friars.
                    </p>
                </div>

                <!-- Articles Container -->
                <div style="display: flex; flex-direction: column; gap: 0;">

                    <!-- Publication: Between Post-Critical Pedagogy and Critical Theory -->
                    <div style="display: grid; grid-template-columns: minmax(80px, 120px) minmax(140px, 200px) 1fr auto; gap: clamp(1.2rem, 3vw, 2.5rem); align-items: center; padding: clamp(2rem, 4vw, 3rem) 0; border-top: 1px solid #f0ece1;" class="publication-item">
                        <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; font-family: 'Phudu', sans-serif;">
                            <span style="font-size: clamp(2.4rem, 4vw, 3.4rem); font-weight: 300; line-height: 1; color: #4A2A18;">20</span>
                            <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #78716c; margin-top: 0.35rem; font-family: 'Instrument Sans', sans-serif;">AUG<br>2026</span>
                        </div>
                        <div style="width: 100%; aspect-ratio: 4/3; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 20px rgba(74,42,24,0.12); border: 1px solid rgba(230,200,136,0.3); background: #FAF7F0;">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/between-post-critical-pedagogy.jpg' ); ?>" alt="Between Post-Critical Pedagogy and Critical Theory" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div>
                            <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.15rem, 2.2vw, 1.4rem); font-weight: 700; color: #1c1917; text-transform: uppercase; letter-spacing: 0.02em; margin: 0 0 0.65rem 0; line-height: 1.35;">
                                Between Post-Critical Pedagogy and Critical Theory: An Educational Response to the Post-Truth Phenomenon
                            </h3>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(0.92rem, 1.6vw, 1rem); color: #57534e; line-height: 1.65; margin: 0 0 0.85rem 0; font-weight: 400;">
                                This article examines cogently what educational strategy is the most appropriate in the climate of truth crisis with rising polarization encountered in the post-truth world.
                            </p>
                            <div style="display: flex; align-items: center; gap: 0.5rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.84rem; color: #78716c; font-weight: 500;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <span>Educational Philosophy &amp; Critical Pedagogy • PDF Document</span>
                            </div>
                        </div>
                        <div style="white-space: nowrap;">
                            <a href="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/pdf/between-post-critical-pedagogy-and-critical-theory.pdf' ); ?>" target="_blank" class="pub-btn" style="display: inline-flex; align-items: center; gap: 0.6rem; padding: 0.8rem 1.8rem; border: 1.5px solid #c4a45a; border-radius: 4px; background: transparent; color: #4A2A18; font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.background='#4A2A18'; this.style.color='#ffffff'; this.style.borderColor='#4A2A18';" onmouseout="this.style.background='transparent'; this.style.color='#4A2A18'; this.style.borderColor='#c4a45a';">
                                VIEW PDF
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Publication 1: Jnanadeepa Marriage and Family -->
                    <div style="display: grid; grid-template-columns: minmax(80px, 120px) minmax(140px, 200px) 1fr auto; gap: clamp(1.2rem, 3vw, 2.5rem); align-items: center; padding: clamp(2rem, 4vw, 3rem) 0; border-top: 1px solid #f0ece1;" class="publication-item">
                        <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; font-family: 'Phudu', sans-serif;">
                            <span style="font-size: clamp(2.4rem, 4vw, 3.4rem); font-weight: 300; line-height: 1; color: #4A2A18;">05</span>
                            <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #78716c; margin-top: 0.35rem; font-family: 'Instrument Sans', sans-serif;">MAY - AUG<br>2025</span>
                        </div>
                        <div style="width: 100%; aspect-ratio: 4/3; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 20px rgba(74,42,24,0.12); border: 1px solid rgba(230,200,136,0.3); background: #FAF7F0;">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.18.29 AM.jpeg' ); ?>" alt="Pope Francis Teachings on Marriage and Family" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div>
                            <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.15rem, 2.2vw, 1.4rem); font-weight: 700; color: #1c1917; text-transform: uppercase; letter-spacing: 0.02em; margin: 0 0 0.65rem 0; line-height: 1.35;">
                                Jnanadeepa: Pune Journal of Religious Studies
                            </h3>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(0.92rem, 1.6vw, 1rem); color: #57534e; line-height: 1.65; margin: 0 0 0.85rem 0; font-weight: 400;">
                                Pope Francis’ Teachings on Marriage and Family
                            </p>
                            <div style="display: flex; align-items: center; gap: 0.5rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.84rem; color: #78716c; font-weight: 500;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <span>Religious Studies &amp; Theology • PDF Document</span>
                            </div>
                        </div>
                        <div style="white-space: nowrap;">
                            <a href="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/pdf/jnanadeepa-may-aug-2025.pdf' ); ?>" target="_blank" class="pub-btn" style="display: inline-flex; align-items: center; gap: 0.6rem; padding: 0.8rem 1.8rem; border: 1.5px solid #c4a45a; border-radius: 4px; background: transparent; color: #4A2A18; font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.background='#4A2A18'; this.style.color='#ffffff'; this.style.borderColor='#4A2A18';" onmouseout="this.style.background='transparent'; this.style.color='#4A2A18'; this.style.borderColor='#c4a45a';">
                                VIEW PDF
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Publication 2: Jnanadeepa Pastoral Conversion -->
                    <div style="display: grid; grid-template-columns: minmax(80px, 120px) minmax(140px, 200px) 1fr auto; gap: clamp(1.2rem, 3vw, 2.5rem); align-items: center; padding: clamp(2rem, 4vw, 3rem) 0; border-top: 1px solid #f0ece1;" class="publication-item">
                        <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; font-family: 'Phudu', sans-serif;">
                            <span style="font-size: clamp(2.4rem, 4vw, 3.4rem); font-weight: 300; line-height: 1; color: #4A2A18;">15</span>
                            <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #78716c; margin-top: 0.35rem; font-family: 'Instrument Sans', sans-serif;">MAY - AUG<br>2025</span>
                        </div>
                        <div style="width: 100%; aspect-ratio: 4/3; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 20px rgba(74,42,24,0.12); border: 1px solid rgba(230,200,136,0.3); background: #FAF7F0;">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (3).jpeg' ); ?>" alt="Pastoral Conversion in Shaping Pastoral Ministry" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div>
                            <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.15rem, 2.2vw, 1.4rem); font-weight: 700; color: #1c1917; text-transform: uppercase; letter-spacing: 0.02em; margin: 0 0 0.65rem 0; line-height: 1.35;">
                                Jnanadeepa: Pune Journal of Religious Studies
                            </h3>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(0.92rem, 1.6vw, 1rem); color: #57534e; line-height: 1.65; margin: 0 0 0.85rem 0; font-weight: 400;">
                                The Central Role of Pastoral Conversion in Shaping Pastoral Ministry
                            </p>
                            <div style="display: flex; align-items: center; gap: 0.5rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.84rem; color: #78716c; font-weight: 500;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <span>Fr. Gigesh Meckel, TOR • Vol. 29/2</span>
                            </div>
                        </div>
                        <div style="white-space: nowrap;">
                            <a href="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/pdf/jnanadeepa-may-aug-2025-pastoral-conversion.pdf' ); ?>" target="_blank" class="pub-btn" style="display: inline-flex; align-items: center; gap: 0.6rem; padding: 0.8rem 1.8rem; border: 1.5px solid #c4a45a; border-radius: 4px; background: transparent; color: #4A2A18; font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.background='#4A2A18'; this.style.color='#ffffff'; this.style.borderColor='#4A2A18';" onmouseout="this.style.background='transparent'; this.style.color='#4A2A18'; this.style.borderColor='#c4a45a';">
                                VIEW PDF
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Publication 3: Jnanadeepa Eco-Theology -->
                    <div style="display: grid; grid-template-columns: minmax(80px, 120px) minmax(140px, 200px) 1fr auto; gap: clamp(1.2rem, 3vw, 2.5rem); align-items: center; padding: clamp(2rem, 4vw, 3rem) 0; border-top: 1px solid #f0ece1;" class="publication-item">
                        <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; font-family: 'Phudu', sans-serif;">
                            <span style="font-size: clamp(2.4rem, 4vw, 3.4rem); font-weight: 300; line-height: 1; color: #4A2A18;">20</span>
                            <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #78716c; margin-top: 0.35rem; font-family: 'Instrument Sans', sans-serif;">SEP - DEC<br>2025</span>
                        </div>
                        <div style="width: 100%; aspect-ratio: 4/3; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 20px rgba(74,42,24,0.12); border: 1px solid rgba(230,200,136,0.3); background: #FAF7F0;">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (2).jpeg' ); ?>" alt="Harmonizing Human Welfare and Intrinsic Value" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div>
                            <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.15rem, 2.2vw, 1.4rem); font-weight: 700; color: #1c1917; text-transform: uppercase; letter-spacing: 0.02em; margin: 0 0 0.65rem 0; line-height: 1.35;">
                                Jnanadeepa: Pune Journal of Religious Studies
                            </h3>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(0.92rem, 1.6vw, 1rem); color: #57534e; line-height: 1.65; margin: 0 0 0.85rem 0; font-weight: 400;">
                                Harmonizing Human Welfare and Intrinsic Value: Hierarchical Theology in Catholic Eco-Theology
                            </p>
                            <div style="display: flex; align-items: center; gap: 0.5rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.84rem; color: #78716c; font-weight: 500;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <span>Fr. Gigesh Thomas Meckel, TOR • Vol. 29/3</span>
                            </div>
                        </div>
                        <div style="white-space: nowrap;">
                            <a href="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/pdf/jnanadeepa-oct-dec-2025-eco-theology.pdf' ); ?>" target="_blank" class="pub-btn" style="display: inline-flex; align-items: center; gap: 0.6rem; padding: 0.8rem 1.8rem; border: 1.5px solid #c4a45a; border-radius: 4px; background: transparent; color: #4A2A18; font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.background='#4A2A18'; this.style.color='#ffffff'; this.style.borderColor='#4A2A18';" onmouseout="this.style.background='transparent'; this.style.color='#4A2A18'; this.style.borderColor='#c4a45a';">
                                VIEW PDF
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Publication 4: Word & Worship -->
                    <div style="display: grid; grid-template-columns: minmax(80px, 120px) minmax(140px, 200px) 1fr auto; gap: clamp(1.2rem, 3vw, 2.5rem); align-items: center; padding: clamp(2rem, 4vw, 3rem) 0; border-top: 1px solid #f0ece1;" class="publication-item">
                        <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; font-family: 'Phudu', sans-serif;">
                            <span style="font-size: clamp(2.4rem, 4vw, 3.4rem); font-weight: 300; line-height: 1; color: #4A2A18;">01</span>
                            <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #78716c; margin-top: 0.35rem; font-family: 'Instrument Sans', sans-serif;">JAN - JUN<br>2026</span>
                        </div>
                        <div style="width: 100%; aspect-ratio: 4/3; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 20px rgba(74,42,24,0.12); border: 1px solid rgba(230,200,136,0.3); background: #FAF7F0;">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1157.JPG' ); ?>" alt="Word and Worship Theological Perspectives" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div>
                            <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.15rem, 2.2vw, 1.4rem); font-weight: 700; color: #1c1917; text-transform: uppercase; letter-spacing: 0.02em; margin: 0 0 0.65rem 0; line-height: 1.35;">
                                Word &amp; Worship: Journal of Pastoral Liturgy &amp; Catechetics
                            </h3>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(0.92rem, 1.6vw, 1rem); color: #57534e; line-height: 1.65; margin: 0 0 0.85rem 0; font-weight: 400;">
                                The Poor as Sacrament of Divine Encounter: Liberationist and Thomistic Perspectives
                            </p>
                            <div style="display: flex; align-items: center; gap: 0.5rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.84rem; color: #78716c; font-weight: 500;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <span>Fr. Gigesh Meckel, TOR • Vol. 59, No. 1</span>
                            </div>
                        </div>
                        <div style="white-space: nowrap;">
                            <a href="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/pdf/word-and-worship-2026.pdf' ); ?>" target="_blank" class="pub-btn" style="display: inline-flex; align-items: center; gap: 0.6rem; padding: 0.8rem 1.8rem; border: 1.5px solid #c4a45a; border-radius: 4px; background: transparent; color: #4A2A18; font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.background='#4A2A18'; this.style.color='#ffffff'; this.style.borderColor='#4A2A18';" onmouseout="this.style.background='transparent'; this.style.color='#4A2A18'; this.style.borderColor='#c4a45a';">
                                VIEW PDF
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Publication 5: PubMed Peer-Reviewed Paper -->
                    <div style="display: grid; grid-template-columns: minmax(80px, 120px) minmax(140px, 200px) 1fr auto; gap: clamp(1.2rem, 3vw, 2.5rem); align-items: center; padding: clamp(2rem, 4vw, 3rem) 0; border-top: 1px solid #f0ece1; border-bottom: 1px solid #f0ece1;" class="publication-item">
                        <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; font-family: 'Phudu', sans-serif;">
                            <span style="font-size: clamp(2.4rem, 4vw, 3.4rem); font-weight: 300; line-height: 1; color: #4A2A18;">11</span>
                            <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #78716c; margin-top: 0.35rem; font-family: 'Instrument Sans', sans-serif;">MAY<br>2017</span>
                        </div>
                        <div style="width: 100%; aspect-ratio: 4/3; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 20px rgba(74,42,24,0.12); border: 1px solid rgba(230,200,136,0.3); background: #FAF7F0;">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_24_08_PM.png' ); ?>" alt="Farmer suicide in India biotechnology research" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div>
                            <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.15rem, 2.2vw, 1.4rem); font-weight: 700; color: #1c1917; text-transform: uppercase; letter-spacing: 0.02em; margin: 0 0 0.65rem 0; line-height: 1.35;">
                                Farmer-suicide in India: debating the role of biotechnology
                            </h3>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(0.92rem, 1.6vw, 1rem); color: #57534e; line-height: 1.65; margin: 0 0 0.85rem 0; font-weight: 400;">
                                Indian Biotech opponents have attributed the increase of suicides to the monopolization of GM seeds, centering on patent control, application of terminator technology, marketing strategy, and increased production costs.
                            </p>
                            <div style="display: flex; align-items: center; gap: 0.5rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.84rem; color: #78716c; font-weight: 500;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                <span>National Library of Medicine (PubMed: 28497354) • Peer-Reviewed Paper</span>
                            </div>
                        </div>
                        <div style="white-space: nowrap;">
                            <a href="https://pubmed.ncbi.nlm.nih.gov/28497354/" target="_blank" rel="noopener noreferrer" class="pub-btn" style="display: inline-flex; align-items: center; gap: 0.6rem; padding: 0.8rem 1.8rem; border: 1.5px solid #c4a45a; border-radius: 4px; background: transparent; color: #4A2A18; font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.background='#4A2A18'; this.style.color='#ffffff'; this.style.borderColor='#4A2A18';" onmouseout="this.style.background='transparent'; this.style.color='#4A2A18'; this.style.borderColor='#c4a45a';">
                                VIEW ARTICLE
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>

<!-- Footer -->

<!-- FOOTER + BOTTOM WIDGETS + BIBLE MODAL UNIFIED SECTION -->
<!-- Use exact copy from home page for all inner pages -->



<?php
get_footer();
