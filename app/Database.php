<?php

namespace App;


class Database {
	private $host;
	private $user;
	private $password;
	private $dbName;


	private $mysqli;
	private static $inst = null;

	public static function Instance() {
		if (self::$inst === null) {
			self::$inst = new Database();
		}
		return self::$inst;
	}

	/**
	 * @return \mysqli
	 */
	function connection() {
		return $this->mysqli;
	}

	function set($host, $user, $password, $dbName) {
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->dbName = $dbName;
	}

	public function all($table, $class) {
		$query = 'SELECT * FROM ' . $table;
		$items = [];
		if ($result = $this->mysqli->query($query)) {

			while ($obj = $result->fetch_object($class)) {
				array_push($items, $obj);
			}
			$result->close();
		}
		return $items;
	}

	function connect() {
		$this->mysqli = new \mysqli($this->host, $this->user, $this->password, $this->dbName);
		return $this->mysqli;
	}

	function insert($table, $params = []) {
		$columns = array_keys($params);
		$values = array_values($params);
		$query = sprintf("INSERT INTO %s (%s) VALUES (%s) ", $table, implode(',', $columns), build_params($values));
		return $this->mysqli->query($query);
	}

	function delete($table, $condition = []) {
		$query = sprintf('DELETE FROM  %s WHERE %s', $table, build_query($condition));
		return $this->mysqli->query($query);
	}

	function update($table, $params = [], $conditions = []) {
		$query = sprintf('UPDATE  %s  SET  %s WHERE %s', $table, build_query($params), build_query($conditions));
		return $this->mysqli->query($query);
	}

	function find($table, $class, $conditions = []) {
		$query = sprintf('SELECT * FROM  %s WHERE %s', $table, build_query($conditions));

		$item = null;
		if ($result = $this->mysqli->query($query)) {
			;
			$item = $result->fetch_object($class);

			$result->close();
		}
		return $item;
	}


}