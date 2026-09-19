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
        $val = is_string( $array ) ? wp_unslash( $array ) : $array;
        return is_string( $val ) ? wp_kses_post( $val ) : $val;
    }
    foreach ( $array as $key => $value ) {
        $key = sanitize_key( $key );
        if ( is_array( $value ) ) {
            $clean[$key] = franciscan_sanitize_array( $value );
        } elseif ( is_string( $value ) ) {
            $val_unslashed = wp_unslash( $value );
            if ( preg_match( '/<[^>]+>/', $val_unslashed ) ) {
                $clean[$key] = wp_kses_post( $val_unslashed );
            } else {
                $clean[$key] = sanitize_textarea_field( $val_unslashed );
            }
        } else {
            $clean[$key] = $value;
        }
    }
    return $clean;
}

