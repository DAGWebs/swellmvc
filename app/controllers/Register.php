<?php 
class Register {
	public function indexAction() {
		View::render('register/index');
	}

	public function submitAction() {
		if(isset($_POST['register_action'])) {
			$username = DB::getInstance()->escape(Helper::clean($_POST['username']));
			$emaill = DB::getInstance()->escape(Helper::clean($_POST['email']));
			$password = DB::getInstance()->escape(Helper::clean($_POST['password']));
			$cpassword = DB::getInstance()->escape(Helper::clean($_POST['cpassword']));

			$errors = [];

			if(!isset($_POST['terms'])) {
				$errors[] = "You must agree with our Terms of Service";
			} else {
				if(empty($username)) {
					$errors[] = "Your username can not be left empty";
				} else {
					$sql = "SELECT * FROM users WHERE user_username = '$username'";

					if(DB::getInstance()->query_worked($sql)) {
						$errors[] = "The username: {$username} is already registered with us.";
					}

					if(strlen($username) < 6) {
						$errors[] = "Your username must be at least 6 characters";
					}
				}

				if(empty($email)) {
					$errors[] = "Your email can not be left empty";
				} else {
					$sql = "SELECT * FROM users WHERE user_email = '$email'";

					if(DB::getInstance()->query_worked($sql)) {
						$errors[] = "The email: {$email} is already registered with us.";
					}

					if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$errors[] = "You must use a valid email";
					}
				}

				if(empty($password)) {
					$errors[] = "Your password can not be left empty";
				} else {
					if(strlen($password) < 8) {
						$errors[] = "Your password must be at least 8 characters";
					}
				}

				if(empty($cpassword)) {
					$errors[] = "Your confirm password can not be left empty";
				}
			}

			if(!empty($errors)) {
				$_SESSION['errors'] = $errors;
				$_SESSION['fields'] = ['username' => $username, 'email' => $email];

				Helper::redirect('/register');
			} else {
				$password = password_hash($password, PASSWORD_DEFAULT);
				$code = md5($username . $email . $password);
				$sql = "INSERT INTO users ('user_username, user_email, user_password, user_code') VALUES";
				$sql .= " ('$username', '$email', '$password', '$code')";

				DB::getInstance()->query($sql);

				$_SESSION['account_created'] = [$username, $email];

				$body = '<body style="background-color: #222; margin: 0; padding: 0;">
							<div style="background-color: #fcfcfc; margin-top: -21px;">
								<h1 style="text-align: center; padding: 10px;">Thanks For Registering</h1>
							</div>
							<hr>
							<div style="margin: 10px 0; padding: 10px; background-color: #cfcfcf; box-shadow: 3px 3px 3px black;">
								<p>Hello, ' . $username . ',</p>
								<p>Thanks for registering with ' . APP_NAME . '. We are happy to have you here. If you have any question please email <a href="#"> ' . SUPPORT_EMAIL . '</a> or submit a ticket to our <a href="#">Support ticket System</a>! You can also view our <a href="#">F. A. Q.</a></p>
							</div>
							<hr>
							<div style="margin: 10px 0; padding: 10px; background-color: #cfcfcf; box-shadow: 3px 3px 3px black;">
								<p>Please view your accont infomation below and ensure it is correct. If your infomation is inccorect you can submit a ticket or login to change your account information.</p>
								<p>Username: ' . $username . '</p>
								<p>Email: ' . $email . '</p>
								<p>Password: ********* (hidden due to security)</p>
							</div>
							<div style="margin: 10px 0; padding: 10px; background-color: #cfcfcf; box-shadow: 3px 3px 3px black;">
								<p>This CadSystem (SimpleCad) was developed by the DAG Development Network. You can visit us at <a href="#">https://daghq.net</a>. we are a freelance development network. We develop all types of software from web software to Artificial Intelegance. We are broken into several different orginizations.</p>
								<p>We focus in to three main departments: </p>
								<ol>
									<li>Software Development</li>
									<li>Information Technology</li>
									<li>Cyber Security</li>
								</ol>

								<p>You can view more information for each of our departments.</p>
							</div>
							<div style="background-color: #fcfcfc; padding: 5px;">
								<h5 style="text-align: center; padding: 10px;"><small>&copy; copyright 2020 ' . APP_NAME . '. All rights reserved!</small></h5>
							</div>
						</body>';

				Mail::register($email, 'Thanks For Registering', $body, [SUPPORT_EMAIL]);

				Session::set('user_register', 'success');

				Helper::redirect('/login');
			}
		} else {
			$_SESSION['errors'] = ["Your info was not submitted."];
			$_SESSION['fields'] = ['username' => '', 'email' => ''];
			Helper::redirect('/register');
		}
	}
}