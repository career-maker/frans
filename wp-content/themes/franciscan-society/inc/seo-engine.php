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
    $og_img = ! empty( $page_data['meta_og_image'] ) ? $page_data['meta_og_image'] : ( ! empty( $page_data['og_image'] ) ? $page_data['og_image'] : ( FRANCISCAN_THEME_URI . '/assets/images/new_uploads/hero-banner-aug20.jpeg' ) );
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
