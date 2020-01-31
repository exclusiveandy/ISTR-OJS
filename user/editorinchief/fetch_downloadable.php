<?php

include "../../function.php"; 

if(isset($_POST['download_id']))
{
	$download_id = $_POST['download_id'];
	$downloadble_query = query("SELECT * from ojs_downloadbles where downloadble_id = '{$download_id}'");
	confirm($downloadble_query);
	$row = mysqli_fetch_array($downloadble_query);
	echo json_encode($row);
}
?>