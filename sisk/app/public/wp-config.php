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
define('AUTH_KEY',         '-y,rfMh.%<=tuD[C7N.IJ5;>sCOseN$nf#|)4)JzHEhRNTrpiD^jK]PK!d@`/|:a');
define('SECURE_AUTH_KEY',  '6ahv(E |L3qRt2j]D+B^|$Z*>+`-[y*=[/!qg6? `d];A!0Ww{}T}RV7E%oG_.:J');
define('LOGGED_IN_KEY',    'g[q.je}`Qwxdh,[|:*hT.jn4Dliw+L|G%:=w1-D*75w}6Z`f OWp1@/[BdUOAhK1');
define('NONCE_KEY',        'yh?Sv CGR|RiSP}1~W`Va3:-rk6_g#lu:t|K+:%2wS?X K,X/&++c$hhr<k$d8+J');
define('AUTH_SALT',        'TR1<B]@b;"ay~LwLt6WpzsDG+5u7PCIgC"nv*5,q<QTpXuyg0;wSN(y~z>Z6H+,1');
define('SECURE_AUTH_SALT', '7f$"Qh!j$W54g,uB~T$!@A/v="Ux}ogE!Jrs(.hhKsx)Iug=ut?)]X/K`.!v87N5');
define('LOGGED_IN_SALT',   'i| g`.Mb%8;~RKL7~V6UmsY((G-u+ MYH%HrQ326kD[34sSA-8{xTSu cxpC)]Bw');
define('NONCE_SALT',       '(UKsMbFb,[d%y9og.*.hDa7q|{,r{L8)""9T F|lu_zw=1?b=c,8}T*+H3vaSO=z');

define( 'DISALLOW_FILE_EDIT', FALSE );
# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'siskmarketing' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'd00dab11ea26647302f31c43a06209997590176e' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '112565' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

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

$wpe_all_domains=array ( 0 => 'mbpackage.com', 1 => 'www.mbpackage.com', 2 => 'siskmarketing.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-112565', );

$wpe_special_ips=array ( 0 => '104.198.3.205', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
















