<?php 
namespace Index\Action;
use Think\Action;
Class UserInfoAction extends Action {

	Public function index(){
		$this->display();
	}

	Public function getSimulateCount(){
		$userCount = getSimulateNum();
		$this->ajaxReturn($userCount,'json');
	}
	Public function getInfo(){
		$info = user_info();
		$this->ajaxReturn($info,'json');
	}
}
 ?>