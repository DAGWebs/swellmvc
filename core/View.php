<?php  

class View {
	public static function render($viewname, $ext=".php") {
		require_once 'app' . DS . 'views' . DS . $viewname . $ext;
	}

	public static function inc($inc) {
		self::render('inc' . DS . $inc);
	}
}