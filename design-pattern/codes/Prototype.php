<?php 

// Milad As
// milad@tuxgeek.ir
// Design Pattern Basics
// Prototype Pattern

class clone_factory{
	public static function make_copy($object)
	{
		echo "Making a copy of dog...\n";
		return clone $object;
	}
}

class Dog{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function set_name($name)
	{
		$this->name = $name;
	}

	public function get_name()
	{
		return $this->name;
	}
}

$dog1 = new Dog('kashka');

$dog2 = clone_factory::make_copy($dog1);
//$dog2 = $dog1;
$dog2->set_name('rain');

echo "Dog1 name is: " . $dog1->get_name() . "\n";
echo "Dog2 name is: " . $dog2->get_name() . "\n";

//echo spl_object_hash($dog1) . "\n";
//echo spl_object_hash($dog2) . "\n";