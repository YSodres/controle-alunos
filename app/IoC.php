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
