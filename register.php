<?php include "header.php"; 
include_once "../function.php"; ?>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">


            <!--insert card here-->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Author's Info</h3>
                  
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                
               
                                  <div class="alert alert-dark" role="alert" id="error" style="display:none ";></div>
                                <form role="form">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Salutation</label>
                      <input type="text" class="form-control" id="salutation" name="salutation" placeholder="Mr/Mrs.Go" maxlength="3">
                       <span id="error_salu" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Firstname</label>
                      <input type="text" class="form-control" id="fname" name="fname" placeholder="Your First Name">
                               <span id="error_fname" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Middlename</label>
                      <input type="text" class="form-control" id="mname" name="mname" placeholder="Your Middle Name">
                      <span id="error_mname" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Lastname</label>
                      <input type="text" class="form-control" id="lname" name="lname" placeholder="Your Last Name">
                      <span id="error_lname" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Contact</label>
                      <input type="text" class="form-control" id="contact" name="contact" placeholder="09********" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" maxlength="12">
                       <span id="error_contact" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Mailing Address</label>
                      <input type="text" class="form-control" id="maddress" name="maddress" placeholder="Mailing Address">
                       <span id="error_mailaddress" class="text-danger"></span>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Gender</label>
                      <br>
                      <input type="radio" id="gender" name="gender" checked value="Male">
                            Male        
                         <input type="radio" id="gender" name="gender" value="Female">
                            Female           
                    </div>
                    
                    

                  </div>
                  <!-- /.card-body -->
  
                  
                </form>
              </div>
            





            
          </div>
          <!-- /.col-md-6 -->


          
          <div class="col-lg-6">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Additional Info</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form role="form">                    
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Affiliation</label>
                        <input type="text" class="form-control" id="affli" name="affli" placeholder="Affliation">
                         <span id="error_affliation" class="text-danger"></span>
                      </div>
                         <div class="form-group">
                        <label for="exampleInputPassword1">Field of Expertise</label>
                          <select class="form-control" id="expert" name="expert">
                            <option value="" selected disabled>Select your Research Expertise</option>
                            <?php 
                            $research_field_query = query("SELECT * from user_research_field ORDER by research_field_name ASC");

                            confirm($research_field_query);
                            while($row = fetch_assoc($research_field_query))
                            {
                            ?>
                             <option value="<?php echo $row['research_field_name'];?>"><?php echo $row['research_field_name'];?></option>
                             <?php
                            }
                           ?>
                           <option value="Others">Others</option>
                         </select>
                         <span id="error_expert" class="text-danger"></span>
                      </div>

                       <div class="form-group" id="Other_research_Field" hidden>
                        <label for="exampleInputPassword1">Your Research Field</label>
                        <textarea class="form-control" rows="3" placeholder="..." name="Add_Research_Field" id="Add_Research_Field"></textarea>
                         <span id="error_add_research_field" class="text-danger"></span>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Bio Statement</label>
                        <textarea class="form-control" rows="3" placeholder="..." name="bio" id="bio"></textarea>
                         <span id="error_biostatement" class="text-danger"></span>
                      </div>
                      
                    </div>
                    <!-- /.card-body -->
    
                  </form>
                </div>

                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Login Info</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->

                  <form role="form">                   
                     <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                        <span id="error_email" class="text-danger"></span>
                                 <span id="error_journal" class="text-danger"></span>

                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <span id="error_password" class="text-danger"></span>

                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm Password">
                        <span id="check"></span>
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <div id="loader" style="display: none; text-align: center;">
           <img src="images/loading.gif" width="50px" height="50px">
           </div>
                      <button style="width: 100%;" type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                    </div>
                  </form>
                </div>


          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include "footer.php";?>
  <script>
    $("#expert").change(function(){
        if($.trim($('#expert').val()) == "Others")
        {
         $('#Other_research_Field').removeAttr("hidden");

        }
        else
        {
          $('#Other_research_Field').attr("hidden", "true");
        }
      })
    $(document).ready(function(){
       
       
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
      $("#submit").click(function(event){
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

            if($.trim($('#email').val()) == 0 )
        {
         error_email = 'Please enter your current email address';
            $('#error_email').text(error_email);
         $('#email').css("border-color", "#cc0000")
          $('#email').css("background-color", "#ffff99")
        }
        else
        {
           error_email = '';
            $('#error_email').text(error_email);
          $('#email').css("border-color", "#ccc")
          $('#email').css("background-color", "#fff")
        }

            if($.trim($('#password').val()) == 0 )
        {
         error_password = 'Please enter your password';
            $('#error_password').text(error_password);
         $('#password').css("border-color", "#cc0000")
          $('#password').css("background-color", "#ffff99")
        }
        else
        {
           error_password = '';
            $('#error_password').text(error_password);
          $('#password').css("border-color", "#ccc")
          $('#password').css("background-color", "#fff")
        }


            if($.trim($('#contact').val()) == 0 )
        {
         error_contact = 'Please enter your contact number';
        $('#error_contact').text(error_contact);
        $('#contact').css("border-color", "#cc0000")
        $('#contact').css("background-color", "#ffff99")
        }
        else
        {
          error_contact = '';
          $('#error_contact').text(error_contact);
          $('#contact').css("border-color", "#ccc")
          $('#contact').css("background-color", "#fff")
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

         if($.trim($('#expert').val()) == 0 )
        {
         error_expert = 'Please enter your field of Research';
         $('#error_expert').text(error_expert);
         $('#expert').css("border-color", "#cc0000")
        $('#expert').css("background-color", "#ffff99")
        }
        else
        {
           error_expert = '';
            $('#error_expert').text(error_expert);
          $('#expert').css("border-color", "#ccc")
          $('#expert').css("background-color", "#fff")
        }

        if($.trim($('#expert').val()) == "Others" && $.trim($('#Add_Research_Field').val()) == 0)
        {
           error_add_research_field = 'Please enter your field of Research';
         $('#error_add_research_field').text(error_add_research_field);
         $('#Add_Research_Field').css("border-color", "#cc0000")
        $('#Add_Research_Field').css("background-color", "#ffff99")
        }
        else
        {
          error_add_research_field = '';
            $('#error_add_research_field').text(error_add_research_field);
          $('#Add_Research_Field').css("border-color", "#ccc")
          $('#Add_Research_Field').css("background-color", "#fff")
        }
   


         if($.trim($('#cpass').val()) == 0 )
        {
         $('#cpass').css("border-color", "#cc0000")
         $('#cpass').css("background-color", "#ffff99")
        }
        else
        {


          $('#cpass').css("border-color", "#ccc")
          $('#cpass').css("background-color", "#fff")
        }


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
          if($("#password").val() != 0)
          {
          $('#cpass').css("border-color", "#ccc")
          $('#cpass').css("background-color", "#fff")
          $('#password').css("border-color", "#ccc")
          $('#password').css("background-color", "#fff")
          $("#check").html("Password match");
          }
        }
        if(error_password == '' && error_mailaddress == '' && error_email == '' && error_biostatement == '' && error_affliation == '' && error_salu == '' && error_contact == '' && error_lname == ''  && error_fname == '' && (password === cpass) && (error_expert == '' || error_add_research_field == '')) 
        {
          var fname = $("#fname").val();
          var mname = $("#mname").val();
          var lname = $("#lname").val();
          var email = $("#email").val();
          var password = $("#password").val();
          var maddress = $("#maddress").val();
          var contact = $("#contact").val();
          var affli = $("#affli").val();
          var bio = $("#bio").val();
          if($("#expert").val() != "Others")
          {
          var expert = $("#expert").val();
          }
          else
          {
            var expert = $("#Add_Research_Field").val()
          } 
          var salutation = $("#salutation").val();
          var gender = $("input[name='gender']:checked").val();
          $.ajax({
            url: 'registration.php',
            data: {fname:fname, mname:mname, lname:lname, email:email, password:password, maddress:maddress, contact:contact, affli:affli, bio:bio, expert:expert, gender:gender, salutation:salutation},
            type: 'POST',
            dataType: "json",

            beforeSend:function()
            {
                  $("#submit").attr("hidden", "true");
                  $("#loader").show();
            }, 

            success: function(data)
              {
                  if(data.status == "Email is Already used")
                  {
                   error_email = "Email is Already used";
                   $('#error_email').text(error_email);
                   $('#email').css("border-color", "#cc0000")
                   $('#email').css("background-color", "#ffff99")
                   $("#submit").removeAttr("hidden", "true");
                  $("#loader").hide();

                    }
                  else if(data.status == "Please use appropriate email")
                   {
                   error_email = "Please use appropriate email";
                   $('#error_email').text(error_email);
                   $('#email').css("border-color", "#cc0000")
                   $('#email').css("background-color", "#ffff99")
                   $("#submit").removeAttr("hidden", "true");
                   $("#loader").hide();
                    }
                    else if (data.status = "register_guide.php")
                    {
                    
                       window.location.href = data.status
                    }
              

              }




          })
         
      }

        
      })
    });
</script>
