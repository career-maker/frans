<?php
/**
 * Franciscan Society Theme Functions
 *
 * @package Franciscan_Society
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'FRANCISCAN_THEME_VERSION', '1.0.0' );
define( 'FRANCISCAN_THEME_DIR', get_template_directory() );
define( 'FRANCISCAN_THEME_URI', get_template_directory_uri() );

// Require modular components
require_once FRANCISCAN_THEME_DIR . '/inc/security.php';
require_once FRANCISCAN_THEME_DIR . '/inc/setup.php';
require_once FRANCISCAN_THEME_DIR . '/inc/options-manager.php';
require_once FRANCISCAN_THEME_DIR . '/inc/post-types.php';
require_once FRANCISCAN_THEME_DIR . '/inc/seo-engine.php';
require_once FRANCISCAN_THEME_DIR . '/inc/form-handlers.php';
require_once FRANCISCAN_THEME_DIR . '/inc/custom-dashboard.php';
