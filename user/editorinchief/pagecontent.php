
<?php include "../usercomponents/usernav.php" ; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Page's Content</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>      
              <li class="breadcrumb-item active">Page's Content</li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
       
       <div class="container-fluid">    


       <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">

              <div class="card-header  p-0">

                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_2" data-toggle="tab">Social Media Accounts</a></li>                  
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Home Carousel Image</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Downloadables</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">About OJS</a></li>
                 
                </ul>

              </div><!-- /.card-header -->     

              <div class="card-body">
                <div class="tab-content">
                

                  <?php
                $url_content = query("SELECT * from page_content");
                if(row_count($url_content) != 0)
                {
                  }                  ?>
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="tab_2">
           

                    <div class="card card-outline card-danger">

                      <div class="card-header">
                        <h3 class="card-title">Social Media Accounts</h3>
                        <button type="button" data-toggle="modal" data-target="#add_url" data-uid="1" class="btn btn-secondary btn-md url_add" style="float: right;" >Add a New Social Media and Url</button>
                      </div>


                        <div class="card-body" id="url_table">

                         <table  class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Url Title</th>
                                  <th>Url</th>
                                  <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                   <?php   
                        $url_query = query("SELECT * from ojs_page_url");
                        confirm($url_query);
                        if(row_count($url_query) !=0)
                        {
                          while ($row = fetch_assoc($url_query)){
                        ?>
                            
                                  <tr>
                                    <td><?php echo $row['url_title'];?></td>
                                    <td><?php echo $row['url'];?></td>
                                    <td><button type="button" data-toggle="modal" id="<?php echo $row['url_id'];?>" class="btn btn-success btn-md edit_url" >Edit</button></TD>
                                      <td><button type="button" data-toggle="modal" id="<?php echo $row['url_id'];?>"   class="btn btn-danger btn-md delete_url" >Delete</button></TD>
                                  </tr>
                                    
                                    <?php
                                  }
                                }?>
                                </tbody>
                              </table>
                              
                                  
                        </div>    
                   </div>
                  </div>
              

                  <div class="tab-pane" id="tab_4">
                  <div class="card card-outline card-danger">
                    <div class="card-header">
                      <h3 class="card-title">Home Carousel Image</h3>
                      <button type="button" data-toggle="modal" data-target="#add_home_page_modal" data-uid="1" class="btn btn-secondary btn-md add_home_page_picture" style="float: right;" >Add a New Downloadable File</button>
                    </div>
                      <div class="card-body" id="home_page_picture_table">

                         <table  class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  
                                  <th>Picture</th>
                                  <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                   <?php   
                        $ojs_home_page_query = query("SELECT * from ojs_home_page_picture ");
                        confirm($ojs_home_page_query);
                        if(row_count($ojs_home_page_query) !=0)
                        {
                          while ($row = fetch_assoc($ojs_home_page_query)){
                        ?>
                            
                                  <tr>
                                    
                                      <td><img src="<?php echo $row['location'];?>" alt="ojslogo" id="about_ojs_picture" width="250px" height="250px"></td>
                                    <td><a href="download.php?path=<?php echo $row['location'];?>" class="btn btn-info btn-md"><span class="fa fa-download"></span></a></TD>
                                      <td><button type="button" data-toggle="modal" id="<?php echo $row['picture_id'];?>" class="btn btn-secondary btn-md edit_home_page_picture" >Edit</button></TD>
                                      <td><button type="button" data-toggle="modal" id="<?php echo $row['picture_id'];?>"   class="btn btn-danger btn-md delete_home_page_picture" >Delete</button></TD>
                                  </tr>
                                    
                                    <?php
                                  }
                                }?>
                                </tbody>
                              </table>
                              
                                  
                        </div>    
                  </div>
                  </div>

                 

                  <div class="tab-pane" id="tab_5">
                    <div class="card card-outline card-danger">
                      <div class="card-header">
                        <h3 class="card-title">Downloadables</h3>
                        <button type="button" data-toggle="modal" data-target="#add_downloadble_modal" data-uid="1" class="btn btn-secondary btn-md add_downloadable" style="float: right;" >Add a New Downloadable File</button>
                      </div>
                     
                      <div class="card-body" id="downloadble_table">

                         <table  class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Downloadable Title</th>
                                  <th>File Name</th>
                                  <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                   <?php   
                        $url_query = query("SELECT * from ojs_downloadbles");
                        confirm($url_query);
                        if(row_count($url_query) !=0)
                        {
                          while ($row = fetch_assoc($url_query)){<
                        ?>
                            
                                  <tr>
                                    <td><?php echo $row['downloadable_name'];?></td>
                                    <td><?php echo $row['downloadable_file'];?></td>
                                    <td> <a href="download.php?path=<?php echo $row['location'];?>" class="btn btn-info btn-md"><span class="fa fa-download"></span></a></TD>
                                      <td><button type="button" data-toggle="modal" id="<?php echo $row['downloadble_id'];?>" class="btn btn-secondary btn-md edit_downloadble" >Edit</button></TD>
                                      <td><button type="button" data-toggle="modal" id="<?php echo $row['downloadble_id'];?>"   class="btn btn-danger btn-md delete_downloadble" >Delete</button></TD>
                                  </tr>
                                    
                                    <?php
                                  }
                                }?>
                                </tbody>
                              </table>
                              
                                  
                        </div>    
                       
                    
                    </div>                              
                  </div>


                  <div class="tab-pane" id="tab_6">
                    
                    <div class="card card-outline card-danger">

                      <div class="card-header">
                        <h3 class="card-title">About Us</h3>
                        <button type="button" data-toggle="modal" data-target="#add_section_about_us" data-uid="1" class="btn btn-secondary btn-md add_about" style="float: right;" >Add a New Section for About US</button>
                      </div>  

                       <div class="card-body" id="about_ojs_table">

                         <table  class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                   <?php   
                        $about_ojs_query = query("SELECT * from about_ojs");
                        confirm($about_ojs_query);
                        if(row_count($about_ojs_query) !=0)
                        {
                          while ($row = fetch_assoc($about_ojs_query)){
                        ?>
                            
                                  <tr>
                                    <td><?php echo $row['ojs_title'];?></td>
                                    <td><?php echo $row['ojs_description'];?></td>
                                    <td><button type="button" data-toggle="modal" id="<?php echo $row['about_ojs_id'];?>" class="btn btn-success btn-md edit_about_ojs" >Edit</button></TD>
                                      <td><button type="button" data-toggle="modal" id="<?php echo $row['about_ojs_id'];?>"   class="btn btn-danger btn-md delete_about_ojs" >Delete</button></TD>
                                  </tr>
                                    
                                    <?php
                                  }
                                }?>
                                </tbody>
                              </table>
                              
                                  
                        </div>

                      <form id="about_ojs_photo_form" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="exampleFormControlFile1">OJS About Image <small>file should be 750x300</small></label>
                            <input type="file" name="about_ojs_photo" id="about_ojs_photo" onchange="displayImage(this)" class="form-control-file">
                          </div>
                        
                        <!-- /.card-body -->
                        <?php 
                        $about_ojs_photo_query = query("SELECT * from about_ojs_picture");
                        confirm($about_ojs_photo_query);
                      $row_photo = fetch_assoc($about_ojs_photo_query);
                        if(!empty($row_photo['picture_name']))
                        {
                        ?>
                        <img src="<?php echo $row_photo['picture_location'];?>" onclick="triggerClick()" alt="ojslogo" width="100%;" id="about_ojs_picture_main" name="about_ojs_picture_main">
                         <input type="hidden" value="<?php echo $row_photo['picture_id'];?>" name="about_ojs_photo_id" id="about_ojs_photo_id" class="form-control">
                        <?php
                        }
                        else
                        {
                        ?>
                        <img src="../../images/placeholder.png" onclick="triggerClick()" alt="ojslogo" id="about_ojs_picture">
                        <?php
                        }
                        ?>

                        <div class="card-footer">
                          <button type="submit" name="save_picture" id="save_picture" class="btn btn-success btn-block" hidden>Save Picture</button>
                        </div>
                   </form>
                
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
              

       
              
 </div><!-- /.container fluid -->

	

    </section><!-- /.section class content -->







  </div> <!-- /.content wrapper -->


      <div class="modal fade" id="add_url">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User Type</h4>
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
                    <label for="exampleInputEmail1">Title of the Page/Social Media</label>
                    <input type="text" class="form-control" id="url_title" name="url_title" placeholder="Enter the Title of the Social Media/Page" >
                      <span id="error_url_title" class="text-danger"></span>
                  </div>  

                </div>

                <div class="col">

                  <div class="form-group">

                    <label for="exampleInputEmail1">URL</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="Ener The Url" >
                    <input type="hidden" class="form-control" name="url_id" id="url_id" placeholder="Ener The Url" >
                      <span id="error_url" class="text-danger"></span>
                  </div>  

                </div>
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="insert_url" id="insert_url" value="Add Title & Url" class="btn btn-primary">
            </div>
     
            
            </form>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

            <div class="modal fade" id="delete_url_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Are you sure you want to Delete this URL?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

          <form method="POST" id="delete_url_form">
              <div class="alert alert-dark alert-dismissible"  id="error_repeating_url"role="alert" hidden>
            <strong>Warning!</strong> The URL and URL title is already exsisting
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
                    <div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title of the Page/Social Media</label>
                    <input type="text" class="form-control" id="delete_url_title" name="delete_url_title" placeholder="Enter the Title of the Social Media/Page" disabled>
                      <span id="error_url_title" class="text-danger"></span>
                  </div>  

                </div>

                <div class="col">

                  <div class="form-group">

                    <label for="exampleInputEmail1">URL</label>
                    <input type="text" class="form-control" name="delete_url" id="delete_url" placeholder="Ener The Url" disabled>
                    <input type="hidden" class="form-control" name="delete_url_id" id="delete_url_id" placeholder="Ener The Url" >
                      <span id="error_url" class="text-danger"></span>
                  </div>  

                </div>
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="insert_url" id="insert_url" value="Delete url" class="btn btn-danger">
            </div>
     
            
            </form>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



     <div class="modal fade" id="add_section_about_us">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Section in About US</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

          <form method="POST" id="insert_about_ojs_form">
              <div class="alert alert-dark alert-dismissible"  id="error_repeating_url"role="alert" hidden>
            <strong>Warning!</strong> The URL and URL title is already exsisting
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
                    <div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title of the Section</label>
                    <input type="text" class="form-control" id="about_ojs_title" name="about_ojs_title" placeholder="Enter the Title of the Section" >
                      <span id="error_about_ojs_title" class="text-danger"></span>
                  </div>  

                </div>

                <div class="col">

                  <div class="form-group">

                    
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" name="about_ojs_description" id="about_ojs_description" rows="10" placeholder="Enter the Description or Content for the Section" ></textarea>
                    <input type="hidden" class="form-control" name="about_ojs_id" id="about_ojs_id" placeholder="Ener The Url">
                      <span id="error_about_ojs_description" class="text-danger"></span>
                  </div>  

                </div>
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="insert_about_ojs" id="insert_about_ojs" value="Add Title & Section" class="btn btn-primary">
            </div>
            </form>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="delete_section_about_us">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Section in About US</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

          <form method="POST" id="delete_about_ojs_form">
              <div class="alert alert-dark alert-dismissible"  id="error_repeating_url"role="alert" hidden>
            <strong>Warning!</strong> The URL and URL title is already exsisting
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
                    <div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title of the Section</label>
                    <input type="text" class="form-control" id="delete_about_ojs_title" name="delete_about_ojs_title" placeholder="Enter the Title of the Section" disabled>
                      <span id="error_about_ojs_title" class="text-danger"></span>
                  </div>  

                </div>

                <div class="col">

                  <div class="form-group">

                    
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" name="delete_about_ojs_description" id="delete_about_ojs_description" placeholder="Enter the Description or Content for the Section" disabled></textarea>
                    <input type="hidden" class="form-control" name="delete_about_ojs_id" id="delete_about_ojs_id" placeholder="Ener The Url">
                      <span id="error_about_ojs_description" class="text-danger"></span>
                  </div>  

                </div>
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="insert_about_ojs" id="insert_about_ojs" value="Delete Title & Section" class="btn btn-danger">
            </div>
            </form>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>




      <div class="modal fade" id="add_downloadble_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User Type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

          <form method="POST" id="insert_downloadble_form" enctype="multipart/form-data">
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
                    <label for="exampleInputEmail1">File Title</label>
                    <input type="text" class="form-control" id="file_title" name="file_title" placeholder="Enter the Title for the File" >
                      <span id="error_file_title" class="text-danger"></span>
                  </div>  

                </div>

                <div>

                      <div id="Original_File_Type" >

                  <div class="form-group">

                    <label for="exampleInputEmail1">Original File Type</label>
                    
                    <input type="text" class="form-control" name="original_file" id="original_file" disabled>
                  </div>  

                </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">File</label>
                    
                    <input type="file" class="form-control" name="downloadble_file" id="downloadble_file" placeholder="Ener The Url" >
                    <input type="hidden" class="form-control" name="downloadble_id" id="downloadble_id" placeholder="Ener The Url">
                      <span id="error_file" class="text-danger"></span>
                  </div>  

                </div>

              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="insert_downloadble" id="insert_downloadble" value="Add Title & Url" class="btn btn-primary">
            </div>
     
            
            </form>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>







  <div class="modal fade" id="delete_downloadble_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User Type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

          <form method="POST" id="delete_downloadble_form" enctype="multipart/form-data">
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
                    <label for="exampleInputEmail1">File Title</label>
                    <input type="text" class="form-control" id="delete_file_title" name="delete_file_title" placeholder="Enter the Title for the File" disabled>
                      <span id="error_file_title" class="text-danger"></span>
                  </div>  

                </div>

                <div>

                      <div id="Original_File_Type" >

                  <div class="form-group">

                    <label for="exampleInputEmail1">Original File Type</label>
                    
                    <input type="text" class="form-control" name="delete_original_file" id="delete_original_file" disabled>
                     <input type="hidden" class="form-control" name="delete_downloadble_id" id="delete_downloadble_id" placeholder="Ener The Url">
                  </div>  

                </div>

        
                </div>

              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="insert_downloadble" id="insert_downloadble" value="Delete Downloadable Data" class="btn btn-danger">
            </div>
     
            
            </form>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



