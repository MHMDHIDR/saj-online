<?php
  // Force the user to be in the first page if the get page is not set or is empty  
  if(!isset($_GET['page'])) {
    header('location: index?page=1');
  }
  // Require The Paginator Function
  require_once $functionsDir . 'public/saj_paginator.php';
  // Initialize The Paginator Function
  paginator(
    '*',
    'saj_issues',
    'WHERE issue_has_arts = 1',
    'WHERE issue_has_arts = 1',
    'issue_id DESC',
    'index?',
    10
  );
  // Force the user to not pass the last page
  if($_GET['page'] > $lastPage) {
    header('location: index?page='.$lastPage);
  }
  
  // Get all published Issues
  $stmt->execute();
  $rows = $stmt->fetchAll();
  if(empty($rows)) {
    // Import alert
    require $layoutsDir . 'public/alert.php';
    // Display Info Message
    alert('<h3>There Are No Published Articles in The Journal at The Moment.</h3>', 'info', 'note note-primary text-center', false);
  } else {
    foreach ($rows as $row) { ?>
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title text-center"><?php chkTxtDir($row['issue_title']) ?></h3>
          </div>
          <div class="panel-body homeArticles">
            <?php include_once $functionsDir . 'published/getArticlesTitle.php' ?>
            <ul>
              <?php articlesTitle($row['issue_id']) ?>
            </ul>
            <div class="cta">
              <a href="index?p=issue&title=<?php echo $row['issue_title'] ?>&page=1"
              class="btn btn-default center-block no-radius">
                Show All
              </a>
            </div>
          </div>
        </div>
      </div>
<?php }
    echo
     '<nav aria-label="Page navigation" class="text-center">
        <ul class="pagination">
          '.$paginationCtrls.'
        </ul>
      </nav>';
  }