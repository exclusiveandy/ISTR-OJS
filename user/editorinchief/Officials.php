

<?php include "../usercomponents/usernav.php" ; ?>



  <!-- MAY DUYA SA UI NA TO -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Officials</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Designation Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <div style="padding: 5px;">
       
        <div class="alert alert-success  text-center" id="data_updated" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>Data Updated</strong></h3> 
        </div>
      
</div>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <?php
          $sql = query("SELECT COUNT(*) as count from user_table where user_role_id IN(2,3,4,5) AND user_id <> '{$_SESSION['id']}'");
          while($row = fetch_assoc($sql))
          {
          ?>

          <h3 class="card-title">List of Reviewers/Editors <strong>(<?php echo $row['count'];}?>)</strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="officials_table">
          <table class="table table-bordered table-striped" id="example1">
            <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Affiliation</th>
               <th>Journal</th>
              <th>Expertise</th>
              <th>Gender</th>
              <th>Date of Registered</th>
              <th>Actions</th>
             

            </tr>
            </thead>
            <tbody>
              <?php 
              $sql = query("SELECT u1.user_id, user_fname, user_email, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name 
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  join user_journal_table u3 on u3.user_id=u1.user_id 
                  join journal_table j1 on j1.journal_id=u3.journal_id
                  where u1.user_role_id <> 1 AND u1.user_id <> '{$_SESSION['id']}'");
              while($row = fetch_assoc($sql))
              {

            
              ?>
                <tr>
                  <td><?php echo $row['user_fname']." ".$row['user_mname']." ".$row['user_lname'];?></td>
                   <td><?php echo $row['user_email'];?> </td>
                  <td><?php echo $row['user_role_name'];?> </td>
                  <td><?php echo $row['user_affliation'];?></td>
                  <td><?php echo $row['journal_name'];?>
                  <td><?php echo $row['expertise'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['register_date'];?></td>
                  <td>
                    <button 
                      data-toggle="modal" 
                      class="btn btn-info btn-md offical_modal" 
                      id = "<?php echo $row['user_id'];?>"
                      name = "user_id"
                      style="margin-left: 20%;"><span class="fas fa-users"></span></button>  </td>

                          
                </tr>                           <?php 
                }
                  ?>

            </tbody>
            
            
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

<?php 
$sql_check_post_office = query("SELECT * from user_table where user_role_id = 6 || user_role_id = 7  || user_role_id = 8");
if(row_count($sql_check_post_office) > 0)
{
  ?>
       <div class="card">
        <div class="card-header">
          <?php
          $sql = query("SELECT COUNT(*) as count from user_table where user_role_id IN(6,7,8) AND user_id <> '{$_SESSION['id']}'");
          while($row = fetch_assoc($sql))
          {
          ?>

          <h3 class="card-title">List of Accounts in Publication Office <strong>(<?php echo $row['count'];}?>)</strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="officials_table">
          <table class="table table-bordered table-striped" id="example2">
            <thead>
            <tr>
              <th>Name</th>
               <th>Email</th>
              <th>Role</th>
              <th>Affiliation</th>
              <th>Expertise</th>
              <th>Gender</th>
              <th>Date of Registered</th>
              <th>Actions</th>
             

            </tr>
            </thead>
            <tbody>
              <?php 
              $sql = query("SELECT u1.user_id, user_fname, user_email, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  where u1.user_role_id <> 1 AND u1.user_id <> '{$_SESSION['id']}' AND u1.user_role_id IN (6,7,8)");
              while($row = fetch_assoc($sql))
              {

            
              ?>
                <tr>
                  <td><?php echo $row['user_fname']." ".$row['user_mname']." ".$row['user_lname'];?></td>
                  <td><?php echo $row['user_email'];?> </td>
                  <td><?php echo $row['user_role_name'];?> </td>
                  <td><?php echo $row['user_affliation'];?></td>
                  <td><?php echo $row['expertise'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['register_date'];?></td>
                  <td>
                    <button 
                      data-toggle="modal" 
                      class="btn btn-info btn-md offical_modal" 
                      id = "<?php echo $row['user_id'];?>"
                      name = "user_id"
                      style="margin-left: 20%;"><span class="fas fa-users"></span></button>  </td>

                          
                </tr>                           <?php 
                }
                  ?>

            </tbody>
            
            
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
<?php
}
?>
    </section>




    
    </div>  <!-- /.content-wrapper -->
 
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- /.DESIGNATION MODAL MODAL MODAL -->
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
            <strong>Warning!</strong><p>There is already a Editor in Chief in this journal</p>
            </div>
             <div class="alert alert-dark alert-dismissible"  id="error_repeating_proofreader" role="alert" hidden>
            <strong>Warning!</strong><p>There is already an account for Publication Office(Proofreader)</p>
            </div>
             <div class="alert alert-dark alert-dismissible"  id="error_repeating_layout" role="alert" hidden>
            <strong>Warning!</strong><p>There is already an account for Publication Office(Layout Editor)</p>
            </div>
            <div class="alert alert-dark alert-dismissible"  id="error_repeating_PO" role="alert" hidden>
            <strong>Warning!</strong><p>There is already an account for Publication Office</p>
            </div>
            <div class="alert alert-dark alert-dismissible"  id="error_updating_author" role="alert" hidden>
            <strong>Warning!</strong> Already an Author
            </div>

                  <div class="form-group">
                    <input type="hidden" name="user_id" id="user_id">
         

                    <label>User Type</label>
                  
                    <select class="form-control" name="user_type" id="user_type">
                          <?php 
                      $sql = query("Select * from user_role_table where  user_role_name <> \"Post Office\" ");
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
      </div>
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
    $("#example2").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });
  });
