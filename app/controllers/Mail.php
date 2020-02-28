<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

Class Mail {

	protected $debug = 0, $host = EMAIL_HOST, $username = EMAIL_USERNAME, $password = EMAIL_PASSWORD, $port = 465, $domain = DOMAIN;


	public function viewAction($email_template) {
		View::render('mail_templates' . DS . $email_template);
	}

	public function register($to, $subject, $body, $cc = [], $bcc = [], $atc = []) {
		// Load Composer's autoloader
		require 'vendor/autoload.php';

		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                      // Enable verbose debug output
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = $this->host;                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = $this->username;                     // SMTP username
		    $mail->Password   = $this->password;                               // SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		    $mail->Port       = $this->port;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('acounts@' . $this->domain, 'Accounts | ' . APP_NAME);

		    if(is_array($to)) {
		    	foreach($to as $email) {
		    		$mail->addAddress($email);     // Add a recipient
		    	}
		    } else {
		    	$mail->addAddress($to);     // Add a recipient
		    }              // Name is optional
		    $mail->addReplyTo('support@' . $this->domain, 'Support');
		    
		    if(is_array($cc)) {
		    	foreach($cc as $email) {
		    		$mail->addCC($email);
		    	}
		    } else {
		    	$mail->addCC($cc);
		    }

		     if(is_array($bcc)) {
		    	foreach($bcc as $email) {
		    		$mail->addBCC($email);
		    	}
		    } else {
		    	$mail->addBCC($bcc);
		    }

		     if(is_array($atc)) {
		    	foreach($atc as $att) {
		    		$mail->addAttachment($att);
		    	}
		    } else {
		    	$mail->addAttachment($atc);
		    }

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $body;
		    $mail->AltBody = 'This is the registration confirmation email for ' . APP_NAME;

		    $mail->send();
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

	public function support($to, $subject, $body, $cc = [], $bcc = [], $atc = []) {
		// Load Composer's autoloader
		require 'vendor/autoload.php';

		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                      // Enable verbose debug output
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = $this->host;                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = $this->username;                     // SMTP username
		    $mail->Password   = $this->password;                               // SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		    $mail->Port       = $this->port;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('support@' . $this->domain, 'Support | ' . APP_NAME);

		    if(is_array($to)) {
		    	foreach($to as $email) {
		    		$mail->addAddress($email);     // Add a recipient
		    	}
		    } else {
		    	$mail->addAddress($to);     // Add a recipient
		    }              // Name is optional
		    $mail->addReplyTo('support@' . $this->domain, 'Support');
		    
		    if(is_array($cc)) {
		    	foreach($cc as $email) {
		    		$mail->addCC($email);
		    	}
		    } else {
		    	$mail->addCC($cc);
		    }

		     if(is_array($bcc)) {
		    	foreach($bcc as $email) {
		    		$mail->addBCC($email);
		    	}
		    } else {
		    	$mail->addBCC($bcc);
		    }

		     if(is_array($atc)) {
		    	foreach($atc as $att) {
		    		$mail->addAttachment($att);
		    	}
		    } else {
		    	$mail->addAttachment($atc);
		    }

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $body;
		    $mail->AltBody = 'This is the Support confirmation email for ' . APP_NAME;

		    $mail->send();
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

	public function admin($to, $subject, $body, $cc = [], $bcc = [], $atc = []) {
		// Load Composer's autoloader
		require 'vendor/autoload.php';

		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                      // Enable verbose debug output
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = $this->host;                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = $this->username;                     // SMTP username
		    $mail->Password   = $this->password;                               // SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		    $mail->Port       = $this->port;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('admin@' . $this->domain, 'Accounts | ' . APP_NAME);

		    if(is_array($to)) {
		    	foreach($to as $email) {
		    		$mail->addAddress($email);     // Add a recipient
		    	}
		    } else {
		    	$mail->addAddress($to);     // Add a recipient
		    }              // Name is optional
		    $mail->addReplyTo('support@' . $this->domain, 'Support');
		    
		    if(is_array($cc)) {
		    	foreach($cc as $email) {
		    		$mail->addCC($email);
		    	}
		    } else {
		    	$mail->addCC($cc);
		    }

		     if(is_array($bcc)) {
		    	foreach($bcc as $email) {
		    		$mail->addBCC($email);
		    	}
		    } else {
		    	$mail->addBCC($bcc);
		    }

		     if(is_array($atc)) {
		    	foreach($atc as $att) {
		    		$mail->addAttachment($att);
		    	}
		    } else {
		    	$mail->addAttachment($atc);
		    }

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $body;
		    $mail->AltBody = 'This is the admin confirmation email for ' . APP_NAME;

		    $mail->send();
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}