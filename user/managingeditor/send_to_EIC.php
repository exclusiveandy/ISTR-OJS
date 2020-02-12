<?php
include "../../function.php";

if(isset($_POST['r_id']) && isset($_POST['remarks']))
{
 date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $r_id = escape_String($_POST['r_id']);
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $remarks=escape_string($_POST['remarks']);


       $chk_proofread_query = query("SELECT MAX(r1.user_role_id) as counter from research_file_history_table as r1 
      JOIN research_table as r2
      ON r1.research_id=r2.research_id
      WHERE r1.research_id = '{$r_id}'");
       $row_counter = fetch_assoc($chk_proofread_query);
    if($row_counter['counter'] == 5)
    {
    $sql1 = query("UPDATE research_table SET status = 'To the Proofreader', user_role_id = '3' where research_id = '{$r_id}'");
    $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$r_id}'");
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_ongoing_document.php?r_id=$id\">Link Here</a>";
    //  send_email($email, $subject, $msg);
      $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
     $journal_query = query("SELECT journal_id from research_table where research_id = '{$r_id}'");
     confirm($journal_query);
     $journal_row = fetch_assoc($journal_query);
     $journal = $journal_row['journal_id'];
     $email_query = query("SELECT  u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 3 LIMIT 1");
     confirm($email_query);
     $row1 = fetch_assoc($email_query);
     $email_eic = $row1['email'];
     $user_eic = $row1['user_id'];
    $subject2 = "Polytechnic University of The philippines(Online Journal System)";
    $msg2 = "There is a  Document that is waiting for your review on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/editorinchief/view_document.php?r_id=$r_id\">Link Here</a>";
     // send_email($email_eic, $subject2, $msg2);
       $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "There is an article entitled:".$title." that is needed to be send to the Publication Office";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_eic}', 'for_PO', '{$r_id}')");
    }
    if($row_counter['counter'] == 6)
    {
    $sql1 = query("UPDATE research_table SET status = 'To the Layout Editor',  user_role_id = '3' where research_id = '{$r_id}'");
        $sql1 = query("UPDATE research_table SET status = 'To the Proofreader', user_role_id = '3' where research_id = '{$r_id}'");
             $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$r_id}'");

    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_ongoing_document.php?r_id=$r_id\">Link Here</a>";
    //  send_email($email, $subject, $msg);
      $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
     $journal_query = query("SELECT journal_id from research_table where research_id = '{$r_id}'");
     confirm($journal_query);
     $journal_row = fetch_assoc($journal_query);
     $journal = $journal_row['journal_id'];
     $email_query = query("SELECT  u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 3 LIMIT 1");
     confirm($email_query);
     $row1 = fetch_assoc($email_query);
     $email_eic = $row1['email'];
     $user_eic = $row1['user_id'];
    $subject2 = "Polytechnic University of The philippines(Online Journal System)";
    $msg2 = "There is a  Document that is waiting for your review on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/editorinchief/view_document.php?r_id=$r_id\">Link Here</a>";
     // send_email($email_eic, $subject2, $msg2);
       $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "There is an article entitled:".$title." that is needed to be send to the Publication Office";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_eic}', 'for_PO', '{$r_id}')");
    }

    if($row_counter['counter'] == 7)
    {
    $sql1 = query("UPDATE research_table SET status = 'Assigning of Volume and Issue', user_role_id = '3' where research_id = '{$r_id}'");
        $sql1 = query("UPDATE research_table SET status = 'To the Proofreader', user_role_id = '3' where research_id = '{$r_id}'");
             $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$r_id}'");

    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_ongoing_document.php?r_id=$id\">Link Here</a>";
    //  send_email($email, $subject, $msg);
      $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
     $journal_query = query("SELECT journal_id from research_table where research_id = '{$r_id}'");
     confirm($journal_query);
     $journal_row = fetch_assoc($journal_query);
     $journal = $journal_row['journal_id'];
     $email_query = query("SELECT  u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 3 LIMIT 1");
     confirm($email_query);
     $row1 = fetch_assoc($email_query);
     $email_eic = $row1['email'];
     $user_eic = $row1['user_id'];
    $subject2 = "Polytechnic University of The philippines(Online Journal System)";
    $msg2 = "There is a  Document that is waiting for your review on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/editorinchief/view_document.php?r_id=$r_id\">Link Here</a>";
     // send_email($email_eic, $subject2, $msg2);
       $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "There is an article entitled:".$title." that is needed to be send to the Publication Office";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_eic}', 'for_PO', '{$r_id}')");
    }



    
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
}
?>