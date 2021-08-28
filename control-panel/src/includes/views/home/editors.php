<?php
	if(!isset($_GET['delete'])):
?>
	<div class="row">
		<h2 class="text-center adminPageHeading">Add / Remove Editors</h2>
		<div class="col-md-8 col-md-offset-2">
			<?php
			// Require Editors form functionality
			require_once $controllersDir . 'users/editorsForm.php' 
			?>
		</div>
		<form action="home?p=Editors" method="POST" class="adEditors">
			<div class="col-md-6 col-md-offset-3">
				<!-- Editor Name -->
				<div class="form-group">
					<label for="eName" class="visible-xs">Editor Names</label>
					<input type="text" name="eName" id="eName" class="form-control"
					value="<?php echo(isset($name))?$name:''?>" placeholder="Editor Name" dir="auto">
				</div>
				<!-- Editor Description -->
				<div class="form-group">
					<label for="description" class="visible-xs">Editor Description</label>
					<textarea name="description" id="description" class="form-control resize-v" placeholder="Description (Optional)" dir="auto"><?php echo(isset($decs))?$decs:''?></textarea>
					<div class="note note-info text-center">Editor Description is Optional.</div>
				</div>
				<!-- Submit Editor Details -->
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block text-uppercase">Add</button>
				</div>
			</div>
		</form>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-12">
			<h2 class="text-center">Editors Table</h2>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th width="30%">Name</th>
			      <th width="65%">Description</th>
			      <th width="65%">Option</th>
			    </tr>
			  </thead>
			  <tbody>
					<?php require_once $functionsDir . 'get/get-editor.php' ?>
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
		require_once $controllersDir . 'users/delete-editor.php';
	endif
?>