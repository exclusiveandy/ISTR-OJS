<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ISTR - OJS</title>

  <link rel="stylesheet" href="css/adminlte.min.css">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-light navbar-white border-bottom">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="img/istrlogo.png" alt="istrlogo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">ISTR-OJS</span>
      </a>

      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 60px; padding-right: 20px;">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="pages/publish.php" class="nav-link">Publish</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="pages/journals.php" class="nav-link">Journals</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="pages/guide.php" class="nav-link">Guide</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="pages/about.php" class="nav-link">About</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="pages/login.php" class="nav-link">Login</a>
        </li>

         <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="pages/register.php" class="nav-link">Register</a>
        </li>
      </ul>
     
      <!-- SEARCH FORM -->
      <ul class="navbar-nav ml-auto">
      <form class="form-inline ml-3" action="Publish.php">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="keyword"  onsubmit="window.location.href='Publish.php?keyword=<?php echo $_POST['keyword'];?>' type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      </ul>

      <!-- Right navbar links -->
      
        <!-- Messages Dropdown Menu -->
       
    </div>
</nav>
  <!-- /.navbar -->

  
<?php include "function.php";?>
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
                    <h1 class="m-0 text-dark" style="font-size: 20pt; "> Institute of Science and Technology Research</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://pup.edu.ph">ISTR</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
                                    <img src="images/<?php echo $row_journal['journal_image'];?>" style="float: left; margin-right: 15px;" alt="Image Picture" height="20%" width="10%" class="img-thumbnail" />

                                    <?php echo $row_journal['description'];?>

                                </p>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="journal_view.php?id=<?php echo $row_journal['journal_id'];?>" type="button" class="btn btn-primary">View</a>
                                <a href="archieves.php?id=<?php echo $row_journal['journal_id'];?>" type="button" class="btn btn-primary">Archives</a>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->

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
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->

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
                                        <li>
                                            <a href="<?php echo $row_url['url'];?>" target="_blank" style="font-style: italic;">
                                                <?php echo $row_url['url'];?><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <?php
      }
      ?>
                                </ul>
                            </div>

                        </div>

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <br><br>
</div>
    
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Version 1.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019-2020 <a href="https://pup.edu.ph">Polytechnic University of the Philippines</a>.</strong> All rights reserved.
  </footer>


   <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>