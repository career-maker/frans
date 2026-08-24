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

        // 8. Instantaneous Response + Background Email Notification
        $receiving_email = function_exists( 'franciscan_get_option' ) 
            ? franciscan_get_option( 'receiving_email', franciscan_get_option( 'smtp_recipient_email', 'abbhiram@intersmart.in' ) ) 
            : 'abbhiram@intersmart.in';

        $to = sanitize_email( $receiving_email );
        $email_subject = '✞ New Contact Inquiry: ' . $clean_subject . ' (' . $clean_name . ')';
        $host = isset( $_SERVER['HTTP_HOST'] ) ? preg_replace( '/[^a-zA-Z0-9.-]/', '', $_SERVER['HTTP_HOST'] ) : 'franciscansociety.org';
        $from_name = function_exists( 'franciscan_get_option' ) ? franciscan_get_option( 'smtp_from_name', 'Franciscan Society Ranchi Province' ) : 'Franciscan Society Ranchi Province';
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . wp_strip_all_tags( $from_name ) . ' <no-reply@' . $host . '>',
            'Reply-To: ' . $clean_name . ' <' . $clean_email . '>',
        );

        $html_body = franciscan_render_christian_email_html( array(
            'title'           => 'New Contact Form Inquiry',
            'subtitle'        => 'Province of St. Francis of Assisi, Ranchi • Official Portal',
            'badge'           => 'GENERAL INQUIRY',
            'fields'          => array(
                'Full Name'     => esc_html( $clean_name ),
                'Email Address' => '<a href="mailto:' . esc_attr( $clean_email ) . '" style="color:#4A2A18;font-weight:700;text-decoration:none;">' . esc_html( $clean_email ) . '</a>',
                'Phone Number'  => ! empty( $clean_phone ) ? '<a href="tel:' . esc_attr( preg_replace('/[^0-9+]/', '', $clean_phone) ) . '" style="color:#4A2A18;font-weight:700;text-decoration:none;">' . esc_html( $clean_phone ) . '</a>' : '<em>Not provided</em>',
                'Subject'       => esc_html( $clean_subject ),
                'Date & Time'   => esc_html( current_time( 'd M Y, h:i A' ) ),
                'Client IP'     => esc_html( franciscan_get_client_ip() ),
            ),
            'message_heading' => 'Inquiry / Prayer Request Message',
            'message'         => $clean_message,
        ) );

        franciscan_send_instant_success_and_email(
            array( 'message' => 'Thank you! Your message has been received. Our friars will respond within 24–48 hours. Peace and Good.' ),
            $to,
            $email_subject,
            $html_body,
            $headers
        );
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

        // Instant Response + Background Email Notification
        $receiving_email = function_exists( 'franciscan_get_option' ) 
            ? franciscan_get_option( 'receiving_email', franciscan_get_option( 'smtp_recipient_email', 'abbhiram@intersmart.in' ) ) 
            : 'abbhiram@intersmart.in';

        $to = sanitize_email( $receiving_email );
        $email_subject = '🕊️ New Prayer Request: ' . $clean_name;
        $host = isset( $_SERVER['HTTP_HOST'] ) ? preg_replace( '/[^a-zA-Z0-9.-]/', '', $_SERVER['HTTP_HOST'] ) : 'franciscansociety.org';
        $from_name = function_exists( 'franciscan_get_option' ) ? franciscan_get_option( 'smtp_from_name', 'Franciscan Society Ranchi Province' ) : 'Franciscan Society Ranchi Province';
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . wp_strip_all_tags( $from_name ) . ' <no-reply@' . $host . '>',
            'Reply-To: ' . ( ! empty( $clean_email ) ? $clean_name . ' <' . $clean_email . '>' : 'no-reply@' . $host ),
        );

        $html_body = franciscan_render_christian_email_html( array(
            'title'           => 'New Holy Prayer Intention',
            'subtitle'        => 'Province of St. Francis of Assisi, Ranchi • Intercessory Ministry',
            'badge'           => 'PRAYER INTENTION',
            'fields'          => array(
                'Devotee Name'  => esc_html( $clean_name ),
                'Email Address' => ! empty( $clean_email ) ? '<a href="mailto:' . esc_attr( $clean_email ) . '" style="color:#4A2A18;font-weight:700;text-decoration:none;">' . esc_html( $clean_email ) . '</a>' : '<em>Anonymous</em>',
                'Phone Number'  => ! empty( $clean_phone ) ? esc_html( $clean_phone ) : '<em>Not provided</em>',
                'Type'          => 'Community Daily Prayer & Mass Intercession',
                'Date & Time'   => esc_html( current_time( 'd M Y, h:i A' ) ),
            ),
            'message_heading' => 'Holy Prayer Intention',
            'message'         => $clean_intentions,
        ) );

        franciscan_send_instant_success_and_email(
            array( 'message' => 'Your prayer request has been received. Our friars will remember your intention in our daily community Holy Mass and Liturgy of the Hours.' ),
            $to,
            $email_subject,
            $html_body,
            $headers
        );
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

        // Instant Response + Background Email Notification
        $receiving_email = function_exists( 'franciscan_get_option' ) 
            ? franciscan_get_option( 'receiving_email', franciscan_get_option( 'smtp_recipient_email', 'abbhiram@intersmart.in' ) ) 
            : 'abbhiram@intersmart.in';

        $to = sanitize_email( $receiving_email );
        $email_subject = '⛪ New Holy Mass Intention: ' . $clean_mass_type . ' (' . $clean_name . ')';
        $host = isset( $_SERVER['HTTP_HOST'] ) ? preg_replace( '/[^a-zA-Z0-9.-]/', '', $_SERVER['HTTP_HOST'] ) : 'franciscansociety.org';
        $from_name = function_exists( 'franciscan_get_option' ) ? franciscan_get_option( 'smtp_from_name', 'Franciscan Society Ranchi Province' ) : 'Franciscan Society Ranchi Province';
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . wp_strip_all_tags( $from_name ) . ' <no-reply@' . $host . '>',
            'Reply-To: ' . ( ! empty( $clean_email ) ? $clean_name . ' <' . $clean_email . '>' : 'no-reply@' . $host ),
        );

        $html_body = franciscan_render_christian_email_html( array(
            'title'           => 'New Holy Mass Intention',
            'subtitle'        => 'Province of St. Francis of Assisi, Ranchi • Holy Eucharist Ministry',
            'badge'           => 'HOLY MASS OFFERING',
            'fields'          => array(
                'Petitioner Name'  => esc_html( $clean_name ),
                'Email Address'    => ! empty( $clean_email ) ? '<a href="mailto:' . esc_attr( $clean_email ) . '" style="color:#4A2A18;font-weight:700;text-decoration:none;">' . esc_html( $clean_email ) . '</a>' : '<em>Not provided</em>',
                'Phone Number'     => ! empty( $clean_phone ) ? esc_html( $clean_phone ) : '<em>Not provided</em>',
                'Mass Purpose'     => esc_html( $clean_mass_type ),
                'Preferred Date'   => ! empty( $clean_mass_date ) ? esc_html( date( 'd M Y', strtotime( $clean_mass_date ) ) ) : '<em>Next available Holy Mass</em>',
                'Date & Time'      => esc_html( current_time( 'd M Y, h:i A' ) ),
            ),
            'message_heading' => 'Intention Description & Prayer',
            'message'         => $clean_intention,
        ) );

        franciscan_send_instant_success_and_email(
            array( 'message' => 'Holy Mass intention submitted successfully. Our Provincial Procurator and friars will offer this Holy Sacrifice of the Mass.' ),
            $to,
            $email_subject,
            $html_body,
            $headers
        );
    } else {
        wp_send_json_error( array( 'message' => 'Failed to submit Holy Mass intention. Please try again.' ) );
    }
}
add_action( 'wp_ajax_franciscan_submit_mass_intention', 'franciscan_ajax_mass_intention' );
add_action( 'wp_ajax_nopriv_franciscan_submit_mass_intention', 'franciscan_ajax_mass_intention' );

