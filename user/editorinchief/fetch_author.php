<?php
 include "../../../function.php"; 
if(isset($_POST['user_id']))
{
	$user_id = $_POST['user_id'];
	$user_query = query("SELECT CONCAT(user_fname, \" \", user_mname,  \" \" ,user_lname) as FULLNAME, user_id, user_affliation, DATE_FORMAT(register_date, \"%M %d %Y %r\") as register_date, gender, expertise, user_role_name, u2.user_role_id from user_table u1 join user_role_table u2 on u1.user_role_id = u2.user_role_id where u2.user_role_name = \"Author\" and activate = 1 and user_id = '{$user_id}' order by register_date desc");
	confirm($user_query);
	$row = mysqli_fetch_array($user_query);
	$row['header'] = "Designate: ".$row['FULLNAME'];
	echo json_encode($row);
	


}

?>