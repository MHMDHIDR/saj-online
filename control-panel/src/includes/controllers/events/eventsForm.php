<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		// Require Alert Function
		require $layoutsDir . 'alert.php';

		// Post Variables
		$eTitle  = htmlentities(trim($_POST['evTitle']));
		$details = htmlentities($_POST['evDetails']);

		if(empty($eTitle)) {
			alert('Event Title is Required to Add an Event.', 'danger', '', true);
		} else {
			// Requiring database connection configuration
			require 'src/dbcon.php';
			$stmt = $con->prepare('INSERT INTO saj_events (event_title, event_details)
				VALUES (:title, :details)');
			$query = $stmt->execute(array(
				'title' 	=> $eTitle,
				'details' => $details
			));
			// Check if query is done successfully
			if($query) {
				alert('You have successfully added new event.', 'success', 'text-capitalize', true);
				// Reset variables
				$eTitle = '';
				$details = '';
			} else {
				alert('Sorry, the event hasn\'t been added correctly, please contact your system administrator.', 'danger', 'text-capitalize', true);
			}
		}
	endif;