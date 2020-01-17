
<?php include "header.php";?>
<?php include "../function.php";?>
<?php
if(isset($_GET['v_id']))
{
$volume_id = $_GET['v_id'];
}
$journal_query = query("SELECT volume_id, volume, issue, journal_name from volume_table v
join journal_table j 
on v.journal_id=j.journal_id
where volume_id = '{$volume_id}'");
$row_journal = fetch_assoc($journal_query);
?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; "><?php echo $row_journal['journal_name'];?> Archives</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">List of Archieves</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



    <!-- Main content -->
    <div class="content">
      <div class="container">

   

      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="card card-danger">            
            <div class="card-body">

            <!-- /.d2 mag simula ng loop -->
       <?php 
       $volume_query = query("SELECT volume, volume_id, issue, cover_page, DATE_FORMAT(date_published, \"%M %d %Y\") as date_published,
       	 DATE_FORMAT(date_published, \"%Y\") as year
       	 from volume_table v where v.volume_id = '{$volume_id}' AND v.status = 
        '1'");
       confirm($volume_query);
    $row_volume = fetch_assoc($volume_query)
       
        ?>
              <ul class="timeline">
              <li  class="time-label">
                <span class=""><?php echo $row_volume['date_published'];?> </span>            <!-- /.GROUPED BY YEAR AND MONTH -->
              </li>
              <li><i class="fa fa-book bg-blue"></i>	
                <div class="timeline-item timeline-danger">

                    <h3 class="timeline-header"><a href="#"><?php echo $row_journal['journal_name']." ".$row_volume['year']." Volume ".
                    $row_volume['volume']." Issue ".$row_volume['issue']?></a></h3>

                    <div class="timeline-body">
                      <div class="row">

                          <div class="col-md-2 col-sm-2" style="text-align: center;">
                            <img src="images/<?php echo $row_volume['cover_page'];?>" alt="journal pic" height="220" width="150" class="img-thumbnail"/>				
                            <br>
                            <br>

                    
                          </div>

                          <div class="col-md-10 col-sm-10">
                              <p class="lead">Article(s)</p>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Title</th>
                                  <th>Author(s)</th>
                                  <th></th>
                                </tr>
                              </thead>
                                     <tbody>
                                <?php
                                $v_id = $row_volume['volume_id'];
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
                                <td><a class="btn btn-primary btn-xs"  href="docview.php?r_id=<?php echo  $row_article['research_id'];?>">View</a></td>
                                <?php
                              }
                              ?>
                            </tbody>
                            </table>
                            
                          </div>

                        </div>
                      </div>
                  </div>
                </li>				
                </ul>
                <!-- /.END ng loop -->
             
                













            </div>
          </div>
        </div>
      </div>




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
  </div>  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <?php
  include "components/mainfooter.php";
  ?>


<!-- ./wrapper -->


