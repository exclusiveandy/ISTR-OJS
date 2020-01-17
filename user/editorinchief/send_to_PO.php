<?php
include "../../../function.php";

if(isset($_POST['r_id']) && isset($_POST['remarks']) )
{
 date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
        $r_id = escape_String($_POST['r_id']);
     $remarks=escape_string($_POST['remarks']);

      $chk_proofread_query = query("SELECT MAX(r1.user_role_id) as counter from research_file_history_table as r1 
      JOIN research_table as r2
      ON r1.research_id=r2.research_id
      WHERE r1.research_id = '{$r_id}'");
    $row_counter = fetch_assoc($chk_proofread_query);
    $publication_office = query("SELECT user_id from user_table where user_role_id = '8'");
    $row_publication = fetch_assoc($publication_office);
    $user_po = $row_publication['user_id'];
    if($row_counter['counter'] == 5)
    {
      $chk_proofreader =  query("SELECT * FROM proofreader_table r
      join user_table u1 
      on r.user_id=u1.user_id 
      join user_role_table u2
      on u1.user_role_id=u2.user_role_id
      WHERE research_id = '{$r_id}' and u2.user_role_name = \"Proofreader\" ");

      if(row_count($chk_proofreader) == 0)
      {
             $sql1 = query("UPDATE research_table SET status = 'To the Proofreader', user_role_id = '8' where research_id = '{$r_id}' ");
        $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '{$date}')");  
        $delete_notifcation = query("DELETE from notification where research_id = '{$r_id}'");
        $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
        $row_title = fetch_assoc($title_query);
        $title = $row_title['title']; 
         $message = "There is an article entitled:".$title." that needed for the proofreader";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_po}', 'for_proofreader', '{$r_id}')");
      }
      else
      {
        $row_proofreader = fetch_assoc($chk_proofreader);
      $user_proofreader = $row_proofreader['user_id'];
             $sql1 = query("UPDATE research_table SET status = 'On Proofreader', user_role_id = '6' where research_id = '{$r_id}' ");
             $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Send to the Assigned proofreader', '{$date}')");  
              $message = "There is an article entitled:".$title." that you needed to pass to the author";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_me}', 'for_proofreader', '{$r_id}')");
           $delete_notifcation = query("DELETE from notification where research_id = '{$r_id}'");
        $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
        $row_title = fetch_assoc($title_query);
        $title = $row_title['title']; 
         $message = "There is an article entitled:".$title." that you needed to proofread";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_proofreader}', 'review_proofreader', '{$r_id}')");
      }

      //   $sql1 = query("UPDATE research_table SET status = 'To the Proofreader', user_role_id = '8' where research_id = '{$r_id}' ");
      //   $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '{$date}')");  

    }
    if($row_counter['counter'] == 6)
    {
       $chk_proofreader =  query("SELECT * FROM layouteditor_table r
      join user_table u1 
      on r.user_id=u1.user_id 
      join user_role_table u2
      on u1.user_role_id=u2.user_role_id
      WHERE research_id = '{$r_id}' and u2.user_role_name = \"Layout Editor\" ");
      if(row_count($chk_proofreader) == 0)
      {

         $sql1 = query("UPDATE research_table SET status = 'To the Layout Editor', user_role_id = '8' where research_id = '{$r_id}' ");  
          $insert_timeline2 = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Being Processed by the Publication Office', '{$date}')"); 
          }
          else
          {
               $row_proofreader = fetch_assoc($chk_proofreader);
      $user_proofreader = $row_proofreader['user_id'];
                $sql1 = query("UPDATE research_table SET status = 'On Layout Editor', user_role_id = '7' where research_id = '{$r_id}' ");
             $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Send to the Assigned Layout Editor', '{$date}')");  
              $message = "There is an article entitled:".$title." that you needed to pass to the author";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_me}', 'for_proofreader', '{$r_id}')");
           $delete_notifcation = query("DELETE from notification where research_id = '{$r_id}'");
        $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
        $row_title = fetch_assoc($title_query);
        $title = $row_title['title']; 
         $message = "There is an article entitled:".$title." that you needed to do the layout";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_proofreader}', 'review_layout', '{$r_id}')");
          }   


        // $sql1 = query("UPDATE research_table SET status = 'To the Layout Editor', user_role_id = '8' where research_id = '{$r_id}' "); 
        //  $insert_timeline2 = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Reviewing', 'Being Processed by the Publication Office', '{$date}')");  
    }

       if($row_counter['counter'] == 7)
    {
         $sql1 = query("UPDATE research_table SET status = 'Assigning of Volume and Issue', user_role_id = '8' where research_id = '{$r_id}' ");
        $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$r_id}', 'Publishing', 'Issuing of Volume/Finalizing Document', '{$date}')");     
       $delete_notifcation = query("DELETE from notification where research_id = '{$r_id}'");
        $title_query = query("SELECT title from research_table where research_id = '{$r_id}'");
        $row_title = fetch_assoc($title_query);
        $title = $row_title['title']; 
         $message = "There is an article entitled:".$title." and this is ready for assigning of volume and issue";
                $insert_into = query("INSERT INTO notification(status, message, date, user_id, notification_type, research_id)
                    VALUES('unread', '{$message}', '{$date}', '{$user_po}', 'assigning_volume', '{$r_id}')");

    }

    $comment_query = query("SELECT * from comment_table where research_id = '{$r_id}'");



    if(row_count($comment_query) > 0)
    {
        $delete_comment = query("DELETE from comment_table where research_id = '{$r_id}'");
    }

    if (!empty($remarks))
    {          
    $insert_comment = query("INSERT INTO comment_table(research_id, content, date_uploaded) VALUES ('{$r_id}', '{$remarks}', '{$date}')");
	  }


    
     confirm($sql1);   
     redirect("home.php");
}
?>
