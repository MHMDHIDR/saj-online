<?php
	// Get Published - function to get only Published Article title
	function articlesTitle($artIssue) {
		global $con;
		$stmt = $con->prepare('SELECT art_id, art_title FROM saj_articles WHERE art_status = 2 AND art_issue = ? LIMIT 4');
		$stmt->execute(array($artIssue));
		$rows = $stmt->fetchAll();
		if(!empty($rows)) {
			foreach ($rows as $row) { ?>
				<li>
					<a href="articles?id=<?php echo $row['art_id'] ?>">
						<?php chkTxtDir($row['art_title']) ?>
					</a>
				</li>
<?php }
		} else { echo '<br>
			<h3 class="note-primary text-center">
				This Issue doesn\'t have published articles.
			</h3>';
		}
	}