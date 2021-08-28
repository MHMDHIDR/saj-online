<?php
	$stmt = $con->prepare('SELECT * FROM saj_articles WHERE art_id = ? AND art_status = 2');
	$stmt->execute(array($_GET['id']));
	$rows = $stmt->fetchAll();
	if(empty($rows)) { echo '
		<div class="text-center">
			<br><br><br><br>
			<h3 class="empty">
				The Article You\'re looking for is Not Available Anymore
			</h3><br>
			<a href="articles" class="btn btn-primary">
				&larr;&nbsp;&nbsp;Go Back
			</a>
			<br><br><br><br>
		</div>';
	} else {
		foreach ($rows as $row) { ?>
			<h4 class="text-center"><?php chkTxtDir($row['art_title']) ?></h4>
			<br><br>
			<div class="panel panel-default">
			  <div class="panel-body">
					<div class="col-sm-4">
						<!-- Article Author -->
						<span class="label label-primary">Author</span><br>
						<?php echo $row['art_author'] ?>
					</div>
				<?php if(!empty($row['art_co_authors'])): ?>
					<div class="col-sm-4">
						<!-- Article Co-Authors -->
						<span class="label label-primary">Co-Authors</span><br>
						<?php echo $row['art_co_authors'] ?>
					</div>
				<?php endif; ?>
					<div class="col-sm-4">
						<!-- Article Published Date -->
						<span class="label label-primary">Published On</span><br>
						<?php echo $row['art_upload_date'] ?>
					</div>
			  </div>
			  <div class="panel-footer">
					<span class="label label-primary">Abstract</span>
			  	<br><br>
			  	<?php chkTxtDir($row['art_abstract']) ?>
			  	<br><br>
			  	<a href="<?php echo $row['art_upload_dir'] ?>" class="btn btn-success">
			  		Download Full Text
			  		<i class="glyphicon glyphicon-save"></i>
		  		</a>
			  </div>
			</div>
<?php }
	}