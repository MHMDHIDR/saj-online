		<?php
			// If session username is set
	    if(isset($_SESSION['uname'])):
	    header('location: index?page=1');
	    exit();
		?>

		<?php /*No session set*/elseif(!isset($_SESSION['uname'])):?>
	    <div class="col-sm-12">
	      <div class="smContainer underline-hover">
	        <h3 class="underlined-text">Reset Your Password</h3>
	        <?php
		        // Check if GET do = ....
			  		$do = isset($_GET['do']) ? $_GET['do'] : 'forgot-password';
			  		if($do == 'forgot-password'):
		  			require_once $controllersDir . 'auth/forgotPasswordForm.php'
	  			?>
	  			<!-- Forgot Password Page Start -->
		        <form action="forgot-password" method="POST" class="forgotPass">
		        	<div class="col-md-6 col-md-offset-3">
		        		<!-- Username -->
		        		<div class="form-group">
		        			<label for="username" class="visible-xs">Username</label>
			        		<input type="text" name="username" id="username" class="form-control"
			        		value="<?php echo(isset($username))?$username:''?>" placeholder="Username" required>
		        		</div>
		        		<div class="form-group">
		        			<!-- Email -->
		        			<label for="email" class="visible-xs">Email</label>
			        		<input type="email" name="email" id="email" class="form-control"
			        		value="<?php echo(isset($email))?$email:''?>" placeholder="Email" required>
		        		</div>
		        		<div class="form-group mb">
		        			<!-- Submit Button -->
		        			<label class="visible-xs">Reset Password</label>
									<button type="submit" class="btn btn-primary btn-block text-uppercase">Reset Password</button>
		        		</div>
		        		<div class="form-group">
		        			<!-- Remembered Password -->
		        			<label>Remembered Password?</label>
									<a href="auth?sign=in">
										Sign In
									</a>
		        		</div>
		        	</div>
		        </form>
	        <!-- Forgot Password Page End -->
	        <!-- New Password Page Start -->
			  		<?php 
			  			elseif($do == 'new-pass'):
			  			require_once $controllersDir . 'auth/newPasswordForm.php'
			  		?>
		  		<!-- New Password Page End -->
		  		<!-- Complete Password Reset Page Start -->
						<?php
							elseif($do == 'complete-pass-reset'):
							require_once $controllersDir . 'auth/completePasswordReset.php'
						?>
					<!-- Complete Password Reset Page End -->
		  		<?php /* End the GET do if */ endif; ?>
	      </div>
	    </div>
	  <?php /* Endif session isset check for sign up page */ endif ?>