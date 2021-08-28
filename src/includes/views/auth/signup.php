				<?php
					// If session username is set
	        if(isset($_SESSION['uname'])):
	        header('location: index?page=1');
	        exit();
					// else if there's no session with the name of ['uname']
					elseif(!isset($_SESSION['uname'])):
				?>
        <!-- Sign Up Page Start -->
	        <div class="col-sm-12 mb">
	          <div class="smContainer underline-hover">
	          	<ol class="breadcrumb">
                <span>You are in:&nbsp;&nbsp;</span>
                <li><a href="index">Home</a></li>
                <li><a href="">Authentication</a></li>
                <li class="active">Sign Up</li>
            	</ol>
	            <h3 class="underlined-text">sign up Page</h3>
	            <?php
								// Require Sign Up form functionality if session is not set
	            	require_once $controllersDir . 'auth/signupForm.php'
	            ?>
	            <form action="auth?sign=up" method="POST">
	            	<!-- Username -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="username" class="visible-xs">Username</label>
	            		<input type="text" name="username" id="username" class="form-control custIn"
	            		value="<?php echo(isset($username))?$username:''?>" placeholder="Username" dir="auto" required>
	            	</div>
	            	<!-- Email -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="email" class="visible-xs">Email</label>
	            		<input type="text" name="email" id="email" class="form-control custIn"
	            		value="<?php echo(isset($email))?$email:''?>" placeholder="Email" dir="auto" required>
	            	</div>
	            	<!-- Phone Number -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="telephone" class="visible-xs">Phone</label>
	            		<input type="hidden" name="selectedCountry" id="selCountVal">
	            		<input type="tel" name="telephone" id="telephone" class="form-control custIn"
	            		value="<?php echo(isset($phone))?$phone:''?>" placeholder="Phone Number Without Country key" required>
	            	</div>
	            	<!-- Password -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="password" class="visible-xs">Password</label>
	            		<input type="password" name="password" id="password" class="form-control custIn" placeholder="Password (at least 8 Characters + Numbers combined)" autocomplete="new-password" required>
	            	</div>
	            	<!-- Confirm Password -->
	            	<div class="col-md-6 col-md-offset-3">
	            		<label for="cpassword" class="visible-xs">Confirm Password</label>
	            		<input type="password" name="cpassword" id="cpassword" class="form-control custIn" placeholder="Password Again" autocomplete="new-password" required>
	            	</div>
	            	<!-- Submit Button -->
	            	<div class="col-md-6 col-md-offset-3 mb">
		            	<label class="visible-xs">Sign up</label>
									<button type="submit" class="btn btn-primary btn-block text-uppercase">Sign Up</button>
	            	</div>
								<!-- Sign In -->
								<div class="col-md-3 col-md-offset-3">
									<a href="auth?sign=in">Have an Account? Sign in</a>
								</div>
	            </form>
	          </div>
	        </div>
        <?php /* Endif session isset check for sign up page */ endif ?>
        <!-- Sign Up Page End -->