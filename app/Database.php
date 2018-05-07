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

	function connect() {
		$this->mysqli = new \mysqli($this->host, $this->user, $this->password, $this->dbName);
		return $this->mysqli;
	}

	public function all($table, $class) {
		$query = sprintf("SELECT * FROM %s", $table);
		$stmt = $this->mysqli->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$items = [];
		if ($result) {

			while ($obj = $result->fetch_object($class)) {
				array_push($items, $obj);
			}
			$result->close();
		}

		return $items;
	}


	function insert($table, $params = []) {
		$columns = array_keys($params);
		$query = sprintf("INSERT INTO %s (%s) VALUES (%s) ", $table, implode(',', $columns), $this->constructValues($params));
		$stmt = $this->mysqli->prepare($query);
		$this->DynamicBindVariables($stmt, array_values($params));
		$result = $stmt->execute();
		$stmt->close();
		return $result;

	}

	function delete($table, $condition = []) {
		$query = sprintf('DELETE FROM  %s WHERE id=%s', $table, $this->constructValues($condition));
		$stmt = $this->mysqli->prepare($query);
		$this->DynamicBindVariables($stmt, array_values($condition));
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}

	function update($table, $params = [], $conditions = []) {
		$query = sprintf('UPDATE  %s  SET %s WHERE id=%s', $table, implode(', ', $this->constructValues($params, true)), $this->constructValues($conditions));
		$stmt = $this->mysqli->prepare($query);
		$this->DynamicBindVariables($stmt, array_values(array_merge($params, $conditions)));
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}

	function find($table, $class, $conditions = []) {
		$query = sprintf('SELECT * FROM  %s WHERE %s', $table, implode(', ', $this->constructValues($conditions, true)));
		$stmt = $this->mysqli->prepare($query);
		$this->DynamicBindVariables($stmt, array_values($conditions));
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		$item = null;
		if ($result) {
			$item = $result->fetch_object($class);
			$result->close();
		}
		return $item;
	}

	function constructValues($params, $isWhere = false) {
		if ($isWhere === true) {
			$setFormat = [];
			foreach ($params as $key => $value) {
				$setFormat[] = $key . '=' . '?';
			}
			return $setFormat;
		}
		$values = [];
		for ($i = 0; $i < count($params); $i++) {
			$values[] = '?';
		}
		return implode(',', $values);
	}

	public function DynamicBindVariables($stmt, $params) {

		if ($params != null) {
			// Generate the Type String (eg: 'issisd')
			$types = '';
			foreach ($params as $param) {
				if (is_int($param)) {
					// Integer
					$types .= 'i';
				} elseif (is_float($param)) {
					// Double
					$types .= 'd';
				} elseif (is_string($param)) {
					// String
					$types .= 's';
				} else {
					// Blob and Unknown
					$types .= 'b';
				}
			}
			// Add the Type String as the first Parameter
			$bind_names[] = $types;
			// Loop thru the given Parameters
			for ($i = 0; $i < count($params); $i++) {
				// Create a variable Name
				$bind_name = 'bind' . $i;
				// Add the Parameter to the variable Variable
				$$bind_name = $params[$i];
				// Associate the Variable as an Element in the Array
				$bind_names[] = &$$bind_name;
			}

			// Call the Function bind_param with dynamic Parameters
			call_user_func_array(array($stmt, 'bind_param'), $bind_names);
		}
		return $stmt;
	}


}