<div class="modal fade" id="add_home_page_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User Type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

          <form method="POST" id="insert_home_page_picture_form" enctype="multipart/form-data">
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

                    <label for="exampleInputEmail1">File</label>
                    
                    <input type="file" class="form-control" onchange="displayImage2(this)" name="home_page_picture" id="home_page_picture" placeholder="Ener The Url" >
                    <input type="hidden" class="form-control"  name="picture_id" id="picture_id" placeholder="Ener The Url">
                      <span id="error_file" class="text-danger"></span>
                  </div>  

                    <div class="form-group">
                        <img src="../../images/placeholder.png" onclick="triggerClick2()" alt="ojslogo" id="home_page_picture_preview" width="250px" height="250px">
                  </div> 

                </div>

              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="insert_home_page_picture" id="insert_home_page_picture" value="Add Title & Url" class="btn btn-primary" hidden>
            </div>
     
            
            </form>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


<div class="modal fade" id="delete_home_page_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User Type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

          <form method="POST" id="delete_home_page_picture_form" enctype="multipart/form-data">
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

                    <label for="exampleInputEmail1">Picture</label>
                    <input type="hidden" class="form-control"  name="delete_picture_id" id="delete_picture_id" placeholder="Ener The Url">
                      <span id="error_file" class="text-danger"></span>
                  </div>  

                    <div class="form-group">
                        <img src="../../images/placeholder.png" alt="ojslogo" id="delete_home_page_picture_preview" width="250px" height="250px">
                  </div> 

                </div>

              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="insert_home_page_picture" id="insert_home_page_picture" value="Delete Home Page Picture" class="btn btn-danger" >
            </div>
     
            
            </form>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


