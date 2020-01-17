<?php
 include "../../../function.php";
if(!empty($_POST))
	{
		$output = '';
		$id = $_POST['delete_annoucement_id'];
				$delete_annoucement = query("DELETE FROM announcement_table WHERE announcement_id = '{$id}'");
		confirm($delete_annoucement);
		$message = "Data Deleted";
			$output .= '<label class= "text-sucess">'.$message.'</label>';
			$sql = query("SELECT announcement_id, announcement_title, announcement_description, DATE_FORMAT(announcement_date, \"%M %d %Y\") as announcement_date from announcement_table");
			$output .= '   <table  class="table table-bordered table-striped">
                                <thead>
                                <tr>
                        <th>Title</th>
                        <th>Description(s)</th>
                        <th>Date to be Posted/Posted on</th>
                        <th>Action</th>
                      </tr>
                                </thead>
                                <tbody>';

			while($row = fetch_assoc($sql))
			{

			
					$output .= ' <tr>

		                                    
                                  <tr>
                                    <td>'.$row['announcement_title'].'</td>
                                    <td>'.$row['announcement_description'].'</td>
                                    <td>'.$row['announcement_date'].'</td>
                                    <td><button type="button" data-toggle="modal" id="'.$row['announcement_id'].'" class="btn btn-success btn-md edit_annoucement" >Edit</button></TD>
                                      <td><button type="button" data-toggle="modal" id="'.$row['announcement_id'].'"  class="btn btn-danger btn-md delete_annoucement" >Delete</button></TD>
                                  </tr>
                                    ';
			}
			$output .=   '</tbody>
		                              </table>';
		     echo $output;

	}
?>