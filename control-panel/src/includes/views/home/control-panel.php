			<div class="row">
				<h2 class="text-center adminPageHeading">Control Panel - Main Page</h2>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="statistics text-center">
						<div class="panel panel-primary">
		          <div class="panel-heading">
		            <div class="panel-title text-capitalize">
		            	<a href="articles?status=Unapproved" class="statObject">
		            		<h4>
		            			<i class="glyphicon glyphicon-remove"></i>
		            			<span>Unapproved Articles</span>
	            			</h4>
										<h1>
											<?php getStatstic('*', 'saj_articles', 'art_status', 0) ?>
										</h1>
									</a>
		            </div>
		          </div>
		        </div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="statistics text-center">
						<div class="panel panel-primary">
		          <div class="panel-heading">
		            <div class="panel-title text-capitalize">
		            	<a href="articles?status=Approved" class="statObject">
		            		<h4>
		            			<i class="glyphicon glyphicon-ok"></i>
		            			<span>Approved Articles</span>
	            			</h4>
										<h1>
											<?php getStatstic('*', 'saj_articles', 'art_status', 1) ?>
										</h1>
		            	</a>
		            </div>
		          </div>
		        </div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="statistics text-center">
						<div class="panel panel-primary">
		          <div class="panel-heading">
		            <div class="panel-title text-capitalize">
	            		<a href="publish" class="statObject">
	            			<h4>
		            			<i class="glyphicon glyphicon-file"></i>
		            			<span>Published Articles</span>
	            			</h4>
										<h1>
											<?php getStatstic('*', 'saj_articles', 'art_status', 2) ?>
										</h1>
	            		</a>
		            </div>
		          </div>
		        </div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="statistics text-center">
						<div class="panel panel-primary">
		          <div class="panel-heading">
		            <div class="panel-title text-capitalize">
		            	<a href="home?p=Users" class="statObject">
		            		<h4>
		            			<i class="glyphicon glyphicon-user"></i>
		            			<span>Total Users</span>
	            			</h4>
										<h1>
											<?php getStatstic('*', 'saj_members', 'mem_group', '1 || 2 || 3') ?>
										</h1>
									</a>
		            </div>
		          </div>
		        </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="lastStatistics">
		        <div class="panel panel-primary">
		          <div class="panel-heading">
		            <h3 class="panel-title">
		            	<i class="glyphicon glyphicon-user"></i>
		            	Latest <?php echo $latestNum ?> Registered Users
		          	</h3>
		          </div>
		          <div class="panel-body">
		            <ul>
	            		<?php
		            		getData(
		            			'mem_uname',
		            			'saj_members',
		            			'mem_uname',
		            			'mem_id DESC',
		            			$latestNum,
		            			'There Are No Registered Users.',
		            			false)
	            		?>
		            </ul>
		          </div>
		        </div>
	        </div>
				</div>
				<div class="col-md-6">
					<div class="lastStatistics">
		        <div class="panel panel-primary">
		          <div class="panel-heading">
		            <h3 class="panel-title">
		            	<i class="glyphicon glyphicon-book"></i>
		            	Latest <?php echo $latestNum ?> Published Articles
		            </h3>
		          </div>
		          <div class="panel-body">
		            <ul>
		            	<?php
			            	getData(
			            		'art_title, art_id',
			            		'saj_articles',
			            		'art_title',
			            		'art_id',
			            		$latestNum,
			            		'There Are No Published Articles.',
			            		true)
		            	?>
		            </ul>
		          </div>
		        </div>
	        </div>
				</div>
			</div>