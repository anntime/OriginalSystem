<?php 
namespace Index\Action;
use Think\Action;
Class MonitorAction extends Action{
	/**
	 * Monitor Model
	 */
	Public function index(){
		$this->display();
	}
	/**
	 * 初始化监控模块
	 * 
	 */
	Public function InitMonitor(){
		//获取系统参数
		$SystemPara = array();
		$SystemPara = $this->getSystemPara();
		//获取历史交互次数
		$TodayInterTimes = array();
		$TodayInterTimes = $this->getTodayTimes();
		//获取权限个数
		$PowerTimes = array();
		$PowerTimes = $this->getPowerTimes();
		//获取最近10次访问数据
		$Top10ByTimes = array();
		$Top10ByTimes = $this->getTop10ByTimes();
		//获取最后10次访问数据
		$Last10 = array();
		$Last10 = $this->getLast10();
		$AllInfo = array("SystemPara"=>$SystemPara,"TodayInterTimes"=>$TodayInterTimes,"PowerTimes"=>$PowerTimes,"Top10ByTimes"=>$Top10ByTimes,"Last10"=>$Last10);
		//dump($AllInfo);
		 $this->AjaxReturn($AllInfo,"json");
	}
	/**
	 * 获取弹出框数据
	 */
	Public function getAlertInfo(){
		return;
	}

	/**
	 * 获取初始化系统参数
	 */
	Public function getSystemPara(){
		//Part ONE  获取交互次数
		//获取当日凌晨时间
		$wee0 = strtotime(date('Y-m-d',time()))."<br>";
		$now = time();
		$condition["time"] = array("between",array("{$wee0}","{$now}"));
		$TodayInterTimes = M("interdetail")->where($condition)->count();
		$AllTimes = M("interdetail")->count();
		// echo $AllTimes;
		$SystemPara["MutualTimes"] = array("TodayInterTimes"=>$TodayInterTimes,"AllTimes"=>$AllTimes);
		
		//Part TWO 获取用户信息
		$CurrentUserNum = M("user")->count();
		$MaxUserNum = getconfig("MaxUserNum");
		$SystemPara["UserNum"]=array("CurrentUserNum"=>$CurrentUserNum,"MaxUserNum"=>$MaxUserNum);
		//Part THREE 获取网络环境参数信息
		$NetNum = M("net")->count();
		$MaxNet = getconfig("MaxNetSetting");
		$SystemPara["NetSetting"] = array("NetNum"=>$NetNum,"MaxNet"=>$MaxNet);
		//Part FOUR 获取权限信息
		$AuthNum = M("auth")->count();
		$MaxAuthNum = getconfig("MaxAuthNum");
		$SystemPara["AuthSetting"] = array("AuthNum"=>$AuthNum,"MaxAuthNum"=>$MaxAuthNum);
		return $SystemPara;
	}
	Public function getTodayTimes(){
		$TodayTimes = array();
		//记录交互次数
		$Times="";
		$time = time();
		$Xtime = "";
		for ($i=0; $i<=24 ; $i++) { 
		$h = date("H",$time);$day =date("m-d",$time);
		$times = D("History")->getTimesByBetween($time-3600,$time);
		if($h==0) {
			$str = $day." ".$h."点";
			$Xtime = $Xtime.$str.",";
			// echo $str.":".$times."<br>";
		}
		else {
			$Xtime = $Xtime.$h."点,";
		}
		$Times = $Times.$times.",";
		// echo $h.":".$times."<br>";
		$time = $time-3600;
		}
		$TodayTimes["Xtime"] = substr($Xtime,0,-1);
		$TodayTimes["Times"] = substr($Times,0,-1);
		//dump($TodayTimes);
		return $TodayTimes;
	}
	/**
	 * 获取每个权限对应的访问次数
	 */
	Public function getPowerTimes(){
		//获取权限表的权限信息，然后挨个查询次数。
		$Power = M("auth")->select();
		$PowerTimes = array();
		foreach ($Power as $key => $value) {
			$condition = array("request"=>$value["id"]);
			$times = M("interdetail")->where($condition)->count();
			$PowerTimes[] = array("requestId"=>$value["id"],"requestName"=>$value["Auth"],"Times"=>$times);
		}
		return $PowerTimes;

	}
	Public function getTop10ByTimes(){
		// $InterUser = M("interdetail")->field("userId,times")->select();
		$sql = "select *,count(distinct userId) from os_interdetail group by userId order by times desc";
		$InterUser = M("interdetail")->query($sql);
		// echo M("interdetail")->getlastsql();
		// dump($InterUser);

		foreach ($InterUser as $key => $value) {
			// echo $value["userId"]."::<br>";
			$condition = array("id"=>$value["userId"]);
			$info = M("user")->field("province,city,ip,username,id as userId")->where($condition)->find();
			// echo M("user")->getlastsql();
			$InterUser[$key] = array_merge($value,$info);
		}
		return $InterUser;
	}
	Public function getLast10(){
		$last = M("interdetail")->order("time desc")->limit(10)->select();
		// dump($last);
		foreach ($last as $key => $value) {
			$condition = array("id"=>$value["userId"]);
			$info = M("user")->field("province,city,ip,username,id as userId")->where($condition)->find();
			$last[$key] = array_merge($value,$info);
		}
		return $last;
	}
	Public function getCountByProvience(){
		$sql = "select province,count(distinct id) as CountNum from os_userinterinfo group by province order by CountNum DESC";
		$pro = M("userinterinfo")->query($sql);
		// dump($pro);
		$this->AjaxReturn($pro,"json");
	}
}

 ?>