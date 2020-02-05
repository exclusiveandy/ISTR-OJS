<?php
include "../../function.php";
if(isset($_FILES['file']['name']) && isset($_FILES['file2']['name']))
{
             $r_id = $_POST['r_id'];
              $ext = $_FILES['file']['name'];
              $tmp_name = $_FILES['file']['tmp_name'];
              $ext2 = $_FILES['file2']['name'];
              $tmp_name2 = $_FILES['file2']['tmp_name'];
              $ext=pathinfo($ext, PATHINFO_EXTENSION);
                if($ext == "docx") //WORD
                {
                    if(validate_pages($tmp_name)) 
                    {
                        echo "Error";                
                    }
                    else
                    {
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
               
                $original_name_s = $_FILES['file2']['name'];
                $original_name_s = preg_replace('/\s+/', '_', "$original_name_s");
                $pattern = '/[.]/';
                $replacement = '(SV'.$counter.'-'.$r_id.').';
                $s_filename = preg_replace($pattern,$replacement,$original_name_s);              
                $pdf_name_s = substr($s_filename, 0, strpos($s_filename, "."));
                $target2 = "../../../upload_original_file/".$s_filename;
                $copy_file_s = "../../../upload_pdf_file/".$s_filename;
                move_uploaded_file($_FILES['file2']['tmp_name'],  $target2);  

                read_doc($target2,  $target2);
                pdf_conversion($s_filename, $pdf_name_s);



                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d H:i:s");                
                $abstract = escape_string($_POST['abstract']);
                $title = escape_string($_POST['title']);
                
                $insert_query = "UPDATE research_table  SET abstract = '{$abstract}', research_file = '{$target}',  date_submitted = '{$date}', status = 'On Managing Editor', user_role_id = '2', r_filename = '{$r_filename}', counter = '{$counter}', supplementary_file = '{$target2}', s_filename = '{$s_filename}' WHERE research_id = '{$r_id}'"; 
 
               
                $query = query($insert_query);
                confirm($query);
               


                $insert_research_table = query("INSERT INTO research_file_table(research_id, research_file, r_location,  date_uploaded, counter, title, abstract, s_location, supplementary_file) 
                    VALUES ('{$r_id}','{$r_filename}', '{$target}', '{$date}', '0',  '{$title}', '{$abstract}', '{$target2}', '{$s_filename}')");
                confirm($insert_research_table);

                 $insert_timeline = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Resubmitted', 'Resubmitted the file', '{$date}')");
                    

                    $date =  date('Y-m-d H:i:s',strtotime('+1 sec',strtotime($date)));
               

                  $insert_timeline2 = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Being Processed by Managing Editor', '{$date}')");
                
               
                 confirm($insert_timeline);
                 confirm($insert_timeline2);
               
       $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
        $journal_query = query("SELECT journal_id from research_table where research_id = '{$r_id}'");
        $row_journal = fetch_assoc($journal_query);
        $journal = $row_journal['journal_id'];
         $email_query = query("SELECT u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 2 LIMIT 1");
                confirm($email_query);
                $row1 = fetch_assoc($email_query);
                $user_me = $row1['user_id'];
                $email_me = $row1['user_email'];
                $subject_me = "Review of documents";        
                $msg_me = "There is a document that is needed to be review. The Title is $title, The reference_code is $reference_code <a href=\"http://localhost/OJS/istr/user/managingeditor/view_document.php?r_id=$maxid\"><b>(Link Here)</b></a>";
                $message = "There is an article entitled:".$title." that you need to review";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_me}', 'review_me', '{$r_id}')");
                // send_email($email_me, $subject_me, $msg_me);
                        echo "Success";

                  }
                }
            }

else
{
             $r_id = $_POST['r_id'];
             
              $ext = $_FILES['file']['name'];
              $tmp_name = $_FILES['file']['tmp_name'];
              $ext=pathinfo($ext, PATHINFO_EXTENSION);
                if($ext == "docx") //WORD
                {
                    if(validate_pages($tmp_name)) 
                    {
                        echo "Error";                
                    }
                    else
                    {
                $original_name = $_FILES['file']['name'];
                $original_name = preg_replace('/\s+/', '_', "$original_name");
                $pattern = '/[.]/';
                $research_counter_query = query("SELECT counter, s_filename, supplementary_file from research_table where research_id = '{$r_id}'");
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
                $abstract = escape_string($_POST['abstract']);
                $title = escape_string($_POST['title']);




                $insert_query = "UPDATE research_table  SET abstract = '{$abstract}', research_file = '{$target}',  date_submitted = '{$date}', status = 'On Managing Editor', user_role_id = '2', r_filename = '{$r_filename}', counter = '{$counter}' WHERE research_id = '{$r_id}'"; 
 
               
                $query = query($insert_query);
                confirm($query);
               
                if(empty($row_counter['s_filename']) && empty($row_counter['supplementary_file']))
                {
                $insert_research_table = query("INSERT INTO research_file_table(research_id, research_file, r_location,  date_uploaded, counter, title, abstract) 
                    VALUES ('{$r_id}','{$r_filename}', '{$target}', '{$date}', '0',  '{$title}', '{$abstract}')");
                }
                else
                {
                    $s_location = $row_counter['supplementary_file'];
                    $supplementary_file = $row_counter['s_filename'];
                        $insert_research_table = query("INSERT INTO research_file_table(research_id, research_file, r_location,  date_uploaded, counter, title, abstract, s_location, supplementary_file) 
                    VALUES ('{$r_id}','{$r_filename}', '{$target}', '{$date}', '0',  '{$title}', '{$abstract}', '{$s_location}', '{$supplementary_file}')");
                }

                confirm($insert_research_table);

                 $insert_timeline = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Resubmitted', 'Resubmitted the file', '{$date}')");
                    

                    $date =  date('Y-m-d H:i:s',strtotime('+1 sec',strtotime($date)));
               

                  $insert_timeline2 = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Being Processed by Managing Editor', '{$date}')");
                
               
                 confirm($insert_timeline);
                 confirm($insert_timeline2);
                 $delete_notification = query("DELETE from notification where research_id = '{$r_id}'");
                  $journal_query = query("SELECT journal_id from research_table where research_id = '{$r_id}'");
        $row_journal = fetch_assoc($journal_query);
        $journal = $row_journal['journal_id'];
        $email_query = query("SELECT u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 2 LIMIT 1");
                confirm($email_query);
                $row1 = fetch_assoc($email_query);
                $user_me = $row1['user_id'];
                $email_me = $row1['user_email'];
                $subject_me = "Review of documents";        
                $msg_me = "There is a document that is needed to be review. The Title is $title, The reference_code is $reference_code <a href=\"http://localhost/OJS/istr/user/managingeditor/view_document.php?r_id=$maxid\"><b>(Link Here)</b></a>";
                $message = "There is an article entitled:".$title." that you need to review";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_me}', 'review_me', '{$r_id}')");
                // send_email($email_me, $subject_me, $msg_me);
                   
                        echo "Success";

                  }
                }
            }
               
?>