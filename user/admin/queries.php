<?php include("header.php");?>
  

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Queries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Queries</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    
    <!-- Main content -->
    <div class="content">
      <div class="container">

      <section class="content">
        <div style="padding: 5px;">
       
        <div class="alert alert-danger  text-center" id="error_pages" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>Please generate the table</strong></h3> 
        </div>
      
</div>

      <div class="card">
              <div class="card-header d-flex p-0" >             
                <ul class="nav nav-pills p-2 ">
                  <li class="nav-item pull-left"><a class="nav-link active" href="#tab_1" data-toggle="tab">Users</a></li>
                  <li class="nav-item pull-left"><a class="nav-link" href="#tab_2" data-toggle="tab">Documents</a></li>
                  <!-- <li class="nav-item float-left"><a class="nav-link" href="#tab_3" data-toggle="tab">Journals</a></li>
              -->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-2">                       

                            <div class="form-group">
                            <label>Gender</label>

                             <select class="form-control" id="gender">
                             <option value="All">All</option>
                             <option>Male</option>
                             <option>Female</option>
                             </select>
                            </div>

                        </div>

                        <div class="col-md-3">                       

                            <div class="form-group">
                            
                            <label>Role / User type</label>

                             <select class="form-control" id="user_role">
                             <option value="All">All</option>
                             <?php 
                             $query_all = query("SELECT * from user_role_table where user_role_id <> 9");
                             while($row_user_role = fetch_assoc($query_all))
                             {
                              ?>
                              <option value="<?php echo $row_user_role['user_role_id'];?>"><?php echo $row_user_role['user_role_name'];?></option>
                              <?php
                            }
                            ?>
                             </select>
                                <!--lloop-->

                                
                            </div>
                        </div>

                        <div class="col-md-4">                       

                            <div class="form-group">
                            <label>Journal</label>

                            <select class="form-control" id="Journal" disabled>
                           <option value="All">All</option>
                             <?php 
                             $query_all = query("SELECT * from journal_table");
                             while($row_user_role = fetch_assoc($query_all))
                             {
                              ?>
                              <option value="<?php echo $row_user_role['journal_id'];?>"><?php echo $row_user_role['journal_name'];?></option>
                              <?php
                            }
                            ?>
                             </select>

                                
                            </div>
                        </div>                    
                     <div class="col-md-2">                       

                            <div class="form-group">
                            <label>Field of Expertise</label>

                              <select class="form-control" id="research_field">
                             <option value="All">All</option>
                             <?php 
                             $query_all = query("SELECT * from user_research_field");
                             while($row_user_role = fetch_assoc($query_all))
                             {
                              ?>
                              <option value="<?php echo $row_user_role['research_field_name'];?>"><?php echo $row_user_role['research_field_name'];?></option>
                              <?php
                            }
                            ?>
                            <option value="Others">Others</option>
                             </select>
                            </div>

                            
      </div>  
                    
                    </div><!--row-->

                
                                          

