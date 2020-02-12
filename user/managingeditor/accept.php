<?php
include "../../function.php";
if(isset($_GET['r_id']) && isset($_GET['remarks']))
{
	$id = escape_string($_GET['r_id']);
    $Remarks=escape_string($_GET['remarks']);
	date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
	$sql = query("UPDATE research_table SET status = 'On Editor in Chief', user_role_id = '3' where research_id = '{$id}' ");
   
        $chk_history_query = query("SELECT * from research_file_history_table where research_id = '{$id}' AND user_role_id = '2'");
        if(row_count($chk_history_query) == 0)
    {
            $insert_history = query("INSERT into research_file_history_table(research_id, user_role_id, date_submitted) 
            VALUES('{$id}', '2', '{$date}')");
    }

          $chk_proofread_query = query("SELECT MAX(r1.user_role_id) as counter from research_file_history_table as r1 
            JOIN research_table as r2
            ON r1.research_id=r2.research_id
            WHERE r1.research_id = '{$id}'");
          $row_counter = fetch_assoc($chk_proofread_query);

    if($row_counter['counter'] == 2)
    {
        $sql = query("UPDATE research_table SET status = 'On Editor in Chief', user_role_id = '3' where research_id = '{$id}' ");
         $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Accepted the Document by Maniging Editor', '{$date}')");



      $date =  date('Y-m-d H:i:s',strtotime('+1 sec',strtotime($date)));
         $insert_timeline1 = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Reviewing', 'Being Processed by Editor in Chief', '{$date}')");

            $comment_query = query("SELECT * from comment_table where research_id = '{$id}'");
            if(row_count($comment_query) > 0)
            {
                $delete_comment = query("DELETE from comment_table where research_id = '{$id}'");
            }

            $query = query("SELECT * from line_number where research_id = '{$id}'");
            if(row_count($query) > 0)
            {
                $delete_appraise = query("DELETE from line_number where research_id = '{$id}'");
            }

            $research_query = query("SELECT * from research_file_table where research_id = '{$id}'");
            if(row_count($research_query) > 1)
            {
                $delete_research_file = query("DELETE from research_file_table where research_id = '{$id}' order by date_uploaded asc Limit 1");
            }
              $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");

    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_ongoing_document.php?r_id=$id\">Link Here</a>";
      send_email($email, $subject, $msg);
      $delete_notification = query("DELETE from notification where research_id = '{$id}'");
     $journal_query = query("SELECT journal_id from research_table where research_id = '{$id}'");
     confirm($journal_query);
     $journal_row = fetch_assoc($journal_query);
     $journal = $journal_row['journal_id'];
     $email_query = query("SELECT  u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 3 LIMIT 1");
     confirm($email_query);
     $row1 = fetch_assoc($email_query);
     $email_eic = $row1['email'];
     $user_eic = $row1['user_id'];
    $subject2 = "Polytechnic University of The philippines(Online Journal System)";
    $msg2 = "There is a  Document that is waiting for your review on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/editorinchief/view_document.php?r_id=$id\">Link Here</a>";
      send_email($email_eic, $subject2, $msg2);
       $title_query = query("SELECT title from research_table where research_id = '{$id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "There is an article entitled:".$title." that needed for your review";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_eic}', 'review_eic', '{$id}')");

    }
    else if ($row_counter['counter']  == 3)
    {
      
      // $chk_internal_reviewer =  query("SELECT * FROM reviewer_table r 
      // join user_table u1 
      // on r.user_id=u1.user_id 
      // join user_role_table u2
      // on u1.user_role_id=u2.user_role_id
      // WHERE research_id = '{$_GET['r_id']}' and u2.user_role_name = \"Internal Reviewer\" ");
      // if(row_count($chk_internal_reviewer) > 0)
      // {
      //      $sql = query("UPDATE research_table SET status = 'On Internal Reviewer', user_role_id = '4' where research_id = '{$id}' ");
      //       $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Accepted the Document by Maniging Editor', '{$date}')");



      // $date =  date('Y-m-d H:i:s',strtotime('+1 sec',strtotime($date)));
      //    $insert_timeline1 = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Reviewing', 'Being Processed by the Internal Reiviewer', '{$date}')");
      // }

     $sql = query("UPDATE research_table SET status = 'Assign an Internal Reviewer', user_role_id = '3' where research_id = '{$id}' ");
       confirm($sql);
          $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");

    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_ongoing_document.php?r_id=$id\">Link Here</a>";
      send_email($email, $subject, $msg);
      $delete_notification = query("DELETE from notification where research_id = '{$id}'");
     $journal_query = query("SELECT journal_id from research_table where research_id = '{$id}'");
     confirm($journal_query);
     $journal_row = fetch_assoc($journal_query);
     $journal = $journal_row['journal_id'];
     $email_query = query("SELECT  u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 3 LIMIT 1");
     confirm($email_query);
     $row1 = fetch_assoc($email_query);
     $email_eic = $row1['email'];
     $user_eic = $row1['user_id'];
    $subject2 = "Polytechnic University of The philippines(Online Journal System)";
    $msg2 = "There is a  Document that is waiting for your review on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/editorinchief/view_document.php?r_id=$id\">Link Here</a>";
      send_email($email_eic, $subject2, $msg2);
       $title_query = query("SELECT title from research_table where research_id = '{$id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "There is an article entitled:".$title." that is needed to be send to Internal Reviewer";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_eic}', 'assign_IR', '{$id}')");
    }
    else 
    {
      // $chk_external_reviewer =  query("SELECT * FROM reviewer_table r 
      // join user_table u1 
      // on r.user_id=u1.user_id 
      // join user_role_table u2
      // on u1.user_role_id=u2.user_role_id
      // WHERE research_id = '{$_GET['r_id']}' and u2.user_role_name = \"External Reviewer\" ");
      // if(row_count($chk_internal_reviewer) > 0)
      // {
      // $sql = query("UPDATE research_table SET status = 'On External Reviewer', user_role_id = '5' where research_id = '{$id}' ");
      
      // $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Accepted the Document by Maniging Editor', '{$date}')");

      // $date =  date('Y-m-d H:i:s',strtotime('+1 sec',strtotime($date)));
      
      // $insert_timeline1 = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Reviewing', 'Being Processed by the External Reiviewer', '{$date}')");
      // }

    $sql = query("UPDATE research_table SET status = 'Assign an External Reviewer', user_role_id = '3' where research_id = '{$id}' ");
      confirm($sql);
         $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");

    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_ongoing_document.php?r_id=$id\">Link Here</a>";
      send_email($email, $subject, $msg);
      $delete_notification = query("DELETE from notification where research_id = '{$id}'");
     $journal_query = query("SELECT journal_id from research_table where research_id = '{$id}'");
     confirm($journal_query);
     $journal_row = fetch_assoc($journal_query);
     $journal = $journal_row['journal_id'];
     $email_query = query("SELECT  u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 3 LIMIT 1");
     confirm($email_query);
     $row1 = fetch_assoc($email_query);
     $email_eic = $row1['email'];
     $user_eic = $row1['user_id'];
    $subject2 = "Polytechnic University of The philippines(Online Journal System)";
    $msg2 = "There is a  Document that is waiting for your review on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/editorinchief/view_document.php?r_id=$id\">Link Here</a>";
      send_email($email_eic, $subject2, $msg2);
       $title_query = query("SELECT title from research_table where research_id = '{$id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "There is an article entitled:".$title." that is needed to be send to External Reviewer";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_eic}', 'assign_ER', '{$id}')");
    }


    // $comment_query = query("SELECT * from comment_table where research_id = '{$id}'");
    // if(row_count($comment_query) > 0)
    // {
    //     $delete_comment = query("DELETE from comment_table where research_id = '{$id}'");
    // }

    // $query = query("SELECT * from line_number where research_id = '{$id}'");
    // if(row_count($query) > 0)
    // {
    //     $delete_appraise = query("DELETE from line_number where research_id = '{$id}'");
    // }

    // $research_query = query("SELECT * from research_file_table where research_id = '{$id}'");
    // if(row_count($research_query) > 1)
    // {
    //     $delete_research_file = query("DELETE from research_file_table where research_id = '{$id}' order by date_uploaded asc Limit 1");
    // }

         if(!empty($Remarks))
         {
           $Insert_comment = query("INSERT INTO comment_table(content, date_uploaded, research_id) VALUES('{$Remarks}','{$date}', '{$id}')");
         }


    $delete_author = query("DELETE from backup_author_table where research_id = '{$id}'");
    $authors_query = query("SELECT * from authors_table where research_id = '{$id}'");
    while($row_author = fetch_assoc($authors_query))
    {
        $insert_backup_author_query = query("INSERT INTO backup_author_table(authors_first_name, authors_middle_name, authors_last_name, authors_email, authors_affliation, research_id) 
        VALUES('{$row_author['authors_first_name']}', '{$row_author['authors_middle_name']}', '{$row_author['authors_last_name']}', '{$row_author['authors_email']}','{$row_author['authors_affliation']}' ,'{$row_author['research_id']}')");     
    }


	confirm($sql);

          redirect("home.php");
}
?> 