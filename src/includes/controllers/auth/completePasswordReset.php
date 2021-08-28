<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		// Posted variables from the form
		$newPass  = $_POST['password'];
		$newCPass = $_POST['cpassword'];
		$uEmail   = $_POST['email'];

		// Get varibale (Hash)
		$resetHsh = $_GET['h'];

		// New Hashed (Sha1) From The Posted Password
		$newHashedPass = sha1($newPass);

		// Alert messages
		require $layoutsDir . 'public/alert.php';

		// Validation
		if(empty($newPass) || empty($newCPass)) {
			alert('You can\'t give an empty password!, please type new password.<br>Redirecting in 4 Seconds...', 'danger', '', true);
			header('refresh: 4; url= auth?sign=forgot-password&do=new-pass&e='.$uEmail.'&h='.$resetHsh);
		} elseif($newPass !== $newCPass) {
			alert('Password and Password Again Must be the same to confirm your new password reset.<br>Redirecting in 3 Seconds...', 'danger', '', true);
			header('refresh: 3; url= auth?sign=forgot-password&do=new-pass&e='.$uEmail.'&h='.$resetHsh);
		} elseif(strlen($newPass) < 8) {
			alert('Password Must Be <b>More Than 8</b> (Characters + Numbers combined).<br>Redirecting in 4 Seconds...', 'danger', '', true);
			header('refresh: 4; url= auth?sign=forgot-password&do=new-pass&e='.$uEmail.'&h='.$resetHsh);
		} else {
			// Require database connection
			require 'src/dbcon.php';
			// Insert data
			$stmt = $con->prepare('UPDATE saj_members SET mem_pword = ?, mem_hash = 0 WHERE mem_email = ?');
			$stmt->execute(array($newHashedPass, $uEmail));
			alert('your password has been updated successfully, you can now sign in with your new password.<br>Redirecting in 5 Seconds...', 'success', 'text-capitalize', false);
			header('refresh: 5; url= ?sign=in');
		}

	elseif (!isset($_GET['h'])) :
		header('location: ?sign=forgot-password');
	endif;