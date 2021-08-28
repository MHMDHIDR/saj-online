<?php
	ob_start();
  $title = !isset($_GET['status']) ?
    $title = 'Control Panel' :
    'Control Panel - ' . $_GET['status'] . ' Articles';
    
  require_once 'src/init.php';
  // Check if the user is Admin or not
  require_once $controllersDir . 'authentication/check-authentication.php';
  // Require Side Navigation Bar
  require_once $layoutsDir . 'side-nav.php'
?>
	<div class="container-fluid">
		<div class="col-md-10 p">
		<?php
      // page get request
      $page = isset($_GET['status']) ? $_GET['status'] : 'articles';
      !isset($_GET['status']) ? header('location: ?status=Approved') : '';
      if($page == 'Approved'):
        require_once $viewsDir . 'articles/approved.php'
      ?>
      <?php elseif($page == 'Unapproved'):
        require_once $viewsDir . 'articles/unapproved.php'
      ?>
      <?php else:
        require $layoutsDir . 'incorrect-page.php'
      ?>
      <?php endif
    ?>
		</div>
	</div>
<?php require_once $layoutsDir . 'footer.php'; ob_flush() ?>