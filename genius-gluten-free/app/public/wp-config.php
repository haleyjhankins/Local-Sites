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
define('AUTH_KEY',         'A7EQcuw5tvTVtexhD/162wINhOphjbmavcMAYpy4UQq4Ank5VBVOz4tp0nAVNVELF1AE4WZ5a7QrOTALwrL2EA==');
define('SECURE_AUTH_KEY',  'kLov03GBVYn9e/COzSDxMLMIKTKN0rhGX2MME0HD7E/V8bcyQIm05jcH4czHDXxZDeUxWT6SqLwItBoPv4Q4Uw==');
define('LOGGED_IN_KEY',    '225ANd5nGiJKrZuEWSQA7axL78u/QjIOd6z+fPmj0d9GNY4vP5ldJOS9PdMrTSD/cJr0rN8b5cylqjBE3UqLWA==');
define('NONCE_KEY',        'stg+biI+hxP/BX0/8V0l0Enx/YbLYKxpnhUFIF7RRVj/5SMgHkYXCWYul5YoqcRWfnMQjkLwuGP55+Z+fZnNUQ==');
define('AUTH_SALT',        'NKU//jVRlL+rYv53tt1UhSgTD+ZJ3Sxn3apranL1x4bEa9HNpfnEMUGlSeUjFb2IIf9b0d38ujuxUMziZeNE7A==');
define('SECURE_AUTH_SALT', 'v955Rdq4H64beyzbX8KgeOh3Mlgk+t8/eziy7xgwfQxXnAkFt0WxEdy4czV0+eNe2RJ0GRh7oydJBSHfNkBc4w==');
define('LOGGED_IN_SALT',   'h8Ka8shKbA4WYm24QqWyYFZlsZqx6gtHsVXaYFrYaomPYDSvbwTfxhAyUldDS+T+yxBsTY+pZo2flW8U2RgPXw==');
define('NONCE_SALT',       '1zMr3eVbZtiteQngGJJLXd6MMl25W3r7TYDzfaUtRxJEdqxEZSRh43gZTjs7RsMyHtzSZON9zIYBbh0vyFroDQ==');

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

define('WP_DEBUG', false);
