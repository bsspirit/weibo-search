<?php 

class DateService{
	
	public static function now(){
		return date('Y-m-d h:i:s');
	}
	
	public static function nowInt(){
		return date('Ymdhis');
	}
	
	public static function today(){
		return date('Y-m-d');
	}
	
	public static function time(){
		return date('h:i:s');
	}

}

?>