<?php
	if(isset($_GET['delete'])) {
		$redirectSeconds = 5;
		// Require alert
		require_once $layoutsDir . 'alert.php';

		// Get Variable
		$eventId = $_GET['delete'];

		// Get evenet details (title)
		$stmt = $con->prepare('SELECT event_title FROM saj_events WHERE event_id = ?');
		$stmt->execute(array($eventId));
		$eTitle = $stmt->fetchAll()[0][0];

		// Delete the Event From Database
		$stmt = $con->prepare('DELETE FROM saj_events WHERE event_id = ?; ALTER TABLE saj_events AUTO_INCREMENT = 1');
		$query = $stmt->execute(array($eventId));
		if($query) {
			alert('You have successfully deleted <br><b>'.$eTitle.'</b><br>from events.<br>
				Redirecting in '.$redirectSeconds.' Seconds...', 'success', 'text-capitalize', true);
		} else {
			alert('<b>'.$eTitle.'</b><br> hasn\'t been deleted, please try again.<br>
				Redirecting in '.$redirectSeconds.' Seconds...', 'danger', 'text-capitalize', true);
		}
		// Redirect to events
		header('refresh: '.$redirectSeconds.'; url=home?p=Events');
	} else {
		header('location: home?p=Events');
	}