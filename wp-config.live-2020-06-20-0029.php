<?php

/** Enable W3 Total Cache */

//define('WP_CACHE', false); // Added by W3 Total Cache


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
define('DB_NAME', 'rajasfas_822');
//define('DB_NAME', 'rajasfas_822');

/** MySQL database username */
define('DB_USER', 'rajasfas_822');
//define('DB_USER', 'rajasfas_822');

/** MySQL database password */
define('DB_PASSWORD', '9E2FAB6CDs57i3qlck0h8w4');
//define('DB_PASSWORD', '9E2FAB6CDs57i3qlck0h8w4');

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
define('AUTH_KEY',         'maufvskqc9ndphdcvpvxskypmijrkrfp8htxbkyge2cnaslmzl3eemyzem9lbjdo');
define('SECURE_AUTH_KEY',  'tzsdet20jlk3ejdia7qddj656poiwfhzmpv2oint6mdzlvlwkpbfpqwwfwfokbem');
define('LOGGED_IN_KEY',    'ayrp0pjkbx35doc4tktfx6istxabjd0ynzbtzbhssaxo0felvbjx9qoasp9hk6nn');
define('NONCE_KEY',        'vok1uwcguz8avnp5povd0ng7tv54iw6vxliaov3pjpspjjm7kmr1qttgqbzkz5xq');
define('AUTH_SALT',        'vhcp8ztb8i203fvvg7e9fnlmwtjgoovd6ezh6gzfcct84g37jnt5jktkjfgj2nqa');
define('SECURE_AUTH_SALT', 'losojeap31dgsoegub7a4i1b5ry1abgns4r8qethkl1k6cudfblrkgvgsrip1w1j');
define('LOGGED_IN_SALT',   'mups9n0era0dqygo3dpfatd5k5uue8l1wz3r5150mibt5qiqytekfljuwyfkegy1');
define('NONCE_SALT',       'iybsw5jkmwtqw3dscz3kta73eqzhuaie4n5ddb24znbrysg0ofyahsvvimc893hb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

set_time_limit(900);
/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
// if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
// 	$_SERVER['HTTPS'] = 'on';
// }
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
//define('WP_DEBUG', true);

define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
