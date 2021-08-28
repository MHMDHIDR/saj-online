<?php
	if (isset($_GET['delete'])):
		require $controllersDir . 'articles/delete-article.php';
	elseif (isset($_GET['approve'])):
		require $controllersDir . 'articles/unapprove-article.php';
	else: ?>
	<div class="row">
		<div class="col-sm-12">
			<h2 class="text-center adminPageHeading">Approved Aritcles</h2>
		  <?php require_once $functionsDir . 'articles/get-approved.php' ?>
		  <nav aria-label="Page navigation" class="text-center">
				<ul class="pagination">
					<?php echo $paginationCtrls ?>
				</ul>
			</nav>
		</div>
	</div>
	<?php endif;