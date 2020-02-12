<?php
include "../../function.php";
    $id = escape_string($_POST['r_id']);
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");
    $remarks = escape_string($_POST['Comment']);
             $r_id = $_POST['r_id'];
             
              $ext = $_FILES['reciept']['name'];
              $tmp_name = $_FILES['reciept']['tmp_name'];
              $ext=pathinfo($ext, PATHINFO_EXTENSION);
                $original_name = $_FILES['reciept']['name'];
                $original_name = preg_replace('/\s+/', '_', "$original_name");
                $pattern = '/[.]/';
                $research_counter_query = query("SELECT counter from research_table where research_id = '{$r_id}'");
                $row_counter = fetch_assoc($research_counter_query);
                $counter = $row_counter['counter'] + 1;
                $replacement = '(V'.$counter.'-'.$r_id.').';
                $r_filename = preg_replace($pattern,$replacement,$original_name);              
                $pdf_name = substr($r_filename, 0, strpos($r_filename, "."));
                $target = "../../../upload_original_file/".$r_filename;
                move_uploaded_file($_FILES['reciept']['tmp_name'],  $target); 
                read_doc($target,  $target); 
                pdf_conversion($r_filename,  $pdf_name); 
                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d H:i:s");                
                $insert_query = "UPDATE research_table  SET status = 'To the Author for Consent', user_role_id = '3', counter ='{$counter}' WHERE research_id = '{$r_id}'";
                $insert_research_table = query("INSERT INTO research_file_table(research_id, research_file, r_location,  date_uploaded, counter) 
                    VALUES ('{$r_id}','{$r_filename}', '{$target}', '{$date}', '0')");
                confirm($insert_research_table); 
                $query = query($insert_query);
                confirm($query);
                $insert_timeline = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Submitted', 'Submitted the revised file', '{$date}')");
               confirm($insert_timeline);        

    $insert_comment = query("INSERT INTO comment_table(research_id, content, date_uploaded) VALUES ('{$id}', '{$remarks}', '{$date}')");
    
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