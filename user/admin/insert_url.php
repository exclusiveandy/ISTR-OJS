

<?php
 include "../../../function.php"; 
if(!empty($_POST))
{
	$url = escape_string($_POST['url']);
	$url_title = escape_string($_POST['url_title']);
	$output = '';
	$repeat_url = query("SELECT * from ojs_page_url where url_title = '{$url_title}' AND url='{$url}'");
	 if(row_count($repeat_url) == 0)
	 {
	 	if(!empty($_POST['url_id']))
	 	{
	 		$url_id = $_POST['url_id'];
			 $query = "UPDATE ojs_page_url SET url_title = '{$url_title}', url = '{$url}' WHERE url_id = '{$url_id}' ";
			 $message = "Data Updated";
	 	}
	 	else
	 	{
	 		$query = "INSERT into ojs_page_url(url_title,url) VALUES('{$url_title}', '{$url}')";
	 		$message = "Data Inserted";
	 	}
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
 	else
 	{
 		$output = "Error";
 		 echo $output;
 	}

}
?>