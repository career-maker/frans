<?php
/**
 * Template Name: Community Hub
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
        .council-card {
            background: #F5F3EC;
            border-radius: 16px;
            padding: 1.5rem;
            border-left: 4px solid #4A2A18;
        }
        .council-card h4 {
            font-family: 'Phudu', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            color: #1c1917;
            margin-bottom: 0.3rem;
        }
        .council-card p {
            font-family: 'Instrument Sans', sans-serif;
            font-size: 0.9rem;
            color: #57534e;
            margin: 0;
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

    <!-- Page Hero Section -->
    <section style="padding: 12rem 2rem 8rem 2rem; background-image: url('<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png' ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.7);"></div>
    <div style="max-width: 800px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
        <div style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 0.5rem 1rem; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(255,255,255,0.2);">
            <span style="width: 8px; height: 8px; background-color: #c8102e; border-radius: 50%; display: inline-block;"></span>
            <span style="color: #ffffff; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( franciscan_get_page_field( "community", "hero_badge", "OUR BROTHERHOOD" ) ); ?>
        </div>
        <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.8rem, 5.2vw, 4.5rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;"><?php echo esc_html( franciscan_get_page_field( "community", "hero_title", "COMMUNITY" ) ); ?></h1>
    </div>
</section>

    <!-- General Council Section -->
    <section style="padding: clamp(2rem, 4vw, 3.5rem) 2rem; background-color: #FFFFFF; max-width: 1320px; margin: 0 auto;">
        <div style="margin-bottom: 3rem;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem;">
                <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;">GENERAL COUNCIL</span>
            </div>
            <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3vw, 2.8rem); font-weight: 600; color: #1c1917; text-transform: uppercase; line-height: 1.15; margin-bottom: 2rem;">
                LEADERSHIP OF THE ORDER
            </h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                <div class="council-card">
                    <h4>Minister General</h4>
                    <p>Most Rev. Fr. Armando Trujillo, TOR</p>
                </div>
                <div class="council-card">
                    <h4>Vicar General</h4>
                    <p>Very Rev. Fr. Sean Sheridan, TOR</p>
                </div>
                <div class="council-card">
                    <h4>First Councilor</h4>
                    <p>Very Rev. Fr. Zvonimir Brusac, TOR</p>
                </div>
                <div class="council-card">
                    <h4>Second Councilor</h4>
                    <p>Very Rev. Fr. Shibin Kurian Vallattuthundathil, TOR</p>
                </div>
                <div class="council-card">
                    <h4>Third Councilor</h4>
                    <p>Very Rev. Fr. Massimo Cucinotta, TOR</p>
                </div>
                <div class="council-card">
                    <h4>Fourth Councilor</h4>
                    <p>Very Rev. Fr. Bijay Prakash Tirkey, TOR</p>
                </div>
                <div class="council-card">
                    <h4>Secretary General</h4>
                    <p>Very Rev. Fr. Shibin Vallattuthundathil, TOR</p>
                </div>
            </div>
        </div>

        <!-- Provincial Council Section -->
        <div style="margin-top: 3rem; padding-top: 3rem; border-top: 1px solid #e7e5e4;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem;">
                <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;">PROVINCIAL COUNCIL</span>
            </div>
            <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3vw, 2.8rem); font-weight: 600; color: #1c1917; text-transform: uppercase; line-height: 1.15; margin-bottom: 2rem;">
                RANCHI PROVINCE LEADERSHIP
            </h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                <div class="council-card">
                    <h4>Minister Provincial</h4>
                    <p>Very Rev. Fr. Manoj Vengathanam, TOR</p>
                </div>
                <div class="council-card">
                    <h4>Vicar Provincial</h4>
                    <p>Very Rev. Fr. Manoj Kullu, TOR</p>
                </div>
                <div class="council-card">
                    <h4>First Councilor</h4>
                    <p>Rev. Fr. Paulinus Kiro TOR</p>
                </div>
                <div class="council-card">
                    <h4>Second Councilor</h4>
                    <p>Rev. Fr. Benedict Tirkey, TOR</p>
                </div>
                <div class="council-card">
                    <h4>Third Councilor</h4>
                    <p>Rev. Fr. Benjamin Tiru, TOR</p>
                </div>
                <div class="council-card">
                    <h4>Fourth Councilor</h4>
                    <p>Rev. Fr. Xavier Kindo, TOR</p>
                </div>
                <div class="council-card">
                    <h4>Provincial Secretary</h4>
                    <p>Rev. Fr. Paulinus Kiro, TOR</p>
                </div>
                <div class="council-card">
                    <h4>Province Econome</h4>
                    <p>Rev. Fr. Paulinus Kiro, TOR</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Friaries Section -->
    <section style="padding: clamp(2rem, 4vw, 3.5rem) 2rem; background-color: #F5F3EC;">
        <div style="max-width: 1320px; margin: 0 auto;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem;">
                <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;">OUR HOMES</span>
            </div>
            <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3vw, 2.8rem); font-weight: 600; color: #1c1917; text-transform: uppercase; line-height: 1.15; margin-bottom: 2rem;">
                FRIARIES ACROSS INDIA
            </h2>
            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.8; margin-bottom: 2rem; max-width: 800px;">
                The Province maintains 18 major friaries and ashrams across multiple dioceses, serving the People of God through parishes, schools, and pastoral ministry.
            </p>

            <!-- Dioceses Grid -->
            <div style="display: grid; gap: 2rem;">
                <!-- Ranchi -->
                <div style="background: white; border-radius: 16px; padding: 2rem; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                    <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.2rem; font-weight: 600; color: #1c1917; margin-bottom: 1rem; text-transform: uppercase;">ARCHDIOCESE OF RANCHI</h3>
                    <ul style="list-style: none; margin: 0; padding: 0; display: grid; gap: 1rem;">
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e;"><strong>Franciscan Ashram (Provincial Residence)</strong><br>Harmu Housing Colony, Ranchi – 834002 (Est. 1978)</li>
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e;"><strong>Franciscan Training Institute</strong><br>Purulia Road, Ranchi – 834001 (Est. 1954)</li>
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e;"><strong>Franciscan Ashram Banhora</strong><br>Hehel, Ranchi – 834005 (Est. 1988)</li>
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e;"><strong>Franciscan Ashram, Getalsud</strong><br>Tatisilwai, Ranchi – 835101 (Est. 2002)</li>
                    </ul>
                </div>

                <!-- Khunti -->
                <div style="background: white; border-radius: 16px; padding: 2rem; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                    <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.2rem; font-weight: 600; color: #1c1917; margin-bottom: 1rem; text-transform: uppercase;">DIOCESE OF KHUNTI</h3>
                    <ul style="list-style: none; margin: 0; padding: 0; display: grid; gap: 1rem;">
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e;"><strong>St. Anthony's Monastery</strong><br>Dorma, Khunti – 835227 (Est. 1970)</li>
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e;"><strong>Franciscan Ashram Gaurbera</strong><br>Bhamini, Khunti – 835216 (Est. 1986)</li>
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e;"><strong>Assisi Bhavan</strong><br>Dorma, Khunti – 835227 (Est. 2006)</li>
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e;"><strong>Vinay Bhavan</strong><br>Bichna, Khunti – 835210 (Est. 2009)</li>
                    </ul>
                </div>

                <!-- Other Dioceses -->
                <div style="background: white; border-radius: 16px; padding: 2rem; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                    <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.2rem; font-weight: 600; color: #1c1917; margin-bottom: 1rem; text-transform: uppercase;">OTHER DIOCESES & REGIONS</h3>
                    <ul style="list-style: none; margin: 0; padding: 0; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;"><strong>Simdega:</strong> 3 Friaries | <strong>Gumla:</strong> 1 Friary</li>
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;"><strong>Purnea:</strong> 1 Friary | <strong>Bagdogra:</strong> 1 Friary</li>
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;"><strong>Jalpaiguri:</strong> 2 Friaries | <strong>Rourkela:</strong> 2 Friaries</li>
                        <li style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;"><strong>Bongaigaon:</strong> 1 Friary | <strong>Germany:</strong> 2 Friars</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Friars Section -->
    <section style="padding: clamp(2rem, 4vw, 3.5rem) 2rem; background-color: #FFFFFF;">
        <div style="max-width: 1320px; margin: 0 auto;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem;">
                <span style="width: 6px; height: 6px; background-color: #4A2A18; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #4A2A18; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;">OUR FRIARS</span>
            </div>
            <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(2rem, 3vw, 2.8rem); font-weight: 600; color: #1c1917; text-transform: uppercase; line-height: 1.15; margin-bottom: 1rem;">
                SERVING IN RELIGIOUS LIFE
            </h2>
            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.8; margin-bottom: 2rem;">
                The Province comprises 104 professed friars including 84 solemnly professed and 19 temporarily professed members. Among them are 71 priests and 3 brothers. Additionally, there are 28 major seminarians, 4 novices, 9 pre-novices, and 36 candidates in formation.
            </p>

            <!-- Statistics Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;">
                <div style="background: #F5F3EC; border-radius: 12px; padding: 1.5rem; border-left: 4px solid #4A2A18; text-align: center;">
                    <div style="font-family: 'Phudu', sans-serif; font-size: 2.5rem; font-weight: 700; color: #4A2A18; margin-bottom: 0.5rem;">104+</div>
                    <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; color: #1c1917; letter-spacing: 0.05em;">Professed Friars</div>
                </div>
                <div style="background: #F5F3EC; border-radius: 12px; padding: 1.5rem; border-left: 4px solid #4A2A18; text-align: center;">
                    <div style="font-family: 'Phudu', sans-serif; font-size: 2.5rem; font-weight: 700; color: #4A2A18; margin-bottom: 0.5rem;">71</div>
                    <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; color: #1c1917; letter-spacing: 0.05em;">Ordained Priests</div>
                </div>
                <div style="background: #F5F3EC; border-radius: 12px; padding: 1.5rem; border-left: 4px solid #4A2A18; text-align: center;">
                    <div style="font-family: 'Phudu', sans-serif; font-size: 2.5rem; font-weight: 700; color: #4A2A18; margin-bottom: 0.5rem;">77+</div>
                    <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; color: #1c1917; letter-spacing: 0.05em;">In Formation</div>
                </div>
            </div>

            <!-- Friars List (Columns Layout) -->
            <div style="background: #F5F3EC; border-radius: 16px; padding: 2rem; max-height: 400px; overflow-y: auto;">
                <h3 style="font-family: 'Phudu', sans-serif; font-size: 1rem; font-weight: 600; color: #1c1917; margin-bottom: 1rem; text-transform: uppercase;">FRIARS IN COMMUNITY</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 0.8rem;">
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. Anselm Kullu</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. George Palamattam</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. Jerome Alookaran</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Br. Simon Gahatraj</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. Cyril Kochuvilayil</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. Marianus Kujur</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. Hilarius Barla</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. John Thakadiyel</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. Manoj Vengathanam</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. Manoj Kullu</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. Shaji Alapurath</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">Fr. Benjamin Tiru</span>
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #57534e;">... and many more dedicated friars</span>
                </div>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.85rem; color: #78716c; margin-top: 1rem; font-style: italic;">Complete list includes 100+ professed friars serving across India and abroad.</p>
            </div>
        </div>
    </section>

</main>

<!-- Footer -->

<!-- FOOTER + BOTTOM WIDGETS + BIBLE MODAL UNIFIED SECTION -->
<!-- Use exact copy from home page for all inner pages -->



<?php
get_footer();
