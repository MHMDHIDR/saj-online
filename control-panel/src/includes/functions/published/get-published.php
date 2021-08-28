<?php
	$stmt = $con->prepare('SELECT * FROM saj_articles WHERE art_status = 2 ORDER BY art_id DESC');
	$stmt->execute();
	$rows = $stmt->fetchAll();
	if(!empty($rows)) {
		foreach ($rows as $row) { ?>
			<tr class="paginatedElements">
				<td><?php echo $row['art_title']; ?></td>
				<td><?php echo $row['art_author']; ?></td>
				<td><?php echo !(empty($row['art_co_authors'])) ? $row['art_co_authors'] : '<span class="empty">No Co-Authors</span>'; ?></td>
				<?php
					require_once 'get-published-issue-cat.php';
					getPublishedIssueCat('saj_issues', 'issue_id', $row['art_issue'], 'issue_title');
					getPublishedIssueCat('saj_categories', 'cat_id', $row['art_cat_id'], 'cat_name')
				?>
				<td>
					<a class="btn btn-danger option"
					href="publish?deletePublished=<?php echo $row['art_id'];?>&dir=<?php echo '../'.$row['art_upload_dir'] ?>">Delete</a>
					<a class="btn btn-primary"
					href="publish?editPublished=<?php echo $row['art_id'];?>">Edit</a>
				</td>
			</tr>
		<?php
		}
	} else { ?>
		<tr>
			<td colspan="6">
				<h4 class="empty text-center">There's No Published Articles to Display.</h4>
			</td>
		</tr>
	<?php } ?>