/**
 * Ultra-fast JSON response flusher with background email dispatch
 */
function franciscan_send_instant_success_and_email( $response_data, $to, $subject, $body, $headers ) {
    if ( function_exists( 'fastcgi_finish_request' ) ) {
        @header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset', 'UTF-8' ) );
        echo wp_json_encode( array(
            'success' => true,
            'data'    => $response_data,
        ) );
        if ( function_exists( 'ob_flush' ) && ob_get_length() ) {
            @ob_flush();
        }
        @flush();
        @fastcgi_finish_request(); // Flushes 200 OK instantly to browser (< 100ms)

        // Background asynchronous email delivery (zero waiting time for the user):
        if ( is_email( $to ) ) {
            @wp_mail( $to, $subject, $body, $headers );
        }
        exit;
    } else {
        if ( is_email( $to ) ) {
            @wp_mail( $to, $subject, $body, $headers );
        }
        wp_send_json_success( $response_data );
    }
}

/**
 * Render a beautiful, responsive Christian & Franciscan themed HTML email template
 */
function franciscan_render_christian_email_html( $args ) {
    $title           = $args['title'] ?? 'New Website Submission';
    $subtitle        = $args['subtitle'] ?? 'Province of St. Francis of Assisi, Ranchi • Third Order Regular';
    $badge           = $args['badge'] ?? 'PAX ET BONUM';
    $fields          = $args['fields'] ?? array();
    $message_heading = $args['message_heading'] ?? 'Message Details';
    $message         = $args['message'] ?? '';
    $site_url        = home_url( '/' );
    $site_name       = get_bloginfo( 'name' );
    $admin_url       = admin_url( 'admin.php?page=franciscan-studio&tab=inquiries' );
    $current_date    = current_time( 'F j, Y, g:i a' );

    ob_start();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo esc_html( $title ); ?></title>
    </head>
    <body style="margin: 0; padding: 0; background-color: #f4f1ea; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #2A1610; -webkit-font-smoothing: antialiased;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f4f1ea; padding: 30px 15px;">
            <tr>
                <td align="center">
                    <!-- Main Container Card -->
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 620px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 35px rgba(42, 22, 16, 0.09); border: 1px solid #e7dfd5;">
                        
                        <!-- Header Banner -->
                        <tr>
                            <td align="center" style="background: linear-gradient(135deg, #2A1610 0%, #4A2A18 100%); padding: 36px 25px 30px 25px; text-align: center; border-bottom: 3px solid #D4AF37;">
                                <div style="display: inline-block; width: 44px; height: 44px; line-height: 44px; border-radius: 50%; background-color: rgba(212, 175, 55, 0.18); border: 1.5px solid #D4AF37; color: #D4AF37; font-size: 22px; font-weight: bold; margin-bottom: 12px;">&#10013;</div>
                                <div style="color: #D4AF37; font-size: 11px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 6px; font-family: 'Arial', sans-serif;">
                                    &#9679; <?php echo esc_html( $badge ); ?> &#9679;
                                </div>
                                <h1 style="color: #ffffff; font-size: 22px; font-weight: 700; margin: 0 0 6px 0; text-transform: uppercase; letter-spacing: 0.5px; line-height: 1.3;">
                                    <?php echo esc_html( $title ); ?>
                                </h1>
                                <p style="color: #e0d6cb; font-size: 12px; margin: 0; line-height: 1.4; opacity: 0.9;">
                                    <?php echo esc_html( $subtitle ); ?>
                                </p>
                            </td>
                        </tr>

                        <!-- Content Body -->
                        <tr>
                            <td style="padding: 32px 30px 25px 30px; background-color: #ffffff;">
                                
                                <p style="font-size: 14px; color: #57534e; margin: 0 0 20px 0; line-height: 1.6;">
                                    A new spiritual request / inquiry has been submitted through the official portal. Here are the complete details:
                                </p>

                                <!-- Details Table -->
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #FAF8F5; border-radius: 12px; border: 1px solid #ece4d8; margin-bottom: 24px; overflow: hidden;">
                                    <?php foreach ( $fields as $label => $value ) : ?>
                                    <tr>
                                        <td width="35%" style="padding: 12px 16px; font-size: 13px; font-weight: 700; color: #4A2A18; border-bottom: 1px solid #eee7dd; text-transform: uppercase; letter-spacing: 0.5px;">
                                            <?php echo esc_html( $label ); ?>
                                        </td>
                                        <td width="65%" style="padding: 12px 16px; font-size: 14px; color: #1c1917; border-bottom: 1px solid #eee7dd; font-weight: 500;">
                                            <?php echo wp_kses_post( $value ); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>

                                <!-- Message Box if present -->
                                <?php if ( ! empty( $message ) ) : ?>
                                <div style="margin-bottom: 26px;">
                                    <div style="font-size: 12px; font-weight: 800; text-transform: uppercase; color: #4A2A18; letter-spacing: 1px; margin-bottom: 8px;">
                                        &#9993; <?php echo esc_html( $message_heading ); ?>:
                                    </div>
                                    <div style="background-color: #FAF8F5; border-left: 4px solid #D4AF37; padding: 16px 18px; border-radius: 0 10px 10px 0; font-size: 14px; color: #2b2826; line-height: 1.7; font-style: italic;">
                                        <?php echo nl2br( esc_html( $message ) ); ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- CTA Button to Franciscan Studio -->
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 24px;">
                                    <tr>
                                        <td align="center">
                                            <a href="<?php echo esc_url( $admin_url ); ?>" style="display: inline-block; background-color: #4A2A18; color: #ffffff; text-decoration: none; padding: 13px 28px; border-radius: 50px; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; box-shadow: 0 4px 14px rgba(74, 42, 24, 0.25);">
                                                View in Franciscan Studio &rarr;
                                            </a>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                        <!-- Franciscan Blessing Footer -->
                        <tr>
                            <td style="background-color: #FAF8F5; padding: 24px 30px; text-align: center; border-top: 1px solid #ece4d8;">
                                <p style="font-size: 13px; font-style: italic; color: #78716c; line-height: 1.6; margin: 0 0 10px 0;">
                                    &ldquo;The Lord bless you and keep you; The Lord make His face shine upon you and be gracious unto you; The Lord lift up His countenance upon you, and give you peace.&rdquo;
                                    <br><strong style="font-style: normal; color: #4A2A18; font-size: 11px;">— Numbers 6:24-26</strong>
                                </p>
                                <hr style="border: none; border-top: 1px solid #e7dfd5; margin: 14px auto; max-width: 200px;">
                                <p style="font-size: 11px; color: #a8a29e; margin: 0; text-transform: uppercase; letter-spacing: 0.5px;">
                                    Franciscan Society Ranchi Province • <a href="<?php echo esc_url( $site_url ); ?>" style="color: #4A2A18; text-decoration: none; font-weight: 700;"><?php echo esc_html( $site_name ); ?></a>
                                </p>
                                <p style="font-size: 10px; color: #c4b5a5; margin: 6px 0 0 0;">
                                    Received on <?php echo esc_html( $current_date ); ?>
                                </p>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>
    <?php
    return ob_get_clean();
}
