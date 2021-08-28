<?php
  $stmt = $con->prepare('SELECT * FROM saj_events WHERE event_title = ?');
  $stmt->execute(array($_GET['title']));
  $rows = $stmt->fetchAll();
  if(!empty($rows)) {
    foreach ($rows as $row) {
      $title   = $row['event_title'];
      $details = $row['event_details']; ?>
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">
              <a href="index?p=events&title=<?php echo $title; ?>">
                <?php chkTxtDir($title); ?>
              </a>
            </h3>
          </div>
          <div class="panel-body">
            <?php chkTxtDir($details); ?>
          </div>
        </div>
        <div class="cta">
          <a href="index?p=events" class="btn btn-default center-block no-radius text-capitalize">
            borwose all events
          </a>
        </div>
      </div>
<?php }
} else { echo '
  <h1 class="empty text-center">There Are No Shared Events.</h1>';
}