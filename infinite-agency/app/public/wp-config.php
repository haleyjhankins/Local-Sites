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
define('AUTH_KEY',         '-m!!`A:6PXv@IQJ#[:=%M9A`wo_B~BOq4L*@ARU|AI cC.@*3_#5y.|H%xX;a|Y#');
define('SECURE_AUTH_KEY',  'GU]6-I][%DMj$`w;B;r_=4h~gOymU3T</Jo<a)`/y(LLM[gE?F^Z}/4095>;C,Ez');
define('LOGGED_IN_KEY',    'lU&qmeO Zy*U;llAy.r?I$ p,[Q{a+xF?>brL#%I[0Fn+]u+[47a;E`NQ~|<)-Wy');
define('NONCE_KEY',        ':40|Fw*|u}:XV2tD$Q#^L{LP4VZbriEPpLomw~k/%L,k%av.?%|NpAF<z&jQBHE`');
define('AUTH_SALT',        'q]|huEO_?6els3(5d5-7vE<Lu(BRu8mQyEx~<=OkPc1sWey_O7|zKs4C{VEn Bq-');
define('SECURE_AUTH_SALT', 'IwMf<H*!:b4E__V(a/KCg;GbwIJFu/9j x($AR3=d,LVvR2z(-UTKWCC;PCTjvpX');
define('LOGGED_IN_SALT',   ',Opd7e=->:cLb gzu|%YP2{Xhmi}-WdtG9_7"jNTVS9U)QFJ-H}<4]:K$+,K`C[/');
define('NONCE_SALT',       ']Gy%16zSN@"i,eHc1d>_G6v,SI%`<U::A-}}!xV$+kF{*nE6X51rJn!a--"y3 *<');

define( 'DISALLOW_FILE_EDIT', FALSE );
# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'infiniteagency' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'aafe0f81b855c200ff83eea0f3a8595f1d8c3c92' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '112565' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

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

$wpe_all_domains=array ( 0 => 'infiniteagency.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-112565', );

$wpe_special_ips=array ( 0 => '104.198.3.205', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

define( 'WPE_CACHE_TYPE', 'generational' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_SFTP_PORT', 2222 );
define('WPLANG','');

# WP Engine ID


define('PWP_DOMAIN_CONFIG', 'infiniteagency.wpengine.com' );

# WP Engine Settings

# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

/** Hide warning messages */
define( 'WP_DEBUG', false );














?>
