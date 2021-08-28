<?php
	// Force the user to be in the first page if the get page is not set or is empty  
  if(!isset($_GET['page'])) {
    header('location: home?p=Categories&page=1');
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
    'home?p=Categories&',
    20
  );
  // Force the user to not pass the last page
  if($_GET['page'] > $lastPage) {
    header('location: home?p=Categories&page='.$lastPage);
  }

	//$stmt = $con->prepare('SELECT * FROM saj_categories');
	$stmt->execute();
	$rows = $stmt->fetchAll();
	if(!empty($rows)) {
		foreach ($rows as $row) { ?>
			<tr>
				<th scope="row"><?php echo $row['cat_id']; ?></th>
				<td><?php echo $row['cat_name']; ?></td>
				<td>
					<a class="btn btn-danger option"
					href="home?p=Categories&delete=<?php echo $row['cat_id'];?>">Delete</a>
				</td>
			</tr>
		<?php
		}
	} else { ?>
		<tr>
			<td colspan="3">
				<h3 class="empty text-center">There's No Categories to display.</h3>
			</td>
		</tr>
	<?php } ?>