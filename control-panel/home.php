<?php
	ob_start();
  $title = !isset($_GET['p']) ? $title = 'Control Panel' : 'Control Panel - ' . $_GET['p'];
  require_once 'src/init.php';
  // Check if the user is Admin or not
  require_once $controllersDir . 'authentication/check-authentication.php';
  // Require Side Navigation Bar
  require_once $layoutsDir . 'side-nav.php';
?>
	<div class="container-fluid">
		<div class="col-md-10 p">
		<?php
      // page get request
      !isset($_GET['p']) ? header('location: ?p=Main') : '';
      $page = $_GET['p'];
      if($page == 'Main'):
        // Latest Registered Users or Published Articles
        $latestNum = 10;
        // Require getStatstic Function
        require_once $functionsDir . 'get/get-statistics.php';
        // Require getStatstic Function
        require_once $functionsDir . 'get/get-data.php';
        require_once $viewsDir . 'home/control-panel.php'
      ?>
  		<?php elseif($page == 'Categories'):
        require_once $viewsDir . 'home/categories.php'
      ?>
      <?php elseif($page == 'Users'):
        require_once $viewsDir . 'home/users.php'
      ?>
      <?php elseif($page == 'Editors'):
        require_once $viewsDir . 'home/editors.php'
      ?>
      <?php elseif($page == 'Events'):
        require_once $viewsDir . 'home/events.php'
      ?>
      <?php else:
        require $layoutsDir . 'incorrect-page.php'
      ?>
    	<?php endif
    ?>
		</div>
	</div>
<?php require_once $layoutsDir . 'footer.php'; ob_flush() ?>