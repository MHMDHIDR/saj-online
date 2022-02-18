<?php
  ob_start();
	$title = 'Articles';
  require_once 'src/init.php';
?>
  <div class="container p">
    <div class="row">
    	<div class="col-sm-12">
      <?php if(isset($_GET['id']) && !empty($_GET['id'])): ?>
    	<!-- Individual Article Page Start -->
				<?php require_once $controllersDir . 'articles/get-individual-article.php' ?>
      <div class="cta">
        <a href="articles"
        class="btn btn-default center-block no-radius">
          Browse All Articles
        </a>
      </div>
    	<!-- Individual Article Page End -->
			<?php else: ?>
			<!-- Articles Page Start -->
				<div class="smContainer underline-hover">
					<h3 class="underlined-text">
						Articles
					</h3>
          <br><br><br>
				</div>
			  <?php require_once $controllersDir . 'articles/get-published-articles-page.php' ?>
    	<!-- Articles Page End -->
    	<?php endif ?>
    	</div>
    </div>
  </div>
<?php require_once $layoutsDir . 'public/footer.php'; ob_flush() ?>