<?php 
class Login {
	public function indexAction() {
		View::render('login/index');
	}

	public function submitAction() {
		if(isset($_POST['login_action'])) {
			
		}
	}
}