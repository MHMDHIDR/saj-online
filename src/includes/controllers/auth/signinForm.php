<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		// Post variables
		$uname   = htmlentities(trim($_POST['username']));
		$pword   = sha1($_POST['password']);
		$fromUrl = isset($_POST['redirTo']) ? $_POST['redirTo'] : '';

		// Alert messages
		require $layoutsDir . 'public/alert.php';
		require 'src/dbcon.php';

		// Connecting to database
		$stmt = $con->prepare('SELECT mem_uname, mem_pword, mem_status FROM saj_members
			WHERE mem_uname = ? AND mem_pword = ?');
		$stmt->execute(array($uname, $pword));
		$rows = $stmt->fetchAll();
		foreach ($rows as $row) {
			$stat = $row['mem_status'];
		}
		
		// Counting rows of count result
		$count = $stmt->rowCount();
		if($count > 0) {
			if($stat == 0) {
				alert(
					'You need to activate your account first by clicking the link we sent you in your email, 
						if you didn\'t find the email, 
						<strong class="text-uppercase">
							<a href="index?p=contact-us">contact the administrator</a>
						</strong>',
					'danger', '', true);
			} else {
				// Register Session
				$_SESSION['uname'] = $uname;
				// Forcing the url to be equal to submit-article page
				!empty($fromUrl) ? header('location: ' . $fromUrl) : header('location: index?page=1');
				exit();
			}
		} elseif (empty($uname) || empty($pword)) {
			alert('Username and Password are required to login.', 'danger', '', true);
		} else
			alert('Username or password is wrong', 'danger', '', true);

	endif;