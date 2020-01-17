<?php include("header.php");?>
  

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


    
    <!-- Main content -->
    <div class="content">
      <div class="container">

      <section class="content">

      <div class="row">
          <div class="col-md-6">

          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Registration Report</h3>
              </div>
              <div class="card-body">
                <!-- Date range -->
                <div class="form-group">
                  <label>Date range:</label>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">                    
                            <input type="date" class="form-control float-right" id="reservation">
                        </div>                    
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">                    
                            <input type="date" class="form-control float-right" id="reservation">
                        </div>
                    </div>
                  </div>                    
                </div>

                <div class="card-body">
                        <canvas id="lineChart" style="height:230px"></canvas>
                </div>

                <button class="btn btn-block btn-primary">Apply</button>


               

              


              </div>
              <!-- /.card-body -->
            </div>

          </div><!-- ./col -->

          <div class="col-md-6">

          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Document Status Report</h3>
              </div>
              <div class="card-body">
                <!-- Date range -->

                <div class="form-group">
                  <label>Date range:</label>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">                    
                            <input type="date" class="form-control float-right" id="reservation">
                        </div>                    
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">                    
                            <input type="date" class="form-control float-right" id="reservation">
                        </div>
                    </div>
                  </div>                    
                </div>
               

                <div class="card-body">
                        <canvas id="donutChart" style="height:230px"></canvas>
                </div>

                <button class="btn btn-block btn-primary">Apply</button>


               

              


              </div>
              <!-- /.card-body -->
            </div>

          </div>
        </div>

            <!-- ./DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME
                    DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME
                    DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME
                    DOCUMENT PASSED OVERTIME DOCUMENT PASSED OVERTIME-->

            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Document Reports</h3>
              </div>
              <div class="card-body">

                <div class="chart">
                  <canvas id="barChart" style="height:230px"></canvas>
                </div>

              </div>
              <!-- /.card-body -->
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
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',],
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
          data                : [28, 48, 40, 19, 86, 27, 100, 23, 27, 90, 23] // DATA COUNT // DATA COUNT // DATA COUNT // DATA COUNT 
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
          data                : [65, 59, 80, 81, 56, 55, 40, 27, 90, 23]// DATA COUNT // DATA COUNT // DATA COUNT // DATA COUNT 
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
          'Publish', 
          'Rejected',
      ],
      datasets: [
        {
          data: [700,500],
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
