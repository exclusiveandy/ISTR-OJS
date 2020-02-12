<?php include "usernav.php";
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
              <th>Status</th>
              <th>Date Given</th>
              <th>Expiration</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            <?php
              $query = query("SELECT r.research_id, journal_name, date_uploaded, date_expired, DATEDIFF(date_expired, date_uploaded) as countdown, title, r.status, research_file, reference_code,  DATE_FORMAT(date_uploaded, \"%M %d %Y %r\") as date_uploaded, r.journal_id
     FROM `research_table`as r 
     join proofreader_table as p on p.research_id=r.research_id
     join journal_table as j 
     on j.journal_id=r.journal_id
     where user_role_id = '6'");
    confirm($query);
    while($row = fetch_assoc($query))
    {
      ?>


                       <tr>
              <td><?php echo $row['reference_code']?></td>
              <td><?php echo $row['title']?></td>
              <td class="journal_name"><?php echo $row['journal_name']?></td>
              <td><?php echo $row['status']?></td>
              <td><?php echo $row['date_uploaded']?></td>
              <td class='expiration' name="<?php echo $row['date_expired'];?>"></td>
              <?php if( $row['countdown'] == 0)
              {
              ?>      
              <td>
                        <button 
                      data-toggle="modal" 
                      class="btn btn-info btn-md pull-out" 
                      id = "<?php echo $row['research_id'];?>"
                      name = "user_id"
                      style="margin-left: 20%;"><i class="fas fa-sign-out-alt"></i></span></button>  </td>
           
              <?php
            }
            else
            {
              ?>
           
      
            <?php
          }
            ?>

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



<!-- /.DESIGNATION MODAL MODAL MODAL -->
 




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
 

 <div class="modal fade" id="modal_default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modal_header">Research</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <form method="post" id="pull_out_research">
            <input type="hidden" name="r_id" id="r_id">
            <input type="hidden" name="u_id" id="u_id">

            <div>
              <p>Are you sure you want to pull out this article from <strong id="name"></strong></p>
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
      </div>
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
  $(document).on('click', '.pull-out', function(){
  var research_id = $(this).attr("id");
  $.ajax({
    url: "fetch_research.php",
    data: {research_id:research_id},
    method: "POST",
    dataType: "json",
    success:function(data)
    {
    $("#r_id").val(data.research_id);
    $("#u_id").val(data.user_id);
     $("#name").html(data.fullname);
    $("#modal_default").modal("show");
    }
  })
 });


    $("#pull_out_research").submit(function(event){  
   var research_id =  $("#r_id").val();
    event.preventDefault();
    $.ajax({
    url: "pull_out_research.php",
    data: $("#pull_out_research").serialize(),
    method: "POST",
     success:function(data)
    {

        $("#modal_default").modal("hide");
        if($.trim(data) == "5")
        {
      $(window).attr('location', 'assign_proofreader.php?r_id='+research_id);
        }
    }
    })
  })
</script>



<script>
$(document).ready(function(){


$('.expiration').each(function(){
// Set the date we're counting down to
var  date = $(this).attr('name');
var selfs = $(this);
var countDownDate = new Date(date).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();


  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
 selfs.html(days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ");

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    selfs.html("<strong>Times up</strong>")
    
  }
}, 1000);

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
