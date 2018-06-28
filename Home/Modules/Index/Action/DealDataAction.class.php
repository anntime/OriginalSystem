<?php 
Class DealDataAction extends Action{

	Public function index(){
		$url = "http://www.thinkgis.cn/public/sina/result/china.json";
		$data = file_get_contents($url);
		// dump($data);
		$temp = array();
		// $tag = ']},{"geoCoord":[';
		$temp = explode(",",$data);
		dump($temp);
	}
}

 ?>