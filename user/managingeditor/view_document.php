<?php include("usernav.php");?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">D Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
    <?php 
    $research_query = query("SELECT * from research_file_table where research_id = '{$_GET['r_id']}' ORDER BY date_uploaded desc");
    if(row_count($research_query) > 1)
    {
    }

    ?>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg col-md col-sm">
                    <div class="form-group">
                    <a class="btn btn-default bg-danger btn-block" href="" id="manuscriptbtn"><i class="fa fa-book"></i> Manuscript</a>
                    </div>
                  </div>

                  <?php                  
                  $research_query = query("SELECT * from research_file_table where research_id = '{$_GET['r_id']}' ORDER BY date_uploaded desc");
                  if(row_count($research_query) > 1)
                  {
                    echo "<div class='col-lg col-md col-sm' id='unrevised'>
                            <div class='form-group'>
                              <a class='btn btn-default btn-block' href='' id='unrevisedbtn' ><i class='fa fa-book-open'></i> Unrevised</a>
                            </div>
                          </div> ";  
                  }
                  ?>
                  


                  <div class="col-lg col-md col-sm">
                    <div class="form-group">
                      <a class="btn btn-default btn-block" href="" id="uploadedbtn" ><i class="fa fa-file-archive"></i> Files</a>
                    </div>
                  </div> 
                  <div class="col-lg col-md col-sm">
                    <div class="form-group">
                      <button type="button" 
                        class="btn btn-warning btn-block"
                        style="float:right;" 
                        data-toggle="modal" 
                        id="appraisal"
                        data-target="#modal-default" hidden>
                        <i class="fa fa-file-medical"></i> Add an Appraisal
                      </button>
                    </div>
                  </div>
                </div>   
              </div>

              

              <div class="tab-content">
              <input type="text" id="r_id" value="<?php echo $_GET['r_id'];?>" hidden="true">

              <?php if(isset($_GET['r_id']))
              {

                  $research_id = escape_string($_GET['r_id']);
                  $query = query("SELECT r_filename, s_filename, reference_code, DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, title, abstract from research_table   where research_table.research_id = '{$research_id}'");
                  while($row = fetch_assoc($query))
                  {
                   
                        $filename = substr($row['r_filename'], 0, strpos($row['r_filename'], "."));
                        $sfilename = substr($row['s_filename'], 0, strpos($row['s_filename'], "."));


                  
                       
              ?>

              



               <div class="tab-pane active" id="manuscript_tab">                             
                <iframe src ="../../uploads/pdf/<?php echo $filename;?>.pdf" width='100%' height='500' scrolling="no" allowfullscreen webkitallowfullscreen></iframe>
               </div>
               
           
               <div class="tab-pane" id="uploaded_tab">
             
                 
                  <div class="card-body">
                  <h5><b>Article Metadata</b></h5>
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-3">
                            <h6 class="text-secondary"><b>Title</b></h6>
                          </div>
                          <div class="col-9">
                            <h5><b><i><?php echo $row{'title'}; ?></i></b></h5>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-3">
                            <h6 class="text-secondary"><b>Abstract</b></h6>
                          </div>
                          <div class="col-9">
                            <h6><i><?php echo $row{'abstract'};?></i></h6>
                          </div>
                        </div>  
                        <hr>
                        <div class="row">
                          <div class="col-3">
                            <h6 class="text-secondary"><b>Author(s)</b></h6>
                          </div>
                          <div class="col-9">
                            <?php   
                            $query2 = query("SELECT * from research_table join authors_table on research_table.research_id=authors_table.research_id where research_table.research_id = '{$research_id}'");
                            while($row2 = fetch_assoc($query2))
                            {
                              echo "<h6><b><i>".$row2['authors_first_name']. " ".$row2['authors_middle_name']." ".$row2['authors_last_name']."</i></b></h6>";
                              echo "<h6><small>".$row2['authors_email']."</small></h6>";
                              echo "<h6><small>".$row2['authors_affliation']."</small></h6><hr>";
                            }

                            
                            ?>
                            
                          </div>
                        </div>                    
                      </div>
                    </div>


                  <h5><b>Manuscript File</b></h5>
                  <div style="max-height:200px; overflow: auto;">
                    <table class="table table-bordered table-condensed table-striped">
                              <tr>
                                <th>File(s)</th>                      
                                <th>Date Uploaded</th>                              
                              </tr>
                              <?php
                              $files = query("SELECT * from research_file_table where research_id = '{$research_id}' order by date_uploaded desc");
                              while($rowsup = fetch_assoc($files))
                              {

                              
                                echo "<tr>
                                        <td>
                                          <h5><a href='download.php?path=../../uploads/original/".$rowsup['research_file']."' target='_blank'>".$rowsup['research_file']."</a></h5>
                                        </td>
                                        <td>
                                          <h5>".$rowsup['date_uploaded']."</h5>
                                        </td>
                                      </tr>";
                                      
                              }
                              ?>
                    </table>
                  </div>
                  <br>
                  <h5><b>Supplementary File (Latest)</b></h5>
                  <iframe src ="../../uploads/pdf/<?php echo $sfilename;?>.pdf" width='100%' height='500' scrolling="no" allowfullscreen webkitallowfullscreen></iframe>        
               
                  <h5><b>Supplementary File(s)</b></h5>
                  <div style="max-height:200px; overflow: auto;">
                    <table class="table table-bordered table-condensed table-striped">
                              <tr>
                                <th>File(s)</th>                      
                                <th>Date Uploaded</th>
                              </tr>
                              
                              <?php
                              $files = query("SELECT * from research_file_table where research_id = '{$research_id}' order by date_uploaded desc");
                              while($rowsup = fetch_assoc($files))
                              {

                              
                                echo "<tr>
                                        <td>
                                          <h5><a href='download.php?path=../../uploads/original/".$rowsup['supplementary_file']."' target='_blank'>".$rowsup['supplementary_file']."</a></h5>
                                        </td>
                                        <td>
                                          <h5>".$rowsup['date_uploaded']."</h5>
                                        </td>
                                      </tr>";
                                      
                              }
                              ?>

                              
                    </table>
                  </div>
                  <br>
                  </div>   

                  
                
                       
                  

              
               
                </div>

                <?php
                    } //while <?php show_supplementary_file($row['s_filename'])
                } //isset r_id
                ?>

                <div class="tab-pane" id="unrevised_tab">
                <?php if(isset($_GET['r_id']))
                {

                    $research_id = escape_string($_GET['r_id']);
                    $query = query("SELECT  * FROM research_file_table where research_id = '{$research_id}' ORDER BY date_uploaded asc LIMIT 1");
                    while($row = fetch_assoc($query))
                    {
                      $filename = substr($row['research_file'], 0, strpos($row['research_file'], "."));
                      echo "<iframe src ='../../uploads/pdf/$filename.pdf' width='100%' height='500' scrolling='no' allowfullscreen webkitallowfullscreen></iframe>";

                      if(!empty($row['supplementary_file']))
                      {
                        $s2filename = substr($row['supplementary_file'], 0, strpos($row['supplementary_file'], "."));
                        echo "<iframe src ='../../uploads/pdf/$s2filename.pdf' width='100%' height='500' scrolling='no' allowfullscreen webkitallowfullscreen></iframe>";
                      }
                      
                    }
                    

                }
                ?>


               </div>

             

              </div>

              
                      

            </div>

          </div>
          
          
          <div class="col-md-4">
            <div class="card" id="appraisalcard" hidden>
              <div class="card-header with-border">
              <h3 class="card-title"><b>Appraisal(s)</b></h3>
              </div>
              <div class="card-body">
                <div style="max-height:200px; overflow-y:scroll; ">
                  <table class="table table-bordered" id="hello" name="hello">
                    <thead>
                    <tr>
                      <th>Line #</th>
                      <th>Appraise</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>  

                    </tbody>     
                  </table>
                </div>
              </div>
            </div>


            <div class="card">
              <div class="card-header with-border">
              <h3 class="card-title"><b>Guidelines to Check</b></h3>
              </div>
              <div class="card-body" style="max-height:200px;">
                <div class="form-group">
                  <div class="form-check" id="chcbox_plagiarism">                     
                    <input class="form-check-input" type="checkbox" id= "real_chcbox_plagiarism">
                    <label class="form-check-label"> <label>Passed on plagiarism <small> (11% below)</small></label>                            
                  </div>                    
                  <div class="form-check" id="chcbox_format" hidden>                     
                    <input class="form-check-input" type="checkbox" id="real_chcbox_format">
                    <label class="form-check-label"><label>Passed on the Journal Format</label></label>
                  </div>   
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header with-border">
              <h3 class="card-title"><b>Verdict</b></h3>
              </div>
              <div class="card-body">
                  <!--PLAGIARISM-->
                  <div id="receipt_plagiarism">
                    <div class="form-group">
                    <label>Upload the receipt for plagiarism</label>
                      <input  type="file" id="receipt_file">                    
                    </div> 
                  </div>

                  <!--OPTIONS-->
                  <div class="form-group" id="verdict" hidden>
                    <label>Options</label>
                    <select class="form-control" id="verdict_select" disabled >
                      <option value="0">Rejected</option>
                      <option value="1">Accepted with Revisions</option>
                    </select>
                  </div>

                  <!--COMMENTS-->
                  <div class="form-group">
                    <label id="Comment_header">Comments</label>
                    <textarea class="form-control" rows="3" id="Comment" name="Comment" placeholder="Enter ...">Rejected due to plagiarism</textarea>
                  </div>

                  <a href="" class="btn btn-block btn-danger" id="rejected">Rejected As It Is</a>
                  <div id="loader" style="display: none; text-align: center;">
                    <img src="../../images/loading3.gif" width="50px" height="50px">
                  </div>

                  <button class="btn btn-block btn-success" id="accepted" name="accepted" hidden>Accepted As It Is</button>
                  <button class="btn btn-block btn-success" id="accepted_with_revisions" name="accepted_with_revisions" hidden>Accepted with Revision</button>





              </div>
            </div>

            
          

          </div>
        </div>

    


        <div class="content-header">
            <div class="container">
               <div class="row mb-2">
                  <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">           
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
                     <ol class="breadcrumb float-sm-right">            
                     </ol>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
      

          
      
      
        

       
      </div><!-- /.container-fluid -->
    </div> <!-- /.content -->



