<?php
  function activeLink($slug) {
    $page = isset($_GET['p']) ? $_GET['p'] : 'index';
    $pagebase = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    if($slug == $page || $slug == $pagebase){echo 'active';}
  }
?>