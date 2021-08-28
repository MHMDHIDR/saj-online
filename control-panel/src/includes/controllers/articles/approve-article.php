<?php
	if(isset($_GET['approve']) && isset($_GET['dir'])):
		if(!empty($_GET['approve'])) {
			// GET variable
			$artId = $_GET['approve'];
			$dir 	 = $_GET['dir'];

			// Require alert
			require_once $layoutsDir . 'alert.php';
 			
 			// Update Article Status
			$stmt = $con->prepare('UPDATE saj_articles SET art_status = 1 WHERE art_id = ?');
			$query = $stmt->execute(array($artId));
			if($query) {
				$fileName = explode("/", $dir);
				$artPath = 'uploads/articles/';
				$fileDir = '../' . $artPath . 'unapproved/' . $fileName[3];
				$newDir  = '../' . $artPath . 'approved/' . $fileName[3];
				$dbPath  = $artPath . 'approved/' . $fileName[3];
				if(file_exists($fileDir)) {
					chmod($fileDir, 465);
					if(rename($fileDir, $newDir)) {
						$stmt = $con->prepare('UPDATE saj_articles SET art_upload_dir = ? WHERE art_id = ?');
						$setNewDir = $stmt->execute(array($dbPath, $artId));
						if($setNewDir) {
							alert('You have successfully approved this article.<br>Redirecting in 2 Seconds...', 'success', 'text-capitalize', true);
						}
					}
				} else {
					alert('Something went wrong while approving the article, please contact the system administrator.<br>Redirecting in 2 Seconds...', 'danger', 'text-capitalize', true);
				}
			} else {
				alert('Sorry, the article has not been approved, please contact the system administrator.<br>
					Redirecting in 2 Seconds...', 'danger', 'text-capitalize', true);
			}
			// Redirect to Unapproved articles Page
			header('refresh: 2; url=articles?status=Unapproved');
		} else {
			header('location: articles?status=Unapproved');
		}
	else:
		header('location: articles?status=Unapproved');
	endif;