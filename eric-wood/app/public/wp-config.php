<?php
# Database Configuration
define( 'DB_NAME', 'local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'Mx|Y5fD@K-NQ4x4C75:?ib+{@Pqk/DO|=O|mQ]Rh yl>43@5J+(^-u+ztR)Nk$+z');
define('SECURE_AUTH_KEY',  'kM~0v%)kD25nPzf0.%,>dt(XiI]@A[C14kJ.f3uw(}sa%l+nh<,>$T`7_36E  :C');
define('LOGGED_IN_KEY',    'BoZd#b>~F=gVKo&?(bv-D+_PVz-LCe%ek)0D1 v>-Y*<671S.O >?2gPsgZJPPJT');
define('NONCE_KEY',        'i#b_P]_j{7ffX0r8LKqBubfxN^2G}2YfT95B&w?4sRux0g?dI{^-(8;[%_AMWxGK');
define('AUTH_SALT',        '?ws1r:/&XwLy8=CR$Qf8;F5b&1-tiy8_q}LL-4*X-D[0ldE?%M-49M)0x+^|,)%.');
define('SECURE_AUTH_SALT', 'G~<3-g CMiDqOc_?Ni`e]IKvkEcjHUF.<4OF!--n6t]3dE5W%ZUVM}N0z}T2ZP>2');
define('LOGGED_IN_SALT',   'a@}dR#.EM133o5dJ|7+G?LruHFCbL>z}SepsyJuF!o}*H5!/SoVmBaj8Drstv;%3');
define('NONCE_SALT',       '0-h,g+r_xiLQQE5nji|+>}A`iGi-<)9{|Ky3%90,^EjA?2sH>A{6n+hjhvn@;Na+');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'ericwood' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '5fd00633e4e93b8e4ed5ae068a40ee49dff3d9aa' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '112565' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'ericwoodlaw.com', 1 => 'ericwood.wpengine.com', 2 => 'www.ericwoodlaw.com', );

$wpe_varnish_servers=array ( 0 => 'pod-112565', );

$wpe_special_ips=array ( 0 => '104.198.3.205', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings

# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');


# Don't show Warnings
define(‘WP_DEBUG’, false);
