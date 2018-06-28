<?php
/**
 * 全局配置文件
 */
return array(
	//分组配置
	'MODULE_ALLOW_LIST'   =>    array('Admin','Index'),
	//默认控制器名称
	'DEFAULT_C_LAYER'     =>    'Action',
	//默认分组
	'DEFAULT_MODULE'	  =>	'Admin',

	//数据库配置
	'DB_TYPE' 			  =>	'mysql',
	'DB_HOST'			  =>    '127.0.0.1',
	'DB_NAME'			  =>    'original',
	'DB_USER'			  =>    'root',
	'DB_PWD'			  =>	'',
	'DB_PREFIX'			  =>	'os_',

	'DB_PARAMS'    =>    array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL),//数据库区分大小写
	//追踪调试
	'SHOW_PAGE_TRACE'	  =>	true,
	//开启URL路由
	'URL_ROUTER_ON'       =>	true,
	//路由规则
	'URL_ROUTE_RULES' 	  =>    array(
		//桌号绑定控制URL
		'DealTable'		=>  'Index/Table/DealTable',
		//版本控制URL
		'CheckVersion'	=>  'Index/SynVersion/CompareVersion',
		//订单控制URL
		'DealOrder'		=>  'Index/Order/DealOrder',
		//呼叫控制URL
		'DealRing'		=>  'Index/Ring/DealRing',
		//权限控制URL
		'CheckAuth'  	=>  'Index/CheckAuth/CheckAuth',
	)
	/*
		以下是3.1.2版本的旧的配置项
		'APP_GROUP_LIST'=>'Index,Admin',
		'DEFAULT_GROUP'=>'Index',
		'APP_GROUP_PATH'=>'Modules',
		'APP_GROUP_MODE'=>1,
	*/
);
?>