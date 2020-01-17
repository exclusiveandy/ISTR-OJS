<?php
 include "../../../function.php"; 
if(!empty($_POST))
{
	$output = '';
	 		
	 		$downloadable_id = $_POST['delete_downloadble_id'];
			 $query = "DELETE FROM ojs_downloadbles WHERE downloadble_id = '{$downloadable_id}' ";
			 $message = "Data Deleted";
			$final_query = query($query);
	 	confirm($final_query);
			$output .= '<label class= "text-sucess">'.$message.'</label>';
			$sql = query("SELECT * from ojs_downloadbles");
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