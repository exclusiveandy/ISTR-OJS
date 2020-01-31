<?php
 include "../../function.php"; 
if(!empty($_POST))
{
	$output = '';
	 		
	 		$delete_picture_id = $_POST['delete_picture_id'];
			 $query = "DELETE FROM ojs_home_page_picture Where picture_id = '{$delete_picture_id}'";
			 $message = "Data Deleted";
	 			$final_query = query($query);
	 	confirm($final_query);
			$output .= '<label class= "text-sucess">'.$message.'</label>';
			$sql = query("SELECT * from ojs_home_page_picture");
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