<?php
include "../../function.php";
if(isset($_GET['r_id']))
{
	$id = $_GET['r_id'];
	date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
	$sql = query("UPDATE research_table SET status = 'To the Layout Editor', user_role_id = '8' where research_id = '{$id}' ");
      
        $chk_history_query = query("SELECT * from research_file_history_table where research_id = '{$id}' AND user_role_id = '6'");
        if(row_count($chk_history_query) == 0)
        {
          $insert_history = query("INSERT into research_file_history_table(research_id, user_role_id, date_submitted) 
            VALUES('{$id}', '6', '{$date}')");
        }
       $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Passed on Proofreading', '{$date}')");

      $date =  date('Y-m-d H:i:s',strtotime('+1 sec',strtotime($date)));
         $insert_timeline1 = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Reviewing', 'Being Processed by the Layout Editor', '{$date}')");

   $comment_query = query("SELECT * from comment_table where research_id = '{$id}'");
    if(row_count($comment_query) > 0)
    {
        $delete_comment = query("DELETE from comment_table where research_id = '{$id}'");
    }

    
	confirm($sql);
	confirm($insert_timeline);
	$sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_document.php?r_id=$id\">Link Here</a>";
      //send_email($email, $subject, $msg);
redirect("home.php");
$publication_office = query("SELECT user_id from user_table where user_role_id = '8'");
    $row_publication = fetch_assoc($publication_office);
    $user_po = $row_publication['user_id'];
     $delete_notifcation = query("DELETE from notification where research_id = '{$id}'");
        $title_query = query("SELECT title from research_table where research_id = '{$id}'");
       $row_title = fetch_assoc($title_query);
      $title = $row_title['title']; 
      $message = "There is an article entitled:".$title." that you needed an layout Editor";
      $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
      VALUES('unread', '{$message}', '{$date}', '{$user_po}', 'for_layout', '{$id}')");
}
?> 