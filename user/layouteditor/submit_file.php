<?php
include "../../../function.php";
if(isset($_FILES['file']['name']))
{
		     $r_id = $_POST['r_id'];
             $remarks = $_POST['Comment'];
              $ext = $_FILES['file']['name'];
              $tmp_name = $_FILES['file']['tmp_name'];
              $ext=pathinfo($ext, PATHINFO_EXTENSION);
            
                $original_name = $_FILES['file']['name'];
                $original_name = preg_replace('/\s+/', '_', "$original_name");
                $pattern = '/[.]/';
                $research_counter_query = query("SELECT counter from research_table where research_id = '{$r_id}'");
                $row_counter = fetch_assoc($research_counter_query);
                $counter = $row_counter['counter'] + 1;
                $replacement = '(V'.$counter.'-'.$r_id.').';
                $r_filename = preg_replace($pattern,$replacement,$original_name);              
                $pdf_name = substr($r_filename, 0, strpos($r_filename, "."));
                $target = "../../../upload_original_file/".$r_filename;
                move_uploaded_file($_FILES['file']['tmp_name'],  $target); 
                read_doc($target,  $target); 
                pdf_conversion($r_filename,  $pdf_name); 
                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d H:i:s");                
                $insert_query = "UPDATE research_table  SET status = 'To the Author for Consent', user_role_id = '3' WHERE research_id = '{$r_id}'"; 
                $query = query($insert_query);
                confirm($query);

    $comment_query = query("SELECT * from comment_table where research_id = '{$r_id}'");
    if(row_count($comment_query) > 0)
    {
        $delete_comment = query("DELETE from comment_table where research_id = '{$r_id}'");
    }
    if(!empty($remarks))
    {
    $insert_comment = query("INSERT INTO comment_table(research_id, content, date_uploaded) VALUES ('{$r_id}', '{$remarks}', '{$date}')");
    }
    $delete_appraise_query = query("SELECT * from line_number where research_id = '{$r_id}'");
    if(row_count($delete_appraise_query) > 0)
    {
        $delete_appraise = query("DELETE from line_number where research_id = '{$r_id}'");
    }
                $insert_research_table = query("INSERT INTO research_file_table(research_id, research_file, r_location,  date_uploaded, counter) 
                    VALUES ('{$r_id}','{$r_filename}', '{$target}', '{$date}', '0')");
                confirm($insert_research_table);
                $insert_timeline = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Submitted', 'Submitted the layout file', '{$date}')");
                confirm($insert_timeline);
      $sql = query("SELECT user_email, title from user_table u1 join research_table r1 on u1.user_id=r1.user_id where research_id = '{$r_id}'");
    confirm($sql);
    $row = fetch_assoc($sql);
    $email = $row['user_email'];
    $subject = "Polytechnic University of The philippines(Online Journal System)";
    $msg = "The Document that you passed on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/author/view_document.php?r_id=$r_id\">Link Here</a>";
    //send_email($email, $subject, $msg);
     $journal_query = query("SELECT journal_id from research_table where research_id = '{$r_id}'");
     confirm($journal_query);
     $journal_row = fetch_assoc($journal_query);
     $journal = $journal_row['journal_id'];
     $email_query = query("SELECT u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 3 LIMIT 1");
     confirm($email_query);
     $row1 = fetch_assoc($email_query);
     $email_eic = $row1['email'];
          $user_eic = $row1['user_id'];
    $subject2 = "Polytechnic University of The philippines(Online Journal System)";
    $msg2 = "There is a  Document that is waiting for your verdict on Online Journal System(ISTR) has been updated <a href=\"http://localhost/OJS/istr/user/editorinchief/view_document.php?r_id=$r_id\">Link Here</a>";
     //send_email($email_eic, $subject2, $msg2);
    $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
    $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
    $row_title = fetch_assoc($title_query);
    $title = $row_title['title'];
    $message = "There is an article entitled:".$title." that needed to pass to the Managing Editor";
    $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                   VALUES('unread', '{$message}', '{$date}', '{$user_eic}', 'for_me', '{$r_id}')");
                
                echo "Success";
            }
               
?>