
<?php include "header.php";?>
<?php include "../function.php";?>
<?php 
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = query("SELECT * from journal_table where journal_id = '{$id}'");
confirm($sql);
$row = fetch_assoc($sql);
}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; "><?php echo $row['journal_name'];?></h1>
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


      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><strong>Journal Details</strong></h3>

  
        </div>
        <div class="card-body">
          <div class="row">
<?php 
$eic_query = query("SELECT * from user_journal_table uj join 
user_table u1 
on u1.user_id=uj.user_id
join journal_table j1 
on j1.journal_id=uj.journal_id
where j1.journal_id = '{$id}' and u1.user_role_id = '3'");
$row_eic = fetch_assoc($eic_query);
$me_query = query("SELECT * from user_journal_table uj join 
user_table u1 
on u1.user_id=uj.user_id
join journal_table j1 
on j1.journal_id=uj.journal_id
where j1.journal_id = '{$id}' and u1.user_role_id = '2'");
$row_me = fetch_assoc($me_query);
?>

            <div class="col-md-3" style="text-align:center;"> 
             <img src="images/<?php echo $row['journal_image']; ?>" alt="Image Picture" height="250" width="150" class="img-thumbnail"/>
              <br>
              <br>
              <hr>              
             <dl class="dl-horizontal">
              <h5><strong style="color:#800000;">Editorial Members</strong> </h5><hr>
                <dt style="color:#800000;">Editor In Chief</dt><br>
                <dd><?php echo $row_eic['user_fname']." ".$row_eic['user_mname']." ".$row_eic['user_lname'];?></dd><br><hr>
                <dt style="color:#800000;">Managing Editor</dt><br>
                <dd><?php echo $row_me['user_fname']." ".$row_me['user_mname']." ".$row_me['user_lname'];?></dd><br><hr>
                <dt style="color:#800000;">Associate Editors</dt><br>
                <?php
                $reviewer_query = query("SELECT * from user_journal_table uj join 
user_table u1 
on u1.user_id=uj.user_id
join journal_table j1 
on j1.journal_id=uj.journal_id
where j1.journal_id = '{$id}' and (u1.user_role_id = '4' OR  u1.user_role_id = '5')");
while($row_reviewer = fetch_assoc($reviewer_query))
{
?>
                
                <dd>
                	<?php echo $row_reviewer['user_fname']." ".$row_reviewer['user_mname']." ".$row_reviewer['user_lname'];?>
                </dd>
                <?php
               }
               ?>
              </dl>
            
            </div>

            <div class="col-md-9"> 
            
              <h5><strong style="color:#800000;">Description</strong> </h5>  
              <br>

              <p>
              
                <?php echo $row['description']; ?>
              
              </p>

              <br>
              <hr>

              <dl class="dl-horizontal">
                <dt>Print ISSN</dt>
                <dd><?php echo $row['print_issn']; ?></dd>
                <dt>Online ISSN</dt>
                <dd><?php echo $row['online_issn'];?></dd>
                <dt>Email Address</dt>
                <dd><?php echo $row['email_address'];?></dd>
              </dl>

              <hr>
<?php 
$eic_query = query("SELECT * from user_journal_table uj join 
user_table u1 
on u1.user_id=uj.user_id
join journal_table j1 
on j1.journal_id=uj.journal_id
where j1.journal_id = '{$id}' and u1.user_role_id = '3'");
$row_eic = fetch_assoc($eic_query);
?>
              <dl class="dl-horizontal">
              <h5><strong style="color:#800000;">Principal Contact Person</strong> </h5>
                <dt>Name</dt>
                <dd><?php echo $row_eic['user_fname']." ".$row_eic['user_mname']." ".$row_eic['user_lname'];?></dd>
                <dt>Email Address</dt>
                <dd><?php echo $row_eic['user_email']?></dd>
                <dt>Contact Number</dt>
                <dd><?php echo $row_eic['user_contact']?></dd>
                <dt>Address</dt>
                <dd><?php echo $row_eic['user_address']?></dd>
              </dl>

              


            </div>


          </div>
        </div>        <!-- /.card-body -->

        <!-- <div class="card-footer">
          <a href="journal_view" type="button" class="btn btn-primary">View</a>
          <a href="" type="button" class="btn btn-primary">Archives</a>



        </div>        /.card-footer -->
      </div>      <!-- /.card -->
      














      

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