<!-- /.INSERT SCRIPT HERE!! -->

<?php

    include "../../components/userfooter.php";
  ?>


<script>

</script>



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
  //URL's
  $(document).on('click', '.edit_url', function(){
    var url_id = $(this).attr("id");
    $("#error_repeating_url").attr("hidden", "true");
    $("#error_updating_url").attr("hidden", "true");
    $.ajax({
      url:"fetch_url.php",
      method:"POST",
      data: {url_id:url_id},
      dataType: "json",
      success:function(data){
          $("#url_title").val(data.url_title);
          $("#url").val(data.url);
          $("#url_id").val(data.url_id);  
          $("#insert_url").val("Update Title & Url");
          $("#add_url").modal("show");  
         
          error_url_title = '';
            $('#error_url_title').text(error_url_title);
          $('#url_title').css("border-color", "#ccc");
          $('#url_title').css("background-color", "#fff");

            error_url = '';
          $('#error_url').text(error_url);
          $('#url').css("border-color", "#ccc");
          $('#url').css("background-color", "#fff");
      }
    })
  });


  $(document).on('click', '.delete_url', function(){
    var url_id = $(this).attr("id");
    $.ajax({
      url:"fetch_url.php",
      method:"POST",
      data: {url_id:url_id},
      dataType: "json",
      success:function(data){
          $("#delete_url_title").val(data.url_title);
          $("#delete_url").val(data.url);
          $("#delete_url_id").val(data.url_id);  
          $("#delete_url_modal").modal("show");  
      }
    })
  });


  $(document).on('click', '.url_add', function(){
    $("#insert_form")[0].reset();
    $("#url_id").val("");
    $("#insert_url").val("Add Title & Url");
     error_url_title = '';
            $('#error_url_title').text(error_url_title);
          $('#url_title').css("border-color", "#ccc");
          $('#url_title').css("background-color", "#fff");

               error_url = '';
                $('#error_url').text(error_url);
              $('#url').css("border-color", "#ccc");
              $('#url').css("background-color", "#fff");
    $("#error_repeating_url").attr("hidden", "true");
    $("#error_updating_url").attr("hidden", "true");
  })



 $("#delete_url_form").submit(function(event){
    event.preventDefault();
       $.ajax({
            url:"delete_url.php",
            method:"POST",
            data: $("#delete_url_form").serialize(),
            success:function(data)
            { 
              $("#delete_url_modal").modal('hide');
              $("#url_table").html(data);
            }
          })
  })

  $(document).ready(function(){
  $("#insert_form").submit(function(event){
    event.preventDefault();
    var url = $('#url').val()
    if($.trim($('#url_title').val()) == 0 )
     {
         error_url_title = 'Please enter the URL title';
            $('#error_url_title').text(error_url_title);
         $('#url_title').css("border-color", "#cc0000")
        $('#url_title').css("background-color", "#ffff99")
        }
        else
        {
           error_url_title = '';
            $('#error_url_title').text(error_url_title);
          $('#url_title').css("border-color", "#ccc")
          $('#url_title').css("background-color", "#fff")
        }
         if($.trim($('#url').val()) == 0 )
     {
         error_url = 'Please enter the URL ';
            $('#error_url').text(error_url);
         $('#url').css("border-color", "#cc0000")
        $('#url').css("background-color", "#ffff99")
        }
        else
        {
              if(url.toLowerCase().indexOf(".com") >= 0)
              {
     
               error_url = '';
                $('#error_url').text(error_url);
              $('#url').css("border-color", "#ccc")
              $('#url').css("background-color", "#fff")
        
            }
            else
            {
               
             error_url = 'Please enter the appropriate URL/Link';
             $('#error_url').text(error_url);
             $('#url').css("border-color", "#cc0000")
            $('#url').css("background-color", "#ffff99")
            }
           
        }

        if(error_url== '' && error_url_title== '')
        {
         
          $.ajax({
            url:"insert_url.php",
            method:"POST",
            data: $("#insert_form").serialize(),
            success:function(data)
            { 
              if(data != "Error")
              {
              $("#insert_form")[0].reset();
              $("#add_url").modal('hide');
              $("#url_table").html(data);
              $("#error_repeating_url").attr("hidden", "true");
              $("#error_updating_url").attr("hidden", "true");
              }
              else
              {
                if($("#insert_url").val() == "Update Title & Url")
                {
                $("#error_updating_url").removeAttr("hidden");
                }
                else
                {
                  $("#error_repeating_url").removeAttr("hidden");
                }
              }
            }


          })
        }




  });
})

  //Url's

  //About OJS

  $("#insert_about_ojs_form").submit(function(event){
    event.preventDefault();
    if($.trim($('#about_ojs_description').val()) == 0 )
     {
         error_about_ojs_description = 'Please enter the Section Description';
            $('#error_about_ojs_description').text(error_about_ojs_description);
         $('#about_ojs_description').css("border-color", "#cc0000")
        $('#about_ojs_description').css("background-color", "#ffff99")
        }
        else
        {
           error_about_ojs_description = '';
            $('#error_about_ojs_description').text(error_about_ojs_description);
          $('#about_ojs_description').css("border-color", "#ccc")
          $('#about_ojs_description').css("background-color", "#fff")
        }
         if($.trim($('#about_ojs_title').val()) == 0 )
     {
         error_about_ojs_title = 'Please enter the Section Title ';
            $('#error_about_ojs_title').text(error_about_ojs_title);
         $('#about_ojs_title').css("border-color", "#cc0000")
        $('#about_ojs_title').css("background-color", "#ffff99")
        }
        else
        {
              error_about_ojs_title = '';
                $('#error_about_ojs_title').text(error_about_ojs_title);
              $('#about_ojs_title').css("border-color", "#ccc")
              $('#about_ojs_title').css("background-color", "#fff")
           
        }

          if(error_about_ojs_title== '' && error_about_ojs_description== '')
        {
         
          $.ajax({
            url:"insert_about_ojs.php",
            method:"POST",
            data: $("#insert_about_ojs_form").serialize(),
            success:function(data)
            { 
              $("#insert_about_ojs_form")[0].reset();
              $("#add_section_about_us").modal('hide');
              $("#about_ojs_table").html(data);
            }


          })
        }


  });


  $(document).on('click', '.add_about', function(){
    $("#insert_about_ojs_form")[0].reset();
     $("#about_ojs_id").val("");
    $("#insert_about_ojs").val("Add Title & Section");

    error_about_ojs_title = '';
                $('#error_about_ojs_title').text(error_about_ojs_title);
              $('#about_ojs_title').css("border-color", "#ccc")
              $('#about_ojs_title').css("background-color", "#fff")
           

                error_about_ojs_description = '';
            $('#error_about_ojs_description').text(error_about_ojs_description);
          $('#about_ojs_description').css("border-color", "#ccc")
          $('#about_ojs_description').css("background-color", "#fff")
  })

