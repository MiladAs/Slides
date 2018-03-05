<?php

/*
  By: Ravexina (Milad As)
  --: Design Pattern Basics
  --: Strategy Pattern
  --: Base idea from newthinkthank
    : https://github.com/ravexina
    : https://github.com/ravexina/slides
*/

class animal{
	private $name;
	private $sound;
	protected $fly_type;
	
	function set_name($name){
		$this->name = $name; 
	}
	
	function set_sound($sound){
		$this->sound = $sound;
	}
	
	function set_fly_type(fly $type){
		$this->fly_type = $type;
	}
	
	function get_name(){
		echo $this->name;
	}
	
	function get_sound(){
		echo $this->sound;
	}
	
	function try_fly()
	{
		$this->fly_type->fly();
	}
}

interface fly{
	function fly();
}

class can_fly implements fly{

	function fly(){
		echo 'i\'m flying';
	}
}

class cant_fly implements fly{

	function fly(){
		echo 'i can\'t fly';
	}
}

class dog extends animal{
	
	function __construct($name){
		$this->set_sound('bark');
		$this->set_name($name);
		$this->fly_type = new cant_fly();
	}
}

class bird extends animal{

	function __construct($name){
		$this->set_sound('koko');
		$this->set_name($name);
		$this->fly_type = new can_fly();
	}
}

$kashka = new dog('kashka`');
$kashka->try_fly();
echo "\n";
// something happend
$kashka->set_fly_type(new can_fly());
$kashka->try_fly();