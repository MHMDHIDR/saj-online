<?php
	// Force the user to be in the first page if the get page is not set or is empty  
  if(!isset($_GET['page'])) {
    header('location: articles?status=Unapproved&page=1');
  }
  // Require The Paginator Function
  require_once $functionsDir . 'public/saj_paginator.php';
  // Initialize The Paginator Function
  paginator(
    '*',
    'saj_articles',
    'WHERE art_status = 0',
    'WHERE art_status = 0',
    'art_id DESC',
    'articles?status=Unapproved&',
    5
  );
  // Force the user to not pass the last page
  if($_GET['page'] > $lastPage) {
    header('location: articles?status=Unapproved&page='.$lastPage);
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
			        <td class="username">
				        <?php
				        	echo $row['art_uploader'];
				        	require_once $functionsDir . 'public/retrieve-user-info.php';
			        		retrieveUserInfo($row['art_uploader']);
				        ?>
				        <div class="indicator"></div>
			        </td>
			        <td><?php echo $row['art_upload_date'] ?></td>
			      </tr>
			    </tbody>
			  </table>
			  <div class="panel-body">
			  	<h4 class="label label-default">Abstract</h4>
			    <div class="abstract"><?php chkTxtDir($row['art_abstract']) ?></div>
			    <div class="options text-center">
			    	<a href="articles?status=Unapproved&delete=<?php echo $row['art_id']; ?>&dir=<?php echo '../' . $row['art_upload_dir']; ?>" class="btn btn-danger option">
			    		Delete
			    		<i class="glyphicon glyphicon-remove"></i>
			  		</a>
			  		<a href="<?php echo '../' . $row['art_upload_dir'] ?>" class="btn btn-primary">
			    		Download
			    		<i class="glyphicon glyphicon-download-alt"></i>
			  		</a>
			    	<a href="articles?status=Unapproved&approve=<?php echo $row['art_id']; ?>&dir=<?php echo $row['art_upload_dir']; ?>" class="btn btn-success option">
			    		Approve
			    		<i class="glyphicon glyphicon-ok"></i>
			  		</a>
			    </div>
			    <div class="sendCommentForm">
			    	<?php
			    		// Get Email of the Article Uploader
							$stmt = $con->prepare('SELECT mem_email FROM saj_members WHERE mem_uname = ?');
							$stmt->execute(array($row['art_uploader']));
							$rows = $stmt->fetchAll();
							if(!empty($rows)) {
								foreach ($rows as $row) {
									$uploaderEmail = !empty($row['mem_email']) ? $row['mem_email'] : '<span class="empty">Email Wasn\'t Found</span>';
								}
							}
			    	?>
			    	<form action="articles?status=Unapproved&sendTo=<?php echo $row['art_id']; ?>" method="POST">
			    		<div>
			    			<p>
			    				This Comment Will be Sent to the Uploader of this Article Email 
			    				<b>
		    					<?php
				    				echo isset($uploaderEmail) ? $uploaderEmail :
				    				'<span class="empty">No Email Found</span>';
			    				?>
			    				</b> by using editor email:
			    				<b>Editor@sudanacademicjournal.net</b>
			    			</p>
			    		</div>
			    		<input type="text" name="subject" placeholder="subject" dir="auto" class="form-control" required>
			    		<textarea name="message" placeholder="Message" dir="auto" class="form-control resize-v" required></textarea>
			    		<input type="hidden" name="email"
			    		value="<?php echo isset($uploaderEmail) ? $uploaderEmail : '' ?>">
			    		<button type="submit" class="btn btn-success">
			    			Send <i class="glyphicon glyphicon-envelope"></i>
			    		</button>
			    	</form>
			    </div>
			  </div>
			</div>
<?php }
	} else { ?>
		<h3 class="empty text-center">There's No Unapproved Articles to Display.</h3>
	<?php } ?>