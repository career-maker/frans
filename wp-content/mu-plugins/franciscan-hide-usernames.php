<?php
/**
 * Plugin Name: Franciscan - Hide Usernames
 * Description: Keeps WordPress login names private from visitors who are not logged in. A must-use plugin, so it
 *              stays active whichever theme is running (main site or coming-soon page).
 * Version:     1.0.0
 *
 * WordPress publishes every author's login name (the "slug") in several places. All of them are closed for
 * anonymous visitors; logged-in users (editors, the block editor, the dashboard) are not affected.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 1. REST API: /wp-json/wp/v2/users, /users/1, ?rest_route=/wp/v2/users and the author data that
 *    ?_embed adds to posts all answer "no route" (404) for anonymous requests.
 */
add_filter(
	'rest_endpoints',
	function ( $endpoints ) {
		if ( is_user_logged_in() ) {
			return $endpoints;
		}
		foreach ( array_keys( $endpoints ) as $route ) {
			if ( 0 === strpos( $route, '/wp/v2/users' ) ) {
				unset( $endpoints[ $route ] );
			}
		}
		return $endpoints;
	}
);

/**
 * 2. Author archives and ?author=1 (which WordPress redirects to /author/<login>/).
 */
add_action(
	'template_redirect',
	function () {
		if ( is_user_logged_in() ) {
			return;
		}
		if ( is_author() || isset( $_GET['author'] ) || isset( $_GET['author_name'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
			wp_safe_redirect( home_url( '/' ), 301 );
			exit;
		}
	},
	0
);

/**
 * 3. The XML sitemap of author archives (wp-sitemap-users-1.xml).
 */
add_filter(
	'wp_sitemaps_add_provider',
	function ( $provider, $name ) {
		return 'users' === $name ? false : $provider;
	},
	10,
	2
);

/**
 * 4. oEmbed responses (/wp-json/oembed/1.0/embed) include author_name and an author archive URL.
 */
add_filter(
	'oembed_response_data',
	function ( $data ) {
		unset( $data['author_name'], $data['author_url'] );
		return $data;
	}
);

/**
 * 5. Login form: one message for a wrong username and a wrong password, so it cannot be used to test names.
 */
add_filter(
	'login_errors',
	function () {
		return 'The username or password you entered is incorrect.';
	}
);
