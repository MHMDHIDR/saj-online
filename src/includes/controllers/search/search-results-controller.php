<?php
	// GET variable
	$sQuery = filter_var($_GET['searchFor'], FILTER_SANITIZE_STRING);

	if(isset($_GET['page'])) {
		$page = (int)$_GET['page'];
	} else {
		header('location: search?searchFor='.$sQuery.'&page=0');
	}

/* This Code for Setting the limits #Start */
	// Getting the rows number for the searched query
	$stmt = $con->prepare("SELECT * FROM saj_articles WHERE art_title LIKE ? AND art_status = 2");
	$stmt->execute(array('%'.$sQuery.'%'));
  $rowCount = count($stmt->fetchAll());

  // Setting perPage, lastPage variables
	$perPage = 15;
	$lastPage = ceil($rowCount / $perPage);

	// Check if the page is less than 1? make it 1, is greater that last page? make it = lastpage
	if($page < 1) {
		$page = 1;
	} elseif($page > $lastPage) {
		$page = $lastPage;
	}
	// Setting the limit variable
	$limit = 'LIMIT ' . ($page - 1) * $perPage . ',' . $perPage;
/* This Code for Setting the limits #End */

	// Connect and retrieve data from database
	$stmt = $con->prepare("SELECT * FROM saj_articles WHERE art_title LIKE ? AND art_status = 2 $limit");
	$paginationCtrls = '';
	// Show the pagination if the rows numbers is worth displaying 
	if($lastPage != 1) {
		/* if is equal to 1 then this code won't run..
			First we check if we are on page one. If yes then we don't need a link to 
			the previous page or the first page so we do nothing. If we aren't then we
			generate links to the first page, and to the previous pages.
   	*/
		if ($page > 1) {
			$previous = $page - 1;
			// Concatenate the link to the variable
			$paginationCtrls .= '
			<li>
				<a href="search?searchFor='.$sQuery.'&page='.$previous.'" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>';
			// Render clickable number links that should appear on the left of the target (current) page number
			for($i = $page - 4; $i < $page; $i++) {
				if($i > 0) {
					// Concatenate the link to the variable
					$paginationCtrls .= '
					<li>
						<a href="search?searchFor='.$sQuery.'&page='.$i.'">
							'.$i.'
						</a>
					</li>';
				}
			}
		}
		// Render the target (current) page number, but without it being a clickable link
		// Concatenate the link to the variable
		$paginationCtrls .= '
		<li class="active">
			<a>
				'.$page.'
			</a>
		</li>';
		// Render clickable number links that should appear on the right of the target (current) page number
		for($i = $page + 1; $i <= $lastPage; $i++) {
			// Concatenate the link to the variable
			$paginationCtrls .= '
			<li>
				<a href="search?searchFor='.$sQuery.'&page='.$i.'">
					'.$i.'
				</a>
			</li>';
			// if the loop runs for tims then break (stop) it.
			if($i >= $page + 4) {
				break;
			}
		}
		// This does the same as above, only checking if we are on the last page, if not then generating the "Next"
    if ($page != $lastPage) {
      $next = $page + 1;
      // Concatenate the link to the variable
      $paginationCtrls .= '
      <li>
        <a href="search?searchFor='.$sQuery.'&page='.$next.'" aria-label="Next">
        	<span aria-hidden="true">
        		&raquo;
        	</span>
        </a>
      </li>';
    }
	} // if lastPage code #End


	// Force the user to not pass the last page
	if($_GET['page'] > $lastPage) {
		header('location: search?searchFor='.$sQuery.'&page='.$lastPage);
	}

	// Execute the query
	$stmt->execute(array('%'.$sQuery.'%'));
	$rows = $stmt->fetchAll();

	// if Nothing was found
	if(empty($rows)) {
		alert('<h3>No Results were Found!, Try Something else</h3>', 'info', '', false);
		require_once $layoutsDir . 'search/search-form.php';
	} else {
		echo '<br><br>';
		foreach ($rows as $row): ?>
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
	    			'300');
	    	?>
		    </p>
		  </div>
		</div>
<?php endforeach;
	echo
	 '<nav aria-label="Page navigation" class="text-center">
			<ul class="pagination">
				'.$paginationCtrls.'
			</ul>
		</nav>';
	}