<?php include("header.php");?>
  

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Publication Office Dashboard</h1>
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
  where u2.user_role_id <> '8'
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
    
    <!-- Main content -->
    <div class="content">
      <div class="container">

      <section class="content">

 <?php 
    $count_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     JOIN journal_table as j ON r.journal_id=j.journal_id 
     where user_role_id = '8' and r.status = \"Assigning of Volume and Issue\"");
      $row_count = fetch_assoc($count_query);
     ?>
     
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                   <h3> <?php
                    if($row_count['count'] != 0)
                    {
                    ?>
                    <?php echo $row_count['count'];?>
                    <?php
                    }
                    else
                    {
                      echo "-";
                    }
                  ?></h3>

                <p>Assigning of Volume and Issue</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-copy"></i>
              </div>
              <a href="assigning.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <?php
          $for_publishing_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     JOIN journal_table as j ON r.journal_id=j.journal_id 
     join volume_table as v on r.volume_id=v.volume_id
     where user_role_id = '8' and r.status = \"For Publishing\" and r.volume_id <> '0' order by research_id  asc");
           $row_publishing_count = fetch_assoc($for_publishing_query);
          ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php
                    if($row_count['count'] != 0)
                    {
                    ?>
                    <?php echo $row_publishing_count['count'];?>
                    <?php
                  }
                  else
                  {
                    echo "-";
                  }
                  ?>
                  </h3>

                <p>Publishing Documents</p>
              </div>
              <div class="icon">
                 <i class="nav-icon fas fa-copy"></i>
              </div>
              <a href="for_publishing.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->





          <?php
 $volume_query = query("SELECT COUNT(v.volume_id) as count from volume_table v join journal_table j on j.journal_id=v.journal_id where v.status ='0'");
  $row_volume_count = fetch_assoc($volume_query);
          ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                  <h3> <?php
                    if($row_volume_count['count'] != 0)
                    {
                    ?>
                    <?php echo $row_volume_count['count'];?>
                    <?php
                    }
                   else
                  {
                    echo "-";
                  }
                   
                  ?></h3>
                <p>Unpublished Volume and Issue</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-archive"></i>
              </div>
              <a href="Volume_Lists.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

<?php
 $published_volume_query = query("SELECT COUNT(v.volume_id) as count from volume_table v join journal_table j on j.journal_id=v.journal_id where v.status = 1");
$row_volume_published = fetch_assoc($published_volume_query);
?>




          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light">
              <div class="inner">
                  <h3> <?php
                    if($row_volume_published['count'] != 0)
                    {
                    ?>
                    <?php echo $row_volume_published['count'];?>
                    <?php
                    }
                     else
                  {
                    echo "-";
                  }
                  
                  ?></h3>                <p>Published Volume and Issue</p>
              </div>
              <div class="icon">
                  <i class="nav-icon fas fa-newspaper"></i>
              </div>
              <a href="published_volume.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->


          <?php
 $assign_proofreader_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     where user_role_id = '8' and status = \"To the Layout Editor\" order by research_id asc");
$row_assign_proofreader = fetch_assoc($assign_proofreader_query);
?>




          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light">
              <div class="inner">
                  <h3> <?php
                    if($row_assign_proofreader['count'] != 0)
                    {
                    ?>
                    <?php echo $row_assign_proofreader['count'];?>
                    <?php
                    }
                     else
                  {
                    echo "-";
                  }
                  
                  ?></h3>                <p>Assigning of Layout Editor</p>
              </div>
              <div class="icon">
                 <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="layouteditor_table.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->


          <?php
 $assign_proofreader_query = query("SELECT COUNT(research_id) as count
     FROM `research_table`as r 
     where user_role_id = '8' and status = \"To the Proofreader\" order by research_id asc");
$row_assign_layouteditor = fetch_assoc($assign_proofreader_query);
?>



          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light">
              <div class="inner">
                  <h3> <?php
                    if($row_assign_layouteditor['count'] != 0)
                    {
                    ?>
                    <?php echo $row_assign_layouteditor['count'];?>
                    <?php
                    }
                     else
                  {
                    echo "-";
                  }
                  
                  ?></h3>                <p>Assigning of Proofreader</p>
              </div>
              <div class="icon">
                  <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="proofreader_table.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

<?php

                  $count_pullout_query = query("SELECT COUNT(r.research_id) as count
     FROM `research_table`as r join proofreader_table r2 on r.research_id=r2.research_id  
     where (user_role_id = '6' or user_role_id = '7') and  DATEDIFF(date_expired, date_uploaded) <= 0 order by r.research_id asc");
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

                <p>Pull out Documents(Proofreader)</p>
              </div>
              <div class="icon">
                 <i class="fas fa-sign-out-alt"></i>
              </div>
              <a href="proofreader_documents.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

  <?php
               $count_pullout2_query = query("SELECT COUNT(r.research_id) as count
     FROM `research_table`as r join layouteditor_table r2 on r.research_id=r2.research_id  
     where (user_role_id = '7') and  DATEDIFF(date_expired, date_uploaded) <= 0 order by r.research_id asc");
      $row_count3 = fetch_assoc($count_pullout2_query);
      ?>
     <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php
                    if($row_count3['count'] != 0)
                    {
                    ?>
                    <?php echo $row_count3['count'];?>
 
                    <?php
                    }
                     else
                    {
                      echo "-";
                    }
                  ?></h3>

                <p>Pull out Documents(Layout Editor)</p>
              </div>
              <div class="icon">
                 <i class="fas fa-sign-out-alt"></i>
              </div>
              <a href="layouteditor_documents.php" class="small-box-footer">
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
