<?php include("../usercomponents/usernav.php");?>

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <?php 
                    $research_sql = query("SELECT title, abstract from research_table where research_id  = '{$_GET['r_id']}'");
                    $row_data = fetch_assoc($research_sql);
                    ?>
            <h1><?php echo $row_data['title'];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
       
        <div class="alert alert-danger  text-center" id="error_size" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The file should be 8MB below</strong></h3> 
        </div>
      
</div>


<div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_file" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>You need to Upload the Manuscript File</strong></h3> 
        </div>
      
</div>

<div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_pages" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The Research File should contain 5 to 15 pages</strong></h3> 
        </div>
      
</div>



    <div class="card">
              <div class="card-header p-0">
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Document View</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Edit Document </a></li>                
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                 
                  <div class="tab-pane active" id="tab_1">

                  <div class="row">

                  <div class="col-md-8">
                  

                    <div class="card  card-default"> 
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
           
            <?php show_supplementary_file($row['s_filename']);}}?>
               
      </div>

                  </div>

                  <div class="col-md-4">

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
                              <th>Line Number#</th>
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


                  </div>





                  </div><!-- /.row -->







                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">

                    <?php 
                    $research_sql = query("SELECT title, abstract from research_table where research_id  = '{$id}'");
                    $row_data = fetch_assoc($research_sql);
                    ?>


                    <div class="card card-primary">                      
                      <!-- /.card-header -->
                      <div class="card-body">

                          <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" value="<?php echo $row_data['title'];?>">
                             <span id="error_title" class="text-danger"></span>
                          </div>

                          <div class="form-group">
                            <label>Abstract</label>
                          <span>          (</span>
                          <span id="wordcount" class="text-danger" ><?php echo strlen($row_data['abstract']);?></span>
                          <span>/350)</span>
                            <textarea type="text" class="form-control" rows="10" cols="50" id="Abstract" maxlength="350" ><?php echo $row_data['abstract'];?></textarea>
                             <span id="error_abstract" class="text-danger"></span>
                          </div>

                          <hr>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Author's</label>
                            <button type="button" data-toggle="modal" data-target="#add_author" data-uid="1" class="btn btn-secondary btn-md author_add" style="float: right;" >Add a New Author</button>
                          </div>                  

                          <div style="max-height:200px; overflow: scroll;" cellspacing="300px" id="author_table">
                                  <table class="table table-bordered" >
                                    <tr>
                                      <th style=" white-space:nowrap;">First Name</th>
                                        <th style=" white-space:nowrap;">Middle Name</th>
                                          <th style=" white-space:nowrap;">Last Name</th>
                                      <th>Email</th>
                                      <th>Affiliation</th>
                                       <th>Edit</th>
                                      <th>Remove</th>
                                    </tr>
                                     <?php   
                  $query2 = query("SELECT * from research_table  join authors_table on research_table.research_id=authors_table.research_id where research_table.research_id = '{$research_id}'");
                  $counter = 1;
                  while($row2 = fetch_assoc($query2))
                  {

                    ?>
                                    <tr>
                                      <td  style=" white-space:nowrap;" ><?php echo $row2['authors_first_name'];?></td>
                                      <td  style=" white-space:nowrap;"  ><?php echo $row2['authors_middle_name'];?></td>                              
                                      <td  style=" white-space:nowrap;"  ><?php echo $row2['authors_last_name'];?></td>
                                      <td  style=" white-space:nowrap;"  ><?php echo $row2['authors_email'];?></td>
                                      <td  style=" white-space:nowrap;" ><?php echo $row2['authors_affliation'];?></td>

                                      <?php if($counter != 1)
                                      {
                                      ?>
                                       <td><button type="button" data-toggle="modal" id="<?php echo $row2['authors_id'];?>" class="fa btn-success btn-md edit_author" >Edit</button></Td>
                                      <td><button class="fa fa-times btn-danger btn-block delete_author" id="<?php echo $row2['authors_id'];?>"></button></td>
                                      <?php
                                      }
                                      ?>
                                       
                                    </tr>
                                    <?php
                                    $counter += 1;
                                  }
                                  ?>
                               
                                    
                                                  
                                  </table>
                          </div>

                          <br>




                          <br>
                          <hr>
                          <br>


                          <div class="form-group">
                            <label for="exampleInputFile">Upload Manuscript Document</label>
                            <div class="input-group">
                                <input type="file" name="file" id="file">
                            </div>
                          </div>

                             <div class="form-group">
                            <label for="exampleInputFile">Upload Supplementary Document (Optional)</label>
                            <div class="input-group">
                                <input type="file" name="file2" id="file2">
                            </div>
                          </div>

                          <br>
                          <hr>
                        <div id="loader" style="display: none;
                        text-align: center;
                          ">
                            <img src="../../images/loading2.gif">
                        </div>
                        <a href="submit" id="submit"  class="btn btn-block btn-success">Submit</a>
                      

                      
                        
                      </div>
                      <!-- /.card-body -->
                    </div>








                  </div>                  <!-- /.tab-pane -->
            
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->




  
  
