<?php

// Milad As
// milad@tuxgeek.ir
// Design Pattern Basics
// Singleton Pattern

class singleton{
	
	private function __construct(){}
	
	private static $instance = null;
	
	public static function get_instance()
	{
		if( self::$instance == null)
		{
			self::$instance = new singleton();
		}
	
		return self::$instance;
	}
	
	public function get_name()
	{
		echo 'singleton class name';
	}
}

$object = singleton::get_instance();
$object->get_name();