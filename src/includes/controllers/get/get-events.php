<?php
	// Force the user to be in the first page if the get page is not set or is empty  
  if(!isset($_GET['page'])) {
    header('location: index?p=events&page=1');
  }
  // Require The Paginator Function
  require_once $functionsDir . 'public/saj_paginator.php';
  // Initialize The Paginator Function
  paginator(
    '*',
    'saj_events',
    NULL,
    NULL,
    'event_id DESC',
    'index?p=events&',
    30
  );
  // Force the user to not pass the last page
  if($_GET['page'] > $lastPage) {
    header('location: index?p=events&page='.$lastPage);
  }
  $stmt->execute();
  $rows = $stmt->fetchAll();
  if(!empty($rows)) {
    foreach ($rows as $row) { ?>
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-info">
          <div class="panel-heading eventTitle">
            <a href="index?p=events&title=<?php echo $row['event_title']?>">
              <?php chkTxtDir($row['event_title']); ?>
            </a>
          </div>
        </div>
      </div>
<?php }
echo 
'<div class="col-md-12">
  <nav aria-label="Page navigation" class="text-center">
    <ul class="pagination">
      '.$paginationCtrls.'
    </ul>
  </nav>
</div>';
}