</div>    <!-- /.content-wrapper -->

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

    $("#manuscriptbtn").click(function(evt){
      evt.preventDefault();
      $('#manuscript_tab').show();
      $('#unrevised_tab').hide();
      $('#uploaded_tab').hide();
      $("#manuscriptbtn").addClass("bg-danger");
      $("#unrevisedbtn").removeClass("bg-danger");
      $("#uploadedbtn").removeClass("bg-primary");
    });

    $("#unrevisedbtn").click(function(evt){
      evt.preventDefault();
      $('#unrevised_tab').show();
      $('#manuscript_tab').hide();
      $('#uploaded_tab').hide();
      $("#unrevisedbtn").addClass("bg-danger");
      $("#manuscriptbtn").removeClass("bg-danger");
      $("#uploadedbtn").removeClass("bg-primary");
    });

    $("#uploadedbtn").click(function(evt){
      evt.preventDefault();
      $('#uploaded_tab').show();
      $('#manuscript_tab').hide();
      $('#unrevised_tab').hide();
      $("#uploadedbtn").addClass("bg-primary");
      $("#manuscriptbtn").removeClass("bg-danger");
      $("#unrevisedbtn").removeClass("bg-danger");
    });








  var count = 1;
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
      var count = $('#hello td').length;
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
      //$("#accepted_with_revisions").removeAttr("hidden", "true");
     }
     else
       $("#Add").removeAttr("data-dismiss", "modal");
    });

    $(document).on('click', '.remove', function(){
        var delete_row = $(this).data("row");

        $("#"+delete_row).remove();
         // if($('#hello td').length == 0)
         // {
         //    $("#accepted_with_revisions").attr("hidden", "true");
         // }
         // else
         // {
         //  $("#accepted_with_revisions").removeAttr("hidden", "true");
         // }

      }); 
