<?php
 include "../../function.php";
if(!empty($_POST['edit_annoucement_id']))
	{
		$output = '';
		$announcement_title = escape_string($_POST['edit_announcement_title']);
		$announcement_description = escape_string($_POST['edit_announcement_description']);
		$announcement_date = escape_string($_POST['edit_announcement_date']);
		$id = $_POST['edit_annoucement_id'];
				$insert_announcement = query("UPDATE announcement_table SET announcement_title = '{$announcement_title}', announcement_description = '{$announcement_description}', announcement_date ='{$announcement_date}' WHERE announcement_id = '{$id}'");
		confirm($insert_announcement);
		$message = "Data Updated";
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