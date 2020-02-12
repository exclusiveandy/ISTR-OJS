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
      <div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_submission" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The system is only accepting Word File(.docx)</strong></h3> 
        </div>
      
</div>

<div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_size" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The file should be 8mb below</strong></h3> 
        </div>
      
</div>


<div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_file" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>You need to Upload the File</strong></h3> 
        </div>
      
</div>
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
            









      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title"><b>Timeline</b></h3>
        </div>
        <div class="card-body" style="max-height:200px; overflow-y:scroll;">
               <ul class="timeline">
               <!-- to be for looped-->
                   <!-- to be for looped-->
                <?php
               $id = $_GET['r_id']; 
                $sql = query("SELECT Type,   DATE_FORMAT(timeline_date, \"%M\") as month, DATE_FORMAT(timeline_date, \"%d\") as day, timeline_date as t1, DATE_FORMAT(timeline_date, \"%Y\") as year,  DATE_FORMAT(timeline_date, \"%M %d %Y %r\") as timeline_date, Remarks from timeline_table  as  t1 join research_table as r2 on  t1.document_id=r2.research_id  where r2.research_id='{$id}' order by t1 desc");
                while($row = fetch_assoc($sql))
                {


              
                ?>

                  <li>
                    <i class="fa fa-envelope bg-blue" ></i>
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
                           $comment_query = query("SELECT * from comment_table where research_id = '{$id}' order by date_uploaded desc");
                          
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
      
<!-- <div class="card">
        <div class="card-header with-border">
        <h3 class="card-title"><b>Pointers to Check</b></h3>
        </div>
        <div class="card-body" style="max-height:200px;">
                                  <div class="form-group">

                    <div class="form-check" style="text-align: center;">                     
                      <input class="form-check-input" type="checkbox" id="chckbox_proofread" value="option1">
                      <label class="form-check-label"> <label>Passed in Proofreading</label></label>
                    </div> 
                  </div>

        </div>
      </div> -->
      
      

      <div class="card">
       <!--  <div class="card-header" id="Appraise_header" >
          <h3 style="float:left" >Appraise</h3>
            <button type="button" 
                    class="btn btn-warning"
                    style="float:right;" 
                    data-toggle="modal" 
                    id="Appraisal"
                    data-target="#modal-default">
                    Add an Appraise
            </button>
                
        </div>
        <div class="card-body">



                  <div style="max-height:200px; overflow-y:scroll;">
                          <table class="table table-bordered" id="hello" name="hello" >
                            <tr>
                              <th>#</th>
                              <th>Appraise</th>
                              <th>Action</th>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                               
                            </tr>  
                            
                                          
                          </table>
                  </div> -->

       


                    <form method="POST" enctype = "multipart/form-data">
                      <div class="form-group">
                    <label>Upload the Layout Document</label>
                    <input type="file" class="form-control" id="file" name="file">
                  </div>
<!--                  <div class="form-group">
                    <label>Verdict</label>
                    <select class="form-control">
                      <option>Appraise Document</option>
                      <option>Rejected with Major Revisions</option>
                      <option>Rejected with Minor Revisions</option>
                    </select>
                  </div> -->

                  <div class="form-group">
                    <label>Comments</label>
                    <textarea class="form-control" rows="3" id="Comment" name="Comment" placeholder="Enter your remarks here for timeline">Submitted the Layout of the Document</textarea>
                  </div>
          
            
          
                <div id="loader" style="display: none; text-align: center;">
             <img src="../../images/loading3.gif" width="50px" height="50px">
            </div>
           <button class="btn btn-block btn-success" type="" id="accepted" name="accepted">Submit</button>
                </form>
          
        </div>
      </div>




    </div>
  </div>
  
  
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


  $("#chckbox_proofread").change(function(){
   if($("#chckbox_proofread").is(':checked'))
   {
      $("#Appraise_header").attr("hidden", "true");
      $("#hello").attr("hidden", "false");
      $('#hello td').remove();
      $("#Comment").val("Passed on Proofreading"); 
      $("#accepted").removeAttr("hidden", "true");
      $("#accepted_with_revisions").attr("hidden", "true")

   }
   else
   {
     $("#Appraise_header").removeAttr("hidden", "true");
     $("#hello").removeAttr("hidden", "false");
     $("#Comment").val("Accepted with Revision by the Proofreader"); 
     $("#accepted").attr("hidden", "true");
      $("#accepted_with_revisions").removeAttr("hidden", "true")
   }
  });

      $("#accepted").click(function(event){
       event.preventDefault();
  myfile = $("#file").val();
   if(myfile != "")
   {
         var ext = myfile.split('.').pop();
         if(ext == "docx")
        {
          if(file.files[0].size > 8388608 )
              {
               $('#error_size').fadeIn(500);  
              setTimeout(function(){
              $('#error_size').hide(); 
            }, 10000);
              }
        else
         {
            error_file = '';
          $('#error_submission').hide();
           $('#error_size').hide(); 
         }
        }
        else
        {
           $('#error_submission').fadeIn(500);  
          setTimeout(function(){
          $('#error_submission').hide(); 
        }, 10000);
        }
   }
   else
   {
      $('#error_file').fadeIn(500);  
          setTimeout(function(){
          $('#error_file').hide(); 
        }, 5000);
   }

    if(error_file == '')
   {

     var myFormData = new FormData();
    var r_id = $("#r_id").val();
     var Comment  = $("#Comment").val();

   
    myFormData.append('file', file.files[0]);
    myFormData.append('r_id', r_id);
    myFormData.append('Comment', Comment);
     $.ajax({
            url: 'submit_file.php',
            data: myFormData,
            processData: false, // important
            contentType: false, // important
            type: 'POST',  
            beforeSend:function(data)
            {
              $("#accepted").attr("hidden", "true")
              $("#loader").show();              
            },
            success: function(data)
          { 
            if(data == "Success")
                  {

                    $(window).attr('location', 'home.php');    
                  }
                  else
                  {
                    alert(data);
                     $("#loader").hide();
                   $("#accepted").removeAttr("hidden", "true");
                  }
          }
   })
  }
     })

</script>
<script>
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