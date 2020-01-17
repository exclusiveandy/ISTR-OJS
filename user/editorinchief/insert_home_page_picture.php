<?php
 include "../../../function.php"; 
if(!empty($_FILES))
{
	
	$name = $_FILES['home_page_picture']['name'];
	$target = "../../images/".$name;
	move_uploaded_file($_FILES['home_page_picture']['tmp_name'], $target);
	 date_default_timezone_set('Asia/Manila');
        $date = date("Y-m-d H:i:s");
	$output = '';
	if(!empty($_POST['picture_id']))
	{
		$id = $_POST['picture_id'];
	 	$query = "UPDATE ojs_home_page_picture SET picture_name = '{$name}', date_uploaded = '{$date}', location = '{$target}' where picture_id = '{$id}'";
	 	$message = "Data Updated";
	 	resize_image($target, 1600, 300, $target);
	}
	else
	{
		
		 $query ="INSERT into ojs_home_page_picture(picture_name, date_uploaded, location) VALUES('{$name}', '{$date}' ,'{$target}') ";
		$message = "Data Inserted";
		resize_image($target, 1600, 300, $target);
	}
	 
	 	$final_query = query($query);
	 	confirm($final_query);
			$output .= '<label class= "text-sucess">'.$message.'</label>';
			$sql = query("SELECT * FROM ojs_home_page_picture");
			$output .= '   <table  class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Picture</th>
                                  <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>';

			while($row = fetch_assoc($sql))
			{

					
					
					$output .= ' <tr>

		                                    
		                                      <td><img src="'.$row['location'].'"  alt="ojslogo" id="about_ojs_picture" width="250px" height="250px"></td>
		                                    <td><a href="download.php?path='.$row['location'].'" class="btn btn-info btn-md"><span class="fa fa-download"></span></a></td>
		                                     <td><button type="button" data-toggle="modal" i id="'.$row['picture_id'].'"class="btn btn-secondary btn-md edit_home_page_picture" >Edit</button></TD>
                                      <td><button type="button" data-toggle="modal"  id="'.$row['picture_id'].'"   class="btn btn-danger btn-md delete_home_page_picture" >Delete</button></TD>
		                                  </tr> ';
			}
			$output .=   '</tbody>
		                              </table>';
		     echo $output;
}
?>