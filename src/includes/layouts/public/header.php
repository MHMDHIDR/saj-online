<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Start Meta Tags -->
    <meta charset="UTF-8">
    <meta name="description" content="Sudan Academic Journal for Researches and Science">
    <meta name="keywords" content="Sudan,Journal,Academic,Researches,Science,Online_Magazine,Search,technology">
    <meta name="author" content="Mohammed Hayder">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- End Meta Tags -->
    <title><?php
    echo $title=isset($title)?$title:$title='Sudan Academic Journal for Researches and Scienc'
    ?></title>
    <link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <!-- Start Styles -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- My Custom CSS -->
    <link href="assets/css/app.css" rel="stylesheet">
    <!-- End Styles -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Start Header -->
    <header>
      <!-- Top Navigation Bar Start -->
      <nav class="topNav">
        <div class="container">
          <div class="issnCode pull-left">
            <label class="label label-default">ISSN : </label>
            <b>1858-7852</b>
            <b>1858-7860</b>
          </div>
        <?php if(!isset($_SESSION['uname'])):?>
          <div class="authLinks pull-right">
            <ul>
              <li><a href="auth?sign=in">Sign In</a></li>
              <li><a href="auth?sign=up">Sign Up</a></li>
            </ul>
          </div>
        <?php else: ?>
          <div class="authLinks pull-right">
            <ul>
              <li><a href="auth?sign=out">Sign Out</a></li>
            <?php
              require_once __DIR__ . '/../../functions/public/check-user-group.php';
              if($isAdmin == 2) { echo
                '<li><a href="control-panel/home?p=Main">Control Panel</a></li>';
              } elseif($isAdmin == 1) {
                /* isAdmin 1 means and Editor */
                require_once $controllersDir . 'articles/count-unapproved-articles.php';
              }
            ?>
            </ul>
          </div>
        <?php endif ?>
        </div>
      </nav>
      <!-- Top Navigation Bar End -->
      <!-- Events Bar Start -->
      <div class="eventsBar">
      <!-- News Ticker Start -->
        <div class="breakingNews" id="events">
          <div class="bn-title">
            <h2>
              <a href="index?p=events">Events</a>
            </h2>
            <!-- Indicator Start -->
            <span></span>
            <!-- Indicator End -->
          </div>
          <ul class="events">
          <?php displayEvents() ?>
          </ul>
          <!-- Breaking News Navigation Buttons -->
          <div class="bn-navi">
            <span></span>
            <span></span>
          </div>
        </div>
      <!-- News Ticker End -->
      </div>
      <!-- Events Bar End -->
      <!-- Header Middle Content Starts -->
      <div class="middleHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="logo">
                <a href="index?page=1">
                  <img src="assets/img/logo.png" width="50" alt="Sudan Academic Journal Logo" title="Sudan Academic Journal for Research and Science">
                </a>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="journal-name text-center">
                <p>Sudan Academic Journal for Research and Science</p>
                <p>مجلة السودان الأكاديمية للبحوث والعلوم</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header Middle Content End -->
      <!-- Main Navigation Menu Bar Start -->
      <div class="mainNav">
        <nav class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="homeBtn pull-left">
                <a href="index?page=1" title="Home Page">
                  <i class="glyphicon glyphicon-home"></i>
                </a>
              </div>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <form class="navbar-form navbar-left" action="search" method="GET">
                <div class="form-group">
                <input type="search" name="searchFor" class="form-control"
                  placeholder="Search for Articles" dir="auto"
                  <?php
                    echo isset($_GET['searchFor']) && !empty($_GET['searchFor']) ?
                      'value="' .  htmlentities($_GET['searchFor']) . '"' : ''
                  ?>
                >
                </div>
                <button type="submit" class="btn btn-default">Search</button>
              </form>
              <ul class="nav navbar-nav">
                <li class=<?php activeLink('submit-article') ?> ><a href="submit-article">Submit Article</a></li>
                <li class=<?php activeLink('terms') ?> ><a href="index?p=terms">Terms</a></li>
                <li class=<?php activeLink('editors') ?> ><a href="index?p=editors">Editors</a></li>
                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About&nbsp;<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="index?p=about-us">About US</a></li>
                    <li><a href="index?p=about-publication">Publication</a></li>
                    <li><a href="index?p=about-the-company">The Company</a></li>
                  </ul>
                </li>
                <li class=<?php activeLink('contact-us') ?> ><a href="index?p=contact-us">Contact</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <!-- Main Navigation Menu Bar End -->
    </header>
    <!-- End Header -->

    <!-- Start Content -->
    <section class="content">