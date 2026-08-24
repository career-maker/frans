<?php
/**
 * Secure Form Processing, Validation & AJAX Endpoints
 *
 * Hardened with CSRF verification, rate limiting, anti-spam honeypots,
 * strict HTML & Script injection rejection, CRLF prevention, and data integrity.
 *
 * @package Franciscan_Society
 * @version 2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Helper: Client IP Address Extraction
 */
function franciscan_get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    return sanitize_text_field( $ip );
}

/**
 * Helper: Strict HTML & Script Injection Detector
 * Returns true if input contains HTML tags, script blocks, or JS handlers.
 */
function franciscan_contains_html_or_script( $str ) {
    if ( empty( $str ) ) {
        return false;
    }
    // Check if stripping tags alters the text
    if ( strip_tags( $str ) !== $str ) {
        return true;
    }
    // Check for angle brackets with tag-like patterns or javascript: / event handlers
    if ( preg_match( '/<[^>]*>|<\s*script\b|javascript:|on\w+\s*=/i', $str ) ) {
        return true;
    }
    return false;
}

/**
 * Helper: Rate Limiter (Max N submissions per time window per IP)
 */
function franciscan_check_rate_limit( $action = 'contact', $max_requests = 15, $time_window = 300 ) {
    $ip = franciscan_get_client_ip();
    $transient_key = 'fs_rl_' . md5( $action . '_' . $ip );
    $requests = (int) get_transient( $transient_key );

    if ( $requests >= $max_requests ) {
        return false;
    }

    set_transient( $transient_key, $requests + 1, $time_window );
    return true;
}

/**
 * Helper: Verify Security Nonce with Fallback Support
 */
function franciscan_verify_request_nonce() {
    if ( isset( $_POST['security'] ) && wp_verify_nonce( $_POST['security'], 'franciscan_nonce' ) ) {
        return true;
    }
    if ( isset( $_POST['franciscan_nonce'] ) && wp_verify_nonce( $_POST['franciscan_nonce'], 'franciscan_contact_action' ) ) {
        return true;
    }
    if ( isset( $_POST['franciscan_nonce'] ) && wp_verify_nonce( $_POST['franciscan_nonce'], 'franciscan_nonce' ) ) {
        return true;
    }
    return false;
}

/**
 * 1. Contact Form & Homepage Quick Inquiry AJAX
 */
