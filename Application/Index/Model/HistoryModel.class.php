<?php 
namespace Index\Model;
use Think\Model;
Class HistoryModel extends Model{

	Public function __construct(){
	}
	/**
	 * 返回指定ID的最后访问的信息。
	 * 
	 */
	 Public function getLastVisitById($userId,$time){
		$data = array("userId"=>$userId,"time"=>$time); 
		$MainUser = self::getUserInfoById($userId);
		$simple = M("interdetail")->where($data)->limit("1")->find();
		// return M("interdetail")->getlastsql();
		$IndirectUser = $simple["IndirectUser"];
		// 获取间接用户信息
		$Indirect = explode(";", $IndirectUser);
		// return $Indirect;
		$IndirectUserInfo = array();
		foreach ($Indirect as $key => $value) {
			$userScore = explode(":", $value);
			$userId = $userScore[0];
			$IndirectScore = $userScore[1];
			$user_idscore = array();
			$user_idscore["userId"] = $userId;
			$user_idscore["IndirectScore"] = $IndirectScore;
			$user = array_merge($user_idscore,self::getUserInfoById($userId));
			$IndirectUserInfo[] = $user;
 		}
 		$userInfo["IndirectUser"] = $IndirectUserInfo;
 		// return $userInfo;
 		//获取直接用户信息
		$DirectUser = $simple["DirectUser"];
 		$Direct = explode(";", $DirectUser);
 		foreach ($Direct as $key => $value) {
 			$user_1 = explode(":", $value);
 			$userId = $user_1[0];
 			$user = self::getUserInfoById($userId);
 			$DirectUserInfo[] = $user;
 		}
 		//获取访问主体的信息

 		$userInfo["DirectUser"] = $DirectUserInfo;
 		$userInfo["MainUser"] = $MainUser;
 		return $userInfo;
	}
	 Public function getUserInfoById($userId){
		$data = array("id"=>$userId);
		$user = M("user")->where($data)->field("id as userId,username,ip,province,city,longitude,latitude")->find();
		return $user;
	}
	/**
	 * 返回时间间隔内的交互次数！
	 */
	 Public function getTimesByBetween($starttime,$endtime){
		$condition["time"] = array("between",array("{$starttime}","{$endtime}"));
		return M("interdetail")->where($condition)->count();
	}
	Public function test(){
		dump('21111111111111');
	}
}



 ?>