<?php
		if(isset($_GET['sendTo'])) {
			if($_SERVER['REQUEST_METHOD'] == 'POST'):

				// POST Variables
				$subj  = trim($_POST['subject']);
				$mssg  = trim($_POST['message']);
				$eml   = $_POST['email'];

				// Require alert
				require_once $layoutsDir . 'alert.php';

				if(!isset($eml) || empty($eml)) {
					alert('Sorry, But the Author Email Wasn\'t Found, We Couldn\'t Send The Email Correctly.<br>Redirecting in 3 Seconds...', 'danger', 'text-capitalize', false);
					header('refresh: 2;url=articles?status=Unapproved');
					require_once $layoutsDir . 'footer.php';
					exit();
				}

				// Send Comment Email
				$to      = $eml;
				$subject = $subj;
				$message = $mssg;
				$headers = 'From:editor@sudanacademicjournal.net' . "\r\n";
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=utf-8\n";
				// Send the email
				if(mail($to, $subject, $message, $headers)) {
					alert('You have successfully sent the comment.', 'success', 'text-capitalize', true);
				} else {
					alert('Sorry, The Message Was\'nt send correctly', 'danger', 'text-capitalize', true);
				}
				header('refresh: 2;url=articles?status=Unapproved');
			endif;
			// End if post request
	} else {
		// Else not set $_GET(sendTo)
		echo "Sorry, Something Went Wrong!";
	}