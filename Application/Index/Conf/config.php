<?php 
return array(

	'TMPL_PARSE_STRING'=>array(
		'__PUBLIC__'=>__ROOT__.'/'.APP_NAME."/Index".'/View/Public',
		),
	//由于3.2以后去掉了GROUP_NAME的全局变量，为了方便修改代码，在配置项中添加GROUP_NAME字段
	'GROUP_NAME'       =>   'Index',
	//上传Image的路径
	'IMAGES'=>'./Data/Uploads/Images/',
	);


 ?>