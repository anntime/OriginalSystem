<?php 
namespace Index\Action;
use Think\Action;
Class HistoryAction extends Action{
	/**
	 * 首页视图
	 */
	Public function index(){
		$this->display();
	}
	Public function getHistoryData(){
		return 1;
	}
	Public function InitHistory(){

	} 
}

 ?>