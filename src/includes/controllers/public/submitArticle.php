<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['artFile'])):
		// assign post variables
		$artTitle  = htmlentities(trim($_POST['artTitle']));
		$artInst   = htmlentities(trim($_POST['instName']));
		$artDept   = htmlentities(trim($_POST['deptName']));
		$artAuthor = htmlentities(trim($_POST['authName']));
		$artCoAuth = htmlentities(trim($_POST['coAuthNames']));
		$artAbstr  = htmlentities(trim($_POST['abstract']));

		// Terms variable, return true or false
		$accTerms  = isset($_POST['accTerms']);

		// Uploader of the article Name
		$Uploader  = isset($_SESSION['uname']) ? $_SESSION['uname'] : '';

		// Submission Date, date("dayName, MonthShortName  dayNum, Suffix, YrNumber")
		$artDate 	 = date("l, M dS, Y");

		// Article File variables
		$file 	 	 = $_FILES['artFile'];
	  $file_name = $file['name'];
	  $file_tmp	 = $file['tmp_name'];
	  $file_size = $file['size'];

	  // File extension
	  $extension = explode('.', $file_name);
	  $file_ext  = strtolower(end($extension));

	  // Allowed files
	  $allowed 	= array('docx', 'doc');

		// Alert messages
		require $layoutsDir . 'public/alert.php';

		// Validation
		if(empty($artTitle) || empty($artInst) || empty($artDept) || empty($artAuthor) || empty($artAbstr)) {
			alert('please make sure you\'ve filled in the following fields:<br>
				<ol>
					<li>Article Title.</li>
					<li>Institution Name.</li>
					<li>Department Name.</li>
					<li>Author Name.</li>
					<li>Abstract.</li>
					<li>Selected the Article file (less than 5 MB).</li>
				</ol>', 'danger', 'no-radius text-capitalize', true);
		} elseif($accTerms == false) {
			alert('Please Check (I Read and Accept All of The Terms of Use.)', 'danger', '', true);
		} elseif (empty($file_name)) {
			alert('Please Select the article file to upload it.', 'danger', 'text-capitalize', true);
		} elseif(in_array($file_ext, $allowed) === false) {
			alert('Sorry!, only [ <b>.doc AND .docx</b> ] files allowed, please select Microsoft office word file.', 'danger', 'text-capitalize', true);
		} elseif ($file_size > 5300000) {
			alert('File is too large!, only (<b>5 MB</b> is allowed).', 'danger', 'text-capitalize', true);
		} else {
			// New File Name
			$file_new_name  = uniqid('' , true) . '.' . $file_ext;
			// New File Direcotry from the old temporary one 
			$file_new_dir 	= 'uploads/articles/unapproved/' . $file_new_name;

			// If moving file from old to new directory succeeded then insert data to database
			if(move_uploaded_file($file_tmp, $file_new_dir)) {
				// Requiring database connection configuration
				require 'src/dbcon.php';

				// Connect and insert to database
				$stmt = $con->prepare('INSERT INTO
				saj_articles (art_title, art_inst, art_dept, art_author, art_co_authors, art_abstract, art_upload_date, art_uploader,	art_upload_dir)
				VALUES(:artTitle, :artInst, :artDept, :artAuthor, :artCoAuthors, :artAbstract, :artUploadDate, :artUploader, :artUploadDir)');

				// Execute the insert query
				$stmt->execute(array(
					'artTitle'	    => $artTitle,
					'artInst'		    => $artInst,
					'artDept'		 	  => $artDept,
					'artAuthor'		  => $artAuthor,
					'artCoAuthors'  => $artCoAuth,
					'artAbstract'	  => $artAbstr,
					'artUploadDate' => $artDate,
					'artUploader'		=> $Uploader,
					'artUploadDir'	=> $file_new_dir
				));

				// Alert Success Message
				alert('You have successfully submitted your article, it\'ll be reviewed by the editors.<br>we\'ll be contacting you as soon as possible, please check your email once in a while we\'ll send you a notes.<br>Redirecting in 20 Seconds...', 'success', 'no-radius text-capitalize', false);

				// Redirecting to home page
				header('refresh: 20; url= index');
			}
		}

	endif;