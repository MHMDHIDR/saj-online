<?php
	function uGroup($user) {
		global $con;
		$stmt = $con->prepare('SELECT mem_group FROM saj_members WHERE mem_uname = ?');
		$stmt->execute(array($user));
		$rows = $stmt->fetchAll();
		foreach ($rows as $row) {
			return $ugroup = $row['mem_group'];
		}
	}
	return $isAdmin = uGroup($_SESSION['uname']);