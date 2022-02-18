    <?php
    	ob_start();
    	$title = 'Submit Article';
    	require_once 'src/init.php';
    	if(!isset($_SESSION['uname'])) {
    		header('location: auth?sign=in&redirectTo=submit-article');
    		exit();
    	}
    ?>
      <div class="container">
        <div class="row">
        <?php // page get request
        $page = isset($_GET['do']) ? $_GET['do'] : 'submit-article';
        if($page == 'submit-article'): ?>
					<!-- Submit Article Page Start -->
	        <div class="col-sm-12">
	          <div class="submArtCont underline-hover">
	          	<ol class="breadcrumb">
                <span>You are in:&nbsp;&nbsp;</span>
                <li><a href="index">Home</a></li>
                <li class="active">Submit Article</li>
            	</ol>
	            <h3 class="underlined-text">Submit Article</h3>
	            <?php
	            	// Require Submit Article form functionality
								require_once $controllersDir . 'public/submitArticle.php' 
								// this form action  echo $_SERVER['PHP_SELF'];
	            ?>
	            <!-- Note for Users to Watch the Instructions Video -->
			        <div class="col-md-12">
			          <div class="video-instructions">
			            <div class="alert alert-info alert-dismissible" role="alert">
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			              </button>
			              <div class="enNote">
			                Welcome in Sudan Academic Journal for Research and Science, please 
			                <a href="uploads/media/videos/Sudan_Academic_Journals_Submission_Instructions" target="_blank">Click here</a> 
			                to watch a video for more information about how to submit an article in the journal.
			              </div>
			              <div class="arNote rtl">
			                مرحباً بك في مجلة السودان الأكاديمية للبحوث والعلوم ، من فضلك 
			                <a href="uploads/media/videos/Sudan_Academic_Journals_Submission_Instructions" target="_blank">إضغط هنا</a> لمشاهدة هذا الفيديو التعليمي لمعرفة كيفية إرسال ونشر مقالة في المجلة.
			              </div>
			            </div>
			          </div>
			        </div>
	            <form action="submit-article" method="POST" enctype="multipart/form-data" class="p">
	            	<!-- Article Title -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="artTitle" class="visible-xs">Article Title</label>
	            		<input type="text" name="artTitle" id="artTitle" class="form-control custIn"
	            		value="<?php echo(isset($artTitle))?$artTitle:''?>" placeholder="Article Title" dir="auto">
	            	</div>
	            	<!-- Institution Name -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="instName" class="visible-xs">Institution Name</label>
	            		<input type="text" name="instName" id="instName" class="form-control custIn"
	            		value="<?php echo(isset($artInst))?$artInst:''?>" placeholder="Institution Name" dir="auto">
	            	</div>
	            	<!-- Department Name -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="deptName" class="visible-xs">Department Name</label>
	            		<input type="text" name="deptName" id="deptName" class="form-control custIn"
	            		value="<?php echo(isset($artDept))?$artDept:''?>" placeholder="Department Name" dir="auto">
	            	</div>
	            	<!-- Author Name -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="authName" class="visible-xs">Author Name</label>
	            		<input type="text" name="authName" id="authName" class="form-control custIn"
	            		value="<?php echo(isset($artAuthor))?$artAuthor:''?>" placeholder="Author Name" dir="auto">
	            	</div>
	            	<!-- Co-Authors Names -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="coAuthNames" class="visible-xs">Co-Authors Names</label>
	            		<input type="text" name="coAuthNames" id="coAuthNames" class="form-control custIn"
	            		value="<?php echo(isset($artCoAuth))?$artCoAuth:''?>" placeholder="Co-Authors: separate names by (,) e.g: Mohammed , Ali" dir="auto">
	            	</div>
	            	<!-- Abstract -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="abstract" class="visible-xs">Abstract</label>
	            		<textarea name="abstract" id="abstract" class="form-control custIn resize-v" placeholder="Abstract (Overview) of the Article" dir="auto"><?php echo(isset($artAbstr))?$artAbstr:''?></textarea>
	            	</div>
	            	<!-- Article File -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="artFile" class="visible-xs">Article File</label>
	            		<input type="file" name="artFile" id="artFile" class="form-control artFile">
	            		<div class="note note-warning">
	            			<p>
	            				* Only MS-Word (.Docx and .Doc) files are allowed.
	            			</p>
	            			<p>
	            				* File size must be less than <b>5MB</b>.
	            			</p>
            			</div>
	            	</div>
	            	<!-- Accept Terms and Agreement -->
	            	<div class="col-md-6 col-md-offset-4">
		            	<label class="termsCheck">
		            		<div class="custCheckbox">
		            			<input type="checkbox" name="accTerms" id="accTerms">
		            			<label for="accTerms"></label>
		            		</div>
		            		<span>
		            			i read and accept all of the&nbsp;
											<a href="index?p=terms" target="_blank" class="accTermsUrl">
												<b>terms of use</b>
											</a>
		            		</span>
		            	</label>
	            	</div>
	            	<!-- Submit Button -->
	            	<div class="col-sm-6 col-sm-offset-3">
									<button type="submit" class="btn btn-primary btn-block text-uppercase">Submit</button>
	            	</div>
	            	<div class="clearfix"></div>
	            </form>
	          </div>
	        </div>
	        <!-- Submit Article Page End -->
        <?php else: ?>
	        <!-- Incorrect Page Start -->
	        <div class="col-sm-12">
		        <?php require $layoutsDir . 'public/incorrect-page.php' ?>
		      </div>
		      <!-- Incorrect Page End -->
	      <?php endif ?>
    <?php require_once $layoutsDir . 'public/footer.php'; ob_flush() ?>