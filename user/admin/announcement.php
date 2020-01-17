<?php include "header.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Announcement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Announcement</li>
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
                <div class="card card-info ">
                <div class="card-header">
                    <h3 class="card-title">Announcement</h3>
                  </div>
                 <div class="card-body box-profile">
                    
    
                   
                    <form id="insert_announcement_form">
                    <div class="card-body">

                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Date</label>
                        <input type="date" class="form-control" id="announcement_date" name="announcement_date" value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>">  
                        <span id="error_date" class="text-danger"></span>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Title</label>
                        <input type="text" class="form-control" id="announcement_title" name="announcement_title" placeholder="Title">
                        <span id="error_announcement_title" class="text-danger"></span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Description</label>
                        <textarea type="text" class="form-control" id="announcement_description" name="announcement_description" rows="10"></textarea>
                        <span id="error_announcement_description" class="text-danger"></span>
                      </div>
                    </div>

    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info float-right">Submit</button>
                    </div>
                  </form>
    
                  </div>  <!-- /.card-body -->
                </div>                <!-- /.card -->
    
               
                <!-- /.card -->

              <!-- /.col -->


                <div class="card" >
                  <div class="card-header">
                    <h3 class="card-title">Announcement Table</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" id="announcement_table">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>

                      <tr>
                        <th>Title</th>
                        <th>Description(s)</th>
                        <th>Date to be Posted/Posted on</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <?php   
                        $announcement_query = query("SELECT announcement_id, announcement_title, announcement_description, DATE_FORMAT(announcement_date, \"%M %d %Y\") as announcement_date from announcement_table");
                        confirm($announcement_query);
                        if(row_count($announcement_query) !=0)
                        {
                          while ($row = fetch_assoc($announcement_query)){
                        ?>
                            
                                  <tr>
                                    <td><?php echo $row['announcement_title'];?></td>
                                    <td><?php echo $row['announcement_description'];?></td>
                                    <td><?php echo $row['announcement_date'];?></td>
                                    <td><button type="button" data-toggle="modal" id="<?php echo $row['announcement_id'];?>" class="btn btn-success btn-md edit_annoucement" >Edit</button></TD>
                                      <td><button type="button" data-toggle="modal" id="<?php echo $row['announcement_id'];?>"   class="btn btn-danger btn-md delete_annoucement" >Delete</button></TD>
                                  </tr>
                                    
                                    <?php
                                  }
                                }?>
                  
                  
                      
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>




     
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>

    </section>
    <!-- /.content -->
  </div>


  <div class="modal fade" id="edit_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Announcement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               
                       <form id="edit_announcement_form">
                    <div class="card-body">

                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Date</label>
                        <input type="date" class="form-control" id="edit_announcement_date" name="edit_announcement_date" value="09/16/2019">  
                        <span id="error_edit_date" class="text-danger"></span>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Title</label>
                        <input type="text" class="form-control" id="edit_announcement_title" name="edit_announcement_title" placeholder="Title">
                        <input type="hidden" class="form-control" id="edit_annoucement_id" name="edit_annoucement_id" placeholder="Title">
                        <span id="error_edit_announcement_title" class="text-danger"></span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Description</label>
                        <textarea type="text" class="form-control" id="edit_announcement_description" name="edit_announcement_description" rows="10"></textarea>
                        <span id="error_edit_announcement_description" class="text-danger"></span>
                      </div>
                    </div>

                 

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


  <div class="modal fade" id="delete_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Announcement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               
                       <form id="delete_annoucement_form">
                    <div class="card-body">

                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Date</label>
                        <input type="date" class="form-control" id="delete_announcement_date" name="delete_announcement_date" disabled>  
                        <span id="error_edit_date" class="text-danger"></span>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Title</label>
                        <input type="text" class="form-control" id="delete_announcement_title" name="delete_announcement_title" placeholder="Title" disabled>
                        <input type="hidden" class="form-control" id="delete_annoucement_id" name="delete_annoucement_id" placeholder="Title">
                        <span id="error_edit_announcement_title" class="text-danger"></span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Description</label>
                        <textarea type="text" class="form-control" id="delete_announcement_description" name="delete_announcement_description" rows="10" disabled></textarea>
                        <span id="error_edit_announcement_description" class="text-danger"></span>
                      </div>
                    </div>

                 

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
               </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <!-- /.content-wrapper -->
  <?php

    include "../../components/userfooter.php";
  ?>

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
  
    $("#insert_announcement_form").submit(function(event){
      event.preventDefault();
      if($.trim($('#announcement_title').val()) == 0 )
      {
        error_announcement_title = 'Please enter the Announcement title';
            $('#error_announcement_title').text(error_announcement_title);
         $('#announcement_title').css("border-color", "#cc0000")
        $('#announcement_title').css("background-color", "#ffff99")
        }
        else
        {
           error_announcement_title = '';
          $('#error_announcement_title').text(error_announcement_title);
          $('#announcement_title').css("border-color", "#ccc")
          $('#announcement_title').css("background-color", "#fff")
        }
      if($.trim($('#announcement_description').val()) == 0 )
      {
        error_announcement_description = 'Please enter the Announcement Description';
            $('#error_announcement_description').text(error_announcement_description);
         $('#announcement_description').css("border-color", "#cc0000")
        $('#announcement_description').css("background-color", "#ffff99")
        }
        else
        {
           error_announcement_description = '';
          $('#error_announcement_title').text(error_announcement_description);
          $('#announcement_description').css("border-color", "#ccc")
          $('#announcement_description').css("background-color", "#fff")
        }
        if($.trim($('#announcement_date').val()) == 0 )
      {
        error_date = 'Please Enter the Date for the Announcement';
            $('#error_announcement_description').text(error_announcement_description);
         $('#announcement_date').css("border-color", "#cc0000")
        $('#announcement_date').css("background-color", "#ffff99")
        }
        else
        {
           error_date = '';
          $('#error_date').text(error_date);
          $('#announcement_date').css("border-color", "#ccc")
          $('#announcement_date').css("background-color", "#fff")
        }
        if(error_date == '' && error_announcement_description == '' && error_announcement_title == '')
        {
          $.ajax({
            url:"insert_announcemnt.php",
            method: "POST",
            data: $("#insert_announcement_form").serialize(),
             success:function(data)
            { 
              
              $("#insert_announcement_form")[0].reset();
              $("#announcement_table").html(data);
            }
          })
        }
    })

  $("#edit_announcement_form").submit(function(event){
      event.preventDefault();
      if($.trim($('#edit_announcement_title').val()) == 0 )
      {
        error_edit_announcement_title = 'Please enter the Announcement title';
            $('#error_edit_announcement_title').text(error_edit_announcement_title);
         $('#edit_announcement_title').css("border-color", "#cc0000")
        $('#edit_announcement_title').css("background-color", "#ffff99")
        }
        else
        {
           error_edit_announcement_title = '';
          $('#error_edit_announcement_title').text(error_edit_announcement_title);
          $('#edit_announcement_title').css("border-color", "#ccc")
          $('#edit_announcement_title').css("background-color", "#fff")
        }
      if($.trim($('#edit_announcement_description').val()) == 0 )
      {
        error_edit_announcement_description = 'Please enter the Announcement Description';
            $('#error_edit_announcement_description').text(error_edit_announcement_description);
         $('#edit_announcement_description').css("border-color", "#cc0000")
        $('#edit_announcement_description').css("background-color", "#ffff99")
        }
        else
        {
           error_edit_announcement_description = '';
          $('#error_edit_announcement_description').text(error_edit_announcement_description);
          $('#edit_announcement_description').css("border-color", "#ccc")
          $('#edit_announcement_description').css("background-color", "#fff")
        }
        if($.trim($('#edit_announcement_date').val()) == 0 )
      {
      error_edit_date = 'Please Enter the Date for the Announcement';
            $('#error_edit_date').text(error_edit_date);
         $('#edit_announcement_date').css("border-color", "#cc0000")
        $('#edit_announcement_date').css("background-color", "#ffff99")
        }
        else
        {
           error_edit_date = '';
          $('#error_edit_date').text(error_edit_date);
          $('#edit_announcement_date').css("border-color", "#ccc")
          $('#edit_announcement_date').css("background-color", "#fff")
        }
        if(error_edit_date == '' && error_edit_announcement_description == '' && error_edit_announcement_title == '')
        {
          $.ajax({
            url:"update_announcemnt.php",
            method: "POST",
            data: $("#edit_announcement_form").serialize(),
             success:function(data)
            { 
            $("#edit_modal").modal("hide");
              $("#edit_announcement_form")[0].reset();
              $("#announcement_table").html(data);
            }
          })
        }
    })


  $("#delete_annoucement_form").submit(function(event){
      event.preventDefault();  
          $.ajax({
            url:"delete_annoucement.php",
            method: "POST",
            data: $("#delete_annoucement_form").serialize(),
             success:function(data)
            { 
            $("#delete_modal").modal("hide");
            $("#announcement_table").html(data);
            }
          })
        
    })

$(document).on('click', '.edit_annoucement', function(){


   var announcement_id = $(this).attr("id");
  $.ajax({
    url:"fetch_announcement.php",
    method:"POST",
    data:{announcement_id:announcement_id},
    dataType:"json",
       success:function(data){
      $("#edit_announcement_title").val(data.announcement_title);
      $("#edit_announcement_description").val(data.announcement_description);
   
      $("#edit_announcement_date").val(data.announcement_date);
      $("#edit_annoucement_id").val(data.announcement_id);
 
      $("#edit_modal").modal("show");
    }
  })


 });


$(document).on('click', '.delete_annoucement', function(){


   var announcement_id = $(this).attr("id");
  $.ajax({
    url:"fetch_announcement.php",
    method:"POST",
    data:{announcement_id:announcement_id},
    dataType:"json",
       success:function(data){
      $("#delete_announcement_title").val(data.announcement_title);
      $("#delete_announcement_description").val(data.announcement_description);
   
      $("#delete_announcement_date").val(data.announcement_date);
      $("#delete_annoucement_id").val(data.announcement_id);
 
      $("#delete_modal").modal("show");
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
