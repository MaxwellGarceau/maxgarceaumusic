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
define('DB_NAME', 'songwr39_mgmusic');

/** MySQL database username */
define('DB_USER', 'songwr39_mgmusic');

/** MySQL database password */
define('DB_PASSWORD', 'CSM.1-p72z');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'klzetvyjd7pj7xaxgp99bxhawsemhfb4syfowbwumysqqonasvhqjemihn7cglh4');
define('SECURE_AUTH_KEY',  'wfa5slepts5dge3gx2kjtjubx5zlbomoptpfl0kufmrww2edx4gzwwvt4xpjshpb');
define('LOGGED_IN_KEY',    'vsyfztvwwy6om2rclttlpawmvxyzfx8q2bqnfv99drcswcr7s7xy5hwuf4ztkutm');
define('NONCE_KEY',        'bvsymwasyjb0yhveezwhzwdvux4avoionaegajceee4dwaxu9gqrqb3elvt0ye36');
define('AUTH_SALT',        'ovg1zwmeyo0zhxgtpfkymvbczy4ri8nwisu7qb3y9ertlt2a7f2jl7snmrzlzidr');
define('SECURE_AUTH_SALT', 'fjz4agwot7hp0etd4ouon0aupsxy91yapcgamjfpvfzdpklzplmqke8ht6ctn8lo');
define('LOGGED_IN_SALT',   'ccgnsr76q1pd6ygfact41gqkhhcnsxaiknafc4pqyhdh1hnlysnateedngfi163b');
define('NONCE_SALT',       'icfa4bsexqyoa41hf182t38zfqnytaadi72xtmhlqnadjfyjd40kcpwczbo4zcsq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mgmusic_';

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
define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_AUTO_UPDATE_CORE', false );

// Prevents Admin Login from redirecting to the login screen aftering attempting a login
define('ADMIN_COOKIE_PATH', '/');
define('COOKIE_DOMAIN', '');
define('COOKIEPATH', '');
define('SITECOOKIEPATH', '');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
