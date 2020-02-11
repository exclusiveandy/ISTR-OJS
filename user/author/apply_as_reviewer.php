<?php include("usernav.php");?>
  

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Apply as a Reviewer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Apply as a Reviewer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    
    <!-- Main content -->
    <div class="content">
      <div class="container">

      <section class="content">
  <div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_submission" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The system is only accepting Word File or PDF file(.docx/.pdf)</strong></h3> 
        </div>


      
</div>

<div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_size" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The file should be 8MB below</strong></h3> 
        </div>
      
</div>

<div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_file" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>You need your Curriculum Vitae for evaluation</strong></h3> 
        </div>
      
</div>

    <!-- /.FOR LOOP HERE -->
<?php
$id = $_SESSION['id'];
$apply_as_reviewer = query("SELECT * from apply_reviewer_table where user_id = '{$id}' and status <> 1");
if(row_count($apply_as_reviewer) == 1)
{
  ?>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Evaluating</h3>

        </div>
        <div class="card-body">
        
<p>We are still evaluating your credentials thank your for your patience</p>
           
                

         <br>
           
        </div> 
        <div id="loader" style="display: none; text-align: center;">
             <img src="../../images/loading3.gif" width="50px" height="50px">
            </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-secondary float-right" id="apply_reviewer" name="apply_reviewer">Pending</button>
        </div>       <!-- /.card-body -->

             <!-- /.card-footer-->
      </div>      <!-- /.card -->
      <!-- /.card -->

<?php
}
else
{
?>


 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Submit Curriculum Vitae</h3>

        </div>
        <div class="card-body">
        <?php
$apply_as_reviewer = query("SELECT * from apply_reviewer_table where user_id = '{$id}' and status = 1");
if(row_count($apply_as_reviewer) == 1)
{
?>  
  <div class="alert alert-dark alert-dismissible"  id="error_repeating_me" role="alert">
       <strong>Alert!</strong><br><p>After we review your Curriculum Vitae, We are  sorry to inform you but you did not pass the standards or your credentials is not sufficient to be a reviewer for the system. You could try again</p>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>

            </div>
        
    
        <?php
      }
      ?>
            <br>
            <ol>
                <div class="row">

                    <div class="col-md-6">
                        <h6>Become a part of a Journal’s Reviewer Community</h6><br>
                    </div>
                    <div class="col-md-6">
                        <h6>Upload your CV</h6>
                        <input type="file" id= "file" name="file"/>   
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['id'];?>">                 
                    </div>
                
                </div>
            </ol>

            <div class="form-group">
                <label>Add a Note</label>
                <textarea class="form-control" rows="3" placeholder="Recommendations..." id="note"></textarea>
            </div>
                

            <br>
           
        </div> 
        <div id="loader" style="display: none; text-align: center;">
             <img src="../../images/loading3.gif" width="50px" height="50px">
            </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" id="apply_reviewer" name="apply_reviewer">Submit</button>
        </div>       <!-- /.card-body -->

             <!-- /.card-footer-->
      </div>      <!-- /.card -->
      <!-- /.card -->



<?php
}?>






      

          </section>
    <!-- /.content -->
  </div> 
  </div> <!-- /.content-wrapper -->
 </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- /.content-wrapper -->

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
		$("#apply_reviewer").hover(function(){
			if($("#apply_reviewer").html() == "Pending")
			{
				$("#apply_reviewer").css('cursor', 'not-allowed');
	       }
	       else
	       {
	       	$("#apply_reviewer").css('cursor', 'default');
	       }
		})
	})

	
// $("#apply_reviewer").click(function(event){

// if($("#apply_reviewer").html() == "Pending")
// 			{
// 			$("#apply_reviewer").css('cursor', 'not-allowed');
// 			event.preventDefault();
// 	       }
// 	       else
// 	       {
// 	       		var user_id = $(this).attr("name")
// 				$.ajax({
// 					url: "send_request_for_reviewer.php",
// 					data: {user_id:user_id},
// 					method: "POST",
// 					success:function(data)
// 					{
// 						$("#apply_reviewer").html("Pending");
// 						$("#apply_reviewer").attr("class", "btn btn-success");
// 		            }

// 	})
// 	       }

// })


$("#apply_reviewer").click(function(event){
event.preventDefault();
if($("#file").val () != "")
{
  myfile = $("#file").val();
  var ext = myfile.split('.').pop();
  if(ext == "docx" || ext == "pdf")
  {
 if(file.files[0].size > 8388608)
      {
    $('#error_size').fadeIn(500);  
    setTimeout(function(){
    $('#error_size').hide(); 
  }, 10000);
      $('#error_submission').hide(); 
      $('#error_file').hide(); 
      }
      else
      {
          var myFormData = new FormData();
          var note = $("#note").val();
          var user_id = $("#user_id").val();
          myFormData.append('note', note);
          myFormData.append('user_id', user_id);
          myFormData.append('file', file.files[0]);
          $.ajax({
          url: 'send_request_for_reviewer.php',
          data: myFormData,
          processData: false, // important
          contentType: false, // important
          type: 'POST',
             beforeSend: function(data){
               $("#loader").show();
               $("#apply_reviewer").attr("hidden", "true");
              },  
            success: function(data){
             
                    $(window).attr('location', 'apply_as_reviewer.php');   
               
              }
                   });        
      }
  }
  else
  {
    $('#error_submission').fadeIn(500);  
    setTimeout(function(){
    $('#error_submission').hide(); 
  }, 10000);
     $('#error_size').hide(); 
   $('#error_file').hide(); 
  }
  
}
else
{
  $('#error_file').fadeIn(500);  
    setTimeout(function(){
    $('#error_file').hide(); 
  }, 10000);
    $('#error_submission').hide(); 
      $('#error_size').hide(); 
}

})
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
