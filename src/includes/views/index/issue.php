<?php
	// if issue title not isset then redirect to home page
	if(!isset($_GET['title'])) {
		header('location: index');
		exit();
	}
	// Get Issue ID Number
	$stmt = $con->prepare('SELECT * FROM saj_issues WHERE issue_title = ?');
	$stmt->execute(array($_GET['title']));
	$rows = $stmt->fetchAll();
	if(empty($rows)) { echo '
		<div class="text-center">
			<br><br><br><br>
			<h3 class="empty">
				The Issue You\'re looking for is Not Available, Please Make Sure You Entered The Right Page.
			</h3><br>
			<a href="index" class="btn btn-primary">
				&larr;&nbsp;&nbsp;Go Back
			</a>
			<br><br><br><br>
		</div>';
	} else {
		foreach ($rows as $row) {
			$issueId = $row['issue_id'];
			$issueTitle = $row['issue_title'];
		} echo '
			<h4 class="text-center p">
				Issue of <b>'.$issueTitle.'
			</b></h4>';
		// Force the user to be in the first page if the get page is not set or is empty  
		if(!isset($_GET['page'])) {
			header('location: index?p=issue&title='.$_GET['title'].'&page=1');
		}
		// Require The Paginator Function
		require_once $functionsDir . 'public/saj_paginator.php';
		// Initialize The Paginator Function
		paginator(
			'*',
			'saj_articles',
			'WHERE art_status = 2 AND art_issue = '.$issueId,
			'WHERE art_status = 2 AND art_issue = '.$issueId,
			'art_id DESC',
			'index?p=issue&title='.$_GET['title'].'&',
			5
		);
		// Force the user to not pass the last page
		if($_GET['page'] > $lastPage) {
			header('location: index?p=issue&title='.$_GET['title'].'&page='.$lastPage);
		}
		$stmt->execute();
		$rows = $stmt->fetchAll();
		if(empty($rows)) { echo '
			<div class="text-center">
				<br><br><br><br>
				<h3 class="empty">
					This Category Does Not have any Published Articles Yet.
				</h3><br>
				<a href="categories" class="btn btn-primary">
					&larr;&nbsp;&nbsp;Go Back
				</a>
				<br><br><br><br>
			</div>';
		} else {
			foreach ($rows as $row) { ?>
				<div class="panel panel-default">
				  <div class="panel-heading">
				  	<a href="articles?id=<?php echo $row['art_id'] ?>">
				  		<?php chkTxtDir($row['art_title']) ?>
				  	</a>
				  </div>
				  <div class="panel-body">
						<span class="label label-primary">Abstract</span>
				    <div class="abstract">
			    	<?php
			    		require_once $functionsDir . 'articles/excerpt.php';
			    		excerpt(
			    			$row['art_abstract'],
			    			'articles?id=' . $row['art_id'],
			    			'Continue Reading',
			    			'330');
			    	?>
				    </div>
				  </div>
				</div>
<?php }
		echo
		 '<nav aria-label="Page navigation" class="text-center">
				<ul class="pagination">
					'.$paginationCtrls.'
				</ul>
			</nav>';
		}
	}