
<?php include "header.php" ;?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Journals</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Journal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
       
       <div class="container-fluid">

         <?php 
              $sql = query("select * from journal_table");
              confirm($sql);
              while($row = fetch_assoc($sql))
              {
                ?>
              

              <div class="card callout callout-danger">       

             
                <div class="card-header">
                  <h3 class="card-title"> <?php echo $row['journal_name']; ?></h3>         
                </div>
                <div class="card-body">
                    <p style="overflow: hidden; white-space: normal; text-overflow: ellipsis; height: 180x;"> 
                    <img src="../../images/<?php echo $row['journal_image']?>" style="float: left; margin-right: 15px;"alt="Image Picture" height="20%" width="10%" class="img-thumbnail"/>
                    
                             <?php echo $row['description'];?>
                     
                    </p> 
                </div>        <!-- /.card-body -->
                <div class="card-footer">
                  <p><button onclick="location.href='edit_journal.php?id=<?php echo $row['journal_id']?>'" class="btn btn-primary">Manage</button></p>
                 

                </div>        <!-- /.card-footer-->
              
              </div>

              <?php
                }           
               ?>




              
              <a href="addjournal.php" type="button" class="btn bg-gradient-danger btn-lg float-right">Add Journal</a>

              




                




      </div>

  

    </section>







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
