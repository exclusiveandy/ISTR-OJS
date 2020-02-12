<?php include("usernav.php");?>
  

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Reports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <?php
$user_id = $_SESSION['id'];
$query_published = query("SELECT month_table.month as month, COUNT(research_id) as count
FROM month_table
  LEFT JOIN research_table ON (month_table.id = MONTH(research_table.date_submitted) 
    AND research_table.user_id = '{$user_id}' and research_table.status = \"Published\"
  )
GROUP BY month_table.month
ORDER BY month_table.id ASC");
confirm($query_published);
$data_month_publish = '';
$data_number_publish = '';
while($row_data_publish = fetch_assoc($query_published))
{
  $data_month_publish = $data_month_publish."'".$row_data_publish['month']."', ";
  $data_number_publish = $data_number_publish."'".$row_data_publish['count']."', ";
}
$data_month_publish = trim($data_month_publish, ",");
$data_number_publish = trim($data_number_publish, ",");

$query = query("SELECT month_table.month as month, COUNT(research_id) as count
FROM month_table
  LEFT JOIN research_table ON (month_table.id = MONTH(research_table.date_submitted) 
    AND research_table.user_id = '{$user_id}'
  )
GROUP BY month_table.month
ORDER BY month_table.id ASC");
$data_month = '';
$data_number = '';
while($row_data = fetch_assoc($query))
{
  $data_month = $data_month."'".$row_data['month']."', ";
  $data_number = $data_number."'".$row_data['count']."', ";
}

$data_month = trim($data_month, ",");
$data_number = trim($data_number, ",");

$query = query("SELECT month_table.month as month, COUNT(research_id) as count
FROM month_table
  LEFT JOIN research_table ON (month_table.id = MONTH(research_table.date_submitted) 
    AND research_table.user_id = '{$user_id}' and research_table.status = \"Rejected\" and user_role_id = '1'
  )
GROUP BY month_table.month
ORDER BY month_table.id ASC");
$data_month_rejected = '';
$data_number_rejected = '';
while($row_data_rejected = fetch_assoc($query))
{
  $data_month_rejected = $data_month_rejected."'".$row_data_rejected['month']."', ";
  $data_number_rejected = $data_number_rejected."'".$row_data_rejected['count']."', ";
}
$data_month_rejected = trim($data_month_rejected, ",");
$data_number_rejected = trim($data_number_rejected, ",");



$query = query("SELECT DATE_FORMAT(research_table.date_submitted, \"%Y\") as year, COUNT(research_id) as count
FROM research_table
where research_table.user_id =  '{$user_id}'
group by year");
$data_year = '';
$data_number_year = '';
while($row_data = fetch_assoc($query))
{
  $data_year = $data_year."'".$row_data['year']."', ";
  $data_number_year = $data_number_year."'".$row_data['count']."', ";
}

$data_year = trim($data_year, ",");
$data_number_year = trim($data_number_year, ",");


$query = query("SELECT DATE_FORMAT(research_table.date_submitted, \"%Y\") as year, COUNT(research_id) as count
FROM research_table
where research_table.user_id =  '{$user_id}' and research_table.status = \"Published\"
group by year");
$data_number_published_year = '';
while($row_data = fetch_assoc($query))
{
  $data_number_published_year = $data_number_published_year."'".$row_data['count']."', ";
}
$data_number_published_year = trim($data_number_published_year, ",");


$query = query("SELECT DATE_FORMAT(research_table.date_submitted, \"%Y\") as year, COUNT(research_id) as count
FROM research_table
where research_table.user_id =  '{$user_id}' and research_table.status = \"Rejected\" and user_role_id = '1'

group by year");
$data_number_rejected_year = '';
while($row_data = fetch_assoc($query))
{
  $data_number_rejected_year = $data_number_rejected_year."'".$row_data['count']."', ";
}
$data_number_rejected_year = trim($data_number_rejected_year, ",");


$query = query("SELECT DATE_FORMAT(research_table.date_submitted, \"%Y\") as year, COUNT(research_id) as count
FROM research_table
where research_table.user_id =  '{$user_id}' and research_table.status = \"Rejected\" and user_role_id = '1'

group by year");
$data_number_rejected_year = '';
while($row_data = fetch_assoc($query))
{
  $data_number_rejected_year = $data_number_rejected_year."'".$row_data['count']."', ";
}
$data_number_rejected_year = trim($data_number_rejected_year, ",");

$query_rejected_ME = query("SELECT count(r.research_id) as count from research_file_history_table r
join research_table r2
on r2.research_id=r.research_id
where r2.user_id =  '{$user_id}' and r2.status = \"Rejected\" and r2.user_role_id = '1'
group by r.research_id
having  MAX(r.user_role_id)+1 = 2");
$data_rejected_me = fetch_assoc($query_rejected_ME);
$query_rejected_EIC = query("SELECT count(r.research_id) as count from research_file_history_table r
join research_table r2
on r2.research_id=r.research_id
where r2.user_id =  '{$user_id}' and r2.status = \"Rejected\" and r2.user_role_id = '1'
group by r.research_id
having  MAX(r.user_role_id)+1 = 3");
$data_rejected_EIC = fetch_assoc($query_rejected_EIC);
$query_rejected_IR = query("SELECT count(r.research_id) as count from research_file_history_table r
join research_table r2
on r2.research_id=r.research_id
where r2.user_id =  '{$user_id}' and r2.status = \"Rejected\" and r2.user_role_id = '1'
group by r.research_id
having  MAX(r.user_role_id)+1 = 4");
$data_rejected_IR = fetch_assoc($query_rejected_IR);
$query_rejected_ER = query("SELECT count(r.research_id) as count from research_file_history_table r
join research_table r2
on r2.research_id=r.research_id
where r2.user_id =  '{$user_id}' and r2.status = \"Rejected\" and r2.user_role_id = '1'
group by r.research_id
having  MAX(r.user_role_id)+1 = 4");
$data_rejected_ER = fetch_assoc($query_rejected_ER);
?>
    <!-- Main content -->
    <div class="content">
      <div class="container">

      <section class="content">

            <!-- ./DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME
                    DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME
                    DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME
                    DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME-->

            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Document Reports</h3>
                <a href="print_chart_report.php" class="btn btn-secondary btn-md url_add"  target="_blank"  style="float: right;" ><i class="fas fa-print"></i> Print</a>
              </div>
              <div class="card-body">
                  <div class="form-group">

                  <div class="row">
                    <div class="col-md-6">
                                        
                           
                                        
                    </div>
                    <div class="col-md-6">
                  

                  
                    </div>
                  </div>                    
                </div>

                <div class="chart">
                  <canvas id="barChart" style="height:230px"></canvas>
                </div>
                
                 <div class="chart">
                  <canvas id="barChartYear" style="height:230px"></canvas>
                </div>

              </div>
              <!-- /.card-body -->
            </div>

  <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Most Likely get Rejected by</h3>
              </div>
              <div class="card-body">
 <div class="card-body">
                        <canvas id="donutChart" style="height:230px"></canvas>
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
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
      var areaChartDataYear = {
      labels  : [<?php echo $data_year;?>],
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
          data                : [<?php echo $data_number_published_year;?>] // DATA COUNT // DATA COUNT // DATA COUNT // DATA COUNT 
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
          data                : [<?php echo $data_number_year;?>]// DATA COUNT // DATA COUNT // DATA COUNT // DATA COUNT 
        },
         {
          label               : 'Rejected Document',
          backgroundColor     : 'rgb(188, 30, 30)',
          borderColor         : 'rgb(188, 30, 30)',
          pointRadius         : false,
          pointColor          : 'rgb(188, 30, 30)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php echo $data_number_rejected_year;?>]// DATA COUNT // DATA COUNT // DATA COUNT // DATA COUNT 
        },
        
      ]
    }



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
         {
          label               : 'Rejected Document',
          backgroundColor     : 'rgb(188, 30, 30)',
          borderColor         : 'rgb(188, 30, 30)',
          pointRadius         : false,
          pointColor          : 'rgb(188, 30, 30)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php echo $data_number_rejected;?>]// DATA COUNT // DATA COUNT // DATA COUNT // DATA COUNT 
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

    var data1 = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',],
      datasets: [
        {
          label               : 'User Registration',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 100, 23, 27, 90, 23] // DATA COUNT // DATA COUNT // DATA COUNT // DATA COUNT 
        },
        
        
      ]
    }

    var dataop1 = {
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
  
    

    var barChartCanvasYear = $('#barChartYear').get(0).getContext('2d')
      
    var barChartDataYear = jQuery.extend(true, {}, areaChartDataYear)
    var temp0 = areaChartDataYear.datasets[0]
    var temp1 = areaChartDataYear.datasets[1]
    barChartDataYear.datasets[0] = temp1
    barChartDataYear.datasets[1] = temp0
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

      var barChart = new Chart(barChartCanvasYear, {
      type: 'bar', 
      data: barChartDataYear,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartData = jQuery.extend(true, {}, data1)

    var lineChartOptions = {
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

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line', 
      data: lineChartData,
      options: lineChartOptions
    })
  })
  

   //-------------

    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Managing Editor', 
          'Editor in Chief',
          'Internal Reviewer',
          'External Reviewer',
      ],
      datasets: [
        {
          data: [<?php echo $data_rejected_me['count'];?>,<?php echo $data_rejected_EIC['count'];?>,<?php echo $data_rejected_IR['count']?>,<?php echo $data_rejected_ER['count']?>  ],
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
          'Author', 
          'Managing Editor',
          'Editor In Chief', 
          'Internal Reviewer', 
          'External Reviewer', 
          'Publications', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
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

