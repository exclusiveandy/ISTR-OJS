<?php
include "../../../function.php";
if(isset($_POST['volume_id']))
{
	$volume_id = $_POST['volume_id'];
	$count_query = query("SELECT COUNT(research_id)  as count from research_table where volume_id = '{$volume_id}'");
	confirm($count_query);
	date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
	$row_count = fetch_assoc($count_query);




	if($row_count['count'] >= 5)
	{
		$chk_query = query("SELECT cover_page from volume_table where volume_id= '{$volume_id}'");
		$row_cover_page = fetch_assoc($chk_query);

			if(isset($_FILES['file']['tmp_name']) || !empty($row_cover_page['cover_page']))
			{
				if(isset($_FILES['file']['tmp_name']))
			{
				$filename = $_FILES['file']['name'];
				$target = "../../images/".$filename;
				move_uploaded_file($_FILES['file']['tmp_name'], $target);
				$update_query = query("UPDATE volume_table set status = '1', cover_page = '{$filename}', date_published = '{$date}' where volume_id =  '{$volume_id}'");
				confirm($update_query);
			}
			else
			{		
					$update_query = query("UPDATE volume_table set status = '1', date_published = '{$date}' where volume_id =  '{$volume_id}'");
			}
			$update_query = query("UPDATE research_table set status = 'Published', date_published = '{$date}' where volume_id =  '{$volume_id}'");
				$user_query = query("SELECT user_id, title, research_id from research_table where volume_id = '{$volume_id}'");	
				confirm($user_query);

				while($row_user = fetch_assoc($user_query))
				{
				$message = "You article titled:".$row_user['title']." has been published in the website";
				$user_id = $row_user['user_id'];
				$research_id = $row_user['research_id'];	
				$sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$research_id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been published <a href=\"http://localhost/OJS/istr/publish.php\">Link Here</a>";
      send_email($email, $subject, $msg);
				$insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
					VALUES('unread', '{$message}', '{$date}', '{$user_id}', 'publish', '{$research_id}')");
				confirm($insert_into);
				}

			}
			
			else
			{
				echo "Missing Cover Page";
			}
	
		

		
	}
	else
	{
		echo "Error in Number of Articles";
	}
}
?>