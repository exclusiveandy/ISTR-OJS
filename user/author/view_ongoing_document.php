<?php include("../usercomponents/usernav.php"); ?>

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
       <div class="card">
              <div class="card-header p-0">
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Latest Document</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Timeline </a></li>                
                </ul>
              </div><!-- /.card-header -->
                
              <div class="card-body">
                <div class="tab-content">
                 
                  <div class="tab-pane active" id="tab_1">
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
            <h8><a href="download.php?path=../../../upload_original_file/<?php echo $row{'r_filename'};?>" target="_blank">
            <?php echo $row{'r_filename'};?></a></h8>
            </td>
             <td colspan="2"><h8><?php echo $row{'date_submitted'};?></h8></td>
           </tr>
           </table>
           </div>
           
            <?php show_supplementary_file($row['s_filename']);?>
               
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


      </div>  

  </div> 
  </div>    <!-- tab pane -->

<div class="tab-pane" id="tab_2">
   <?php

                     $chk_proofread_query = query("SELECT MAX(r1.user_role_id) as counter from research_file_history_table as r1 
      JOIN research_table as r2
      ON r1.research_id=r2.research_id
      WHERE r1.research_id = '{$research_id}'");
    $row_counter = fetch_assoc($chk_proofread_query);
                  ?>

                  <div class="order-status">
     <ol class="progtrckr" style="width: 1145px">
                <?php if($row_counter['counter'] == "1")
                {
                ?>
<li class="progtrckr-done">Submitted</li>
<li class="progtrckr-todo">Managing Editor</li>
<li class="progtrckr-todo">Editor in Chief</li>
<li class="progtrckr-todo">Internal Reviewer</li>
<li class="progtrckr-todo">External Reviewer</li>
<li class="progtrckr-todo">Proofreader</li>
<li class="progtrckr-todo">Layout Editor</li>
<li class="progtrckr-todo">Publication Office</li>
        <?php
        }
  
   else if($row_counter['counter'] == "2")
                {

                ?>
<li class="progtrckr-done">Submitted</li>
<li class="progtrckr-done">Managing Editor</li>
<li class="progtrckr-todo">Editor in Chief</li>
<li class="progtrckr-todo">Internal Reviewer</li>
<li class="progtrckr-todo">External Reviewer</li>
<li class="progtrckr-todo">Proofreader</li>
<li class="progtrckr-todo">Layout Editor</li>
<li class="progtrckr-todo">Publication Office</li>
        <?php
        }
        
 else if($row_counter['counter'] == "3")
                {

                ?>
<li class="progtrckr-done">Submitted</li>
<li class="progtrckr-done">Managing Editor</li>
<li class="progtrckr-done">Editor in Chief</li>
<li class="progtrckr-todo">Internal Reviewer</li>
<li class="progtrckr-todo">External Reviewer</li>
<li class="progtrckr-todo">Proofreader</li>
<li class="progtrckr-todo">Layout Editor</li>
<li class="progtrckr-todo">Publication Office</li>
        <?php
        }
         else if($row_counter['counter'] == "4")
                {

                ?>
<li class="progtrckr-done">Submitted</li>
<li class="progtrckr-done">Managing Editor</li>
<li class="progtrckr-done">Editor in Chief</li>
<li class="progtrckr-done">Internal Reviewer</li>
<li class="progtrckr-todo">External Reviewer</li>
<li class="progtrckr-todo">Proofreader</li>
<li class="progtrckr-todo">Layout Editor</li>
<li class="progtrckr-todo">Publication Office</li>
        <?php
        }
         else if($row_counter['counter'] == "5")
                {

                ?>
<li class="progtrckr-done">Submitted</li>
<li class="progtrckr-done">Managing Editor</li>
<li class="progtrckr-done">Editor in Chief</li>
<li class="progtrckr-done">Internal Reviewer</li>
<li class="progtrckr-done">External Reviewer</li>
<li class="progtrckr-todo">Proofreader</li>
<li class="progtrckr-todo">Layout Editor</li>
<li class="progtrckr-todo">Publication Office</li>
        <?php
        }
         else if($row_counter['counter'] == "6")
                {

                ?>
<li class="progtrckr-done">Submitted</li>
<li class="progtrckr-done">Managing Editor</li>
<li class="progtrckr-done">Editor in Chief</li>
<li class="progtrckr-done">Internal Reviewer</li>
<li class="progtrckr-done">External Reviewer</li>
<li class="progtrckr-done">Proofreader</li>
<li class="progtrckr-todo">Layout Editor</li>
<li class="progtrckr-todo">Publication Office</li>
        <?php
        }
         else if($row_counter['counter'] == "7")
                {

                ?>
<li class="progtrckr-done">Submitted</li>
<li class="progtrckr-done">Managing Editor</li>
<li class="progtrckr-done">Editor in Chief</li>
<li class="progtrckr-done">Internal Reviewer</li>
<li class="progtrckr-done">External Reviewer</li>
<li class="progtrckr-done">Proofreader</li>
<li class="progtrckr-done">Layout Editor</li>
<li class="progtrckr-todo">Publication Office</li>
        <?php
        }

         else
                {

                ?>
<li class="progtrckr-done">Submitted</li>
<li class="progtrckr-done">Managing Editor</li>
<li class="progtrckr-done">Editor in Chief</li>
<li class="progtrckr-done">Internal Reviewer</li>
<li class="progtrckr-done">External Reviewer</li>
<li class="progtrckr-done">Proofreader</li>
<li class="progtrckr-done">Layout Editor</li>
<li class="progtrckr-todo">Publication Office</li>
        <?php
        }
        ?>

</ol>
</div>
</div>
</div>
</section>  


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <footer class="main-footer">

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
