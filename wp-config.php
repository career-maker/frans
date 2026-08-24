<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'H.nm8=r=aY)RyzHKy]9-33>kjKiiy@-eV4K^ZV,5O3iJ>8q[9Y,-WZlgw4@U@>7*' );
define( 'SECURE_AUTH_KEY',   'EWw:m/T?s K]X:MB&&lcNJf~v+G5*@F0j@4Td}k{rV{_e1*9z-Pyg-*q/<t8P5E{' );
define( 'LOGGED_IN_KEY',     'q7[^]#tKF(:0dD,UW2t_au:YfocTh58/ >T:`Fhzg0Hr#pdH~pa!?|*3SzW.i+R@' );
define( 'NONCE_KEY',         'fpG1oSdLufJHSnQGJwTTN/QocM?4sCXQ}f+S+buRlFs_*?}ja(iV<7[Yol2>;|[3' );
define( 'AUTH_SALT',         'nzGbu)7![k%rp*GC-2GwB1FZ3Hw>,};-`60T}x+6jL-:( 1R8e|*UJS%tU[ey-(f' );
define( 'SECURE_AUTH_SALT',  '?Eb(]aG`%HpfPixCadkSxr!5gv>!yCY<u22G=ZHBr ?_)`J[bLbN+EnCdbfSqqRb' );
define( 'LOGGED_IN_SALT',    'w{`W <#`AiFB;RjWBks>aX|`{TzwhKPZm%WCeS,FmS=-HXDVP4Oc$s9RU,r!3Sr<' );
define( 'NONCE_SALT',        'D(@>L:nI82_o+:Q;nN?}E-3-zdgQ~wx1%ZS 3@3+rhZ$ZvX[}dwU/qMU#r<brpbr' );
define( 'WP_CACHE_KEY_SALT', 'jGuAR9%?#XFZ/RfD<~XDw:WC9eTf)N)(7p88LyVc9st4{%woyR&(W2.pPkqd1DHq' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