$("#delete_about_ojs_form").submit(function(event){
    event.preventDefault();
       $.ajax({
            url:"delete_about_ojs.php",
            method:"POST",
            data: $("#delete_about_ojs_form").serialize(),
            success:function(data)
            { 
              $("#delete_section_about_us").modal('hide');
              $("#about_ojs_table").html(data);
            }


          })
  })

 $(document).on('click', '.delete_about_ojs', function(){
    var about_ojs_id = $(this).attr("id");
    $.ajax({
      url:"fetch_about_ojs.php",
      method:"POST",
      data: {about_ojs_id:about_ojs_id},
      dataType: "json",
      success:function(data){
          $("#delete_about_ojs_description").val(data.ojs_title);
          $("#delete_about_ojs_title").val(data.ojs_description);
          $("#delete_about_ojs_id").val(data.about_ojs_id);  
          $("#delete_section_about_us").modal("show");  
      }
    })
  });

  $(document).on('click', '.edit_about_ojs', function(){
    var about_ojs_id = $(this).attr("id");
    $.ajax({
      url:"fetch_about_ojs.php",
      method:"POST",
      data: {about_ojs_id:about_ojs_id},
      dataType: "json",
      success:function(data){
          $("#about_ojs_title").val(data.ojs_title);
          $("#about_ojs_description").val(data.ojs_description);
          $("#about_ojs_id").val(data.about_ojs_id);  
          $("#insert_about_ojs").val("Update Section and Description");
          $("#add_section_about_us").modal("show");  
         
          error_about_ojs_title = '';
                $('#error_about_ojs_title').text(error_about_ojs_title);
              $('#about_ojs_title').css("border-color", "#ccc")
              $('#about_ojs_title').css("background-color", "#fff")
           

                error_about_ojs_description = '';
            $('#error_about_ojs_description').text(error_about_ojs_description);
          $('#about_ojs_description').css("border-color", "#ccc")
          $('#about_ojs_description').css("background-color", "#fff")
      }
    })
  });

  //About OJS
  //Downloadble Files

