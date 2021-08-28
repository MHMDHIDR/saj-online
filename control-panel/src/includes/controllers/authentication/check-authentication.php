<?php
	if(isset($_SESSION['uname'])) {
  	require_once $functionsDir . 'public/check-user-group.php';
	  if($isAdmin != 2) { ?>
		<div class="container">
			<div class="rows">
			<?php
			require_once $layoutsDir . 'alert.php';
			alert('You will be redirected in 7 Seconds...', 'info',
				'text-center text-capitalize no-radius', false);
			require_once $layoutsDir . 'incorrect-page.php';
			require_once $layoutsDir . 'footer.php';
			header('refresh:7; url=../index');
			exit();
			?>
			</div>
		</div>
	  	<?php
	  }
  } else {
  	header('location: index');
  }