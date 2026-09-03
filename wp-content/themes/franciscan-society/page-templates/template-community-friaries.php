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
        .friary-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.08) !important;
            border-color: #d6d1c8 !important;
        }
    </style>

<main id="main-content" style="padding-top: 0; background-color: #FFF;">
    <!-- Page Hero -->
    <?php
    $friaries_hero_bg = franciscan_get_page_field( 'community-friaries', 'hero_image', '' );
    if ( empty( $friaries_hero_bg ) || false !== strpos( $friaries_hero_bg, 'ChatGPT_Image' ) ) {
        $friaries_hero_bg = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/friaries-banner.jpg';
    }
    ?>
    <section style="padding: 12rem 2rem 8rem 2rem; background-image: url('<?php echo esc_url( $friaries_hero_bg ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background-color: rgba(12, 11, 10, 0.7);"></div>
        <div style="max-width: 800px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.8rem, 5.2vw, 4.5rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.1;"><?php echo esc_html( franciscan_get_page_field( 'community-friaries', 'hero_title', 'OUR FRIARIES & ASHRAMS' ) ); ?></h1>
        </div>
    </section>





    

    <div style="max-width: 1200px; margin: 0 auto; padding: clamp(3rem, 8vw, 5rem) 2rem;">
        <h2 style="font-family: 'Phudu', sans-serif; font-size: 2.2rem; font-weight: 900; color: #1c1917; margin-bottom: 2.5rem; text-align: center;">OUR FRIARIES</h2>

        <?php
        // Refined light pastel color palettes (background, border, stroke, text)
        $pastel_palettes = array(
            array( 'bg' => '#EBF3ED', 'border' => '#D1E6D6', 'stroke' => '#3D6348', 'text' => '#24432C' ), // Sage
            array( 'bg' => '#FDF0EA', 'border' => '#F7D6C7', 'stroke' => '#9E583F', 'text' => '#6A311D' ), // Peach / Warm Earth
            array( 'bg' => '#EAF3FA', 'border' => '#CDE1F3', 'stroke' => '#3C6C97', 'text' => '#1F476B' ), // Sky Blue
            array( 'bg' => '#F4EEF9', 'border' => '#E1D1F3', 'stroke' => '#6C4887', 'text' => '#44265A' ), // Lavender
            array( 'bg' => '#FAF5E8', 'border' => '#EFE1BF', 'stroke' => '#876936', 'text' => '#5C4318' ), // Sand / Cream
            array( 'bg' => '#FDEEF2', 'border' => '#F8CCD7', 'stroke' => '#9B455B', 'text' => '#691F32' ), // Rose
            array( 'bg' => '#E8F6F1', 'border' => '#C9EDE0', 'stroke' => '#32745F', 'text' => '#174D3D' ), // Mint
            array( 'bg' => '#FFF2E6', 'border' => '#FCD4B6', 'stroke' => '#9C5824', 'text' => '#6B350C' ), // Apricot
            array( 'bg' => '#F6EFF9', 'border' => '#E5CEF3', 'stroke' => '#5E3C7A', 'text' => '#3B2052' ), // Violet Haze
            array( 'bg' => '#EEF3F7', 'border' => '#D2DFEB', 'stroke' => '#47637C', 'text' => '#284157' ), // Slate Pearl
        );

        $dioceses = array(
            'ARCHDIOCESE OF RANCHI' => array(
                array(
                    'title' => 'Franciscan Ashram (Provincial Residence)',
                    'desc'  => 'P.O. Harmu Housing Colony, Ranchi – 834002, JHARKHAND, Estd. 1978',
                    'image' => '',
                ),
                array(
                    'title' => 'Franciscan Training Institute',
                    'desc'  => 'Purulia Road (Dr. Camil Bulcke Path), P. Box No. 123, Ranchi – 834001, JHARKHAND, Estd. 1954',
                    'image' => '',
                ),
                array(
                    'title' => 'Franciscan Ashram Banhora',
                    'desc'  => 'P.O. Hehel, Ranchi – 834005, JHARKHAND, Estd. 1988',
                    'image' => '',
                ),
                array(
                    'title' => 'Franciscan Ashram Getalsud',
                    'desc'  => 'P.O. Getalsud (Via – Tatisilwai), Ranchi – 835101, JHARKHAND, Estd. 2002',
                    'image' => '',
                ),
            ),
            'DIOCESE OF KHUNTI' => array(
                array(
                    'title' => "St. Anthony’s Monastery",
                    'desc'  => 'P.O. Dorma (Via – Torpa), Khunti – 835227, JHARKHAND, Estd. 1970',
                    'image' => '',
                ),
                array(
                    'title' => 'Franciscan Ashram Gaurbera',
                    'desc'  => 'P.O. Bhamini (Via - Muruhu), Khunti – 835216, JHARKHAND, Estd. 1986',
                    'image' => '',
                ),
                array(
                    'title' => 'Assisi Bhavan',
                    'desc'  => 'P.O. Dorma (Via – Torpa), Khunti – 835227, JHARKHAND, Estd. 2006',
                    'image' => '',
                ),
                array(
                    'title' => 'Vinay Bhavan',
                    'desc'  => 'P.O. Bichna, Khunti - 835210, Jharkhand, Estd. 2009',
                    'image' => '',
                ),
            ),
            'DIOCESE OF SIMDEGA' => array(
                array(
                    'title' => 'Franciscan Ashram Bhukumunda',
                    'desc'  => 'P.O. Targa, Simdega – 835226, JHARKHAND, Estd. 1987',
                    'image' => '',
                ),
                array(
                    'title' => "St. Joseph’s Church Kuruskela",
                    'desc'  => 'Simdega - 835228, JHARKHAND, Estd. 2012',
                    'image' => '',
                ),
                array(
                    'title' => 'Catholic Church Behrinbasa',
                    'desc'  => 'P.O. Behrinbasa, Simdega – 835226, JHARKHAND, Estd. 2013',
                    'image' => '',
                ),
            ),
            'DIOCESE OF GUMLA' => array(
                array(
                    'title' => 'Franciscan Ashram Murumkela',
                    'desc'  => 'P.O. Kansir (Via – Chainpur), Gumla – 835206, JHARKHAND, Estd. 1998',
                    'image' => '',
                ),
            ),
            'DIOCESE OF PURNEA' => array(
                array(
                    'title' => 'Franciscan Ashram Thakurganj',
                    'desc'  => 'P.O. Thakurganj, Kishanganj – 855116, BIHAR, Estd. 1996',
                    'image' => '',
                ),
            ),
            'DIOCESE OF BAGDOGRA' => array(
                array(
                    'title' => 'Franciscan Ashram Adhikari',
                    'desc'  => 'P.O. Adhikari (Via – Khoribari), Darjeeling – 734427, WEST BENGAL, Estd. 1982.',
                    'image' => '',
                ),
            ),
            'DIOCESE OF JALPAIGURI' => array(
                array(
                    'title' => 'Franciscan Ashram Hasimara',
                    'desc'  => 'P.O. Hasimara, Jalpaiguri – 735215, WEST BENGAL, Estd. 1984',
                    'image' => '',
                ),
                array(
                    'title' => 'Franciscan Ashram Chel-Line',
                    'desc'  => 'Sylee, P.O. Mal, Jalpaiguri - 735221, WEST BENGAL, Estd. 2018',
                    'image' => '',
                ),
            ),
            'DIOCESE OF ROURKELA' => array(
                array(
                    'title' => 'Franciscan Ashram Deorapara (St. Francis Xavier Church)',
                    'desc'  => 'P.O. Lohondabud, Sundergarh – 700022, ODISHA, Estd. 2003',
                    'image' => '',
                ),
                array(
                    'title' => 'Sneh Bhavan Jamunadipa',
                    'desc'  => 'P.O. Kuarmunda, Rourkela, ODISHA-770039, Estd. 2014',
                    'image' => '',
                ),
            ),
            'DIOCESE OF BONGAIGAON' => array(
                array(
                    'title' => 'Franciscan Ashram Kashiabari',
                    'desc'  => 'Village Sindrijhora, P.O. Kashiabari Kokrajhar, ASSAM - 783360',
                    'image' => '',
                ),
            ),
            'OUTSIDE INDIA' => array(
                array(
                    'title' => 'Pater Nicholas Tudu',
                    'desc'  => 'TOR, Pfarrei Mariä Himmelfahrt, Schulstr.1, 84051 Essenbach, Germany',
                    'image' => '',
                ),
                array(
                    'title' => 'Pater Daison Thaikkattil',
                    'desc'  => 'TOR, Kirch Strasse 3a, 79793 Wutoeschingen, Germany',
                    'image' => '',
                ),
            ),
        );

        $color_index = 0;
        foreach ( $dioceses as $diocese_title => $friary_list ) :
        ?>
            <h3 style="font-family: 'Phudu', sans-serif; font-size: 1.5rem; font-weight: 700; color: #4a2a18; margin-top: 3rem; margin-bottom: 1.5rem; border-bottom: 2px solid #e5e5e5; padding-bottom: 0.5rem; letter-spacing: 0.02em;">
                <?php echo esc_html( $diocese_title ); ?>
            </h3>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 2.5rem;">
                <?php foreach ( $friary_list as $friary ) :
                    $pal = $pastel_palettes[$color_index % count( $pastel_palettes )];
                    $color_index++;
                ?>
                    <div class="friary-card" style="border-radius: 16px; overflow: hidden; box-shadow: 0 10px 24px rgba(0,0,0,0.04); display: flex; flex-direction: column; background: #ffffff; border: 1px solid #ebe8e3; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <?php if ( ! empty( $friary['image'] ) ) : ?>
                            <div style="height: 200px; width: 100%; overflow: hidden; position: relative;">
                                <img loading="lazy" decoding="async" src="<?php echo esc_url( $friary['image'] ); ?>" alt="<?php echo esc_attr( $friary['title'] ); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        <?php else : ?>
                            <!-- Fallback Big Outline Text with Pastel Palette -->
                            <div style="height: 200px; width: 100%; background-color: <?php echo esc_attr( $pal['bg'] ); ?>; border-bottom: 1px solid <?php echo esc_attr( $pal['border'] ); ?>; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; padding: 1.5rem; text-align: center;">
                                <!-- Subtle Decorative Cross Watermark -->
                                <svg style="position: absolute; right: -15px; bottom: -20px; width: 130px; height: 130px; opacity: 0.12; color: <?php echo esc_attr( $pal['stroke'] ); ?>; pointer-events: none;" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11 2h2v7h7v2h-7v11h-2V11H4V9h7V2z"/>
                                </svg>
                                <!-- Big Outline Title -->
                                <span style="font-family: 'Phudu', sans-serif; font-size: clamp(1.25rem, 2vw, 1.6rem); font-weight: 900; line-height: 1.2; text-transform: uppercase; letter-spacing: 0.02em; color: transparent; -webkit-text-stroke: 1.5px <?php echo esc_attr( $pal['stroke'] ); ?>; position: relative; z-index: 2; word-break: break-word;">
                                    <?php echo esc_html( $friary['title'] ); ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <div style="padding: 1.6rem; display: flex; flex-direction: column; flex-grow: 1; justify-content: space-between;">
                            <div>
                                <h4 style="font-family: 'Phudu', sans-serif; font-size: 1.15rem; font-weight: 700; color: #1c1917; margin-top: 0; margin-bottom: 0.5rem; line-height: 1.35;">
                                    <?php echo esc_html( $friary['title'] ); ?>
                                </h4>
                                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.95rem; color: #57534e; line-height: 1.55; margin: 0;">
                                    <?php echo esc_html( $friary['desc'] ); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- FOOTER + BOTTOM WIDGETS + BIBLE MODAL UNIFIED SECTION -->
<!-- Use exact copy from home page for all inner pages -->



<?php
get_footer();
