						<div class="col-md-12">
              <div class="sideBar">
                <a href="categories?page=1" class="sideBarHeading text-center">
                  Categories
                </a>
                <ul class="last-published">
                <?php
                  getHomeSidebarData(
                    'cat_name',
                    'cat_name',
                    'saj_categories',
                    NULL,
                    'cat_id ASC',
                    '10',
                    'categories',
                    'title',
                    '&page=1',
                    'There is No Categories Yet.' 
                  )
                ?>
                </ul>
                <div class="cta">
                	<a href="categories?page=1" class="btn btn-default center-block no-radius">
                		Show All
              		</a>
            		</div>
              </div>
            </div>