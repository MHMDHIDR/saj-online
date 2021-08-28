<?php
	if(isset($_GET['delete'])) {
		$redirectSeconds = 2;
		// Require alert
		require_once $layoutsDir . 'alert.php';

		// Get Variable
		$catId = $_GET['delete'];

		// Get categorey name
		$stmt = $con->prepare('SELECT cat_name FROM saj_categories WHERE cat_id = ?');
		$stmt->execute(array($catId));
		$catName = $stmt->fetchAll()[0][0];

		// Delete the Category From Database and set auto increment = 1 to 
		$stmt = $con->prepare('DELETE FROM saj_categories WHERE cat_id = ?; ALTER TABLE saj_categories AUTO_INCREMENT = 1');
		$query = $stmt->execute(array($catId));
		if($query) {
			alert('You have successfully deleted <b>'.$catName.'</b> Category.<br>
				Redirecting in '.$redirectSeconds.' Seconds...', 'success', 'text-capitalize', true);
		} else {
			alert('<b>'.$catName.'</b> Category hasn\'t been deleted, please try again.<br>
				Redirecting in '.$redirectSeconds.' Seconds...', 'danger', 'text-capitalize', true);
		}
		// Redirect to events
		header('refresh: '.$redirectSeconds.'; url=home?p=Categories');
	} else {
		header('location: home?p=Categories');
	}