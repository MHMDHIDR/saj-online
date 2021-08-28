<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['artFile'])):
		// POST Variables
		$category 	 = htmlentities($_POST['cats']);
		$issues			 = htmlentities($_POST['issues']);
		$artTitle  	 = htmlentities(trim($_POST['artTitle']));
		$authName    = htmlentities(trim($_POST['authName']));
		$authsNames  = htmlentities(trim($_POST['authsNames']));
		$artAbstract = htmlentities(trim($_POST['artAbstract']));

		// Published
		$artStatus = 2;
		// Submission Date, date("MonthShortName  dayNum (Suffix) - YrNumber")
		$artUploadDate = date("M j<\s\u\p>S</\s\u\p> - Y");

		// Article File variables
		$file 	 	 = $_FILES['artFile'];
	  $file_name = $file['name'];
	  $file_tmp	 = $file['tmp_name'];
	  $file_size = $file['size'];

	  // File extension
	  $extension = explode('.', $file_name);
	  $file_ext  = strtolower(end($extension));

	  // Allowed files
	  $allowed 	= array('pdf');

	  // Require alert
		require_once $layoutsDir . 'alert.php';

	  if(empty($category) || empty($issues) || empty($artTitle) || empty($authName) || empty($artAbstract)) {
	  	alert('Please Fill in all feilds before publishing the new article', 'danger', 'text-capitalize', true);
	  } elseif (empty($file_name)) {
			alert('Please Select the article file to upload it.', 'danger', 'text-capitalize', true);
		} elseif(in_array($file_ext, $allowed) === false) {
			alert('Only <b>.PDF</b> files allowed.', 'danger', 'text-capitalize', true);
		} elseif ($file_size > 10500000) {
			alert('the file size has exceeded limits, please reduce the file size to less than <b>10 MB</b>.', 'danger', 'text-capitalize', true);
		} else {
			// New File Name
			$file_new_name	= uniqid('' , true) . '.' . $file_ext;
			// New File Direcotry from the old temporary one 
			$file_new_dir   = '../' . 'uploads/articles/published/' . $file_new_name;
			$db_file_dir 		= 'uploads/articles/published/' . $file_new_name;

			// If moving file from old to new directory succeeded then insert data to database
			if(move_uploaded_file($file_tmp, $file_new_dir)) {
				// Requiring database connection configuration
				require 'src/dbcon.php';

				// Connect and insert to database
				$stmt = $con->prepare('
					INSERT INTO saj_articles (art_title, art_author, art_co_authors, art_abstract, art_upload_date, art_issue, art_upload_dir, art_status, art_cat_id)
					VALUES(:artTitle, :artAuth, :artCoAuths, :artAbst, :artDate, :artIssue, :artDir, :artStat, :artCat)');
				// Update the issue has arts column
				$stmt2 = $con->prepare('UPDATE saj_issues SET issue_has_arts = 1 WHERE issue_id = ?');
				$stmt2->execute(array($issues));

				// Execute the insert query
				$publishArticleQuery = $stmt->execute(array(
					'artTitle'		=> $artTitle,
					'artAuth'			=> $authName,
					'artCoAuths'  => $authsNames,
					'artAbst'			=> $artAbstract,
					'artDate'			=> $artUploadDate,
					'artIssue'		=> $issues,
					'artDir'			=> $db_file_dir,
					'artStat'			=> $artStatus,
					'artCat'			=> $category
				));

				if($publishArticleQuery) {
					// Alert Success Message
					alert('You have successfully published one new article.<br>Redirecting in 5 Seconds...', 'success', 'no-radius text-capitalize', false);
				} else {
					alert('Sorry, looks like there is an error, please report to the system administrator.<br>Redirecting in 5 Seconds...', 'danger', '', true);
				}
				// Redirecting to home page
				header('refresh: 5; url=publish');
			}
		}
	endif;