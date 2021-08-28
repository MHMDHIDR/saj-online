<?php
	// require __DIR__ . '/../../../../../src/dbcon.php';
	/* 
		used global variable to overcome the problem of not connected (undefined $con) variable
	*/
	global $con;

	// Force the user to be in the first page if the get page is not set or is empty  
  if(!isset($_GET['page'])) {
    header('location: home?p=Editors&page=1');
  }
  // Require The Paginator Function
  require_once $functionsDir . 'public/saj_paginator.php';
  // Initialize The Paginator Function
  paginator(
    '*',
    'saj_editors',
    NULL,
    NULL,
    'editor_id DESC',
    'home?p=Editors&',
    10
  );
  // Force the user to not pass the last page
  if($_GET['page'] > $lastPage) {
    header('location: home?p=Editors&page='.$lastPage);
  }

	//$stmt = $con->prepare('SELECT * FROM saj_editors');
	$stmt->execute();
	$rows = $stmt->fetchAll();
	if(!empty($rows)) {
		foreach ($rows as $row) { ?>
			<tr>
				<th scope="row"><?php echo $row['editor_name']; ?></th>
				<td>
				<?php 
					echo !(empty($row['editor_details'])) ? $row['editor_details'] :
					'<p class="empty">No Details for This Editors</p>';
					?>
				</td>
				<td>
					<a class="btn btn-danger option"
					href="home?p=Editors&delete=<?php echo $row['editor_id'];?>">Delete</a>
				</td>
			</tr>
		<?php
		}
	} else { ?>
		<tr>
			<td colspan="3">
				<h3 class="empty text-center">There's No Editors to display.</h3>
			</td>
		</tr>
	<?php } ?>