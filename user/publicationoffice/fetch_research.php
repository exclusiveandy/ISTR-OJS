<?php
 include "../../../function.php"; 
if(isset($_POST['research_id']))
{
	$research_id = $_POST['research_id'];
	$chk_proofread_query = query("SELECT MAX(r1.user_role_id) as counter from research_file_history_table as r1 
      JOIN research_table as r2
      ON r1.research_id=r2.research_id
      WHERE r1.research_id = '{$research_id}'");
    $row_counter = fetch_assoc($chk_proofread_query);

      if($row_counter['counter'] == 5)
    {
    
	$research_query = query("SELECT research_id, user_role_name, r1.user_id, CONCAT(user_fname, \" \", user_mname, \" \", user_lname) as fullname from proofreader_table r1 join user_table u1
	on r1.user_id = u1.user_id 
	join user_role_table u2
	on u1.user_role_id=u2.user_role_id
	where research_id = '{$research_id}' order by date_uploaded desc limit 1");
	confirm($research_query);
	$row = mysqli_fetch_array($research_query);
	echo json_encode($row);
	}

	if($row_counter['counter'] == 6)
    {
    
	$research_query = query("SELECT research_id, user_role_name, r1.user_id, CONCAT(user_fname, \" \", user_mname, \" \", user_lname) as fullname from layouteditor_table r1 join user_table u1
	on r1.user_id = u1.user_id 
	join user_role_table u2
	on u1.user_role_id=u2.user_role_id
	where research_id = '{$research_id}' order by date_uploaded desc limit 1");
	confirm($research_query);
	$row = mysqli_fetch_array($research_query);
	echo json_encode($row);
	}

}

    


?>