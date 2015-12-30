<?php

// Milad As
// milad@tuxgeek.ir
// Design Pattern Basics
// Observer Pattern

interface subject{
	function sub_observer(client $observer);
	function unsub_observer(client $observer);
	function notify_observer();
}

interface observer{
	function update($book_name);
}

class publisher implements subject{
	private $observers = [];
	private $book_name;
	private $publisher_name;
	
	function __construct($name){
		$this->publisher_name = $name;
	}
	
	function set_last_book_name($str){
		$this->book_name = $str;
		$this->notify_observer();
	}
	
	function sub_observer(client $observer){
		array_push($this->observers, $observer);
		echo "{$observer->get_name()} subscribed into {$this->publisher_name} list!\n";
	}
	
	function unsub_observer(client $observer){
		$key = array_search($observer, $this->observers);
		unset($this->observers[$key]);
		$observer->update('');
		echo "{$observer->get_name()} has been removed from {$this->publisher_name} list! \n";
	}
	
	function notify_observer(){
		foreach ($this->observers as $observer){
			$observer->update($this->book_name);
		}
	}
	
}

class client implements observer{
	
	private $name;
	private $last_publisher_book;
	
	function __construct($name){
		$this->name = $name;
	}
	
	function update($book_name){
		$this->last_publisher_book = $book_name;
	}
	
	function last_book(){
		echo "Hi {$this->name}, last book is: {$this->last_publisher_book}\n";
	}
	
	function get_name(){
		return $this->name;
	}
}

$p1 = new publisher('Publisher 1');
$p2 = new publisher('Publisher 2');

$c1 = new client('Milad');
$c2 = new client('I\'zack');

$p1->sub_observer($c1);
$p2->sub_observer($c2);

$p2->set_last_book_name('Cooking By JNG'); // :))

$c2->last_book();

$p1->set_last_book_name('Design Pattern');
$p2->set_last_book_name('C++ By JNG'); // You got it now :D
$p1->set_last_book_name('Refactoring');

$c1->last_book();
$c2->last_book();

$p1->unsub_observer($c1);

$c2->last_book();
$c1->last_book();
