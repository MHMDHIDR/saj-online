<?php
	function getArtsOfCat($catId) {
		global $con;
		$stmt = $con->prepare('SELECT art_id, art_title FROM saj_articles WHERE art_status = 2 AND art_cat_id = ? LIMIT 5');
		$stmt->execute(array($catId));
		$rows = $stmt->fetchAll();
		if(empty($rows)) { echo
			"<p class='empty text-center'><br>
				There Are No Published Articles in This Category.
			</p>";
		} else {
			foreach ($rows as $row) {  ?>
				<div class="article-title">
					<a href="articles?id=<?php echo $row['art_id'] ?>">
						<?php chkTxtDir($row['art_title']) ?>
					</a>
				</div>
<?php }
		}
	}