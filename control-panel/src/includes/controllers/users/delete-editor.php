<?php
	if(isset($_GET['delete'])) {
		$redirectSeconds = 3;
		// Require alert
		require_once $layoutsDir . 'alert.php';

		// Get Variable
		$editorId = $_GET['delete'];

		// Get user name
		$stmt = $con->prepare('SELECT editor_name FROM saj_editors WHERE editor_id = ?');
		$stmt->execute(array($editorId));
		$uName = $stmt->fetchAll()[0][0];

		// Delete the Editorial Board Member From Database
		$stmt = $con->prepare('DELETE FROM saj_editors WHERE editor_id = ?; ALTER TABLE saj_editors AUTO_INCREMENT = 1');
		$query = $stmt->execute(array($editorId));
		if($query) {
			alert('You have successfully deleted <b>'.$uName.'</b> from Editors List.<br>
				Redirecting in '.$redirectSeconds.' Seconds...', 'success', 'text-capitalize', true);
		} else {
			alert('<b>'.$uName.'</b> hasn\'t been deleted, please try again.<br>
				Redirecting in '.$redirectSeconds.' Seconds...', 'danger', 'text-capitalize', true);
		}
		// Redirect to events
		header('refresh: '.$redirectSeconds.'; url=home?p=Editors');
	} else {
		header('location: home?p=Editors');
	}