<?php
	namespace Index\Model;
	use Think\Model;
	Class EvalueModel extends Model{
		Public function IndirectEvaluate($Indirect){
			$IndirectUser = array();
			foreach ($Indirect as $key => $value) {
				$value["IndirectScore"] = self::getRandomScore();	
				$IndirectUser[] = $value;
			}
			return $IndirectUser;
		}

		/**
		 * 产生随机的评估值！
		 * 应该根据信任值产生相关的评估值：即为信任值越高，越可信，产生的信任值也越高。
		 */
		 Public function getRandomScore(){
			return (rand(0,100)/10);
		}
		/**
		 * 获取该用户的直接信任值！
		 */
		 Public function getDirectScore(){

		}
		/**
		 * 信任评估
		 *
		 * 计算总的评估值，由InterDealAction入库时使用
		 */
		 Public function getTotalScore($userId){
			return rand(50,100);
		}
		/**
		 * 用户直接信任的评判
		 */
		 Public function DealDirectTrust($id){


		}





	}

?>