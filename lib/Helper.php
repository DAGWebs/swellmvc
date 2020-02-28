<?php  
	class Helper {
		public static function dnd($data) {
			echo "<pre style='background: gray; color: #832323; padding: 20px; margin: 10px; border-radius: 10px; box-shadow: 7px 7px 7px black;'>";
			var_dump($data);
			echo '</pre>';
			die();
		}

		public static function redirect($url) {
			return header("Location: {$url}");
		}

		public static function reload($time = 0) {
			return header("Refresh: {$time}");
		}

		public static function set_links($links) {
			if(is_array($links)) {
				foreach($links as $link => $value) {
					define(strtoupper($link), $value);
				}
			}
		}

		public static function clean($string) {
			return htmlentities($string, ENT_QUOTES, 'utf-8');
		}
	}