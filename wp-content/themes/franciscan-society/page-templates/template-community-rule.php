<?php
/**
 * Template Name: Community - Rule & Life
 *
 * @package Franciscan_Society
 */

get_header();
?>

<style>
        @media (max-width: 991px) { html, body { margin: 0; padding: 0; overflow-x: hidden; } body.menu-open #welcome-scroll-bible-container, body.menu-open [style*="position: sticky"] { display: none !important; } }

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
    <?php
    $rule_hero_bg = franciscan_get_page_field( 'community-rule', 'hero_image', '' );
    if ( empty( $rule_hero_bg ) || false !== strpos( $rule_hero_bg, 'ChatGPT_Image' ) ) {
        $rule_hero_bg = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/third-rule-banner.jpg';
    }
    $hero_badge        = franciscan_get_page_field( 'community-rule', 'hero_badge', 'OUR RULE… OUR LIFE' );
    $hero_title        = franciscan_get_page_field( 'community-rule', 'hero_title', 'THIRD ORDER REGULAR RULE' );
    $hero_subtitle     = franciscan_get_page_field( 'community-rule', 'hero_subtitle', 'Discovering the authentic meaning of Franciscan life' );

    $prologue_badge    = franciscan_get_page_field( 'community-rule', 'prologue_badge', 'PROLOGUE TO THE RULE' );
    $prologue_title    = franciscan_get_page_field( 'community-rule', 'prologue_title', 'Third Order Regular Rule' );
    $prologue_subtitle = franciscan_get_page_field( 'community-rule', 'prologue_subtitle', 'The Beginning of the Rule and the Life of the Brothers and Sisters of the Third Order Regular of St. Francis (Words of St. Francis to His Followers — Letter to the Faithful I, 1–19)' );
    $prologue_p1       = franciscan_get_page_field( 'community-rule', 'prologue_p1', '' );
    $prologue_p2       = franciscan_get_page_field( 'community-rule', 'prologue_p2', '' );
    
    $emblem_image      = franciscan_get_page_field( 'community-rule', 'emblem_image', '' );
    if ( empty( $emblem_image ) ) {
        $emblem_image = FRANCISCAN_THEME_URI . '/assets/images/rule/st-francis-rule.jpg';
    }
    $emblem_title      = franciscan_get_page_field( 'community-rule', 'emblem_title', 'Third Order Regular' );
    $emblem_subtitle   = franciscan_get_page_field( 'community-rule', 'emblem_subtitle', 'Province of St. Francis of Assisi' );
    $proclamation_text = franciscan_get_page_field( 'community-rule', 'proclamation_text', 'IN THE NAME OF THE LORD! HERE BEGINS THE RULE AND LIFE OF THE BROTHERS AND SISTERS OF THE THIRD ORDER REGULAR OF ST. FRANCIS' );

    $dir_badge         = franciscan_get_page_field( 'community-rule', 'directory_badge', 'THE CHAPTERS' );
    $dir_title         = franciscan_get_page_field( 'community-rule', 'directory_title', 'Rule of the Third Order Regular' );
    $dir_subtitle      = franciscan_get_page_field( 'community-rule', 'directory_subtitle', 'Click on any chapter to open the interactive reading window' );

    $chapters          = franciscan_get_rule_chapters();
    $total_chapters    = count( $chapters );
    ?>

    <!-- Hero Banner -->
    <section style="padding: 11rem 2rem 6.5rem 2rem; background-image: url('<?php echo esc_url( $rule_hero_bg ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(12, 11, 10, 0.78) 0%, rgba(12, 11, 10, 0.65) 100%);"></div>
        <div style="max-width: 900px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(230, 200, 136, 0.16); backdrop-filter: blur(8px); padding: 0.4rem 1.1rem; border-radius: 50px; margin-bottom: 1.2rem; border: 1px solid rgba(230, 200, 136, 0.35);">
                <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #ffffff; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( $hero_badge ); ?></span>
            </div>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.4rem, 4.8vw, 4rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.15; letter-spacing: 0.02em;">
                <?php echo esc_html( $hero_title ); ?>
            </h1>
            <?php if ( ! empty( $hero_subtitle ) ) : ?>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(0.95rem, 1.6vw, 1.15rem); font-weight: 500; color: rgba(255, 255, 255, 0.9); margin: 0 auto; max-width: 640px; letter-spacing: 0.03em; line-height: 1.6;">
                    <?php echo esc_html( $hero_subtitle ); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" style="background: #fdfaf5; border-bottom: 1px solid #ebe4d6; padding: 0.85rem 2rem;">
        <div style="max-width: 1140px; margin: 0 auto; display: flex; align-items: center; gap: 0.55rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.86rem; color: #78716c;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #4a2a18; text-decoration: none; font-weight: 600;">Home</a>
            <span style="color: #d6d3d1;">/</span>
            <span>Our Community</span>
            <span style="color: #d6d3d1;">/</span>
            <span style="color: #854d0e; font-weight: 700;">Third Order Regular Rule</span>
        </div>
    </nav>

    <!-- Main Editorial Section -->
    <div style="background-color: #ffffff; padding: 2.5rem 1.5rem 4rem 1.5rem;">
        <div style="max-width: 960px; margin: 0 auto;">

            <!-- Header + Content Flex Row -->
            <div style="display: flex; flex-wrap: wrap; gap: 2rem; align-items: flex-start; justify-content: space-between; margin-bottom: 1.5rem;">
                
                <!-- Left: Title, Subtitle, and First Paragraph -->
                <div style="flex: 1 1 580px; min-width: 290px;">
                    <span style="display: inline-block; font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; font-weight: 800; color: #854d0e; text-transform: uppercase; letter-spacing: 0.12em; background: #faf4e8; padding: 0.3rem 0.9rem; border-radius: 20px; margin-bottom: 0.8rem; border: 1px solid #ebdcc5;">
                        <?php echo esc_html( $prologue_badge ); ?>
                    </span>
                    <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.8rem, 3vw, 2.3rem); font-weight: 700; color: #1c1917; line-height: 1.2; margin: 0 0 0.6rem 0;">
                        <?php echo esc_html( $prologue_title ); ?>
                    </h2>
                    <h3 style="font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; font-weight: 600; color: #6b3d28; line-height: 1.45; margin: 0 0 1.2rem 0;">
                        <?php echo wp_kses_post( $prologue_subtitle ); ?>
                    </h3>

                    <?php if ( ! empty( $prologue_p1 ) ) : ?>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 1.02rem; line-height: 1.75; color: #374151; text-align: justify; margin: 0;">
                            <?php echo wp_kses_post( $prologue_p1 ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Right: Coat of Arms Emblem (Snug, proportionate) -->
                <div style="flex: 0 0 240px; margin: 0 auto; text-align: center;">
                    <div style="background: #faf7f0; border-radius: 16px; padding: 1.4rem 1.2rem; border: 1.5px solid #ebdcc5; box-shadow: 0 6px 20px rgba(74, 42, 24, 0.05);">
                        <img loading="lazy" decoding="async" src="<?php echo esc_url( $emblem_image ); ?>" alt="Franciscan Coat of Arms" style="width: 100%; max-width: 180px; height: auto; display: block; margin: 0 auto 0.75rem auto;">
                        <div style="font-family: 'Phudu', sans-serif; font-size: 0.9rem; font-weight: 700; color: #4a2a18; text-transform: uppercase;">
                            <?php echo esc_html( $emblem_title ); ?>
                        </div>
                        <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; color: #78716c; margin-top: 0.2rem;">
                            <?php echo esc_html( $emblem_subtitle ); ?>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Paragraph 2 (Flows seamlessly immediately after) -->
            <?php if ( ! empty( $prologue_p2 ) ) : ?>
                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 1.02rem; line-height: 1.75; color: #374151; text-align: justify; margin: 0 0 2.2rem 0;">
                    <?php echo wp_kses_post( $prologue_p2 ); ?>
                </p>
            <?php endif; ?>

            <!-- Sacred Proclamation Ribbon (Compact margins) -->
            <?php if ( ! empty( $proclamation_text ) ) : ?>
                <div style="margin: 0 0 2.5rem 0; background: linear-gradient(135deg, #371e11 0%, #4a2a18 50%, #2a160b 100%); border-radius: 14px; padding: 1.6rem 1.8rem; text-align: center; border: 1.5px solid #e6c888; box-shadow: 0 8px 24px rgba(74, 42, 24, 0.15);">
                    <div style="display: inline-block; width: 40px; height: 2px; background: #e6c888; margin-bottom: 0.6rem;"></div>
                    <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1rem, 1.8vw, 1.25rem); font-weight: 700; color: #ffffff; letter-spacing: 0.05em; line-height: 1.45; margin: 0; text-transform: uppercase;">
                        <?php echo esc_html( $proclamation_text ); ?>
                    </h3>
                    <div style="display: inline-block; width: 40px; height: 2px; background: #e6c888; margin-top: 0.6rem;"></div>
                </div>
            <?php endif; ?>

            <!-- Chapter Directory Layout -->
            <div style="background: #ffffff; border: 1.5px solid #ede4d3; border-radius: 18px; padding: clamp(1.8rem, 3.5vw, 2.5rem); box-shadow: 0 6px 24px rgba(0,0,0,0.03);">
                <div style="border-bottom: 1.5px solid #ede4d3; padding-bottom: 1.2rem; margin-bottom: 1.5rem;">
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; font-weight: 800; color: #854d0e; text-transform: uppercase; letter-spacing: 0.12em; display: block; margin-bottom: 0.35rem;">
                        <?php echo esc_html( $dir_badge ); ?>
                    </span>
                    <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.5rem, 2.5vw, 2rem); font-weight: 700; color: #1c1917; margin: 0 0 0.4rem 0;">
                        <?php echo esc_html( $dir_title ); ?>
                    </h3>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; color: #78716c; margin: 0;">
                        <?php echo esc_html( $dir_subtitle ); ?>
                    </p>
                </div>

                <!-- Clean Chapter Rows (Structured Table of Contents) -->
                <div class="tor-chapters-container" style="display: flex; flex-direction: column;">
                    <?php foreach ( $chapters as $c_idx => $chap_info ) : 
                        $chap_target = $c_idx + 1;
                    ?>
                        <div class="tor-chapter-row" data-chapter-target="<?php echo esc_attr( $chap_target ); ?>" role="button" tabindex="0" style="display: flex; align-items: center; justify-content: space-between; padding: 1.25rem 1rem; border-bottom: 1px solid #f0ebe1; cursor: pointer; transition: all 0.2s ease; border-radius: 10px;">
                            
                            <div style="display: flex; align-items: baseline; gap: 2rem; flex-wrap: wrap;">
                                <div style="font-family: 'Phudu', sans-serif; font-size: 1.15rem; font-weight: 700; color: #4a2a18; min-width: 140px; letter-spacing: 0.02em;">
                                    <?php echo esc_html( $chap_info['roman'] ?? ( 'Chapter ' . $chap_target ) ); ?>:
                                </div>
                                <div style="font-family: 'Instrument Sans', sans-serif; font-size: 1.1rem; font-weight: 600; color: #1c1917; line-height: 1.4;">
                                    <?php echo esc_html( $chap_info['title'] ?? '' ); ?>
                                </div>
                            </div>

                            <div class="tor-read-pill" style="display: inline-flex; align-items: center; gap: 0.4rem; font-family: 'Instrument Sans', sans-serif; font-size: 0.82rem; font-weight: 700; color: #854d0e; background: #faf4e8; border: 1px solid #ebdcc5; padding: 0.4rem 0.95rem; border-radius: 20px; white-space: nowrap; flex-shrink: 0; transition: all 0.2s ease;">
                                <span>Read Chapter</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</main>

    <!-- Chapter Popup Reader Modals (outside main to prevent stacking context clipping) -->
    <?php foreach ( $chapters as $c_idx => $chap_data ) : 
        $modal_id = $c_idx + 1;
    ?>
        <div class="tor-reader-modal" id="chapterModal<?php echo esc_attr( $modal_id ); ?>" role="dialog" aria-modal="true" aria-labelledby="chapterModalTitle<?php echo esc_attr( $modal_id ); ?>" style="display: none;">
            <div class="tor-reader-card">
                
                <!-- Modal Header -->
                <div class="tor-modal-header" style="background: linear-gradient(135deg, #4a2a18 0%, #2a160b 100%); padding: 1.8rem 2.2rem; display: flex; justify-content: space-between; align-items: flex-start; gap: 1.5rem; border-bottom: 2px solid #e6c888; position: relative;">
                    <div>
                        <div style="display: inline-flex; align-items: center; gap: 0.45rem; background: rgba(230, 200, 136, 0.2); padding: 0.3rem 0.85rem; border-radius: 20px; margin-bottom: 0.6rem; border: 1px solid rgba(230, 200, 136, 0.4);">
                            <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                            <span style="color: #ffffff; font-size: 0.78rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( $chap_data['roman'] ?? ( 'Chapter ' . $modal_id ) ); ?></span>
                        </div>
                        <h3 id="chapterModalTitle<?php echo esc_attr( $modal_id ); ?>" style="font-family: 'Phudu', sans-serif; font-size: clamp(1.4rem, 2.5vw, 1.9rem); font-weight: 700; color: #ffffff; margin: 0 0 0.3rem 0; line-height: 1.2;">
                            <?php echo esc_html( $chap_data['title'] ?? '' ); ?>
                        </h3>
                        <?php if ( ! empty( $chap_data['subtitle'] ) ) : ?>
                            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #e6c888; margin: 0; font-weight: 500;">
                                <?php echo esc_html( $chap_data['subtitle'] ); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <button type="button" class="tor-close-modal-btn" aria-label="Close chapter reader" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.12); border: 1px solid rgba(230,200,136,0.3); color: #ffffff; font-size: 1.4rem; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s ease; line-height: 1; flex-shrink: 0;">
                        &times;
                    </button>
                </div>

                <!-- Modal Body: Flowing Sacred Reading Paragraphs (NO numbers or points) -->
                <div class="tor-modal-body" style="padding: 2.2rem 2.5rem; overflow-y: auto; flex: 1 1 0%; min-height: 0; background: #ffffff;">
                    <div class="tor-chapter-paragraphs" style="font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; line-height: 1.85; color: #374151;">
                        <?php 
                        $raw_content = $chap_data['content'] ?? ( $chap_data['paragraphs'] ?? '' );
                        if ( is_array( $raw_content ) ) {
                            foreach ( $raw_content as $p_k => $p_v ) {
                                if ( $p_k === 'blessing' ) continue;
                                echo '<p style="margin: 0 0 1.5rem 0; text-align: justify;">' . wp_kses_post( $p_v ) . '</p>';
                            }
                        } elseif ( strpos( $raw_content, '<p>' ) !== false ) {
                            echo wp_kses_post( $raw_content );
                        } else {
                            $split_paragraphs = preg_split( '/\r\n\s*\r\n|\n\s*\n/', trim( $raw_content ) );
                            foreach ( $split_paragraphs as $p_item ) {
                                $p_item = trim( $p_item );
                                if ( ! empty( $p_item ) ) {
                                    echo '<p style="margin: 0 0 1.5rem 0; text-align: justify;">' . wp_kses_post( $p_item ) . '</p>';
                                }
                            }
                        }
                        ?>
                    </div>

                    <?php 
                    $blessing_text = $chap_data['blessing'] ?? '';
                    if ( empty( $blessing_text ) && is_array( $raw_content ) && isset( $raw_content['blessing'] ) ) {
                        $blessing_text = $raw_content['blessing'];
                    }
                    if ( ! empty( $blessing_text ) ) : ?>
                        <div style="background: #fdfaf5; border-left: 4px solid #a8742b; border-radius: 0 12px 12px 0; padding: 1.4rem 1.8rem; margin-top: 1.8rem; font-style: italic; font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; line-height: 1.75; color: #4a2a18; box-shadow: inset 0 0 12px rgba(0,0,0,0.02);">
                            <?php echo wp_kses_post( $blessing_text ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Modal Footer with Dynamic Next / Previous Chapter Navigation -->
                <div class="tor-modal-footer" style="background: #f9f6f0; border-top: 1px solid #ebdcc5; padding: 1.1rem 2.2rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                    <div>
                        <?php if ( $modal_id > 1 ) : ?>
                            <button type="button" class="tor-nav-chapter-btn" data-chapter-target="<?php echo esc_attr( $modal_id - 1 ); ?>" style="background: transparent; color: #4a2a18; border: 1.5px solid #4a2a18; padding: 0.55rem 1.2rem; border-radius: 25px; font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; font-weight: 700; cursor: pointer; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 0.4rem;">
                                &larr; <?php echo esc_html( $chapters[$c_idx - 1]['roman'] ?? ( 'Chapter ' . ($modal_id - 1) ) ); ?>
                            </button>
                        <?php endif; ?>
                    </div>

                    <div style="display: flex; gap: 0.8rem; align-items: center;">
                        <button type="button" class="tor-close-modal-btn" style="background: #e5e7eb; color: #374151; border: none; padding: 0.55rem 1.4rem; border-radius: 25px; font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; font-weight: 700; cursor: pointer; transition: all 0.2s ease;">
                            Close
                        </button>

                        <?php if ( $modal_id < $total_chapters ) : ?>
                            <button type="button" class="tor-nav-chapter-btn" data-chapter-target="<?php echo esc_attr( $modal_id + 1 ); ?>" style="background: #4a2a18; color: #ffffff; border: 1.5px solid #4a2a18; padding: 0.55rem 1.3rem; border-radius: 25px; font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; font-weight: 700; cursor: pointer; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 0.4rem;">
                                <?php echo esc_html( $chapters[$c_idx + 1]['roman'] ?? ( 'Chapter ' . ($modal_id + 1) ) ); ?> &rarr;
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>

<style>
/* Lock background scrolling when modal is open */
html.tor-modal-open,
body.tor-modal-open {
    overflow: hidden !important;
    height: 100% !important;
    touch-action: none !important;
    -webkit-overflow-scrolling: auto !important;
}

/* Guaranteed Topmost Layer for Rule Chapter Modals */
.tor-reader-modal {
    position: fixed !important;
    inset: 0 !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    width: 100% !important;
    height: 100% !important;
    height: 100dvh !important;
    z-index: 999999999 !important;
    background: rgba(12, 11, 10, 0.82) !important;
    backdrop-filter: blur(8px) !important;
    -webkit-backdrop-filter: blur(8px) !important;
    padding: 1.5rem 1rem !important;
    box-sizing: border-box !important;
    overflow: hidden !important;
    display: none;
    align-items: center !important;
    justify-content: center !important;
    overscroll-behavior: contain !important;
}

.tor-reader-card {
    background: #ffffff !important;
    width: 100% !important;
    max-width: 820px !important;
    height: 88vh !important;
    height: 88dvh !important;
    max-height: 88vh !important;
    max-height: 88dvh !important;
    border-radius: 22px !important;
    box-shadow: 0 25px 60px rgba(0,0,0,0.4) !important;
    border: 2px solid #e6c888 !important;
    overflow: hidden !important;
    margin: auto !important;
    display: flex !important;
    flex-direction: column !important;
    animation: torModalIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
    overscroll-behavior: contain !important;
}

.tor-modal-header {
    flex: 0 0 auto !important;
    flex-shrink: 0 !important;
}

.tor-modal-body {
    flex: 1 1 0% !important;
    min-height: 0 !important;
    overflow-y: auto !important;
    -webkit-overflow-scrolling: touch !important;
    overscroll-behavior: contain !important;
    touch-action: pan-y !important;
    background: #ffffff !important;
}

.tor-modal-footer {
    flex: 0 0 auto !important;
    flex-shrink: 0 !important;
}

@media (max-width: 768px) {
    .tor-reader-modal {
        padding: 0.5rem 0.35rem !important;
    }
    .tor-reader-card {
        height: 94vh !important;
        height: 94dvh !important;
        max-height: 94vh !important;
        max-height: 94dvh !important;
        border-radius: 16px !important;
    }
    .tor-modal-header {
        padding: 1.1rem 1.25rem !important;
        gap: 1rem !important;
    }
    .tor-modal-header h3 {
        font-size: 1.22rem !important;
    }
    .tor-modal-body {
        padding: 1.2rem 1.15rem !important;
    }
    .tor-chapter-paragraphs {
        font-size: 0.95rem !important;
        line-height: 1.75 !important;
    }
    .tor-modal-footer {
        padding: 0.8rem 1.15rem !important;
        gap: 0.6rem !important;
    }
    .tor-modal-footer button {
        padding: 0.45rem 0.95rem !important;
        font-size: 0.8rem !important;
    }
}

/* Hover animation for chapter rows */
.tor-chapter-row {
    transition: all 0.22s ease;
}
.tor-chapter-row:hover,
.tor-chapter-row:focus {
    background: #faf7f0 !important;
    padding-left: 1.4rem !important;
    padding-right: 1.4rem !important;
}
.tor-chapter-row:hover .tor-read-pill {
    background: #4a2a18 !important;
    color: #ffffff !important;
    border-color: #4a2a18 !important;
    box-shadow: 0 4px 12px rgba(74, 42, 24, 0.2);
}
.tor-chapter-row:hover .tor-read-pill svg {
    transform: translateX(3px);
}
.tor-read-pill svg {
    transition: transform 0.2s ease;
}

/* Modal open animation */
@keyframes torModalIn {
    from {
        opacity: 0;
        transform: scale(0.96) translateY(12px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

.tor-close-modal-btn:hover {
    background: #e6c888 !important;
    color: #2a160b !important;
    border-color: #e6c888 !important;
}

.tor-nav-chapter-btn:hover {
    background: #e6c888 !important;
    border-color: #e6c888 !important;
    color: #2a160b !important;
}

.tor-start-reading-btn:hover {
    background: #ffffff !important;
    color: #2a160b !important;
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(0,0,0,0.3) !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Relocate all modal dialogs directly to <body> to eliminate parent stacking contexts & footer overlap
    document.querySelectorAll('.tor-reader-modal').forEach(function(modal) {
        document.body.appendChild(modal);
    });

    function openChapterModal(chapterId) {
        // Close any currently open modals
        document.querySelectorAll('.tor-reader-modal').forEach(function(m) {
            m.style.display = 'none';
        });

        const targetModal = document.getElementById('chapterModal' + chapterId);
        if (targetModal) {
            targetModal.style.display = 'flex';
            document.documentElement.classList.add('tor-modal-open');
            document.body.classList.add('tor-modal-open');

            // Scroll modal body content to top
            const modalBody = targetModal.querySelector('.tor-modal-body');
            if (modalBody) {
                modalBody.scrollTop = 0;
            }

            // Focus on close button for accessibility
            const closeBtn = targetModal.querySelector('.tor-close-modal-btn');
            if (closeBtn) closeBtn.focus();
        }
    }

    function closeChapterModal(modalElem) {
        if (modalElem) {
            modalElem.style.display = 'none';
        } else {
            document.querySelectorAll('.tor-reader-modal').forEach(function(m) {
                m.style.display = 'none';
            });
        }
        document.documentElement.classList.remove('tor-modal-open');
        document.body.classList.remove('tor-modal-open');
    }

    // Touch event guard for mobile: stop background window dragging
    document.addEventListener('touchmove', function(e) {
        if (document.body.classList.contains('tor-modal-open')) {
            if (!e.target.closest('.tor-modal-body')) {
                e.preventDefault();
            }
        }
    }, { passive: false });

    // Event delegation for opening/navigating chapters
    document.addEventListener('click', function(e) {
        const trigger = e.target.closest('[data-chapter-target]');
        if (trigger) {
            e.preventDefault();
            const targetId = trigger.getAttribute('data-chapter-target');
            if (targetId) {
                openChapterModal(targetId);
            }
            return;
        }

        const closeBtn = e.target.closest('.tor-close-modal-btn');
        if (closeBtn) {
            e.preventDefault();
            const modal = closeBtn.closest('.tor-reader-modal');
            closeChapterModal(modal);
            return;
        }

        if (e.target.classList && e.target.classList.contains('tor-reader-modal')) {
            closeChapterModal(e.target);
        }
    });

    // Accessible keydown Enter / Space for chapter triggers
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            const trigger = document.activeElement ? document.activeElement.closest('[data-chapter-target]') : null;
            if (trigger) {
                e.preventDefault();
                const targetId = trigger.getAttribute('data-chapter-target');
                if (targetId) openChapterModal(targetId);
            }
        }
        if (e.key === 'Escape') {
            closeChapterModal();
        }
    });
});
</script>

    
<!-- FOOTER + BOTTOM WIDGETS + BIBLE MODAL UNIFIED SECTION -->
<!-- Use exact copy from home page for all inner pages -->



<?php
get_footer();
