<?php
	if(isset($_GET['delete'])) {
		$redirectSeconds = 3;
		// Require alert
		require_once $layoutsDir . 'alert.php';

		// Get Variable
		$userId = $_GET['delete'];

		// if empty value of get
		if(empty($userId)) {
			header('location: ?p=Users');
			exit();
		}

		// Get user name
		$stmt = $con->prepare('SELECT mem_uname FROM saj_members WHERE mem_id = ?');
		$stmt->execute(array($userId));
		$uName = $stmt->fetchAll()[0][0];

		// Connection
		$stmt = $con->prepare('DELETE FROM saj_members WHERE mem_id = ?; ALTER TABLE saj_members AUTO_INCREMENT = 1');
		$query = $stmt->execute(array($userId));
		if($query) {
			alert('You have successfully deleted <b>'.$uName.'</b><br>
				Redirecting in '.$redirectSeconds.' Seconds...', 'success', 'text-capitalize', true);
		} else {
			alert('Sorry, the <b>'.$uName.'</b> has\'t been deleted for undefined issue, to report this problem, please contact the system adminstrator.<br>
				Redirecting in '.$redirectSeconds.' Seconds...', 'danger', 'text-capitalize', true);
		}
		// Redirect to Users Page
		header('refresh: '.$redirectSeconds.'; url=home?p=Users');
	} else {
		header('location: home?p=Users');
	}