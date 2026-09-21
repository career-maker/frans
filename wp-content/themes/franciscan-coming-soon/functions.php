<?php
/**
 * Franciscan Coming Soon - theme functions.
 *
 * @package Franciscan_Coming_Soon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'FCS_VERSION', '1.0.0' );

/**
 * Default copy and contact details. Every value can be changed under
 * Appearance > Customize > Coming Soon Page.
 */
function fcs_defaults() {
	return array(
		'org'       => 'Franciscan Friars of the Third Order Regular',
		'kicker'    => 'Pax et Bonum',
		'headline'  => 'Coming Soon',
		'subhead'   => 'Our new home on the web is being prepared.',
		'message'   => 'The Franciscan Friars of the Third Order Regular, Province of St Francis of Assisi, Ranchi, are preparing a place to share their prayer, fraternity and service with you. Please visit again soon.',
		'launch'    => '',
		'quote'     => '“Let us begin, brothers, to serve the Lord God, for up to now we have done little or nothing.”',
		'quote_by'  => 'St. Francis of Assisi',
		'email'     => 'sectorranchi09@gmail.com',
		'phone'     => '+91 95726 35314',
		'location'  => 'Harmu Housing Colony, Ranchi, Jharkhand',
		'facebook'  => 'https://www.facebook.com/profile.php?id=61593681501900',
		'instagram' => 'https://www.instagram.com/torranchiprovince/',
		'youtube'   => 'https://youtube.com/@tormediaranchi3804',
		'whatsapp'  => '919572635314',
		'send_503'  => true,
	);
}

/** Theme mod with the default above as fallback. */
function fcs_mod( $key ) {
	$defaults = fcs_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'fcs_' . $key, $default );
}

/* ------------------------------------------------------------------ setup */

function fcs_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'fcs_setup' );

// The admin bar would push the single screen out of the viewport.
add_filter( 'show_admin_bar', '__return_false' );

// Keep <head> minimal.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'classic-theme-styles' );
		wp_dequeue_style( 'global-styles' );
	},
	100
);

function fcs_document_title() {
	return wp_strip_all_tags( fcs_mod( 'headline' ) ) . ' | ' . wp_strip_all_tags( fcs_mod( 'org' ) );
}
add_filter( 'pre_get_document_title', 'fcs_document_title' );

/** Every URL shows the same page, and none of it should be indexed while the site is not ready. */
add_filter(
	'wp_robots',
	function ( $robots ) {
		$robots['noindex']  = true;
		$robots['nofollow'] = true;
		unset( $robots['max-image-preview'] );
		return $robots;
	}
);

/** 503 "temporarily unavailable" tells search engines to come back later instead of indexing the placeholder. */
function fcs_send_headers() {
	if ( is_customize_preview() ) {
		return;
	}
	header( 'X-Robots-Tag: noindex, nofollow', true );
	if ( fcs_mod( 'send_503' ) ) {
		status_header( 503 );
		header( 'Retry-After: 86400' );
		nocache_headers();
	}
}
add_action( 'template_redirect', 'fcs_send_headers', 1 );

/* ---------------------------------------------------------------- assets */

function fcs_assets() {
	wp_enqueue_style( 'fcs-style', get_stylesheet_uri(), array(), FCS_VERSION );
	wp_enqueue_script( 'fcs-script', get_theme_file_uri( 'assets/js/coming-soon.js' ), array(), FCS_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );
}
add_action( 'wp_enqueue_scripts', 'fcs_assets' );

