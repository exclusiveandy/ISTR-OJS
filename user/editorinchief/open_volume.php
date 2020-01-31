<?php include "../usercomponents/usernav.php" ; ?>
     <?php 
        $id = $_SESSION['id'];
        $journal_query = query("SELECT j1.journal_id, journal_name from journal_table j1 
          join user_journal_table u1 on j1.journal_id=u1.journal_id
          where user_id = '{$id}'");
        confirm($journal_query);
        $row_journal = fetch_assoc($journal_query);
         $journal_id = $row_journal['journal_id'];
        ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Volume (<?php echo $row_journal['journal_name'];?>)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Volume</li>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Open Volume</h3>
                    </div>
                    <div class="card-body">
                      <?php
                      if(isset($_POST['submit']))
                      {
                        $volume = escape_string($_POST['volume']);
                        $issue = escape_string($_POST['issue']);
                        if(empty($volume))
                        {
                          validation_error("Need to enter the volume number");
                        }
                         if(empty($issue))
                        {
                          validation_error("Need to enter the issue number");
                        }
                        if(!empty($volume) && !empty($issue))
                        {
                          $repeat_query = query("SELECT * from volume_table where volume = '{$volume}' AND issue = '{$issue}' and journal_id = '{$journal_id}' ");
                          if(row_count($repeat_query) > 0)
                          {
                            validation_error("The volume and issue number is already open");
                          }
                          else
                          {
                              date_default_timezone_set('Asia/Manila');
                              $date = date("Y-m-d H:i:s");
                              $insert_query = query("INSERT into volume_table(volume, issue, date_open, journal_id)
                                VALUES('{$volume}', '{$issue}', '{$date}', '{$journal_id}')");
                              confirm($insert_query);
                              redirect("open_volume.php");
                          }
                        }
                      }
                      ?>
                      <form method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" style="text-align: center;">
                                    <label for="exampleInputEmail1">Volume No.</label>
                                    <input style="text-align: center;" type="text" class="form-control" name="volume" id="exampleInputEmail1" placeholder="" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="text-align: center;">
                                    <label for="exampleInputEmail1">Issue No.</label>
                                    <input style="text-align: center;" type="text" class="form-control" name="issue" id="exampleInputEmail1" placeholder="" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')">
                                </div>
                            </div>
                        </div>
                        
                     
                    
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" name="submit" id="submit">Open</button>
                    </div>
                    </form> 
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Volume Lists</h3>
                    </div>
                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>Volume</th>
                        <th>Issue</th>
                         <th>Status</th>
                        <th>Date Opened</th>
                        
                        <th>Number of Articles</th>
                        
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                       
                        $volume_query = query("SELECT v.volume_id, volume, issue, status,  DATE_FORMAT(date_open, \"%M, %d, %Y\") as date_open from volume_table v where v.journal_id = '{$journal_id}'");

                        confirm($volume_query);
                        while($row_volume = fetch_assoc($volume_query))
                        {
                          $count_query = query("SELECT COUNT(research_id)  as count from research_table where volume_id = '{$row_volume['volume_id']}' ");
                          $row_count = fetch_assoc($count_query);
                        ?> 
                        <tr>
                        <td><?php echo $row_volume['volume']?></td>
                        <td><?php echo $row_volume['issue']?></td>
                        <?php
if($row_volume['status'] == 1)
{
  ?>
                        <td>Published</td>
                        <?php
                        } 
                        else
                        {
                          ?>
                         <td>Open</td> 
                          <?php
                        }

                        ?>
                        <td><?php echo $row_volume['date_open']?></td>
                        <td><?php echo $row_count['count']?></td>
                        <td>  
                             <?php
if($row_volume['status'] != 1)
{
  ?>   
                        <button type="submit" id="<?php echo $row_volume['volume_id']?>" class="btn btn-success edit_data">edit</button>
                        <?php
                      }
                      ?>
                        </td>
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




     







      

      </section>


<div class="modal fade" id="edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Volume and Issue</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
<form method="POST" >
            <?php 
            
            if(isset($_POST['Update']))
            {

              if(!empty($_POST['volume']) && !empty($_POST['issue']))
              {
                $volume_id = $_POST['volume_id'];
                $volume = escape_string($_POST['volume']);
                $issue = escape_string($_POST['issue']);
                $update_query = query("UPDATE volume_table SET volume = '{$volume}', issue='{$issue}' WHERE volume_id = '{$volume_id}'");
                confirm($update_query);
                redirect("open_volume.php");
              }
            }
            ?>
                  

               

                  <div class="form-group">
                    <label for="exampleInputEmail1">Volume</label>
                    <input type="text" class="form-control" name="volume" id="volume" placeholder="Enter the Volume Number" required>
                    <input type="hidden" name="research_id" id="research_id" class="form-control">
                  </div>  
   

                      <div class="form-group">
                    <label for="exampleInputEmail1">Issue</label>
                    <input type="text" class="form-control" name="issue" id="issue" placeholder="Enter the Volume Number" required>
                    <input type="hidden" name="volume_id" id="volume_id" class="form-control">
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

    $(document).on('click', '.edit_data', function(){
    var volume_id = $(this).attr("id");
     $.ajax({
      url: "fetch_volume.php",
      data: {id:volume_id},
      method: "POST",
      dataType: "json",
      success: function(data){
        $("#volume").val(data.volume);
        $("#volume_id").val(data.volume_id);
        $("#issue").val(data.issue);
        $("#edit").modal("show");
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
