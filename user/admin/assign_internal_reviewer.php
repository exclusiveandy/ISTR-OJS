<?php include("header.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Document</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
  <div class="row">
  
    <div class="col col-sm-12 col-md-8 col-lg-8">
       
      
      <div class="card  card-primary">
          <div class="card-header with-border">
            <h3 class="card-title"><b>Document View</b></h3>
          </div>


          <div class="card-body">
            <input type"text" id="r_id" value="<?php echo $_GET['r_id'];?>" hidden="true">
            <dl class="dl-horizontal">
              <?php if(isset($_GET['r_id']))
              {

                  $research_id = escape_string($_GET['r_id']);
                  $query = query("SELECT r_filename, s_filename, DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, title, abstract from research_table   where research_table.research_id = '{$research_id}'");
                  while($row = fetch_assoc($query))
                  {
                   
              ?>
                      
                         <iframe src ="../../../upload_pdf_file/<?php echo $row['r_filename'];?>.pdf" width='690' height='840' scrolling="no"allowfullscreen webkitallowfullscreen></iframe>

              </dl>
          </div>


          <div class="card-footer with-border">

          </div>
      </div>


      <div class="card  card-primary">
        <div class="card-header with-border">
        
        <h3 class="card-title"><b>Uploaded Files  </b></h3>
        </div>
        <div class="card-body">
          <h5><b>Manuscript File </b></h5>
          <table class="table table-bordered table-condensed table-striped">
                    <tr><th>Original File</th>
              <th>Numbered Line Generated File</th>
              <th>Date Uploaded</th>
              <th></th>
            </tr>
            <tr>
            <td>
            <h5><a href="download.php?path=../../../upload_original_file/<?php echo $row{'r_filename'};?>" target="_blank">
            <?php echo $row{'r_filename'};?></a></h5>
            </td>
            <td><h5><h5><a href="download.php?path=../../../upload_numbered_line/(Number_Line)<?php echo $row{'r_filename'};?>" target="_blank">(Number_Line)<?php echo $row{'r_filename'};?></a></h5></td>
             <td colspan="2"><h5><?php echo $row{'date_submitted'};?></h5></td>
           </tr>
           </table>
           </div>
           
            <?php show_supplementary_file($row['s_filename'])?>
               
      </div>




    </div>
    <div class="col col-lg-4 col-md-4 col-sm-12">


        
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Article Metadata</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="accordion">
                  <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          Title
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                      <div class="card-body">
                        <?php echo $row{'title'}; ?>
                      </div>
                    </div>
                  </div>
                  <div class="card card-danger">
                    <div class="card-header">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                          Abstract
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="card-body">
                        <?php echo $row{'abstract'};  }}?>
                      </div>
                    </div>
                  </div>
                  <div class="card card-warning">
                    <div class="card-header">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#authorcollapse">
                          Author(s) and Affliation
                        </a>
                      </h4>
                    </div>
                    <div id="authorcollapse" class="panel-collapse collapse">
                      <div class="card-body">
                        <?php   
                  $query2 = query("SELECT * from research_table  join authors_table on research_table.research_id=authors_table.research_id where research_table.research_id = '{$research_id}'");
                  while($row2 = fetch_assoc($query2))
                  {
                    echo "Name: ".$row2['authors_name'];
                    echo '<br>';
                    echo "Affliation: ".$row2['authors_affliation'];
                    echo '<br>';
                    echo '<br>';
                  }
                    ?>
                    
                      </div>
                    </div>
                  </div>
       
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->





      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title"><b>Timeline</b></h3>
        </div>
        <div class="card-body" style="max-height:200px; overflow-y:scroll;">
               <ul class="timeline">
               <!-- to be for looped-->
                  <?php
               $id = $_GET['r_id']; 
                $sql = query("SELECT Type, DATE_FORMAT(timeline_date, \"%M %d %Y %r\") as timeline_date, Remarks from timeline_table  as  t1 join research_table as r2 on  t1.document_id=r2.research_id  where r2.research_id='{$id}'");
                while($row = fetch_assoc($sql))
                {


                ?>
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i><small><?php echo $row['timeline_date'];?> </small></span>
                      <h4 class="timeline-header"><small><b><a href="#"><?php echo $row['Type'];?></a></b></small></h4>
                      <div class="timeline-body">
                        <?php echo $row['Remarks'];?>
                      </div>  
                    </div>
                  </li>
                  <?php 
                }
                ?>
                </ul>

        </div>
      </div>
      <div class="modal-header">
              <h4 class="modal-title">Assign an Internal Reviewer</h4>
              
            </div>

            <form method="POST">
              
            <div class="modal-body">
               
                  <div class="form-group">
                    <label>Internal Reviewers</label>

                    <select class="form-control" name="USER">
                    <?php 
                        display_internal_reviewer();
                    ?>
                    </select>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <input type="submit" class="btn btn-primary" name="Submit">
            </div>

            </form>
      
      <?php

      if(isset($_POST['Submit']))
      {
          $id = $_GET['r_id'];
      date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
        $u_id = escape_string($_POST['USER']);
        $r_id = escape_String($_GET['r_id']);
        $sql =  query("INSERT INTO reviewer_table(user_id, research_id) VALUES ('{$u_id}','{$r_id}')");
        $sql1 = query("UPDATE research_table SET status = 'On Internal Reviewer', user_role_id = '4' where research_id = '{$r_id}' ");
        $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Being Processed by an Internal Reviewer', '{$date}')");        
        confirm($insert_timeline);
         confirm($sql);
        confirm($sql1);   
     $email = query("SELECT user_email as email from user_table where user_id = '{$u_id}'");
     confirm($email);
     $row = fetch_assoc($email);
     $u_email = $row['email'];
      $subject2 = "Polytechnic University of The philippines(Online Journal System)";
      $msg2 = "There is a  Document that is waiting for your verdict on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/internalreviewer/view_document.php?r_id=$id\">Link Here</a>";
      send_email($u_email, $subject2, $msg2);
      redirect("home.php");
      }
      ?>




    </div>
  </div>
  
  
</section>  


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <!-- /.APPRAISE MODAL  APPRAISE MODALAPPRAISE MODALAPPRAISE MODALAPPRAISE MODALAPPRAISE MODALAPPRAISE MODAL-->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-beta.1
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
