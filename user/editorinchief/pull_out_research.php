
<?php
 include "../../function.php"; 
  $research_id = escape_string($_POST['r_id']);
  $user_id = escape_string($_POST['u_id']);
    date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");
  	$chk_proofread_query = query("SELECT MAX(r1.user_role_id) as counter from research_file_history_table as r1 
      JOIN research_table as r2
      ON r1.research_id=r2.research_id
      WHERE r1.research_id = '{$research_id}'");
    $row_counter = fetch_assoc($chk_proofread_query);


      if($row_counter['counter'] == 3)
    {
     $sql = query("UPDATE research_table SET status = 'Assign an Internal Reviewer', user_role_id = '3' where research_id = '{$research_id}' ");
     $delete_reviewer_table = query("DELETE from reviewer_table where research_id = '{$research_id}' AND user_id = '{$user_id}' limit 1");
          $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$research_id}', 'Reviewing', 'Pulled back the document by the Editor in Chief', '{$date}')"); 
     confirm($sql);
     echo "3";
    }
    if($row_counter['counter'] == 4)
    {
     $sql = query("UPDATE research_table SET status = 'Assign an External Reviewer', user_role_id = '3' where research_id = '{$research_id}' ");
     $delete_reviewer_table = query("DELETE from reviewer_table where research_id = '{$research_id}' AND user_id = '{$user_id}' limit 1");
      $insert_timeline = query("INSERT INTO timeline_table(document_id, Type, Remarks, timeline_date) VALUES ('{$research_id}', 'Reviewing', 'Pulled back the document by the Editor in Chief', '{$date}')"); 
     confirm($sql);
     echo "4";
    }
?>