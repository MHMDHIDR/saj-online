<?php
	if(!isset($_GET['delete'])):
?>
	<div class="row">
		<h2 class="text-center adminPageHeading">Add / Remove Events</h2>
		<div class="col-md-8 col-md-offset-2">
			<?php
			// Require Events form functionality
			require_once $controllersDir . 'events/eventsForm.php' 
			?>
		</div>
		<form action="home?p=Events" method="POST" class="adEvents">
			<div class="col-md-6 col-md-offset-3">
				<!-- Editor Name -->
				<div class="form-group">
					<label for="evTitle" class="visible-xs">Event Title</label>
					<input type="text" name="evTitle" id="evTitle" class="form-control" dir="auto"
					value="<?php echo(isset($eTitle))?$eTitle:''?>" placeholder="Event Title" required>
				</div>
				<div class="form-group">
					<!-- Event Details -->
					<label for="evDetails" class="visible-xs">Editor Description</label>
					<textarea name="evDetails" id="evDetails" class="form-control resize-v" placeholder="Event Details" dir="auto"><?php echo(isset($details))?$details:''?></textarea>
					<div class="note note-info text-capitalize">
						the event details are optional, if it's empty then the user will read "No further details in this event".
					</div>
				</div>
				<div class="form-group">
					<!-- Submit Event Details Button -->
					<button type="submit" class="btn btn-primary btn-block text-uppercase">Add</button>
				</div>
			</div>
		</form>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-12">
			<h2 class="text-center">Events Table</h2>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th width="30%">Title</th>
			      <th width="65%">Details</th>
			      <th width="65%">Option</th>
			    </tr>
			  </thead>
			  <tbody>
					<?php require_once $functionsDir . 'get/get-events.php' ?>
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
		require_once $controllersDir . 'events/delete-event.php';
	endif
?>