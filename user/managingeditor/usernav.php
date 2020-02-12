<!DOCTYPE html>
<?php include "../../function.php"; 
validate();?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ISTR-OJS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="../../css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
 
              <li class="nav-item dropdown">
           
       <input type="hidden" id="user_id" value="<?php echo $_SESSION['id'];?>">
        <a class="nav-link" data-toggle="dropdown" id="bell" href="#">
          <i class="far fa-bell"></i>
             <?php
              $query = query("SELECT COUNT(id) as count From notification where status = 'unread' and user_id = '{$_SESSION['id']}'");
              while($row = fetch_assoc($query))
              {
                if($row['count']>0)
                {
                echo ' <span class="badge badge-warning navbar-badge">';
                echo $row['count']; 
                echo ' </span>';
                }
              }?>
           
        </a>
     
        <div class="dropdown-menu dropdown-menu-xl-6 dropdown-menu-right">


          
             
              <?php
             $query = query("SELECT COUNT(id) as count From notification where user_id = '{$_SESSION['id']}'");
            $query2=  query("SELECT message, notification_type, research_id, DATEDIFF(CURRENT_DATE(), date) as days From notification where user_id = '{$_SESSION['id']}' order by date desc limit 5");
              while($row = fetch_assoc($query))
              {
             
                  if($row['count'] >0)
                {
                while($result = fetch_assoc($query2))
                {
                  if($result['notification_type'] == "calendar")
                    {
                  ?> 

                <a href="calendar.php" class="dropdown-item">
                  <i class="fas fa-calendar-alt"></i>
                  <?php
                }
                else if($result['notification_type'] == "review_me")

                {

                  ?>
                   <a href="view_document.php?r_id=<?php echo $result['research_id']?>" class="dropdown-item">
                    <i class="nav-icon fas fa-file"></i>
                <?php
                }
                   else if($result['notification_type'] == "for_eic")

                {

                  ?>
                   <a href="docview_send_to_EIC.php?r_id=<?php echo $result['research_id']?>" class="dropdown-item">
                    <i class="nav-icon fas fa-file"></i>
                <?php
                }
                 else if($result['notification_type'] == "for_author")

                {

                  ?>
                   <a href="docview_send_to_author.php?r_id=<?php echo $result['research_id']?>" class="dropdown-item">
                    <i class="nav-icon fas fa-file"></i>
                <?php
                }
                  else
                {

                  ?>
                   <a href="../../docview.php?r_id=<?php echo $result['research_id']?>" class="dropdown-item">
                    <i class="nav-icon fas fa-file"></i>
                <?php
                }

                ?>

                <p>
                <?php echo $result['message'] ;?>
                <span class="float-right text-muted text-sm">
                <?php echo $result['days']." day ago";?>
                </span>
               </p>
                </a>
                <?php
                }
              }
                else
                {
                  echo '<span class="dropdown-item dropdown-footer">No notification</span>';
               
                }


              
            }
              ?>

         

         
          
          
        </div>
      </li>


            <li class="nav-item">
     <a class="nav-link"  href="calendar.php">
<i class="fas fa-calendar-alt"></i>           
           
        </a>
      </li>
      <li class="nav-item">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="logout.php" class="nav-link">Logout</a>
        </li>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index.php" class="brand-link">
      <img src="../../img/istrlogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ISTR-OJS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
        <div class="info" style="margin-left: 5%; margin-right: 5%;">
          <a href="profile.php?id=<?php echo $_SESSION['id'];?>" class="d-block"><?php echo $_SESSION['fname']. " ". $_SESSION['mname']." ". $_SESSION['lname'] ;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
        
       <?php 
       $journal_id = $_SESSION['journal_id'];
      $count_query = query("SELECT COUNT(research_id) as count
        FROM `research_table`as r 
        where user_role_id = '2' and r.journal_id='{$journal_id}' order by research_id asc");
      $row_count = fetch_assoc($count_query);
     ?>

          <li class="nav-header">LISTS</li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Documents
                   <?php
                    if($row_count['count'] != 0)
                    {
                    ?>
                    <span class="badge badge-danger navbar-badge" style="font-size: 15px"><?php echo $row_count['count'];?></span> 
                    <?php
                    }
                  ?>
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
    $count_review_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     where user_role_id = '2' and r.journal_id='{$journal_id}' and status = \"On Managing Editor\" order by research_id asc");
      $row_review_count = fetch_assoc($count_review_query);
     ?>
       
              <li class="nav-item">
                <a href="for_review.php" class="nav-link">
                 <i class="fas fa-barcode"></i>
                  <p>For Review
                  <?php
                    if($row_review_count['count'] != 0)
                    {
                    ?>
                    <span class="badge badge-danger navbar-badge" style="font-size: 13px"><?php echo $row_review_count['count'];?></span> 
                    <?php
                    }
                  ?>

                </p>
                </a>
              </li>


           <?php
    $count_author_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     where user_role_id = '2' and r.journal_id='{$journal_id}' and (status = \"Rejected\" OR status = \"Accepted with Revisions\" OR status = \"To the Author for Consent\") order by research_id asc");
      $row_author_count = fetch_assoc($count_author_query);
     ?>
       

              <li class="nav-item">
                <a href="for_author.php" class="nav-link">
                  <i class="fa fa-paper-plane"></i>
                  <p>For the Author
                   <?php
                    if($row_author_count['count'] != 0)
                    {
                    ?>
                    <span class="badge badge-danger navbar-badge" style="font-size: 13px"><?php echo $row_author_count['count'];?>
                    </span> 
                    <?php
                    }
                  ?>
                </p>
                </a>
              </li>

                   <?php
    $count_EIC_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     where user_role_id = '2' and r.journal_id='{$journal_id}' and (status = \"Issue of Volume\" OR status = \"Assigning of Volume and Issue\" OR status = \"To the Proofreader\" OR status = \"To the Layout Editor\") order by research_id asc");
      $row_EIC_count = fetch_assoc($count_EIC_query);
     ?>
              <li class="nav-item">
                <a href="for_EIC.php" class="nav-link">
                   <i class="fa fa-paper-plane"></i>
                  <p>For Editor in Chief
                    <?php
                    if($row_EIC_count['count'] != 0)
                    {
                    ?>
                    <span class="badge badge-danger navbar-badge" style="font-size: 13px"><?php echo $row_EIC_count['count'];?>

                    </span> 
                    <?php
                    }
                  ?>
                </p>
                </a>
              </li>
                            
            </ul>
          </li>          

          
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="authors_guide.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Author's Guide</p>
            </a>
          </li>


          
            <li class="nav-header">Report</li>
          <li class="nav-item">
            <a href="reports.php" class="nav-link">
<i class="fas fa-chart-bar"></i>              
<p>Reports</p>
            </a>
          </li>
                <li class="nav-item">
            <a href="queries.php" class="nav-link">
<i class="fas fa-chart-bar"></i>              
<p>Table</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
