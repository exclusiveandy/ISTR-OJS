<?php include "usernav.php";
if(!isset($_SESSION['id']))
{
redirect('../../pages/login.php');
}
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Publication Office</h1>
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Documents</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
              <th>Ref Code</th>
              <th>Title</th>
              <th>Journal(s)</th>
              <th>Status</th>
              <th>Volume</th>
              <th>Issue</th>
              <th>View</th>
            </tr>
            </thead>
            <tbody>
               <?php 
               $for_publishing_query = query("SELECT research_id, journal_name, v.volume, v.volume_id, v.issue, title, r.status, research_file, reference_code,  DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, r.journal_id
     FROM `research_table`as r 
     JOIN journal_table as j ON r.journal_id=j.journal_id 
     join volume_table as v on r.volume_id=v.volume_id
     where user_role_id = '8' and r.status = \"For Publishing\" and r.volume_id <> '0' order by research_id  asc");
              
               while($row_doc = fetch_assoc($for_publishing_query))
               {
               ?>
              <tr>
              <td><?php echo $row_doc['reference_code']?></td>
              <td><?php echo $row_doc['title']?></td>
              <td><?php echo $row_doc['journal_name']?></td>
              <td><?php echo $row_doc['status']?></td>
              <td><?php echo $row_doc['volume']?></td>
              <td><?php echo $row_doc['issue']?></td>
              <td>
             <a href="volumecontent.php?v_id=<?php echo $row_doc['volume_id']?>" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>

            </tr>
            <?php
              }
              ?>
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
