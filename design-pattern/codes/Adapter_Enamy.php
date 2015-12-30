<?php

// Milad As
// milad@tuxgeek.ir
// Design Pattern Basics
// Adapter Pattern

interface Enemy{
	function open_fire();
	function drive();
}

class Enemy_tank implements Enemy{
	function open_fire()
	{
		echo "Enemy tank fires...\n";
	}
	
	function drive()
	{
		echo "Enemy tank driving...\n";
	}
}

class Enemy_helicopter{
	function rifle()
	{
		echo "Enemy helicopter shoting with rifle\n";
	}
	
	function fly()
	{
		echo "Enemy helicopter flying\n";
	}
}

// Liskov
class Enemy_helicopter_adapter implements Enemy{
	private $Enemy_helicopter;
	
	function __construct($Enemy_helicopter)
	{
		$this->Enemy_helicopter = $Enemy_helicopter;
	}

	function open_fire()
	{
		$this->Enemy_helicopter->rifle();
	}
	
	function drive()
	{	
		$this->Enemy_helicopter->fly();
	}
}

$b = new Enemy_tank();
$b->open_fire();
$b->drive();

$ah = new Enemy_helicopter();
$a = new Enemy_helicopter_adapter($ah);
$a->open_fire();
$a->drive();