<?php 
class Session {
	public static function set($name, $value) {
		return $_SESSION[$name] = $value;
	}

	public static function get($name, $echo = false) {
		if($echo) {
			echo $_SESSION[$name];
		} else {
			return $_SESSION[$name];
		}
	}

	public static function delete($name) {
		return unset($_SESSION[$name]);
	}

	public static function logout() {
		Cookie::delete('user_loggedin');
		session_destroy();
	}
}