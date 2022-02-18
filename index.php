<?php
  ob_start();
  $title = !isset($_GET['p']) ? $title = 'Home Page' : $_GET['p'];
  require_once 'src/init.php'
?>
    <div class="container p">
      <div class="row">

        <?php // page get request
        $page = isset($_GET['p']) ? $_GET['p'] : 'index';
        if($page == 'index'):
          require_once $viewsDir . 'index/home.php'
        ?>
        <?php elseif($page == 'terms'):
          require_once $viewsDir . 'index/terms.php'
        ?>
        <?php elseif($page == 'editors'):
          require_once $viewsDir . 'index/editors.php'
        ?>
        <?php elseif($page == 'about-us'):
          require_once $viewsDir . 'index/about-us.php'
        ?>
        <?php elseif($page == 'about-publication'):
          require_once $viewsDir . 'index/about-publication.php'
        ?>

        <?php elseif($page == 'about-the-company'):
          require_once $viewsDir . 'index/about-the-company.php'
        ?>
        
        <?php elseif($page == 'contact-us'):
          require_once $viewsDir . 'index/contact-us.php'
        ?>

        <?php elseif($page == 'events'):
          require_once $viewsDir . 'index/events.php'
        ?>
        
        <?php elseif($page == 'issue'):
          require_once $viewsDir . 'index/issue.php'
        ?>

        <?php else:
          require $layoutsDir . 'public/incorrect-page.php'
        ?>
        <?php endif ?>
      </div>
    </div>
    <?php require_once $layoutsDir . 'public/footer.php'; ob_flush() ?>