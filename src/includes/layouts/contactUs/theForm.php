          <form class="contactForm" action="?p=contact-us" method="POST">
            <div class="group pull-left">      
              <input type="text" name="name" dir="auto"
              value="<?php echo(isset($name))?$name:''?>" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Name</label>
            </div>
            <div class="group pull-left">      
              <input type="email" name="email"
              value="<?php echo(isset($email))?$email:''?>" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Email</label>
            </div>
            <div class="clearfix"></div>
            <div class="group">      
              <textarea name="message" class="resize-v" dir="auto" required><?php echo(isset($msg))?$msg:''?></textarea>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Message</label>
            </div>
            <button class="btn pull-right">
              <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
              Send Message
            </button>
          </form>