</script>
<script>
   $(document).ready(function(){

    $("#journal_id").change(function(){
      $("#error_repeating_me").attr("hidden", "true");
    $("#error_repeating_EIC").attr("hidden", "true");
    $("#error_updating_author").attr("hidden", "true");
    $("#error_repeating_proofreader").attr("hidden", "true");
    $("#error_repeating_layout").attr("hidden", "true");
     $("#error_repeating_PO").attr("hidden", "true");  
    })
  $("#user_type").change(function(){ 
  var user_type = $("#user_type").val();
      $("#error_repeating_me").attr("hidden", "true");
    $("#error_repeating_EIC").attr("hidden", "true");
    $("#error_updating_author").attr("hidden", "true");
    $("#error_repeating_proofreader").attr("hidden", "true");
    $("#error_repeating_layout").attr("hidden", "true");
     $("#error_repeating_PO").attr("hidden", "true");   
      if(user_type == '1' || user_type == '6' || user_type == '7' || user_type == '8')
      {
        $("#journal_label").attr("hidden", "true");
        $("#journal_id").attr("hidden", "true");
      }
      else
      {
         $("#journal_label").removeAttr("hidden", "false");
        $("#journal_id").removeAttr("hidden", "false");
      }
    });
 })

   

 $(document).on('click', '.offical_modal', function(){
  var user_id = $(this).attr("id");
  $.ajax({
    url: "fetch_position.php",
    data: {user_id:user_id},
    method: "POST",
    dataType: "json",
    success:function(data)
    {
    $("#user_type").val(data.user_role_id);
    $("#modal_header").html(data.header);
    $("#user_id").val(data.user_id)
    $("#modal_default").modal("show");
      var user_type = $("#user_type").val();  
      if(user_type == '1' || user_type == '6' || user_type == '7' || user_type == '8')
      {
        $("#journal_label").attr("hidden", "true");
        $("#journal_id").attr("hidden", "true");
      }
      else
      {
         $("#journal_id").val(data.journal_id);
        $("#journal_label").removeAttr("hidden", "false");
        $("#journal_id").removeAttr("hidden", "false");
      }
   $("#error_repeating_me").attr("hidden", "true");
     $("#error_repeating_EIC").attr("hidden", "true");
    $("#error_updating_author").attr("hidden", "true");
    $("#error_repeating_proofreader").attr("hidden", "true");
    $("#error_repeating_layout").attr("hidden", "true");
     $("#error_repeating_PO").attr("hidden", "true");
    }
  })
 });

  $("#update_user_position").submit(function(event){
    var user_type =  $("#user_type").val();   
    event.preventDefault();
    $.ajax({
    url: "update_user_position.php",
    data: $("#update_user_position").serialize(),
    method: "POST",
    success:function(data)
    {
if(data == "Repeating EIC")
    {
      $("#error_repeating_EIC").removeAttr("hidden");
      $("#error_repeating_me").attr("hidden", "true");
      $("#error_updating_author").attr("hidden", "true");
       $("#error_repeating_proofreader").attr("hidden", "true");
      $("#error_repeating_layout").attr("hidden", "true");
    }
    else if(data == "Repeating ME")
    {
     $("#error_repeating_me").removeAttr("hidden");
     $("#error_repeating_EIC").attr("hidden", "true");
      $("#error_updating_author").attr("hidden", "true");
       $("#error_repeating_proofreader").attr("hidden", "true");
        $("#error_repeating_layout").attr("hidden", "true");
    }
    else if(data == "Repeating Proofreader")
    {
     $("#error_repeating_me").attr("hidden", "true");
     $("#error_repeating_EIC").attr("hidden", "true");
     $("#error_updating_author").attr("hidden", "true");
     $("#error_repeating_proofreader").removeAttr("hidden", "true");
        $("#error_repeating_layout").attr("hidden", "true");
    }
    else if(data == "Repeating Layout Editor")
    {
     $("#error_repeating_me").attr("hidden", "true");
     $("#error_repeating_EIC").attr("hidden", "true");
    $("#error_updating_author").attr("hidden", "true");
    $("#error_repeating_proofreader").attr("hidden", "true");
    $("#error_repeating_layout").removeAttr("hidden", "true");
    }
    else if(data == "Repeating Publication Office")
    {
     $("#error_repeating_me").attr("hidden", "true");
     $("#error_repeating_EIC").attr("hidden", "true");
    $("#error_updating_author").attr("hidden", "true");
    $("#error_repeating_proofreader").attr("hidden", "true");
    $("#error_repeating_layout").attr("hidden", "true");
     $("#error_repeating_PO").removeAttr("hidden", "true");
    }
    else
    {
    $("#modal_default").modal("hide");
    $('#data_updated').fadeIn(500);  
        setTimeout(function(){
        $('#data_updated').hide(); 
      }, 700);
      $(window).attr('location', 'Officials.php');
    }
    }
  })
 });




</script>
</body>
</html>
   


