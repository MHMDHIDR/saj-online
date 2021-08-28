<?php
	ob_start();
	$title = 'Verifying "' . $_GET['u'] . '" Account';
  require_once 'src/init.php';

  // Check if GET username and GET hash are set and not empty, then set the variables

	if(isset($_GET['u']) && !empty($_GET['u']) && isset($_GET['h']) && !empty($_GET['h'])) {
	  // Get User variable
	  $user = $_GET['u'];
	  // Get Hash variable
	  $hash  = $_GET['h'];

	  // requiring Alert
		require $layoutsDir . 'public/alert.php';

	  // Check if user exist in the database or not 
		$stmt = $con->prepare('SELECT mem_uname, mem_hash, mem_status FROM saj_members WHERE mem_uname = ? AND mem_hash = ? AND mem_status = 0');
		$stmt->execute(array($user, $hash));
		$count = $stmt->rowCount();

		// Count if there's a user with the same Get variables information
		if($count > 0) {
			$stmt = $con->prepare("UPDATE saj_members SET mem_status = 1, mem_hash = 0 WHERE mem_uname = ? AND mem_hash = ?");
			$stmt->execute(array($user, $hash)) ?>
			<!-- Breaks -->
			<br><br><br>
			<div class="col-md-8 col-md-offset-2">
				<?php alert('You\'ve Successfully Activated Your Account.<br>Redirecting after 4 seconds...', 'info', '', true) ?>
			</div>
			<!-- Breaks -->
			<br>
			<?php header("refresh:4; url=auth?sign=in");
		}	else {?>
			<!-- Breaks -->
			<br><br>
			<div class="col-md-8 col-md-offset-2">
				<?php alert('Redirecting after 10 seconds...', 'info', 'no-radius', false) ?>
			</div>
			<!-- Incorrect Page -->
			<div class="col-md-8 col-md-offset-2">
				<?php require $layoutsDir . 'public/incorrect-page.php' ?>
			</div>
			<!-- Breaks -->
			<br><br>
			<?php
			// Redirecting to Sign in Page
			header("refresh: 8; url=auth?sign=in");
		}
	} else {
		header('Location: index');
		exit();
	}
?>

<?php require_once $layoutsDir . 'public/footer.php'; ob_flush() ?>