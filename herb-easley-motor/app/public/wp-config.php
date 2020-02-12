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
define('AUTH_KEY',         '8PhBr96x9gywr5vvZE60YwrMc/KO2vLIsCJWrcH9hhvYPoGNPBC4VM5aNddt60o8ZJUZMqPJC8vmELmq9y9+GQ==');
define('SECURE_AUTH_KEY',  'KdCgj6xaPCL6qsXQnfjs0E0Jd1enMhCI2dZZR92b6ya+CTQaDwKLOQOkR8ghOByDXkCJwChhR0ora+9NfKoQqg==');
define('LOGGED_IN_KEY',    'w88kwyySdUu5JKyqatIUaEICISDuwU8qWYOm02zoXAcvKH63pziDZO1F7utB56DTIXE6r959Nzb/RXNVxvv7cw==');
define('NONCE_KEY',        'iGELfEcUa561g3LgWFjlHKwahplnnEiJotsBYuJ7sXHCuv3NCF6HNYfmUxVrMcj+Ho7s9sRvkS4IH+mzIfmssg==');
define('AUTH_SALT',        'lUxY1dOMI4Vxpz5pZSDRa4PIE2MeTONq5DtRpbtxTgM1JDDqPpccgk64GLI7MxNvYipRF0aMx71/0NrQpkOlug==');
define('SECURE_AUTH_SALT', '4yMk1U3EMBmb2DhcF/UCmxaSAv2ZKWLzbJh2eXwysBeWxmjYH7ftM63Qb4QwJRiqvJamLXjC2iiRt/ejAYUp7g==');
define('LOGGED_IN_SALT',   'eimjKoE4yPBs2j5m7QMJcW0w9RHvTGqjUifo2p8nzL52yckMwkoECz+sKWIatRul2XOus92CDPnjrGKRw1tAtw==');
define('NONCE_SALT',       'hczhGV2qQCLk6L0TwOcFnEHdnxlW/cwc7HDvJrS7sEePBAkyDqiSS//a2h7i9fGuAjAvEWg15s9L9hHTpHnsGA==');

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
