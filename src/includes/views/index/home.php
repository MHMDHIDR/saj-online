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
        <!-- Home Page Start -->
          <div class="col-md-8">
            <?php require_once $controllersDir . 'public/homeArticles.php' ?>
          </div>
          <div class="col-md-4">
            <?php require_once $functionsDir . 'get/get-home-sidebar-data.php' ?>
            <?php require_once $layoutsDir . 'sidebar/sidebar-last-published.php' ?>
            <?php require_once $layoutsDir . 'sidebar/sidebar-categories.php' ?>
          </div>
        <!-- Home Page End -->