        <!-- Events Page Start -->
        <div class="col-sm-12">
          <ol class="breadcrumb">
            <span>You are in:&nbsp;&nbsp;</span>
            <li><a href="index">Home</a></li>
            <li class="active">Events</li>
          </ol>
          <div class="about-us smContainer underline-hover">
            <h3 class="underlined-text">Events</h3>
            <div class="container-fluied">
              <div class="row">
            <?php
              // page get request
              $page = isset($_GET['title']) ? $_GET['title'] : '';
              if(!empty($page)):
                require_once $controllersDir . 'get/get-one-event.php';
              else:
                require_once $controllersDir . 'get/get-events.php';
             endif ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Events Page End -->