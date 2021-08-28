<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		// Require Alert Function
		require $layoutsDir . 'alert.php';

		// Post Variables
		$cName = htmlentities(trim($_POST['cName']));

		// Validation
		if(empty($cName)) {
			alert('Category Name is Required', 'danger', '', true);
		} else {
			// Requiring database connection configuration
			require 'src/dbcon.php';
			$stmt = $con->prepare('INSERT INTO saj_categories (cat_name)
				VALUES (:cname)');
			$query = $stmt->execute(array('cname' => $cName));
			// Check if query is done successfully
			if($query) {
				alert('You have successfully add new category.', 'success', 'text-capitalize', true);
				// Reset variables
				$cName = '';
			} else {
				alert('This category hasn\'t been added successfully, please contact your system administrator.', 'danger', 'text-capitalize', true);
			}
		}

	endif;