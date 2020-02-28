<?php 
class Cookie {
	public static function set($name, $value, $time = 1) {
		return setcookie($name, $value, time() + (86400 * $time))
	}

	public static function get($name, $echo = false) {
		if($echo) {
			echo $_COOKIE[$name];
		} else {
			return $_COOKIE[$name];
		}
	}

	public static function delete($name) {
		return setcookie($name, '', time() + -1);
	}
}