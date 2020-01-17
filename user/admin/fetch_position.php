<?php
 include "../../../function.php"; 
if(isset($_POST['user_id']))
{
	$user_id = $_POST['user_id'];
	$chk_query = query("SELECT * from user_journal_table where user_id = '{$user_id}'");
	if(row_count($chk_query) > 0)
	{
	$user_query = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name, u3.journal_id, u2.user_role_id
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  join user_journal_table u3 on u3.user_id=u1.user_id 
                  join journal_table j1 on j1.journal_id=u3.journal_id
                  where u1.user_id = '{$user_id}'");
	}
	else
	{
		$user_query = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, u2.user_role_id
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  where u1.user_id = '{$user_id}'");
	}
	confirm($user_query);
	$row = mysqli_fetch_array($user_query);
	$row['header'] = "Designate: ".$row['user_fname']." ".$row['user_mname']." ".$row['user_lname'];
	echo json_encode($row);
	


}

?>