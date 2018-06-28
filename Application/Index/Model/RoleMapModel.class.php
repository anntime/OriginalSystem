<?php 

namespace Index\Model;
use Think\Model;
Class RoleMapModel extends Model{
	function __construct(){

		$db = M("");
	}
	/**
	 * 获取用户最终信任评判值
	 */
	Public function getFinalScore(){
		return 1;
	}



	/**
	 * 判断是否授权资源访问
	 */
	Public function isPass($RequestInfo,$SaveData,$totalScore){
		if ($totalScore>75) return 1;
			else return 0;
	}




}













 ?>