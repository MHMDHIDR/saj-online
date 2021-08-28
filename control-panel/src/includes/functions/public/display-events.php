<?php
  function displayEvents() {
    // require __DIR__ . '/../../../../../src/dbcon.php';
    /* 
      used global variable to overcome the problem of not connected (undefined $con) variable
    */
    global $con;
    $stmt = $con->prepare('SELECT * FROM saj_events');
    $stmt->execute();
    $rows = $stmt->fetchAll();
    if(!empty($rows)) {
      foreach ($rows as $row) {
        $eTitle   = $row['event_title'];
        $eDetails = $row['event_details'];
     echo '<li><a href="../index?p=events&title='.$eTitle.'">
      '.$eTitle.'
     </a></li>'; 
      }
    } else { echo
      '<li><a href="../index?p=events">Go to Events Page</a></li>';
    }
  }
?>