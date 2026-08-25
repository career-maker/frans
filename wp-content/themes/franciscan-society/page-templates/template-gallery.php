<?php
/**
 * Template Name: Media & Photo Gallery
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

    <!-- Gallery Hero Section -->
    <?php
    $gal_hero_bg    = franciscan_get_page_field( 'gallery', 'hero_image', FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png' );
    $gal_hero_badge = franciscan_get_page_field( 'gallery', 'hero_badge', 'MOMENTS OF GRACE' );
    $gal_hero_title = franciscan_get_page_field( 'gallery', 'hero_title', 'PHOTO & VIDEO GALLERY' );
    $gal_hero_sub   = franciscan_get_page_field( 'gallery', 'hero_subtitle', 'Visual chronicles of feast days, ordinations, jubilees, missions, and community living across Ranchi Province.' );
    ?>
    <section class="page-hero-banner" style="position: relative; padding-top: 180px; padding-bottom: 120px; background: url('<?php echo esc_url( $gal_hero_bg ); ?>') center/cover no-repeat;">
        <div style="position: absolute; inset: 0; background: rgba(20, 33, 58, 0.75);"></div>
        <div style="position: relative; z-index: 10; max-width: 1200px; margin: 0 auto; padding: 0 2rem; text-align: center;">
            <?php if ( ! empty( $gal_hero_badge ) ) : ?>
                <div style="display: inline-block; padding: 0.35rem 1.1rem; background: rgba(230, 200, 136, 0.18); border: 1px solid rgba(230, 200, 136, 0.4); border-radius: 50px; font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 700; color: #e6c888; letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 0.85rem;">
                    <?php echo esc_html( $gal_hero_badge ); ?>
                </div>
            <?php endif; ?>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.8rem, 5.2vw, 4.5rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;"><?php echo esc_html( $gal_hero_title ); ?></h1>
            <div style="font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; font-weight: 600; color: #e7e2d6;">
                <?php echo esc_html( $gal_hero_sub ); ?>
            </div>
        </div>
    </section>

<!-- Gallery Grid Section -->
<section id="gallery-grid" style="padding: 5rem 2rem 5rem 2rem; background-color: #F1F1F1; box-sizing: border-box;">
        <style>
            .gallery-tab {
                outline: none !important;
                -webkit-appearance: none !important;
                appearance: none !important;
                background-clip: padding-box !important;
                opacity: 1 !important;
                visibility: visible !important;
                text-indent: 0 !important;
                color: #1c1917 !important;
                font-size: inherit !important;
                letter-spacing: 0.04em !important;
            }
            .gallery-tab::before {
                display: none !important;
            }
            .gallery-tab:hover {
                background: #e6c888 !important;
                color: #1c1917 !important;
                border-color: #e6c888 !important;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15) !important;
                opacity: 1 !important;
                visibility: visible !important;
                text-decoration: none !important;
                transform: translateY(-2px);
            }
            .gallery-tab:focus {
                outline: none !important;
                box-shadow: 0 0 0 3px rgba(230, 200, 136, 0.2) !important;
            }
            .gallery-tab:focus-visible {
                outline: 2px solid #e6c888 !important;
                outline-offset: 2px !important;
            }
            .gallery-tab:active {
                background: #e6c888 !important;
                color: #1c1917 !important;
                opacity: 1 !important;
                visibility: visible !important;
            }
            @media (max-width: 768px) {
                #gallery-grid {
                    padding: 2.5rem 1rem !important;
                }
                #gallery-container {
                    grid-template-columns: 1fr !important;
                    gap: 1.25rem !important;
                }
            }
        </style>
        <div style="max-width: 1320px; margin: 0 auto;">

            <!-- Gallery Tabs -->
            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; margin-bottom: 3rem;">
                <button class="gallery-tab active" data-filter="all" style="padding: 0.8rem 1.5rem; border: 2px solid #e6c888; background: #e6c888; color: #1c1917; font-family: 'Instrument Sans', sans-serif; font-weight: 700; border-radius: 30px; cursor: pointer; transition: all 0.3s ease; white-space: nowrap;">All</button>
                <button class="gallery-tab" data-filter="formation" style="padding: 0.8rem 1.5rem; border: 2px solid #e6c888; background: rgba(230, 200, 136, 0.15); font-family: 'Instrument Sans', sans-serif; font-weight: 700; border-radius: 30px; cursor: pointer; transition: all 0.3s ease; white-space: nowrap; line-height: 1.4;">Formation Ministry</button>
                <button class="gallery-tab" data-filter="education" style="padding: 0.8rem 1.5rem; border: 2px solid #e6c888; background: rgba(230, 200, 136, 0.15); font-family: 'Instrument Sans', sans-serif; font-weight: 700; border-radius: 30px; cursor: pointer; transition: all 0.3s ease; white-space: nowrap; line-height: 1.4;">Education Ministry</button>
                <button class="gallery-tab" data-filter="pastoral" style="padding: 0.8rem 1.5rem; border: 2px solid #e6c888; background: rgba(230, 200, 136, 0.15); font-family: 'Instrument Sans', sans-serif; font-weight: 700; border-radius: 30px; cursor: pointer; transition: all 0.3s ease; white-space: nowrap; line-height: 1.4;">Pastoral Ministry</button>
                </div>

            <div id="gallery-container" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                <!-- Images will be dynamically loaded here -->
            </div>

            <script>
                // Gallery data with categorization
                const galleryData = [
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/Fr. Manoj Vengathanam Minister Provincial.jpg' ); ?>', alt: 'Pastoral Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG20230215103348.jpg.jpeg' ); ?>', alt: 'Formation Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1013.JPG' ); ?>', alt: 'Provincial Assembly' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1016.JPG' ); ?>', alt: 'Sacred Ordination' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1017.JPG' ); ?>', alt: 'Mission Apostolate' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1018.JPG' ); ?>', alt: 'Community Fellowship' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1019.JPG' ); ?>', alt: 'Youth Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1020.JPG' ); ?>', alt: 'Parish Service' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1157.JPG' ); ?>', alt: 'Pastoral Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1163.JPG' ); ?>', alt: 'Formation Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1166.JPG' ); ?>', alt: 'Provincial Assembly' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1169.JPG' ); ?>', alt: 'Sacred Ordination' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1236.JPG' ); ?>', alt: 'Mission Apostolate' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_1288.JPG' ); ?>', alt: 'Community Fellowship' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2012.JPG' ); ?>', alt: 'Youth Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2015.JPG' ); ?>', alt: 'Parish Service' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2023.JPG' ); ?>', alt: 'Pastoral Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2095.JPG' ); ?>', alt: 'Formation Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2529.JPG' ); ?>', alt: 'Provincial Assembly' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2531.JPG' ); ?>', alt: 'Sacred Ordination' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2601.JPG' ); ?>', alt: 'Mission Apostolate' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/IMG_2619.JPG' ); ?>', alt: 'Community Fellowship' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-02-15 at 9.44.56 AM (1).jpeg' ); ?>', alt: 'Youth Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-02-15 at 9.44.56 AM.jpeg' ); ?>', alt: 'Parish Service' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-03-29 at 5.41.00 AM.jpeg' ); ?>', alt: 'Pastoral Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-04-04 at 11.06.38 AM.jpeg' ); ?>', alt: 'Formation Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-08-02 at 10.29.49 AM.jpeg' ); ?>', alt: 'Provincial Assembly' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-10 at 4.28.51 AM.jpeg' ); ?>', alt: 'Sacred Ordination' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-10 at 4.28.52 AM.jpeg' ); ?>', alt: 'Mission Apostolate' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.30.24 AM.jpeg' ); ?>', alt: 'Community Fellowship' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.30.25 AM (1).jpeg' ); ?>', alt: 'Youth Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.30.25 AM (2).jpeg' ); ?>', alt: 'Parish Service' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.30.25 AM.jpeg' ); ?>', alt: 'Pastoral Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.31.44 AM.jpeg' ); ?>', alt: 'Formation Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-10-29 at 9.39.17 AM.jpeg' ); ?>', alt: 'Provincial Assembly' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-10-30 at 5.33.02 PM (1).jpeg' ); ?>', alt: 'Sacred Ordination' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-11-08 at 7.53.37 PM.jpeg' ); ?>', alt: 'Mission Apostolate' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-11-16 at 8.21.35 PM.jpeg' ); ?>', alt: 'Community Fellowship' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-11-18 at 10.31.20 AM (1).jpeg' ); ?>', alt: 'Youth Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-11-25 at 3.18.49 PM.jpeg' ); ?>', alt: 'Parish Service' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 1.39.44 PM.jpeg' ); ?>', alt: 'Pastoral Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 1.39.48 PM (1).jpeg' ); ?>', alt: 'Formation Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.00.06 AM (1).jpeg' ); ?>', alt: 'Provincial Assembly' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.00.06 AM.jpeg' ); ?>', alt: 'Sacred Ordination' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.00.07 AM.jpeg' ); ?>', alt: 'Mission Apostolate' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.18.28 AM (1).jpeg' ); ?>', alt: 'Community Fellowship' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.18.28 AM.jpeg' ); ?>', alt: 'Youth Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.18.29 AM (1).jpeg' ); ?>', alt: 'Parish Service' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.18.29 AM (2).jpeg' ); ?>', alt: 'Pastoral Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.18.29 AM (3).jpeg' ); ?>', alt: 'Formation Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.18.29 AM (4).jpeg' ); ?>', alt: 'Provincial Assembly' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 10.18.29 AM.jpeg' ); ?>', alt: 'Sacred Ordination' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.37.03 AM (2).jpeg' ); ?>', alt: 'Mission Apostolate' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.37.03 AM (3).jpeg' ); ?>', alt: 'Community Fellowship' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.37.04 AM (1).jpeg' ); ?>', alt: 'Youth Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.39.44 AM (1).jpeg' ); ?>', alt: 'Parish Service' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.39.45 AM (1).jpeg' ); ?>', alt: 'Pastoral Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.39.46 AM (3).jpeg' ); ?>', alt: 'Formation Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.40.15 AM (3).jpeg' ); ?>', alt: 'Provincial Assembly' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.41.33 AM (2).jpeg' ); ?>', alt: 'Sacred Ordination' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (2).jpeg' ); ?>', alt: 'Mission Apostolate' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (3).jpeg' ); ?>', alt: 'Community Fellowship' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (4).jpeg' ); ?>', alt: 'Youth Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.51 AM.jpeg' ); ?>', alt: 'Parish Service' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.24 PM.jpeg' ); ?>', alt: 'Pastoral Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.27 PM (1).jpeg' ); ?>', alt: 'Formation Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.28 PM (1).jpeg' ); ?>', alt: 'Provincial Assembly' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.28 PM.jpeg' ); ?>', alt: 'Sacred Ordination' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.29 PM (1).jpeg' ); ?>', alt: 'Mission Apostolate' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.29 PM.jpeg' ); ?>', alt: 'Community Fellowship' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.30 PM (1).jpeg' ); ?>', alt: 'Youth Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.30 PM (2).jpeg' ); ?>', alt: 'Parish Service' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.30 PM.jpeg' ); ?>', alt: 'Pastoral Ministry' },
                { src: '<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-10 at 2.17.31 PM.jpeg' ); ?>', alt: 'Formation Ministry' }
            ];

                // Initialize gallery
                
                // Lightbox State
                let activeFilteredList = [];
                let currentLightboxIndex = 0;

                function openLightbox(index) {
                    if (!activeFilteredList || activeFilteredList.length === 0) return;
                    currentLightboxIndex = index;
                    const modal = document.getElementById('fs-gallery-lightbox');
                    updateLightboxContent();
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }

                function closeLightbox() {
                    const modal = document.getElementById('fs-gallery-lightbox');
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                }

                function nextLightboxImage() {
                    if (!activeFilteredList || activeFilteredList.length === 0) return;
                    currentLightboxIndex = (currentLightboxIndex + 1) % activeFilteredList.length;
                    updateLightboxContent();
                }

                function prevLightboxImage() {
                    if (!activeFilteredList || activeFilteredList.length === 0) return;
                    currentLightboxIndex = (currentLightboxIndex - 1 + activeFilteredList.length) % activeFilteredList.length;
                    updateLightboxContent();
                }

                function updateLightboxContent() {
                    const item = activeFilteredList[currentLightboxIndex];
                    if (!item) return;
                    const imgEl = document.getElementById('fs-lightbox-img');
                    const captionEl = document.getElementById('fs-lightbox-caption');
                    const counterEl = document.getElementById('fs-lightbox-counter');

                    imgEl.style.opacity = '0';
                    imgEl.style.transform = 'scale(0.96)';
                    
                    setTimeout(() => {
                        imgEl.src = item.src;
                        imgEl.alt = item.alt;
                        captionEl.textContent = item.alt;
                        counterEl.textContent = `${currentLightboxIndex + 1} / ${activeFilteredList.length}`;
                        imgEl.style.opacity = '1';
                        imgEl.style.transform = 'scale(1)';
                    }, 120);
                }

                // Initialize gallery with interactive cards
                function initGallery() {
                    const container = document.getElementById('gallery-container');

                    function renderImages(filter = 'all') {
                        container.innerHTML = '';
                        activeFilteredList = filter === 'all'
                            ? galleryData
                            : galleryData.filter(img => img.category.includes(filter));

                        activeFilteredList.forEach((img, idx) => {
                            const card = document.createElement('div');
                            card.className = 'gallery-img-card';
                            card.innerHTML = `
                                <img loading="lazy" decoding="async" src="${img.src}" alt="${img.alt}" style="width: 100%; height: 100%; object-fit: cover; aspect-ratio: 4/3; display: block; transition: transform 0.5s ease;">
                                <div class="gallery-card-overlay">
                                    <div class="zoom-icon-badge" title="Click to zoom">&#128269;</div>
                                    <span style="color: #e6c888; font-family: 'Phudu', sans-serif; font-size: 0.95rem; font-weight: 700; text-transform: uppercase;">${img.alt}</span>
                                    <span style="color: rgba(255,255,255,0.7); font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; margin-top: 2px;">Click to enlarge</span>
                                </div>
                            `;
                            card.addEventListener('click', () => {
                                openLightbox(idx);
                            });
                            container.appendChild(card);
                        });
                    }

                    // Initial render
                    renderImages('all');

                    // Tab click handling
                    document.querySelectorAll('.gallery-tab').forEach(tab => {
                        tab.addEventListener('click', (e) => {
                            document.querySelectorAll('.gallery-tab').forEach(t => {
                                t.style.background = 'transparent';
                                t.style.color = '#1c1917';
                            });
                            e.currentTarget.style.background = '#e6c888';
                            e.currentTarget.style.color = '#1c1917';

                            const filter = e.currentTarget.getAttribute('data-filter');
                            renderImages(filter);
                        });
                    });

                    // Lightbox event listeners
                    const closeBtn = document.getElementById('fs-lightbox-close');
                    const prevBtn = document.getElementById('fs-lightbox-prev');
                    const nextBtn = document.getElementById('fs-lightbox-next');
                    const modal = document.getElementById('fs-gallery-lightbox');

                    if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
                    if (prevBtn) prevBtn.addEventListener('click', (e) => { e.stopPropagation(); prevLightboxImage(); });
                    if (nextBtn) nextBtn.addEventListener('click', (e) => { e.stopPropagation(); nextLightboxImage(); });
                    
                    if (modal) {
                        modal.addEventListener('click', (e) => {
                            if (e.target === modal || e.target.id === 'fs-lightbox-close') {
                                closeLightbox();
                            }
                        });
                    }

                    // Keyboard navigation
                    document.addEventListener('keydown', (e) => {
                        const modal = document.getElementById('fs-gallery-lightbox');
                        if (!modal || !modal.classList.contains('active')) return;

                        if (e.key === 'Escape') {
                            closeLightbox();
                        } else if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                            nextLightboxImage();
                        } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                            prevLightboxImage();
                        }
                    });

                    // Touch swipe support on mobile
                    let touchStartX = 0;
                    let touchEndX = 0;
                    if (modal) {
                        modal.addEventListener('touchstart', (e) => {
                            touchStartX = e.changedTouches[0].screenX;
                        }, { passive: true });
                        modal.addEventListener('touchend', (e) => {
                            touchEndX = e.changedTouches[0].screenX;
                            if (touchStartX - touchEndX > 50) {
                                nextLightboxImage(); // Swipe left
                            } else if (touchEndX - touchStartX > 50) {
                                prevLightboxImage(); // Swipe right
                            }
                        }, { passive: true });
                    }
                }

                document.addEventListener('DOMContentLoaded', initGallery);
            </script>
        </div>
    </section>



<!-- Gallery Lightbox Modal -->
<style>
    #fs-gallery-lightbox {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(8, 14, 26, 0.96);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        z-index: 999999;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 1.5rem;
        user-select: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    #fs-gallery-lightbox.active {
        display: flex !important;
        opacity: 1;
    }
    .fs-lightbox-btn {
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(230, 200, 136, 0.35);
        color: #ffffff;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        z-index: 1000002;
    }
    .fs-lightbox-btn:hover {
        background: #e6c888;
        color: #0c1727;
        transform: scale(1.1);
        box-shadow: 0 0 20px rgba(230, 200, 136, 0.5);
    }
    #fs-lightbox-close {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        width: 48px;
        height: 48px;
        font-size: 1.8rem;
        font-weight: 300;
        line-height: 1;
    }
    #fs-lightbox-prev {
        position: absolute;
        left: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
        width: 52px;
        height: 52px;
        font-size: 1.8rem;
    }
    #fs-lightbox-prev:hover {
        transform: translateY(-50%) scale(1.1);
    }
    #fs-lightbox-next {
        position: absolute;
        right: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
        width: 52px;
        height: 52px;
        font-size: 1.8rem;
    }
    #fs-lightbox-next:hover {
        transform: translateY(-50%) scale(1.1);
    }
    @media (max-width: 768px) {
        #fs-lightbox-prev {
            left: 0.8rem;
            width: 42px;
            height: 42px;
            font-size: 1.4rem;
        }
        #fs-lightbox-next {
            right: 0.8rem;
            width: 42px;
            height: 42px;
            font-size: 1.4rem;
        }
        #fs-lightbox-close {
            top: 1rem;
            right: 1rem;
            width: 40px;
            height: 40px;
            font-size: 1.5rem;
        }
    }
    .gallery-img-card {
        cursor: pointer;
        position: relative;
        overflow: hidden;
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        border: 1px solid rgba(230, 200, 136, 0.15);
    }
    .gallery-img-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.18);
        border-color: rgba(230, 200, 136, 0.6);
    }
    .gallery-card-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(12, 23, 39, 0.85) 0%, rgba(12, 23, 39, 0.2) 60%, transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 1.2rem;
        pointer-events: none;
    }
    .gallery-img-card:hover .gallery-card-overlay {
        opacity: 1;
    }
    .zoom-icon-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(230, 200, 136, 0.9);
        color: #0c1727;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-weight: bold;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }
</style>

<div id="fs-gallery-lightbox" role="dialog" aria-modal="true" aria-label="Photo Lightbox">
    <button id="fs-lightbox-close" class="fs-lightbox-btn" title="Close (Esc)">&times;</button>
    <button id="fs-lightbox-prev" class="fs-lightbox-btn" title="Previous (Left Arrow)">&#10094;</button>
    <button id="fs-lightbox-next" class="fs-lightbox-btn" title="Next (Right Arrow)">&#10095;</button>

    <div style="max-width: 90vw; max-height: 80vh; display: flex; justify-content: center; align-items: center; position: relative;">
        <img id="fs-lightbox-img" src="" alt="Gallery Image" style="max-width: 100%; max-height: 76vh; object-fit: contain; border-radius: 12px; box-shadow: 0 25px 60px rgba(0,0,0,0.7); border: 1px solid rgba(230,200,136,0.3); transition: transform 0.3s ease, opacity 0.25s ease;">
    </div>

    <div style="margin-top: 1.2rem; display: flex; flex-direction: column; align-items: center; gap: 0.3rem; text-align: center;">
        <div id="fs-lightbox-caption" style="color: #e6c888; font-family: 'Phudu', sans-serif; font-size: 1.15rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.03em;"></div>
        <div id="fs-lightbox-counter" style="color: rgba(255,255,255,0.75); font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; font-weight: 500;"></div>
    </div>
</div>

</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    if (window.innerWidth > 768) {
        let dot = document.createElement("div");
        dot.className = "custom-cursor-dot";
        let follower = document.createElement("div");
        follower.className = "custom-cursor-follower";
        document.body.appendChild(dot);
        document.body.appendChild(follower);

        let mouseX = -100, mouseY = -100;
        let followerX = -100, followerY = -100;

        document.addEventListener("mousemove", function(e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
            dot.style.left = mouseX + "px";
            dot.style.top = mouseY + "px";
        });

        // Add interactive hover state for clickable elements
        const interactiveElements = document.querySelectorAll('a, button, input, select, textarea, .hover-target, .card-link');
        interactiveElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                follower.classList.add('cursor-hovering');
                dot.classList.add('cursor-hovering');
            });
            el.addEventListener('mouseleave', () => {
                follower.classList.remove('cursor-hovering');
                dot.classList.remove('cursor-hovering');
            });
        });

        function animateFollower() {
            followerX += (mouseX - followerX) * 0.15;
            followerY += (mouseY - followerY) * 0.15;
            follower.style.left = followerX + "px";
            follower.style.top = followerY + "px";
            requestAnimationFrame(animateFollower);
        }
        animateFollower();
    }
});
</script>

</div>

<!-- Floating Contact Dock (Chat / Call / Email) -->
<div class="cta-dock" data-cta-dock>

    <ul class="cta-dock__menu" id="cta-dock-menu">
        <li class="cta-dock__item">
            <!-- TODO: replace with the real contact email -->
            <a class="cta-dock__link" href="mailto:info@example.org?subject=Enquiry%20%E2%80%93%20The%20Franciscan%20Society">
                <span class="cta-dock__item-icon">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                        <rect x="3.5" y="5.5" width="17" height="13" rx="2" stroke="currentColor" stroke-width="1.6"/>
                        <path d="M4.5 7l7.5 6 7.5-6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="cta-dock__item-label">Email Us</span>
            </a>
        </li>
        <li class="cta-dock__item">
            <!-- TODO: replace with the real phone number -->
            <a class="cta-dock__link" href="tel:+911234567890">
                <span class="cta-dock__item-icon">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                        <path d="M6.6 10.8c1.4 2.8 3.8 5.2 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.4c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.4 0 .8-.2 1l-2.2 2.2Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="cta-dock__item-label">Call Us</span>
            </a>
        </li>
        <li class="cta-dock__item">
            <!-- TODO: replace with the real WhatsApp number (digits only, with country code) -->
            <a rel="noopener noreferrer" class="cta-dock__link" href="https://wa.me/911234567890?text=Hello%2C%20I'd%20like%20to%20know%20more%20about%20the%20Franciscan%20Society." target="_blank" rel="noopener">
                <span class="cta-dock__item-icon">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                        <path d="M4 6.5A2.5 2.5 0 0 1 6.5 4h11A2.5 2.5 0 0 1 20 6.5v7A2.5 2.5 0 0 1 17.5 16H9.8L5.6 19.2a.6.6 0 0 1-.96-.48V16h-.14A2.5 2.5 0 0 1 4 13.5v-7Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                        <circle cx="8.5" cy="10" r="0.9" fill="currentColor" stroke="none"/>
                        <circle cx="12" cy="10" r="0.9" fill="currentColor" stroke="none"/>
                        <circle cx="15.5" cy="10" r="0.9" fill="currentColor" stroke="none"/>
                    </svg>
                </span>
                <span class="cta-dock__item-label">Chat on WhatsApp</span>
            </a>
        </li>
    </ul>

    <button type="button" class="cta-dock__trigger" id="cta-dock-trigger" aria-expanded="false" aria-controls="cta-dock-menu" aria-label="Contact us">
        
        <span class="cta-dock__glyph cta-dock__glyph--tau" aria-hidden="true">
            <img  loading="lazy"loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/christian-cross.png' ); ?>" alt="Christian Cross" style="width: 48px; height: 48px; object-fit: contain; filter: brightness(0) saturate(100%) invert(18%) sepia(21%) saturate(2311%) hue-rotate(341deg) brightness(95%) contrast(86%);" />
        </span>
        <span class="cta-dock__glyph cta-dock__glyph--close" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" focusable="false">
                <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
            </svg>
        </span>
    </button>
</div>

<script>
(function () {
    const dock = document.querySelector('[data-cta-dock]');
    if (!dock) return;
    const trigger = document.getElementById('cta-dock-trigger');
    const menu = document.getElementById('cta-dock-menu');

    function openDock() {
        dock.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
        trigger.setAttribute('aria-label', 'Close contact options');
        menu.setAttribute('aria-hidden', 'false');
    }

    function closeDock(focusTrigger) {
        dock.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
        trigger.setAttribute('aria-label', 'Contact us');
        menu.setAttribute('aria-hidden', 'true');
        if (focusTrigger) trigger.focus();
    }

    trigger.addEventListener('click', () => {
        dock.classList.contains('is-open') ? closeDock(false) : openDock();
    });

    document.addEventListener('click', (e) => {
        if (dock.classList.contains('is-open') && !dock.contains(e.target)) {
            closeDock(false);
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && dock.classList.contains('is-open')) {
            closeDock(true);
        }
    });

    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => closeDock(false));
    });
})();
</script>

<?php
get_footer();
