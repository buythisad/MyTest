<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'zopplocouo635');

/** MySQL database username */
define('DB_USER', 'doadmin');

/** MySQL database password */
define('DB_PASSWORD', 'w2adwwp93cf64m78');

/** MySQL hostname */
define('DB_HOST', 'db-mysql-nyc1-wordpress-do-user-3761512-0.db.ondigitalocean.com:25060');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'KdmbaWD9dj6q0bvIvwBHE+ooPv/V+WdOrnKaiFGRKUU8eQWywCjOHQjsCtq+');
define('SECURE_AUTH_KEY',  '7ATiNxph4VmMUBWpprOSRXkm4B3D6fQ16K+4yHPt4j1hSzvshiyEFnXdMB3m');
define('LOGGED_IN_KEY',    '+KLqjVEXvolMo53GI2l7UEL5TPMNbgTWEILtNzuQQ5XvXGlxvCuU+VtGLqtt');
define('NONCE_KEY',        'b2ece7Qf5ymRBQlGK1uP3+yYOe+sUsr3kSi8zA5ySL9B1kBiWFaNRTrSAip5');
define('AUTH_SALT',        '3fqSwmnLEyEdP4kTK1SLj5goFuXDiuUmt5+6+vNEROgBCRxyqY4gNAqLHmxE');
define('SECURE_AUTH_SALT', 'dj9MB5Ugeb11VzY99XpfwFonrJ87lMYPRgsm5jh5qM3n29JR8MixN1qs8BJs');
define('LOGGED_IN_SALT',   '9XibInnE0yz3oLelBblexAlukIoQ3Xud2vJFtYMIEgBpBkzfL163pbZ5En8u');
define('NONCE_SALT',       'eUncLM7SIecJgCG8a9H3js4tYmeFMqfAIy0VWcEGCK78HRb9dzdf7SYnXkEf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mod435_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/* Fixes "Add media button not working", see http://www.carnfieldwebdesign.co.uk/blog/wordpress-fix-add-media-button-not-working/ */
define('CONCATENATE_SCRIPTS', false );

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
