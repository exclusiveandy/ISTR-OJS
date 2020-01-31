<?php
include "../../function.php";
if(isset($_GET['r_id']) && isset($_GET['remarks']))
{
	$id = $_GET['r_id'];
	$Remarks=escape_string($_GET['remarks']);
	date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
     $chk_history_query = query("SELECT * from research_file_history_table where research_id = '{$id}' AND user_role_id = '3'");
        if(row_count($chk_history_query) == 0)
        {
        $insert_history = query("INSERT into research_file_history_table(research_id, user_role_id, date_submitted) 
            VALUES('{$id}', '3', '{$date}')");
        }
	$chk_proofread_query = query("SELECT MAX(r1.user_role_id) as counter from research_file_history_table as r1 
      JOIN research_table as r2
      ON r1.research_id=r2.research_id
      WHERE r1.research_id = '{$id}'");
    $row_counter = fetch_assoc($chk_proofread_query);

    if($row_counter['counter'] == 3)
    {
     $sql = query("UPDATE research_table SET status = 'Assign an Internal Reviewer', user_role_id = '3' where research_id = '{$id}' ");
     confirm($sql);
    }
    if($row_counter['counter'] == 4)
    {
     $sql = query("UPDATE research_table SET status = 'Assign an External Reviewer', user_role_id = '3' where research_id = '{$id}' ");
     confirm($sql);
    }


    // $comment_query = query("SELECT * from comment_table where research_id = '{$id}'");
    // if(row_count($comment_query) > 0)
    // {
    //   $delete_comment = query("DELETE from comment_table where research_id = '{$id}'");
    // }
    
		if(!empty($Remarks))
    {
     	$Insert_comment = query("INSERT INTO comment_table(content, date_uploaded, research_id) VALUES('{$Remarks}','{$date}', '{$id}')");
    }

  
  $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Accepted the Document by Editor in Chief', '{$date}')");
	
	confirm($insert_timeline);
	$sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/on_going_documents.php?r_id=$id\">Link Here</a>";
    send_email($email, $subject, $msg);
    if($row_counter['counter'] == 3)
    {
    $delete_notification = query("DELETE FROM notification where research_id = '{$id}'");
     redirect("assign_internal_reviewer.php?r_id=$id"); 
    }
    if($row_counter['counter'] == 4)
    {
          $delete_notification = query("DELETE FROM notification where research_id = '{$id}'");
    redirect("assign_external_reviewer.php?r_id=$id");  
    }
}
?> 