<?php
include "../../../function.php";
if(isset($_GET['r_id']))
{
	$id = $_GET['r_id'];
	date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
	$sql = query("UPDATE research_table SET status = 'On Internal Reviewer', user_role_id = '3' where research_id = '{$id}' ");
	$insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Accepted the Document by Editor in Chief', '{$date}')");
	confirm($sql);
	confirm($insert_timeline);
	$sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_document.php?r_id=$id\">Link Here</a>";
    send_email($email, $subject, $msg);
	redirect("assign_internal_reviewer.php?r_id=$id");	
	}
?> 