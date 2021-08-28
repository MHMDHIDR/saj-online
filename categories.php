<?php
	ob_start();
	$title = 'Categories';
  require_once 'src/init.php';
?>
  <div class="container p">
    <div class="row">
      <div class="col-sm-12">
    	<?php if(isset($_GET['title']) && !empty($_GET['title'])): ?>
			<!-- Articles of one Category Page Start -->
				<?php require_once $functionsDir . 'categories/arts-of-one-cat-page.php' ?>
			<!-- Articles of one Category Page End -->
    	<?php else: ?>
			<!-- Categories Page Start -->
				<div class="smContainer underline-hover">
					<h3 class="underlined-text">
						Categories
					</h3>
          <br><br><br>
				</div>
				<div id="row-1"></div>
			  <div id="row-2"></div>
			  <div class="clearfix"></div>
			  <?php require_once $functionsDir . 'categories/get-categories.php' ?>
			<!-- Categories Page End -->
    	<?php endif ?>
			</div>
<?php require_once $layoutsDir . 'public/footer.php'; ob_flush() ?>