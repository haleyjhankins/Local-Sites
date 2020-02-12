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
define('AUTH_KEY',         '4qZg@L+r@vRO1.evs&@}u~| C8+Sb3HTmSgSgm5@/^yOi q?<9hVf`25DEuhqs6*');
define('SECURE_AUTH_KEY',  'G)[`WC@hTbHTuH*|FxiI+G(^ePy6D2eW>a|27h:%t3TtuAH1|+Hb=oHdT@f6DpxM');
define('LOGGED_IN_KEY',    '%[l3KN#05z(*o:vj8xriXFwBpgCfcf7=+m,/OlMf>l/Ge$qs/pHS(5~{|9.?,y^|');
define('NONCE_KEY',        'vql nSA;{kM1Kz2LENb[%f 0OF|gkcs|.Su#~J%4?E|7J6|WT*pcLo6,D#<t+D t');
define('AUTH_SALT',        'o=S!C$~+VGsN0l4(wGTd_$,Hyb/!m]]X60J=_9_uurHfINidY^x+_~?a]sJ:%u0`');
define('SECURE_AUTH_SALT', 'j!a_DC%s@A[I1v[m!MgB26!AQ6}FVS"=oYCIIecto_m2{+r-Mr>_-%tB>U73<V}[');
define('LOGGED_IN_SALT',   'O,ch{DdDvRB~!"Ey?JK`c(G.$52BWv@q,S6jB%0KV`]NV.{6uEd]j2)xB~/qGssq');
define('NONCE_SALT',       '9/BAK0E[$zN;dg~rFym6>gV+7OQSJu",irI0buo}xB2.:"EfWn7ES4u0a9FN{[uQ');

define( 'DISALLOW_FILE_EDIT', FALSE );
# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'cajunsteamer' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'b8c0a35efc54131c89c6839744cb31b854f454ad' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '112565' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_CACHE_TYPE', 'generational' );

define( 'WPE_CDN_DISABLE_ALLOWED', false );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

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

$wpe_all_domains=array ( 0 => 'cajunsteamer.com', 1 => 'cajunsteamer.wpengine.com', 2 => 'www.cajunsteamer.com', );

$wpe_varnish_servers=array ( 0 => 'pod-112565', );

$wpe_special_ips=array ( 0 => '104.198.3.205', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_SFTP_PORT', 2222 );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
















