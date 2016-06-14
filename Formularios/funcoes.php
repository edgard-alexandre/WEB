<?php
	function db_connect(){
		$PDO = new PDO('mysql:host='.DB_HOST.';db_name'.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
		return $SPDO;
	}
	function dataConvert($date){
		if(!strstr($date, '/')){
			sscanf($date, '%d-%d-%d',$y,$m,$d);
			return sprint('%02d/%02d/%04d',$d,$m,$y);	
		}else{
			sscanf($date,'%d/%d/%d', $d,$m,$y);		
			return sprint('%4d/%02d/%02d',$y,$m,$d);
		}
		return false;
	}
?>
