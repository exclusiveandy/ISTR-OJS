<?php include "../usercomponents/usernav.php" ; ?>
  

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<?php
$query_published = query("SELECT COUNT(research_id) as count, DATE_FORMAT(date_submitted, \"%M\") as month from research_table where status = \"Published\" GROUP by month order by month desc");
$data_month_publish = '';
$data_number_publish = '';
while($row_data_publish = fetch_assoc($query_published))
{
  $data_month_publish = $data_month_publish."'".$row_data_publish['month']."', ";
  $data_number_publish = $data_number_publish."'".$row_data_publish['count']."', ";
}
$data_month_publish = trim($data_month_publish, ",");
$data_number_publish = trim($data_number_publish, ",");

$query = query("SELECT COUNT(research_id) as count, DATE_FORMAT(date_submitted, \"%M\") as month from research_table GROUP by month order by month desc");
$data_month = '';
$data_number = '';
while($row_data = fetch_assoc($query))
{
  $data_month = $data_month."'".$row_data['month']."', ";
  $data_number = $data_number."'".$row_data['count']."', ";
}

$data_month = trim($data_month, ",");
$data_number = trim($data_number, ",");

$gender_query = query("SELECT COUNT(user_id) as count, gender from user_table group by gender");
$data_gender = '';
$data_number_gender = '';
while($row_gender_data = fetch_assoc($gender_query))
{
  $data_gender = $data_gender."'".$row_gender_data['gender']."', ";
  $data_number_gender = $data_number_gender."'".$row_gender_data['count']."', ";
}
$data_gender = trim($data_gender, ",");
$data_number_gender = trim($data_number_gender, ",");

$user_table = query("SELECT COUNT(user_id) as count, user_role_name from user_table u1 join user_role_table u2 on u1.user_role_id=u2.user_role_id  
  where user_role_name <> 'Admin' and activate = 1
  group by user_role_name");
$data_user_role = '';
$data_user_count = '';
while($row_user_data = fetch_assoc($user_table))
{
  $data_user_role = $data_user_role."'".$row_user_data['user_role_name']."', ";
  $data_user_count = $data_user_count."'".$row_user_data['count']."', ";
}
$data_user_role = trim($data_user_role, ",");
$data_user_count = trim($data_user_count, ",");



?>

         <?php 
    $journal_id = $_SESSION['journal_id'];
    $count_review_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     where user_role_id = '3' and r.journal_id='{$journal_id}' and status = \"On Editor in Chief\" order by research_id asc");
      $row_review_count = fetch_assoc($count_review_query);
     ?>
    <!-- Main content -->
    <div class="content">
      <div class="container">

      <section class="content">

      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> <?php
                    if($row_review_count['count'] != 0)
                    {
                    ?>
                    <?php echo $row_review_count['count'];?>
                    <?php
                    }
                     else
                    {
                      echo "-";
                    }
                  ?></h3>

                <p>For Review Articles</p>
              </div>
              <div class="icon">
                <i class="fas fa-barcode"></i>
              </div>
              <a href="for_review.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

    <?php
    $count_author_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     where user_role_id = '3' and r.journal_id='{$journal_id}' and (status = \"Rejected\" OR status = \"Accepted with Revisions\" OR status = \"To the Author for Consent\") order by research_id asc");
      $row_author_count = fetch_assoc($count_author_query);
     ?>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>    <?php
                    if($row_author_count['count'] != 0)
                    {
                    ?>
                    <?php echo $row_author_count['count'];?>
                    <?php
                    }
                     else
                    {
                      echo "-";
                    }
                  ?></h3>

                <p>For Managing Editors</p>
              </div>
              <div class="icon">
               <i class="fa fa-paper-plane"></i>
              </div>
              <a href="for_ME.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->


              <?php
    $count_EIC_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     where user_role_id = '3' and r.journal_id='{$journal_id}' and (status = \"Issue of Volume\" OR status = \"To the Proofreader\" OR status = \"To the Layout Editor\" OR status = \"Assigning of Volume and Issue\" or status = \"For Publication Office\")  order by research_id asc");
      $row_EIC_count = fetch_assoc($count_EIC_query);
     ?>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
                    if($row_EIC_count['count'] != 0)
                    {
                    ?>
                    <?php echo $row_EIC_count['count'];?>
 
                    <?php
                    }
                     else
                    {
                      echo "-";
                    }
                  ?></h3>

                <p>For the Publication Office</p>
              </div>
              <div class="icon">
                   <i class="fa fa-paper-plane"></i>
              </div>
              <a href="for_PO.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <?php
    $count_external_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     where user_role_id = '3' and r.journal_id='{$journal_id}' and (status = \"Assign an External Reviewer\") order by research_id asc");
      $row_external_count = fetch_assoc($count_external_query);
     ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3><?php
                    if($row_external_count['count'] != 0)
                    {
                    ?>
                    <?php echo $row_external_count['count'];?>
 
                    <?php
                    }
                     else
                    {
                      echo "-";
                    }
                  ?></h3>

                <p>Assign External Reviewer</p>
              </div>
              <div class="icon">
                  <i class="fas fa-user"></i>
              </div>
              <a href="for_external_reviewer.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

     <?php
    $count_internal_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     where user_role_id = '3' and r.journal_id='{$journal_id}' and (status = \"Assign an Internal Reviewer\") order by research_id asc");
      $row_internal_count = fetch_assoc($count_internal_query);
     ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3><?php
                    if($row_internal_count['count'] != 0)
                    {
                    ?>
                    <?php echo $row_internal_count['count'];?>
 
                    <?php
                    }
                     else
                    {
                      echo "-";
                    }
                  ?></h3>

                <p>Assign Internal Reviewer</p>
              </div>
              <div class="icon">
                  <i class="fas fa-user"></i>
              </div>
              <a href="for_internal_reviewer.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

