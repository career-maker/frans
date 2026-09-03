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

        footer { position: relative; z-index: 10 !important; }
    
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

    $chapters = array(
        1 => array(
            'roman'    => 'Chapter I',
            'title'    => 'Our Identity',
            'subtitle' => 'The Form of Life and Evangelical Conversion',
            'paragraphs' => array(
                '1' => 'The form of life of the Brothers and Sisters of the Third Order Regular of Saint Francis is this: to observe the Holy Gospel of Our Lord Jesus Christ by living in obedience, in poverty and in chastity. Following Jesus Christ after the example of St. Francis, let them recognize that they are called to make greater efforts in their observance of the precepts and counsels of Our Lord Jesus Christ. Let them deny themselves (cf Mt 16:24) as each has promised the Lord.',
                '2' => 'With all in the holy Catholic and apostolic Church who wish to serve the Lord, the brothers and sisters of this order are to persevere in true faith and penance. They wish to live this evangelical conversion of life in a spirit of prayer, of poverty, and of humility. Therefore, let them abstain from all evil and persevere to the end in doing good because God the Son Himself will come again in glory and will say to all who acknowledge, adore and serve Him in sincere repentance: "Come blessed of my Father, take possession of the kingdom prepared for you from the beginning of the world" (Mt 25:34).',
                '3' => 'The sisters and brothers promise obedience and reverence to the Pope and the Holy Catholic Church. In this same spirit they are to obey those called to be ministers and servants of their own fraternity. And wherever they are, or in whatever situation they are in, they should diligently and fervently show reverence and honor to one another. They should also foster unity and communion with all the members of the Franciscan family.',
            ),
        ),
        2 => array(
            'roman'    => 'Chapter II',
            'title'    => 'Acceptance into this Life',
            'subtitle' => 'Vocation, Initiation, and Consecration',
            'paragraphs' => array(
                '4' => 'Those who through the Lord\'s inspiration come to us desiring to accept this way of life are to be received kindly. At the appropriate time, they are to be presented to the ministers of the fraternity who hold responsibility to admit them.',
                '5' => 'The ministers shall ascertain that the aspirants truly adhere to the Catholic faith and the Church\'s sacramental life. If they are found to have a vocation, they are to be initiated into the life of the fraternity. Let everything pertaining to this gospel way of life be explained to them, especially these words of the Lord: "If you wish to be perfect (Mt 19:21), go and sell all your possessions (cf Lk 18:22) and give to the poor. You will have treasure in heaven. Then come, follow Me." And "if anyone wishes to follow Me, let him deny himself, take up his cross, and follow Me" (Mt 16:24).',
                '6' => 'Led by the Lord, let them begin a life of penance, conscious that all of us must be continuously and totally converted to the Lord. As a sign of their conversion and consecration to gospel life, they are to clothe themselves plainly and to live in simplicity.',
                '7' => 'When their initial formation is completed, they are to be received into obedience promising to observe this life and rule always. Let them put aside all attachment as well as every care and worry. Let them only be concerned to serve, love, adore, and honor the Lord God, as best they can, with single-heartedness and purity of intention.',
                '8' => 'Within themselves, let them always make a dwelling place and home for the Lord God Almighty, Father, Son and Holy Spirit, so that, with undivided hearts, they may increase in universal love by continually turning to God and to neighbor (Jn 14:23).',
            ),
        ),
        3 => array(
            'roman'    => 'Chapter III',
            'title'    => 'The Spirit of Prayer',
            'subtitle' => 'Contemplation, Liturgy, and Penance',
            'paragraphs' => array(
                '9' => 'Everywhere and in each place, and in every season and each day, the brothers and sisters are to have a true and humble faith. From the depths of their inner life let them love, honor, adore, serve, praise, bless and glorify our most high and eternal God who is Father, Son and Holy Spirit. With all that they are, let them adore Him "because we should pray always and not lose heart" (Lk 18:1); this is what the Father desires. In this same spirit let them also celebrate the Liturgy of the Hours in union with the whole Church. The sisters and brothers whom the Lord has called to the life of contemplation (Mk 6:31), with a daily renewed joy, should manifest their special dedication to God and celebrate the Father\'s love for the world. It was He who created and redeemed us, and by His mercy alone shall save us.',
                '10' => 'The brothers and sisters are to praise the Lord, the King of heaven and earth, (cf Mt 11:25) with all His creatures and to give Him thanks because, by His own holy will and through His only Son with the Holy Spirit, He has created all things spiritual and material and made us in His own image and likeness.',
                '11' => 'Since the sisters and brothers are to be totally conformed to the Gospel, they should reflect and keep in their hearts the words of Our Lord Jesus Christ who is the word of the Father, as well as the words of the Holy Spirit which "are spirit and life" (Jn 6:63).',
                '12' => 'Let them participate in the sacrifice of Our Lord Jesus Christ and receive His Body and Blood with great humility and reverence remembering the words of the Lord: "He who eats My Flesh and drinks My Blood has eternal life" (Jn 6:54). Moreover, they are to show the greatest possible reverence and honor for the most sacred name, written words and most holy Body and Blood of Our Lord Jesus Christ through whom all things in heaven and on earth have been brought to peace and reconciliation with Almighty God (Jn 6:63).',
                '13' => 'Whenever they commit sin the brothers and sisters, without delay, are to do penance interiorly by sincere sorrow and exteriorly by confessing their sins to a priest. They should also do worthy deeds that manifest their repentance. They should fast and always strive to be simple and humble, especially before God. They should desire nothing else but our Savior, who offered Himself in His own Blood as a sacrifice on the altar of the Cross for our sins, giving us example so that we might follow in His footsteps.',
            ),
        ),
        4 => array(
            'roman'    => 'Chapter IV',
            'title'    => 'The Life of Chastity for the Sake of the Kingdom',
            'subtitle' => 'Total Consecration and Marian Devotion',
            'paragraphs' => array(
                '14' => 'Let the brothers and sisters keep in mind how great a dignity the Lord God has given them "because He created them and formed them in the image of His beloved Son according to the flesh and in His own likeness according to the Spirit" (Col 1:16). Since they are created through Christ and in Christ, they have chosen this form of life which is founded on the words and deeds of our Redeemer.',
                '15' => 'Professing chastity "for the sake of the kingdom of heaven" (Mt 19:12), they are to care for the things of the Lord and "they have nothing else to do except to follow the will of the Lord and to please Him" (1 Col 7:32). In all of their works the love of God and all people should shine forth.',
                '16' => 'They are to remember that they have been called by a special gift of grace to manifest in their lives that wonderful mystery by which the Church is joined to Christ her spouse (cf Eph. 5:23-26).',
                '17' => 'Let the brothers and sisters keep the example of the Blessed Virgin Mary, the Mother of God and of our Lord Jesus Christ, ever before their eyes. Let them do this according to the exhortation of St. Francis who held Holy Mary, Lady and Queen, in highest veneration, since she is "the virgin made church." Let them also remember that the Immaculate Virgin Mary, whose example they are to follow, called herself "the handmaid of the Lord" (Lk 1:38).',
            ),
        ),
        5 => array(
            'roman'    => 'Chapter V',
            'title'    => 'The Way to Serve and Work',
            'subtitle' => 'Labor, Humility, and Peaceful Witness',
            'paragraphs' => array(
                '18' => 'As poor people, the brothers and sisters to whom the Lord has given the grace of serving or working with their hands, should do so faithfully and conscientiously. Let them avoid that idleness which is the enemy of the soul. But they should not be so busy that the spirit of holy prayer and devotion, which all earthly goods should foster, is extinguished.',
                '19' => 'In exchange for their service or work, they may accept anything necessary for their own temporal needs and for that of their sisters or brothers. Let them accept it humbly as is expected of those who are servants of God and seekers of most holy poverty. Whatever they may have over and above their needs, they are to give to the poor. And let them never want to be over others. Instead they should be servants and subjects to every human creature for the Lord\'s sake (1 P 2:13).',
                '20' => 'Let the sisters and brothers be gentle, peaceful and unassuming, mild and humble, speaking respectfully to all in accord with their vocation. Wherever they are, or wherever they go throughout the world they should not be quarrelsome, contentious, or judgmental towards others. Rather, it should be obvious that they are "joyful, good-humored," and happy "in the Lord" as they ought to be (cf Ph 4:4). And in greeting others, let them say, "The Lord give you peace."',
            ),
        ),
        6 => array(
            'roman'    => 'Chapter VI',
            'title'    => 'The Life of Poverty',
            'subtitle' => 'Pilgrims, Strangers, and Heavenly Riches',
            'paragraphs' => array(
                '21' => 'All the sisters and brothers zealously follow the poverty and humility of Our Lord Jesus Christ. "Though rich" beyond measure (2 Co 8:9). He emptied Himself for our sake (Ph 2:7) and with the holy virgin, His mother, Mary, He chose poverty in this world. Let them be mindful that they should have only those goods of this world which, as the apostle says, "having something to eat and something to wear, with these we are content" (1 Tim 6:8). Let them particularly beware of money. And let them be happy to live among the outcast and despised, among the poor, the weak, the sick, the unwanted, the oppressed, and the destitute.',
                '22' => 'The truly poor in spirit, following the example of the Lord, live in this world as pilgrims and strangers (cf 1 P 2:1). They neither appropriate nor defend anything as their own. So excellent is this most high poverty that it makes us heirs and rulers of the kingdom of heaven. It makes us materially poor, but rich in virtue (cf James 2:5). Let this poverty alone be our portion because it leads to the land of the living (Ps 141:6). Clinging completely to it let us, for the sake of Our Lord Jesus Christ, never want anything else under heaven.',
            ),
        ),
        7 => array(
            'roman'    => 'Chapter VII',
            'title'    => 'Fraternal Love',
            'subtitle' => 'Brotherhood, Mutual Care, and Reconciliation',
            'paragraphs' => array(
                '23' => 'Because God loves us, the brothers and sisters should love each other, for the Lord says, "This is My commandment, that you love one another as I have loved you" (Jn 15:12). Let them manifest their love in deeds (cf 1 Jn 3:18). Also whenever they meet each other, they should show that they are members of the same family. Let them make known their needs to one another. Blessed are they who love another who is sick and seemingly useless, as much as when that brother or sister is well and of service to them. Whether in sickness or in health, they should only want what God wishes for them. For all that happens to them let them give thanks to our Creator.',
                '24' => 'If discord caused by word or deed should occur among them, they should immediately (Mt 18:35) and humbly ask forgiveness of one another even before offering their gift of prayer before the Lord (cf Mt 5:24). And if anyone seriously neglects the form of life all profess, the minister, or others who may know of it, are to admonish that person. Those giving the admonition should neither embarrass nor speak evil of the other, but show great kindness. Let all be careful of self-righteousness, which causes anger and annoyance because of another\'s sin. These in oneself or in another hinder living lovingly.',
            ),
        ),
        8 => array(
            'roman'    => 'Chapter VIII',
            'title'    => 'The Obedience of Love',
            'subtitle' => 'Mutual Submission, Servant Leadership, and Humility',
            'paragraphs' => array(
                '25' => 'Following the example of Our Lord Jesus Christ Who made His own will one with the Father\'s, the sisters and brothers are to remember that, for God, they should give up their own wills. Therefore, in every kind of chapter they have let them "seek first the kingdom of God and His justice," (Mt 6:33) and exhort one another to observe with greater dedication the rule they have professed and to follow faithfully in the footprints of Our Lord Jesus Christ. Let them neither dominate nor seek power over one another, but let them willingly serve and obey "one another with that genuine love which comes from each one\'s heart" (cf Gal 5:13). This is the true and holy obedience of Our Lord Jesus Christ.',
                '26' => 'They are always to have one of their number as minister and servant of the fraternity whom they are strictly obliged to obey in all that they have promised the Lord to observe, and which is not contrary to conscience or this rule.',
                '27' => 'Those who are ministers and servants of the others should visit, admonish, and encourage them with humility and love. Should there be brothers or sisters anywhere who know and acknowledge that they cannot observe the rule according to its spirit, it is their right and duty to have recourse to their ministers. The ministers are to receive them with such love, kindness, and sympathy that the sisters or brothers can speak and act toward them just as an employer would with a worker. This is how it should be. The ministers are to be servants of all.',
                '28' => 'No one is to appropriate any office or ministry whatsoever as if it were a personal right; rather each should willingly relinquish it when the time comes.',
            ),
        ),
        9 => array(
            'roman'    => 'Chapter IX',
            'title'    => 'Apostolic Life',
            'subtitle' => 'Witness of Peace, Joyful Perseverance, and Francis\' Blessing',
            'paragraphs' => array(
                '29' => 'The brothers and sisters are to love the Lord "with their whole heart, with their whole soul and mind, and with all their strength," and to love their neighbor as themselves. Let them glorify the Lord in all they do. For He has sent them into the world so that they might give witness by word and work to His voice and to make known to all that the Lord alone is God (cf Mk 12:30, Mt 22:30).',
                '30' => 'As they announce peace with their lips, let them be careful to have it even more within their own hearts. No one should be roused to wrath or insult on their account, rather all should be moved to peace, goodwill and mercy because of their gentleness. The sisters and brothers are called to heal the wounded, to bind up those who are bruised, and to reclaim the erring. Wherever they are, they should recall that they have given themselves up completely and handed themselves over totally to Our Lord Jesus Christ. Therefore, they should be prepared to expose themselves to every enemy, visible and invisible, for the love of Him because the Lord says: "Blessed are they who suffer persecution for the sake of justice, theirs is the kingdom of heaven" (Mt 5:10).',
                '31' => 'In that love which is God (1 Jn 4:16) all the brothers and sisters, whether they are engaged in prayer, or in announcing the word of God, or in serving, or in doing manual labor, should strive to be humble in everything. They should not seek glory, or be self-satisfied, or interiorly proud because of a good work or word God does or speaks in or through them. Rather in every place and circumstance, let them acknowledge that all good belongs to the most high Lord and Ruler of all things. Let them always give thanks to Him from Whom we receive all good.',
                '32' => 'Let the sisters and brothers always be mindful that they should desire one thing alone, namely, the Spirit of God at work within them. Always obedient to the Church and firmly established in the Catholic faith, let them live according to the poverty, the humility and the holy Gospel of Our Lord Jesus Christ which they have solemnly promised to observe.',
                'blessing' => '"Whoever will observe these things shall be filled with the blessings of the Most High Father in Heaven, and on earth with the blessing of His beloved Son, with the Holy Spirit, and with all virtues and with all the saints. And I, Brother Francis, your little one and servant, in so far as I am able, confirm to you within and without this most Holy Blessing."',
            ),
        ),
    );
    ?>

    <!-- Hero Banner -->
    <section style="padding: 11rem 2rem 6.5rem 2rem; background-image: url('<?php echo esc_url( $rule_hero_bg ); ?>'); background-size: cover; background-position: center; position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(12, 11, 10, 0.78) 0%, rgba(12, 11, 10, 0.65) 100%);"></div>
        <div style="max-width: 900px; margin: 0 auto; position: relative; z-index: 2; text-align: center;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(230, 200, 136, 0.16); backdrop-filter: blur(8px); padding: 0.4rem 1.1rem; border-radius: 50px; margin-bottom: 1.2rem; border: 1px solid rgba(230, 200, 136, 0.35);">
                <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                <span style="color: #ffffff; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; font-family: 'Instrument Sans', sans-serif;">OUR RULE… OUR LIFE</span>
            </div>
            <h1 style="font-family: 'Phudu', sans-serif; font-size: clamp(2.4rem, 4.8vw, 4rem); font-weight: 700; color: #ffffff; text-transform: uppercase; margin: 0 0 1rem 0; line-height: 1.15; letter-spacing: 0.02em;">
                THIRD ORDER REGULAR RULE
            </h1>
            <p style="font-family: 'Instrument Sans', sans-serif; font-size: clamp(0.95rem, 1.6vw, 1.15rem); font-weight: 500; color: rgba(255, 255, 255, 0.9); margin: 0 auto; max-width: 640px; letter-spacing: 0.03em; line-height: 1.6;">
                Discovering the authentic meaning of Franciscan life
            </p>
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

            <!-- Header + Content Flex Row (compact, perfectly aligned, no awkward empty gaps) -->
            <div style="display: flex; flex-wrap: wrap; gap: 2rem; align-items: flex-start; justify-content: space-between; margin-bottom: 1.5rem;">
                
                <!-- Left: Title, Subtitle, and First Paragraph -->
                <div style="flex: 1 1 580px; min-width: 290px;">
                    <span style="display: inline-block; font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; font-weight: 800; color: #854d0e; text-transform: uppercase; letter-spacing: 0.12em; background: #faf4e8; padding: 0.3rem 0.9rem; border-radius: 20px; margin-bottom: 0.8rem; border: 1px solid #ebdcc5;">
                        PROLOGUE TO THE RULE
                    </span>
                    <h2 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.8rem, 3vw, 2.3rem); font-weight: 700; color: #1c1917; line-height: 1.2; margin: 0 0 0.6rem 0;">
                        Third Order Regular Rule
                    </h2>
                    <h3 style="font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; font-weight: 600; color: #6b3d28; line-height: 1.45; margin: 0 0 1.2rem 0;">
                        The Beginning of the Rule and the Life of the Brothers and Sisters of the Third Order Regular of St. Francis <span style="font-weight: 400; color: #854d0e; font-style: italic;">(Words of St. Francis to His Followers — Letter to the Faithful I, 1–19)</span>
                    </h3>

                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 1.02rem; line-height: 1.75; color: #374151; text-align: justify; margin: 0;">
                        All who love the Lord with their whole heart, with their whole soul and mind, and with all their strength, <em>(cf Mk 12:30)</em> and love their neighbors as themselves, <em>(cf Mt 22:39)</em> and who despise the tendency in their humanity to sin, receive the Body and Blood of our Lord Jesus Christ and bring forth from within themselves fruits worthy of true penance; How happy and blessed are these men and women when they do these things, and persevere in doing them because the Spirit of the Lord will rest upon them <em>(cf Is 11:12)</em> and the Lord will make His home and dwelling place with them <em>(cf Jn 14:23)</em>. They are the children of the Heavenly Father <em>(cf Mt 5:45)</em> whose works they do. They are the spouses, brothers and mothers of Our Lord Jesus Christ <em>(cf Mt 12:50)</em>. We are his spouses when the faithful soul is united by the Holy Spirit with Our Lord Jesus Christ. We are brothers when we do the will of the Father who is in Heaven <em>(cf Mt 12:50)</em>. We are mothers when we bear Him in our hearts and bodies <em>(cf 1 Co 6:20)</em> with divine love and with pure and sincere consciences; and we give birth to him through a holy life which should enlighten others because of our example <em>(Mt 5:16)</em>.
                    </p>
                </div>

                <!-- Right: Coat of Arms Emblem (Snug, proportionate) -->
                <div style="flex: 0 0 240px; margin: 0 auto; text-align: center;">
                    <div style="background: #faf7f0; border-radius: 16px; padding: 1.4rem 1.2rem; border: 1.5px solid #ebdcc5; box-shadow: 0 6px 20px rgba(74, 42, 24, 0.05);">
                        <img loading="lazy" decoding="async" src="<?php echo esc_url( FRANCISCAN_THEME_URI . '/assets/images/rule/st-francis-rule.jpg' ); ?>" alt="Franciscan Coat of Arms" style="width: 100%; max-width: 180px; height: auto; display: block; margin: 0 auto 0.75rem auto;">
                        <div style="font-family: 'Phudu', sans-serif; font-size: 0.9rem; font-weight: 700; color: #4a2a18; text-transform: uppercase;">
                            Third Order Regular
                        </div>
                        <div style="font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; color: #78716c; margin-top: 0.2rem;">
                            Province of St. Francis of Assisi
                        </div>
                    </div>
                </div>

            </div>

            <!-- Paragraph 2 (Flows seamlessly immediately after) -->
            <p style="font-family: 'Instrument Sans', sans-serif; font-size: 1.02rem; line-height: 1.75; color: #374151; text-align: justify; margin: 0 0 2.2rem 0;">
                How glorious it is to have so holy and great a Father in Heaven; and to have such a beautiful and admirable Spouse, the Holy Paraclete; and to have a Brother and Son, so holy, beloved, blessed, humble, peaceful, sweet, lovable, and desirable over all things: Our Lord Jesus Christ who gave up his life for his sheep <em>(cf Jn 10:15)</em> and prayed to the Father, saying: Holy Father, keep in your name <em>(Jn 17:11)</em> those whom You gave Me in the world; they are Yours and You gave them to Me <em>(Jn 17:6)</em>. And the word which You gave Me I gave to them, and they accepted it and truly believed that it came forth from You. And they have accepted that You sent Me <em>(Jn 17:8)</em>. I pray for them and not for the world <em>(Jn 17:9)</em>. Bless them and sanctify them <em>(Jn 17:17)</em>. I sanctify Myself for their sakes <em>(Jn 17:19)</em>. I do not pray only for these but also for those who, through their word, will believe in Me <em>(Jn 17:20)</em>, may they be holy in oneness as We are <em>(Jn 17:11)</em>. Father, I wish that where I am they too may be and that they may see My glory <em>(Jn 17:24)</em> in Your kingdom <em>(Mt 20:21)</em>.
            </p>

            <!-- Sacred Proclamation Ribbon (Compact margins) -->
            <div style="margin: 0 0 2.5rem 0; background: linear-gradient(135deg, #371e11 0%, #4a2a18 50%, #2a160b 100%); border-radius: 14px; padding: 1.6rem 1.8rem; text-align: center; border: 1.5px solid #e6c888; box-shadow: 0 8px 24px rgba(74, 42, 24, 0.15);">
                <div style="display: inline-block; width: 40px; height: 2px; background: #e6c888; margin-bottom: 0.6rem;"></div>
                <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1rem, 1.8vw, 1.25rem); font-weight: 700; color: #ffffff; letter-spacing: 0.05em; line-height: 1.45; margin: 0; text-transform: uppercase;">
                    IN THE NAME OF THE LORD! HERE BEGINS THE RULE AND LIFE OF THE BROTHERS AND SISTERS OF THE THIRD ORDER REGULAR OF ST. FRANCIS
                </h3>
                <div style="display: inline-block; width: 40px; height: 2px; background: #e6c888; margin-top: 0.6rem;"></div>
            </div>

            <!-- Chapter Directory Layout (Matches Reference Site Clean Structure) -->
            <div style="background: #ffffff; border: 1.5px solid #ede4d3; border-radius: 18px; padding: clamp(1.8rem, 3.5vw, 2.5rem); box-shadow: 0 6px 24px rgba(0,0,0,0.03);">
                <div style="border-bottom: 1.5px solid #ede4d3; padding-bottom: 1.2rem; margin-bottom: 1.5rem;">
                    <span style="font-family: 'Instrument Sans', sans-serif; font-size: 0.78rem; font-weight: 800; color: #854d0e; text-transform: uppercase; letter-spacing: 0.12em; display: block; margin-bottom: 0.35rem;">
                        THE NINE CHAPTERS
                    </span>
                    <h3 style="font-family: 'Phudu', sans-serif; font-size: clamp(1.5rem, 2.5vw, 2rem); font-weight: 700; color: #1c1917; margin: 0 0 0.4rem 0;">
                        Rule of the Third Order Regular
                    </h3>
                    <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.92rem; color: #78716c; margin: 0;">
                        Click on any chapter to open the interactive reading window
                    </p>
                </div>

                <!-- Clean Chapter Rows (Structured Table of Contents) -->
                <div class="tor-chapters-container" style="display: flex; flex-direction: column;">
                    <?php foreach ( $chapters as $chap_id => $chap_info ) : ?>
                        <div class="tor-chapter-row" data-chapter-target="<?php echo esc_attr( $chap_id ); ?>" role="button" tabindex="0" style="display: flex; align-items: center; justify-content: space-between; padding: 1.25rem 1rem; border-bottom: 1px solid #f0ebe1; cursor: pointer; transition: all 0.2s ease; border-radius: 10px;">
                            
                            <div style="display: flex; align-items: baseline; gap: 2rem; flex-wrap: wrap;">
                                <div style="font-family: 'Phudu', sans-serif; font-size: 1.15rem; font-weight: 700; color: #4a2a18; min-width: 140px; letter-spacing: 0.02em;">
                                    <?php echo esc_html( $chap_info['roman'] ); ?>:
                                </div>
                                <div style="font-family: 'Instrument Sans', sans-serif; font-size: 1.1rem; font-weight: 600; color: #1c1917; line-height: 1.4;">
                                    <?php echo esc_html( $chap_info['title'] ); ?>
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

    <!-- 9 Chapter Popup Reader Modals -->
    <?php foreach ( $chapters as $modal_id => $chap_data ) : ?>
        <div class="tor-reader-modal" id="chapterModal<?php echo esc_attr( $modal_id ); ?>" role="dialog" aria-modal="true" aria-labelledby="chapterModalTitle<?php echo esc_attr( $modal_id ); ?>" style="display: none; position: fixed; inset: 0; z-index: 999999; overflow-y: auto; background: rgba(12, 11, 10, 0.78); backdrop-filter: blur(8px); padding: 1.5rem 1rem; align-items: center; justify-content: center;">
            <div class="tor-reader-card" style="background: #ffffff; width: 100%; max-width: 820px; border-radius: 22px; box-shadow: 0 25px 60px rgba(0,0,0,0.35); border: 2px solid #e6c888; overflow: hidden; margin: auto; animation: torModalIn 0.3s cubic-bezier(0.16, 1, 0.3, 1); display: flex; flex-direction: column; max-height: 90vh;">
                
                <!-- Modal Header -->
                <div style="background: linear-gradient(135deg, #4a2a18 0%, #2a160b 100%); padding: 1.8rem 2.2rem; display: flex; justify-content: space-between; align-items: flex-start; gap: 1.5rem; border-bottom: 2px solid #e6c888; position: relative;">
                    <div>
                        <div style="display: inline-flex; align-items: center; gap: 0.45rem; background: rgba(230, 200, 136, 0.2); padding: 0.3rem 0.85rem; border-radius: 20px; margin-bottom: 0.6rem; border: 1px solid rgba(230, 200, 136, 0.4);">
                            <span style="width: 6px; height: 6px; background-color: #e6c888; border-radius: 50%; display: inline-block;"></span>
                            <span style="color: #ffffff; font-size: 0.78rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; font-family: 'Instrument Sans', sans-serif;"><?php echo esc_html( $chap_data['roman'] ); ?></span>
                        </div>
                        <h3 id="chapterModalTitle<?php echo esc_attr( $modal_id ); ?>" style="font-family: 'Phudu', sans-serif; font-size: clamp(1.4rem, 2.5vw, 1.9rem); font-weight: 700; color: #ffffff; margin: 0 0 0.3rem 0; line-height: 1.2;">
                            <?php echo esc_html( $chap_data['title'] ); ?>
                        </h3>
                        <p style="font-family: 'Instrument Sans', sans-serif; font-size: 0.9rem; color: #e6c888; margin: 0; font-weight: 500;">
                            <?php echo esc_html( $chap_data['subtitle'] ); ?>
                        </p>
                    </div>

                    <button type="button" class="tor-close-modal-btn" aria-label="Close chapter reader" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.12); border: 1px solid rgba(230,200,136,0.3); color: #ffffff; font-size: 1.4rem; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s ease; line-height: 1; flex-shrink: 0;">
                        &times;
                    </button>
                </div>

                <!-- Modal Body (Scrollable) -->
                <div style="padding: 2.2rem 2.5rem; overflow-y: auto; flex: 1 1 auto; background: #ffffff;">
                    <?php foreach ( $chap_data['paragraphs'] as $p_key => $p_text ) : ?>
                        <?php if ( $p_key === 'blessing' ) : ?>
                            <div style="background: #fdfaf5; border-left: 4px solid #a8742b; border-radius: 0 12px 12px 0; padding: 1.4rem 1.8rem; margin-top: 1.8rem; font-style: italic; font-family: 'Instrument Sans', sans-serif; font-size: 1.05rem; line-height: 1.75; color: #4a2a18; box-shadow: inset 0 0 12px rgba(0,0,0,0.02);">
                                <?php echo wp_kses_post( $p_text ); ?>
                            </div>
                        <?php else : ?>
                            <div style="margin-bottom: 1.6rem; display: flex; gap: 0.9rem; align-items: flex-start;">
                                <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 32px; height: 32px; background: rgba(74, 42, 24, 0.08); color: #4a2a18; font-family: 'Phudu', sans-serif; font-weight: 800; font-size: 0.95rem; border-radius: 8px; flex-shrink: 0; margin-top: 2px;">
                                    <?php echo esc_html( $p_key ); ?>
                                </span>
                                <p style="font-family: 'Instrument Sans', sans-serif; font-size: 1.04rem; line-height: 1.8; color: #374151; margin: 0; text-align: justify;">
                                    <?php echo wp_kses_post( $p_text ); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <!-- Modal Footer with Next / Previous Chapter Navigation -->
                <div style="background: #f9f6f0; border-top: 1px solid #ebdcc5; padding: 1.1rem 2.2rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                    <div>
                        <?php if ( $modal_id > 1 ) : ?>
                            <button type="button" class="tor-nav-chapter-btn" data-chapter-target="<?php echo esc_attr( $modal_id - 1 ); ?>" style="background: transparent; color: #4a2a18; border: 1.5px solid #4a2a18; padding: 0.55rem 1.2rem; border-radius: 25px; font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; font-weight: 700; cursor: pointer; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 0.4rem;">
                                &larr; Chapter <?php echo esc_html( $modal_id - 1 ); ?>
                            </button>
                        <?php endif; ?>
                    </div>

                    <div style="display: flex; gap: 0.8rem; align-items: center;">
                        <button type="button" class="tor-close-modal-btn" style="background: #e5e7eb; color: #374151; border: none; padding: 0.55rem 1.4rem; border-radius: 25px; font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; font-weight: 700; cursor: pointer; transition: all 0.2s ease;">
                            Close
                        </button>

                        <?php if ( $modal_id < 9 ) : ?>
                            <button type="button" class="tor-nav-chapter-btn" data-chapter-target="<?php echo esc_attr( $modal_id + 1 ); ?>" style="background: #4a2a18; color: #ffffff; border: 1.5px solid #4a2a18; padding: 0.55rem 1.3rem; border-radius: 25px; font-family: 'Instrument Sans', sans-serif; font-size: 0.88rem; font-weight: 700; cursor: pointer; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 0.4rem;">
                                Chapter <?php echo esc_html( $modal_id + 1 ); ?> &rarr;
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>

</main>

<style>
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
    function openChapterModal(chapterId) {
        // Close any currently open modals
        document.querySelectorAll('.tor-reader-modal').forEach(function(m) {
            m.style.display = 'none';
        });

        const targetModal = document.getElementById('chapterModal' + chapterId);
        if (targetModal) {
            targetModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
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
        document.body.style.overflow = '';
    }

    // Attach click to all chapter triggers
    document.querySelectorAll('[data-chapter-target]').forEach(function(trigger) {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-chapter-target');
            if (targetId) {
                openChapterModal(targetId);
            }
        });

        // Accessible keydown Enter / Space
        trigger.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const targetId = this.getAttribute('data-chapter-target');
                if (targetId) openChapterModal(targetId);
            }
        });
    });

    // Attach click to close buttons
    document.querySelectorAll('.tor-close-modal-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const modal = this.closest('.tor-reader-modal');
            closeChapterModal(modal);
        });
    });

    // Close when clicking on backdrop
    document.querySelectorAll('.tor-reader-modal').forEach(function(modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeChapterModal(this);
            }
        });
    });

    // Close with Escape key
    document.addEventListener('keydown', function(e) {
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
