<?php
 include "../../../function.php";
if(!empty($_POST))
	{
		$output = '';
		$announcement_title = escape_string($_POST['announcement_title']);
		$announcement_description = escape_string($_POST['announcement_description']);
		$announcement_date = escape_string($_POST['announcement_date']);
		$insert_announcement = query("INSERT INTO announcement_table(announcement_title, announcement_description, announcement_date) VALUES('{$announcement_title}','{$announcement_description}', '{$announcement_date}')");
		$query= query("SELECT * from user_table");
		$message = $announcement_title." on ".$announcement_date;
		date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
		while($row_user = fetch_assoc($query))
		{
			$user_id = $row_user['user_id'];
			$insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type)
				VALUES('unread', '{$message}', '{$date}', '{$user_id}', 'calendar')");
		}

		confirm($insert_announcement);
		$message = "Data Inserted";
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