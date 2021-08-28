<?php
	if (isset($_GET['delete'])):
		require $controllersDir . 'users/delete-user.php';
	elseif (isset($_GET['makeEditor'])):
		require $controllersDir . 'users/make-editor.php';
	elseif (isset($_GET['makeUser'])):
		require $controllersDir . 'users/make-user.php';
	else: ?>
	<div class="row">
		<div class="col-sm-12">
			<h2 class="text-center adminPageHeading">Users</h2>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th width="25%">User Name</th>
			      <th width="30%">Email</th>
			      <th width="20%">Phone</th>
			      <th width="25%">Option</th>
			    </tr>
			  </thead>
			  <tbody>
					<?php require_once $functionsDir . 'get/get-users.php' ?>
			  </tbody>
			</table>
			<nav aria-label="Page navigation" class="text-center">
				<ul class="pagination">
					<?php echo $paginationCtrls ?>
				</ul>
			</nav>
		</div>
	</div>
	<?php endif;