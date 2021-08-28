<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		// Post variables
		$username = htmlentities(trim($_POST['username']));
		$email	 	= filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
		$selCont  = $_POST['selectedCountry']; // Selected Country
		$phone	 	= filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT);
		$pword 		= $_POST['password'];
		$cpword 	= $_POST['cpassword'];
		$hashPss	= sha1($pword);
		$memHash	= sha1(rand(0,1000));

		// Alert messages
		require $layoutsDir . 'public/alert.php';
		// Database connection
		require 'src/dbcon.php';
		
		// Validation
		if(empty($username) || empty($email) || empty($phone) || empty($pword)) {
			alert('Please enter all of the requested fields correctly:<br>
				<ol>
					<b>
						<li>Username, example: your_name</li>
						<li>Email, example: name@email.com</li>
						<li>Phone Number, example: 00249-123456789</li>
						<li>Password, example: name902_11</li>
						<li>Password Again, example: name902_11</li>
					</b>
				</ol>', 'danger', '', true);
		} elseif (strlen($username) > 40) {
			alert('The Username is too long, please enter a shorter one.', 'danger', '', true);
		} elseif ($pword !== $cpword) {
			alert('Please make sure (Password) matches the (Password again) field.', 'danger', '', true);
		} elseif (strlen($pword) < 8 || strlen($pword) > 55) {
			alert('Password has to be <b>MORE</b> than 7 and <b>LESS</b> than 55 (Characters + Numbers) combined.', 'danger', '', true);
		} elseif (strlen($phone) > 22) {
			alert('Please enter a valid phone number.', 'danger', '', true);
		} else {
			// Connect to database
			$stmt = $con->prepare('SELECT mem_uname, mem_email FROM saj_members WHERE mem_uname = ? OR mem_email = ?');
			$stmt->execute(array($username, $email));
			$count = $stmt->rowCount();
			// If there's is a user with the same data then show error
			if($count > 0) {
				alert('Sorry, Someone has registered with that Username or Email, please enter another Username and Email', 'danger', '', true);
			} else {
				// Else then inset into the database
				$stmt = $con->prepare('INSERT INTO saj_members (mem_uname, mem_pword, mem_email, mem_phone, mem_hash)
					VALUES (:uname, :pword, :email, :phone, :hash)');
				$stmt->execute(array(
					'uname' => $username,
					'pword' => $hashPss,
					'email' => $email,
					'phone' => $selCont . $phone,
					'hash' 	=> $memHash
				));
				// Send Email for activation purpose
				$headers = 'From:editor@sudanacademicjournal.net' . "\r\n";
				$to      = $email;
				$subject = 'Activation '.$username.' Account.';
				$message = '
					Thanks '.$username.' For Registering in Sudan Academic Journal of Research and Science.
					Your account has been created, you can login with the following credentials:
					 
					------------------------
					Username:  '.$username.'
					Password:  '.$pword.'
					------------------------

					Before that you have to activate your account by clicking the link below or copy it and paste it into your browser.
					 
					Please click this link to activate your account:
					
					http://dev.com/SudanAcademicJournal/verify?u='.$username.'&h='.$memHash.'
				';
				// Send the email
				mail($to, $subject, $message, $headers);
				// Success Message
				alert('You have successfully registered. Check your email address due your account activation.<br>Redirecting after <b>5 seconds</b>...', 'success', '', true);
				header('refresh: 5; url=auth?sign=in');
			}
		}

	endif;