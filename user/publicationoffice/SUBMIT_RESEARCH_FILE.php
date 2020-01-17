<?php
include "../../../function.php";


        if(isset($_FILES['file']['name']) && isset($_FILES['file2']['name']))
        {
                $target = "../../../upload_original_file/".basename($_FILES['file']['name']);
                $target2 = "../../../upload_original_file/".basename($_FILES['file2']['name']);
                $r_filename = $_FILES['file']['name'];
                $s_filename = $_FILES['file']['name'];
                $r_numbered_file_name = "(Number_Line)".$_FILES['file']['name'];
                $s_numbered_file_name = "(Number_Line)".$_FILES['file']['name'];
                $ext=pathinfo($target, PATHINFO_EXTENSION);
                $ext2=pathinfo($target2, PATHINFO_EXTENSION);
                $tmp_name = $_FILES['file']['tmp_name'];
                $tmp_name2 = $_FILES['file2']['tmp_name'];
                if($ext != "docx" || $ext2 != "docx")
                {
                    echo "*Only Word Document is accepted";
                }
                else if($_FILES['file']['size']>800000 || $_FILES['file2']['size']>800000)
                {
                    echo "The file is too big";
                }
                else if(validate_pages($tmp_name) &&  validate_pages($tmp_name2)) 
                {
                         echo "</br>";                
                    }
                else
                {
                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d H:i:s");
                $journal = escape_string($_POST['journal']);
                $abstract = escape_string($_POST['abstract']);
                $title = escape_string($_POST['title']);
                $a_name = explode(",",$_POST['a_name']);
                $a_email = explode(",",$_POST['a_email']);
                $a_affi = explode(",",$_POST['a_affi']);
                $user = $_SESSION['id'];
                $maxid_q = query("SELECT MAX(research_id) as row from research_table");
                confirm($maxid_q);
                $row = fetch_assoc($maxid_q);
                $maxid = $row['row'] + 1;
                $reference_code= date('Y')."-".$journal."-".$maxid;
                move_uploaded_file($_FILES['file']['tmp_name'], $target);
                move_uploaded_file($_FILES['file2']['tmp_name'], $target2);
                read_doc($target, $r_numbered_file_name);
                read_doc($target, $s_numbered_file_name);
                pdf_conversion($target, $r_filename);
                pdf_conversion($target2, $s_filename);
                $insert_query = "INSERT into research_table (research_id, journal_id, title, abstract, research_file, supplementary_file, date_submitted, user_id, status, reference_code, user_role_id, r_filename, s_filename)"; 
                $insert_query .= "VALUES ('{$maxid}', '{$journal}', '{$title}', '{$abstract}', '{$target}', '{$target2}', '{$date}', '{$user}', 'On Process', '{$reference_code}', '2', '{$r_filename}', '{$s_filename}')";
                $query = query($insert_query);
                confirm($query);
                $insert_timeline = query("INSERT INTO timeline_table (document_id, Type, Remarks, timeline_date) VALUES ('{$maxid}', 'Submitted', 'Submitted the file', '{$date}')");
                $subject = "Submission of Document";
                $msg = "Thank you for submitting an article in Institute of Technology and Science Resource. We will keep you updated as soon as we can to your article. Godbless";
                $email = $_SESSION['email'];
                $name = $_SESSION['fname']. " ". $_SESSION['mname']." ". $_SESSION['lname'];
                send_email($email, $subject, $msg);
                for($count = 0; $count<count($a_name); $count++)
                     {
                        $a_name_clean = escape_string($a_name[$count]);
                        $a_email_clean = escape_string($a_email[$count]);
                        $a_affi_clean = escape_string($a_affi[$count]);
                        $insert_query2 = "INSERT into authors_table (authors_name, authors_email, authors_affliation, research_id)"; 
                        $insert_query2 .= "VALUES ('{$a_name_clean}', '{$a_email_clean}', '{$a_affi_clean}', '{$maxid}')";
                        $query2 = query($insert_query2);
                    }
                      echo '<script>window.location.href = "/OJS/istr/user/author/home.php";</script>'; 
                } 
              
            }

        else if(isset($_FILES['file']['name']) && !isset($_FILES['file2']['name']))
        {
              $target = "../../../upload_original_file/".basename($_FILES['file']['name']);
              $numbered_file_name = $_FILES['file']['name'];
                 $r_filename = $_FILES['file']['name'];

                $ext=pathinfo($target, PATHINFO_EXTENSION);
                 $tmp_name = $_FILES['file']['tmp_name'];
                if($ext != "docx")
                {
                    echo "*Only Word Document is accepted";
                }
                else if($_FILES['file']['size']>8000000)
                {
                    echo "The file is too big";
                }
                else if(validate_pages($tmp_name)) 
                {
                        echo "</br>";
                }
                else 
                {
                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d H:i:s");                
                $journal = escape_string($_POST['journal']);
                $abstract = escape_string($_POST['abstract']);
                $title = escape_string($_POST['title']);
                $a_name = explode(",",$_POST['a_name']);
                $a_email = explode(",",$_POST['a_email']);
                $a_affi = explode(",",$_POST['a_affi']);
                  $user = $_SESSION['id'];
                $maxid_q = query("SELECT MAX(research_id) as row from research_table");
                confirm($maxid_q);
                 $row = fetch_assoc($maxid_q);
                $maxid = $row['row'] + 1;
                  $reference_code= date('Y')."-".$journal."-".$maxid;
                move_uploaded_file($_FILES['file']['tmp_name'], $target);
                read_doc($target, $numbered_file_name);
                pdf_conversion($target, $r_filename);
                $insert_query = "INSERT into research_table (research_id, journal_id, title, abstract, research_file,  date_submitted, user_id, status, reference_code, user_role_id, r_filename)"; 
                $insert_query .= "VALUES ('{$maxid}', '{$journal}', '{$title}', '{$abstract}', '{$target}', '{$date}', '{$user}', 'On Process', '{$reference_code}', '2', '{$r_filename}')";
                $query = query($insert_query);
                confirm($query);
                $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$maxid}', 'Submitted', 'Submitted the file', '{$date}')");
                confirm($insert_timeline);
                 $subject = "Submission of Document";
                $msg = "<b>Thank you for submitting an article in Institute of Technology and Science Resource. We will keep you updated as soon as we can to your article. Godbless</b>";
                $email = $_SESSION['email'];
                $name = $_SESSION['fname']. " ". $_SESSION['mname']." ". $_SESSION['lname'];
                send_email($email, $subject, $msg);
                for($count = 0; $count<count($a_name); $count++)
                     {
                        $a_name_clean = escape_string($a_name[$count]);
                        $a_email_clean = escape_string($a_email[$count]);
                        $a_affi_clean = escape_string($a_affi[$count]);
                        $insert_query2 = "INSERT into authors_table (authors_name, authors_email, authors_affliation, research_id)"; 
                        $insert_query2 .= "VALUES ('{$a_name_clean}', '{$a_email_clean}', '{$a_affi_clean}', '{$maxid}')";
                        $query2 = query($insert_query2);
                    } 
                        echo '<script>window.location.href = "/OJS/istr/user/author/home.php";</script>';

                }  
        }
        else
        {
            echo "You need to enter Manuscript FIle";
        }


   		

?>
