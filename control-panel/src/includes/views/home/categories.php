<?php
	if(!isset($_GET['delete'])):
?>
	<div class="row">
		<h2 class="text-center adminPageHeading">Add / Remove Categories</h2>
		<div class="col-md-8 col-md-offset-2">
			<?php
			// Require Categories form functionality
			require_once $controllersDir . 'categories/categoriesForm.php' 
			?>
		</div>
		<form action="home?p=Categories" method="POST" class="adCats">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<!-- Category Name -->
					<label for="cName" class="visible-xs">Category Title</label>
					<input type="text" name="cName" id="cName" class="form-control" dir="auto"
					value="<?php echo(isset($cName))?$cName:''?>" placeholder="Category Name">
				</div>
				<div class="form-group">
					<!-- Add New Category Button -->
					<button type="submit" class="btn btn-primary btn-block text-uppercase">Add</button>
				</div>
			</div>
		</form>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-12">
			<h2 class="text-center">Categories Table</h2>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th width="5%">#ID</th>
			      <th width="80%">Name</th>
			      <th width="15%">Option</th>
			    </tr>
			  </thead>
			  <tbody>
					<?php require_once $functionsDir . 'get/get-categories.php' ?>
			  </tbody>
			</table>
			<nav aria-label="Page navigation" class="text-center">
				<ul class="pagination">
					<?php echo $paginationCtrls ?>
				</ul>
			</nav>
		</div>
	</div>
<?php
	elseif (isset($_GET['delete'])):
		require_once $controllersDir . 'categories/delete-categories.php';
	endif
?>