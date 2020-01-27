<?php include "header.php";?>
<?php include "../function.php";?>

  
  <div class="login-box" style="margin-top: 3%; margin-bottom: 20%; ">
   <div class=row>
      <div class="card-body login-card-body">
           <?php 
validation_code();
          ?>



</div>
   </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"><h1><b>Enter Code</b></h1></p>

        <form method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="#########" name="validation_code" id="validation_code">
   
          </div>
                                    

          
          <div class="row">
         
            
           <div class="col-2">
              
            </div>
           
            <!-- /.col -->
            <div class="col-7">
              <button type="submit" class="btn btn-success btn-block btn-flat" name="send" id="send">Submit</button>
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  
