<?php
include "../../function.php";

        if(isset($_FILES['file']['name']) && isset($_FILES['file2']['name']))
        {
                $maxid_q = query("SELECT MAX(research_id) as row from research_table");
                confirm($maxid_q);
                $row = fetch_assoc($maxid_q);
                $journal = escape_string($_POST['journal']);
                $maxid = $row['row'] + 1;
                $reference_code= date('Y')."-".$journal."-".$maxid;
                $ext = $_FILES['file']['name'];
                $ext2 = $_FILES['file2']['name'];
                $ext=pathinfo($ext, PATHINFO_EXTENSION);
                $ext2=pathinfo($ext2, PATHINFO_EXTENSION);
                $tmp_name = $_FILES['file']['tmp_name'];
                $tmp_name2 = $_FILES['file2']['tmp_name'];
                if($ext == "docx" || $ext2 == "docx") //WORD
                {
                    if(validate_pages($tmp_name)) 
                    {
                        echo "error on validating of pages";                
                    }
                    else
                    { 
                 //Manuscript  
                $original_name_r = $_FILES['file']['name'];
                $original_name_r = preg_replace('/\s+/', '_', "$original_name_r");
                $pattern = '/[.]/';
                $replacement = '(V1-'.$maxid.').';
                $r_filename = preg_replace($pattern,$replacement,$original_name_r);              
                $pdf_name_r = substr($r_filename, 0, strpos($r_filename, "."));
                $target = "../../uploads/original/".$r_filename;
                $copy_file_r = "../../uploads/pdf/".$r_filename;
                move_uploaded_file($_FILES['file']['tmp_name'],  $target);  
                

                //supplementary
                $original_name_s = $_FILES['file2']['name'];
                $original_name_s = preg_replace('/\s+/', '_', "$original_name_s");
                $pattern = '/[.]/';
                $replacement = '(SV1-'.$maxid.').';
                $s_filename = preg_replace($pattern,$replacement,$original_name_s);              
                $pdf_name_s = substr($s_filename, 0, strpos($s_filename, "."));
                $target2 = "../../../uploads/original/".$s_filename;
                $copy_file_s = "../../uploads/pdf/".$s_filename;
                move_uploaded_file($_FILES['file2']['tmp_name'],  $target2);  


                // setting up numberlines & conversion
                if($ext == "docx")
                {
                    read_doc($target,  $target);
                    pdf_conversion($r_filename, $pdf_name_r);
                }
                if($ext2 == "docx")
                {
                    read_doc($target2,  $target2);
                    pdf_conversion($s_filename, $pdf_name_s);
                }

                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d H:i:s");
                $abstract = escape_string($_POST['abstract']);
                $title = escape_string($_POST['title']);
                $a_first_name = explode(",",$_POST['a_first_name']);
                $a_middle_name = explode(",",$_POST['a_middle_name']);
                $a_last_name = explode(",",$_POST['a_last_name']);
                $a_email = explode(",",$_POST['a_email']);
                $a_affi = explode(",",$_POST['a_affi']);
                $user = $_SESSION['id'];

                $insert_query = "INSERT into research_table (research_id, journal_id, title, abstract, research_file, supplementary_file, date_submitted, user_id, status, reference_code, user_role_id, r_filename, s_filename, counter)"; 
                $insert_query .= "VALUES ('{$maxid}', '{$journal}', '{$title}', '{$abstract}', '{$target}', '{$target2}', '{$date}', '{$user}', 'On Managing Editor', '{$reference_code}', '2', '{$r_filename}', '{$s_filename}', '1')";
                $query = query($insert_query);
                confirm($query);

                $insert_history = query("INSERT into research_file_history_table(research_id, user_role_id, date_submitted) 
                VALUES('{$maxid}', '1', '{$date}')");
    

                $insert_timeline = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$maxid}', 'Submitted', 'Submitted the file', '{$date}')");
                $date =  date('Y-m-d H:i:s',strtotime('+1 sec',strtotime($date)));
                
                $insert_timeline2 = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$maxid}', 'Reviewing', 'Being Processed by Managing Editor', '{$date}')");
                $insert_research_table = query("INSERT INTO research_file_table(research_id, research_file, supplementary_file, r_location, s_location, date_uploaded, counter, title, abstract) 
                    VALUES ('{$maxid}', '{$r_filename}', '{$s_filename}', '{$target}', '{$target2}', '{$date}', '0', '{$title}', '{$abstract}')");
                confirm($insert_research_table);

                confirm($insert_timeline);
                confirm($insert_timeline2);

                $email_query = query("SELECT u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 2 LIMIT 1");
                confirm($email_query);

                $row1 = fetch_assoc($email_query);
                $user_me = $row1['user_id'];
                $email_me = $row1['email'];
                $subject_me = "Review of documents";        
                $msg_me = "There is a document that is needed to be review. The Title is $title, The reference_code is $reference_code <a href=\"http://localhost/OJS/istr/user/managingeditor/view_document.php?r_id=$maxid\"><b>(Link Here)</b></a>";
                $message = "There is an article entitled:".$title." that you need to review";

                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_me}', 'review_me', '{$maxid}')");
                send_email($email_me, $subject_me, $msg_me);
                for($count = 0; $count<count($a_first_name); $count++)
                     {
                        $a_first_name_clean = escape_string($a_first_name[$count]);
                        $a_middle_name_clean = escape_string($a_middle_name[$count]);
                        $a_last_name_clean = escape_string($a_last_name[$count]);
                        $a_email_clean = escape_string($a_email[$count]);
                        $a_affi_clean = escape_string($a_affi[$count]);
                        $insert_query2 = "INSERT into authors_table (authors_first_name, authors_middle_name, authors_last_name, authors_email, authors_affliation, research_id)"; 
                        $insert_query2 .= "VALUES ('{$a_first_name_clean}', '{$a_middle_name_clean}', '{$a_last_name_clean}', '{$a_email_clean}', '{$a_affi_clean}', '{$maxid}')";
                        $query2 = query($insert_query2);
                         $insert_query3 = query("INSERT into backup_author_table (authors_first_name, authors_middle_name, authors_last_name, authors_email, authors_affliation, research_id) 
                            VALUES ('{$a_first_name_clean}', '{$a_middle_name_clean}', '{$a_last_name_clean}', '{$a_email_clean}', '{$a_affi_clean}', '{$maxid}')");
                        confirm($insert_query3);
                    }

                      echo trim("Success"); 
               

                    }

                }
            }


            else //If Only Manuscript has file uploaded
            {
              $maxid_q = query("SELECT MAX(research_id) as row from research_table");
              confirm($maxid_q);
              $row = fetch_assoc($maxid_q);
              $journal = escape_string($_POST['journal']);
              $maxid = $row['row'] + 1;
              $reference_code= date('Y')."-".$journal."-".$maxid;
              $ext = $_FILES['file']['name'];
              $tmp_name = $_FILES['file']['tmp_name'];
              $ext=pathinfo($ext, PATHINFO_EXTENSION);
                if($ext == "docx") //WORD
                    {
                    if(validate_pages($tmp_name)) 
                    {
                        print_r("error on validating pages");               
                    }
                    else
                    {
                        $original_name = $_FILES['file']['name'];
                        $original_name = preg_replace('/\s+/', '_', "$original_name");
                        $pattern = '/[.]/';
                        $replacement = '(V1-'.$maxid.').';
                        $r_filename = preg_replace($pattern,$replacement,$original_name);              
                        $pdf_name = substr($r_filename, 0, strpos($r_filename, "."));
                        $target = "../../uploads/original/".$r_filename;
                        $copy_file = "../../uploads/pdf/".$r_filename;                        
                        move_uploaded_file($_FILES['file']['tmp_name'],  $target); 
                        
                        read_doc($target, $target); 
                   
                        pdf_conversion($r_filename, $pdf_name); 
               
                        date_default_timezone_set('Asia/Manila');
                        $date = date("Y-m-d H:i:s");                
                        $abstract = escape_string($_POST['abstract']);
                        $title = escape_string($_POST['title']);
                        $a_first_name = explode(",",$_POST['a_first_name']);
                        $a_middle_name = explode(",",$_POST['a_middle_name']);
                        $a_last_name = explode(",",$_POST['a_last_name']);
                        $a_email = explode(",",$_POST['a_email']);
                        $a_affi = explode(",",$_POST['a_affi']);
                        $user = $_SESSION['id'];


                        // insert in reserach_table
                        $insert_query = "INSERT into research_table (research_id, journal_id, title, abstract, research_file,  date_submitted, user_id, status, reference_code, user_role_id, r_filename, counter)"; 
                        $insert_query .= "VALUES ('{$maxid}', '{$journal}', '{$title}', '{$abstract}', '{$target}', '{$date}', '{$user}', 'On Managing Editor', '{$reference_code}', '2', '{$r_filename}', '1')";
                        $query = query($insert_query);
                        $insert_history = query("INSERT into research_file_history_table(research_id, user_role_id, date_submitted) 
                            VALUES('{$maxid}', '1', '{$date}')");
                        confirm($query);

                        // insert in reserach_file_table
                        $insert_research_table = query("INSERT INTO research_file_table(research_id, research_file, r_location,  date_uploaded, counter, title, abstract) 
                            VALUES ('{$maxid}','{$r_filename}', '{$target}', '{$date}', '0',  '{$title}', '{$abstract}')");
                        confirm($insert_research_table);

                        // updating timeline table
                        $insert_timeline = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$maxid}', 'Submitted', 'Submitted the file', '{$date}')");
                        $date =  date('Y-m-d H:i:s',strtotime('+1 sec',strtotime($date)));
                        $insert_timeline2 = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$maxid}', 'Reviewing', 'Being Processed by Managing Editor', '{$date}')");
                        confirm($insert_timeline);
                        confirm($insert_timeline2);

                        
                        $email_query = query("SELECT u1.user_id, user_email as email from user_table u1 join user_journal_table u2 on u1.user_id=u2.user_id join journal_table j1 on j1.journal_id=u2.journal_id where u2.journal_id = '{$journal}' and u1.user_role_id = 2 LIMIT 1");
                        confirm($email_query);

                        $row1 = fetch_assoc($email_query);
                        $user_me = $row1['user_id'];
                        $email_me = $row1['email'];
                        $subject_me = "Review of documents";        
                        $msg_me = "There is a document that is needed to be review. The Title is $title, The reference_code is $reference_code <a href=\"http://localhost/OJS/istr/user/managingeditor/view_document.php?r_id=$maxid\"><b>(Link Here)</b></a>";
                        $message = "There is an article entitled:".$title." that you need to review";


                        // sending notif to ME
                        $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                            VALUES('unread', '{$message}', '{$date}', '{$user_me}', 'review_me', '{$maxid}')");
                        send_email($email_me, $subject_me, $msg_me);
                            for($count = 0; $count<count($a_first_name); $count++)
                            {
                                $a_first_name_clean = escape_string($a_first_name[$count]);
                                $a_middle_name_clean = escape_string($a_middle_name[$count]);
                                $a_last_name_clean = escape_string($a_last_name[$count]);
                                $a_email_clean = escape_string($a_email[$count]);
                                $a_affi_clean = escape_string($a_affi[$count]);
                                $insert_query2 = "INSERT into authors_table (authors_first_name, authors_middle_name, authors_last_name, authors_email, authors_affliation, research_id)"; 
                                $insert_query2 .= "VALUES ('{$a_first_name_clean}', '{$a_middle_name_clean}', '{$a_last_name_clean}', '{$a_email_clean}', '{$a_affi_clean}', '{$maxid}')";
                                $query2 = query($insert_query2);
                                $insert_query3 = query("INSERT into backup_author_table (authors_first_name, authors_middle_name, authors_last_name, authors_email, authors_affliation, research_id) 
                                    VALUES ('{$a_first_name_clean}', '{$a_middle_name_clean}', '{$a_last_name_clean}', '{$a_email_clean}', '{$a_affi_clean}', '{$maxid}')");
                                confirm($insert_query3);
                            } 
                                echo trim("Success"); 

                    }
                }
            }