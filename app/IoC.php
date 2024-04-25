<?php

namespace ControleAlunos;

class IoC {
	protected $registry = array();
	public function __set($name, $resolver)
	{
		$this->registry[$name] = $resolver;
	}
	public function __get($name)
	{
		return $this->registry[$name]();
	}
}


/*
$c = new IoC;
$c->mailer = function() {
  $m = new Mailer;
  // create new instance of mailer 
  // set creds, etc. 
  
  return $m;
};
// Fetch, boy 
$mailer = $c->mailer; // mailer instance
*/