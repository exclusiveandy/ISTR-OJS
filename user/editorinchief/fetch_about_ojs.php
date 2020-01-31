<?php
 include "../../function.php"; 
if(isset($_POST['about_ojs_id']))
{
	$about_ojs_id = $_POST['about_ojs_id'];
	$about_ojs_query = query("SELECT * from about_ojs where about_ojs_id = '{$about_ojs_id}'");
	confirm($about_ojs_query);
	$row = mysqli_fetch_array($about_ojs_query);
	echo json_encode($row);
}
?>