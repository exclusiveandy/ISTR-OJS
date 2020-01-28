<?php include "pagecomponents/maintopnav.php";?>
<?php include "../function.php";?>

  
  <div class="login-box" style="margin-top: 3%; margin-bottom: 20%; ">
   <div class=row>
      <div class="card-body login-card-body">
        <?php display_message(); ?>
</div>
   </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to submit your paper</p>
  <?php login(); ?>
        <form action="login.php" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" id="email">
            <div class="input-group-append input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
                          
          </div>
                                    


          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append input-group-text">
                <span class="fas fa-lock"></span>
            </div>
          
          </div>
          
          <div class="row">
            
            <div class="col-8">
            
              <div class="icheck-primary">
                
            <a href="register.php" class="text-center">Register as an author</a></br>
          <a href="forgotpassword.php" class="text-center">Forgot Password?</a>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" id="login">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
       
        </form>
  
        <!-- /.social-auth-links -->
  
        
        <p class="mb-0">

        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>




  
