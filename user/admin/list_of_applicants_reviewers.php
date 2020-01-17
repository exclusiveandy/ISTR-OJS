

<?php include "header.php" ;?>



  <!-- MAY DUYA SA UI NA TO -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Applicants of Reviewers</h1>
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

      <!-- Default box -->
      <div class="card" id="Author_table">
        <div class="card-header">
        	<?php
        	$sql = query("SELECT COUNT(*) as count from apply_reviewer_table where status <> 1");
        	while($row = fetch_assoc($sql))
        	{
        	?>

          <h3 class="card-title">List of Authors <strong>(<?php echo $row['count'];}?>)</strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" >
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Bio Statement</th>
              <th>Affiliation</th>
            
             <th>Expertise</th>
             	<th>Gender</th>
              <th>Date of Registered</th>
                <th>Date of Applied</th>
               <th>View CV</th>

            </tr>
            </thead>
            <tbody>
            	<?php 
            	$sql = query("SELECT CONCAT(user_fname, \" \", user_mname,  \" \" ,user_lname) as FULLNAME, u2.user_id, user_affliation, user_bio, DATE_FORMAT(register_date, \"%M %d %Y %r\") as register_date, gender, expertise, DATE_FORMAT(date_applied, \"%M %d %Y %r\") as date_applied from user_table u1 join apply_reviewer_table u2 on u1.user_id = u2.user_id WHERE activate = 1 AND u2.status = 0 order by register_date desc");
            	while($row = fetch_assoc($sql))
            	{

            
            	?>
                <tr>
                  <td><?php echo $row['FULLNAME'];?></td>
                  <td><?php echo $row['user_bio'];?> </td>
                  <td><?php echo $row['user_affliation'];?></td>
                  <td><?php echo $row['expertise'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['register_date'];?></td>
                  <td><?php echo $row['date_applied'];?></td>
            
                        <td>
                      <a href="apply_evaluation.php?u_id=<?php echo $row['user_id'];?>" class="btn btn-info btn-md"><span class="fa fa-book"></span></a></td>
          
                </tr>      
                  <?php }?>          
            </tbody>
            
            
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>




    
    <!-- /.content -->
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

 <div class="modal fade" id="view_cv_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modal_header2">Ciriculum Vitae: </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <input type="hidden" name="user_id" id="user_id">
              <iframe src="" id="pdf_file" width='475' height='500' scrolling="no"allowfullscreen webkitallowfullscreen></iframe>
              <label>Note: </label>
              <p id="note"></p>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Update" name="Update2" id="Update2">
          </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
  </div>


  <!-- /.control-sidebar -->

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
</script>
<script>
  

 $(document).ready(function(){

  $("#user_type").change(function () { 
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
    });
 })


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
  

    $("#Author_table").html(data);
    $("#modal_default").modal("hide");

    }
  })
 });
    $(document).on('click', '.view-cv', function(){
  var user_id = $(this).attr("id");
  $.ajax({
    url: "fetch_cv.php",
    data: {user_id:user_id},
    method: "POST",
    dataType: "json",
    success:function(data)
    {

    $("#modal_header2").html(data.header);
    $("#user_id").val(data.user_id)
    
    $("#view_cv_modal").modal("show");
    $("#pdf_file").attr("src", data.pdf);
      var user_type = $("#user_type").val();  
      $("#note").html(data.note);
    $("#error_repeating_me").attr("hidden", "true");
    $("#error_repeating_EIC").attr("hidden", "true");
    }
  })
 });

    $("#Update2").click(function(e){
      e.preventDefault();
      
       var user_id = $("#user_id").val();
        $("#view_cv_modal").modal("hide");
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
    })
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



