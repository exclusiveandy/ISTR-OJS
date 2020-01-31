

<?php
 include "../../function.php"; 
if(isset($_POST['id']))
{
	$volume_id = $_POST['id'];
	$volume_query = query("SELECT * from volume_table where volume_id = '{$volume_id}'");
	confirm($volume_query);
	$row = mysqli_fetch_array($volume_query);
	echo json_encode($row);
}
?>