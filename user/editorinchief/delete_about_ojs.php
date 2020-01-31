<?php
 include "../../function.php"; 
if(!empty($_POST))
{
	$output = '';
	 	
	 		$about_ojs_id = $_POST['delete_about_ojs_id'];
			 $query = "DELETE FROM about_ojs WHERE about_ojs_id = '{$about_ojs_id}' ";
			 $message = "Data Deleted";
	 		$final_query = query($query);
			confirm($final_query);
			$final_query = query($query);
	 	confirm($final_query);
			$output .= '<label class= "text-sucess">'.$message.'</label>';
			$sql = query("SELECT * from about_ojs");
			$output .= '  <table  class="table table-bordered table-striped">
		                                <thead>
		                                <tr>
		                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Actions</th>
		                                </tr>
		                                </thead>
		                                <tbody>';

			while($row = fetch_assoc($sql))
			{
					$output .= ' <tr>
		                                    <td>'. $row['ojs_title'].'</td>
		                                    <td>'.$row['ojs_description'].'</td>
		                                    <td><button type="button" data-toggle="modal" id="'.$row['about_ojs_id'].'" class="btn btn-success btn-md edit_about_ojs" >Edit</button></TD>
                                      <td><button type="button" data-toggle="modal" id="'.$row['about_ojs_id'].'"   class="btn btn-danger btn-md delete_about_ojs">Delete</button></TD>
		                                  </tr>';
			}
			$output .=   '</tbody>
		                              </table>';
		     echo $output;
}


?>