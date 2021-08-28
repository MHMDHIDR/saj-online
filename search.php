    <?php
    	ob_start();
    	if(empty($_GET['searchFor'])) {
    		$title = 'Search..';
    	} else {
    		$title = 'Search Results of "' . htmlentities($_GET['searchFor']) . '"';
    	}
	    require_once 'src/init.php';
	    require_once $layoutsDir . 'public/alert.php'
    ?>
      <div class="container p">
				<!-- Search Results Page Start -->
        <div class="col-sm-12">
          <h1 class="text-center p">Search Page</h1>
          <div class="search-results">
        	<?php if(!empty($_GET['searchFor'])): ?>
          	<div class="search-for">
          		<span>Search Results of:&nbsp;&nbsp;</span>
	          	<h3 style="display: inline">
	          		"<?php echo htmlentities($_GET['searchFor']) ?>"
	          	</h3>
          	</div>
          	<div class="results">
          		<?php require_once $controllersDir . 'search/search-results-controller.php' ?>
          	</div>
        	<?php else:
      			alert('You Searched for Nothing, Please Enter The article title before search', 'warning', 'text-center text-capitalize', false);
  				?>
  					<!-- If the search is empty -->
      			<?php require_once $layoutsDir . 'search/search-form.php' ?>

    			<?php endif; // end if for results page ?>
          </div>
        </div>
        <!-- Search Results Page End -->
      </div>
    <?php require_once $layoutsDir . 'public/footer.php'; ob_flush() ?>