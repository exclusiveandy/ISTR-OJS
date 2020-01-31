<!-- Navbar -->
  <?php
    include("../usercomponents/usernav.php"); 
    validate();
  ?>
<style>
  .loading-bar{
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100;
    height: 100;
    background-image: url('../../images/loading.gif');
    background-position: 50% 50%;
    background-color: rgba(255,255,255,0.8);
  }
  body.loading{
    overflow: hidden;

  }
  body.loading .loading-bar{
    display: block;
  }

</style>
  <!-- Main Sidebar Container -->
 
  <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->

  
   
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Submission of Document</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Submission of Documents</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div id="message">
    <div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_terms_conditions" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>Please kindly read the Terms and Conditions</strong></h3> 
        </div>
      
</div>

<div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_pages" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The Research File should contain 5 to 15 pages</strong></h3> 
        </div>
      
</div>

<div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_size" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The file should be 8MB below</strong></h3> 
        </div>
      
</div>

  <div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_submission" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The system is only accepting Word File(.docx)</strong></h3> 
        </div>
      
</div>
<div style="padding: 5px;">
       
        <div class="alert alert-success  text-center" id="success_submission" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>Successful Submission. Please wait for redirection</strong></h3>  
        </div>
      
</div>

        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3" style="float: right;">Submit Document</h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                                
                  <div class="tab-pane active" id="tab_0" >  
    
        <br>
        <ol>
                  <li>Only manuscripts that fall within the focus and scope of the Journal will be considered.</li>
                  <br>
                  <li>Manuscripts should be divided into the following sections (in this order):</li>
                  <br>
                    <ul>
                      <li><p  class="text-danger">Title Page</p></li>
                      <p>The title page should provide the title of the article, list the full names and institutional affiliation of all authors and indicate the corresponding author.</p>
                      
                      <li><p  class="text-danger">Abstract</p></li>
                      <p>The Abstract of the manuscript should not exceed 350 words and must reflect the following parts: background or the context and purpose of the study; results or the main findings; conclusions ora brief summary and potential implications. Minimize the use of abbreviations and do not cite references in the abstract.</p>
                      
                      <li><p  class="text-danger">Keyword</p></li>
                      <p>Three to ten keywords representing the main content of the article</p>

                      <li><p  class="text-danger">Introduction</p></li>
                      <p>The introduction should be written in a way that is understandable to researchers without specialist knowledge in that area and must clearly state (and if helpful, illustrate) the background to the research and its aims. The section should end with a brief statement of what is being reported in the article.
                      Standard chemical symbols and abbreviations may be used in the text, but full term should be given when first mentioned. Units of measurements should be spelled out except when preceded by a numeral. If no-metric measurement units are used the metric equivalent should be mentioned. The complete scientific name of every organism must be cited when it is first mentioned in the text. The generic name may be abbreviated thereafter, except when there are references to other genera with the same initial. The use of common names must be accompanied by the correct scientific name on first use.</p>

                      <li><p  class="text-danger">Methodology</p></li>
                      <p>This section should include the design of the study, the type of materials involved, a clear description of all comparisons, and the type of analysis used, to enable replication. For studies involving human participants, a statement detailing ethical approval and consent should be included.</p>


                      <li><p  class="text-danger">Results & Discussion</p></li>
                      <p>The results and discussion may be combined into a single section or presented separately. This section may also be broken into subsections with short, informative headings.</p>

                      <li><p  class="text-danger">Conclusions</p></li>
                      <p>This should state clearly the main conclusions of the research and give a clear explanation of their importance and relevance. Summary illustrations may be included.</p>

                      <li><p  class="text-danger">Recommendations</p></li>
                      <p>(if any)</p>

                      <li><p  class="text-danger">Acknowledgements</p></li>
                      <p>Please acknowledge anyone who contributed towards the article by making substantial contribution to conceptions, design, acquisition of data, or analysis and interpretation of data, or who was involved in drafting the manuscript or revising it critically for important intellectual content, but who does not meet the criteria for authorship. Please also include the source(s) of funding for each author, and for the manuscript preparation. Authors must describe the role of the funding body, if any, in design, in the collection, analysis and interpretation of data; in the writing of the manuscript; and in the decision to submit the manuscript for publication. Please also acknowledge anyone who contributed materials essential for the study. If a language editor has made significant revision of the manuscript, we recommend that you acknowledge the editor by name, where possible. Authors should obtain permission to acknowledge from all those mentioned in the Acknowledgements section.</p>

                      <li><p  class="text-danger">References</p></li>
                      <p>References cited in the text should be presented according to the APA (American Psychological Association) Style Manual, latest edition. The list of References should be given at the end of the paper, immediately following the section on acknowledgement, if any.</p>
                      
                      
                    </ul>
                  
                  <li>In preparing illustration and figures, ensure that each figure includes a single illustration and should fit on a single page in portrait format. If a figure consists of separate parts, it is important that a single composite illustration file be submitted which contains all parts of the figure. The following file formats can be accepted: PDF, TIFF, PNG, JPEG or BMP.Note that it is the responsibility of the author(s) to obtain permission from the copyright holder to reproduce figures or tables that have previously been published elsewhere.</li>
                  <br>
                  <li>Proofs will be sent by email to the corresponding author and are expected to proofread the article carefully. The corrected proof should be received by the administration within two working days.</li>
                  <br>
                  <li>The PUPJST adheres to the following four criteria in authorship recommended by International Committee of Medical Journal Editors (ICMJE):</li>
                    <ol>
                    <br>
                    <li>Substantial contributions to the conception or design of the work; or the acquisition, analysis, or interpretation of data for the work;</li>
                    <br>
                    <li>Drafting the work or revising it critically for important intellectual content;</li>
                    <br>
                    <li>Final approval of the version to be published;</li>
                    <br>
                    <li>Agreement to be accountable for all aspects of the work in ensuring that questions related to the accuracy or integrity of any part of the work are appropriately investigated and resolved.</li>
                    </ol>
                </ol>

                <br>
           
         <!-- /.card-body -->
         
        <input type="checkbox" name="terms" id="terms" required><strong> I have read and accept the <u>Terms and Conditions</u></strong></p>
                      
                      <div style="float: right;">
                        <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                          <li class="nav-item" style="float: left;"><a class="nav-link" href="#tab_1"  id="Step0_Next">Next</a></li>
                        </ul>
                      </div>   
                        <!-- /.card-footer-->
     <!-- /div pane -->
        </div>  

                  <div class="tab-pane" id="tab_1">
                
                      
                      <div class="form-group">
                          <label>Select a journal entry to submit with</label>
                          <br>
                          <br>
                          <select class="form-control" id="journal">
                         >
                            <?php display_journal();?>
                          </select>
                      </div>

                      <br>
                      <br>

                     
                      <div style="float: left;">
                       <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                          <li class="nav-item" style="float: left;"><a class="nav-link" href="#tab_2" id="Step1_Back">Back</a></li>
                        </ul>
                      </div>

                                            <div style="float: right;">
                       <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                          <li class="nav-item" style="float: left;"><a class="nav-link" href="#tab_2" id="Step1_Next">Next</a></li>
                        </ul>
                      </div>
                  </div>
                  <!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_2">                    
                      <div class="form-group">
                          <label><h2>Title and Abstract</h2></label>
                          <br>
                          <br>
                          
                          <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" class="form-control" id="title" placeholder="Title">
                           <span id="error_title" class="text-danger"></span>
                               </div>


                          <div class="form-group">
                          <label>Enter Abstract</label>
                          <span>          (</span>
                          <span id="wordcount" class="text-danger" > 0</span>
                          <span>/350)</span>
                          <textarea name="Abstract" id="Abstract" class="form-control" maxlength="350" rows="15"></textarea>
                          <span id="error_abstract" class="text-danger"></span>
                       
                      </div>
                      </div>

                      <br>
                      <br>

                     
                      <div style="float: left;">
                          <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                            <li class="nav-item" style="float: left;"><a class="nav-link" href="#tab_1"  id="Step2_Back">Back</a></li>
                          </ul>
                      </div>
                      <div style="float: right;">
                        <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                          <li class="nav-item" style="float: left;"><a class="nav-link" href="#tab_3"  id="Step2_Next">Next</a></li>
                        </ul>
                      </div>
                  </div>
                  
                  <div class="tab-pane" id="tab_3">

                    
                      <label>Author's Details</label>
                      <br>

                    
                    <div class="form-group">
          
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="text" class="form-control" id="first_name" placeholder="First Name">
                            <span id="error_fname" class="text-danger"></span>
                      </div>

                        <div class="form-group">
                             <label for="exampleInputEmail1">Middle Name</label>
                          <input type="text" class="form-control" id="middle_name" placeholder="Middle Name">
                            <span id="error_mname" class="text-danger"></span>

                             </div>


  <div class="form-group">
                             <label for="exampleInputEmail1">Last Name</label>
                          <input type="text" class="form-control" id="last_name" placeholder="Last Name">
                            <span id="error_lname" class="text-danger"></span>



                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Email Address</label>
                          <input type="email" class="form-control" id="Email" placeholder="Email Address">
                                   <span id="error_aemail" class="text-danger"></span>

                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Affiliation</label>
                          <input type="text" class="form-control" id="Affi" placeholder="Affiliation">
                                   <span id="error_affi" class="text-danger"></span>

                      </div>


                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary" id="Add">Add to List</button>
                      </div>


                      <br>


                      <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h3 class="card-title">Author(s)</h3>
                
                                <div class="card-tools">
                                  <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                
                                    <div class="input-group-append">
                                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body table-responsive p-0">
                                <table class="table table-hover" id="hello">
                                  <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                     <th>Email Address</th>
                                   <th>Affiliation</th> 
                                  </tr>
                                  <tr id="row1">
                                    <td class='a_first_name'><?php echo $_SESSION['fname']?></td>
                                  <td class='a_middle_name'><?php echo $_SESSION['mname']?></td>
                                   <td class='a_last_name'><?php echo $_SESSION['lname']?></td>
                                    <td class='a_email'><?php echo $_SESSION['email']; ?></td>
                                    <td class='a_affi'><?php echo $_SESSION['affi'];?></td>
                          
                                </tr>
                                
                                </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                          </div>
                        </div><!-- /.row -->


                      <br>
                      <br>


                      <div style="float: left;">
                          <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                            <li class="nav-item" style="float: left;"><a class="nav-link" href="#tab_1" id="Step3_Back">Back</a></li>
                          </ul>
                      </div>
                      <div style="float: right;">
                        <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                          <li class="nav-item" style="float: left;"><a class="nav-link" href="#tab_3"  id="Step3_Next">Next</a></li>
                        </ul>
                      </div>



                    
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
        <div id="loader" style="display: none;
 text-align: center;
  ">
    <img src="../../images/loading.gif" width="100px" height="100px">
