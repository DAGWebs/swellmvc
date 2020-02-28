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
				$sql = "INSERT INTO users ('user_username, user_email, user_password, user_code') VALUES";
				$sql .= " ('$username', '$email', '$password', '$code')";

				DB::getInstance()->query($sql);

				$_SESSION['account_created'] = [$username, $email];

				Helper::redirect('/login');
			}
		} else {
			$_SESSION['errors'] = ["Your info was not submitted."];
			$_SESSION['fields'] = ['username' => '', 'email' => ''];
			Helper::redirect('/register');
		}
	}
}