<?php
include "../../function.php";
if(isset($_GET['r_id']))
{
	$id = $_GET['r_id'];
	date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
	$sql = query("UPDATE research_table SET status = 'On Layout Editor', user_role_id = '7' where research_id = '{$id}' ");
      
        $chk_history_query = query("SELECT * from research_file_history_table where research_id = '{$id}' AND user_role_id = '6'");
        if(row_count($chk_history_query) == 0)
        {
          $insert_history = query("INSERT into research_file_history_table(research_id, user_role_id, date_submitted) 
            VALUES('{$id}', '6', '{$date}')");
        }
    if(empty($Remarks))
    {
       $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Passed on Proofreading', '{$date}')");
    }
    else
    {
        $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', '{$Remarks}', '{$date}')");
    }

      $date =  date('Y-m-d H:i:s',strtotime('+1 sec',strtotime($date)));
         $insert_timeline1 = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Reviewing', 'Being Processed by the Layout Editor', '{$date}')");

	confirm($sql);
	confirm($insert_timeline);
	$sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/on_going_documents.php.php?r_id=$id\">Link Here</a>";
      //send_email($email, $subject, $msg);
     $journal_query = query("SELECT journal_id from research_table where research_id = '{$id}'");
     confirm($journal_query);
     $journal_row = fetch_assoc($journal_query);
     $journal = $journal_row['journal_id'];
    $email_query = query("SELECT user_email as email from user_table u1 where u1.user_role_id = 8 LIMIT 1");
         confirm($email_query);
     $row1 = fetch_assoc($email_query);
     $email_eic = $row1['email'];
    $subject2 = "Polytechnic University of The philippines(Online Journal System)";
    $msg2 = "There is a  Document that is waiting for your verdict on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/publicationoffice/assign_volume.php\">Link Here</a>";
      //send_email($email_eic, $subject2, $msg2);
redirect("home.php");
}
?> 