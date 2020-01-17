<?php
 include "../../../function.php"; 
if(isset($_POST['id']))
{
	$research_id = $_POST['id'];
	$research_field_query = query("SELECT * from user_research_field where research_field_id = '{$research_id}'");
	confirm($research_field_query);
	$row = mysqli_fetch_array($research_field_query);
	echo json_encode($row);
}
?>