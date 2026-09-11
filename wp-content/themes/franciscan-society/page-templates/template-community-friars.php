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
        /* Friars Directory & Hero Responsive Styles */
        .page-hero-banner {
            position: relative;
            padding: 10rem 2rem 4rem 2rem;
            background-size: cover;
            background-position: center;
            overflow: hidden;
            text-align: center;
        }
        .page-hero-banner .hero-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(12, 11, 10, 0.7);
        }
        .page-hero-banner .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            text-align: center;
        }
        .page-hero-banner h1 {
            font-family: 'Phudu', sans-serif;
            font-size: clamp(2.8rem, 5.2vw, 4.5rem);
            font-weight: 700;
            color: #ffffff;
            text-transform: uppercase;
            margin: 0 0 1rem 0;
            line-height: 1.1;
        }

        .page-hero-friars {
            position: relative;
            padding: 3rem 2rem 0;
            background: #FFF;
        }
        .friars-directory-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: clamp(3rem, 6vw, 5rem) 2rem;
        }
        .friars-directory-title {
            font-family: 'Phudu', sans-serif;
            font-size: clamp(1.4rem, 2.4vw, 2.2rem);
            font-weight: 700;
            color: #1c1917;
            margin-bottom: 2.5rem;
            text-align: center;
            line-height: 1.35;
            max-width: 950px;
            margin-left: auto;
            margin-right: auto;
        }
        .deceased-section-title {
            font-family: 'Phudu', sans-serif;
            font-size: clamp(1.8rem, 3vw, 2.2rem);
            font-weight: 900;
            color: #1c1917;
            margin-bottom: 2.5rem;
            text-align: center;
            border-top: 1px solid #e5e5e5;
            padding-top: 4rem;
        }

        /* Desktop: Standard Multi-Column Grid */
        .friars-slider-controls {
            display: none;
        }
        .friars-track-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 2rem;
            margin-bottom: 5rem;
        }
        .friar-card-item {
            text-align: center;
        }
        .friar-avatar-wrap {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 1rem auto;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border: 2px solid #e6c888;
            background: #fdfbf7;
        }
        .friar-avatar-wrap--deceased {
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            background: #2a160b;
        }
        .friar-avatar-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .friar-name {
            font-family: 'Phudu', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: #4a2a18;
            margin: 0;
            line-height: 1.3;
        }
        .friar-date {
            font-family: 'Instrument Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            color: #78716c;
            margin: 0.35rem 0 0 0;
        }

        /* Mobile & Tablet Responsiveness */
        @media (max-width: 991px) {
            .page-hero-banner {
                padding: 6.5rem 1.25rem 2rem 1.25rem !important;
            }
            .page-hero-banner h1 {
                font-size: clamp(2rem, 6.5vw, 2.8rem) !important;
            }
            .page-hero-friars {
                padding: 1.25rem 1rem 0 1rem !important;
            }
            .page-hero-friars .has-vine-watermark {
                min-height: auto !important;
                padding: 2.2rem 1.5rem !important;
                border-radius: 18px !important;
            }
            .page-hero-friars h2 {
                font-size: clamp(1.6rem, 5vw, 2.2rem) !important;
            }
            .friars-directory-section {
                padding: 2rem 1rem 3rem 1rem !important;
            }
        }

        @media (max-width: 768px) {
            /* Friars Mobile Horizontal Touch Slider */
            .friars-slider-controls {
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 0.75rem !important;
                margin-bottom: 1.5rem !important;
            }
            .friars-slider-badge {
                display: inline-flex !important;
                align-items: center !important;
                gap: 0.35rem !important;
                font-family: 'Instrument Sans', sans-serif !important;
                font-size: 0.75rem !important;
                font-weight: 700 !important;
                color: #4A2A18 !important;
                letter-spacing: 0.05em !important;
                text-transform: uppercase !important;
                background: rgba(230, 200, 136, 0.25) !important;
                border: 1px solid rgba(74, 42, 24, 0.15) !important;
                padding: 0.4rem 0.9rem !important;
                border-radius: 30px !important;
            }
            .friars-track-grid {
                display: flex !important;
                flex-wrap: nowrap !important;
                overflow-x: auto !important;
                overflow-y: hidden !important;
                scroll-snap-type: x mandatory !important;
                -webkit-overflow-scrolling: touch !important;
                gap: 1rem !important;
                padding: 0.5rem 0.75rem 1.5rem 0.75rem !important;
                margin-bottom: 2.5rem !important;
                scrollbar-width: none !important;
                -ms-overflow-style: none !important;
            }
            .friars-track-grid::-webkit-scrollbar {
                display: none !important;
                width: 0 !important;
                height: 0 !important;
            }
            .friar-card-item {
                flex: 0 0 160px !important;
                min-width: 160px !important;
                max-width: 160px !important;
                scroll-snap-align: center !important;
                text-align: center !important;
                background: #ffffff !important;
                border-radius: 16px !important;
                padding: 1.25rem 0.75rem !important;
                box-shadow: 0 4px 16px rgba(74, 42, 24, 0.08) !important;
                border: 1px solid rgba(230, 200, 136, 0.3) !important;
                transition: transform 0.2s ease, box-shadow 0.2s ease !important;
                box-sizing: border-box !important;
            }
            .friar-card-item:active {
                transform: scale(0.97) !important;
            }
            .friar-avatar-wrap {
                width: 110px !important;
                height: 110px !important;
                margin: 0 auto 0.75rem auto !important;
                border-width: 2.5px !important;
            }
            .friar-name {
                font-size: 0.92rem !important;
            }
            .deceased-section-title {
                padding-top: 2rem !important;
                margin-bottom: 1.25rem !important;
            }
        }

        @media (max-width: 480px) {
            .page-hero-banner {
                padding: 5.5rem 1rem 1.5rem 1rem !important;
            }
            .page-hero-friars {
                padding: 1rem 0.75rem 0 0.75rem !important;
            }
            .page-hero-friars .has-vine-watermark {
                padding: 1.75rem 1.25rem !important;
            }
            .friars-directory-section {
                padding: 1.5rem 0.75rem 2.5rem 0.75rem !important;
            }
            .friar-card-item {
                flex: 0 0 150px !important;
                min-width: 150px !important;
                max-width: 150px !important;
                padding: 1rem 0.6rem !important;
            }
            .friar-avatar-wrap {
                width: 100px !important;
                height: 100px !important;
            }
        }
    </style>

