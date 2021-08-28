<?php
	function activeLink($link) {
    $page = isset($_GET['p']) ? $_GET['p'] : '';
    $status = isset($_GET['status']) ? $_GET['status'] : '';
    $pagebase = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    // Echo Active Link Class
    if($link == $page || $link == $status || $link == $pagebase){echo 'activeLink';}
  }
?>