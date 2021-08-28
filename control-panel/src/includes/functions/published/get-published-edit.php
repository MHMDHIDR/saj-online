<?php
	// Getting the published article info by its id
	$artId = $_GET['editPublished'];
	$stmt = $con->prepare('SELECT * FROM saj_articles WHERE art_status = 2 AND art_id = ?');
	$stmt->execute(array($artId));
	$rows = $stmt->fetchAll();
	if(empty($rows)) {
		echo '<br><br>';
		alert('Sorry. We couldn\'t find the article you want to edit.<br>Redirecting in 3 seconds..', 'danger', 'text-center text-capitalize', false);
		header('refresh:3; url=publish');
		exit();
	} else {
		foreach ($rows as $row) {
			// Extracting the data and printing them using isset($var)
			$artTitle = $row['art_title'];
			$authName = $row['art_author'];
			$authsNames = $row['art_co_authors'];
			$artAbstract = $row['art_abstract'];
			$artIssue = $row['art_issue'];
			$artCat = $row['art_cat_id'];
		}
	}