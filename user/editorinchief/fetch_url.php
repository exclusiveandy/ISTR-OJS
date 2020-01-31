<?php
 include "../../function.php"; 
if(isset($_POST['url_id']))
{
	$url_id = $_POST['url_id'];
	$url_query = query("SELECT * from ojs_page_url where url_id = '{$url_id}'");
	confirm($url_query);
	$row = mysqli_fetch_array($url_query);
	echo json_encode($row);
}
?>