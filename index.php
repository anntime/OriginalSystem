<?php 
//项目组的配置一个单入口文件实现前后台分离
	define('APP_NAME', 'Application');
	define('APP_PATH', './Application/');
	define('APP_DEBUG', TRUE);
	define('RUNTIME_PATH', 'Data/' . 'Temp/');
	require('./ThinkPHP/ThinkPHP.php');
 ?>