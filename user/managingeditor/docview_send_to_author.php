<?php include("usernav.php");?>

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
    <div class="alert alert-danger  text-center" id="error_comment" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>You need to pass down a Comment</strong></h3> 
    </div>
        <?php 
    $research_query = query("SELECT * from research_file_table where research_id = '{$_GET['r_id']}' ORDER BY date_uploaded desc");
    if(row_count($research_query) > 1)
    {

    ?>

     <div class="card">
              <div class="card-header p-0">
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Latest Document</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Old Document </a></li>                
                </ul>
              </div><!-- /.card-header -->
                
              <div class="card-body">
                <div class="tab-content">
                 
                  <div class="tab-pane active" id="tab_1">


                    <?php
                  }
                  ?>
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
                  $query = query("SELECT  * FROM research_file_table where research_id = '{$research_id}' ORDER BY date_uploaded desc LIMIT 1");
                  while($row = fetch_assoc($query))
                  {
                    $filename = substr($row['research_file'], 0, strpos($row['research_file'], "."))
              ?>
<?php if(!empty($row['s_location']))
                    {
                    ?>
                    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#tab_9" data-toggle="tab">Manuscript File</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#tab_10" data-toggle="tab">Supplementary File</a>
  </li>

</ul>
               <div class="tab-content">
                 
                  <div class="tab-pane active" id="tab_9">
                  <?php
                  }
                  ?>
                     
                         <iframe src ="../../../upload_pdf_file/<?php echo $filename;?>.pdf" width='640' height='840' scrolling="no"allowfullscreen webkitallowfullscreen></iframe>
    <?php if(!empty($row['supplementary_file']))
                    {
                        $s2filename = substr($row['supplementary_file'], 0, strpos($row['supplementary_file'], "."))

                    ?>
                     </div>
                       <div class="tab-pane" id="tab_10">
                         <iframe src ="../../../upload_pdf_file/<?php echo $s2filename;?>.pdf" width='640' height='840' scrolling="no"allowfullscreen webkitallowfullscreen></iframe>
                       
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
            <h5><a href="download.php?path=../../../upload_original_file/<?php echo $row{'research_file'};?>" target="_blank">
            <?php echo $row{'research_file'};?></a></h5>
            </td>
             <td colspan="2"><h5><?php echo $row{'date_uploaded'};?></h5></td>
           </tr>
           </table>
           </div>
           
            <?php show_supplementary_file($row['supplementary_file'])?>
               
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
                           $query = query("SELECT * from line_number where research_id = '{$id}'");
                           if(row_count($query) > 0)
                          {

                            ?>
                        <div style="max-height:200px; overflow-y:scroll;">
                          <table class="table table-bordered" id="hello" name="hello">
                            <tr>
                              <th>#</th>
                              <th>Appraise(s)</th>
                            </tr>  
                            <?php show_appraises();?>
                                          
                          </table>
                  </div>
                  <?php
                }
                ?>
      
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

      <div class="card">
      <div class="card-body">



           


               
 
                <form method="POST">
                  <div class="form-group">
                    <label>Filter Comment</label>
                    <textarea class="form-control" rows="3" id="Comment" name="Comment" placeholder="Enter ..."><?php $comment_query = query("SELECT * from comment_table where research_id = '{$id}'");
                          
                           if(row_count($comment_query) > 0)
                          {
                          $row_comment = fetch_assoc($comment_query);
                          echo $row_comment['content'];
                          }
                           ?>
                             
                           </textarea>
                  </div>
            <div id="loader" style="display: none; text-align: center;">
             <img src="../../images/loading3.gif" width="50px" height="50px">
            </div>
            <button class="btn btn-block btn-success" id="send_to_author" name="send_to_author">Send it to Author</button>
               </form>

          
        </div>
      </div>
    </div>
  </div>


  <?php 
    $research_query = query("SELECT * from research_file_table where research_id = '{$_GET['r_id']}'");
    if(row_count($research_query) > 1)
    {

    ?>
  </div>     <!-- tab pane -->

<div class="tab-pane" id="tab_2">
            
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
                  $query2 = query("SELECT * from research_table join backup_author_table b on research_table.research_id=b.research_id where research_table.research_id = '{$research_id}'");
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

             <?php

               $id = $_GET['r_id'];
                           $query = query("SELECT * from line_number where research_id = '{$id}'");
                           if(row_count($query) > 0)
                          {

                            ?>
        <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title"><b>Old Appraises</b></h3>
        </div>
                        <div style="max-height:200px; overflow-y:scroll;">
                          <table class="table table-bordered" id="hello2" name="hello2">
                            <tr>
                              <th>#</th>
                              <th>Appraise(s)</th>
                            </tr>  
                            <?php show_appraises();?>
                                          
                          </table>

                        </div>
                  </div>
                  <?php
                }
                ?>
            


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



  
  </div>    <!-- tabconent -->     
</div>    <!-- card body --> 

</div> <!-- card -->     
<?php
  }
  ?>
  
  
  
</section>  


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <!-- /.APPRAISE MODAL  APPRAISE MODALAPPRAISE MODALAPPRAISE MODALAPPRAISE MODALAPPRAISE MODALAPPRAISE MODAL-->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Appraise Document for Specific Review</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


                <div class="row">
                <div class="col-sm-2">
                <div class="form-group">
                    <label for="exampleInputPassword1">Line #</label>
                    <input type="text" id="line_number" name="line_number" class="form-control" onkeyup="this.value=this.value.replace(/[^-0-9]/g, '')"  placeholder="#"  >
                    <span id="error_line_number" class="text-danger"></span>

                  </div>
                </div>

                <div class="col-sm-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Appraise</label>
                    <input type="text" id="Appraise" name="Appraise" class="form-control"  placeholder="......">
                     <span id="error_appraise" class="text-danger"></span>

                  </div>
                
                </div>

                </div>



            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"  name = "Add"
                    id = "Add" >Add Appraisal</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

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
<script>
  var count = 0 ;
   $("#Add").click(function(evt){
      evt.preventDefault();
       if($.trim($('#line_number').val()) == 0 )
        {
         error_line_number = 'Please enter the Line Number';
            $('#error_line_number').text(error_line_number);
         $('#line_number').css("border-color", "#cc0000")
        $('#line_number').css("background-color", "#ffff99")
        }
        else
        {
           error_line_number = '';
            $('#error_line_number').text(error_line_number);
          $('#line_number').css("border-color", "#ccc")
          $('#line_number').css("background-color", "#fff")
        }

        if($.trim($('#Appraise').val()) == 0 )
        {
         error_appraise = 'Please enter the Appropriate Comment';
            $('#error_appraise').text(error_appraise);
         $('#Appraise').css("border-color", "#cc0000")
        $('#Appraise').css("background-color", "#ffff99")
        }
        else
        {
           error_appraise = '';
            $('#error_appraise').text(error_appraise);
          $('#Appraise').css("border-color", "#ccc")
          $('#Appraise').css("background-color", "#fff")
        }
        
if(error_line_number == '' && error_appraise == '')
{
      count = count + 1;
      var Line_number = $("#line_number").val();
      var Appraise = $("#Appraise").val();
       var tr = "<tr id ='row"+count+"'>";
        tr += "<td class='a_line_number'>"+Line_number+"</td>";
         tr += "<td class='a_appraise'>"+Appraise+"</td>";
        tr += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-s remove'>REMOVE</button></td></tr>";
      $("#hello").append(tr);
       $("#line_number").val('');
       $("#Appraise").val('');  
       $("#Add").attr("data-dismiss", "modal");
 }
     
    });
    $(document).on('click', '.remove', function(){
        var delete_row = $(this).data("row");
        $("#"+delete_row).remove();
        count = count -1;
      });


</script>
<script>

$("#verdict").change(function(){
  var verdict = $("#verdict").val();
if(verdict == 0 )
{
  $("#Comment").val("Accepted by the Internal Reviewer");
  $("#accepted_with_revisions").attr("hidden", "true");
  $("#rejected").attr("hidden", "true");
  $("#accepted").removeAttr("hidden", "true");
  $("#Appraise_header").attr("hidden", "true");
  $("#hello").attr("hidden", "true");
  $('#hello td').remove();
}
else if (verdict == 1)
{
$("#Comment").val("Accepted with Revisions by the Internal Reviewer");
  $("#Appraise_header").removeAttr("hidden", "true");
  $("#hello").removeAttr("hidden", "true");
  $("#accepted_with_revisions").removeAttr("hidden", "true");
  $("#rejected").attr("hidden", "true");
  $("#accepted").attr("hidden", "true");
}
else
{
  $("#Comment").val("Rejected by the Internal Reviewer");
  $('#hello td').remove();
  $("#Appraise_header").attr("hidden", "true");
  $("#hello").attr("hidden", "true");
  $("#accepted_with_revisions").attr("hidden", "true");
  $("#rejected").removeAttr("hidden", "true");
  $("#accepted").attr("hidden", "true");
}
})


$(document).ready(function(){
      $("#rejected").click(function(e){
        e.preventDefault();
        var myFormData = new FormData();
        var a_appraise = [];
        var Comment = $("#Comment").val();
        var a_line_number = [];
        var r_id = $("#r_id").val();
        $('.a_appraise').each(function(){
         a_appraise.push($(this).text());
         });
         $('.a_line_number').each(function(){
          a_line_number.push($(this).text()); });
          myFormData.append('Comment', Comment);
          myFormData.append('r_id', r_id);
          myFormData.append('a_appraise', a_appraise);
          myFormData.append('a_line_number', a_line_number);
            $.ajax({
            url: 'reject.php',
            data: myFormData,
            processData: false, // important
            contentType: false, // important
            type: 'POST',
             beforeSend: function(data){
               $("#loader").show();
               $("#rejected").attr("hidden", "true");
              },  
            success: function(data){
                window.location.replace("home.php");
              }
                   });
            });
        

     
})

  $("#accepted_with_revisions").click(function(e){
  
        e.preventDefault();
        var myFormData = new FormData();
        var a_appraise = [];
        var Comment = $("#Comment").val();
        var a_line_number = [];
        var r_id = $("#r_id").val();
        $('.a_appraise').each(function(){
         a_appraise.push($(this).text());
         });
         $('.a_line_number').each(function(){
          a_line_number.push($(this).text()); });
          myFormData.append('Comment', Comment);
          myFormData.append('r_id', r_id);
          myFormData.append('a_appraise', a_appraise);
          myFormData.append('a_line_number', a_line_number);
            $.ajax({
            url: 'accepted_with_revisions.php',
            data: myFormData,
            processData: false, // important
            contentType: false, // important
            type: 'POST',
             beforeSend: function(data){
               $("#loader").show();
               $("#accepted_with_revisions").attr("hidden", "true");
              },  
            success: function(data){
                window.location.replace("home.php");
              }
                   });
            });


 $("#send_to_author").click(function(e){
  
        e.preventDefault();
         var Comment = $("#Comment").val();
         if($.trim($("#Comment").val()) == "")
         {

          $("#send_to_author").attr("hidden", "true");
          $("#loader").show();
     $("#loader").hide();
     $("#send_to_author").removeAttr("hidden", "true");
     $('#error_comment').fadeIn(500);  
    setTimeout(function(){
    $('#error_comment').hide(); 
  }, 10000);
         }
         else
         {
        var myFormData = new FormData();
        var r_id = $("#r_id").val();
          myFormData.append('remarks', Comment);
          myFormData.append('r_id', r_id);
            $.ajax({
            url: 'send_to_author.php',
            data: myFormData,
            processData: false, // important
            contentType: false, // important
            type: 'POST',
             beforeSend: function(data){
               $("#loader").show();
               $("#send_to_author").attr("hidden", "true");
              },  
            success: function(data){
            window.location.replace("home.php");
              }
                   });
          }
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