$("#insert_downloadble_form").submit(function(event){
    event.preventDefault();
    if($.trim($('#file_title').val()) == 0 )
     {
         error_file_title = 'Please enter the File Title';
            $('#error_file_title').text(error_file_title);
         $('#file_title').css("border-color", "#cc0000")
        $('#file_title').css("background-color", "#ffff99")
        }
        else
        {
           error_file_title = '';
            $('#error_file_title').text(error_file_title);
          $('#file_title').css("border-color", "#ccc")
          $('#file_title').css("background-color", "#fff")
        }
        
        if($.trim($('#downloadble_file').val()) == 0 )
     {
         error_file = 'Please enter the Section Title ';
            $('#error_file').text(error_file);
         $('#downloadble_file').css("border-color", "#cc0000")
        $('#downloadble_file').css("background-color", "#ffff99")
        }
        else
        {
              error_file = '';
                $('#error_file').text(error_file);
              $('#downloadble_file').css("border-color", "#ccc")
              $('#downloadble_file').css("background-color", "#fff")
        }

          if(error_file== '' && error_file_title== '')
        {
             $.ajax({
            url:"insert_downloadble.php",
            data: new FormData(this),
            processData: false, // important
            contentType: false, // important
            type: 'POST',
            success:function(data)
            { 
              $("#insert_downloadble_form")[0].reset();
              $("#add_downloadble_modal").modal('hide');
              $("#downloadble_table").html(data);
            }


          })
        }


  });



