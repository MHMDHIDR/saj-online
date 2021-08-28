<?php
// Database connection file
require_once 'dbcon.php';

/********** Local Directories **********/
// Layouts Directory
$layouts = 'includes/layouts/';
// Functions Directory
$functions = 'includes/functions/';

/********** Global Directories **********/
// Global Layouts Directory
$layoutsDir = 'src/includes/layouts/';
// Global Layouts Directory
$viewsDir = 'src/includes/views/';
// Global Functions Directory
$functionsDir = 'src/includes/functions/';
// Global Controllers Directory
$controllersDir = 'src/includes/controllers/';

/*
* All of the required files
* Requiring header file it will alwasy stay at the bottom
*/
// Requiring Active Links Function
require_once $functions . 'public/active-nav-link.php';
// Requiring Display Events Function
require_once $functions . 'public/display-events.php';
// Requiring Check Text Direction
require_once $functions . 'public/chkTxtDir.php';
// Require Header file
require_once $layouts . 'header.php';