</div>
                      <div id="submit_content">

                      <label for="exampleInputFile">Upload Manuscript File</label>

                      <div class="form-group">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" id="filetype">
                              
                            </div>
                           
                          </div>
                      </div>
                      <h6 style="color: grey;" for="exampleInputFile">In MS Word Format Only (Maximum of 8MB only) </h6>
                        
                      <br>

                        <h5 for="exampleInputFile">Upload Supplementary File</h5>
                        

                      <div class="form-group">
                          <div class="input-group">
                            <div class="custom-file">
                              <input  type="file" id="filetype2">
                              
                            </div>
                            <div class="input-group-append">
                             
                            </div>
                          </div>
                      </div>
                      
                      <h6 style="color: grey;" for="exampleInputFile">Optional: In MS Word Format Only (Maximum of 8MB only) </h6>

                        
                      <br>
                      <br>
                      <h3><strong><span id="content" class="text-danger"></strong></span></h3>
                      <br>

                      <div class="callout callout-danger">
                          <h5>Confirmation</h5>
        
                          <p>To submit your manuscript to <strong>PUP JST</strong>
                          click submit button. The user / author who submit the manuscript will receive an acknowledge
                           by email and will be able to view the submission's progress through the editorial process by logging 
                           in to the journal website. Thank you for your interest in publishing with <strong>PUP JST</strong>.</p>
                        </div>

                      <br>
                      
                      <br>





                        <div style="float: left;">
                            <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                              <li class="nav-item" style="float: left;"><a class="nav-link" href="#tab_2" id="Step4_Back">Back</a></li>
                            </ul>
                        </div>
                        <div style="float: right;">
                          <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                             <button type="button" hidden name="SAVE" id="SAVE" class="btn btn-success btn-lg">Submit</button>
                          </ul>
                        </div>




                        </div>
                    
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->
        <!-- START PROGRESS BARS -->
        
    </section>

    

















    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
 
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>

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
$(document).ready(function(){


$("#Step0_Next").click(function(e){
    e.preventDefault();
    if($("#terms").is(':checked'))
    {
    $("#tab_0").hide();
    $("#tab_1").show();
    $('#error_terms_conditions').hide();
    }
    else
    {
  $('#error_terms_conditions').fadeIn(500);  
    setTimeout(function(){
    $('#error_terms_conditions').hide(); 
  }, 10000);
           
    }


  })

  $("#Step1_Back").click(function(e){
  e.preventDefault();
    $("#tab_1").hide();
    $("#tab_0").show();
  })


  $("#Step1_Next").click(function(e){
  e.preventDefault();
    $("#tab_1").hide();
    $("#tab_2").show();
  })

    $("#Step4_Back").click(function(e){
   e.preventDefault();
    $("#tab_4").hide();
    $("#tab_3").show();
  })

    $("#Step2_Back").click(function(e){
     e.preventDefault();
    $("#tab_2").hide();
    $("#tab_1").show();
  })
    $("#Step3_Back").click(function(e){
  e.preventDefault();
    $("#tab_3").hide();
    $("#tab_2").show();
  })
  
      $("#Step3_Next").click(function(e){
      e.preventDefault();
    $("#tab_3").hide();
    $("#tab_4").show();
  })




  $("#Step2_Next").click(function(e){
    e.preventDefault();
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
  if(error_abstract == '' && error_title == '')
  {
    $("#tab_2").hide();
    $("#tab_3").show();
  }
  })


 var count = 2;
      $("#Add").click(function(evt){
      evt.preventDefault();
      count = count + 1;
      var first_name = $("#first_name").val();
      var middle_name = $("#middle_name").val();
      var last_name = $("#last_name").val();
      var Email = $("#Email").val();
      var Affi = $("#Affi").val();
      
      /*Name validation*/
      if ($.trim($('#first_name').val()) == 0 )
      { 
          error_fname = 'Please fill up  the first name of the author';
         $('#error_fname').text(error_fname);
         $('#first_name').css("border-color", "#cc0000");
        $('#first_name').css("background-color", "#ffff99");
      }
        else
          {
            error_fname = '';
           $('#error_fname').text(error_fname);
          $('#first_name').css("border-color", "#ccc");
         $('#first_name').css("background-color", "#fff");
          }



           if ($.trim($('#last_name').val()) == 0 )
      { 
          error_lname = 'Please fill up  the last name of the author';
         $('#error_lname').text(error_lname);
         $('#last_name').css("border-color", "#cc0000");
        $('#last_name').css("background-color", "#ffff99");
      }
        else
          {
            error_lname = '';
           $('#error_lname').text(error_lname);
          $('#last_name').css("border-color", "#ccc");
         $('#last_name').css("background-color", "#fff");
          }
      /*email validation*/
      if ($.trim($('#Email').val()) == 0 )
      { 
          error_aemail = 'Please fill up email';
         $('#error_aemail').text(error_aemail);
        $('#Email').css("border-color", "#cc0000");
        $('#Email').css("background-color", "#ffff99");
      }
      else
      {
      error_aemail = '';
      $('#error_aemail').text(error_aemail);
      $('#Email').css("border-color", "#ccc");
       $('#Email').css("background-color", "#fff");
      }
      /*Affliation validation*/
        if ($.trim($('#Affi').val()) == 0 )
      { 
        error_affi = 'Please fill up Affliation';
        $('#error_affi').text(error_affi);
       $('#Affi').css("border-color", "#cc0000");
        $('#Affi').css("background-color", "#ffff99");
      }
      else
      {
      error_affi = '';
      $('#error_affi').text(error_affi);
      $('#Affi').css("border-color", "#ccc");
       $('#Affi').css("background-color", "#fff");

      }
      if ($.trim($('#Affi').val()) != 0 &&  $.trim($('#Email').val()) != 0 && $.trim($('#first_name').val()) != 0  & $.trim($('#last_name').val()) != 0 )
      {
        var tr = "<tr id ='row"+count+"'>";
        tr += "<td class='a_first_name'>"+first_name+"</td>";
        tr += "<td class='a_middle_name'>"+middle_name+"</td>";
        tr += "<td class='a_last_name'>"+last_name+"</td>";
        tr += "<td class='a_email'>"+Email+"</td>";
        tr += "<td class='a_affi'>"+Affi+"</td>";
        tr += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-s remove'>-</button></td></tr>";
      $("#hello").append(tr);
       $("#first_name").val('');
       $("#middle_name").val('');
       $("#last_name").val('');
       $("#Email").val('');
       $("#Affi").val('');
     }

      })
        $(document).on('click', '.remove', function(){
        var delete_row = $(this).data("row");
        $("#"+delete_row).remove();
      });   

     $('#Abstract').keyup(function(){
     var count = $('#Abstract').val().length;
     $('#wordcount').html(count);
}) 

      $('#SAVE').click(function(event){
  event.preventDefault();

  var myFormData = new FormData();
  var journal = $("#journal").children("option:selected").val();
  var abstract = $("#Abstract").val();
  var title = $("#title").val();
  var a_first_name = [];
   var a_middle_name = [];
    var a_last_name = [];
  var a_email = [];
  var a_affi = [];
  $('.a_first_name').each(function(){
   a_first_name.push($(this).text());
  });
   $('.a_middle_name').each(function(){
   a_middle_name.push($(this).text());
  });
    $('.a_last_name').each(function(){
   a_last_name.push($(this).text());
  });
  $('.a_email').each(function(){
   a_email.push($(this).text());
  });
  $('.a_affi').each(function(){
   a_affi.push($(this).text());
  });
  myFormData.append('journal', journal);
  myFormData.append('abstract', abstract);
  myFormData.append('title', title);
  myFormData.append('a_first_name', a_first_name);
  myFormData.append('a_middle_name', a_middle_name);
  myFormData.append('a_last_name', a_last_name);
  myFormData.append('a_email', a_email);
  myFormData.append('a_affi', a_affi);
  myFormData.append('file', filetype.files[0]);
  myFormData.append('file2', filetype2.files[0]);
          $.ajax({
            url: 'SUBMIT_RESEARCH_FILE.php',
            data: myFormData,
            processData: false, // important
            contentType: false, // important
            type: 'POST',  
            beforeSend:function(data)
            {
              $("#submit_content").attr("hidden", "true")
              
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
                                       
                       
                  //   $("#loader").hide();
                  //  $("#submit_content").removeAttr("hidden", "true");
                  //     $('#error_pages').fadeIn(500);  
                  //   setTimeout(function(){
                  //   $('#error_pages').hide(); 
                  // }, 10000);
                  alert(data);
                  }
            }




          })
  
    })
 
})
$("#filetype").change(function(){
  if($("#filetype").val() != "")
{
  myfile = $(this).val();
  var ext = myfile.split('.').pop();
  if(ext == "docx")
  {
   
    if(filetype.files[0].size > 8388608 )
    {
      $("#SAVE").attr("hidden", "true");
     $('#error_size').fadeIn(500);  
    setTimeout(function(){
    $('#error_size').hide(); 
  }, 10000);
    }
    else
    {
    $('#error_submission').hide();
    $("#SAVE").removeAttr("hidden");
    }

  }
  else
  {
     $("#SAVE").attr("hidden", "true");
     $('#error_submission').fadeIn(500);  
    setTimeout(function(){
    $('#error_submission').hide(); 
  }, 10000);
  }
}
else
{
  $("#SAVE").attr("hidden", "true");
  $('#error_submission').hide();
}

})

