<?php
 include "../../function.php"; 
if(isset($_POST['picture_id']))
{
	$picture_id = $_POST['picture_id'];
	$home_page_picture_query = query("SELECT * from ojs_home_page_picture where picture_id = '{$picture_id}'");
	confirm($home_page_picture_query);
	$row = mysqli_fetch_array($home_page_picture_query);
	echo json_encode($row);
}
?>