$("#downloadble_file").change( function(){
  if($("#insert_downloadble").val() == "Update File and Title"){
   $("#insert_downloadble").removeAttr("hidden");
  }
  else
  {
    if($("#insert_downloadble").val() == "Add Download Title and File"){
       $("#insert_downloadble").removeAttr("hidden");
      }
      else
      {
    $("#insert_downloadble").attr("hidden", "true");
  }
  }

});


$(document).on('click', '.add_downloadable', function(){
   $("#insert_downloadble").removeAttr("hidden");
  $("#Original_File_Type").attr("hidden", "true");
    $("#insert_downloadble_form")[0].reset();
     $("#downloadble_id").val("");
    $("#insert_downloadble").val("Add Download Title and File");

       error_file_title = '';
            $('#error_file_title').text(error_file_title);
          $('#file_title').css("border-color", "#ccc")
          $('#file_title').css("background-color", "#fff")
           
 error_file = '';
                $('#error_file').text(error_file);
              $('#downloadble_file').css("border-color", "#ccc")
              $('#downloadble_file').css("background-color", "#fff")
  })


$(document).on('click', '.edit_downloadble', function(){

    var download_id = $(this).attr("id");
    $.ajax({
      url:"fetch_downloadable.php",
      method:"POST",
      data: {download_id:download_id},
      dataType: "json",
      success:function(data){

          $("#file_title").val(data.downloadable_name);
          $("#original_file").val(data.downloadable_file);
          $("#Original_File_Type").removeAttr("hidden");
          $("#downloadble_id").val(data.downloadble_id);  
          $("#insert_downloadble").val("Update File and Title");
          $("#insert_downloadble").attr("hidden", "true")
           $("#add_downloadble_modal").modal("show"); 
         
            error_file_title = '';
            $('#error_file_title').text(error_file_title);
          $('#file_title').css("border-color", "#ccc");
          $('#file_title').css("background-color", "#fff");
           
               error_file = '';
                $('#error_file').text(error_file);
              $('#downloadble_file').css("border-color", "#ccc");
              $('#downloadble_file').css("background-color", "#fff");
      }
    })
  });

  $(document).on('click', '.delete_downloadble', function(){
    var download_id = $(this).attr("id");

    $.ajax({
      url:"fetch_downloadable.php",
      method:"POST",
      data: {download_id:download_id},
      dataType: "json",
      success:function(data){
          $("#delete_file_title").val(data.downloadable_name);
          $("#delete_original_file").val(data.downloadable_file);
          $("#delete_downloadble_id").val(data.downloadble_id);  
          $("#delete_downloadble_modal").modal("show");  
      }
    })
  });

