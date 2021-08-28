<?php
	// Requiring Alert
	require_once $layoutsDir . 'alert.php';
	// Getting the published article info for editing purpose
	require_once $functionsDir . 'published/get-published-edit.php';
	// Edit Published Article Controller
	require_once $controllersDir . 'published/edit-published-art.php';
?>
	<br><h3 class="text-center">Editing:
		<strong><?php echo $artTitle ?></strong>
	</h3>
	<br><br>
	<div class="publish">
		<form action="publish?editPublished=<?php echo $_GET['editPublished']?>" 
			method="POST" class="publishArticle">
			<?php require_once $functionsDir . 'published/get-cats-issues.php' ?>
			<!-- Select A Category -->
			<div class="form-group text-left">
				<label for="cats">Category</label>
			  <select name="cats" id="cats" required>
			    <option value="">Select a Category...</option>
			    <?php getCatsIssues('saj_categories', 'cat_id', 'cat_name', 'cats', $artCat) ?>
			  </select>
			</div>
			<!-- Select An Issue -->
			<div class="form-group text-left">
				<label for="issues">Issue</label>
			  <select name="issues" id="issues" required>
			    <option value="">Select an Issue...</option>
			    <?php getCatsIssues('saj_issues', 'issue_id', 'issue_title', 'issues', $artIssue) ?>
			  </select> 
			</div>
			<!-- Article Title -->
			<div class="form-group text-left">
				<label for="artTitle" class="visible-xs">Article Title</label>
				<input type="text" name="artTitle" id="artTitle" class="form-control" dir="auto"
				value="<?php echo(isset($artTitle))?$artTitle:''?>" placeholder="Article Title">
			</div>
			<!-- Author Name -->
			<div class="form-group text-left">
				<label for="authName" class="visible-xs">Author Name</label>
				<input type="text" name="authName" id="authName" class="form-control" dir="auto"
				value="<?php echo(isset($authName))?$authName:''?>" placeholder="Author Name">
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
				<textarea name="artAbstract" id="artAbstract" class="form-control resize-v" dir="auto" placeholder="Article Abstract"><?php echo(isset($artAbstract))?$artAbstract:''?></textarea>
			</div>
			<!-- Submit Button -->
			<div class="form-group text-left">
		  	<label for="pubArt" class="visible-xs">Apply Edit Changes</label>
				<button type="submit" id="pubArt" class="btn btn-primary btn-block">
					Apply Edit Changes
				</button>
			</div>
		</form>
	</div>