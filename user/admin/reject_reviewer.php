<?php
include "../../../function.php";
if(isset($_GET['u_id']))
{
	$u_id = $_GET['u_id'];
	$update_query = query("UPDATE apply_reviewer_table SET status = '1' where user_id = '{$u_id}'");
	redirect("list_of_applicants_reviewers.php");
}

?>

