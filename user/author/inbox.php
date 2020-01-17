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

      <div class="card">
              <div class="card-header d-flex p-0" >             
                <ul class="nav nav-pills ml-auto p-2 pull-left">
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

                             <select class="form-control">
                             <option>All</option>
                             <option>Male</option>
                             <option>Female</option>
                             </select>
                                                         </div>

                        </div>

                        <div class="col-md-2">                       

                            <div class="form-group">
                            <label>Salutations</label>

                                <select class="form-control">
                             <option>All</option>
                             <option>Male</option>
                             <option>Female</option>
                             </select>
                                <!--lloop-->

                                
                            </div>
                        </div>

                        <div class="col-md-3">                       

                            <div class="form-group">
                            <label>Role / User type</label>

                             <select class="form-control">
                             <option>All</option>
                             <option>Male</option>
                             <option>Female</option>
                             </select>
                                <!--lloop-->

                                
                            </div>
                        </div>

                        <div class="col-md-4">                       

                            <div class="form-group">
                            <label>Affiliations</label>

                            <select class="form-control">
                             <option>All</option>
                             <option>Male</option>
                             <option>Female</option>
                             </select>

                                
                            </div>
                        </div>                    
                    
                    
                    </div><!--row-->

                    <div class="row">
                        <div class="col-md-2">                       

                            <div class="form-group">
                            <label>Field of Expertise</label>

                               <select class="form-control">
                             <option>All</option>
                             <option>Male</option>
                             <option>Female</option>
                             </select>
                            </div>

                            <br>


                            <button class="btn btn-block btn-primary">Generate Queries</button>

                        </div>

                        <div class="col-md-10">                       

                        <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Generated Query</h3>
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body" style="overflow: auto;">
                            <table id="example2" class="table table-bordered table-hover">
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
                                <tr>
                                    <td style="white-space: nowrap;">Mr.</td>
                                    <td style="white-space: nowrap;">Andrywin Maquinto</td>
                                    <td style="white-space: nowrap;">Male</td>
                                    <td style="white-space: nowrap;">Internal Reviewer</td> 
                                    <td style="white-space: nowrap;">Polytechnic University of the Philippines</td>
                                    <td style="white-space: nowrap;">Information and Technology</td>
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
                  <div class="tab-pane" id="tab_2">
                    <div class="row">
                        <div class="col-md-2">                       

                            <div class="form-group">
                            <label>Status</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked value="option1">
                                    <label class="form-check-label">All</label>
                                </div>
                                <!--lloop-->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="option1">
                                    <label class="form-check-label">document status?</label>
                                </div>
                                <!--lloop-->
                            </div>

                        </div>

                        <div class="col-md-2">                       

                            <div class="form-group">
                            <label>Volume</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked value="option1">
                                    <label class="form-check-label">All</label>
                                </div>
                                <!--lloop-->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="option1">
                                    <label class="form-check-label">1</label>
                                </div>
                                <!--lloop-->

                                
                            </div>
                        </div>

                        <div class="col-md-2">                       

                            <div class="form-group">
                            <label>Issue</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked value="option1">
                                    <label class="form-check-label">All</label>
                                </div>
                                <!--lloop-->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="option1">
                                    <label class="form-check-label">1</label>
                                </div>
                                <!--lloop-->

                                
                            </div>
                        </div>

                        <div class="col-md-3">                       

                            <div class="form-group">
                            <label>Journal</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked value="option1">
                                    <label class="form-check-label">All</label>
                                </div>
                                <!--lloop-->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="option1">
                                    <label class="form-check-label">Journal of Science & Technology</label>
                                </div>
                                <!--lloop-->

                                
                            </div>
                        </div>

                        <div class="col-md-3">                       

                            <div class="form-group">
                            <label>Date of Submission</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked value="option1">
                                    <label class="form-check-label">All</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="option1">
                                    <label class="form-check-label">Date</label>
                                </div>                                
                               
                            </div>

                            <div class="form-group row">
                                    <label for="example-date-input" class="col-2 col-form-label"></label>
                                    <div class="col-10">
                                        <input class="form-control" type="date">
                                    </div>
                            </div>                           

                        </div>                    
                    
                    
                    </div><!--row-->

                    

                    <div class="row">  
                    <br>


                    <button class="btn-md btn-block btn-primary">Generate Queries</button>

                   
                        

                        <div class="col-md-12">  
                        <br>
                        <br>
                     

                        <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Generated Query</h3>
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body" style="overflow: auto;">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Document Name</th>
                                    <th>Volume</th>
                                    <th>Issue</th>
                                    <th>Status</th>                                    
                                    <th>Journal</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="white-space: nowrap;">The Life of Tree: A Biology Research.</td>
                                    <td style="white-space: nowrap;">1</td>
                                    <td style="white-space: nowrap;">1</td>
                                    <td style="white-space: nowrap;">Internal Reviewer</td> 
                                    <td style="white-space: nowrap;">Journal of Science and Technology</td>
                                    <td style="white-space: nowrap;">2019-10-10</td>
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->








</body>
</html>
