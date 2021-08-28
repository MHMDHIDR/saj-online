<?php
	$stmt = $con->prepare('SELECT * FROM saj_articles WHERE art_status = 0');
	$stmt->execute();
	$count = $stmt->rowCount();
	if($count > 0) { echo '
		<span class="badge" title="'.$count.' Unapproved Articles">
			'.$count.'
		</span>';
	}