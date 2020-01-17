<?php
include "../../../function.php";

	$id = escape_string($_POST['r_id']);
	date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $remarks = escape_string($_POST['Comment']);
	$sql = query("UPDATE research_table SET status = 'Rejected', user_role_id = '1' where research_id = '{$id}' ");
	if(empty($remarks))
	{
	$insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Rejected', 'Rejected by Editor in Chief', '{$date}')");
	}
	else
	{
		$insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Rejected', '{$remarks}', '{$date}')");
	}
	confirm($sql);
	confirm($insert_timeline);
	// $a_appraise = explode(",",$_POST['a_appraise']);
 //    $a_line_number = explode(",",$_POST['a_line_number']);
 //    if(!empty($a_line_number[0]))
 //    {
 //    	for($count = 0; $count<count($a_line_number); $count++)
 //         {
 //                        $a_appraise_clean = escape_string($a_appraise[$count]);
 //                        $a_line_number_clean = escape_string($a_line_number[$count]);
 //                        $insert_query2 = "INSERT into line_number (research_id, line_number, comment)"; 
 //                        $insert_query2 .= "VALUES ('{$id}', '{$a_line_number_clean}', '{$a_appraise_clean}')";
 //                        $query2 = query($insert_query2);
 //          }
 //    }     
    $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_document.php?r_id=$id\">Link Here</a>";
    send_email($email, $subject, $msg);
?> 