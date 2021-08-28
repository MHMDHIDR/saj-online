  		<div class="tabs text-center">
  			<span class="publishTab selected pub text-uppercase" data-class="publish">
  				Publish
				</span>
	  		<span class="publishTab iss text-uppercase" data-class="issue">
	  			New Issue
				</span>
	  		<section class="issueAndPublish">
	  		<?php require_once $controllersDir . 'published/new-publish.php' ?>
	  			<div class="publish">
	  				<h3>Publish New Article</h3>
	  				<form action="?do=publish-article" method="POST" class="publishArticle" enctype="multipart/form-data">
	  					<?php require $functionsDir . 'published/get-cats-issues.php' ?>
	  					<!-- Select A Category -->
	  					<div class="form-group text-left">
	  						<label for="cats">Category</label>
							  <select name="cats" id="cats" required>
							    <option value="">Select a Category...</option>
							    <?php getCatsIssues('saj_categories', 'cat_id', 'cat_name', 'cats', '') ?>
							  </select>
	  					</div>
	  					<!-- Select An Issue -->
	  					<div class="form-group text-left">
	  						<label for="issues">Issue</label>
							  <select name="issues" id="issues" required>
							    <option value="">Select an Issue...</option>
							    <?php getCatsIssues('saj_issues', 'issue_id', 'issue_title', 'issues', '') ?>
							  </select> 
	  					</div>
	  					<!-- Article Title -->
	  					<div class="form-group text-left">
            		<label for="artTitle" class="visible-xs">Article Title</label>
            		<input type="text" name="artTitle" id="artTitle" class="form-control" dir="auto"
            		value="<?php echo(isset($artTitle))?$artTitle:''?>" placeholder="Article Title" required>
            	</div>
	  					<!-- Author Name -->
	  					<div class="form-group text-left">
            		<label for="authName" class="visible-xs">Author Name</label>
            		<input type="text" name="authName" id="authName" class="form-control" dir="auto"
            		value="<?php echo(isset($authName))?$authName:''?>" placeholder="Author Name" required>
            	</div>
	  					<!-- Co-Authors Names -->
	  					<div class="form-group text-left">
            		<label for="authsNames" class="visible-xs">Co-Authors Names</label>
            		<input type="text" name="authsNames" id="authsNames" class="form-control" dir="auto"
            		value="<?php echo(isset($authsNames))?$authsNames:''?>" placeholder="Co-Authors Names -> Separated with comma (Name1, Name2)">
            	</div>
	  					<!-- Article Abstract -->
	  					<div class="form-group text-left">
            		<label for="artAbstract" class="visible-xs">Article Abstract</label>
								<textarea name="artAbstract" id="artAbstract" class="form-control resize-v" dir="auto" placeholder="Article Abstract" required><?php echo(isset($artAbstract))?$artAbstract:''?></textarea>
            	</div>
            	<!-- Upload Article File -->
	  					<div class="form-group text-left">
            		<label for="artFile" class="visible-xs">Upload Article File</label>
            		<input type="file" name="artFile" id="artFile" class="form-control" required>
            	</div>
            	<!-- Submit Button -->
            	<div class="form-group text-left">
	            	<label for="pubArt" class="visible-xs">Publish</label>
								<button type="submit" id="pubArt" class="btn btn-primary btn-block">
									Publish
								</button>
            	</div>
	  				</form>
	  				<div class="clearfix"></div>
						<br><br>
		  			<div class="col-md-12">
		  				<h2 class="text-center">Published Articles</h2>
							<table class="table table-striped">
							  <thead>
							    <tr>
							      <th>Article Title</th>
							      <th>Author</th>
							      <th>Co-Authors</th>
							      <th>Issue</th>
							      <th>Category</th>
							      <th width="18%">Options</th>
							    </tr>
							  </thead>
							  <tbody>
									<?php 
										require_once $functionsDir . 'published/get-published.php';
										require_once $functionsDir . 'published/delete-published.php';
									?>
							  </tbody>
							</table>
							<nav aria-label="Page navigation" class="paginate text-center"></nav>
		  			</div>
	  			</div>