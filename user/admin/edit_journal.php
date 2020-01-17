
<?php include "header.php" ;
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Journal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>   
              <li class="breadcrumb-item"><a href="journal.php">Manage Journal</a></li>     
              <li class="breadcrumb-item active">Add</li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
       
       <div class="container-fluid">

      
              

       <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($_GET['id']))
              {
              	$id = $_GET['id'];
              	$sql = query("SELECT * from journal_table where journal_id ='{$id}'");
              	while($row = fetch_assoc($sql))
              	{


              ?>
              <form role="addjournal.php" method="POST" enctype="multipart/form-data" id="form" name="form">
                <div class="card-body">
                  <div class="form-group">

                  <input type="hidden" name="id" id="id" value="<?php echo $id;?>">

                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" placeholder="Enter the title" name="title" id="title" value="<?php echo $row['journal_name'];?>">
                     <span id="error_title" class="text-danger"></span>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea  class="form-control" id="Description" name=Description rows="10" cols="50" ><?php echo $row['description'];?></textarea>
                      <span id="error_description" class="text-danger"></span>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Print ISSN</label>
                    <input type="text" class="form-control" id="Print_issn" name="Print_issn"  placeholder="Enter Print ISSN" value="<?php echo $row['print_issn'];?>" >
                    <span id="error_print_issn" class="text-danger"></span>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Online ISSN</label>
                    <input type="text" class="form-control" id="Online_issn" name="Online_issn" placeholder="Enter Online ISSN" value="<?php echo $row['online_issn'];?>">
                      <span id="error_online_issn" class="text-danger"></span>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Enter email" value="<?php echo $row['email_address'];?>">
                    <span id="error_email" class="text-danger"></span>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Picture</label>
                    <div class="input-group">
                      <div class="custom-file" >
                        <input type="file" name="journal_picture" id="journal_picture" onchange="displayImage(this)">	
                      </div>
                      
                    </div>
                  </div>




                  







                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"  id="submit" name="submit">SAVE</button>
                </div>
              </form>
            </div>

</div>
<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <img src="../../images/<?php echo $row['journal_image'];}}?>"
              onclick="triggerClick()" 
              style="margin-right: 15px;"
              alt="Image Picture" 
              height="120%" 
              width="120%" class="img-thumbnail"
              id="journal_display"/>

                        
            </div>

</div><!-- /. col -->

</div><!-- /.row row row -->




			



                




      </div><!-- /.container fluid -->

	

    </section><!-- /.section class content -->







  </div> <!-- /.content wrapper -->















@include('layouts_user.footer')

<!-- /.INSERT SCRIPT HERE!! -->


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
<script >
	$("#form").submit(function(event){
			event.preventDefault();
		
			var form = new FormData();
			error_image = '';
		if(document.getElementById("journal_picture").files.length != 0)
		{
			var property = document.getElementById("journal_picture").files[0];
			var image_name = property.name;
			var image_size = property.size;
			var image_extension = image_name.split('.').pop().toLowerCase();
		
			if(jQuery.inArray(image_extension, ['jpg', 'jpeg', 'png']) == -1)
			{
				error_image = "Invalid Image File";
				alert("Invalid Image File");

			}
			else if(image_size > 2000000)
			{
			error_image = "Image File is very big";
			 alert("Image File is very big");
			}
			else
			{
				error_image = '';
				form.append('journal_picture', property);
			}
		}
	

		if($.trim($('#title').val()) == 0 )
        {
         error_title = 'Please enter the title of the Journal';
            $('#error_title').text(error_title);
         $('#title').css("border-color", "#cc0000")
        $('#title').css("background-color", "#ffff99")
        }
        else
        {
           error_title = '';
            $('#error_title').text(error_title);
          $('#title').css("border-color", "#ccc")
          $('#title').css("background-color", "#fff")
        }
        		if($.trim($('#Description').val()) == 0 )
        {
         error_description = 'Please enter the Description of the journal';
            $('#error_description').text(error_description);
         $('#Description').css("border-color", "#cc0000")
        $('#Description').css("background-color", "#ffff99")
        }
        else
        {
           error_description = '';
            $('#error_description').text(error_description);
          $('#Description').css("border-color", "#ccc")
          $('#Description').css("background-color", "#fff")
        }
               		if($.trim($('#Print_issn').val()) == 0 )
        {
         error_print_issn = 'Please enter the Print ISSN';
            $('#error_print_issn').text(error_print_issn);
         $('#Print_issn').css("border-color", "#cc0000")
        $('#Print_issn').css("background-color", "#ffff99")
        }
        else
        {
           error_print_issn = '';
            $('#error_print_issn').text(error_print_issn);
          $('#Print_issn').css("border-color", "#ccc")
          $('#Print_issn').css("background-color", "#fff")
        }
                     		if($.trim($('#Online_issn').val()) == 0 )
        {
         error_online_issn = 'Please enter the Online ISSN';
            $('#error_online_issn').text(error_online_issn);
         $('#Online_issn').css("border-color", "#cc0000")
        $('#Online_issn').css("background-color", "#ffff99")
        }
        else
        {
           error_online_issn = '';
            $('#error_online_issn').text(error_online_issn);
          $('#Online_issn').css("border-color", "#ccc")
          $('#Online_issn').css("background-color", "#fff")
        }
        
          if($.trim($('#email_address').val()) == 0 )
        {
         error_email = 'Please enter the email address'
            $('#error_email').text(error_email);
         $('#email_address').css("border-color", "#cc0000")
        $('#email_address').css("background-color", "#ffff99")
        }
        else
        {
           error_email = '';
            $('#error_email').text(error_email);
          $('#email_address').css("border-color", "#ccc")
          $('#email_address').css("background-color", "#fff")
        }
        



        if(error_title == '' && error_email == '' && error_description == '' && error_online_issn == '' && error_print_issn == '' && error_image == '')
        {
        	var title = $("#title").val();
        	var email = $("#email_address").val();
        	var desc = $("#Description").val();
        	var Online_issn = $("#Online_issn").val();
        	var Print_issn = $("#Print_issn").val();
        	var id = $("#id").val();
        	form.append('title', title);
        	form.append('Description', desc);
        	form.append('Online_issn', Online_issn);
        	form.append('Print_issn', Print_issn);
        	form.append('email_address', email);
        	form.append('id', id);
        	 $.ajax({
            url: 'UPDATE_JOURNAL.php',
            method: 'POST',
        	data: form,
        	processData: false, // important
            contentType: false, // important
        	success: function()
        	{
        			window.location.href = "journal.php";
        	}
        		})
        }  
        


	})


	
	function displayImage(e){
		if(e.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				document.querySelector('#journal_display').setAttribute('src', e.target.result);

			}
				reader.readAsDataURL(e.files[0]);
		}
	}
	
	function triggerClick(){
		document.querySelector('#journal_picture').click();
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

