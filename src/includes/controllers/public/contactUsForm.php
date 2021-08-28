<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		// Alert messages
		require $layoutsDir . 'public/alert.php';
		
		// Posted Variables
		$name  = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$msg   = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

		if(empty($name) || empty($email) || empty($msg)) {
			alert('Please Type your name, Email, and Message.', 'danger', '', true);
		} elseif (strlen($name) < 3 || strlen($msg) < 3) {
			alert('Please Type a Longer Name and Message.', 'danger', '', true);
		} else {
			// Send Email User Message to Editor
			$to      = 'editor@sudanacademicjournal.net';
			$subject = '[' . $name . '] Sent You New Email';
			$message = $msg;
			// Headers, [ .=  means concatenation to the previous header varibale ]
			$headers = 'From:' . $email . "\r\n";
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=utf-8\n";

			// Send the email
			if(mail($to, $subject, $message, $headers)) {
				// Success Message
				alert('Thank You for Contacting Us. We will be Contacting You as Soon as Possible.<br>Redirecting after <b>5 seconds</b>...', 'success', '', true);
				header('refresh: 5; url=index');
			} else {
				alert('Sorry, The Message Wasn\'t sent correctly, please try later.<br>Redirecting after <b>5 seconds</b>...', 'danger', '', true);
				header('refresh: 5; url=index?p=contact-us');
			}
		}
	endif;