<?php
 include "../../../function.php"; 
if(!empty($_POST))
{
	$output = '';
	 	
	 		$url_id = $_POST['delete_url_id'];
			 $query = "DELETE FROM ojs_page_url WHERE url_id = '{$url_id}' ";
			 $message = "Data Deleted";
	 		$final_query = query($query);
			confirm($final_query);
			$output .= '<label class= "text-sucess">'.$message.'</label>';
			$sql = query("SELECT * from ojs_page_url");
			$output .= '  <table  class="table table-bordered table-striped">
		                                <thead>
		                                <tr>
		                                  <th>Url Title</th>
		                                  <th>Url</th>
		                                  <th>Actions</th>
		                                </tr>
		                                </thead>
		                                <tbody>';

			while($row = fetch_assoc($sql))
			{
					$output .= ' <tr>
		                                    <td>'. $row['url_title'].'</td>
		                                    <td>'.$row['url'].'</td>
		                                    <td><button type="button" data-toggle="modal" data-target="#edit" id="'.$row['url_id'].'" class="btn btn-success btn-md edit_url" >Edit</button></TD>
		                                     <td><button type="button" data-toggle="modal" id="'.$row['url_id'].'"   class="btn btn-danger btn-md delete_url" >Delete</button></TD>
		                                  </tr> ';
			}
			$output .=   '</tbody>
		                              </table>';
		     echo $output;
 	}



?>