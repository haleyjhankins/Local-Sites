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
define('AUTH_KEY',         'hlW^,4^LVf:[*q~obtB3$9+i3<[eSLxGt[:* C$>*Xmh[LQ(sU^(f~R^|)e S!.r');
define('SECURE_AUTH_KEY',  'K/+P|5w/|9dj}L+KvWfDa(&[#;~z=JhzU[:7<SLXujY*]fBXGpp[:*4V>Lw^Ez<,');
define('LOGGED_IN_KEY',    'o9GCK 8vyax<Kv&nFpr;giuJ&})9X}`2F@{_k+eUX0=OU4425+z4cQ:B$;P,rBN}');
define('NONCE_KEY',        '8;fCaJe3uv-kLkX],4&`r8wE~Vd07q!L)(,ujBI B:h;9Yu0:XLu=-TR<&[5zKXm');
define('AUTH_SALT',        '(hK~pQ,HgO2lq:nt s%6zG6L<d4bk=/&e/&$xK)%PyoD}_VqLHp9d_ZODy/0,<xw');
define('SECURE_AUTH_SALT', 'S&vgTf4c+tvgE qo}l|E?!Y` szsY>n>NwZm+mRZ:q)CK*nNRSzH(}_=c$c/2C^j');
define('LOGGED_IN_SALT',   'Uak#0t1?rH,,pt.MNG$7y/&wvLM+waT2#u JCL}>8uapx.)X,86[E%-06}|cu(_&');
define('NONCE_SALT',       'Tuq4O>q3eH/4uj)7|H}qD^woC.:K>GNw{7_x^*q#=CJhl#p5RNg3lC6rW8Bx~j$%');

define( 'DISALLOW_FILE_EDIT', FALSE );
# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'healthcarerev' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '9c615eab06ebadfe0955cd7bf08a21c8594710b0' );

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

$wpe_all_domains=array ( 0 => 'www.healthcarerevenuesolutions.org', 1 => 'erisarecoverygroup.com', 2 => 'healthcarerev.wpengine.com', 3 => 'healthcarerevenuesolutions.org', );

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
















