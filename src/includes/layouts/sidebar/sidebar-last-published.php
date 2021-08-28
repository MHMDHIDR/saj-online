						<div class="col-md-12">
              <div class="sideBar">
                <a href="articles?page=1" class="sideBarHeading text-center">
                  Last Published Articles
                </a>
                <ul class="last-published">
              	<?php
                  getHomeSidebarData(
                    'art_title',
                    'art_id',
                    'saj_articles',
                    'WHERE art_status = 2',
                    'art_id DESC',
                    '10',
                    'articles',
                    'id',
                    NULL,
                    'There is No Published Articles Yet.' 
                  )
                ?>
                </ul>
                <div class="cta">
                	<a href="articles?page=1" class="btn btn-default center-block no-radius">
                		Show All
              		</a>
                  <div class="clearfix"></div>
            		</div>
              </div>
            </div>