<main id="main-content" style="padding-top: 0; background-color: #FFF;">
    <!-- Page Hero Banner -->
    <?php
    $friars_hero_bg = franciscan_get_page_field( 'community-friars', 'hero_image', '' );
    if ( empty( $friars_hero_bg ) || false !== strpos( $friars_hero_bg, 'ChatGPT_Image' ) ) {
        $friars_hero_bg = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/friars-banner.jpg';
    }
    ?>
    <section class="page-hero-banner" style="background-image: url('<?php echo esc_url( $friars_hero_bg ); ?>');">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1><?php echo esc_html( franciscan_get_page_field( 'community-friars', 'hero_title', 'OUR FRIARS' ) ); ?></h1>
            <?php
            $friars_hero_desc = franciscan_get_page_field( 'community-friars', 'hero_subtitle', '' );
            if ( ! empty( $friars_hero_desc ) ) :
            ?>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(1rem, 1.8vw, 1.18rem); color: rgba(255, 255, 255, 0.92); max-width: 760px; margin: 0.8rem auto 0; line-height: 1.6; font-weight: 400;">
                    <?php echo nl2br( esc_html( $friars_hero_desc ) ); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Page Hero Featured Card -->
    <section class="page-hero page-hero-friars">
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
                    <?php echo nl2br( esc_html( franciscan_get_page_field( 'community-friars', 'card_subtitle', 'Over 104 professed friars dedicated to prayer, community, and active ministry.' ) ) ); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Friars Directory Section -->
    <div class="friars-directory-section">
        <?php
        $directory_title  = franciscan_get_page_field( 'community-friars', 'directory_title', 'Brothers always be mindful that they should desire one thing alone, namely, the Spirit of God at work within them' );
        $deceased_heading = franciscan_get_page_field( 'community-friars', 'deceased_heading', 'DECEASED FRIARS' );
        $living_friars    = franciscan_get_living_friars();
        $deceased_friars  = franciscan_get_deceased_friars();
        ?>

        <?php if ( ! empty( $directory_title ) ) : ?>
            <h2 class="friars-directory-title">
                <?php echo esc_html( $directory_title ); ?>
            </h2>
        <?php endif; ?>

        <?php if ( ! empty( $living_friars ) ) : ?>
            <div class="friars-slider-container">
                <!-- Mobile Slider Navigation Controls -->
                <div class="friars-slider-controls">
                    <button type="button" class="slider-btn slider-btn--prev" onclick="document.getElementById('living-friars-track').scrollBy({left: -240, behavior: 'smooth'})" aria-label="Previous Friars">
                        &#8592;
                    </button>
                    <span class="friars-slider-badge">
                        <span>Swipe to explore</span> &#8594;
                    </span>
                    <button type="button" class="slider-btn slider-btn--next" onclick="document.getElementById('living-friars-track').scrollBy({left: 240, behavior: 'smooth'})" aria-label="Next Friars">
                        &#8594;
                    </button>
                </div>

                <!-- Living Friars Grid / Slider Track -->
                <div id="living-friars-track" class="friars-track-grid">
                    <?php foreach ( $living_friars as $friar ) : 
                        $f_name = $friar['name'] ?? '';
                        $f_img  = $friar['image'] ?? '';
                        if ( empty( $f_name ) ) continue;
                        $f_img_url = franciscan_resolve_friar_image_url( $f_img );
                    ?>
                        <div class="friar-card-item">
                            <div class="friar-avatar-wrap">
                                <img loading="lazy" decoding="async" src="<?php echo esc_url( $f_img_url ); ?>" alt="<?php echo esc_attr( $f_name ); ?>" onerror="this.src='<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/logo.svg' ); ?>'">
                            </div>
                            <h4 class="friar-name"><?php echo esc_html( $f_name ); ?></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $deceased_friars ) ) : ?>
            <div class="deceased-friars-section">
                <h2 class="deceased-section-title">
                    <?php echo esc_html( $deceased_heading ); ?>
                </h2>

                <!-- Mobile Slider Navigation Controls -->
                <div class="friars-slider-controls">
                    <button type="button" class="slider-btn slider-btn--prev" onclick="document.getElementById('deceased-friars-track').scrollBy({left: -240, behavior: 'smooth'})" aria-label="Previous Deceased Friars">
                        &#8592;
                    </button>
                    <span class="friars-slider-badge">
                        <span>Swipe to explore</span> &#8594;
                    </span>
                    <button type="button" class="slider-btn slider-btn--next" onclick="document.getElementById('deceased-friars-track').scrollBy({left: 240, behavior: 'smooth'})" aria-label="Next Deceased Friars">
                        &#8594;
                    </button>
                </div>

                <!-- Deceased Friars Grid / Slider Track -->
                <div id="deceased-friars-track" class="friars-track-grid">
                    <?php foreach ( $deceased_friars as $dfriar ) : 
                        $df_name = $dfriar['name'] ?? '';
                        $df_img  = $dfriar['image'] ?? '';
                        $df_date = $dfriar['date'] ?? '';
                        if ( empty( $df_name ) ) continue;
                        $df_img_url = franciscan_resolve_friar_image_url( $df_img );
                    ?>
                        <div class="friar-card-item">
                            <div class="friar-avatar-wrap friar-avatar-wrap--deceased">
                                <img loading="lazy" decoding="async" src="<?php echo esc_url( $df_img_url ); ?>" alt="<?php echo esc_attr( $df_name ); ?>" onerror="this.src='<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/logo.svg' ); ?>'">
                            </div>
                            <h4 class="friar-name"><?php echo esc_html( $df_name ); ?></h4>
                            <?php if ( ! empty( $df_date ) ) : ?>
                                <p class="friar-date"><?php echo esc_html( $df_date ); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
