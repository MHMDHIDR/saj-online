    <?php
	    ob_start();
	    $title = 'sign'.$_GET['sign'];
        if($_GET['sign'] == 'forgot-password') {
            $title = 'Forgot Password';
        }
	    require_once 'src/init.php'
    ?>
      <div class="container p">
        <div class="row">
        <?php // page get request
        $page = isset($_GET['sign']) ? $_GET['sign'] : 'in';
        if(!isset($_GET['sign'])) {
        	header('location: ?sign=in');
        }
        if($page == 'in'):
        	require_once $viewsDir . 'auth/signin.php'
      	?>
		<?php elseif($page == 'up'):
			require_once $viewsDir . 'auth/signup.php'
		?>
		<?php elseif($page == 'out'):
            require_once $viewsDir . 'auth/signout.php'
        ?>
        <?php elseif($page == 'out-cpanel'):
			require_once $viewsDir . 'auth/signout-cpanel.php'
		?>
        <?php elseif($page == 'forgot-password'):
            require_once $viewsDir . 'auth/forgot-password.php'
        ?>
        <?php else:
        	require $layoutsDir . 'public/incorrect-page.php'
        ?>
	      <?php endif ?>
    <?php require_once $layoutsDir . 'public/footer.php'; ob_flush() ?>