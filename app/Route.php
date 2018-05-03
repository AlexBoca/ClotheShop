<?php

namespace App;

class Route{
	private $_uri = [];

	public function add($uri,$controller,$action){
		$this->_uri[$uri] =['controller' => $controller, 'action' => $action];
		return $this;
	}

	public function get($name){
		return $this->_uri[$name];
	}
}