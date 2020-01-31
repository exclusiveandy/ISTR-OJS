<?php
include "../../function.php";

	$id = escape_string($_POST['r_id']);
	date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $remarks = escape_string($_POST['Comment']);
	$sql = query("UPDATE research_table SET status = 'Rejected', user_role_id = '2' where research_id = '{$id}' ");
	$insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Rejected', 'Rejected by Editor in Chief', '{$date}')");
	$insert_comment = query("INSERT INTO comment_table(research_id, content, date_uploaded) VALUES ('{$id}', '{$remarks}', '{$date}')");
	confirm($sql);
	confirm($insert_timeline);
	$a_appraise = explode(",",$_POST['a_appraise']);
    $a_line_number = explode(",",$_POST['a_line_number']);
    if(!empty($a_line_number[0]))
    {
    	for($count = 0; $count<count($a_line_number); $count++)
         {
                        $a_appraise_clean = escape_string($a_appraise[$count]);
                        $a_line_number_clean = escape_string($a_line_number[$count]);
                        $insert_query2 = "INSERT into line_number (research_id, line_number, comment)"; 
                        $insert_query2 .= "VALUES ('{$id}', '{$a_line_number_clean}', '{$a_appraise_clean}')";
                        $query2 = query($insert_query2);
          }
    }     
    $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $title = $row['title'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_document.php?r_id=$id\">Link Here</a>";
         $delete_notification = query("DELETE from notification where research_id = '{$id}'");
                  $journal_query = query("SELECT journal_id from research_table where research_id = '{$id}'");
        $row_journal = fetch_assoc($journal_query);
        $journal = $row_journal['journal_id'];
    $email_query = query("SELECT u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 2 LIMIT 1");
                confirm($email_query);
                $row1 = fetch_assoc($email_query);
                $user_me = $row1['user_id'];
                $email_me = $row1['user_email'];
                $subject_me = "Review of documents";        
                $msg_me = "There is a document that is needed to be review. The Title is $title, The reference_code is $reference_code <a href=\"http://localhost/OJS/istr/user/managingeditor/view_document.php?r_id=$maxid\"><b>(Link Here)</b></a>";
                $message = "There is an article entitled:".$title." that you needed to pass to the author";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_me}', 'for_author', '{$id}')");
    // send_email($email, $subject, $msg);
    
?> 