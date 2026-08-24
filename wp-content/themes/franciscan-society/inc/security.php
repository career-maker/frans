<?php
/**
 * Security Hardening & Best Practices
 *
 * @package Franciscan_Society
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Add security headers to frontend responses
function franciscan_send_security_headers() {
    if ( ! headers_sent() ) {
        header( 'X-Content-Type-Options: nosniff' );
        header( 'X-Frame-Options: SAMEORIGIN' );
        header( 'X-XSS-Protection: 1; mode=block' );
        header( 'Referrer-Policy: strict-origin-when-cross-origin' );
    }
}
add_action( 'send_headers', 'franciscan_send_security_headers' );

// Remove WordPress generator version from head
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

// Disable XML-RPC for enhanced security if option enabled
if ( function_exists( 'franciscan_get_option' ) && franciscan_get_option( 'disable_xmlrpc', '1' ) === '1' ) {
    add_filter( 'xmlrpc_enabled', '__return_false' );
}

// Clean and sanitize string inputs safely
function franciscan_sanitize_array( $array ) {
    $clean = array();
    if ( ! is_array( $array ) ) {
        return sanitize_text_field( $array );
    }
    foreach ( $array as $key => $value ) {
        $key = sanitize_key( $key );
        if ( is_array( $value ) ) {
            $clean[$key] = franciscan_sanitize_array( $value );
        } elseif ( is_string( $value ) ) {
            if ( preg_match( '/<[^>]+>/', $value ) ) {
                $clean[$key] = wp_kses_post( $value );
            } else {
                $clean[$key] = sanitize_text_field( $value );
            }
        } else {
            $clean[$key] = $value;
        }
    }
    return $clean;
}
