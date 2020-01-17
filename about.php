<?php include "header.php";?>
<?php include "../function.php";?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">About Us</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">About ISTR</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>




    <!-- Main content -->
    <div class="content">
      <div class="container">
      <div class="card">
        
        <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <?php
            $query_about = query("SELECT * from about_ojs");
            while($row = fetch_assoc($query_about))
            {
            ?>
          <h1 class="m-0 text-dark" style="font-size: 20pt; "><?php echo $row['ojs_title'];?></h1><br>
          <p><?php echo $row['ojs_description'];?></p>
          <?php
        }
        ?>
          
          <?php
            $query_about = query("SELECT * from about_ojs_picture");
            confirm($query_about);
            $row_photo = fetch_assoc($query_about);
            {
            ?>
          </div>
          <div class="col-md-6">
            <img src="images/<?php echo $row_photo['picture_name'];?>"  width="100%;">
          </div>   
         
        </div>

        <?php
          } 
         ?>
       


          
  
        
        
        
        
           
        </div>        <!-- /.card-body -->
        <div class="card-footer">
          <?php 
          $query_url = query("SELECT * from ojs_page_url");
          while($row_url = fetch_assoc($query_url))
          {
          ?>
          <button type="button" onclick="window.location.href='<?php echo $row_url['url'];?>'"  class="btn btn-primary"><?php echo $row_url['url_title'];?></button>
          <?php
        }
        ?>
        </div>        <!-- /.card-footer-->
      </div>      <!-- /.card -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <?php
  include "components/mainfooter.php";
  ?>





