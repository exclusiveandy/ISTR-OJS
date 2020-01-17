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
            <h1>External Reviewer</h1>
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
    <div style="padding: 5px;">
       
        <div class="alert alert-success  text-center" id="error_terms_conditions" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>Please kindly read the Terms and Conditions</strong></h3> 
        </div>
      
      </div>
    <!-- Main content -->
    <section class="content" style="overflow-y:visible; ">

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
              <th>Date Submitted</th>
              <th>View</th>
              <th>Download</th>
            </tr>
            </thead>
            <tbody>

            <?php
              $user = $_SESSION['id'];
          $query = query("SELECT research_id, journal_name, title, r.status, research_file, reference_code,  DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, r.journal_id
     FROM `research_table`as r 
     join journal_table j 
     on r.journal_id=j.journal_id
     where user_id = '{$user}' and r.status NOT IN  (\"Accepted with Revisions\", \"To the Author for Consent\", \"Rejected\") order by research_id asc");
    confirm($query);
    while($row = fetch_assoc($query))
    {
      ?>


                       <tr>
              <td><?php echo $row['reference_code']?></td>
              <td><?php echo $row['title']?></td>
              <td><?php echo $row['journal_name']?></td>
              <td><?php echo $row['date_submitted']?></td>
                      <td>
         <a href="view_ongoing_document.php?r_id=<?php echo $row['research_id']?>" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path=<?php echo $row['research_file']?>" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
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
<!-- ./wra

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
