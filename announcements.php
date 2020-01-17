
<?php include "header.php";?>
<?php include "../function.php";?>



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Announcements</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">List of Announcemnts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



    <!-- Main content -->
    <div class="content">
      <div class="container">

   

      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="card card-danger">            
            <div class="card-body">

            <!-- /.d2 mag simula ng loop -->
       <?php 
       $announcement_query = query("SELECT DATE_FORMAT(announcement_date, \"%M %d %Y\") as a_date, announcement_title, announcement_description from announcement_table order by announcement_date desc");
       while($row_announcement = fetch_assoc($announcement_query))
       {
        ?>
              <ul class="timeline">
              <li  class="time-label">
                <span class=""><?php echo $row_announcement['a_date'];?> </span>            <!-- /.GROUPED BY YEAR AND MONTH -->
              </li>
              <li><i class="fa fa-bullhorn" aria-hidden="true"></i>
    	
                <div class="timeline-item timeline-danger">

                    <h3 class="timeline-header"><a href="#"><?php echo $row_announcement['announcement_title']?></a></h3>

                    <div class="timeline-body">
                      <p><?php echo $row_announcement['announcement_description']?></p>
                      </div>
                  </div>
                </li>				
                </ul>
                <!-- /.END ng loop -->
                  <?php
                    }
                  ?>
                













            </div>
          </div>
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
  </div>  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <?php
  include "components/mainfooter.php";
  ?>


<!-- ./wrapper -->