/** Fetch the two fonts the headline and body use right away. */
function fcs_preload_fonts() {
	foreach ( array( 'phudu-normal-400-900-latin.woff2', 'instrument-sans-normal-400-700-latin.woff2' ) as $font ) {
		printf( '<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n", esc_url( get_theme_file_uri( 'assets/fonts/' . $font ) ) );
	}
}
add_action( 'wp_head', 'fcs_preload_fonts', 1 );

function fcs_meta() {
	echo '<meta name="theme-color" content="#120a06">' . "\n";
	echo '<meta name="color-scheme" content="dark">' . "\n";
}
add_action( 'wp_head', 'fcs_meta', 1 );

/* ------------------------------------------------------------- customizer */

function fcs_sanitize_launch( $value ) {
	return preg_match( '/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', (string) $value ) ? $value : '';
}

function fcs_customize_register( $wp_customize ) {
	$d = fcs_defaults();

	$wp_customize->add_section(
		'fcs_section',
		array(
			'title'       => __( 'Coming Soon Page', 'franciscan-coming-soon' ),
			'priority'    => 30,
			'description' => __( 'Text, launch countdown and contact details shown on the coming soon screen.', 'franciscan-coming-soon' ),
		)
	);

	$fields = array(
		'org'       => array( __( 'Organisation name (small line)', 'franciscan-coming-soon' ), 'text', 'sanitize_text_field' ),
		'kicker'    => array( __( 'Greeting above the title', 'franciscan-coming-soon' ), 'text', 'sanitize_text_field' ),
		'headline'  => array( __( 'Title', 'franciscan-coming-soon' ), 'text', 'sanitize_text_field' ),
		'subhead'   => array( __( 'Sub-title', 'franciscan-coming-soon' ), 'text', 'sanitize_text_field' ),
		'message'   => array( __( 'Message', 'franciscan-coming-soon' ), 'textarea', 'sanitize_textarea_field' ),
		'launch'    => array( __( 'Launch date and time (leave empty for no countdown)', 'franciscan-coming-soon' ), 'datetime-local', 'fcs_sanitize_launch' ),
		'quote'     => array( __( 'Quote', 'franciscan-coming-soon' ), 'textarea', 'sanitize_textarea_field' ),
		'quote_by'  => array( __( 'Quote author', 'franciscan-coming-soon' ), 'text', 'sanitize_text_field' ),
		'email'     => array( __( 'Email', 'franciscan-coming-soon' ), 'email', 'sanitize_email' ),
		'phone'     => array( __( 'Phone', 'franciscan-coming-soon' ), 'text', 'sanitize_text_field' ),
		'location'  => array( __( 'Location', 'franciscan-coming-soon' ), 'text', 'sanitize_text_field' ),
		'facebook'  => array( __( 'Facebook URL', 'franciscan-coming-soon' ), 'url', 'esc_url_raw' ),
		'instagram' => array( __( 'Instagram URL', 'franciscan-coming-soon' ), 'url', 'esc_url_raw' ),
		'youtube'   => array( __( 'YouTube URL', 'franciscan-coming-soon' ), 'url', 'esc_url_raw' ),
		'whatsapp'  => array( __( 'WhatsApp number (digits with country code)', 'franciscan-coming-soon' ), 'text', 'sanitize_text_field' ),
	);

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			'fcs_' . $key,
			array(
				'default'           => $d[ $key ],
				'sanitize_callback' => $field[2],
			)
		);
		$wp_customize->add_control(
			'fcs_' . $key,
			array(
				'label'   => $field[0],
				'section' => 'fcs_section',
				'type'    => $field[1],
			)
		);
	}

	$wp_customize->add_setting(
		'fcs_send_503',
		array(
			'default'           => $d['send_503'],
			'sanitize_callback' => 'rest_sanitize_boolean',
		)
	);
	$wp_customize->add_control(
		'fcs_send_503',
		array(
			'label'       => __( 'Tell search engines the site is temporarily unavailable (HTTP 503, recommended)', 'franciscan-coming-soon' ),
			'description' => __( 'Keeps this placeholder out of Google. Untick only if you want the page to answer with a normal 200 status.', 'franciscan-coming-soon' ),
			'section'     => 'fcs_section',
			'type'        => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'fcs_customize_register' );

/** Launch moment as a Unix timestamp in the site's timezone, or 0 when unset / already past. */
function fcs_launch_timestamp() {
	$raw = fcs_mod( 'launch' );
	if ( '' === $raw ) {
		return 0;
	}
	try {
		$date = new DateTimeImmutable( str_replace( 'T', ' ', $raw ), wp_timezone() );
	} catch ( Exception $e ) {
		return 0;
	}
	return $date->getTimestamp() > time() ? $date->getTimestamp() : 0;
}
