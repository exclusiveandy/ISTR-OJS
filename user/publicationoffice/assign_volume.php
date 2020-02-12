<?php
include '../../function.php';
if(isset($_GET['v_id']) && isset($_GET['r_id']))
{
	$volume_id = escape_string($_GET['v_id']);
	$r_id = escape_string($_GET['r_id']);
	$update_research = query("UPDATE research_table SET volume_id = '{$volume_id}', status = 'For Publishing' where research_id = '{$r_id}'");
	confirm($update_research);
	redirect("volumecontent.php?v_id=$volume_id");
}
?>