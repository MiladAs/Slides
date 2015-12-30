<?php 

// Milad As
// milad@tuxgeek.ir
// Design Pattern Basics
// Decorator Pattern

abstract class Coffee{
	protected $desc = '';
	
	public function getDesc()
	{
		return $this->desc;
	}

	public abstract function cost();
}

class France extends Coffee{

	public function __construct(){
		$this->desc = 'France ';
	}

	public function cost(){
		return 3;
	}
}

class Turk extends Coffee{

	public function __construct(){
		$this->desc = 'Turk ';
	}

	public function cost(){
		return 1;
	}
}

class Suger{
	private $coffee;
	
	function __construct($coffee){
		$this->coffee = $coffee;
	}

	public function getDesc(){
		return $this->coffee->getDesc() . ' Suger';
	}

	public function cost(){
		return $this->coffee->cost() + 1.1;
	}
}

class Milk{
	private $coffee;
	
	function __construct($coffee){
		$this->coffee = $coffee;
	}

	public function getDesc(){
		return $this->coffee->getDesc() . ' Milk';
	}

	public function cost(){
		return $this->coffee->cost() + 2.1;
	}
}

$c = new Turk;
$c = new Milk($c);
$c = new Milk($c);
$c = new Suger($c);
echo $c->cost() . "\n";
echo $c->getDesc() . "\n";

// $c = new France;
// $c = new Suger($c);
// echo $c->cost();