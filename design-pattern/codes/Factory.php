<?php

// Milad As
// milad@tuxgeek.ir
// Design Pattern Basics
// Factory Pattern

abstract class Enamy{
	
	private $name;
	private $power;
	
	public function set_name($name){
		$this->name = $name;
	}

	public function get_name(){
		return $this->name;
	}
	
	public function set_power($power){
		$this->power = $power;
	}
	
	public function get_power(){
		return $this->power;
	}
	
	public function display(){
		echo 'enamy ' . $this->name . ' is on screen';
	}
	public function attack() {
		echo 'attacking with power: ' . $this->power;
	}
}

class Russian_Enamy extends Enamy{
	public function __construct()
	{
		$this->set_name('russian');
		$this->set_power(40);
	}
}

class American_Enamy extends Enamy{
	public function __construct()
	{
		$this->set_name('american');
		$this->set_power(37);
	}
}

class American_Navy_Enamy extends American_Enamy{
	public function __construct()
	{
		$this->set_name('american navy');
		$this->set_power(57);
	}
}

class Enamy_Factory{
	public function enamy_maker($enamy_type)
	{	
		switch ($enamy_type){
			case 'r' :
				return new Russian_Enamy();
				break;
			case 'a' :
				return new American_Enamy();
				break;
			case 'an' :
				return new American_Navy_Enamy();
				break;
			default:
				return null;
				break;
		}
	}
}


$enamy_factory_object = new Enamy_Factory();

$h = fopen ("php://stdin","r");

while(1){
	echo 'Enter enamy type:';
	$input = fgets($h);
	$e = $enamy_factory_object->enamy_maker(trim($input));
	if($e == null) break;
	$e->display();
	echo "\n";
	$e->attack();
	echo "\n";
	unset($e);
}

echo 'Dosvidania';