	<div class="container visible-xs adminSideNavToggle">
		<div class="row">
			<div class="col-sm-12">
				<span>Admin Side Menu Navigation</span>
				<button class="pull-right" title="Admin Side Menu Navigation">
					<span class="sr-only">Admin Side Menu Navigation</span>
					<i class="glyphicon glyphicon-menu-hamburger"></i>
				</button>
			</div>
		</div>
	</div>
	<div class="col-md-2 adminSideNav">
		<aside class="menu">
			<header class="adminNavHeader">
				<h3>Navigation Menu</h3>
			</header>
			<ul class="AdminNavLinks">
				<li>
					<a href="home?p=Main" class="<?php activeLink('Main') ?>">
						<span>Control Panel</span>
						<i class="glyphicon glyphicon-chevron-right"></i>
					</a>
				</li>
				<li>
					<a href="articles?status=Approved" class="<?php activeLink('Approved') ?>">
						<span>Approved Articles</span>
						<i class="glyphicon glyphicon-chevron-right"></i>
					</a>
				</li>
				<li>
					<a href="articles?status=Unapproved" class="<?php activeLink('Unapproved') ?>">
						<span>Unapproved Articles</span>
						<i class="glyphicon glyphicon-chevron-right"></i>
						<?php require_once $controllersDir . 'articles/count-unapproved-articles.php' ?>
					</a>
				</li>
				<li>
					<a href="publish" class="<?php activeLink('publish') ?>">
						<span>Published Articles</span>
						<i class="glyphicon glyphicon-chevron-right"></i>
					</a>
				</li>
				<li>
					<a href="home?p=Categories" class="<?php activeLink('Categories') ?>">
						<span>Categories</span>
						<i class="glyphicon glyphicon-chevron-right"></i>
					</a>
				</li>
				<li>
					<a href="home?p=Users" class="<?php activeLink('Users') ?>">
						<span>Users</span>
						<i class="glyphicon glyphicon-chevron-right"></i>
					</a>
				</li>
				<li>
					<a href="home?p=Editors" class="<?php activeLink('Editors') ?>">
						<span>Editors</span>
						<i class="glyphicon glyphicon-chevron-right"></i>
					</a>
				</li>
				<li>
					<a href="home?p=Events" class="<?php activeLink('Events') ?>">
						<span>Events</span>
						<i class="glyphicon glyphicon-chevron-right"></i>
					</a>
				</li>
			</ul>
		</aside>
	</div>