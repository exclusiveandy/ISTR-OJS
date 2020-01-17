<?php
include "../../../function.php";

if(isset($_POST['r_id']) && isset($_POST['remarks']))
{
 date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $r_id = escape_String($_POST['r_id']);
    $remarks=escape_string($_POST['remarks']);
    $sql1 = query("UPDATE research_table SET user_role_id = '2' where research_id = '{$r_id}' ");
    $comment_query = query("SELECT * from comment_table where research_id = '{$r_id}'");
    if(row_count($comment_query) > 0)
    {
        $delete_comment = query("DELETE from comment_table where research_id = '{$r_id}'");
    }
    if (!empty($remarks))
    {          
    $insert_comment = query("INSERT INTO comment_table(research_id, content, date_uploaded) VALUES ('{$r_id}', '{$remarks}', '{$date}')");
	}
     confirm($sql1);   
     redirect("home.php");
      $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$r_id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
       $title = $row['title'];
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_document.php?r_id=$r_id\">Link Here</a>";
         $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
                  $journal_query = query("SELECT journal_id from research_table where research_id = '{$r_id}'");
        $row_journal = fetch_assoc($journal_query);
        $journal = $row_journal['journal_id'];
    $email_query = query("SELECT u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 2 LIMIT 1");
                confirm($email_query);
                $row1 = fetch_assoc($email_query);
                $user_me = $row1['user_id'];
                $email_me = $row1['user_email'];
                $subject_me = "Review of documents";        
                $msg_me = "There is a document that is needed to be review. The Title is $title, The reference_code is $reference_code <a href=\"http://localhost/OJS/istr/user/managingeditor/view_document.php?r_id=$r_id\"><b>(Link Here)</b></a>";
                $message = "There is an article entitled:".$title." that you needed to pass to the author";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_me}', 'for_author', '{$r_id}')");
    // send_email($email, $subject, $msg);
}
?>