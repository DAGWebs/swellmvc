<?php 

require_once "config/config.php";

spl_autoload_register(function($class) {
	if(file_exists(ROOT . 'app' . DS . 'controllers' . DS . $class . '.php')) {
		require_once ROOT . 'app' . DS . 'controllers' . DS . $class . '.php';	
	} else if(file_exists(ROOT . 'app' . DS . 'models' . DS . $class . '.php')) {
		require_once ROOT . 'app' . DS . 'models' . DS . $class . '.php';
	} else if(file_exists(ROOT . 'lib' . DS . $class . '.php')) {
		require_once ROOT . 'lib' . DS . $class . '.php';
	} else if(file_exists(ROOT . 'core' . DS . $class . '.php')) {
		require_once ROOT . 'core' . DS . $class . '.php';
	}
});

Helper::set_links($links);

$url = $_SERVER['REQUEST_URI'];
$url = rtrim($url, '/');
$url = ltrim($url, '/');
$url = explode('/', $url);

if(!empty($url)) {
	$controller_name = $url[0];
} else {
	$controller_name = DEFAULT_CONTROLLER;
}

array_shift($url);

if(!empty($url)) {
	$action_name = $url[0] . "Action";
} else {
	$action_name = DEFAULT_ACTION . "Action";
}

array_shift($url);

if(!empty($url)) {
	if(class_exists($controller_name) && method_exists(new $controller_name, $action_name)) {
		call_user_func_array([$controller_name, $action_name], $url);
	} else {
		echo "display page not found";
	}
} else {
	if(class_exists($controller_name) && method_exists(new $controller_name, $action_name)) {
		$controller = new $controller_name;
		$controller->$action_name();
	} else {
		echo "display page not found";
	}
}

