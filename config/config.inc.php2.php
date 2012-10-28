<?php
error_reporting(E_ALL ^ E_NOTICE);
//本项目根目录
define('ROOT', dirname(__FILE__) . '/../');
define('LIB', ROOT . 'lib/');
define('CLS', ROOT . 'class/');
/* for smarty template */
define('TPL_COMPILED_DIR', ROOT . 'compiled');
define('TPL_TEMPLATE_DIR', ROOT . 'template');
define('TPL_PLUGINS_DIR', ROOT . 'template/plugins');

define('SITE_URL', 'http://uad.rxf.dev.bs.com');
define('TOP_TITLE', '博升UAD后台');

define('ASSET_SUFFIX', 'renxuefei.dev.bs.com');
define('ASSET_PREFIX', 's');
define('ASSET_COMBO', 0); 
define('ASSET_VERSION', 0);
define('API_URL', 'http://uadapi.rxf.dev.bs.com/');
define('COOKIE_EXPIRE', 3600);
define('COOKIE_PATH', '/');

$MYSQL_CONFIG = array(	
	'db_host' => '192.168.0.224',
	'db_user' => 'root',
	'db_passwd' => '',
	'db_name' => 'uad',
);
$NO_LOGIN_URLS = array(
	'/login.php',
	'/ajax/auth/verifycode.php'
);

$NO_LOGIN_AJAX_URLS = array(
	'/ajax/auth/login.php'
);
