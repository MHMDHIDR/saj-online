<?php
	if(isset($_GET['e']) && isset($_GET['h'])) {
		// Assign Get Varibles to another variables
		$getEmail = $_GET['e'];
		$getHash  = $_GET['h'];

		// Alert messages
		require $layoutsDir . 'public/alert.php';

		// Check if the get variables match the database info
		require 'src/dbcon.php';
		$stmt = $con->prepare('SELECT mem_email, mem_hash FROM saj_members WHERE mem_email = ?');
		$stmt->execute(array($getEmail));

		// Fetch Data from Database
		$rows = $stmt->fetchAll();
		foreach ($rows as $row) {
			$dbEmail = $row['mem_email'];
			$dbHash  = $row['mem_hash'];
		}

		// Validate, confirm, and compare the get info with db-info
		if($getEmail === $dbEmail && $getHash === $dbHash):?>
			<form action="?sign=forgot-password&do=complete-pass-reset&h=<?php echo $dbHash; ?>" method="POST">
				
      	<div class="col-md-6 col-md-offset-3">
	      	<div class="form-group">
	      		<!-- Password -->
	      		<label for="password" class="visible-xs">Password</label>
	      		<input type="password" name="password" id="password" class="form-control" placeholder="Enter New Password (at least 8 Characters + Numbers combined)" minlength="8" autocomplete="new-password" required>
	      	</div>
	      	<div class="form-group">
	      		<!-- Confirm Password -->
	      		<label for="cpassword" class="visible-xs">Confirm Password</label>
	      		<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Password Again" minlength="8" autocomplete="new-password" required>
	      	</div>
	      	<input type="hidden" name="email" value="<?php echo $dbEmail; ?>">
	      	<div class="form-group">
						<!-- Submit Button -->
						<label class="visible-xs">Update Password</label>
						<button type="submit" class="btn btn-primary btn-block text-uppercase">
							Update Password
						</button>
	      	</div>
      	</div>
			</form>
		<?php
		else:
			header('location: auth?sign=forgot-password');
		endif;
	} else {
		header('location: auth?sign=forgot-password');
	}