function franciscan_ajax_contact() {
    // 1. CSRF Verification
    if ( ! franciscan_verify_request_nonce() ) {
        wp_send_json_error( array( 'message' => 'Security token expired. Please refresh the page and retry.' ), 403 );
    }

    // 2. Anti-Spam Honeypot Verification
    if ( ! empty( $_POST['website_hp'] ) ) {
        wp_send_json_success( array( 'message' => 'Thank you! Your message has been received. Peace and Good.' ) );
    }

    // 3. Raw Data Extraction
    $raw_name    = isset( $_POST['name'] ) ? trim( (string) $_POST['name'] ) : '';
    $raw_email   = isset( $_POST['email'] ) ? trim( (string) $_POST['email'] ) : '';
    $raw_phone   = isset( $_POST['phone'] ) ? trim( (string) $_POST['phone'] ) : '';
    $raw_subject = isset( $_POST['subject'] ) ? trim( (string) $_POST['subject'] ) : 'General Inquiries';
    $raw_message = isset( $_POST['message'] ) ? trim( (string) $_POST['message'] ) : '';

    // 4. Strict HTML & Script Injection Rejection Check
    if ( franciscan_contains_html_or_script( $raw_name ) ||
         franciscan_contains_html_or_script( $raw_message ) ||
         franciscan_contains_html_or_script( $raw_subject ) ||
         franciscan_contains_html_or_script( $raw_phone ) ) {
        wp_send_json_error( array(
            'message' => 'HTML tags, scripts, and code injections are strictly prohibited. Please submit plain text only.'
        ), 400 );
    }

    // 5. IP Flood & Rate Limit Check
    if ( ! franciscan_check_rate_limit( 'contact', 20, 300 ) ) {
        wp_send_json_error( array( 'message' => 'Too many submissions received recently. Please wait a few moments before trying again.' ), 429 );
    }

    // Strip carriage returns and newlines to prevent email header injection (CRLF)
    $clean_name    = preg_replace( '/[\r\n]+/', ' ', sanitize_text_field( $raw_name ) );
    $clean_email   = preg_replace( '/[\r\n]+/', '', sanitize_email( $raw_email ) );
    $clean_phone   = preg_replace( '/[\r\n]+/', '', sanitize_text_field( $raw_phone ) );
    $clean_subject = preg_replace( '/[\r\n]+/', ' ', sanitize_text_field( $raw_subject ) );
    $clean_message = sanitize_textarea_field( $raw_message );

    // 6. Validation & Business Logic
    if ( empty( $clean_name ) || mb_strlen( $clean_name ) < 2 || mb_strlen( $clean_name ) > 100 ) {
        wp_send_json_error( array( 'message' => 'Please provide a valid full name (between 2 and 100 characters).' ) );
    }

    if ( empty( $clean_email ) || ! is_email( $clean_email ) || strlen( $clean_email ) > 120 ) {
        wp_send_json_error( array( 'message' => 'Please provide a valid email address.' ) );
    }

    if ( ! empty( $clean_phone ) ) {
        $digits = preg_replace( '/\D/', '', $clean_phone );
        if ( strlen( $digits ) < 7 || strlen( $digits ) > 15 || preg_match( '/^(\d)\1+$/', $digits ) ) {
            wp_send_json_error( array( 'message' => 'Please provide a genuine contact phone number.' ) );
        }
    }

    if ( empty( $clean_message ) || mb_strlen( $clean_message ) < 5 || mb_strlen( $clean_message ) > 3000 ) {
        wp_send_json_error( array( 'message' => 'Please provide your inquiry message (between 5 and 3000 characters).' ) );
    }

    // Whitelist Allowed Subject Values
    $allowed_subjects = array(
        'General Inquiries',
        'General Inquiry',
        'Prayer Request',
        'Prayer Request / Intercession',
        'Mass Intention',
        'Holy Mass Intention',
        'Vocation Guidance',
        'Mission & Vocations',
        'Pastoral Ministry',
        'Social Outreach',
        'Donation & Contribution Support',
    );
    if ( ! in_array( $clean_subject, $allowed_subjects, true ) ) {
        $clean_subject = 'General Inquiries';
    }

    // 7. Safe Database Storage
    $post_title = sprintf( 'Contact: %s (%s)', $clean_name, current_time( 'd-m-Y H:i' ) );
    $post_id = wp_insert_post( array(
        'post_type'    => 'franciscan_inquiry',
        'post_title'   => sanitize_text_field( $post_title ),
        'post_content' => $clean_message,
        'post_status'  => 'publish',
    ) );

    if ( $post_id && ! is_wp_error( $post_id ) ) {
        update_post_meta( $post_id, '_inquiry_type', 'Contact Form' );
        update_post_meta( $post_id, '_inquiry_name', $clean_name );
        update_post_meta( $post_id, '_inquiry_email', $clean_email );
        update_post_meta( $post_id, '_inquiry_phone', $clean_phone );
        update_post_meta( $post_id, '_inquiry_subject', $clean_subject );
        update_post_meta( $post_id, '_inquiry_ip', franciscan_get_client_ip() );
        update_post_meta( $post_id, '_inquiry_date', current_time( 'mysql' ) );

        // 8. Secure Email Notification (Strict Header Isolation)
        $receiving_email = function_exists( 'franciscan_get_option' ) 
            ? franciscan_get_option( 'receiving_email', get_option( 'admin_email' ) ) 
            : get_option( 'admin_email' );

        $to = sanitize_email( $receiving_email );
        if ( is_email( $to ) ) {
            $host = isset( $_SERVER['HTTP_HOST'] ) ? preg_replace( '/[^a-zA-Z0-9.-]/', '', $_SERVER['HTTP_HOST'] ) : 'franciscansociety.org';
            $headers = array(
                'Content-Type: text/html; charset=UTF-8',
                'From: ' . wp_strip_all_tags( get_bloginfo( 'name' ) ) . ' <no-reply@' . $host . '>',
                'Reply-To: ' . $clean_name . ' <' . $clean_email . '>',
            );

            $email_subject = 'New Inquiry: ' . $clean_subject;
            $body = '<h2>New Contact Form Inquiry</h2>'
                  . '<p><strong>Name:</strong> ' . esc_html( $clean_name ) . '</p>'
                  . '<p><strong>Email:</strong> ' . esc_html( $clean_email ) . '</p>'
                  . '<p><strong>Phone:</strong> ' . esc_html( $clean_phone ?: 'Not provided' ) . '</p>'
                  . '<p><strong>Subject:</strong> ' . esc_html( $clean_subject ) . '</p>'
                  . '<p><strong>Message:</strong><br>' . nl2br( esc_html( $clean_message ) ) . '</p>'
                  . '<hr><p><small>Submitted from ' . esc_html( home_url( '/' ) ) . ' on ' . esc_html( current_time( 'r' ) ) . '</small></p>';

            @wp_mail( $to, $email_subject, $body, $headers );
        }

        wp_send_json_success( array(
            'message' => 'Thank you! Your message has been received. Our friars will respond within 24–48 hours. Peace and Good.'
        ) );
    } else {
        wp_send_json_error( array( 'message' => 'An error occurred while saving your inquiry. Please try again later.' ) );
    }
}
add_action( 'wp_ajax_franciscan_submit_contact', 'franciscan_ajax_contact' );
add_action( 'wp_ajax_nopriv_franciscan_submit_contact', 'franciscan_ajax_contact' );
add_action( 'wp_ajax_franciscan_contact_form', 'franciscan_ajax_contact' );
add_action( 'wp_ajax_nopriv_franciscan_contact_form', 'franciscan_ajax_contact' );

