<?php
 include "../../function.php"; 
if(isset($_POST['file_title']) && !empty($_FILES))
{
	
	$title = $_POST['file_title'];
	$name = $_FILES['downloadble_file']['name'];
	$target = "../../downloadbles/".$name;
	move_uploaded_file($_FILES['downloadble_file']['tmp_name'], $target);
	$output = '';
	if(!empty($_POST['downloadble_id']))
	{
		$id = $_POST['downloadble_id'];
	 	$query = "UPDATE ojs_downloadbles SET downloadable_name = '{$title}', downloadable_file = '{$name}', location = '{$target}' where downloadble_id = '{$id}'";
	 	$message = "Data Updated";
	}
	else
	{
		
		 $query ="INSERT into ojs_downloadbles(downloadable_name, downloadable_file, location) VALUES('{$title}', '{$name}' ,'{$target}') ";
		 	$message = "Data Inserted";
	}
	 
	 	$final_query = query($query);
	 	confirm($final_query);
			$output .= '<label class= "text-sucess">'.$message.'</label>';
			$sql = query("SELECT * from ojs_downloadbles");
			$output .= '  <table  class="table table-bordered table-striped">
		                                <thead>
		                                <tr>
		                                  <th>Title</th>
                                  <th>file(filename)</th>
                                  <th>Actions</th>
		                                </tr>
		                                </thead>
		                                <tbody>';

			while($row = fetch_assoc($sql))
			{
					$output .= ' <tr>
		                                    <td>'. $row['downloadable_name'].'</td>
		                                    <td>'.$row['downloadable_file'].'</td>
		                                    <td><a href="download.php?path='.$row['location'].'" class="btn btn-info btn-md"><span class="fa fa-download"></span></a></td>
		                                     <td><button type="button" data-toggle="modal" i id="'.$row['downloadble_id'].'"class="btn btn-secondary btn-md edit_downloadble" >Edit</button></TD>
                                      <td><button type="button" data-toggle="modal"  id="'.$row['downloadble_id'].'"   class="btn btn-danger btn-md delete_downloadble" >Delete</button></TD>
		                                  </tr> ';
			}
			$output .=   '</tbody>
		                              </table>';
		     echo $output;
}
?>