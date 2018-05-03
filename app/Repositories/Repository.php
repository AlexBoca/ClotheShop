<?php

namespace App\Repositories;


abstract class Repository {
	protected $model;
	protected $table;


	function all() {
		return db()->all($this->table, $this->model);
	}

	function find($conditions) {
		return db()->find($this->table, $this->model, $conditions);
	}

	function delete($conditions) {
		return db()->delete($this->table, $conditions);
	}

	function insert($params) {
		return db()->insert($this->table, $params);
	}

	function update($params, $condition) {
		return db()->update($this->table, $params, $condition);
	}
}