<?php
include "../../function.php";
    $id = escape_string($_POST['r_id']);
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $remarks = escape_string($_POST['Comment']);
    $a_appraise = explode(",",$_POST['a_appraise']);
    $a_line_number = explode(",",$_POST['a_line_number']);
 $sql = query("UPDATE research_table SET status = 'Accepted with Revisions', user_role_id = '3' where research_id = '{$id}' ");
    if(empty($remarks))
    {
    $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Accepted with Revision', '{$date}')");
    }
    else
    {
        $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', '{$remarks}', '{$date}')");
    }
    confirm($sql);
    confirm($insert_timeline);
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
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_document.php?r_id=$id\">Link Here</a>";
    //send_email($email, $subject, $msg);
     $journal_query = query("SELECT journal_id from research_table where research_id = '{$id}'");
     confirm($journal_query);
     $journal_row = fetch_assoc($journal_query);
     $journal = $journal_row['journal_id'];
     $email_query = query("SELECT user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 3 LIMIT 1");
     confirm($email_query);
     $row1 = fetch_assoc($email_query);
     $email_eic = $row1['email'];
    $subject2 = "Polytechnic University of The philippines(Online Journal System)";
    $msg2 = "There is a  Document that is waiting for your review on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/editorinchief/view_document.php?r_id=$id\">Link Here</a>";
     //send_email($email_eic, $subject2, $msg2);
?> 