<?php
  $count_pullout_query = query("SELECT COUNT(r.research_id) as count
     FROM `research_table`as r join reviewer_table r2 on r.research_id=r2.research_id  
     where (user_role_id = '4' or user_role_id = '5') and r.journal_id='{$journal_id}' and  DATEDIFF(date_expired, date_uploaded) <= 0 order by r.research_id asc");
      $row_pullout_count = fetch_assoc($count_pullout_query);
?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php
                    if($row_pullout_count['count'] != 0)
                    {
                    ?>
                    <?php echo $row_pullout_count['count'];?>
 
                    <?php
                    }
                     else
                    {
                      echo "-";
                    }
                  ?></h3>

                <p>Pull out Documents</p>
              </div>
              <div class="icon">
                 <i class="fas fa-sign-out-alt"></i>
              </div>
              <a href="reviewer_documents.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>


        </div>

            <!-- ./DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME
                    DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME
                    DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME
                    DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME-->

            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Document Statistics</h3>
              </div>
              <div class="card-body">

                <div class="chart">
                  <canvas id="barChart" style="height:230px"></canvas>
                </div>

              </div>
              <!-- /.card-body -->
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Population Statistics</h3>                      
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="height:230px"></canvas>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Editors Statictics</h3>                       
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart1" style="height:230px"></canvas>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
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

<script src="../../plugins/datatables/jquery.dataTables.js"></script>

<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>

<script src="../../js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../js/demo.js"></script>
<!-- page script -->

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
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
  
    var areaChartData = {
      labels  : [<?php echo $data_month;?>],
      datasets: [
        {
          label               : 'Publish Documents',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $data_number_publish;?>] // DATA COUNT // DATA COUNT // DATA COUNT // DATA COUNT 
        },
        {
          label               : 'Passed Document',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php echo $data_number;?>]// DATA COUNT // DATA COUNT // DATA COUNT // DATA COUNT 
        },
        
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
  
    

   
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })

   //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
        <?php echo $data_gender;?>
      ],
      datasets: [
        {
          data: [ <?php echo $data_number_gender;?>],
          backgroundColor : ['blue', '#800000'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })


     //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas1 = $('#donutChart1').get(0).getContext('2d')
    var donutData1        = {
      labels: [
       <?php echo $data_user_role?>
      ],
      datasets: [
        {
          data: [ <?php echo $data_user_count?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart1 = new Chart(donutChartCanvas1, {
      type: 'doughnut',
      data: donutData1,
      options: donutOptions      
    })

</script>







</body>
</html>
