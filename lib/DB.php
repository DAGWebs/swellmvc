<?php  

class DB {
	private static $_instance = null;
	private $_connect, $_error = false, $_result, $_count, $_lastInsertId = null;

	private function __construct() {
		$this->_connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new DB();
		}

		return self::$_instance;
	}

	public function query($sql) {
		if($this->_connect) {
			$con = $this->_connect;

			$query = mysqli_query($con, $sql);

			if($query) {
				return $query;
			} else {
				$this->_error = true;
			}
		} else {
			Helper::dnd("Could not connect to database!");
		}
	}

	public function insert($table, $fields) {
		if(!is_array($fields)) {
			Helper::dnd("You must use an associtive array to define the fields");
		} else {
			$fieldString = '';
			$valueString = '';

			foreach($fields as $field => $value) {
				$fieldString .= $field . ', ';
				$valueString .= "'" . $value . "', ";
			}

			$fieldString = rtrim($fieldString, ', ');
			$valueString = rtrim($valueString, ', ');

			$sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";

			$query = $this->query($sql);

			if(!$this->error()) {
				return $query;
			}
		}
	}

	public function select($table, $selecting = [], $selector = [], $condition = '') {
		if(!empty($selecting) || $selector) {
			if(is_array($selecting)) {
				$selectionString = '';
				foreach($selecting as $selectorPart => $value) {
					$selectionString .= $selectorPart . " = '" . $value . "' " . $condition . ' ';
				}
				$selectionString = rtrim($selectionString, " $condition ");

				$sql = "SELECT * FROM {$table} WHERE {$selectionString}";
			} else {
				$sql = "SELECT * FROM {$table} WHERE {$selecting} = '{$selector}'";
			}
		} else {
			$sql = "SELECT * FROM {$table}";
		}

			$query = $this->query($sql);

			if(!$this->error()) {
				return $query;
		}
	}

	public function update($table, $id, $param, $selecting = [], $selector = []) {
		if(is_array($selecting)) {
			$updateString = '';

			foreach($selecting as $selectPart => $value) {
				foreach($selecting as $selectorPart => $value) {
					$updateString .= $selectorPart . " = '" . $value . "', ";
				}
				$updateString = rtrim($updateString, ", ");

				$sql = "UPDATE {$table} SET {$updateString} WHERE {$param} = '{$id}'";
			}
		}

		$sql = "UPDATE {$table} SET {$selecting} = '{$selector}' WHERE {$param} = '{$id}'";

		$query = $this->query($sql);

		if(!$this->error()) {
			return $query;
		}
	}

	public function delete($table, $condition, $id) {
		$sql = "DELETE FROM {$table} WHERE {$condition} = '{$id}'";

		$query = $this->query($sql);

		if(!$this->error()) {
			return $query;
		}
	}

	public function escape($sql) {
		return mysqli_real_escape_string($this->_connect, $sql);
	}

	public function assoc($query) {
		return mysqli_fetch_assoc($query);
	}

	public function rows($query) {
		return mysqli_num_rows($query);
	}

	public function query_worked($query) {
		if($this->rows($query) > 0) {
			return true;
		} else {
			return false;
		}
	}

	private function error() {
		if($this->_error) {
			return true;
		} else {
			return false;
		}
	}
}

