<!-- Navbar -->
  <?php
    include("usernav.php"); 
    validate();
  ?>
   
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Submission of Documents</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Submit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <div class="content">
      <div class="container">

      <div class="card" style="width: 100%; height: 500px;">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3" style="float: right;">Submit Document</h3>
        </div>
	
        <div class="card-body">
          <div class="tab-content">

            <!-- FIRST STEP FIRST STEP FIRST STEP FIRST STEP FIRST STEP FIRST STEP FIRST STEP FIRST STEP FIRST STEP FIRST STEP FIRST STEP FIRST STEP FIRST STEP FIRST STEP -->
            <div class="tab-pane active" id="tab_0">
              <input type="checkbox" name="terms" id="terms" required>
                <strong> I have read and accept the 
                  <u>Terms and Conditions</u>
                </strong>
              </p>
              <div style="float: right;">
                <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                  <li class="nav-item" style="float: left;">
                    <a class="nav-link" href="#tab_1"  id="Step0_Next">Next</a>
                  </li>  
                </ul>
              </div>
              </div>
            <div class="tab-pane" id="tab_1">
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
                <div style="float: left;">
                  <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                    <li class="nav-item" style="float: left;">
                      <a class="nav-link" href="#tab_2" id="Step1_Back">Back</a>
                    </li>
                  </ul>
                </div>
                <div style="float: right;">
                  <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                    <li class="nav-item" style="float: left;">
                      <a class="nav-link" href="#tab_2" id="Step1_Next">Next</a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- SECOND STEP SECOND STEP SECOND STEP SECOND STEP SECOND STEP SECOND STEP SECOND STEP SECOND STEP SECOND STEP SECOND STEP  -->
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
                    <li class="nav-item" style="float: left;">
                      <a class="nav-link" href="#tab_1"  id="Step2_Back">Back</a>
                    </li>
                  </ul>
                </div>
                <div style="float: right;">
                  <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                    <li class="nav-item" style="float: left;">
                      <a class="nav-link" href="#tab_3"  id="Step2_Next">Next</a>
                    </li>
                  </ul>
                </div>
              </div>

                <!-- THIRD STEP THIRD STEP THIRD STEP THIRD STEP THIRD STEP THIRD STEP THIRD STEP THIRD STEP THIRD STEP THIRD STEP  -->
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
                                <button type="submit" class="btn btn-default">
                                  <i class="fas fa-search"></i>
                                </button>
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
                              <td class='a_first_name'>
                                <?php echo $_SESSION['fname']?>
                              </td>
                              <td class='a_middle_name'>
                                <?php echo $_SESSION['mname']?>
                              </td>
                              <td class='a_last_name'>
                                <?php echo $_SESSION['lname']?>
                              </td>
                              <td class='a_email'>
                                <?php echo $_SESSION['email']; ?>
                              </td>
                              <td class='a_affi'>
                                <?php echo $_SESSION['affi'];?>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                          <!-- /.row -->
              <br>
                <br>
                  <div style="float: left;">
                    <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                      <li class="nav-item" style="float: left;">
                        <a class="nav-link" href="#tab_1" id="Step3_Back">Back</a>
                      </li>
                    </ul>
                  </div>
                  <div style="float: right;">
                    <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                      <li class="nav-item" style="float: left;">
                        <a class="nav-link" href="#tab_3"  id="Step3_Next">Next</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- LAST STEP LAST STEP LAST STEP LAST STEP LAST STEP LAST STEP LAST STEP LAST STEP LAST STEP LAST STEP LAST STEP LAST STEP -->																											
                <div class="tab-pane" id="tab_4">
                  <div id="loader" style="display: none; text-align: center;">
                    <img src="../../img/loading3.gif" width="100px" height="100px">
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
                                <div class="input-group-append"></div>
                              </div>
                            </div>
                            <h6 style="color: grey;" for="exampleInputFile">Optional: In MS Word Format Only (Maximum of 8MB only) </h6>
                            <br>
                              <br>
                                <h3>
                                  <strong>
                                    <span id="content" class="text-danger">
                                    </strong>
                                  </span>
                                </h3>
                                <br>
                                  <div class="callout callout-danger">
                                    <h5>Confirmation</h5>
                                    <p>To submit your manuscript to 
                                      <strong>PUP JST</strong>
        click submit button. The user / author who submit the manuscript will receive an acknowledge
        by email and will be able to view the submission's progress through the editorial process by logging 
        in to the journal website. Thank you for your interest in publishing with 
                                      <strong>PUP JST</strong>.
                                    </p>
                                  </div>
                                  <br>
                                    <br>
                                      <div style="float: left;">
                                        <ul class="nav nav-pills ml-auto p-2" style="float: right; background-color: skyblue; border-radius: 15px;">
                                          <li class="nav-item" style="float: left;">
                                            <a class="nav-link" href="#tab_2" id="Step4_Back">Back</a>
                                          </li>
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

                                                                                
																																							</div>

            <div class="card-footer">

              <div id="step1">
                <a class="btn btn-block btn-success float-right text-white">Next</a>
              </div>

              <div id="step2" hidden>
                <a class="btn btn-danger float-left text-white">Back</a>
                <a class="btn btn-success float-right text-white">Next</a>
              </div>

              <div id="step3" hidden>
                <a class="btn btn-danger float-left text-white">Back</a>
                <a class="btn btn-success float-right text-white">Next</a>
              </div>

              <div id="step4" hidden>
                <a class="btn btn-danger float-left text-white">Back</a>
                <a class="btn btn-success float-right text-white" hidden>Submit</a>
              </div>




            </div>

                                                                             
																																							<!-- /.card-body -->
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
  


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
 
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
            url: 'submit_research_file.php',
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
                  console.log(data);
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

