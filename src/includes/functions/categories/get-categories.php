<?php
	// Force the user to be in the first page if the get page is not set or is empty  
	if(!isset($_GET['page'])) {
		header('location: categories?page=1');
	}
	// Require The Paginator Function
	require_once $functionsDir . 'public/saj_paginator.php';
	// Initialize The Paginator Function
	paginator(
		'*',
		'saj_categories',
		NULL,
		NULL,
		'cat_id DESC',
		'categories?',
		15
	);
	// Force the user to not pass the last page
	if($_GET['page'] > $lastPage) {
		header('location: categories?page='.$lastPage);
	}
	$stmt->execute();
	$rows = $stmt->fetchAll();
	$count = $stmt->rowCount();
	if(!empty($rows)) {
	echo '<div class="row-temp">';
		foreach ($rows as $row) { ?>
			<div class="categoryInfo">
				<div>
					<div class="panel panel-default">
					  <div class="panel-body">
					    <h3>
					    	<a href="categories?title=<?php echo $row['cat_name'] ?>&page=1">
					    		<?php echo $row['cat_name'] ?>
					    	</a>
					    </h3>
					  </div>
					  <div class="last-published">
					  	<div class="panel-footer">
								<?php
									require_once $functionsDir . 'categories/get-articles-of-category.php';
									getArtsOfCat($row['cat_id'])
								?>
								<div class="cta">
									<a href="categories?title=<?php echo $row['cat_name'] ?>&page=1"
										class="btn btn-default center-block no-radius">
										View Articles of This Category
									</a>
								</div>
							</div>
					  </div>
					</div>
				</div>
			</div>
<?php }
	echo '</div>';
		if($count > 15) {
		 echo
			'<div class="col-md-12">
				<nav aria-label="Page navigation" class="text-center">
					<ul class="pagination">
						'.$paginationCtrls.'
					</ul>
				</nav>
			</div>';
		}
	} else {
		echo "<h3 class='text-center empty p'>There is No Categories to Display</h3>";
	}