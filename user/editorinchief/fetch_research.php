<?php
 include "../../function.php"; 
if(isset($_POST['research_id']))
{
	$research_id = $_POST['research_id'];
	$research_query = query("SELECT research_id, user_role_name, r1.user_id, CONCAT(user_fname, \" \", user_mname, \" \", user_lname) as fullname from reviewer_table r1 join user_table u1
	on r1.user_id = u1.user_id 
	join user_role_table u2
	on u1.user_role_id=u2.user_role_id
	where research_id = '{$research_id}' order by date_uploaded desc limit 1");
	confirm($research_query);
	$row = mysqli_fetch_array($research_query);
	echo json_encode($row);
}
?>