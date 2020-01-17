
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ISTR-OJS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">


<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="message.php" class="nav-link">Message</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>


        <!-- LOGOUT BUTTON -->
        <div style="padding-left: 16px; padding-right: 16px;s">
        <a type="button" class="btn btn-default" href="{{ route('logout') }}" 
          onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
        </form>
        </div>
     
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
      <img src="img/istrlogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ISTR-OJS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info" style="margin-left: 5%; margin-right: 5%;">
          <a href="profile.php" class="d-block">Gary Antionio Lirio</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
          <li class="nav-item">
            <a href="submit.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Submit Document</p>
            </a>
          </li>
               

          <li class="nav-header">LISTS</li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Documents
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>For Review</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>For Revision</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>For Editor in Chief</p>
                </a>
              </li>
                            
            </ul>
          </li>          
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Publish
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add a Journal</p>
                </a>
              </li>              
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add a Reviewer</p>
                </a>
              </li>              
            </ul>
          </li>
          
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Author's Guide</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Document Template</p>
            </a>
          </li>

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Title of Document</h1>
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
  <div class="row">
  
    <div class="col col-sm-12 col-md-8 col-lg-8">
    <div class="card  card-primary">
    <div class="card-header with-border">
    <h3 class="card-title"><b>Uploaded File(s)</b></h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-condensed table-striped"><tr><th>File Name</th><th>Original Name</th><th>Date Uploaded</th><th></th></tr><tr><td><h5><a href="https://apps.pup.edu.ph/ojs//data/document/PUPJST137/manuscript/PUPJSTM-137-1.docx" target="_blank">PUPJSTM-137-1.docx </a></h5></td><td><h5>technology.docx</h5></td><td colspan="2"><h5>2018-12-01 22:04:36</h5></td></tr></table>       </div>
        <div class="card-footer">
                </div>
      </div>
      
      <div class="card  card-primary">
        <div class="card-header with-border">
          <h3 class="card-title"><b>Article Metadata</b></h3>
        </div>
        <div class="card-body">
          <dl class="dl-horizontal">
            <dt>Title</dt>
            <dd style="margin-bottom:10px;">The Effects of Technology on Students’ Academic Performance</dd>
            <dt>Abstract</dt>
            <dd>Di&crarr;erent technologies have been implemented in the educational system in Norway over the last decade and it has been a subject of debate whether the use of technology enhances students&rsquo; educational outcomes. The aim of this master thesis is therefore to analyze the causal e&crarr;ect of the one-to-one laptop program in upper secondary education in Norway on the performance in three common core subjects: first-choice form of Norwegian, second-choice form of Norwegian, and English. The analysis is performed on a sample of 289 upper secondary schools in the time period from 2003 to 2016. We exploit data on average grades at school level and the rollout of the one-to-one laptop program across the country by using a generalized di&crarr;erence-in-di&crarr;erence approach and an event study specification. The results of this study indicate no clear benefits of technology use on academic performance in upper secondary education as no statistically significant e&crarr;ects are found. However, the true e&crarr;ect might be attenuated as the impact of laptops on students&rsquo; academic performance is complex, i.e. there are both positive and negative e&crarr;ects, and performance is only reported as an average at school level. The results presented in this thesis can be an important contribution to the literature in this field as little research has been conducted in Norway to interpret the causal relationship between technology and educational outcomes. The findings can hopefully inspire future research in the field to increase the knowledge on technology-led education. Moreover, it may also function as input for future decision making in the Norwegian educational system</dd>
            <dt>Author(s)</dt>
            <dd>
              <ul class="products-list product-list-in-box">
                <li class="item">
                            <div>
                              <a href="javascript::;" class="product-title">Isaac Novero</a>
                              <span class="product-description">
                                <p>Email Address: isaacnoobero@gmail.com</p>
                                <p>Affiliation: Paul Caronilo</p>
                              </span>
                            </div>
                          </li>             </ul>
            </dd>    
            </dl>
        </div>
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
                        Maganda 
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
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                        nulla
                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                        beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                        labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="card card-warning">
                    <div class="card-header">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#authorcollapse">
                          Author(s)
                        </a>
                      </h4>
                    </div>
                    <div id="authorcollapse" class="panel-collapse collapse">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                        nulla
                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                        beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                        labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                          Affiliation
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="card-body">
                        University of Sto. Tomas Group of Scientists
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
        <div class="card-body" style="max-height:600px; overflow-y:scroll;">
          
        </div>
      </div>





    </div>
  </div>
  
  
</section>  



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --><footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="http://pup.edu.ph">Polytechnic University of the Philippines</a>.</strong> All rights
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="js/demo.js"></script>

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
  $(function () {
    // Summernote
    $('.textarea').summernote()
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
