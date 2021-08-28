<?php
	ob_start();
	$title = 'Editor Panel | Unapproved Articles';
  require_once 'src/init.php';
  if($isAdmin != 1) {
  	// Is Not an Editor, Then should be redirected.
  	header('location: index');
  	exit();
  }
?>
  <div class="container p">
    <div class="row">
    <?php
    // If these is sentTo GET variable, then require the following file
    if(isset($_GET['sendTo'])): ?>
      <!-- Send Email Start -->
      	<?php require $controllersDir . 'articles/send-comment-editor.php' ?>
    	<!-- Send Email End -->
    <?php else: ?>
      <!-- Unapproved Articles Page Start -->
      <div class="col-sm-12">
				<div class="smContainer underline-hover">
					<h3 class="underlined-text">
						Editor panel \ Unapproved Articles
					</h3>
					<br><br><br>
				</div>
			  <?php require_once $functionsDir . 'articles/get-unapproved.php' ?>
        <nav aria-label="Page navigation" class="text-center">
          <ul class="pagination">
            <?php echo $paginationCtrls ?>
          </ul>
        </nav>
			</div>
      <!-- Unapproved Articles Page End -->
    <?php endif ?>
<?php require_once $layoutsDir . 'public/footer.php'; ob_flush() ?>