$("#filetype2").change(function(){
  if($("#filetype2").val() != "")
  {
      myfile = $(this).val();
      var ext = myfile.split('.').pop();
      if(ext == "docx" )
      {
         if($("#filetype").val() != "")
        {
            myfile2 = $("#filetype").val();
            var ext2 = myfile2.split('.').pop();
            if(ext2 == "docx")
            {
                   if(filetype2.files[0].size > 8388608 )
                  {
                    $("#SAVE").attr("hidden", "true");
                   $('#error_size').fadeIn(500);  
                  setTimeout(function(){
                  $('#error_size').hide(); 
                }, 10000);
                  }
                  else
                  {
                  $('#error_submission').hide();
                  $("#SAVE").removeAttr("hidden");
                  }
            }
            else
            {
                   $("#SAVE").attr("hidden", "true");
                   $('#error_submission').fadeIn(500);  
                  setTimeout(function()
                {
                  $('#error_submission').hide(); 
                }, 10000);
          }
        }
        else
        {
          $("#SAVE").attr("hidden", "true");
          $('#error_submission').hide();
        }
  }
  else
 {
         $("#SAVE").attr("hidden", "true");
         $('#error_submission').fadeIn(500);  
        setTimeout(function(){
        $('#error_submission').hide(); 
      }, 10000);
  }
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
</body>
</html>