/**
 * 2. Prayer Request AJAX Handler
 */
function franciscan_ajax_prayer() {
    if ( ! franciscan_verify_request_nonce() ) {
        wp_send_json_error( array( 'message' => 'Security token expired. Please refresh the page and retry.' ), 403 );
    }

    if ( ! empty( $_POST['website_hp'] ) ) {
        wp_send_json_success( array( 'message' => 'Your prayer intention has been received. Peace and Good.' ) );
    }

    $raw_name       = isset( $_POST['name'] ) ? trim( (string) $_POST['name'] ) : 'Anonymous Devotee';
    $raw_email      = isset( $_POST['email'] ) ? trim( (string) $_POST['email'] ) : '';
    $raw_phone      = isset( $_POST['phone'] ) ? trim( (string) $_POST['phone'] ) : '';
    $raw_intentions = isset( $_POST['intentions'] ) ? trim( (string) $_POST['intentions'] ) : '';

    if ( franciscan_contains_html_or_script( $raw_name ) ||
         franciscan_contains_html_or_script( $raw_intentions ) ||
         franciscan_contains_html_or_script( $raw_phone ) ) {
        wp_send_json_error( array(
            'message' => 'HTML tags, scripts, and code injections are strictly prohibited. Please submit plain text only.'
        ), 400 );
    }

    if ( ! franciscan_check_rate_limit( 'prayer', 20, 300 ) ) {
        wp_send_json_error( array( 'message' => 'Too many prayer submissions received recently. Please wait a few moments.' ), 429 );
    }

    $clean_name       = preg_replace( '/[\r\n]+/', ' ', sanitize_text_field( $raw_name ) );
    $clean_email      = preg_replace( '/[\r\n]+/', '', sanitize_email( $raw_email ) );
    $clean_phone      = preg_replace( '/[\r\n]+/', '', sanitize_text_field( $raw_phone ) );
    $clean_intentions = sanitize_textarea_field( $raw_intentions );

    if ( empty( $clean_intentions ) || mb_strlen( $clean_intentions ) < 5 ) {
        wp_send_json_error( array( 'message' => 'Please provide your prayer intention details.' ) );
    }

    $post_title = sprintf( 'Prayer Request: %s (%s)', $clean_name, current_time( 'd-m-Y H:i' ) );
    $post_id = wp_insert_post( array(
        'post_type'    => 'franciscan_inquiry',
        'post_title'   => sanitize_text_field( $post_title ),
        'post_content' => $clean_intentions,
        'post_status'  => 'publish',
    ) );

    if ( $post_id && ! is_wp_error( $post_id ) ) {
        update_post_meta( $post_id, '_inquiry_type', 'Prayer Request' );
        update_post_meta( $post_id, '_inquiry_name', $clean_name );
        update_post_meta( $post_id, '_inquiry_email', $clean_email );
        update_post_meta( $post_id, '_inquiry_phone', $clean_phone );
        update_post_meta( $post_id, '_inquiry_ip', franciscan_get_client_ip() );
        update_post_meta( $post_id, '_inquiry_date', current_time( 'mysql' ) );

        wp_send_json_success( array(
            'message' => 'Your prayer request has been received. Our friars will remember your intention in our daily community Holy Mass and Liturgy of the Hours.'
        ) );
    } else {
        wp_send_json_error( array( 'message' => 'Failed to submit prayer request. Please try again.' ) );
    }
}
add_action( 'wp_ajax_franciscan_submit_prayer', 'franciscan_ajax_prayer' );
add_action( 'wp_ajax_nopriv_franciscan_submit_prayer', 'franciscan_ajax_prayer' );

/**
 * 3. Mass Intention AJAX Handler
 */
