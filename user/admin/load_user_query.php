<?php
include "../../../function.php";
$sql = "SELECT CONCAT(user_fname, \" \", user_mname,  \" \" ,user_lname) as FULLNAME, user_salutation, user_email, gender, user_role_name, user_affliation, expertise from user_table u1
join user_role_table u2 
on u1.user_role_id=u2.user_role_id";
if($_POST['gender'] != "All")
{
	$gender =$_POST['gender'];
	$sql .= " AND gender = '{$gender}'";
}
if($_POST['user_role'] != "All")
{
	$user_role =$_POST['user_role'];
	$sql .= " AND u1.user_role_id = '{$user_role}'";
}
if($_POST['Journal'] != "All")
{
	$Journal =$_POST['Journal'];
	$sql .= " join user_journal_table j
	on u1.user_id =j.user_id";
	if($_POST['expertise'] == "Others")
	{
		$sql .= " left Join user_research_field u3 on u1.expertise=u3.research_field_name where u3.research_field_id is null AND journal_id = '{$Journal}'";
	}
	else
	{
		$sql .= " AND journal_id = '{$Journal}'";
	}
}
if($_POST['expertise'] != "All" && $_POST['expertise'] != "Others")
{
	$expertise = $_POST['expertise'];
	$sql .= " AND expertise = '{$expertise}'";
}
if($_POST['expertise'] == "Others")
{
	if($_POST['Journal'] == "All")
	{
		$sql .= " left Join user_research_field u3 on u1.expertise=u3.research_field_name where u3.research_field_id is null ";
	}
	
}


$sql .= " AND activate = 1 ";
$output = '';
$final_query = query($sql);
confirm($sql);

	$output .= '<table id="user_query" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Salutation</th>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>Role</th>                                    
                                    <th>Affiliation</th>
                                    <th>Expertise</th>
                                </tr>
                                </thead>
                                <tbody>';
if(row_count($final_query) > 0)
{
while($row_user = fetch_assoc($final_query))
{

	
				$output .= '<tr>
                   <td style="white-space: nowrap;">'. $row_user['user_salutation'].'</td>
                  <td style="white-space: nowrap;">'. $row_user['FULLNAME'].'</td>
                   <td style="white-space: nowrap;">'.$row_user['gender'].'</td>
                   <td style="white-space: nowrap;">'. $row_user['user_role_name'].'</td>
                   <td style="white-space: nowrap;">'.$row_user['user_affliation'].'</td>
                   <td style="white-space: nowrap;">'. $row_user['expertise'].'</td>

                          
                </tr> ';
			}
			$output .=   ' </tbody>                             
                            </table>';
		     echo $output;

}
else
{

				$output .= '<tr>
				 <td style="white-space: nowrap;">No result</td>
				 <td style="white-space: nowrap;">No result</td>
				 <td style="white-space: nowrap;">No result</td>
				 <td style="white-space: nowrap;">No result</td>
				 <td style="white-space: nowrap;">No result</td>
				 <td style="white-space: nowrap;">No result</td>



                  </tr>';
	$output .=   ' </tbody>                             
                            </table>';
		     echo $output;

}
 ?>