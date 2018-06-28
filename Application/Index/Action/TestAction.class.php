<?php 
namespace Index\Action;
use Think\Action;
Class TestAction extends Action{

	Public function username(){
		$data = array("Aaron","Abbigail","Abby","Ace","Aimee","Alex","Alexander","Alexandra","Alice","Amy","Andrew","Andy",
			"Angel","Ashton","Bailey","Bill","Billie","Billy","Bliss","Blythe","Carmel","Carmen","Cassandra","Cassie",
			"Catherine","Charlene","Charles","Charlie","Cherry","Chris","Christine","Christopher","Coco","Daisy","Daniel",
			"Danielle","Dannie","Danny","Darling","December","Doreen","Elizabeth","Eva","Eve","Evelyn","Frank","Frankie","Franklin",
			"Freya","Gabe","Gabriel","Gordon","Gwyneth","Hanna","Hannah","Harold","Harriet","Harrison","Harry","Hayden",
			"Heather","Henry","Holly","Hunter","Isabella","Ivy","Jacey","Jack","Jacky","Jacob","Jacqueline","James","Jane",
			"Janice","Jason","Jimmy","Samuel","Joan","Joanna","John","Julia","Juliana","June","Kaleigh","Katherine","Kayley");
		dump($data);	
		foreach ($data as $key => $value) {
			$info = array("username"=>$value);
			M("user")->where("id = {$key}")->save($info);
		}
		dump(M("user")->select());

	}
}

 ?>