function franciscan_ajax_mass_intention() {
    if ( ! franciscan_verify_request_nonce() ) {
        wp_send_json_error( array( 'message' => 'Security token expired. Please refresh the page and retry.' ), 403 );
    }

    if ( ! empty( $_POST['website_hp'] ) ) {
        wp_send_json_success( array( 'message' => 'Your Mass Intention has been received. Peace and Good.' ) );
    }

    $raw_name      = isset( $_POST['name'] ) ? trim( (string) $_POST['name'] ) : '';
    $raw_email     = isset( $_POST['email'] ) ? trim( (string) $_POST['email'] ) : '';
    $raw_phone     = isset( $_POST['phone'] ) ? trim( (string) $_POST['phone'] ) : '';
    $raw_intention = isset( $_POST['intention'] ) ? trim( (string) $_POST['intention'] ) : '';
    $raw_mass_type = isset( $_POST['mass_type'] ) ? trim( (string) $_POST['mass_type'] ) : 'Thanksgiving';
    $raw_mass_date = isset( $_POST['mass_date'] ) ? trim( (string) $_POST['mass_date'] ) : '';

    if ( franciscan_contains_html_or_script( $raw_name ) ||
         franciscan_contains_html_or_script( $raw_intention ) ||
         franciscan_contains_html_or_script( $raw_phone ) ||
         franciscan_contains_html_or_script( $raw_mass_type ) ) {
        wp_send_json_error( array(
            'message' => 'HTML tags, scripts, and code injections are strictly prohibited. Please submit plain text only.'
        ), 400 );
    }

    if ( ! franciscan_check_rate_limit( 'mass', 20, 300 ) ) {
        wp_send_json_error( array( 'message' => 'Too many Mass intention requests received recently. Please wait a few moments.' ), 429 );
    }

    $clean_name      = preg_replace( '/[\r\n]+/', ' ', sanitize_text_field( $raw_name ) );
    $clean_email     = preg_replace( '/[\r\n]+/', '', sanitize_email( $raw_email ) );
    $clean_phone     = preg_replace( '/[\r\n]+/', '', sanitize_text_field( $raw_phone ) );
    $clean_intention = sanitize_textarea_field( $raw_intention );
    $clean_mass_type = sanitize_text_field( $raw_mass_type );
    $clean_mass_date = sanitize_text_field( $raw_mass_date );

    if ( empty( $clean_name ) || mb_strlen( $clean_name ) < 2 ) {
        wp_send_json_error( array( 'message' => 'Please provide your full name for the Holy Mass Intention.' ) );
    }

    if ( empty( $clean_intention ) || mb_strlen( $clean_intention ) < 5 ) {
        wp_send_json_error( array( 'message' => 'Please provide the intention description.' ) );
    }

    if ( ! empty( $clean_mass_date ) && ! preg_match( '/^\d{4}-\d{2}-\d{2}$/', $clean_mass_date ) ) {
        $clean_mass_date = '';
    }

    $post_title = sprintf( 'Mass Intention (%s): %s (%s)', $clean_mass_type, $clean_name, current_time( 'd-m-Y H:i' ) );
    $post_id = wp_insert_post( array(
        'post_type'    => 'franciscan_inquiry',
        'post_title'   => sanitize_text_field( $post_title ),
        'post_content' => $clean_intention,
        'post_status'  => 'publish',
    ) );

    if ( $post_id && ! is_wp_error( $post_id ) ) {
        update_post_meta( $post_id, '_inquiry_type', 'Mass Intention' );
        update_post_meta( $post_id, '_inquiry_name', $clean_name );
        update_post_meta( $post_id, '_inquiry_email', $clean_email );
        update_post_meta( $post_id, '_inquiry_phone', $clean_phone );
        update_post_meta( $post_id, '_inquiry_mass_type', $clean_mass_type );
        update_post_meta( $post_id, '_inquiry_mass_date', $clean_mass_date );
        update_post_meta( $post_id, '_inquiry_ip', franciscan_get_client_ip() );
        update_post_meta( $post_id, '_inquiry_date', current_time( 'mysql' ) );

        wp_send_json_success( array(
            'message' => 'Holy Mass intention submitted successfully. Our Provincial Procurator and friars will offer this Holy Sacrifice of the Mass.'
        ) );
    } else {
        wp_send_json_error( array( 'message' => 'Failed to submit Holy Mass intention. Please try again.' ) );
    }
}
add_action( 'wp_ajax_franciscan_submit_mass_intention', 'franciscan_ajax_mass_intention' );
add_action( 'wp_ajax_nopriv_franciscan_submit_mass_intention', 'franciscan_ajax_mass_intention' );
