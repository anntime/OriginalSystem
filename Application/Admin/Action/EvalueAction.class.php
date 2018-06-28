<?php 
/**
 * 升级TP3.2.3新语法~~
 */
namespace Admin\Action;
use Think\Action;

Class EvalueAction extends CommonAction{
	/**
	 * 显示评估设置界面的模板
	 */
	Public function index(){
		$this->redirect("Admin/Evalue/Indirect");
	}
	Public function Indirect(){
		$this->redirect("Admin/Evalue/IndirectSetting");
	}
	Public function IndirectSetting(){
		$this->display("index");
	}

	Public function direct(){
		$this->display();
	}
	Public function saveEvalueSetting(){
		/**
		 * 更新设置模拟用户所占百分比
		 */
		$Para = array("SIMULATE_NUM"=>array("Val"=>I("simulateNum")),"SimulatePercent"=>array("Val"=>I("SimulatePercent")));
		foreach ($Para as $key => $value) {
			$tag[] = SaveConfig("{$key}",$value);
		}
		$this->success('修改成功',U('/Admin/Evalue/index'));
	}



	/**
	 * 直接信任和间接信任所占比例设定
	 */
	Public function Percent(){
		$this->display("Percent");
		// $this->success("正在开发中！~~~");
	}
}
 ?>