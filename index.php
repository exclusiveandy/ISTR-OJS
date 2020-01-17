<?php include "header.php";?>
<?php include "../function.php";?>
  <!-- Navbar -->
    <!-- /.content-header -->



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; "> Institute of Science and Technology Research</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://pup.edu.ph">ISTR</a></li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



    <!-- Main content -->
    <div class="content">
      <div class="container">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                                <?php 
                    $image_carrousel = query("SELECT MIN(picture_id) as min, picture_name from ojs_home_page_picture");
                      $row_first = fetch_assoc($image_carrousel);
                      ?>
                
      
                     </ol>
                    
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="images/<?php echo $row_first['picture_name'];?>" alt="First slide">
                    </div>
                  
                      <?php
                         $all_image_query = query("SELECT picture_id, picture_name from ojs_home_page_picture where
                          picture_id <> (SELECT MIN(picture_id) as min from ojs_home_page_picture)");
                       
                         while($row_image = fetch_assoc($all_image_query))
                         {
                      ?>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="images/<?php echo $row_image['picture_name'];?>" alt="First slide">
                    </div>
                    <?php
                    }
                  
                    ?>                  
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

            <br>
            <div class="row">
            <div class="col-md-8">
              <div class="col-md-12" style="padding-bottom: 2%; padding-top: 2%;">
                <h1 class="m-0 text-dark" style="font-size: 20pt; ">Featured Journals</h1>
              </div>          
<?php
$journal_query = query("SELECT * from journal_table order by rand() LIMIT 1");
$row_journal = fetch_assoc($journal_query);
?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><?php echo $row_journal['journal_name'];?></h3>         
                </div>
                <div class="card-body">
                    <p style="overflow: hidden; white-space: normal; text-overflow: ellipsis; height: 115px;"> 
                    <img src="images/<?php echo $row_journal['journal_image'];?>" style="float: left; margin-right: 15px;"alt="Image Picture" height="20%" width="10%" class="img-thumbnail"/>
                    
                    <?php echo $row_journal['description'];?>
                          
                    </p> 
                </div>        <!-- /.card-body -->
                <div class="card-footer">
                            <a href="journal_view.php?id=<?php echo $row_journal['journal_id'];?>" type="button" class="btn btn-primary">View</a>
          <a  href="archieves.php?id=<?php echo $row_journal['journal_id'];?>" type="button" class="btn btn-primary">Archives</a>
                </div>        <!-- /.card-footer-->
              </div>      <!-- /.card -->


              <div class="col-md-12" style="padding-bottom: 2%; padding-top: 2%;">
                <h1 class="m-0 text-dark" style="font-size: 20pt; ">Recent Publish</h1>
              </div> 

              <div class="card">
                
                <div class="card-body">
                  <?php
                  $article_query = query("SELECT * from research_table order by date_published desc limit 1");
                  $row_article = fetch_assoc($article_query);
                  ?>

                     <a href="docview.php?r_id=<?php echo $row_article['research_id']?>" style="font-style: italic;">                       
                    <?php echo $row_article['title'];?>   
                    </a>
                    <hr>                    
                </div>        <!-- /.card-body -->
                
              </div>      <!-- /.card -->

             



            </div>
            






















            <div class="col-md-4">
            
              <div class="col-md-12" style="padding-bottom: 4%; padding-top: 4%;">
               <h1 class="m-0 text-dark " style="font-size: 20pt; font-style: italic;"><span class="fa fa-bullhorn">  Announcement </span> </h1>
              </div> 
<?php 
                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d H:i:s");
$Announcement_query = query("SELECT * from Announcement_table where Announcement_date <= '{$date}' order by Announcement_date desc LIMIT 1");
$row_announcement = fetch_assoc($Announcement_query);
?>
              <div class="card">
                <div class="card-header">
                  <h5 class="m-0 text-danger"><?php echo $row_announcement['announcement_title'];?></h5>
                </div>
                <div class="card-body">
                  <p class="card-text " style="overflow: hidden; white-space: normal; text-overflow: ellipsis; height: 115px;">
                    <?php echo $row_announcement['announcement_description'];?>
                  </p>
                  <a href="announcements.php" class="card-link">View</a>
                </div>
              </div>

              <div class="col-md-12" style="padding-bottom: 4%; padding-top: 4%;">
               <h1 class="m-0 text-dark " style="font-size: 20pt; font-style: italic;">  Follow us on </h1>
              </div> 

              <div class="card">
             
        
               <div class="card-body">
                <ul>
                        <?php 
          $query_url = query("SELECT * from ojs_page_url");
          while($row_url = fetch_assoc($query_url))
          {
          ?>
                  <li><a href="<?php echo $row_url['url'];?>" target="_blank" style="font-style: italic;"><?php echo $row_url['url'];?><i class="fa fa-facebook"></i></a></li>
              <?php
              }
              ?>    
                </ul>
                </div>
                
              </div>
              





           
            

            </div>


            </div>

            








     
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <?php
  include "components/mainfooter.php";
  ?>