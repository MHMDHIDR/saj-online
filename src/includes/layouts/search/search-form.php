          <form action="search" method="GET" class="mb">
    				<!-- Search Input -->
    				<div class="form-group">
      				<input type="search" class="form-control custIn" name="searchFor"
                placeholder="Search for Articles..." dir="auto"
              <?php
                echo isset($_GET['searchFor']) && !empty($_GET['searchFor']) ?
                  'value="' .  htmlentities($_GET['searchFor']) . '"' : ''
              ?>
              required>
    				</div>
    				<div class="form-group">
    					<button class="btn btn-primary btn-block" type="submit">
      					Search
      				</button>
    				</div>
    			</form>