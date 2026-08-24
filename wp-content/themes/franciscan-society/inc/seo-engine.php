<?php
/**
 * Franciscan Society Dynamic SEO & Metadata Engine
 *
 * @package Franciscan_Society
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function franciscan_render_dynamic_meta_tags() {
    $current_slug = 'home';
    if ( is_front_page() || is_home() ) {
        $current_slug = 'home';
    } elseif ( is_page() ) {
        global $post;
        $current_slug = $post ? $post->post_name : 'page';
    }

    $page_data = franciscan_get_page_content( $current_slug );
    $global_opts = franciscan_get_default_options();

    $title = ! empty( $page_data['meta_title'] ) ? $page_data['meta_title'] : ( get_the_title() . ' ' . franciscan_get_option( 'seo_title_suffix', '| Franciscan Society Ranchi' ) );
    $desc  = ! empty( $page_data['meta_description'] ) ? $page_data['meta_description'] : franciscan_get_option( 'seo_meta_desc', 'Franciscan Friars of the Third Order Regular, Province of St. Francis of Assisi, Ranchi.' );
    $keys  = ! empty( $page_data['meta_keywords'] ) ? $page_data['meta_keywords'] : franciscan_get_option( 'seo_keywords', 'Franciscan, TOR, Ranchi, Catholic, Friars, Faith' );
    $og_img = '';
    if ( ! empty( $page_data['meta_og_image'] ) ) {
        $og_img = $page_data['meta_og_image'];
    } elseif ( is_singular() && has_post_thumbnail() ) {
        $og_img = get_the_post_thumbnail_url( get_the_ID(), 'large' );
    } elseif ( ! empty( $page_data['hero_image'] ) ) {
        $og_img = $page_data['hero_image'];
    } elseif ( ! empty( $page_data['section_1_image'] ) ) {
        $og_img = $page_data['section_1_image'];
    } else {
        switch ( $current_slug ) {
            case 'ministries-pastoral':
                $og_img = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 1.39.44 PM.jpeg';
                break;
            case 'ministries-education':
                $og_img = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.39.44 AM (1).jpeg';
                break;
            case 'ministries-formation':
                $og_img = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2025-09-17 at 11.30.25 AM (1).jpeg';
                break;
            case 'ministries':
                $og_img = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/ChatGPT_Image_Aug_18_2026_05_51_30_PM.png';
                break;
            case 'about':
                $og_img = FRANCISCAN_THEME_URI . '/assets/images/church-bg.jpg';
                break;
            case 'gallery':
                $og_img = FRANCISCAN_THEME_URI . '/assets/images/gallery/WhatsApp Image 2026-08-07 at 8.42.19 AM (2).jpeg';
                break;
            case 'contact':
                $og_img = FRANCISCAN_THEME_URI . '/assets/images/church-bg.jpg';
                break;
            default:
                $og_img = FRANCISCAN_THEME_URI . '/assets/images/new_uploads/hero-banner-aug20.jpeg';
                break;
        }
    }
    $robots = ! empty( $page_data['robots_meta'] ) ? $page_data['robots_meta'] : 'index, follow';

    echo "\n<!-- Franciscan Society Dynamic SEO -->\n";
    echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
    echo '<meta name="keywords" content="' . esc_attr( $keys ) . '">' . "\n";
    echo '<meta name="robots" content="' . esc_attr( $robots ) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url( $og_img ) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr( $desc ) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url( $og_img ) . '">' . "\n";
    echo "<!-- /Franciscan Society Dynamic SEO -->\n\n";
}
add_action( 'wp_head', 'franciscan_render_dynamic_meta_tags', 1 );
