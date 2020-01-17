<?php include "header.php";
if(!isset($_SESSION['id']))
{
redirect('../../login.php');
}
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Managing Editor</h1>
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
        <div class="card-body">
                  <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                      <div class="card card-outline card-danger">
                          <div class="card-header">
                            <h3 class="card-title">Research Field</h3>
                          </div>
 <?php
                               if(isset($_POST['submit']))
                               {
                                  if(!empty($_POST['Research']))
                                  {
                                    
                                    $research = escape_string($_POST['Research']);
                                    $research_repeat_query = query("SELECT * from user_research_field where research_field_name = '{$research}'");
                                    confirm($research_repeat_query);
                                    if(row_count($research_repeat_query) == 0)
                                    {
                                    $insert_query = query("INSERT INTO user_research_field(research_field_name) VALUES('{$research}')");
                                    confirm($insert_query);
                                    }
                                    else
                                    {
                                      validation_error("The research field already exsits");
                                    }
                                  }
                                }
                               ?>

                          <div class="row">

                            <div class="col-md-4">

                              
                               
                                <form role="form" method="POST" action="Researcher Fields.php">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Research Field</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter New Research Field" name="Research" required>
                                    </div>  
                                  </div>
                                  
                                    <button type="submit" name="submit" class="btn btn-success float-right">Add New Researcher Field</button>
                                </form>
                           
                              

                            </div>

                            <div class="col-md-8">

                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Researcher Field</th>
                                  <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <?php 
                                      $researcher_field_query = query("SELECT * from user_research_field");
                                      confirm($researcher_field_query);
                                      while($row_researcher_field= fetch_assoc($researcher_field_query))
                                      {
                                      ?>
                                      <td><?php echo $row_researcher_field['research_field_id'];?> </td>
                                      <td><?php echo $row_researcher_field['research_field_name'];?></td>
                                      <td>
                                      <button type="button"  id="<?php echo $row_researcher_field['research_field_id'];?>"data-uid="1" class="btn btn-success btn-md edit_data" >Edit</button>
                                      <button type="button"  id="<?php echo $row_researcher_field['research_field_id'];?>"data-uid="1" class="btn btn-danger btn-md delete_data">Delete</button>
                                    
                                    </tr>
                                      <?php
                                    }
                                    ?>
                                    
                                </tbody>
                              </table>
                            </div>     
                             </div> 

                              <div class="card-body">
                                <label>User Defined Research Fields</label>
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Other(User Defined Researcher Fields)</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <?php 
                                      $researcher_field_query = query("SELECT u1.expertise from user_table u1 left Join user_research_field u2 on u1.expertise=u2.research_field_name where u2.research_field_id is null
                                         ");
                                      confirm($researcher_field_query);
                                      while($row_researcher_field= fetch_assoc($researcher_field_query))
                                      {
                                      ?>
                                      <td><?php echo $row_researcher_field['expertise'];?></td>
                                   
                                    
                                    </tr>
                                      <?php
                                    }
                                    ?>
                                    
                                </tbody>
                              </table>
                            </div>                            
                                                  
                            
                            
                          
                          
                          
                          
                          </div>


                          

                      </div>
                  </div>
                  <!-- /.tab-pane -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>  <!-- /.content-wrapper -->

<!-- /Modal -->
       <div class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Research Field</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
<form method="POST" action="Researcher Fields.php" >
            <?php 
            if(isset($_POST['Update']))
            {

              if(!empty($_POST['research_field_name']))
              {
                $research_field_name = escape_string($_POST['research_field_name']);
                $research_id = escape_string($_POST['research_id']);
                $update_query = query("UPDATE user_research_field set research_field_name = '{$research_field_name}' WHERE research_field_id = '{$research_id}'");
                confirm($update_query);
                redirect("Researcher Fields.php");
              }
            }
            ?>
                  

               

                  <div class="form-group">
                    <label for="exampleInputEmail1">Research Field Name</label>
                    <input type="text" class="form-control" name="research_field_name" id="research_field_name" placeholder="Enter the Research Field Name" required>
                    <input type="hidden" name="research_id" id="research_id" class="form-control">
                  </div>  

               

          
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="Update" id="update_query" value="Update" class="btn btn-primary">
            </div>
            </form>
        
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
       </div>


      <div class="modal fade" id="delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Are you sure you want to Delete this Research Field?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
<form method="POST" action="Researcher Fields.php" >
              
                  
                        <?php 
            if(isset($_POST['Delete']))
            {

              if(!empty($_POST['delete_research_id']))
              {
                $research_id = escape_string($_POST['delete_research_id']);
                $delete_query = query("DELETE from user_research_field WHERE research_field_id = '{$research_id}'");
                confirm($delete_query);
                redirect("Researcher Fields.php");
              }
            }
            ?>
                  



                  <div class="form-group">
                    <label for="exampleInputEmail1">Research Field Name</label>
                    <input type="text" class="form-control" name="delete_research_field_name" id="delete_research_field_name" placeholder="Enter the Research Field Name" disabled>
                     <input type="hidden" name="delete_research_id" id="delete_research_id" class="form-control">

                  </div>  

               
              

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="Delete" id="update_query" value="Delete" class="btn btn-danger">
            </div>
            </form>
        
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



<!-- /Modal -->
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
   
   $("#hello").click(function(e){
   alert("Hello");
   $('#error_terms_conditions').fadeIn(500);  
    setTimeout(function(){
    $('#error_terms_conditions').hide(); 
  }, 10000); 
   });
   
</script>
<script>
  $(document).on('click', '.edit_data', function(){
    var research_id = $(this).attr("id");
     $.ajax({
      url: "fetch_research_field.php",
      data: {id:research_id},
      method: "POST",
      dataType: "json",
      success: function(data){
        $("#research_id").val(data.research_field_id);
        $("#research_field_name").val(data.research_field_name);
        $("#edit").modal("show");
      }
    });
  });

    $(document).on('click', '.delete_data', function(){
    var research_id = $(this).attr("id");
     $.ajax({
      url: "fetch_research_field.php",
      data: {id:research_id},
      method: "POST",
      dataType: "json",
      success: function(data){
        $("#delete_research_id").val(data.research_field_id);
        $("#delete_research_field_name").val(data.research_field_name);
        $("#delete").modal("show");
      }
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
</body>
</html>

        