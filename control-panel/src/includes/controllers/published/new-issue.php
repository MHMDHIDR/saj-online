<?php
	if(isset($_POST['issueTitle'])):
		$issueTitle = htmlentities($_POST['issueTitle']);

		// Require alert
		require_once $layoutsDir . 'alert.php';

		if(empty($issueTitle)) {
			alert('You must type the title of the issue before creating it.', 'danger', 'text-capitalize', true);
		}	else {
			// Insert into database
			$stmt = $con->prepare('INSERT INTO saj_issues (issue_title) VALUES (:title)');
			$stmt->execute(array('title' => $issueTitle));
			$count = $stmt->rowCount();
			if($count > 0) {
				alert('You have successfully Created New Issue, Refreshing in 2 Seconds..', 'success', 'text-capitalize', true);
				header('refresh:2; url=publish');
			} else {
				alert('Sorry, The issue hasn\'t been created, Refreshing in 2 Seconds..', 'danger', 'text-capitalize', true);
				header('refresh:2; url=publish');
			}
		}
	endif;