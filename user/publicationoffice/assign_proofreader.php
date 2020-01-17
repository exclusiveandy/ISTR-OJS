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
                  $query = query("SELECT r_filename, s_filename, reference_code, DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, title, abstract from research_table   where research_table.research_id = '{$research_id}'");
                  while($row = fetch_assoc($query))
                  {
                   
                        $filename = substr($row['r_filename'], 0, strpos($row['r_filename'], "."))
                       
              ?>

                    <?php if(!empty($row['s_filename']))
                    {
                    ?>
                    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#tab_7" data-toggle="tab">Manuscript File</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#tab_8" data-toggle="tab">Supplementary File</a>
  </li>

</ul>
               <div class="tab-content">
                 
                  <div class="tab-pane active" id="tab_7">
                  <?php
                  }
                  ?>
                   
                        
                         <iframe src ="../../../upload_pdf_file/<?php echo $filename;?>.pdf" width='640' height='840' scrolling="no"allowfullscreen webkitallowfullscreen></iframe>
                       


                      
                    
                     <?php if(!empty($row['s_filename']))
                    {
                        $sfilename = substr($row['s_filename'], 0, strpos($row['s_filename'], "."))
                    ?>
                     </div>
                       <div class="tab-pane" id="tab_8">
                         <p><iframe src ="../../../upload_pdf_file/<?php echo $sfilename;?>.pdf" width='640' height='840' scrolling="no"allowfullscreen webkitallowfullscreen></iframe>
                       </p>
                       </div>
                
                </div>
                <?php
              }?>

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
              
              <th>Date Uploaded</th>
              <th></th>
            </tr>
            <tr>
            <td>
            <h5><a href="download.php?path=../../../upload_original_file/<?php echo $row{'r_filename'};?>" target="_blank">
            <?php echo $row{'r_filename'};?></a></h5>
            </td>
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
                  $query2 = query("SELECT * from research_table join authors_table on research_table.research_id=authors_table.research_id where research_table.research_id = '{$research_id}'");
                  while($row2 = fetch_assoc($query2))
                  {
                    echo "Name: ".$row2['authors_first_name']. " ".$row2['authors_middle_name']." ".$row2['authors_last_name'];
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
                $sql = query("SELECT Type,   DATE_FORMAT(timeline_date, \"%M\") as month, DATE_FORMAT(timeline_date, \"%d\") as day, timeline_date as t1, DATE_FORMAT(timeline_date, \"%Y\") as year,  DATE_FORMAT(timeline_date, \"%M %d %Y %r\") as timeline_date, Remarks from timeline_table  as  t1 join research_table as r2 on  t1.document_id=r2.research_id  where r2.research_id='{$id}' order by t1 desc");
                while($row = fetch_assoc($sql))
                {


              
                ?>
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>
                    <div class="timeline-item" style="width: 250px">
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

      <?php
      $comment_query = query("SELECT * from comment_table where research_id = '{$id}'");
                          
                           if(row_count($comment_query) > 0)
                          {
                            $row_comment = fetch_assoc($comment_query);
                            ?>
                               <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title"><b>Comment</b></h3>
        </div>
          <div class="card-body">
                          <div style="max-height:200px;">
                          <ul class="timeline">
               <!-- to be for looped-->
              
                  <li>
                    <i class="fa fas fa-comments"></i>
                    <div class="timeline-item" style="width: 250px">
                      <div class="timeline-body">
                        <?php echo $row_comment['content'];?>
                      </div>  
                    </div>
                    </div>
                  </li>
               
                     
                </ul> 
                   </div>       

                  
             </div>
            
              
     <?php
                }
                ?>



      <?php
    $query = query("SELECT u1.user_id, CONCAT(user_fname, \" \", user_mname, \" \", user_lname) as fullname, Expertise from user_table u1 where user_role_id = 6");
    confirm($query);
    if(row_count($query) > 0)
  {
?>

        <?php
      $chk_proofreader =  query("SELECT * FROM proofreader_table r
      join user_table u1 
      on r.user_id=u1.user_id 
      join user_role_table u2
      on u1.user_role_id=u2.user_role_id
      WHERE research_id = '{$_GET['r_id']}' and u2.user_role_name = \"Proofreader\" ");
      if(row_count($chk_proofreader) == 0)
      {
        ?>
      <div class="modal-header">
              <h4 class="modal-title">Assign a Proofreader</h4>
              
            </div>

            <form method="POST">
              
            <div class="modal-body">
               
                  <div class="form-group">
                    <label>Proofreaders</label>

                    <select class="form-control" name="USER">
                    <?php 
                        $query = query("SELECT  u1.user_id, CONCAT(user_fname, \" \", user_mname, \" \", user_lname) as fullname from user_table u1 where user_role_id = 6");
                        confirm($query);
                        while($row_query = fetch_assoc($query))
                        {
                    ?>

                    <option value="<?php echo $row_query['user_id'];?>"><?php echo $row_query['fullname'];?></option>

                    <?php
                      }
                    ?>
                    </select>
                  </div>

                    <div class="form-group">
                    <label id="Comment_header">Comments</label>
                    <textarea class="form-control" rows="3" id="Comment" name="Comment" placeholder="Enter ..."></textarea>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <input type="submit" class="btn btn-primary" name="Submit">
            </div>

            </form>

        <?php
      }
      else
      {
      ?>
      <div class="modal-header">
              <h4 class="modal-title">Send to the Assigned Proofreader</h4>
              
            </div>

            <form method="POST">
              
            <div class="modal-body">
               
                  <div class="form-group">
                    <label>External Reviewer</label>

                    <select class="form-control" name="USER">
                  <?php 
                        $query = query("SELECT u1.user_id, CONCAT(user_fname, \" \", user_mname, \" \", user_lname) as fullname, Expertise FROM proofreader_table r 
      join user_table u1 
      on r.user_id=u1.user_id 
      join user_role_table u2
      on u1.user_role_id=u2.user_role_id
      WHERE research_id = '{$_GET['r_id']}' and u2.user_role_name = \"Proofreader\"");
                        while($row_query = fetch_assoc($query))
                        {
                    ?>

                    <option value="<?php echo $row_query['user_id'];?>"><?php echo $row_query['fullname'];?></option>

                    <?php
                      }
                    ?>
                    </select>
                  </div>

            </div>

              <div class="form-group">
                    <label id="Comment_header">Comments</label>
                    <textarea class="form-control" rows="3" id="Comment" name="Comment" placeholder="Enter ..."></textarea>
                  </div>


            <div class="modal-footer justify-content-between">
              <input type="submit" class="btn btn-primary" name="Submit">
            </div>

            </form>

      <?php
      }
    }
    else
    {
      ?>
           <div class="modal-header">
              <h4 class="modal-title">There is no currently External Reviewer for the journal. <br> Kindly contact the admin</h4>
         </div>
     <?php
     }
     ?> 
      <?php

      if(isset($_POST['Submit']))
      {
          $id = $_GET['r_id'];
      date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
        $u_id = escape_string($_POST['USER']);
        $r_id = escape_String($_GET['r_id']);
     $chk_external_reviewer =  query("SELECT * FROM proofreader_table r 
      join user_table u1 
      on r.user_id=u1.user_id 
      join user_role_table u2
      on u1.user_role_id=u2.user_role_id
      WHERE research_id = '{$_GET['r_id']}' and u2.user_role_name = \"Proofreader\" ");
      if(row_count($chk_external_reviewer) == 0)
      {
          $date_expired = date("Y-m-d H:i:s", strtotime($date. ' + 3 days'));
          $date_expired;
          $sql =  query("INSERT INTO proofreader_table(user_id, research_id, date_uploaded, date_expired) VALUES ('{$u_id}','{$r_id}', '{$date}', '{$date_expired}')");
      }

      if(!empty($_POST['Comment']))
      {
        $Remarks = $_POST['Comment'];
         $Insert_comment = query("INSERT INTO comment_table(content, date_uploaded, research_id) VALUES('{$Remarks}','{$date}', '{$r_id}')");
      }




        $sql1 = query("UPDATE research_table SET status = 'On Proofreader', user_role_id = '6' where research_id = '{$r_id}' ");
        $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Send to the Proofreader', '{$date}')");      
    $insert_timeline2 = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Being Processed by the Publication Office', '{$date}')");        
        confirm($insert_timeline);
         confirm($sql);
        confirm($sql1);   
     $email = query("SELECT user_id ,user_email as email from user_table where user_id = '{$u_id}'");
     confirm($email);
     $row = fetch_assoc($email);
     $u_email = $row['email'];
     $user_id = $row['user_id'];
      $subject2 = "Polytechnic University of The philippines(Online Journal System)";
      $msg2 = "There is a  Document that is waiting for your verdict on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/internalreviewer/view_document.php?r_id=$id\">Link Here</a>";
      //send_email($u_email, $subject2, $msg2);
      $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
      $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];  
      $message = "There is an article entitled:".$title." that you need to review";
      $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_id}', 'review_er', '{$r_id}')");

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
