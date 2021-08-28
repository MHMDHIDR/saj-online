<?php
	if(isset($_GET['makeEditor'])) {
		$redirectSeconds = 3;
		// Require alert
		require_once $layoutsDir . 'alert.php';

		// Get Variable
		$userId = $_GET['makeEditor'];

		// if empty value of get
		if(empty($userId)) {
			header('location: ?p=Users');
			exit();
		}

		// Get user name
		$stmt = $con->prepare('SELECT mem_uname FROM saj_members WHERE mem_id = ?');
		$stmt->execute(array($userId));
		$uName = $stmt->fetchAll()[0][0];

		// Update member group to 1 [Editor Authority]
		$stmt = $con->prepare('UPDATE saj_members SET mem_group = 1 WHERE mem_id = ?');
		$query = $stmt->execute(array($userId));
		if($query) {
			alert('<b>'.$uName.'</b> is editor now.<br>
				Redirecting in '.$redirectSeconds.' Seconds...', 'success', 'text-capitalize', true);
		} else {
			alert('Sorry, <b>'.$uName.'</b> has\'t became an editor because he\'s already editor.<br>
				Redirecting in '.$redirectSeconds.' Seconds...', 'danger', 'text-capitalize', true);
		}
		// Redirect to Users Page
		header('refresh: '.$redirectSeconds.'; url=home?p=Users');
	} else {
		header('location: home?p=Users');
	}