<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		// GET Variables
		$artId = (int)$_GET['editPublished'];
		// POST Varibales
		$articleCat 		 = htmlentities($_POST['cats']);
		$articleIssue 	 = htmlentities($_POST['issues']);
		$articleTitle 	 = htmlentities(trim($_POST['artTitle']));
		$articleAuthor 	 = htmlentities(trim($_POST['authName']));
		$articleCoAuths  = htmlentities(trim($_POST['authsNames']));
		$articleAbstract = htmlentities(trim($_POST['artAbstract']));

		// Check if the Issue has no articles before, then set (issue_has_art) = 1
		$check = $con->prepare('SELECT * FROM saj_issues WHERE issue_id = ?');
		$check->execute(array($articleIssue));
		$issues = $check->fetchAll();
		foreach ($issues as $issue) {
			$hasArts = $issue['issue_has_arts'];
		}
		if($hasArts == 0) {
			$stmt = $con->prepare('UPDATE saj_issues SET issue_has_arts = 1 WHERE issue_id = ?');
			$stmt->execute(array($articleIssue));
		}
		// Check the varibales
		if(empty($articleTitle) || empty($articleAuthor) || empty($articleAbstract)) {
			alert('Please Enter All of the Info Before Submitting the Edit', 'danger', '', true);
		} else {
			// Insert the data into the db
			$stmt = $con->prepare("UPDATE saj_articles
				SET
					art_title = ?,
					art_author = ?,
					art_co_authors = ?,
					art_abstract = ?,
					art_issue = ?,
					art_cat_id = ?
				WHERE art_id = ?
			");
			$insert = $stmt->execute(array(
				$articleTitle,
				$articleAuthor,
				$articleCoAuths,
				$articleAbstract,
				$articleIssue,
				$articleCat,
				$artId
			));
			if($insert) {
				alert('You Have Successfully Edited This Article Info.<br>Redirecting in 3 Seconds...', 'success', '', false);
			} else {
				alert('The Article Hasn\'t been Edited Successfully, please contact the system administrator.<br>Redirecting in 3 Seconds...', 'danger', '', false);
			}
			header('refresh: 3; url=publish');
		}
	endif;