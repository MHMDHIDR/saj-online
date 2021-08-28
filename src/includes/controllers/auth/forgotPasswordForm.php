<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		// Post variables
		$username = htmlentities($_POST['username']);
		$email	 	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

		// Alert messages
		require $layoutsDir . 'public/alert.php';

		if(empty($username) || empty($email)) {
			alert('Both of your registered Username and Email are Required to Resest Your Password. if you can\' remember them please <a href="index?p=contact-us"><b>Contact Us</b></a>', 'danger', '', true);
		} else {
			// Database connection
			require 'src/dbcon.php';

			// Check if The User Exists
			$stmt = $con->prepare('SELECT mem_uname, mem_email, mem_status FROM saj_members WHERE mem_uname = ? AND mem_email = ?');
			$stmt->execute(array($username, $email));
			$count = $stmt->rowCount();
			$rows  = $stmt->fetchAll();
			if(!empty($rows)) {
				// Check if Status is not equal to 0 [ Not Activated ]
				foreach ($rows as $row) {
					$status = $row['mem_status'];
				}
			}

			// If Yes Then Rest Pass
			if($count > 0) {
				if($status != 0) {
					// Generate a random hash
					$passHash = md5(rand(0,10000));

					// Insert the hash in the user's records
					$stmt = $con->prepare('UPDATE saj_members SET mem_hash = ? WHERE mem_uname = ?');
					$stmt->execute(array($passHash, $username));

					// Send Email to the User contains the reset info
					$headers = 'From:editor@sudanacademicjournal.net' . "\r\n";
					$to      = $email;
					$subject = 'Reset '.$username.' Password.';
					$message = '
						We have recieved a reset password request from you [ ' . $username . ' ], if you did request a new password please proceed and click the link below or copy it and paste it into your browser, otherwise please ignore this message.

						___________________________________________________________________
						Please click this link to reset your password:
						https://'. $_SERVER['HTTP_HOST'] .'/SudanAcademicJournal/auth?sign=forgot-password&do=new-pass&e='.$email.'&h='.$passHash.'
						___________________________________________________________________
					';
					// Send the email
					mail($to, $subject, $message, $headers);
					// Display success message
					alert('We have sent you the information to reset your password, please check it out.<br>
						Refreshing in 10 Seconds...', 'info', 'text-capitalize', true);
					header('refresh: 10; url= auth?sign=forgot-password');
				} else {
					// Status is equal to 0 [ Not Activated Account ], activation needed
					alert('You need to Activate your Account first before resetting the password.<br>
					Refreshing in 3 Seconds..', 'danger', 'text-capitalize', true);
				header('refresh: 3; url= auth?sign=forgot-password');
				}
			} else {
				alert('Username or Email is wrong.', 'danger', 'text-capitalize', true);
			}
		}
	endif;