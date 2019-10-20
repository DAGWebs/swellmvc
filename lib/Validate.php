<?php  
	class Validate {
		private $_passed = false, $_errors = [], $db = null;

		public function __construct() {
			$this->db = DB::getInstance();
		}

		public function check($source, $items=[]) {
			$this->_errors = [];

			foreach($items as $item => $rules) {
				$item = Helper::clean($item);
				$display = $rules['display'];

				foreach($rules as $rule => $rule_value) {
					$value = Helper::clean(trim($source[$item]));

					if($rule === 'required' && empty($value))  {
						$this->addError(["{$display} is a required field.", $item]);
					} else if(!empty($value)) {
						switch ($rule) {
							case 'min':
								if(strlen($value) < $rule_value) {
									$this->addError(["{$display} must be a minimum of {$rule_value} characters long.", $item]);
								}
								break;
							case 'max':
								if(strlen($value) > $rule_value) {
									$this->addError(["{$display} can only be a maximum of {$rule_value} characters long.", $item]);
								}
								break;
							case 'unique':
								$query = $this->db->select($rule_value[0], $rule_value[1], $rule_value[2]);
								if($this->db->query_worked()) {
									$this->addError(["Your {$display} already exists in our system.", $item]);
								}
								break;
							case 'is_numeric':
								if(!is_numeric($value)) {
									$this->addError(["The {$display} field must be numeric.", $item]);
								}
								break;
							case 'is_email':
								if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
									$this->addError(["You must use a real email!", $item]);
								}
								break;
						}
					}
				}
			}
		}

		public function addError($error) {
			$this->_errors[] = $error;

			if(empty($this->_errors)) {
				$this->_passed = true;
			} else {
				$this->_passed = false;
			}
		}
	}
?>