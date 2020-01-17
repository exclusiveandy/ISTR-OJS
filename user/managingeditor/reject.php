<?php
include "../../../function.php";

	$id = escape_string($_POST['r_id']);
	date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $remarks = escape_string($_POST['Comment']);
    if(empty($_FILES['reciept']['tmp_name']))
    {
	$sql = query("UPDATE research_table SET status = 'Rejected', user_role_id = '1' where research_id = '{$id}' ");
    }
    else
    {   
        $name = $_FILES['reciept']['name'];
        $target = "../../../upload_plagiarism/".$name;
        move_uploaded_file($_FILES['reciept']['tmp_name'], $target);
        $sql = query("UPDATE research_table SET status = 'Rejected by the Managing Editor', user_role_id = '1', plagiarism_file = '{$name}' where research_id = '{$id}' ");   
    }
	
	$insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$id}', 'Rejected', 'Rejected by Managing Editor', '{$date}')");

	$insert_comment = query("INSERT INTO comment_table(research_id, content, date_uploaded) VALUES ('{$id}', '{$remarks}', '{$date}')");
    
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

       $status_query = query("SELECT status from research_table where research_id = '{$id}'");
     $row_status = fetch_assoc($status_query);
     $status = $row_status['status'];
     if($status = "Rejected")
     {
        $delete_notification = query("DELETE from notification where research_id = '{$id}'");
      $title_query = query("SELECT title from research_table where research_id = '{$id}'");
      $row_title = fetch_assoc($title_query);
      $title = $row_title['title'];
    $message = "The article that you send entitled:".$title." is rejected";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_author}', 'rejected', '{$id}')");
     }
?> 