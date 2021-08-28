<?php
	$stmt = $con->prepare('SELECT cat_id FROM saj_categories WHERE cat_name = ?');
	$stmt->execute(array($_GET['title']));
	$rows = $stmt->fetchAll();
	if(empty($rows)) { echo '
		<div class="text-center">
			<br><br><br><br>
			<h3 class="empty">
				The Category You\'re looking for is Not Available, Please Make Sure You Entered The Right Page.
			</h3><br>
			<a href="categories" class="btn btn-primary">
				&larr;&nbsp;&nbsp;Go Back
			</a>
			<br><br><br><br>
		</div>';
	} else {
		foreach ($rows as $row) {
			$catId = $row['cat_id'];
		} ?>
		<!-- Article of Category -->
		<h3 class="text-center p">
			Articles of <?php chkTxtDir($_GET['title']) ?>
		</h3>
		<?php
		// Require The Paginator Function
		require_once $functionsDir . 'public/saj_paginator.php';
		// Initialize The Paginator Function
		paginator(
			'*',
			'saj_articles',
			'WHERE art_cat_id = '.$catId,
			'WHERE art_cat_id = '.$catId,
			'art_id DESC',
			'categories?title='.$_GET['title'].'&',
			11
		);
		// Force the user to not pass the last page
		if($_GET['page'] > $lastPage) {
			header('location: categories?title='.$_GET['title'].'&page='.$lastPage);
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
				    <br><br>
				    <p>
			    	<?php
			    		require_once $functionsDir . 'articles/excerpt.php';
			    		excerpt(
			    			$row['art_abstract'],
			    			'articles?id=' . $row['art_id'],
			    			'Continue Reading',
			    			'330');
			    	?>
				    </p>
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