</section>  


    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->


  <div class="modal fade" id="add_author">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Author</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

          <form method="POST" id="insert_form">
              <div class="alert alert-dark alert-dismissible"  id="error_repeating_url"role="alert" hidden>
            <strong>Warning!</strong> The URL and URL title is already exsisting
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="alert alert-dark alert-dismissible"  id="error_updating_url"role="alert" hidden>
            <strong>Warning!</strong> The URL and URL title cannot be updated nothing changes
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
                    <div>
                  
                        <div class="form-group">
                        <label for="exampleInputEmail1">Author's First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                             <span id="error_first_name" class="text-danger"></span>
                        </div>
                      </div>


                      <div>
                           <div class="form-group">
                        <label for="exampleInputEmail1">Author's Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name">
                        </div>

                      </div>

                      <div>
                           <div class="form-group">
                        <label for="exampleInputEmail1">Author's Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                            <span id="error_last_name" class="text-danger"></span>
                        </div>
                      </div>

                      <div>
                           <div class="form-group">
                        <label for="exampleInputEmail1">Author's Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <span id="error_email" class="text-danger"></span>
                      </div>

                      <div>
                           <div class="form-group">
                        <label for="exampleInputEmail1">Author's Affiliation</label>
                            <input type="text" class="form-control" name="affliation" id="affliation" placeholder="Affiliation">
                            <input type="text" name="r_id" id="r_id" value="<?php echo $_GET['r_id'];?>" hidden="true">
                             <input type="hidden" name="a_id" id="a_id">
                            <span id="error_affliation" class="text-danger"></span>
                        </div>
                      </div>

           
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="insert_author" id="insert_author" value="Add Author" class="btn btn-primary">
            </div>
     
            
            </form>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



  <div class="modal fade" id="delete_author_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Author</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

          <form method="POST" id="delete_author_form">
                    <div>
                  
                        <div class="form-group">
                        <label for="exampleInputEmail1">Author's First Name</label>
                            <input type="text" class="form-control" name="first_name" id="delete_first_name" placeholder="First Name" disabled>
                             
                        </div>
                      </div>


                      <div>
                           <div class="form-group">
                        <label for="exampleInputEmail1">Author's Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" id="delete_middle_name" placeholder="Middle Name" disabled>
                        </div>

                      </div>

                      <div>
                           <div class="form-group">
                        <label for="exampleInputEmail1">Author's Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="delete_last_name" placeholder="Last Name" disabled>
                            
                        </div>
                      </div>

                      <div>
                           <div class="form-group">
                        <label for="exampleInputEmail1">Author's Email</label>
                            <input type="email" class="form-control" name="email" id="delete_email" placeholder="Email" disabled>
                        </div>
                        
                      </div>

                      <div>
                           <div class="form-group">
                        <label for="exampleInputEmail1">Author's Affiliation</label>
                            <input type="text" class="form-control" name="affliation" id="delete_affliation" placeholder="Affiliation" disabled>
                            <input type="text" name="r_id" id="r_id" value="<?php echo $_GET['r_id'];?>" hidden="true">
                             <input type="hidden" name="delete_a_id" id="delete_a_id">
                        </div>
                      </div>

           
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="delete_author" id="delete_author" value="Delete Author" class="btn btn-danger">
            </div>
     
            
            </form>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


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
<script type="text/javascript">
    $(document).on('click', '.edit_author', function(){
    var authors_id = $(this).attr("id");
    var r_id = $("#r_id").val();
    $.ajax({
      url:"fetch_author.php",
      method:"POST",
      data: {authors_id:authors_id, r_id:r_id},
      dataType: "json",
      success:function(data){
          $("#first_name").val(data.authors_first_name);
          $("#middle_name").val(data.authors_middle_name);
          $("#last_name").val(data.authors_last_name);
          $("#email").val(data.authors_email);
          $("#affliation").val(data.authors_affliation);
          $("#a_id").val(data.authors_id);
          $("#add_author").modal("show");  
          $("#insert_author").val("Edit Author");

          error_first_name = '';
            $('#error_first_name').text(error_first_name);
          $('#first_name').css("border-color", "#ccc")
          $('#first_name').css("background-color", "#fff")


          error_last_name = '';
                $('#error_last_name').text(error_last_name);
              $('#last_name').css("border-color", "#ccc")
              $('#last_name').css("background-color", "#fff")


              error_email = '';
                $('#error_email').text(error_email);
              $('#email').css("border-color", "#ccc")
              $('#email').css("background-color", "#fff")


              error_affliation = '';
                $('#error_affliation').text(error_affliation);
              $('#affliation').css("border-color", "#ccc")
              $('#affliation').css("background-color", "#fff")
      }
    })
  });


  $(document).on('click', '.author_add', function(){
    $("#insert_form")[0].reset();
    $("#a_id").val("");
    $("#insert_author").val("Add Author");
    error_first_name = '';
            $('#error_first_name').text(error_first_name);
          $('#first_name').css("border-color", "#ccc")
          $('#first_name').css("background-color", "#fff")


          error_last_name = '';
                $('#error_last_name').text(error_last_name);
              $('#last_name').css("border-color", "#ccc")
              $('#last_name').css("background-color", "#fff")


              error_email = '';
                $('#error_email').text(error_email);
              $('#email').css("border-color", "#ccc")
              $('#email').css("background-color", "#fff")


              error_affliation = '';
                $('#error_affliation').text(error_affliation);
              $('#affliation').css("border-color", "#ccc")
              $('#affliation').css("background-color", "#fff")
  })

  $("#insert_form").submit(function(event){
    event.preventDefault();
    if($.trim($('#first_name').val()) == 0 )
     {
         error_first_name = 'Please enter the author\'s first name';
          $('#error_first_name').text(error_first_name);
         $('#first_name').css("border-color", "#cc0000")
        $('#first_name').css("background-color", "#ffff99")
        }
        else
        {
           error_first_name = '';
            $('#error_first_name').text(error_first_name);
          $('#first_name').css("border-color", "#ccc")
          $('#first_name').css("background-color", "#fff")
        }



        if($.trim($('#last_name').val()) == 0 )
     {
         error_last_name = 'Please enter author\'s last name';
            $('#error_last_name').text(error_last_name);
         $('#last_name').css("border-color", "#cc0000")
        $('#last_name').css("background-color", "#ffff99")
        }
        else
        {
               error_last_name = '';
                $('#error_last_name').text(error_last_name);
              $('#last_name').css("border-color", "#ccc")
              $('#last_name').css("background-color", "#fff")
        }

    if($.trim($('#email').val()) == 0 )
     {
         error_email = 'Please enter author\'s email';
            $('#error_email').text(error_email);
         $('#email').css("border-color", "#cc0000")
        $('#email').css("background-color", "#ffff99")
        }
        else
        {
               error_email = '';
                $('#error_email').text(error_email);
              $('#email').css("border-color", "#ccc")
              $('#email').css("background-color", "#fff")
        }

         if($.trim($('#affliation').val()) == 0 )
     {
         error_affliation = 'Please enter author\'s affliation';
            $('#error_affliation').text(error_affliation);
         $('#affliation').css("border-color", "#cc0000")
        $('#affliation').css("background-color", "#ffff99")
        }
        else
        {
               error_affliation = '';
                $('#error_affliation').text(error_affliation);
              $('#affliation').css("border-color", "#ccc")
              $('#affliation').css("background-color", "#fff")
        }

        if(error_first_name == '' && error_last_name == '' && error_affliation == '' && error_email == '')
        {
          $.ajax({
            url:"insert_author.php",
            method:"POST",
            data: $("#insert_form").serialize(),
            success:function(data)
            { 
              $("#insert_form")[0].reset();
              $("#add_author").modal('hide');
              $("#author_table").html(data);
            }


          })
        }


  });


   $(document).on('click', '.delete_author', function(){
   var authors_id = $(this).attr("id");
   var r_id = $("#r_id").val();
    $.ajax({
      url:"fetch_author.php",
      method:"POST",
      data: {authors_id:authors_id, r_id:r_id},
      dataType: "json",
      success:function(data){
          $("#delete_first_name").val(data.authors_first_name);
          $("#delete_middle_name").val(data.authors_middle_name);
          $("#delete_last_name").val(data.authors_last_name);
          $("#delete_email").val(data.authors_email);
          $("#delete_affliation").val(data.authors_affliation);
          $("#delete_a_id").val(data.authors_id);
          $("#delete_author_modal").modal("show");  
      }
    })
  });


     $("#delete_author_form").submit(function(event){
    event.preventDefault();
       $.ajax({
            url:"delete_author.php",
            method:"POST",
            data: $("#delete_author_form").serialize(),
            success:function(data)
            { 
              $("#delete_author_modal").modal('hide');
              $("#author_table").html(data);
            }
          })
  })