</script>
<script>
    


       $("#real_chcbox_plagiarism").change(function(){
      if($("#real_chcbox_plagiarism").is(':checked'))
       {
        $("#chcbox_format").removeAttr("hidden");
         $('#real_chcbox_format').prop('checked', false);
         $("#verdict").removeAttr("hidden");
         $("#receipt_plagiarism").attr("hidden", "true");
         $("#Appraisal").removeAttr("hidden");
         $("#verdict_select").removeAttr("disabled");
         $("#accepted_with_revisions").attr("hidden", "true");
         $("#verdict_select").val(0);
         $("#Comment").val('Rejected due to the format of the document');
         $("#Comment").removeAttr("hidden", "true");
         $("#Comment_header").removeAttr("hidden", "true");
       }
       else
       {
         $("#chcbox_format").attr("hidden", "true");
         $('#real_chcbox_format').prop('checked', false);
        $("#hello").attr("hidden", "true");
         $('#hello td').remove();
         $("#verdict").attr("hidden", "true");
         $("#receipt_plagiarism").removeAttr("hidden", "true");
         $("#appraisal").attr("hidden", "true");
         $("#appraisalcard").attr("hidden", "true");
         $("#rejected").removeAttr("hidden", "false");
         $("#accepted").attr("hidden", "true");
         $("#Comment").val('Rejected Due to plagiarism');
         $("#Comment").removeAttr("hidden", "true");
         $("#Comment_header").removeAttr("hidden", "true");
         $("#verdict_select").attr("disabled" ,"true");
          $("#accepted_with_revisions").attr("hidden", "true");
          $("#verdict_select").val(0); 
       }
       });



       $("#real_chcbox_format").change(function(){
      if($("#real_chcbox_plagiarism").is(':checked') && $("#real_chcbox_format").is(':checked'))
       {
        $("#hello").attr("hidden", "true");
        $("#verdict").attr("hidden", "true");
        $("#appraisal").attr("hidden", "true");
        $("#appraisalcard").attr("hidden", "true");
        $("#Comment").val("");
        $('#hello td').remove();
        $("#rejected").attr("hidden", "true");
        $("#accepted").removeAttr("hidden", "false");
        $("#accepted_with_revisions").attr("hidden", "true");

       }
       else
       {
         $("#chcbox_format").removeAttr("hidden");
         $('#real_chcbox_format').prop('checked', false);
         $("#verdict").removeAttr("hidden");
         $("#receipt_plagiarism").attr("hidden", "true");
         $("#rejected").removeAttr("hidden", "false");
         $("#accepted").attr("hidden", "true");
         $("#Comment").val('Rejected due to the format of the document');
         $("#Comment").removeAttr("hidden", "true");
         $("#Comment_header").removeAttr("hidden", "true");
         $("#accepted_with_revisions").attr("hidden", "true");
         $("#verdict_select").val(0)
       }
       });

