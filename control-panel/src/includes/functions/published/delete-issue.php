<?php
	if(isset($_GET['deleteIssue']) && !empty($_GET['deleteIssue'])):
		$issueId = $_GET['deleteIssue'];
		// Require alert
		require_once $layoutsDir . 'alert.php';
		// Delete issue from database
		$stmt = $con->prepare('DELETE FROM saj_issues WHERE issue_id = ?');
		$stmt->execute(array($issueId));
		alert('You have successfully deleted this issue. Refreshing in 2 Seconds...', 'success', 'text-capitalize', true);
		header('refresh:2; url=publish');
	endif;