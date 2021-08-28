  		<div class="issue">
				<h3>Create New Issue</h3>
				<?php require_once $controllersDir . 'published/new-issue.php' ?>
				<form action="publish?do=new-issue" method="POST">
				<!-- Confirm Password -->
        	<div class="col-md-7 col-md-offset-3">
        		<label for="issueTitle" class="visible-xs">Issue Title</label>
        		<input type="text" name="issueTitle" id="issueTitle" class="form-control" dir="auto" placeholder="Issue Title" >
        	</div>
        	<!-- Submit Button -->
        	<div class="col-md-7 col-md-offset-3">
          	<label class="visible-xs">Create</label>
						<button type="submit" class="btn btn-primary btn-block">Create</button>
        	</div>
				</form>
				<div class="clearfix"></div>
				<br><br>
  			<div class="col-md-12">
  				<h2 class="text-center">Created Issues</h2>
					<table class="table table-striped">
					  <thead>
					    <tr>
					      <th width="5%">#ID</th>
					      <th width="85%">Issue Title</th>
					      <th width="10%">Options</th>
					    </tr>
					  </thead>
					  <tbody>
							<?php 
								require_once $functionsDir . 'published/get-issues.php';
								require_once $functionsDir . 'published/delete-issue.php';
							?>
					  </tbody>
					</table>
					<nav aria-label="Page navigation" class="text-center">
						<ul class="pagination">
							<?php echo $paginationCtrls ?>
						</ul>
					</nav>
  			</div>
			</div>
		</section>
	</div>