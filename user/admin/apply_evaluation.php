<?php include("header.php");?>
  

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Curriculum Vitae Evaluation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Applying as a Reviewer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    
    <!-- Main content -->
    <div class="content">
      <div class="container">

      <section class="content">

        <div class="row">
            <div class="col-md-3">
                
                <!-- Profile Image -->
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                      <?php
                      if(isset($_GET['u_id']))
                      {
                        $user_id = $_GET['u_id'];
                        $user_query =  query("SELECT u1.user_id, CONCAT(user_fname, \" \", user_mname,  \" \" ,user_lname) as FULLNAME, user_salutation, pdf_file, note, user_affliation, expertise, user_bio, user_contact, user_email from user_table u1
                          join apply_reviewer_table a1 on u1.user_id=a1.user_id
                          where u1.user_id = '{$user_id}'");
                        $row_user = fetch_assoc($user_query);
                      }
                      ?>
                    
                        <h3 class="profile-username text-center"><?php echo $row_user['FULLNAME'];?></h3>
                        <hr>
                        <div class="form-group">
                            <strong class="text-center">Salutation</strong>
                            <p class="text-muted text-center"><?php echo $row_user['user_salutation'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong class="text-center">Affiliation</strong>
                            <p class="text-muted text-center"><?php echo $row_user['user_affliation'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong class="text-center">Field of Expertise</strong>
                            <p class="text-muted text-center"><?php echo $row_user['expertise'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong class="text-center">Bio Statement</strong>
                            <p style="overflow: auto; max-height:120px;"class="text-muted text-center"><?php echo $row_user['user_bio'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong class="text-center">Contact</strong>
                            <p class="text-muted text-center"><?php echo $row_user['user_contact'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong class="text-center">Email Address</strong>
                            <p class="text-muted text-center"><?php echo $row_user['user_email'];?></p>
                        </div>
                        <hr>

                        

                        <p class="text-muted text-center"></p>


                    
                </div>
                <!-- /.card-body -->
                </div>
            </div>

            <div class="col-md-9">
                
                <!-- Profile Image -->
                <div class="card card-default">
                    <div class="card-header">
                        <button 
                      data-toggle="modal" 
                      data-target="#modal_default" 
                      class="btn-success btn-sm offical_modal" 
                      id = "<?php echo $row_user['user_id'];?>"
                      name = "user_id"
                      >Accept</button>
                        <button class="float-right btn-danger btn-sm" onclick="window.location.href='reject_reviewer.php?u_id=<?php echo $row_user['user_id'];?>'">Reject</button>                     
                    </div>
                <div class="card-body">

                <iframe src="../../../upload_pdf_file/<?php echo $row_user['pdf_file'];?>.pdf" width="750" height="700"></iframe>
                <?php
                if (!empty($row_user['note']))
                {
                ?>
                <label>Note: </label>
                <p><?php echo $row_user['note'];?></p>
                <?php
                }
                ?>

                   
                </div>
                <!-- /.card-body -->
                </div>
            </div>
        
        </div>


    <!-- /.FOR LOOP HERE -->


     












      

      </section>

      <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">           
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


       
      </div><!-- /.container-fluid -->
    </div> <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
 <div class="modal fade" id="modal_default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modal_header"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form method="post" id="update_user_position">
                <div class="alert alert-dark alert-dismissible"  id="error_repeating_me"role="alert" hidden>
            <strong>Warning!</strong> There is already a Managing Editor in this journal

            </div>
            <div class="alert alert-dark alert-dismissible"  id="error_repeating_EIC" role="alert" hidden>
            <strong>Warning!</strong> There is already a Editor in Chief in this journal
            </div>
            <div class="alert alert-dark alert-dismissible"  id="error_updating_author" role="alert" hidden>
            <strong>Warning!</strong> Already an Author
            </div>
                  <div class="form-group">
                    <input type="hidden" name="user_id" id="user_id">
                    <label>User Type</label>
                  
                    <select class="form-control" name="user_type" id="user_type">
                     <?php 
                      $sql = query("SELECT * FROM user_role_table WHERE user_role_name = \"Internal Reviewer\" OR user_role_name = \"External Reviewer\"");
                      confirm($sql);
                      while($row = fetch_assoc($sql)){
                    ?>
                      <option value="<?php echo $row['user_role_id'];?>"><?php echo $row['user_role_name'];}?></option>

                    </select>
                  </div>

                  <div class="form-group">
                    <label name="journal_label" id="journal_label" >Journal</label>
                    <select class="form-control" name="journal_id" id="journal_id" >
                         <?php 
                      $sql = query("Select * from journal_table");
                      while($row = fetch_assoc($sql)){
                    ?>
                      <option value="<?php echo $row['journal_id'];?>"><?php echo $row['journal_name'];}?></option>

                    </select>
                  </div>



            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Update" name="submit" id="submit">
          </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
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
</script>
<script>
  
  $(document).on('click', '.offical_modal', function(){
  var user_id = $(this).attr("id");
  $.ajax({
    url: "fetch_author.php",
    data: {user_id:user_id},
    method: "POST",
    dataType: "json",
    success:function(data)
    {

    $("#modal_header").html(data.header);
    $("#user_id").val(data.user_id)
    $("#modal_default").modal("show");
      
      var user_type = $("#user_type").val();  
      if(user_type == '1')
      {
        $("#journal_label").attr("hidden", "true");
        $("#journal_id").attr("hidden", "true");
        $("#submit").attr("hidden", "true");
      }
      else
      {
         $("#journal_label").removeAttr("hidden", "false");
        $("#journal_id").removeAttr("hidden", "false");
        $("#submit").removeAttr("hidden");
      }
    $("#error_repeating_me").attr("hidden", "true");
    $("#error_repeating_EIC").attr("hidden", "true");
    }
  })
 });


    $("#update_user_position").submit(function(event){
    event.preventDefault();
    $.ajax({
    url: "update_applicant_reviewer.php",
    data: $("#update_user_position").serialize(),
    method: "POST",
    success:function(data)
    {
      $(window).attr('location', 'list_of_applicants_reviewers.php');

    }
  })
 });
</script>
<script>
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

</body>
</html>