<br>
                            <button class="btn btn-block btn-primary" id="btn_user_query">Generate Queries</button>

                  <br>
    <div class="row">
                                            

                        <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Generated Query</h3>
                          <button class="btn-secondary" id="print_btn" style="float: right;"><i class="fas fa-print"></i> Print</button>
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body" style="overflow: auto;">
                            <table id="user_query" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Salutation</th>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>Role</th>                                    
                                    <th>Affiliation</th>
                                    <th>Expertise</th>
                                </tr>
                                </thead>
                                <tbody>

                                
                                </tbody>                             
                            </table>
                            </div>
                        <!-- /.card-body -->
                        </div>

                      

                                      
                    
                    
                    </div><!--row-->



                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div class="row">
                        <div class="col-md-4">                       

                            <div class="form-group">
                            <label>Status</label>

                            <select class="form-control" id="status">
                            <option value="All">All</option>
                            <option value="On Managing Editor">On Managing Editor</option>
                            <option value="On Editor in Chief">On Editor in Chief</option>
                            <option value="Assign an Internal Reviewer">Assign an Internal Reviewer</option>
                            <option value="Assign an External Reviewer">Assign an External Reviewer</option>
                            <option value="On Internal Reivewer">On Internal Reivewer</option>
                            <option value="On External Reivewer">On External Reivewer</option>
                            <option value="On Proofreader">On Proofreader</option>
                            <option value="On Layout Editor">On Layout Editor</option>
                            <option value="Assigning of Volume and Issue">Assigning of Volume and Issue</option>
                            <option value="Published">Published</option>
                            <option value="Accepted with Revision">Accepted with Revision</option>
                            <option value="Rejected">Rejected</option>
                            </select>
                            </div>

                        </div>

                        <div class="col-md-4">                       

                            <div class="form-group">
                            <label>Volume</label>

                            <select class="form-control" id="volume" disabled>
                             <option value="All">All</option>
                             <?php 
                             $query_all = query("SELECT * from volume_table");
                             while($row_user_role = fetch_assoc($query_all))
                             {
                              ?>
                              <option value="<?php echo $row_user_role['volume_id'];?>">Volume: <?php echo $row_user_role['volume'];?>  Issue: <?php echo $row_user_role['issue'];?></option>
                              <?php
                            }
                            ?>
                             </select>

                                
                            </div>
                        </div>

                        <div class="col-md-4">                       

                            <div class="form-group">
                            <label>Journal</label>

                               <select class="form-control" id="Journal_docu">
                           <option value="All">All</option>
                             <?php 
                             $query_all = query("SELECT * from journal_table");
                             while($row_user_role = fetch_assoc($query_all))
                             {
                              ?>
                              <option value="<?php echo $row_user_role['journal_id'];?>"><?php echo $row_user_role['journal_name'];?></option>
                              <?php
                            }
                            ?>
                             </select>

                                
                            </div>
                        </div>

                                    
                    
                    
                    </div><!--row-->
               

                            <div class="form-group">
                            <label>Submission Date(Beginning)</label>

                             <input class="form-control" type="date" id="date_beg">
                               
                            </div>

                             <div class="form-group">
                            <label>Submission Date(End)</label>

                             <input class="form-control" type="date" id="date_end">
                               
                            </div>                        

                  
                    

                    <div class="row">  
                    <br>


                    <button class="btn-md btn-block btn-primary" id="btn_docu_query">Generate Queries</button>

                   
                        

                        <div class="col-md-12">  
                        <br>
                        <br>
                     

                        <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Generated Query</h3>
                                                  <button class="btn-secondary" id="print_btn2" style="float: right;"><i class="fas fa-print"></i> Print</button>

                        </div>
                        <!-- /.card-header -->
                            <div class="card-body" style="overflow: auto;">
                            <table id="docu_query" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Document Name</th>
                                    <th>Status</th>                                    
                                    <th>Journal</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                </tr>
                                
                                </tbody>                             
                            </table>
                            </div>
                        <!-- /.card-body -->
                        </div>

                        </div>

                                      
                    
                    
                    </div><!--row-->



                  </div>
                  <!-- /.tab-pane -->
                  <!-- <div class="tab-pane" id="tab_3">


                  </div> -->
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>

         

            



     












      

      </section>

      <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">           
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


       
      </div><!-- /.container-fluid -->
    </div> <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<!-- page script -->

<script>
  $("#btn_user_query").click(function(e){
    e.preventDefault();
    var gender = $("#gender").val();
    var user_role = $("#user_role").val();
    var Journal = $("#Journal").val();
    var expertise = $("#research_field").val();


    $.ajax({
      url: 'load_user_query.php',
      method: 'POST',
      data: {gender:gender, user_role:user_role, Journal:Journal, expertise:expertise},

      success:function(e)
      {
        $("#user_query").html(e);
      }
    })
  })

   $("#btn_docu_query").click(function(e){
    e.preventDefault();
    var status = $("#status").val();
    var volume = $("#volume").val();
    var Journal = $("#Journal_docu").val();
    var date_beg = $("#date_beg").val();
    var date_end = $("#date_end").val();
     $.ajax({
      url: 'load_docu_query.php',
      method: 'POST',
      data: {status:status, volume:volume, Journal:Journal, date_beg:date_beg, date_end:date_end},
      success:function(e)
      {
        $("#docu_query").html(e);
      }
    })




  })

  $("#user_role").change(function(){
    var user_role =  $("#user_role").val();
    if(user_role == 1 || user_role == "All" || user_role == 6 || user_role == 7 || user_role == 8)
    {
        $("#Journal").val("All")
      $("#Journal").attr("disabled", "true")
    }
    else
    {
       $("#Journal").removeAttr("disabled", "true")
    }

  })

    $("#status").change(function(){
    var status =  $("#status").val();
    if(status == "Published")
    {
      $("#volume").removeAttr("disabled", "true")
      
    }
    else
    {
            $("#volume").val("All")
      $("#volume").attr("disabled", "true")
    }

  })

    $("#print_btn").click(function(e){
      e.preventDefault();
      var table_length = $("#user_query td").length
      if(table_length == 0)
      {
    $('#error_pages').fadeIn(500);  
                    setTimeout(function(){
                    $('#error_pages').hide(); 
                  }, 10000);
                  
      }
      else
      {
        var printme = document.getElementById('user_query');
        var wme = window.open("","","width=900,height=700");
        wme.document.write(printme.outerHTML);
                wme.document.close();

        wme.focus();
        wme.print();
        wme.close();
      }

    })


    $("#print_btn2").click(function(e){
      e.preventDefault();
      var table_length = $("#docu_query td").length
      if(table_length == 0)
      {
    $('#error_pages').fadeIn(500);  
                    setTimeout(function(){
                    $('#error_pages').hide(); 
                  }, 10000);
                  
      }
      else
      {
        var printme = document.getElementById('docu_query');
        var wme = window.open("","","width=900,height=700");
        wme.document.write(printme.outerHTML);
                wme.document.close();

        wme.focus();
        wme.print();
        wme.close();
      }

    })

</script>





</body>
</html>