$("#submit").click(function(event){
  event.preventDefault();
if($.trim($('#title').val()) == 0 )
  {
   error_title = 'Please Fill out the title';
   $('#error_title').text(error_title);
    $('#title').css("border-color", "#cc0000");
    $('#title').css("background-color", "#ffff99");
  }
  else
  {
   error_title = '';
   $('#error_title').text(error_title);
   $('#title').css("border-color", "#ccc");
   $('#title').css("background-color", "#fff");
  }

  if($.trim($('#Abstract').val()) == 0 )
  {
   error_abstract = 'Please Fill out the Abstract';
   $('#error_abstract').text(error_abstract);
    $('#Abstract').css("border-color", "#cc0000");
    $('#Abstract').css("background-color", "#ffff99");
  }
  else
  {
   error_abstract = '';
   $('#error_abstract').text(error_abstract);
   $('#Abstract').css("border-color", "#ccc");
   $('#Abstract').css("background-color", "#fff");
  }
 




   myfile = $("#file").val();
   if(myfile != "")
   {
         var ext = myfile.split('.').pop();
         if(ext == "docx")
        {
                  
                if(file.files[0].size > 8388608 )
                    {
                      $("#SAVE").attr("hidden", "true");
                     $('#error_size').fadeIn(500);  
                    setTimeout(function(){
                    $('#error_size').hide(); 
                  }, 10000);
                    }
                    else
                    {
                        myfile2 = $("#file2").val();
                       if(myfile2 != "")
                       {
                            var ext2 = myfile2.split('.').pop();
                            if(ext2 == "docx")
                            {
                                error_file = '';
                              $('#error_size').hide(); 

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
                           error_file = '';
                            $('#error_size').hide(); 
                       }
                   

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


   if(error_abstract == '' && error_title == '' && error_file == '')
   {
     var myFormData = new FormData();
     var abstract = $("#Abstract").val();
     var title = $("#title").val();
     var r_id = $("#r_id").val();
    myFormData.append('abstract', abstract);
    myFormData.append('title', title);
    myFormData.append('file', file.files[0]);
     myFormData.append('file2', file2.files[0]);
    myFormData.append('r_id', r_id);
    $.ajax({
            url: 'revision_submit_file.php',
            data: myFormData,
            processData: false, // important
            contentType: false, // important
            type: 'POST',  
            beforeSend:function(data)
            {
              $("#submit").attr("hidden", "true")
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
                    $("#loader").hide();
                   $("#submit").removeAttr("hidden", "true");
                      $('#error_pages').fadeIn(500);  
                    setTimeout(function(){
                    $('#error_pages').hide(); 
                  }, 10000);
                    alert(data);
                  }
          }


   })

  }

})

$('#Abstract').keyup(function(){
     var count = $('#Abstract').val().length;
     $('#wordcount').html(count);
})

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