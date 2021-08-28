<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		// Require Alert Function
		require $layoutsDir . 'alert.php';

		// Post Variables
		$name = htmlentities(trim($_POST['eName']));
		$decs = htmlentities($_POST['description']);

		// Validation
		if(empty($name)) {
			alert('Name is Required', 'danger', '', true);
		} else {
			// Requiring database connection configuration
			require 'src/dbcon.php';
			$stmt = $con->prepare('INSERT INTO saj_editors (editor_name, editor_details)
				VALUES (:name, :details)');
			$query = $stmt->execute(array(
				'name'	  => $name,
				'details' => $decs 
			));
			// Check if query is done successfully
			if($query) {
				alert('You have add one editor successfully.', 'success', 'text-capitalize', true);
				// Reset variables
				$name = '';
				$decs = '';
			} else {
				alert('Sorry, the editor hasn\'t been added successfully, please contact your system administrator.', 'danger', 'text-capitalize', true);
			}
		}

	endif;