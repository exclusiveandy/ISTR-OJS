
  <!-- Navbar -->
  <?php
    include "header.php";
validate();
  ?>

  <!-- Main Sidebar Container -->
 
  <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
   
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Revision</h1>
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
      
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3" style="float: right;">Submit Document</h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                
                      
                      <div class="form-group">
                          <label>Select a journal entry to submit with</label>
                          <br>
                          <br>
                          <select class="form-control" id="journal">
                            <?php display_journal();?>
                          </select>
                      </div>

                      <br>
                      <br>

                     
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
          
                          <label for="exampleInputEmail1">Full Name</label>
                          <input type="text" class="form-control" id="Name" placeholder="First Middle Last">
                            <span id="error_aname" class="text-danger"></span>

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
                                    <th>Name</th>
                                     <th>Email Address</th>
                                   <th>Affiliation</th> 
                                  </tr>
                                  <tr id="row1">
                                    <td class='a_name'><?php echo $_SESSION['fname']. " ". $_SESSION['mname']." ". $_SESSION['lname'] ;?></td>
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

                      <label for="exampleInputFile">Upload Manuscript File</label>

                      <div class="form-group">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" id="filetype">
                              
                            </div>
                            <div class="input-group-append">
                             
                            </div>
                          </div>
                      </div>
                      <h6 style="color: grey;" for="exampleInputFile">In MS Word Format Only (Maximum of 8MB only) </h6>
                        
                      <br>

                        <h5 for="exampleInputFile">Upload Supplementary File</h5>
                        

                      <div class="form-group">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="filetype2">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text" id="">Upload</span>
                            </div>
                          </div>
                      </div>
                      
                      <h6 style="color: grey;" for="exampleInputFile">Optional (Maximum of 8MB only) </h6>

                        
                      <br>
                      <br>
                      <h3><span id="content" class="text-danger"></span></h3>
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
                             <button type="button" name="SAVE" id="SAVE" class="btn btn-success btn-lg">Submit</button>
                          </ul>
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
      var Name = $("#Name").val();
      var Email = $("#Email").val();
      var Affi = $("#Affi").val();
      
      /*Name validation*/
      if ($.trim($('#Name').val()) == 0 )
      { 
          error_aname = 'Please fill up name';
         $('#error_aname').text(error_aname);
         $('#Name').css("border-color", "#cc0000");
        $('#Name').css("background-color", "#ffff99");
      }
        else
          {
            error_aname = '';
           $('#error_aname').text(error_aname);
          $('#Name').css("border-color", "#ccc");
         $('#Name').css("background-color", "#fff");
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
      if ($.trim($('#Affi').val()) != 0 &&  $.trim($('#Email').val()) != 0 && $.trim($('#Name').val()) != 0  )
      {
        var tr = "<tr id ='row"+count+"'>";
        tr += "<td class='a_name'>"+Name+"</td>";
        tr += "<td class='a_email'>"+Email+"</td>";
        tr += "<td class='a_affi'>"+Affi+"</td>";
        tr += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-s remove'>-</button></td></tr>";
      $("#hello").append(tr);
       $("#Name").val('');
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
  var a_name = [];
  var a_email = [];
  var a_affi = [];
  $('.a_name').each(function(){
   a_name.push($(this).text());
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
  myFormData.append('a_name', a_name);
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
            success: function(data){
              $("#content").html(data);
            }




          })
  
    })
 
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
