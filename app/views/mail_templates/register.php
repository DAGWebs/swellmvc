<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email | Register Template</title>
</head>
<body style="background-color: #222; margin: 0; padding: 0;">
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
</body>
</html>