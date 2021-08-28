<?php
	// Function for retrieving Categories and Issues from db
	function getCatsIssues($table, $columnId, $columnName, $selectName, $dbVal) {
		global $con;
		$stmt = $con->prepare('SELECT * FROM '.$table);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		if(!empty($rows)) {
			foreach($rows as $row) {
				echo '<option value="' . $row[$columnId] . '"';
				// if there is a selected value
				if(isset($_POST[$selectName]) && $_POST[$selectName] == $row[$columnId] || $dbVal ==  $row[$columnId]) {
					echo ' selected>';
				} else {echo '>';} 
					echo $row[$columnName] .
				'</option>';
			}
		}
	}