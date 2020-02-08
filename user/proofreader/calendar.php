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
            <h1>Author</h1>
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
      <div class="card">
    <div class="card-header with-border">
            <h3 class="card-title"><b>Calendar View</b></h3>
          </div>
  <br />
  <h2 align="center">Calendar</h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>
</div>



    </section>
    <!-- /.content -->
  </div>  <!-- /.content-wrapper -->

     <div class="modal fade" id="delete_url_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Details of the Event</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <label>Title </label>
                <p id="event_title"></p>
                <label>Description</label>
                <p id="event_description"></p>
                <label>Date</label>
                <p id="event_date"></p>
                </div>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script>
  $(document).ready(function(){
    var calendar = $("#calendar").fullCalendar({
      displayEventTime : false,
      header: {
        left: 'prev, next today',
        center: 'title',
        right: 'month'
      },
      events: 'load_calendar.php',
      eventRender: function (event, element) {
      element.click(function() {
        $("#event_title").text(event.title);
        $("#event_description").text(event.description);
        $("#event_date").text(event.date);
        $("#delete_url_modal").modal();
        
        });
      }
 
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
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });
  });
</script>
</body>
</html>
