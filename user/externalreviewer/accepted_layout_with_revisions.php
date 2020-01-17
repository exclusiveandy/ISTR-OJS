<?php
include "../../../function.php";

    $id = escape_string($_POST['r_id']);
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $remarks = escape_string($_POST['Comment']);
    
        $chk_proofread_query = query("SELECT MAX(r1.user_role_id) as counter from research_file_history_table as r1 
      JOIN research_table as r2
      ON r1.research_id=r2.research_id
      WHERE r1.research_id = '{$id}'");
    $row_counter = fetch_assoc($chk_proofread_query);

    if($row_counter['counter'] == 5)
    {

    $sql = query("UPDATE research_table SET status = 'To the Proofreader', user_role_id = '2' where research_id = '{$id}'");
        $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Revision', 'Not Accepted by the Author', '{$date}')");
    }
    if($row_counter['counter'] == 6)
    {

    $sql = query("UPDATE research_table SET status = 'To the Layout Editor', user_role_id = '2' where research_id = '{$id}'");
        $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Revision', 'Not Accepted by the Author', '{$date}')");
    }



    
     $comment_query = query("SELECT * from comment_table where research_id = '{$id}'");
    if(row_count($comment_query) > 0)
    {
        $delete_comment = query("DELETE from comment_table where research_id = '{$id}'");
    }


   $insert_comment = query("INSERT INTO comment_table(research_id, content, date_uploaded) VALUES ('{$id}', '{$remarks}', '{$date}')");

    $research_query = query("SELECT * from research_file_table where research_id = '{$id}'");
    if(row_count($research_query) > 1)
    {
        $delete_research_file = query("DELETE from research_file_table where research_id = '{$id}' order by date_uploaded asc Limit 1");
    }

    $research_query_latest = query("SELECT * from research_file_table where research_id = '{$id}' order by date_uploaded desc LIMIT 1");
    $row_latest = fetch_assoc($research_query_latest);
    $target = $row_latest['r_location'];
    $r_filename = $row_latest['research_file'];
    $update_query = query("UPDATE research_table SET research_file = '{$target}',  date_submitted = '{$date}', r_filename = '{$r_filename}' WHERE research_id = '{$id}'");


    // $delete_author = query("DELETE from backup_author_table where research_id = '{$id}'");
    // $authors_query = query("SELECT * from authors_table where research_id = '{$id}'");
    // while($row_author = fetch_assoc($authors_query))
    // {
    //     $insert_backup_author_query = query("INSERT INTO backup_author_table(authors_first_name, authors_middle_name, authors_last_name, authors_email, authors_affliation, research_id) 
    //     VALUES('{$row_author['authors_first_name']}', '{$row_author['authors_middle_name']}', '{$row_author['authors_last_name']}', '{$row_author['authors_email']}','{$row_author['authors_affliation']}' ,'{$row_author['research_id']}')");     
    // }
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
//send_email($email, $subject, $msg);
?> 