<?php  
	/*====================================================
	=            DEFAULT APPLICATION SETTINGS            =
	====================================================*/
	
	//Application Name
	define('APP_NAME', 'SimpleCad');

	//your support email
	define('SUPPORT_EMAIL', 'support@daghq.com');

	//website URL
	define('WEBSITE', 'http://localhost');

	//Application Default Controller
	define('DEFAULT_CONTROLLER', 'login');

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

	/*========================================
	=            Your email creds            =
	========================================*/

	/**
	 *
	 * YOU CAN CREATE YOUR OWN EMAIL FUNCTION BY 
	 * COPY AND PASTE ONE OF MY FUNCTIONS AND 
	 * CHANGING THE FUNCTION NAME IE. FUNCTION REGISTER()
	 * YOU CHANGER REGISTER TO SOMETHING ELSE
	 * CHANGE REGISTER@ TO FUNCTIONNAME@
	 * iT SHOULD LOOK LIKE 
	 * $mail->setFrom('FUNCTIONNAME@' . $this->domain, 'FUNCTIONNAME | ' . APP_NAME);
	 *
	 */
	
	
	define('DOMAIN', 'daghq.com'); //please use your domain name with out http or https IE daghq.net
	define('EMAIL_HOST', 'mail.daghq.com'); //your email host IE mail.yourdomain.com
	define('EMAIL_USERNAME', 'support@daghq.com'); // your email username IE email@yourdomain.com
	define('EMAIL_PASSWORD', 'Cartarman1'); //email password IE SecretPassword 
	define('EMAIL_PORT', 465); //Email SMTP Port usualy 465 or 25
	
	/*=====  End of Your email creds  ======*/
	
	
	
	