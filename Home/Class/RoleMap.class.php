<?php 
/**
 * 权限映射模块！
 */
Class RoleMap{
	/**
	 * 获取用户最终信任评判值
	 */
	Static Public function getFinalScore(){
		return 1;
	}



	/**
	 * 判断是否授权资源访问
	 */
	Static Public function isPass($RequestInfo,$SaveData,$totalScore){
		if ($totalScore>75) return 1;
			else return 0;
	}
}

 ?>