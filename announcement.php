

<?php include "header.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Announcement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Announcement</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <!-- /.card-header -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-5">
    
                <!-- Profile Image -->
                <div class="card card-info ">
                <div class="card-header">
                    <h3 class="card-title">Announcement</h3>
                  </div>
                 <div class="card-body box-profile">
                    
    
                   
                    <form role="form">
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Title</label>
                        <input type="text" class="form-control" id="pass" name="pass" placeholder="Title">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Announcement Description</label>
                        <textarea type="text" class="form-control" id="cpass" name="cpass" rows="10"></textarea>
                      </div>
                    </div>

    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info float-right">Submit</button>
                    </div>
                  </form>
    
                  </div>  <!-- /.card-body -->
                </div>                <!-- /.card -->
    
               
                <!-- /.card -->
              </div>
              <!-- /.col -->
              <div class="col-md-7">

                <div class="card" >
                  <div class="card-header">
                    <h3 class="card-title">Announcement Table</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description(s)</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>Internet</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#modal-default">Edit</button></td>
                      </tr>
                  
                  
                      
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>





              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>

    </section>
    <!-- /.content -->
  </div>


  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Announcement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               
                        <div class="row">
                            <div class="col-md-3"> 
                                <div class="form-group">
                                  <label for="exampleInputPassword1">ID</label>
                                  <input type="text" class="form-control" id="pass" name="pass" placeholder="1.. 2.. 3.." disabled>
                                </div>
                            </div>
                          
                            <div class="col-md-9">
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Announcement Title</label>
                                  <input type="text" class="form-control" id="pass" name="pass" placeholder="Title">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Announcement Description</label>
                          <textarea type="text" class="form-control" id="cpass" name="cpass" rows="3"></textarea>
                        </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Submit</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <!-- /.content-wrapper -->
  <?php

    include "../../components/userfooter.php";
  ?>
