<?php include("usernav.php");?>
  
<?php
$v_id = $_GET['v_id'];
$volume_query = query("SELECT v.status, cover_page, v.volume_id, volume, v.status, j.journal_name, issue, DATE_FORMAT(date_open, \"%Y\") as date_open from volume_table v join journal_table j on v.journal_id = j.journal_id where volume_id = '{$v_id}'");
  confirm($volume_query);
$row_volume = fetch_assoc($volume_query);
$count_query = query("SELECT COUNT(research_id)  as count from research_table where volume_id = '{$v_id}'");
$row_count = fetch_assoc($count_query);
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Volume <?php echo $row_volume['volume'];?> & Issue  <?php echo $row_volume['issue'];?>  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="">Volume</a></li>
              <li class="breadcrumb-item active">Volume & Issue Content</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    
    <!-- Main content -->
    <div class="content">
      <div class="container">

      <section class="content">

        <div class="alert alert-danger  text-center" id="error_count" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The volume should contain 5 articles before it can be publish</strong></h3> 
        </div>

      <div class="alert alert-danger  text-center" id="error_cover" role="alert" style="display:none; position:fixed; top: 0px; left: 0px; width: 100%; z-index:9999; border-radius:0px"><h3><strong>The Cover Page for this Volume is missing</strong></h3> 
        </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                    <?php echo $row_volume['journal_name'];?>, <?php echo $row_volume['date_open'];?>, Volume <?php echo $row_volume['volume'];?> & Issue  <?php echo $row_volume['issue'];?>
                    </h2>
                </div>
                <div class="card-body">
                <div class="timeline-body">
            
                <div class="timeline-item timeline-success">
                   
                      <div class="row">
                   
                          <div class="col-md-2 col-sm-2" style="text-align: center;">
                            <img src=
                            <?php
                            if (empty( $row_volume['cover_page'])) 
                            {
                            ?>
                            "../../images/image-placeholder.jpg"
                          <?php
                          }
                          else
                          {
                            ?>
                            "../../images/<?php echo $row_volume['cover_page']?>"
                          <?php
                          }
                          ?>
                             alt="journal pic" onclick="triggerClick()" id="cover_pic" height="220" width="150" class="img-thumbnail"/>				
                          
                            <br>
                            <br>
                            <strong style="color:#800 !important;">Cover Page</strong>  
                          </div>
                         

                          <div class="col-md-10 col-sm-10">
                           <input type="hidden" name="volume_id" id="volume_id" value="<?php echo $v_id;?>">


                              <p class="lead">Article(s)</p>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Title</th>
                                  <th>Author(s)</th>
                                  <th>View</th>
                                  <?php
                                if( $row_volume['status'] == 0)
                                {
                                ?>
                                  <th>Remove</th>
                                   <?php
                                  }
                                ?>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $article_query = query("SELECT  v.status, title, research_id from research_table r  join  volume_table v on 
                                  r.volume_id = v.volume_id where v.volume_id = '{$v_id}'");
                                confirm($article_query);
                                while($row_article = fetch_assoc($article_query))
                                {
                                ?>
                              <tr>
                                <td><?php echo $row_article['title'];?></td>
                                <td>
                                <?php
                                $author_query = query("SELECT authors_first_name, authors_last_name, authors_middle_name from authors_table  where research_id = '{$row_article['research_id']}'");
                                while($row_author = fetch_assoc($author_query))
                                {
                                ?>
                                <?php echo $row_author['authors_last_name'].", ";
                                if(!empty($row_author['authors_middle_name']))
                                  {
                                 echo $row_author['authors_middle_name'].", ";
                                  }
                                  echo $row_author['authors_first_name'];
                                echo "</br>";?>
                                  <?php
                              }
                                ?>
                                </td>
                                <td><a class="btn btn-primary btn-xs"  href="view_document.php?r_id=<?php echo  $row_article['research_id'];?>">View</a></td>
                                <?php
                                if( $row_article['status'] == 0)
                                {
                                ?>
                                <td><a class="btn btn-danger btn-xs"  href="remove_article_volume.php?r_id=<?php echo  $row_article['research_id'];?>&v_id=<?php echo $row_volume['volume_id']?>">Remove</a></td>
                                <?php
                                  }
                                ?>
                              </tr>
                    <?php
                  }
                    ?>
                         
                            </table>
  
                            <div class="form-group" hidden>
                                <label for="exampleInputFile">Cover Page</label>
                                <div class="input-group">                      
                                    <input type="file" onchange="displayImage(this)" id="filetype" name="filetype">
                                </div>                     
                            </div>
                         
                          </div>

                        </div>
                      </div>
                  </div>
                </div>
                <?php
                  if($row_volume['status'] != 1)
                  {
                ?>
                <div class="card-footer">
                <div id="loader" style="display: none; text-align: right;">
                 <img src="../../images/loading3.gif" width="50px" height="50px">
                 </div>
                  <button type="submit" class="btn btn-success float-right" id="Publish">Publish</button>
                </div>
                  <?php
                    }
                  ?>

            </div>


            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Add Article</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <label>Publish Article List's</label>
                            <input type="text" name="title"  class="form-control" disabled value="aw">
                        </div>
                    
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add</button>
                    </div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
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
  $("#Publish").click(function(e){
  

    e.preventDefault();
  var myFormData = new FormData();
  var volume_id = $("#volume_id").val();
  var file = $("#file").val();
  myFormData.append('volume_id', volume_id);
  myFormData.append('file', filetype.files[0]);
          $.ajax({
            url: 'publish_document.php',
            data: myFormData,
            processData: false, // important
            contentType: false, // important
            type: 'POST',  
        beforeSend: function(data){
               $("#loader").show();
               $("#Publish").attr("hidden", "true");
              },  
           success: function(data){
             if(data == "Error in Number of Articles")
             {
                     $("#loader").hide();
                     $("#Publish").removeAttr("hidden", "true");
                   $('#error_count').fadeIn(500);  
                    setTimeout(function(){
                    $('#error_count').hide(); 
                  }, 10000);
             }
             else if(data == "Missing Cover Page")
             {
                  $("#loader").hide();
                $("#Publish").removeAttr("hidden", "true");
                $('#error_cover').fadeIn(500);  
                setTimeout(function(){
                              $('#error_cover').hide(); 
                            }, 10000);
                       }
             else
             {
                    $(window).attr('location', 'home.php');   
            }
          }
               

    })

  })
</script>
<script>
  function triggerClick()
  {
    document.querySelector("#filetype").click();
  }
  function displayImage(e)
  {
    if(e.files[0])
    {

      var reader = new FileReader();
      reader.onload = function(e)
      {
        document.querySelector('#cover_pic').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]); 

    }
  }
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
