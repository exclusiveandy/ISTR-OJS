<?php include "pagecomponents/maintopnav.php";?>
<?php include "../function.php";?>



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Publish</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Documents</li>
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
                  <?php 
                    $sql = "SELECT title, r1.research_id, CONCAT(user_fname, \" \", user_mname,\" \", user_lname) as fullname, journal_name from research_table r1
                     join user_table u1 on r1.user_id=u1.user_id 
                     join journal_table j1 on r1.journal_id=j1.journal_id AND  r1.status = \"Published\" ";
                     if(isset($_GET['keyword']))
                     {
                      $keyword = $_GET['keyword'];
                      $sql .= " where title LIKE '%{$keyword}%' OR CONCAT(user_fname, \" \", user_mname,\" \", user_lname) LIKE '%{$keyword}%'";
                     }
                    $final_query = query($sql);
                    confirm($final_query);
                    while($row = fetch_assoc($final_query))
                    {
                    ?>
                    <a href="docview.php?r_id=<?php echo $row['research_id']?>" style="font-style: italic;">                     
                    <u><?php echo $row['title'];?></u>          
                    </a>
                    by <?php echo $row['fullname'];?>  in
                       <a href="journals.php" style="font-style: italic;">                     
               <?php echo $row['journal_name'];?>          
                    </a>
                    
                
                    <hr>
                      <?php 
                }
                  ?>                    
                </div>        <!-- /.card-body -->
                
              </div>  
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <?php
  include "pagecomponents/mainfooter.php";
  ?>