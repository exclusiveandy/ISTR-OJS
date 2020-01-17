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
            <h1>Internal Reviewer</h1>
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
<?php 
$sql = query("SELECT * from research_table where user_id = '{$_SESSION['id']}' AND status = \"To the Author for Consent\"");

if(row_count($sql) > 0)
{ 
  ?>        <div class="card">
        <div class="card-header">
          <h3 class="card-title">Documents For Layout Consent</h3>
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
              <th>Date Submitted</th>
              <th>View</th>
              <th>Download</th>
            </tr>
            </thead>
            <tbody>
                <?php display_layout_consent($_SESSION['id']);?>    
            </tbody>
            
            
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

<?php
}
?>

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
              <th>Date Submitted</th>
              <th>View</th>
              <th>Download</th>
            </tr>
            </thead>
            <tbody>
                <?php display_table_research_internal_reviewer($_SESSION['id']);?>    
            </tbody>
            
            
          </table>
        </div>
        <!-- /.card-body -->
      </div>

            <div class="card">
        <div class="card-header">
          <h3 class="card-title">Documents</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Ref Code</th>
              <th>Title</th>
              <th>Journal(s)</th>
              <th>Status</th>
              <th>Date Submitted</th>
              <th>View</th>
              <th>Download</th>
            </tr>
            </thead>
            <tbody>
                <?php display_table_research($_SESSION['id']);?>    
            </tbody>
            
            
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
     <div class="card">
        <div class="card-header">
          <h3 class="card-title">Documents</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Ref Code</th>
              <th>Title</th>
              <th>Journal(s)</th>
              <th>Status</th>
              <th>Date Submitted</th>
              <th>View</th>
              <th>Download</th>
            </tr>
            </thead>
            <tbody>
                <?php display_accepted_with_revision($_SESSION['id']);?>    
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
</body>
</html>
