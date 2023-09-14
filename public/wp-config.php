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


define('AUTH_KEY',         'gQRIsqA0Ffks6mHuEp2hyzUIdOZOBRiW7S1lwsEjyA1n7i80QK9G87ZzB4WUG0K+7o4VuIQoJRZI7oFXTmda2Q==');
define('SECURE_AUTH_KEY',  'gDIRTtga7g07zbcx72/TuqswRu0s3jEH1CmLGxBRDgy7L3I31QqTTsUqBIOXBSqJBX37WalM9B39/L4Ia5bozw==');
define('LOGGED_IN_KEY',    'xHUf6IYcmARR/iE1G/ODYg93wirJz3ttX1KKXIM3/aF/f1kxkFdO4gPFIyh4kV2BULPpymTjbJzJnMN6F/HjTA==');
define('NONCE_KEY',        'v7nm4cRahGLRmtXJqayKDsz64swHiWynqSJdKZzP7IJidtm17/o7g9SX60cYWWpJ3HVHHaVA70bjsgdIfq8+ng==');
define('AUTH_SALT',        'IyXLM8JSoKNqgNAwxdESsRgr8cebMCToCzH2XCD0H2884efJRufpKZ/5sSoJ6ExgnW8XsudMgZDrbFgD1DUESQ==');
define('SECURE_AUTH_SALT', 'gr8R7EhozDGHdT5aLEP4iyW2/r81XgB/QQEBm+b7oZV4kTdab6X1tYQqqW9tTYnN+W0iserQV6f/5E86PZWs+w==');
define('LOGGED_IN_SALT',   '5+0hMsL3fIHUAgK/IVygoonqvaE57mZCxWILkWGz9LHufXqhjuhqyJ4I7fAa5p3vIhNarLtjTjBy15CuxZ9e7g==');
define('NONCE_SALT',       'uGLpBmsMzMrOItr9Vomo1cU7AuCSuJ2Nj8kRslwLWSR92lXIeIqaBWMnzptqNccSTyx/+bmAIylwK/ALT8dOEw==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
