<?php 
Class TestAction extends Action{

	Public function deal(){
		$user=M("user")->select();
		foreach ($user as $key => $value) {
			// dump($value);
			echo "{ProvinceName:\"".$value["city"]."\",";
			echo "LatLng:[".$value["longitude"].",".$value["latitude"]."]},</br>";
		}
	}
}

 ?>