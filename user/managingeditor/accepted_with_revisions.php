<?php
include "../../function.php";

	$id = escape_string($_POST['r_id']);
	date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $remarks = escape_string($_POST['Comment']);
	$sql = query("UPDATE research_table SET status = 'Accepted with Revisions', user_role_id = '1' where research_id = '{$id}' ");

	$insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Accepted', 'Accepted with Revisions', '{$date}')");
    $insert_comment = query("INSERT INTO comment_table(research_id, content, date_uploaded) VALUES ('{$id}', '{$remarks}', '{$date}')");
    

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
    
    $delete_author = query("DELETE from backup_author_table where research_id = '{$id}'");
    $authors_query = query("SELECT * from authors_table where research_id = '{$id}'");
    while($row_author = fetch_assoc($authors_query))
    {
        $insert_backup_author_query = query("INSERT INTO backup_author_table(authors_first_name, authors_middle_name, authors_last_name, authors_email, authors_affliation, research_id) 
        VALUES('{$row_author['authors_first_name']}', '{$row_author['authors_middle_name']}', '{$row_author['authors_last_name']}', '{$row_author['authors_email']}','{$row_author['authors_affliation']}' ,'{$row_author['research_id']}')");     
    }
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
    $sql = query("SELECT u1.user_id,user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $user_author = $row['user_id'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";

    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_document.php?r_id=$id\">Link Here</a>";
//send_email($email, $subject, $msg);
      $delete_notification = query("DELETE notification where research_id = '{$id}'");
      $title_query = query("SELECT title from research_table where research_id = '{$id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "There is an article entitled:".$title." that needed for your revision";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_author}', 'revision_author', '{$id}')");

?> 