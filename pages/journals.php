
<?php include "pagecomponents/maintopnav.php";?>
<?php include "../function.php";?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; "> Journals</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">List of Journals</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



    <!-- Main content -->
    <div class="content">
      <div class="container">

      <section class="content">


    <!-- /.FOR LOOP HERE -->

<?php 
$sql = query("SELECT * from journal_table");
confirm($sql);
while($row = fetch_assoc($sql))
{

?>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo $row['journal_name']; ?></h3>

  
        </div>
        <div class="card-body">
            <p> 
            <img src="images/<?php echo $row['journal_image']; ?>" style="float: left; margin-right: 15px;"alt="Image Picture" height="20%" width="10%" class="img-thumbnail"/>
            
            <?php echo $row['description']; ?>
            
            </p> 
        </div>        <!-- /.card-body -->
        <div class="card-footer">
          <a href="journal_view.php?id=<?php echo $row['journal_id'];?>" type="button" class="btn btn-primary">View</a>
          <a  href="archieves.php?id=<?php echo $row['journal_id'];?>" type="button" class="btn btn-primary">Archives</a>
        </div>        <!-- /.card-footer-->
      </div>      <!-- /.card -->

      <?php 
}
      ?>













      

      </section>

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


