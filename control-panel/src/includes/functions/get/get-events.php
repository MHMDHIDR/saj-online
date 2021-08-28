<?php
	// require __DIR__ . '/../../../../../src/dbcon.php';
	/* 
		used global variable to overcome the problem of not connected (undefined $con) variable
	*/
	global $con;

	// Force the user to be in the first page if the get page is not set or is empty  
  if(!isset($_GET['page'])) {
    header('location: home?p=Events&page=1');
  }
  // Require The Paginator Function
  require_once $functionsDir . 'public/saj_paginator.php';
  // Initialize The Paginator Function
  paginator(
    '*',
    'saj_events',
    NULL,
    NULL,
    'event_id DESC',
    'home?p=Events&',
    15
  );
  // Force the user to not pass the last page
  if($_GET['page'] > $lastPage) {
    header('location: home?p=Events&page='.$lastPage);
  }

	//$stmt = $con->prepare('SELECT * FROM saj_events');
	$stmt->execute();
	$rows = $stmt->fetchAll();
	if(!empty($rows)) {
		foreach ($rows as $row) { ?>
			<tr class="viewData">
				<th scope="row"><?php echo $row['event_title']; ?></th>
				<td><?php echo $row['event_details']; ?></td>
				<td>
					<a class="btn btn-danger option"
					href="home?p=Events&delete=<?php echo $row['event_id'];?>">Delete</a>
				</td>
			</tr>
		<?php
		}
	} else { ?>
		<tr>
			<td colspan="3">
				<h3 class="empty text-center">There's No Event to display.</h3>
			</td>
		</tr>
	<?php } ?>