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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ZmDnaAuuR+rCNn1yyNfhIDfPpFL+YgJkUx0EoVE6a9ECQ9/DYAbV6xxyDNRngh2hKvZsrDrZeFjeAeDgDnZm+w==');
define('SECURE_AUTH_KEY',  'fieyeVYoUG1g1L2Bw/p0BGojGA4uwaaAVVrgrf+NxGOnUHeGVSX8xYx3ZDAad/sRYyVfgAWMv9D9kgraKslzIQ==');
define('LOGGED_IN_KEY',    '/tevuCkapYSyQt0Xf/i9DHLgeRwcoM/rFfOvXSK083wkR9pV0QTMTDDY+OpcKu5DEiHRq3Nz4gQZc5Q18vkbgw==');
define('NONCE_KEY',        'LtwoVs1Jn4lqu6/aDQI+ipIf3Stwih0ezTPnk4/YqHK4iidQhSb45JvOcL63VAvRPi/bRNkVi6oKWDqW5WE35w==');
define('AUTH_SALT',        '2fzInF+5Hg2kLJeZySiS+VYSn55OeMVc4co14rSHzZPLAOCFPF0cMeB3vgtjod0TWgY8/1h1+uoB+4kPpBw21w==');
define('SECURE_AUTH_SALT', 'pCtUMQNgLQVeGhj7T7bf8S8TM516fW/+isCTNkSy28nXOiL/af7NOHZXkf471MCLitx0rb8xIgMmjzvuQHKlCw==');
define('LOGGED_IN_SALT',   'd6SWizpNArj4k4H+9utO+U9kL0+PWRpx0Md4oI+feSX7D7dCS5zPFQAqaqfcES5podkSY9R9VVpqg75O35zpSA==');
define('NONCE_SALT',       'XevxaG+ndrk8tJEjF3JVDrgG4ceTcflxuNN6lajdMwHUuGfGNYsmipuhEZO1wY5qG4JDcvZs/YPrYJjpEZ+c4g==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

/** Hide warning messages */

define( 'WP_DEBUG', false );
