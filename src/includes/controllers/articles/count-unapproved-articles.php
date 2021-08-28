<?php
    $stmt = $con->prepare('SELECT * FROM saj_articles WHERE art_status = 0');
    $stmt->execute();
    $count = $stmt->rowCount();
    /*Not Admin (Editor)*/ echo
    '<li>
      <a href="unapproved-articles" title="'.$count.' Unapproved Articles">
        Unapproved Articles
        <span class="badge">'.$count.'</span>
      </a>
    </li>';