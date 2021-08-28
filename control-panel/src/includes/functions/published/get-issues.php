<?php
	// Force the user to be in the first page if the get page is not set or is empty  
	if(!isset($_GET['page'])) {
		header('location: publish?page=1');
	}
	// Require The Paginator Function
	require_once $functionsDir . 'public/saj_paginator.php';
	// Initialize The Paginator Function
	paginator(
		'*',
		'saj_issues',
		NULL,
		NULL,
		'issue_id DESC',
		'publish?',
		20
	);
	// Force the user to not pass the last page
	if($_GET['page'] > $lastPage) {
		header('location: publish?page='.$lastPage);
	}
	// Continuation of the $stmt from the required function
	//$stmt = $con->prepare('SELECT * FROM saj_issues ORDER BY issue_id DESC');
	$stmt->execute();
	$rows = $stmt->fetchAll();
	if(!empty($rows)) {
		foreach ($rows as $row) { ?>
			<tr>
				<th><?php echo $row['issue_id']; ?></th>
				<td style="text-align:left"><?php echo $row['issue_title']; ?></td>
				<td>
					<a class="btn btn-danger option"
					href="publish?deleteIssue=<?php echo $row['issue_id'];?>">Delete</a>
				</td>
			</tr>
		<?php
		}
	} else { ?>
		<tr>
			<td colspan="3">
				<h4 class="empty text-center">There's No Created Issues to Display.</h4>
			</td>
		</tr>
	<?php } ?>