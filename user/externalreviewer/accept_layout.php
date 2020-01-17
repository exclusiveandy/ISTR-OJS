<?php
include "../../../function.php";
if(isset($_GET['r_id']) && isset($_GET['remarks']))
{
    $id = $_GET['r_id'];
    $Remarks=escape_string($_GET['remarks']);
  date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
  
     $chk_proofread_query = query("SELECT MAX(r1.user_role_id) as counter from research_file_history_table as r1 
      JOIN research_table as r2
      ON r1.research_id=r2.research_id
      WHERE r1.research_id = '{$id}'");
    $row_counter = fetch_assoc($chk_proofread_query);
   
   if($row_counter['counter'] == 5)
   {
    $sql = query("UPDATE research_table SET status = 'To the Proofreader', user_role_id = '2' where research_id = '{$id}'");
    $insert_history = query("INSERT into research_file_history_table(research_id, user_role_id, date_submitted) 
            VALUES('{$id}', '6', '{$date}')");
    $research_query = query("SELECT * from research_file_table where research_id = '{$id}'");
    $research_query_latest = query("SELECT * from research_file_table where research_id = '{$id}' order by date_uploaded desc LIMIT 1");
    $row_latest = fetch_assoc($research_query_latest);
    $target = $row_latest['r_location'];
    $r_filename = $row_latest['research_file'];
    $update_query = query("UPDATE research_table SET research_file = '{$target}',  date_submitted = '{$date}', r_filename = '{$r_filename}' WHERE research_id = '{$id}'");
    if(row_count($research_query) > 1)
    {
        $delete_research_file = query("DELETE from research_file_table where research_id = '{$id}' order by date_uploaded asc Limit 1");
    }
    $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Author Accepted the Changes by the Proofreader', '{$date}')");
       $comment_query = query("SELECT * from comment_table where research_id = '{$id}'");
    if(row_count($comment_query) > 0)
    {
        $delete_comment = query("DELETE from comment_table where research_id = '{$id}'");
    }
   $delete_notification = query("DELETE from notification where research_id = '{$id}'");
        $journal_query = query("SELECT title, journal_id from research_table where research_id = '{$id}'");
        $row_journal = fetch_assoc($journal_query);
        $journal = $row_journal['journal_id'];
        $title = $row_journal['title'];
         $email_query = query("SELECT u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 2 LIMIT 1");
                confirm($email_query);
                $row1 = fetch_assoc($email_query);
                $user_me = $row1['user_id'];
                $email_me = $row1['user_email'];
                $subject_me = "Review of documents";        
                $msg_me = "There is a document that is needed to be review. The Title is $title, The reference_code is $reference_code <a href=\"http://localhost/OJS/istr/user/managingeditor/view_document.php?r_id=$id\"><b>(Link Here)</b></a>";
                $message = "There is an article entitled:".$title." that you need to pass to the Editor in Cnief";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_me}', 'for_eic', '{$id}')");    
    }
    
    if($row_counter['counter'] == 6)
    {
    $comment_query = query("SELECT * from comment_table where research_id = '{$id}'");
    if(row_count($comment_query) > 0)
    {
        $delete_comment = query("DELETE from comment_table where research_id = '{$id}'");
    }
    $sql = query("UPDATE research_table SET status = 'Assigning of Volume and Issue', user_role_id = '2' where research_id = '{$id}'");
    $insert_history = query("INSERT into research_file_history_table(research_id, user_role_id, date_submitted) 
            VALUES('{$id}', '7', '{$date}')");
     $date =  date('Y-m-d H:i:s',strtotime('+1 sec',strtotime($date)));
    $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Author Accepted the Final Document', '{$date}')"); 
     $research_query_latest = query("SELECT * from research_file_table where research_id = '{$id}' order by date_uploaded desc LIMIT 1");
    $row_latest = fetch_assoc($research_query_latest);
    $target = $row_latest['r_location'];
    $r_filename = $row_latest['research_file'];
    remove_line_number($target, $target);
    $pattern = '/[.]/';
    $research_counter_query = query("SELECT reference_code as counter from research_table where research_id = '{$id}'");
    $row_counter = fetch_assoc($research_counter_query);
    $counter = $row_counter['counter'];
    $replacement = '('.$counter.').';
    $pdf_filename = preg_replace($pattern,$replacement,$r_filename);
    $pdf_name = substr($pdf_filename, 0, strpos($pdf_filename, "."));
    pdf_conversion($r_filename, $pdf_name);
    $update_query = query("UPDATE research_table SET research_file = '{$target}', r_filename = '{$r_filename}' WHERE research_id = '{$id}'");
    $research_query = query("SELECT * from research_file_table where research_id = '{$id}'");
    if(row_count($research_query) > 1)
    {
        $delete_research_file = query("DELETE from research_file_table where research_id = '{$id}' order by date_uploaded asc Limit 1");
    }
    confirm($sql);
    confirm($insert_timeline);

   $delete_notification = query("DELETE from notification where research_id = '{$id}'");
        $journal_query = query("SELECT title, journal_id from research_table where research_id = '{$id}'");
        $row_journal = fetch_assoc($journal_query);
        $journal = $row_journal['journal_id'];
        $title = $row_journal['title'];
         $email_query = query("SELECT u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 2 LIMIT 1");
                confirm($email_query);
                $row1 = fetch_assoc($email_query);
                $user_me = $row1['user_id'];
                $email_me = $row1['user_email'];
                $subject_me = "Review of documents";        
                $msg_me = "There is a document that is needed to be review. The Title is $title, The reference_code is $reference_code <a href=\"http://localhost/OJS/istr/user/managingeditor/view_document.php?r_id=$id\"><b>(Link Here)</b></a>";
                $message = "There is an article entitled:".$title." that you need to pass to the Editor in Cnief";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_me}', 'for_eic', '{$id}')");
    }
    
    $query = query("SELECT * from line_number where research_id = '{$id}'");
    if(row_count($query) > 0)
    {
        $delete_appraise = query("DELETE from line_number where research_id = '{$id}'");
    }
   
  $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_document.php?r_id=$id\">Link Here</a>";
      //    send_email($email, $subject, $msg);
     $journal_query = query("SELECT journal_id from research_table where research_id = '{$id}'");
     confirm($journal_query);
     $journal_row = fetch_assoc($journal_query);
     $journal = $journal_row['journal_id'];
     $email_query = query("SELECT user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 2 LIMIT 1");
     confirm($email_query);
     $row1 = fetch_assoc($email_query);
     $email_eic = $row1['email'];
    $subject2 = "Polytechnic University of The philippines(Online Journal System)";
    $msg2 = "There is a  Document that is waiting for your verdict on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/editorinchief/view_document.php?r_id=$id\">Link Here</a>";
      //send_email($email_eic, $subject2, $msg2);
     redirect("home.php");
}
?> 