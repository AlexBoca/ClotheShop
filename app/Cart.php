<?php

namespace App;


class Cart {
	private $products_list = [];

	function all() {
		return $this->products_list;
	}

	function add(Product $product) {
		$this->products_list[$product->id] = $product;
	}

	function remove($id) {
		if (!empty($id) && $this->has($id)) {
			unset($this->products_list[$id]);
		}
	}

	function has($id) {
		return isset($this->products_list[$id]);
	}

	function count() {
		return count($this->products_list);
	}

	function deleteAll() {
		$this->products_list = [];
	}


}