$("#delete_downloadble_form").submit(function(event){
    event.preventDefault();
       $.ajax({
            url:"delete_downloadble.php",
            method:"POST",
            data: $("#delete_downloadble_form").serialize(),
            success:function(data)
            { 

              $("#delete_downloadble_modal").modal('hide');
               $("#downloadble_table").html(data);
            }


          })
  })

$(document).on('click', '.add_home_page_picture', function(){
    $("#insert_home_page_picture_form")[0].reset();
    $("#insert_home_page_picture").attr("hidden", "true");
     $("#picture_id").val("");
    $("#insert_home_page_picture").val("Add Picture in Home Page");
    $("#home_page_picture_preview").attr("src", "../../images/placeholder.png");
  });


$("#insert_home_page_picture_form").submit(function(event){
  event.preventDefault();

   $.ajax({
            url:"insert_home_page_picture.php",
            data: new FormData(this),
            processData: false, // important
            contentType: false, // important
            type: 'POST',
            success:function(data)
            { 
              $("#insert_downloadble_form")[0].reset();
              $("#insert_home_page_picture").attr("hidden", "true");

              $("#add_home_page_modal").modal('hide');
              $("#home_page_picture_table").html(data);
            }
          })
})

$(document).on('click', '.edit_home_page_picture', function(){
    var picture_id = $(this).attr("id");
    $.ajax({
      url:"fetch_home_page_picture.php",
      method:"POST",
      data: {picture_id:picture_id},
      dataType: "json",
      success:function(data){
          $("#home_page_picture_preview").attr("src", data.location);
           $("#picture_id").val(data.picture_id);
           $("#insert_home_page_picture").val("Update Picture in Home Page");
            $("#add_home_page_modal").modal("show"); 
           $("#insert_home_page_picture").attr("hidden");
               $("#insert_home_page_picture_form")[0].reset();

      }
    })
  });
  
    $(document).on('click', '.delete_home_page_picture', function(){
    var picture_id = $(this).attr("id");

    $.ajax({
      url:"fetch_home_page_picture.php",
      method:"POST",
      data: {picture_id:picture_id},
      dataType: "json",
      success:function(data){
          $("#delete_home_page_picture_preview").attr("src", data.location);
          $("#delete_picture_id").val(data.picture_id);  
          $("#delete_home_page_modal").modal("show");  
      }
    })
  });

 $("#delete_home_page_picture_form").submit(function(event){
    event.preventDefault();
       $.ajax({
            url:"delete_home_page_picture.php",
            method:"POST",
            data: $("#delete_home_page_picture_form").serialize(),
            success:function(data)
            { 
              $("#delete_home_page_modal").modal('hide');
               $("#home_page_picture_table").html(data);
            }


          })
  })

 $("#about_ojs_photo_form").submit(function(event){
  event.preventDefault();
         $.ajax({
            url:"insert_about_ojs_photo.php",
            data: new FormData(this),
            processData: false, // important
            contentType: false, // important
            type: 'POST',
            success:function(data)
            { 
             $("#about_ojs_photo_form")[0].reset();
             $("#save_picture").attr('hidden', 'true');
             $("about_ojs_picture_main").attr('hidden', data.location);
            }
          })
 })
</script>
<script type="text/javascript">
  
  //Picture
function triggerClick()
{
  document.querySelector("#about_ojs_photo").click();
}

function displayImage(e)
{
  if(isFileImage(e.files[0]))
  {
   document.querySelector("#save_picture").removeAttribute('hidden');
  }
  else
  {
     document.querySelector("#save_picture").setAttribute('hidden', 'true');
  }
   
  if(e.files[0])
  {
    var reader = new FileReader();
    reader.onload = function(e)
    {
      document.querySelector("#about_ojs_picture_main").setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
function isFileImage(file) {
    return file && file['type'].split('/')[0] === 'image';
}

function triggerClick2()
{
  document.querySelector("#home_page_picture").click();
}

function displayImage2(e)
{
  if(isFileImage(e.files[0]))
  {
   document.querySelector("#insert_home_page_picture").removeAttribute('hidden');
  }
  else
  {
    document.querySelector("#insert_home_page_picture").setAttribute('hidden', 'true');
  }
  if(e.files[0])
  {
    var reader = new FileReader();
    reader.onload = function(e)
    {
      document.querySelector("#home_page_picture_preview").setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>
</body>
</html>

