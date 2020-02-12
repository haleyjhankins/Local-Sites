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
define('AUTH_KEY',         'A:3crOao)_;Z&7Lq{,dp o#oV:.M`XK-*oeJXyMz o]0i)>|aD,H|ESYdyqQ6FKH');
define('SECURE_AUTH_KEY',  '+Q8@y7e $4yu$SOfkq4#Q4|#OGEq$NhVpB*X7}/|1NAz+w|Z)2gD>tKIQXr+sYB+');
define('LOGGED_IN_KEY',    '8^w*Na?t||GJ$2p@&z.MU}A:.:A%;3iBGvvGWn.e/>Oig!EYV%SXQh-!ZrqW&j,-');
define('NONCE_KEY',        '4enc1sqaCT_|S?-[L6n+3/(~.ry|zw|NY`*T?b]N3~)2}9#zWyy4-DzG Q?Znb!.');
define('AUTH_SALT',        '39;7MP|/4Hc~oPA/  5p%Isy7FQ`3M0j<F+@_uoV!kL]?<P*)K:=$"4`:%Jybpp@');
define('SECURE_AUTH_SALT', '(b]q9j6WB|l{u.nO1d52*o1!BRLr1Amm4L8r}fX6LBAq"L%y!YBCy(MB)GD32Cx6');
define('LOGGED_IN_SALT',   'L4xVQC4Erh}pK6+yFCP)[2+`3pezkbiV7O5G,i[Mf0:d3tFL>oWq80=SHSlM/MF9');
define('NONCE_SALT',       'uR~@)/F1<[gbBhkk;RC)M9)j1$ymrdN4F(gb<tx^0}OQTQkhSi c+%xFCj]VDt  ');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'weatherby' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'c806f56d19af312dd9f9e2428fcc0e63cafbbbb3' );

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

$wpe_all_domains=array ( 0 => 'www.weinsure4you.com', 1 => 'weinsure4you.com', 2 => 'weatherby.wpengine.com', );

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
















