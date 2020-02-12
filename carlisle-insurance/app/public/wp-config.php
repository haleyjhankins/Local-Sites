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
define('AUTH_KEY',         'T3b+82obVqZ5xszHj0UYkyMxKaQ3kr6F8AZA8mXY5XTJfc6DG9vmWpV6IbP/z9M24LzNrz7qMRGfa9TR4XVk3Q==');
define('SECURE_AUTH_KEY',  'umAYnjN9gj/D+6KOAkK7np9seagHKb7qAsrpZr2V0qJljtwWc2q3IZDLy8grVA2i4yLEpKqb4C0iVmZaKAbRUA==');
define('LOGGED_IN_KEY',    'GSp7qUYIVnvFVMg8CgFfSBeRGp6sipWXILI4qIuS0U2xwyKyAcQ0hyfQSZVwon7e9B6GhQ0WfEjO0BadcWO4jg==');
define('NONCE_KEY',        'RrM1p1r5tIIFKdVKekNIkfUjyHhetCGHMbEdPdbyInw1J5Eq0FANWnJ0uKZXWDUgX4BsfKjZtkAFU9M+xd3NFQ==');
define('AUTH_SALT',        'QGcTSgDafAQG186fmIwCLs6kAItxHDHuZ7YRkWpdyNV7u9Eg2223DE/bN66U8DYY8VgEmcGErSPDJ1/n5nui1Q==');
define('SECURE_AUTH_SALT', '0wITs1NZGOoj3Gou5Pk7zZfk+Jl5Ll8riUDPS14a8tWIK50f/zCAWwVg11RfUL5/sQ2mXCzZYjjt6QJSjG2zaw==');
define('LOGGED_IN_SALT',   'w6vIC8IHeXI9zTV2idRCs88oBe00QA4CV7+9+nfypVQ8QIK/8g8KtR1OtmXDbcwYIxciTtyNVymX7VgXQm+CNg==');
define('NONCE_SALT',       'HiJ8wG5xRN1MKMDAPl/Hchx1GbXXSCq/k8WUv38TcnBzoKvWOuskWQDLhMAGl0X1s9Dhty0hXUwDdvbpztr/Dg==');

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

// Hide Warning Messages
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
