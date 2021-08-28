<?php
	if(isset($_GET['deletePublished']) && isset($_GET['dir'])):
		if(!empty($_GET['deletePublished'])) {
			// GET variable
			$artId = $_GET['deletePublished'];
			$dir 	 = $_GET['dir'];

			// Require alert
			require_once $layoutsDir . 'alert.php';
 			
 			// Delete Article From Database
			$stmt = $con->prepare('DELETE FROM saj_articles WHERE art_id = ?');
			$query = $stmt->execute(array($artId));
			if($query) {
				// Check if the file exists and change its permission to delete it 
				if(file_exists($dir)) {
					// Change the mode of the file before deleteing it
					chmod($dir, 465);
					// Delete the Article File from its directory
					if(unlink($dir)) {
						// Alert Success message
						alert('You have successfully deleted The Article.<br>
							Redirecting in 3 Seconds...', 'success', 'text-capitalize', true);
					}
				} else {
					alert('Sorry, the article already been deleted.<br>
					Redirecting in 3 Seconds...', 'danger', 'text-capitalize', true);
				}
			} else {
				alert('Sorry, the article has not been deleted, to report this problem, please contact the system adminstrator.<br>
					Redirecting in 3 Seconds...', 'danger', 'text-capitalize', true);
			}
			// Redirect to Unapproved articles Page
			header('refresh: 3; url=publish');
		} else {
			header('location: publish');
		}
	endif;