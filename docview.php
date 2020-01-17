
<?php include "header.php";?>
<?php include "../function.php";?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
                 <?php if(isset($_GET['r_id']))
              {

                  $research_id = escape_string($_GET['r_id']);
                  $query = query("SELECT r_filename, s_filename, v.volume_id, volume, issue, DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, title, abstract, reference_code from research_table r join volume_table v on r.volume_id=v.volume_id where r.research_id = '{$research_id}'");
                  $author_query = query("SELECT * from authors_table where research_id = 
                    '{$research_id}'");
              
                  $row_research = fetch_assoc($query);
                }
                  ?>
            <h1><?php echo $row_research['title'];?></h1>
             
             <?php while($row_author = fetch_assoc($author_query))
             {

              ?>
             <h8><small><?php echo $row_author['authors_last_name']. " ".$row_author['authors_middle_name']. " ".$row_author['authors_first_name'];
             echo ";";?></small></h8>
             <?php
              }
              ?>
               <a href="volume_issue.php?v_id=<?php echo  $row_research['volume_id'];?>">Volume. <?php echo $row_research['volume'];?>, Issue.<?php echo $row_research['issue'];?> </a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>      
              <li class="breadcrumb-item active"><?php echo $row_research['title'];?></li>
              
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
                  <li class="nav-item"><a class="nav-link active" href="#tab_2" data-toggle="tab">Full Text PDF</a></li>                  
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Abstract/Details</a></li>
                 
                </ul>

              </div><!-- /.card-header -->     

              <div class="card-body">
                <div class="tab-content">
                

       
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="tab_2">
            <?php if(isset($_GET['r_id']))
              {

                  $research_id = escape_string($_GET['r_id']);
                  $query = query("SELECT r_filename,  research_id, s_filename, DATE_FORMAT(date_submitted, \"%M %d %Y\") as date_submitted, DATE_FORMAT(v.date_published, \"%M %d %Y\") as date_published, DATE_FORMAT(v.date_published, \" %Y\") as year,  j2.journal_name, title, abstract, volume, issue, reference_code from research_table r1 join journal_table j2 on r1.journal_id=j2.journal_id join volume_table v on r1.volume_id=v.volume_id   where r1.research_id = '{$research_id}'");
                  confirm($query);
                  $row = fetch_assoc($query)
                  
                   
              ?>
                      
                      
                          <?php 
                          $r_filename = $row['r_filename'];
                          $counter = $row['reference_code'];
                          $replacement = '('.$counter.').';
                          $pattern = '/[.]/';
                          $pdf_filename = preg_replace($pattern,$replacement,$r_filename);
                        $filename = substr($pdf_filename, 0, strpos($pdf_filename, "."));

                        ;?>
                        <div class="row">
 <div class="col-md-8">

   <iframe src ="../upload_pdf_file/<?php echo $filename;?>.pdf" width='800' height='840' scrolling="no"allowfullscreen webkitallowfullscreen></iframe>
                          

    </div>

   <div class="col-md-4">

      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title"><b>Options</b></h3>
        </div>
          <div class="card-body">
                         <button class="btn btn-primary"  style="box-sizing: border-box; display: block; width: 100%" onclick="window.location.href='download.php?path=../upload_pdf_file/<?php echo $filename;?>.pdf'"><i class="fa fa-download"></i> Download</button>
<br>
    <a class="btn btn-secondary" style="box-sizing: border-box; display: block; width: 100%" href="view_document_full.php?id=<?php echo $research_id?>" target="_blank">
         <i class="fas fa-expand"></i>  View Full Screen
      </a>
      <br>
       <button class="btn btn-warning" style="box-sizing: border-box; display: block; width: 100%" id="citation_btn" data-toggle="modal" data-target="#modal-default"><i class="fas fa-quote-left"></i> Citations</button><br>                       
                            
   </div>     
   </div>                   
                        
         </div>
                      
                      
                      
                      
                      </div>
                      

                            
                        </div>    
                  
              
                      
                  <div class="tab-pane" id="tab_4">
                      <label><h3>Abstract</h3></label>
                      <p><?php echo $row['abstract'];?></p>
                        <label><h3>Details</h3></label>
                      <table class="table table-bordered table-striped"   >
                        <tbody >
                          
                      
                        <tr>
                          <td>Title</td>
                          <td><?php echo $row['title'];?></td>
                        </tr>
                          <tr>
                          <td>Author/s</td>
                          <?php
                        $author_query = query("SELECT * from authors_table where research_id = 
                    '{$research_id}'");
                          ?>
                         <td>
                          <?php while($row_author = fetch_assoc($author_query))
             {    

              ?>
              <?php echo $row_author['authors_last_name']. " ".$row_author['authors_middle_name']. " ".$row_author['authors_first_name'];
             echo "<br>"?>
             <?php
           }
           ?>
            </td>
            </tr>
             <tr>
                          <td>Journal</td>
                          <td><?php echo $row['journal_name'];?></td>
                        </tr>
                        <tr>
                          <td>Volume</td>
                          <td><?php echo $row['volume'];?></td>
                        </tr>
                          <tr>
                          <td>Issue</td>
                          <td><?php echo $row['issue'];?></td>
                        </tr>
                        <tr>
                          <td>Url</td>
                          <td>http://localhost/OJS/istr/docview.php?r_id=<?php echo $row['research_id'];?></td>
                        </tr>
                        <tr>
                          <td>Date Submitted</td>
                          <td><?php echo $row['date_submitted'];?></td>
                        </tr>
                         <tr>
                          <td>Date Published</td>
                          <td><?php echo $row['date_published'];?></td>
                        </tr>

                        </tbody>
                      </table>

                
                  </div>

                   <?php
                      }
                      ?>

                 

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
 <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Citation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


                <div class="form-group">

                  <?php
                  $count_author_query = query("SELECT COUNT(authors_id) as count from authors_table where research_id = '{$research_id}'");
                  
                  $row_count = fetch_assoc($count_author_query);
                   
                  ?>
                <input type="hidden" id="count" value="<?php echo $row_count['count']?>">
                <input type="hidden" id="year" value="<?php echo $row['year']?>">
                <input type="hidden" id="title" value="<?php echo $row['title']?>">
                <input type="hidden" style="font-style: italic;" id="journal_name" value="<?php echo $row['journal_name']?>">
                <input type="hidden"  style="font-style: italic;" id="volume" value="<?php echo $row['volume']?>">
                <input type="hidden" id="issue" value="<?php echo $row['issue']?>">

                <input type="hidden" id="URL" value="http://localhost/OJS/istr/docview.php?r_id=<?php echo $row['research_id'];?>">
                <?php  $author_query = query("SELECT * from authors_table where research_id = 
                    '{$research_id}'");
                    while($row_author = fetch_assoc($author_query))

                    {

                    $first_name = substr($row_author['authors_first_name'], 0, 1);
                  $last_name  = $row_author['authors_last_name'];
                    if(!empty($row_author['authors_middle_name']))
                    {
                       $middle_name = substr($row_author['authors_middle_name'], 0, 1).". ";
                    }
                    else
                    {
                      $middle_name = " ";
                    }
                    
                      ?>
                      <p class='a_first_name2' hidden><?php echo $row_author['authors_first_name']?><p>
                        <p class='a_last_name2' hidden><?php echo $last_name?><p>
                    <p class='a_first_name' hidden><?php echo $first_name?><p>
                     <p class='a_middle_name' hidden><?php echo $middle_name?><p>
                      <p class='a_last_name' hidden><?php echo $last_name?><p>
                    <?php
                      }
                    ?>
                    <label style="text-align: center;">Citation Style</label>
                      <div class="form-group">

                    <select class="form-control" id="style">
                      <option value="0">APA format</option>
                      <option value="1">MLA format</option>
                      <option value="2">Chicago format</option>
                    </select>
                    <span id="error_line_number" class="text-danger"></span>

                  </div>
 </div>
              <div class="form-group">
               
                    <label for="exampleInputPassword1">Citation</label>
                     <div class="form-group">
                  <p id="citation"></p>
                     <span id="error_appraise" class="text-danger"></span>

                </div>
                </div>

               



            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


<!-- /.INSERT SCRIPT HERE!! -->


  <?php
  include "components/mainfooter.php";
  ?>


<script>

</script>



<!-- ./wrapper -->
 <script src="print.js"></script>
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
<!-- AdminLTE for demo purposes -->
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


$(document).ready(function(){
     var  a_first_name = [];
var a_middle_name = [];
var a_last_name = [];
  $('.a_first_name').each(function(){
   a_first_name.push($(this).text());
  });
   $('.a_middle_name').each(function(){
   a_middle_name.push($(this).text());
  });
    $('.a_last_name').each(function(){
   a_last_name.push($(this).text());
  });
var year = $("#year").val()
    var title = $("#title").val()
    var journal_name = $("#journal_name").val();
     var journal_name = journal_name.italics();
    var url = $("#URL").val();
    var volume = $("#volume").val();
    var issue = $("#issue").val();
    var issue = issue.italics();
    var i = 0;
    var name = " ";
    var check = a_first_name.length-2;
    var last = a_first_name.length - 1;
      for(i=0; i<a_first_name.length; i++)
        {
          if(i == check)
          {
       var name = name.concat(a_last_name[i]+", "+ a_middle_name[i]+a_first_name[i]+"., & ")
        }
        else if (i == last)
        {
          var name = name.concat(a_last_name[i]+", "+ a_middle_name[i]+a_first_name[i]+".")
        }
        else
        {
          var name = name.concat(a_last_name[i]+", "+ a_middle_name[i]+a_first_name[i]+"., ")
        }
        }
    $("#citation").html(name+" ("+year+"). "+title+". "+journal_name+", "+volume+"("+issue+")"+", (Pages). Retrieved from "+url)



})

  $("#style").change(function(){
   var style =  $("#style").val();
  if(style == 0)
  {
   var  a_first_name = [];
var a_middle_name = [];
var a_last_name = [];
  $('.a_first_name').each(function(){
   a_first_name.push($(this).text());
  });
   $('.a_middle_name').each(function(){
   a_middle_name.push($(this).text());
  });
    $('.a_last_name').each(function(){
   a_last_name.push($(this).text());
  });

    var year = $("#year").val()
    var title = $("#title").val()
    var journal_name = $("#journal_name").val();
     var journal_name = journal_name.italics();
    var url = $("#URL").val();
    var volume = $("#volume").val();
    var issue = $("#issue").val();
    var issue = issue.italics();
var i = 0;
    var name = " ";
    var check = a_first_name.length-2;
    var last = a_first_name.length - 1;
      for(i=0; i<a_first_name.length; i++)
        {
          if(i == check)
          {
       var name = name.concat(a_last_name[i]+", "+ a_middle_name[i]+a_first_name[i]+"., & ")
        }
        else if (i == last)
        {
          var name = name.concat(a_last_name[i]+", "+ a_middle_name[i]+a_first_name[i]+".")
        }
        else
        {
          var name = name.concat(a_last_name[i]+", "+ a_middle_name[i]+a_first_name[i]+"., ")
        }
        }
    $("#citation").html(name+" ("+year+"). "+title+". "+journal_name+", "+volume+"("+issue+")"+", (Pages). Retrieved from "+url)
  }
  else if(style == 1) 
  {
      var count = $("#count").val();
      var  a_first_name2 = [];
      var a_last_name2 = [];
      $('.a_first_name2').each(function(){
       a_first_name2.push($(this).text());
      });
        $('.a_last_name2').each(function(){
       a_last_name2.push($(this).text());
      });
    var year = $("#year").val()
    var title = $("#title").val()
    var journal_name = $("#journal_name").val();
     var journal_name = journal_name.italics();
    var url = $("#URL").val();
    var volume = $("#volume").val();
    var issue = $("#issue").val();
      if(count == 1)
      {
        $("#citation").html(a_last_name2[0]+", "+a_first_name2[0]+","+"\""+title+".\" "+journal_name+", vol."+volume+", no."+issue+
          ", "+year+", pp.(PAGES), "+url);
      }
      else if (count == 2) 
      {
        var i = 0;
    var name = " ";
    var last = a_last_name2.length - 1;
      for(i=0; i<a_last_name2.length; i++)
        {
           if (i == last)
          {
           var name = name.concat(a_last_name2[i]+", "+a_first_name2[i]+".")
          }
          else
          {
            var name = name.concat(a_last_name2[i]+", "+a_first_name2[i]+", and ")
          }
        }
        $("#citation").html(name+" \""+title+".\" "+journal_name+", vol."+volume+", no."+issue+
          ", "+year+", pp.(PAGES), "+url);
     
    }
    else
    {
      $("#citation").html(a_last_name2[0]+", "+a_first_name2[0]+", et al. "+"\""+title+".\" "+journal_name+", vol."+volume+", no."+issue+
          ", "+year+", pp.(PAGES), "+url);
    }


        
  }
      else
  {

      var count = $("#count").val();

      var  a_first_name2 = [];
      var a_last_name2 = [];
      $('.a_first_name2').each(function(){
       a_first_name2.push($(this).text());
      });
        $('.a_last_name2').each(function(){
       a_last_name2.push($(this).text());
      });
    var year = $("#year").val()
    var title = $("#title").val()
    var journal_name = $("#journal_name").val();
     var journal_name = journal_name.italics();
    var url = $("#URL").val();
    var volume = $("#volume").val();
    var issue = $("#issue").val();
      if(count == 1)
      {
        $("#citation").html(a_last_name2[0]+", "+a_first_name2[0]+", "+"\""+title+".\" "+journal_name+" "+volume+", no."+issue+
          ", ("+year+"): pp-pp, "+url);
      }
      else 
      {
        var i = 0;
    var name = " ";
    var last = a_last_name2.length - 1;
      var check = a_last_name2.length-2;
      for(i=0; i<a_last_name2.length; i++)
        {
           if (i == last)
          {
           var name = name.concat(a_last_name2[i]+", "+a_first_name2[i]+".")
          }
           else  if (i == check)
          {
             var name = name.concat(a_last_name2[i]+", "+a_first_name2[i]+". and ")
       
          }
          else
          {
            var name = name.concat(a_last_name2[i]+", "+a_first_name2[i]+". ")
          }
        }
        $("#citation").html(name+" \""+title+".\" "+journal_name+", vol."+volume+", no."+issue+
          ", "+year+", pp.(PAGES), "+url);
     
    }


        
  }

  })
      
</script>
</body>
</html>

