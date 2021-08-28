<?php
	// require __DIR__ . '/../../../../../src/dbcon.php';
	/* 
		used global variable to overcome the problem of not connected (undefined $con) variable
	*/
	global $con;

	// Force the user to be in the first page if the get page is not set or is empty  
  if(!isset($_GET['page'])) {
    header('location: home?p=Users&page=1');
  }
  // Require The Paginator Function
  require_once $functionsDir . 'public/saj_paginator.php';
  // Initialize The Paginator Function
  paginator(
    '*',
    'saj_members',
    'WHERE mem_group != 2',
    'WHERE mem_group != 2',
    'mem_id DESC',
    'home?p=Users&',
    25
  );
  // Force the user to not pass the last page
  if($_GET['page'] > $lastPage) {
    header('location: home?p=Users&page='.$lastPage);
  }
  
  // Get all published Issues
  $stmt->execute();
  $rows = $stmt->fetchAll();

	$stmt->execute();
	$rows = $stmt->fetchAll();
	if(!empty($rows)) {
		foreach ($rows as $row) { ?>
			<tr>
				<th><?php echo $row['mem_uname']; ?></th>
				<td><?php echo $row['mem_email']; ?></td>
				<td><?php echo $row['mem_phone']; ?></td>
				<td>
					<a class="btn btn-danger option"
					href="home?p=Users&delete=<?php echo $row['mem_id'];?>">Delete</a>
				<?php
				if($row['mem_group'] == 0):
					echo '<a class="btn btn-warning option"
					href="home?p=Users&makeEditor='.$row["mem_id"].'">Make as Editor</a>';
				else:
					echo '<a class="btn btn-warning option"
					href="home?p=Users&makeUser='.$row["mem_id"].'">Make as User</a>';
				endif;
				?>
				</td>
			</tr>
		<?php
		}
	} else { ?>
		<tr>
			<td colspan="4">
				<h3 class="empty text-center">There's No Users to display.</h3>
			</td>
		</tr>
	<?php } ?>