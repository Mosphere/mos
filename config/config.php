<?php 

return [
	'db_host' 	=>	'my9815659.xincache1.cn',
	'db_user' 	=>	'my9815659',
	'db_pwd' 	=>	'china200851',
	'db_name' 	=>	'my9815659',
	'db_table_prefix' 	=>	'mos_',
	'db_charset' 	=>	'utf8',

    'default_module'    => 'home',
	'default_controller' 	=>	'Index',
	'default_action' 	=>	'index',
    'url_type'          =>      1,

	'cache_path' 	=>	RUNTIME_PATH . 'cache' .DS,
	'cache_prefix' 	=>	'cache_',
	'cache_type' 	=>	'file',
	'compile_path' 	=>	RUNTIME_PATH . 'compile' .DS,

    // 模板路径
    'view_path'    => APP_PATH .'home' . DS . 'view' . DS,
    // 模板后缀
    'view_suffix'  => '.php',

    'auto_cache' 	=> false,
    // URL伪静态后缀
    'url_html_suffix'        => 'html',

];