<?php include("header.php");?>
  
 <?php 

        ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Volume</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Volume Lists</h3>
                    </div>
                    <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>Journal Name</th>
                        <th>Volume</th>
                        <th>Issue</th>
                        <th>Date Open</th>
                         <th>Number of Articles in the Volume & Issue</th>
                        <th>View Volume & Issue Content</th>
                        </tr>
                        </thead>
                        <tbody>
                       <?php
                       
                        $volume_query = query("SELECT journal_name, v.journal_id, v.volume_id, volume, issue, DATE_FORMAT(date_open, \"%M, %d, %Y\") as date_open from volume_table v join journal_table j on j.journal_id=v.journal_id where v.status = 1");

                        confirm($volume_query);
                        while($row_volume = fetch_assoc($volume_query))
                        {
                          $count_query = query("SELECT COUNT(research_id)  as count from research_table where volume_id = '{$row_volume['volume_id']}' ");
                          $row_count = fetch_assoc($count_query);
                        ?> 
                        <tr>
                        <td><?php echo $row_volume['journal_name']?></td>
                        <td><?php echo $row_volume['volume']?></td>
                        <td><?php echo $row_volume['issue']?></td>
                        <td><?php echo $row_volume['date_open']?></td>
                        <td><?php echo $row_count['count']?></td>
                        <td>     
                        <button type="submit" id="<?php echo $row_volume['volume_id']?>" class="btn btn-success edit_data" onclick="window.location.href='volumecontent.php?v_id=<?php echo $row_volume['volume_id']?>'">View</button>
                        </td>
                        </tr>
                        <?php
                          }
                         ?>
                
                        </tbody>
                    
                    </table>

                    
                    </div>
                </div>






     







      

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
