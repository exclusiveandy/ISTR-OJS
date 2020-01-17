<?php
include "../../../function.php";

if(isset($_POST['r_id']) && isset($_POST['remarks']))
{
 date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $r_id = escape_String($_POST['r_id']);
    date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
    $remarks=escape_string($_POST['remarks']);
    $sql1 = query("UPDATE research_table SET user_role_id = '1' where research_id = '{$r_id}'");
    $comment_query = query("SELECT * from comment_table where research_id = '{$r_id}'");
    if(row_count($comment_query) > 0)
    {
        $delete_comment = query("DELETE from comment_table where research_id = '{$r_id}'");
    }
    if (!empty($remarks))
    {          
    $insert_comment = query("INSERT INTO comment_table(research_id, content, date_uploaded) VALUES ('{$r_id}', '{$remarks}', '{$date}')");
	}


        $sql = query("SELECT u1.user_id,user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$r_id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $user_author = $row['user_id'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";

    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_document.php?r_id=$id\">Link Here</a>";
//send_email($email, $subject, $msg);
     redirect("home.php");
     $status_query = query("SELECT status from research_table where research_id = '{$r_id}'");
     $row_status = fetch_assoc($status_query);
     $status = $row_status['status'];
     if($status == "Rejected")
     {
        $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
      $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "The article that you send entitled:".$title." is rejected";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_author}', 'rejected', '{$r_id}')");
     }
     else if($status == "Accepted with Revisions")
           {
        $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
      $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "The article that you send entitled:".$title." is needed your revisions";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_author}', 'revision_author', '{$r_id}')");
     }
     else
     {
    $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
      $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "The article that you send entitled:".$title." is need for your approval";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_author}', 'author_consent', '{$r_id}')");
     }

}
?>

