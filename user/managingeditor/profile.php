<?php include "header.php" ;
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $row['user_role_name'];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Document</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <!-- /.card-header -->
        <section class="content">
          <div class="container-fluid">
           
    
                <!-- Profile Image -->
    
                <!-- About Me Box -->
               
              
              <!-- /.col -->
            
                <div class="card">
                 
                  <div class="card-body">
                    <div class="tab-content">
                      
    
                      <div class="active tab-pane" id="settings">
                        <form class="form-horizontal">
                        <span id="result"></span>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Salutation</label>
                              <input type="text" class="form-control" id="salutation" name="salutation" placeholder="Mr/Mrs.Go" value="<?php echo $row['user_salutation'];?>">
                               <span id="error_salu" class="text-danger"></span>

                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Firstname</label>
                              <input type="text" class="form-control" id="fname" name="fname" placeholder="Your First Name" value="<?php echo $row['user_fname'];?>">
                             <span id="error_fname" class="text-danger"></span>

                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Middlename</label>
                              <input type="text" class="form-control" id="mname" name="mname" placeholder="Your Middle Name" value="<?php echo $row['user_mname'];?>">
                              <span id="error_mname" class="text-danger"></span>

                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Lastname</label>
                              <input type="text" class="form-control" id="lname" name="lname" placeholder="Your Last Name" value="<?php echo $row['user_lname'];?>">
                            <span id="error_lname" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Contact</label>
                              <input type="text" class="form-control" id="contact" name="contact" placeholder="09*******" value="<?php echo $row['user_contact'];?>">
                              <span id="error_contact" class="text-danger"></span>
  
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Mailing Address</label>
                              <input type="text" class="form-control" id="maddress" name="maddress" placeholder="Mailing Adress" value="<?php echo $row['user_address'];?>">
                                                     <span id="error_mailaddress" class="text-danger"></span>

                            </div>
                            
                              <div class="form-group">
                                <label for="exampleInputPassword1">Affiliations</label>
                                <input type="text" class="form-control" id="affli" name="affli" placeholder="Affliation" value="<?php echo $row['user_affliation'];?>">
                             <span id="error_affliation" class="text-danger"></span>


                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Bio Statement</label>
                                <textarea class="form-control" rows="3" placeholder="..." value="" name="bio" id="bio"><?php echo $row['user_bio'];?></textarea>
                             <span id="error_biostatement" class="text-danger"></span>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-success" id="update">Update</button>
                                </div>
                            </div>



                            <br>
                            <hr>
                            <br>
                        </form>
                        <?php
                          }
                        }
                        ?>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
          
          
          </div><!-- /.container-fluid -->
        </section>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<script src="../../js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../js/demo.js"></script>
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
            url: 'UPDATE_USER.php',
            data: {fname:fname, mname:mname, lname:lname, maddress:maddress, affli:affli, contact:contact, bio:bio, salutation:salutation},
            type: 'POST',
            success: function(data){
              if(!data.error)
              {
                $("#result").html(data);
              }

            }
          })
        }
      })
})

  </script>
</body>
</html>
