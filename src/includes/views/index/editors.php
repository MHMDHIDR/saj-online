        <!-- Editorial Board Page Start -->
        <div class="col-sm-12">
          <ol class="breadcrumb">
            <span>You are in:&nbsp;&nbsp;</span>
            <li><a href="index">Home</a></li>
            <li class="active">Editors</li>
          </ol>
          <div class="editors smContainer underline-hover">
            <h3 class="underlined-text">Editorial Board</h3>
            <div class="col-md-6 col-md-offset-3">
              <div class="description">
              <?php
                $stmt = $con->prepare('SELECT * FROM saj_editors');
                $stmt->execute();
                $rows = $stmt->fetchAll();
                if(!empty($rows)) {
                  foreach ($rows as $row):
                    $eName = $row['editor_name'];
                    $eDesc = $row['editor_details']; ?>
                    <p><span class="name">
                      <?php echo !empty($eDesc) ? $eName .' - '. $eDesc : $eName; ?>
                    </span></p>
                  <?php endforeach;
                } else { ?>
              </div>
              <h2 class="text-center empty">There Are No Editors Yet.</h2>
              <?php } ?>
            </div> 
          </div>
          <div class="clearfix"></div>
          <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-info joinUs text-center">
              <div class="panel-heading">
                <p>
                  if you are interested and you want to become an editor with us, please contact us by visiting <br>
                  <a href="index?p=contact-us" class="btn btn-primary">
                    Contact Us
                  </a> page.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Editor Page End -->