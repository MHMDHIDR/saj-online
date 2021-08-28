<?php
	ob_start();
  $title = 'Publish Articles';
  require_once 'src/init.php';
  // Check if the user is Admin or not
  require_once $controllersDir . 'authentication/check-authentication.php';
  // Require Side Navigation Bar
  require_once $layoutsDir . 'side-nav.php';
?>
	<div class="container">
  	<div class="row">
      <div class="col-md-10">
        <?php
          if(isset($_GET['editPublished'])):
            require_once $viewsDir . 'publish/edit-published.php';
          else:
            require_once $viewsDir . 'publish/publish-articles.php';
            require_once $viewsDir . 'publish/create-issue.php';
          endif;
        ?>
      </div>
    </div>
	</div>
<?php require_once $layoutsDir . 'footer.php'; ob_flush() ?>