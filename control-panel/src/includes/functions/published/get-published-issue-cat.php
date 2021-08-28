<?php
	// Get Published - function to get only issue title, and category name
	function getPublishedIssueCat($table, $where, $whereVal, $rowVal) {
		global $con;
		$stmt = $con->prepare('SELECT * FROM '.$table.' WHERE '.$where.' = ?');
		$stmt->execute(array($whereVal));
		$rows = $stmt->fetchAll();
		if(!empty($rows)) {
			foreach ($rows as $row) { echo '
				<th>'.$row[$rowVal].'</th>';
			}
		}
	}