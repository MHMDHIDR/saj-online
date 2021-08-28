        <!-- Contact Page Start -->
        <ol class="breadcrumb">
          <span>You are in:&nbsp;&nbsp;</span>
          <li><a href="index">Home</a></li>
          <li class="active">Contact Us</li>
        </ol>
        <div class="contact-us smContainer underline-hover">
          <h3 class="underlined-text">Contact Us</h3>
          <?php 
            // Require Contact Us form functionality
            require_once $controllersDir . 'public/contactUsForm.php' 
          ?>
          <div class="col-md-9 noColPadd">
            <?php require_once $layoutsDir . 'contactUs/theForm.php' ?>
          </div>
          <div class="col-md-3 noColPadd">
            <?php require_once $layoutsDir . 'contactUs/theInfo.php' ?>
          </div>
        </div>
        <!-- Contact Page End -->