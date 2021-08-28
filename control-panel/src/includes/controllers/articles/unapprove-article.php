<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		if(isset($_GET['unapprove'])) {
			$artId  = $_POST['artId'];
			$artDir = $_POST['artDir'];

			// Require alert
			require_once $layoutsDir . 'alert.php';

			// Unapprove from database
			$stmt = $con->prepare('UPDATE saj_articles SET art_status = 0 WHERE art_id = ?');
			$query = $stmt->execute(array($artId));
			// If the query succeeded
			if($query) {
				$fileName = explode("/", $artDir);
				$artPath = 'uploads/articles/';
				$fileDir = '../' . $artPath . 'approved/' . $fileName[3];
				$newDir  = '../' . $artPath . 'unapproved/' . $fileName[3];
				$dbPath  = $artPath . 'unapproved/' . $fileName[3];
				if(file_exists($fileDir)) {
					chmod($fileDir, 465);
					if(rename($fileDir, $newDir)) {
						$stmt = $con->prepare('UPDATE saj_articles SET art_upload_dir = ? WHERE art_id = ?');
						$setNewDir = $stmt->execute(array($dbPath, $artId));
						if($setNewDir) {
							alert('You have successfully unapproved this article. Redirecting in 2 Seconds...', 'success', 'text-capitalize', true);
							// Redirect to Approved articles Page
							header('refresh: 2; url=articles?status=Approved');
						}
					}
				} else {
					alert('Something went wrong while unapproving the article, please contact the system administrator.<br>Redirecting in 2 Seconds...', 'danger', 'text-capitalize', true);
					header('refresh: 2; url=articles?status=Approved');
				}
			}
		}
	endif;