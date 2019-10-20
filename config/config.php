<?php  
	/*====================================================
	=            DEFAULT APPLICATION SETTINGS            =
	====================================================*/
	
	//Application Name
	define('APP_NAME', 'Fallout Solutions');

	//Application Default Controller
	define('DEFAULT_CONTROLLER', 'Home');

	//Application Default Executed Action 
	//please dont change this if you dont know what its for
	define("DEFAULT_ACTION", 'index');
	
	
	
	/*=====  End of DEFAULT APPLICATION SETTINGS  ======*/
	/*========================================
	=            NEEDED CONSTENTS            =
	========================================*/

	//get directory seperator type used for determining os type
	define('DS', DIRECTORY_SEPARATOR);

	//set the root directory
	define('ROOT', dirname(__DIR__) . DS);

	//set the project root to load assets shourl be /on a live webserver
	define('PROOT', '/');
	
	
	/*=====  End of NEEDED CONSTENTS  ======*/


	/*=======================================
	=            DATABASE CONFIG            =
	=======================================*/
	
	define('DB_HOST', "127.0.0.1");
	define('DB_USER', "root");
	define('DB_PASS', "");
	define('DB_NAME', "fallout_solutions");
	
	/*=====  End of DATABASE CONFIG  ======*/

	/*=============================
	=            LINkS            =
	=============================*/
	
	$links = [
		'home' => '/home',
		'login' => '/login',
		'reg' => '/register',
		'dash' => '/dashboard',
		'admin' => '/admin'
	];
	
	/*=====  End of LINkS  ======*/
	
	
	