$("#verdict_select").change(function(){
  if($("#verdict_select").val() == 0)
  {
      $("#accepted").attr("hidden", "true");
      $("#accepted_with_revisions").attr("hidden", "true");
      $("#Comment").val('Rejected due to the format of the document');
      $("#Comment").removeAttr("hidden", "true");
      $("#Comment_header").removeAttr("hidden", "true");
      $("#rejected").removeAttr("hidden", "true");
      $("#hello").attr("hidden", "true");
      $("#appraisal").attr("hidden", "true");

      $("#appraisalcard").attr("hidden", "true");
      $('#hello td').remove();



  }
  else if ($("#verdict_select").val() == 1)
  {
    var r_id = $("#r_id").val();
    $.ajax({
      url:'fetch_appraise.php',
      method:'POST',
      data:{r_id:r_id},
      success: function(data)
      {       
        $("#accepted").attr("hidden", "true");
        $("#accepted_with_revisions").removeAttr("hidden", "true");
        $("#Comment").val('Accepted with revisions by Managing Editor');
        $("#Comment").removeAttr("hidden", "true");
        $("#Comment_header").removeAttr("hidden", "true");
        $("#rejected").attr("hidden", "true");
        $("#hello").removeAttr("hidden", "true");
        $("#appraisal").removeAttr("hidden", "true");
        $("#appraisalcard").removeAttr("hidden", "true");
        $("#hello").html(data);
      }
    })
    
  }
  else 
  {
     $("#accepted").removeAttr("hidden", "true");
     $("#accepted_with_revisions").attr("hidden", "true");
     $("#Comment").val("");
     $("#rejected").attr("hidden", "true");
     $("#hello").attr("hidden", "true");
     $("#appraisal").attr("hidden", "true");
     $("#appraisalcard").attr("hidden", "true");
     $('#hello td').remove();
  }
})



$("#rejected").click(function(e){
    e.preventDefault();
if($("#receipt_file").val() != "")
{
  myfile = $("#receipt_file").val();
  var ext = myfile.split('.').pop();
  if(ext == "pdf")
  {
   

    $('#error_submission').hide();
   
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
          myFormData.append('reciept', receipt_file.files[0]);
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
  }
  else
  {
    $("#loader").show();
    $("#rejected").attr("hidden", "true");
     $("#loader").hide();
     $("#rejected").removeAttr("hidden", "true");
     $('#error_submission').fadeIn(500);  
    setTimeout(function(){
    $('#error_submission').hide(); 
  }, 10000);
   
  }
}
else
{
      
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
          myFormData.append('reciept', receipt_file.files[0]);
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
          }
            });

       $("#accepted_with_revisions").click(function(e){
        e.preventDefault();
         var count = $('#hello td').length;
         var Comment = $("#Comment").val();
        if(count == 0 && Comment == "")
        {
          $("#loader").show();
    $("#accepted_with_revisions").attr("hidden", "true");
     $("#loader").hide();
     $("#accepted_with_revisions").removeAttr("hidden", "true");
     $('#error_comment_appraise').fadeIn(500);  
    setTimeout(function(){
    $('#error_comment_appraise').hide(); 
  }, 10000);
        }
        else
        {
        var myFormData = new FormData();
        var a_appraise = [];
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