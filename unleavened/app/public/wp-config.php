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
define('AUTH_KEY',         'EB8%`B%Sk]MQpq)u|V+gy7Pa=MI5HBG83~g*q=(,Cn-YrA^{%uT`!hS7=c]OO|Jw');
define('SECURE_AUTH_KEY',  '~Cb-s&89UcdTDGmIev4g|)&2YYgDX7x9E yX]MY >~hQSK1pgxUuTi-;<kv2M_Tu');
define('LOGGED_IN_KEY',    '#oAQ1_ws2l_qRN(T S-w%Th-u^OkXVi,drbW^{&8W`Bv6O|nNr0&<X]P<@F5?god');
define('NONCE_KEY',        'L]{7wKNUkQVGIf(7FjR%-N32=[i /]nmTX_C(_SBMp}N/!5>xdQT&n+3+R0M$zh|');
define('AUTH_SALT',        '!xO<>|tKkUY0L%p e]H|b)cY+m+`3G|c,/&wg,-:!{Zxegs$fVk7/.=UuA8hWehI');
define('SECURE_AUTH_SALT', 't@3[E4Stj^?.Lr@vs;<:qA#gD<3l|2SgT+pe_vebQkW<wd*uIJS&@OBh3Mpf+t`b');
define('LOGGED_IN_SALT',   '_n@^}X()-[AzL-eEKS&Tiz^]+mq(S55=%]Er<VbpKS8HC(]aD6 ,+A]C;[KzH-+4');
define('NONCE_SALT',       '{8Ji%bz[9&RRA8Hr=PI{,WMmZEk,Vw2~v|GI.#Dv>-Q|R{<3YHEd!QGC<%FBfxf#');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'unleavened' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '8fdf27f478001def3e89ca57d9919d02844ea524' );

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

$wpe_all_domains=array ( 0 => 'unleavened.com', 1 => 'www.unleavened.com', 2 => 'unleavened.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-112565', );

$wpe_special_ips=array ( 0 => '104.198.3.205', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

define( 'WP_SITEURL', 'http://unleavened.com' );

define( 'WP_HOME', 'http://unleavened.com' );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');


















