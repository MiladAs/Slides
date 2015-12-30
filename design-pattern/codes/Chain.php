<?php

// Base from: dsheiko
// Milad As

abstract class Logger{

	private $next = null;
	
	final public function set_next($next_chain)
	{
		$this->next = $next_chain;
		return $this->next;
	}
	
	final public function log($message)
	{
		$this->_log($message);
		
		if($this->next !== null)
		{
			$this->next->log($message);
		}
	}
}

class EmailLogger extends Logger{
	
	/*
	function __construct()
	{
		$this->set_next(new StdLogger());
	}
	*/

	public function _log($message)
	{
		echo "Sending via email: ", $message, " \n";
	}
}

class StdLogger extends Logger{

	public function _log($message)
	{
		echo "Printing in std standard: ", $message, " \n";
	}
}

class ErrLogger extends Logger{

	public function _log($message)
	{
		echo "ErrLogger Says: ", $message, " \n";
	}
}

$logger = new EmailLogger();
$logger->set_next(new StdLogger());
// $logger->set_next(new StdLogger())->log('std???' . "\n");
$logger->log('this is log message');
// $logger->set_next(new StdLogger())->set_next(new ErrLogger());
