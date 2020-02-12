<?php include("usernav.php"); 

validate();
if(isset($_GET['id']))
{
  $query = query("SELECT user_id, user_fname, user_mname, user_lname, user_contact, user_address, user_affliation, user_bio, user_email, user_password, user_role_name, user_salutation FROM user_table u3  join user_role_table u2 on u3.user_role_id=u2.user_role_id WHERE user_id = '{$_GET['id']}' ");
  confirm($query);
  while($row = fetch_assoc($query))
  {


?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; "><?php echo $row['user_role_name'];?>'s Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container">

        <div class="card">
          <div class="card-header">
            <h1 class="card-title">Update Profile</h1>
          </div>          
          <div class="card-body">
          <span id="result"></span>

            <div class="row">
              <div class="col-lg-7">
                <div class="card card-info">
                  <div class="card-header">
                    <h1 class="card-title">Author's Info</h1>
                  </div>  
                  <div class="card-body">
                  

                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight:500;">Firstname</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['user_fname'];?>" placeholder="First Name">
                            <span id="error_fname" class="text-danger"></span>
                        </div>                               
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight:500;">Middlename</label>
                            <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $row['user_mname'];?>" placeholder="Middle Name">
                            <span id="error_mname" class="text-danger"></span>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight:500;">Lastname</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['user_lname'];?>" placeholder="Last Name">
                            <span id="error_lname" class="text-danger"></span>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight:500;">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row['user_contact'];?>" placeholder="09********" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" maxlength="12">
                            <span id="error_contact" class="text-danger"></span>
                        </div>                              
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight:500;">Mailing Address</label>
                            <input type="text" class="form-control" id="maddress" name="maddress" value="<?php echo $row['user_address'];?>" placeholder="Mailing Address">
                            <span id="error_mailaddress" class="text-danger"></span>
                        </div>
                      </div>
                      
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1" style="font-weight:500;">Salutation</label>
                          <input type="text" class="form-control" id="salutation" name="salutation" value="<?php echo $row['user_salutation'];?>" placeholder="Mr/Mrs.Go" maxlength="3">
                          <span id="error_salu" class="text-danger"></span>
                        </div>                               
                      </div>
                      
                      <div class="col-lg-9">
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-weight:500;">Affiliation</label>
                            <input type="text" class="form-control" id="affli" name="affli" value="<?php echo $row['user_affliation'];?>" placeholder="Affliation">
                            <span id="error_affliation" class="text-danger"></span>
                        </div>                                
                      </div>
                      
                    </div>


                    <div class="row">                      
                      <div class="col-lg-6">
                        <div class="form-group" id="Other_research_Field" hidden>
                            <label for="exampleInputPassword1" style="font-weight:500;">Your Research Field</label>
                            <input type="text" class="form-control" name="Add_Research_Field" id="Add_Research_Field" value="<?php echo $row['expertise'];?>" placeholder="Add Research Field">
                            <span id="error_add_research_field" class="text-danger"></span>
                        </div>
                      </div>
                    </div>
                         
                            <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight:500;">Bio Statement</label>
                              <textarea class="form-control" rows="3" placeholder="..." name="bio" id="bio"><?php echo $row['user_bio'];?></textarea>
                              <span id="error_biostatement" class="text-danger"></span>
                            </div>


                            
                              

                  </div>
                  <div class="card-footer">

                  <div id="loader" style="display: none; text-align: center;">
                                      
                    <img src="../../img/loading1.gif" width="50px" height="50px">
                    <p>Please wait for a moment!</p>
                    <br>
                  </div>
                  <button style="width: 100%;" type="submit" class="btn btn-success" name="update" id="update">Update Info</button>

                  </div>
                </div>
              </div>


              <div class="col-lg-5">
                  
                  <div class="card card-info">
                     <div class="card-header">
                        <h3 class="card-title">Login Info</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                     <form role="form">
                        <div class="card-body">
                           <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight:500;">Email Address</label>
                              <input disabled type="email" class="form-control" id="email" name="email" value=<?php echo $row['user_email'];?> placeholder="Email Address">
                              <span id="error_email" class="text-danger"></span>
                           </div>
                           <hr>
                          
                           <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight:500;">Current Password</label>
                              <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Password">
                              <span id="error_currentpassword" class="text-danger"></span>
                           </div>

                           <hr>

                           <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight:500;">New Password</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Confirm Password">
                              <span id="check"></span>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputPassword1" style="font-weight:500;">Confirm New Password</label>
                              <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm Password">
                              <span id="check"></span>
                           </div>
                        </div>                        <!-- /.card-body -->
                        <div class="card-footer">

                        <div id="loader2" style="display: none; text-align: center;">
                                            
                          <img src="../../img/loading1.gif" width="50px" height="50px">
                          <p>Please wait for a moment!</p>
                          <br>
                        </div>
                        <button style="width: 100%;" type="submit" class="btn btn-success" name="changepassword" id="changepassword">Change Password</button>

                        </div>
                      
                       
                     </form>
                   
                  </div>
               </div>

            </div>


        

          </div>

        

        </div>


        <div class="content-header">
            <div class="container">
               <div class="row mb-2">
                  <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">           
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
                     <ol class="breadcrumb float-sm-right">            
                     </ol>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
      

          
      
      
        

       
      </div><!-- /.container-fluid -->
    </div> <!-- /.content -->



  </div>    <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-beta.1
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="../../js/adminlte.min.js"></script>


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
        $("#bell").click(function(e){
          e.preventDefault();
       var user_id = $("#user_id").val();
       $.ajax
       ({
        url:'update_notification.php',
        method: 'POST',
        data: {user_id:user_id},
        success: function(e)
        {
          $("#bell").html(e);
        }
       })
      })
</script>
<script>
$(document).ready(function()
{

  $("#cpass").keyup(function (e) { 
       var cpass = $("#cpass").val();
       var password = $("#password").val();
       if(cpass != password ) 
       {
          $('#cpass').css("border-color", "#cc0000")
          $('#cpass').css("background-color", "#ffff99")
          $('#password').css("border-color", "#cc0000")
          $('#password').css("background-color", "#ffff99")
          $("#check").html("Password does not match");
   
       }
       else
       {
          $('#cpass').css("border-color", "#ccc")
          $('#cpass').css("background-color", "#fff")
          $('#password').css("border-color", "#ccc")
          $('#password').css("background-color", "#fff")
          $("#check").html("Password match");
          $("#check").html("Password match");
       }
       
     });
     $("#password").keyup(function (e) { 
       var cpass = $("#cpass").val();
       var password = $("#password").val();
       if(cpass != password ) 
       {
          $('#cpass').css("border-color", "#cc0000")
          $('#cpass').css("background-color", "#ffff99")
          $('#password').css("border-color", "#cc0000")
          $('#password').css("background-color", "#ffff99")
          $("#check").html("Password does not match");
      
       }
       else
       {
         $('#cpass').css("border-color", "#ccc")
         $('#cpass').css("background-color", "#fff")
         $('#password').css("border-color", "#ccc")
         $('#password').css("background-color", "#fff")
         $("#check").html("Password match");
       }
       
     });



  $("#update").click(function(event){
      event.preventDefault();
      if($.trim($('#fname').val()) == 0 )
        {        
         error_fname = 'Please enter your First Name';
            $('#error_fname').text(error_fname);
         $('#fname').css("border-color", "#cc0000")
        $('#fname').css("background-color", "#ffff99")
        }
        else
        {
           error_fname = '';
            $('#error_fname').text(error_fname);
          $('#fname').css("border-color", "#ccc")
          $('#fname').css("background-color", "#fff")
        }



         if($.trim($('#lname').val()) == 0 )
        {
         error_lname = 'Please enter your Last Name';
            $('#error_lname').text(error_lname);
         $('#lname').css("border-color", "#cc0000")
          $('#lname').css("background-color", "#ffff99")
        }
        else
        {
           error_lname = '';
            $('#error_lname').text(error_lname);
          $('#lname').css("border-color", "#ccc")
          $('#lname').css("background-color", "#fff")
        }


         if($.trim($('#salutation').val()) == 0 )
        {
         error_salu = 'Please enter your salutation';
            $('#error_salu').text(error_salu);
         $('#salutation').css("border-color", "#cc0000")
          $('#salutation').css("background-color", "#ffff99")
        }
        else
        {
           error_salu = '';
            $('#error_salu').text(error_salu);
          $('#salutation').css("border-color", "#ccc")
          $('#salutation').css("background-color", "#fff")
        }


          if($.trim($('#contact').val()) == 0 )
        {
         error_contact = 'Please enter your contact number';
        $('#error_contact').text(error_contact);
        $('#contact').css("border-color", "#cc0000");
        $('#contact').css("background-color", "#ffff99");
        }
        else
        {
          error_contact = '';
          $('#error_contact').text(error_contact);
          $('#contact').css("border-color", "#ccc")
          $('#contact').css("background-color", "#fff")
        }

         if($.trim($('#affli').val()) == 0 )
        {
         error_affliation = 'Please enter your salutation';
            $('#error_affliation').text(error_affliation);
         $('#affli').css("border-color", "#cc0000")
          $('#affli').css("background-color", "#ffff99")
        }
        else
        {
           error_affliation = '';
            $('#error_affliation').text(error_affliation);
          $('#affli').css("border-color", "#ccc")
          $('#affli').css("background-color", "#fff")
        }

                 if($.trim($('#bio').val()) == 0 )
        {
         error_biostatement = 'Please enter your Bio Statement';
            $('#error_biostatement').text(error_biostatement);
         $('#bio').css("border-color", "#cc0000")
          $('#bio').css("background-color", "#ffff99")
        }
        else
        {
           error_biostatement = '';
            $('#error_biostatement').text(error_biostatement);
          $('#bio').css("border-color", "#ccc")
          $('#bio').css("background-color", "#fff")
        }

                 if($.trim($('#maddress').val()) == 0 )
        {
         error_mailaddress = 'Please enter your Mailing Address';
            $('#error_mailaddress').text(error_mailaddress);
         $('#maddress').css("border-color", "#cc0000")
          $('#maddress').css("background-color", "#ffff99")
        }
        else
        {
           error_mailaddress = '';
            $('#error_mailaddress').text(error_mailaddress);
          $('#maddress').css("border-color", "#ccc")
          $('#maddress').css("background-color", "#fff")
        }

        
        if(error_lname == '' &&  error_fname == ''  && error_salu == '' && error_contact == '' && error_affliation == '' && error_biostatement == '' && error_mailaddress == '')
  {
        var fname = $("#fname").val();
          var mname = $("#mname").val();
          var lname = $("#lname").val();
          var maddress = $("#maddress").val();
          var affli = $("#affli").val();
          var bio = $("#bio").val();
          var contact = $("#contact").val();
          var salutation = $("#salutation").val();
          $.ajax({
            url: 'update_user.php',
            data: {fname:fname, mname:mname, lname:lname, maddress:maddress, affli:affli, contact:contact, bio:bio, salutation:salutation},
            type: 'POST',

            beforeSend:function()
            {
              $("#update").attr("hidden", "true");
              $("#loader").show();
            }, 

            success: function(data){
              if(!data.error)
              {
                
                $("#update").removeAttr("hidden", "true");
                $("#loader").hide();
     
                $("#result").html(data);
                Swal.fire({title: "Updated Succefully!", text: "Profile was updated", type: 
                "success"}).then(function(){ 
                  location.href = 'home.php';
                  }
                );
              }
              else{
                
              }

            }
          })
        }
      })
})

$("#changepassword").click(function(event){



  event.preventDefault();

  var cpass = $("#cpass").val();
  var password = $("#password").val();

  if($.trim($('#currentpassword').val()) == 0 )
  {
    error_salu = 'Please enter your salutation';
    $('#error_currentpassword').text(error_currentpassword);
    $('#currentpassword').css("border-color", "#cc0000")
    $('#currentpassword').css("background-color", "#ffff99")
  }
  else
  {
    error_currentpassword = '';
    $('#error_currentpassword').text(error_currentpassword);
    $('#currentpassword').css("border-color", "#ccc")
    $('#currentpassword').css("background-color", "#fff")
  }

  if(error_currentpassword == '' && cpass == password )
  {
    
      var password = $("#currentpassword").val();
      var hash = '<?php echo $row['user_password'];?>';
      var cpass = $("#cpass").val();


  $.ajax({
    url: 'update_password.php',
    data: {password:password, hash:hash, cpass:cpass},
    type: 'POST', 
    dataType: "json",

    beforeSend:function()
    {
      $("#changepassword").attr("hidden", "true");
      $("#loader2").show();
    }, 
    success: function(data){

    if(data.status == "Updated")
    {                              
      $("#changepassword").removeAttr("hidden", "true");
      $("#loader2").hide();

      Swal.fire({title: "Password Changed Succefully!", text: "Profile was updated", type: 
      "success"}).then(function(){ 
        location.href = 'home.php';
        }
      );
    }
    else if(data.status == "Incorrect")
    {
      $("#changepassword").removeAttr("hidden", "true");
      $("#loader2").hide();

      Swal.fire({title: "Incorrect Password!", text: "Profile was not updated", type: 
      "error"}).then(function(){ 
      
        }
      );

    }
    else{
      
      
    }

  }

        
  
  })

    
    
  }




  })





  </script>
    <?php
                          }
                        }
                        ?>
</body>
</html>
