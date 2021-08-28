<?php
	// Force the user to be in the first page if the get page is not set or is empty  
  if(!isset($_GET['page'])) {
    header('location: articles?status=Approved&page=1');
  }
  // Require The Paginator Function
  require_once $functionsDir . 'public/saj_paginator.php';
  // Initialize The Paginator Function
  paginator(
    '*',
    'saj_articles',
    'WHERE art_status = 1',
    'WHERE art_status = 1',
    'art_id DESC',
    'articles?status=Approved&',
    1
  );
  // Force the user to not pass the last page
  if($_GET['page'] > $lastPage) {
    header('location: articles?status=Approved&page='.$lastPage);
  }

	$stmt->execute();
	$rows = $stmt->fetchAll();
	if(!empty($rows)) {
		foreach ($rows as $row) { ?>
			<div class="panel panel-default">
				<div class="panel-heading">
			    <h4>
			    	<?php chkTxtDir($row['art_title']) ?>
			    </h4>
			  </div>
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Institution</th>
			        <th>Department</th>
			        <th>Author</th>
			        <th>Co-Authors</th>
			        <th>Uploaded By</th>
			        <th>Uploaded On</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td><?php echo $row['art_inst'] ?></td>
			        <td><?php echo $row['art_dept'] ?></td>
			        <td><?php echo $row['art_author'] ?></td>
			        <td>
			        	<?php echo empty($row['art_co_authors']) ?
			        	'<span class="empty">No Co-Authors</span>' :
			        	$row['art_co_authors'] ?>
      		  	</td>
			        <td><?php echo $row['art_uploader'] ?></td>
			        <td><?php echo $row['art_upload_date'] ?></td>
			      </tr>
			    </tbody>
			  </table>
			  <div class="panel-body">
			  	<h4 class="label label-default">Abstract</h4>
			    <div class="abstract"><?php chkTxtDir($row['art_abstract']) ?></div>
			    <div class="options text-center">
			    	<?php require $controllersDir . 'articles/unapprove-article.php' ?>
			    	<br>
			    	<a href="articles?status=Approved&delete=<?php echo $row['art_id']; ?>&dir=<?php echo '../' . $row['art_upload_dir']; ?>" class="btn btn-danger option">
			    		Delete
			    		<i class="glyphicon glyphicon-remove"></i>
			  		</a>
			  		<a href="<?php echo '../' . $row['art_upload_dir'] ?>" class="btn btn-primary">
			    		Download
			    		<i class="glyphicon glyphicon-download-alt"></i>
			  		</a>
			    	<form action="articles?status=Approved&unapprove" method="POST" class="unapproveArt">
			    		<input type="hidden" name="artId" value="<?php echo $row['art_id']; ?>">
			    		<input type="hidden" name="artDir" value="<?php echo $row['art_upload_dir']; ?>">
			    		<button type="submit" class="btn btn-warning option">
			    			Unapprove
			    			<i class="glyphicon glyphicon-ban-circle"></i>
			    		</button>
			    	</form>
			    </div>
			  </div>
			</div>
<?php }
	} else { ?>
		<h3 class="empty text-center">There's No Approved Articles to Display.</h3>
	<?php } ?>