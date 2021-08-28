<?php
	// Force the user to be in the first page if the get page is not set or is empty  
	if(!isset($_GET['page'])) {
		header('location: articles?page=1');
	}
	// Require The Paginator Function
	require_once $functionsDir . 'public/saj_paginator.php';
	// Initialize The Paginator Function
	paginator(
		'art_id, art_title, art_abstract',
		'saj_articles',
		'WHERE art_status = 2',
		'WHERE art_status = 2',
		'art_id DESC',
		'articles?',
		10
	);
	// Force the user to not pass the last page
	if($_GET['page'] > $lastPage) {
		header('location: articles?page='.$lastPage);
	}
	// Continuation of the $stmt from the required function
	$stmt->execute();
	$rows = $stmt->fetchAll();
	if(empty($rows)) { echo '
		<h3 class="empty text-center p mb">
			There Are No Published Articles Yet.
		</h3>';
	} else {
		foreach ($rows as $row) { ?>
			<div class="panel panel-default">
			  <div class="panel-heading">
			  	<a href="?id=<?php echo $row['art_id'] ?>">
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
		    			'?id=' . $row['art_id'],
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