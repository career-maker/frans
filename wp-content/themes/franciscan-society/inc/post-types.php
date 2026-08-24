<?php
/**
 * Custom Post Types and Taxonomies
 *
 * @package Franciscan_Society
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function franciscan_register_post_types() {
    // 1. Inquiries & Form Submissions (Private for Admin)
    register_post_type( 'franciscan_inquiry', array(
        'labels' => array(
            'name'               => __( 'Inquiries & Submissions', 'franciscan-society' ),
            'singular_name'      => __( 'Inquiry', 'franciscan-society' ),
            'menu_name'          => __( 'Inquiries', 'franciscan-society' ),
            'all_items'          => __( 'All Inquiries', 'franciscan-society' ),
            'view_item'          => __( 'View Inquiry', 'franciscan-society' ),
        ),
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => false, // Managed via custom dashboard
        'capability_type'     => 'post',
        'capabilities'        => array(
            'create_posts' => 'do_not_allow',
        ),
        'map_meta_cap'        => true,
        'supports'            => array( 'title', 'editor', 'custom-fields' ),
        'has_archive'         => false,
    ) );
}
add_action( 'init', 'franciscan_register_post_types' );
