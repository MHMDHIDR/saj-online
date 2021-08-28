<?php
	function getStatstic($field, $table, $where = NULL, $whereVal = NULL) {
		// require __DIR__ . '/../../../../../src/dbcon.php';
		/* 
      used global variable to overcome the problem of not connected (undefined $con) variable
    */
    global $con;
		// Select Query
		$getStatstic = $con->prepare('SELECT COUNT('.$field.')
			FROM '.$table.' WHERE '.$where.' = '.$whereVal.'');
		$getStatstic->execute();
		$statistics = $getStatstic->fetchColumn();

		echo $statistics;
	}