<?php
 include "../../function.php"; 
if(isset($_POST['authors_id']))
{
	$authors_id = $_POST['authors_id'];
	$authors_query = query("SELECT * from authors_table where authors_id = '{$authors_id}'");
	confirm($authors_query);
	$row = mysqli_fetch_array($authors_query);
	echo json_encode($row);
}
?>