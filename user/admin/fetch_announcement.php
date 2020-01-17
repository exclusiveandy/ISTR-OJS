<?php
 include "../../../function.php"; 
if(isset($_POST['announcement_id']))
{
	$announcement_id = $_POST['announcement_id'];
	$announcement_query = query("SELECT announcement_id, announcement_title, announcement_description, DATE_FORMAT(announcement_date, \"%Y-%m-%d\") as announcement_date from announcement_table where announcement_id = '{$announcement_id}'");
	confirm($announcement_query);
	$row = mysqli_fetch_array($announcement_query);
	echo json_encode($row);
}
?>