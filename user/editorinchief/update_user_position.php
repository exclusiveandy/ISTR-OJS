<?php
 include "../../../function.php"; 
if(!empty($_POST))
{

	$journal_id = escape_string($_POST['journal_id']);
  $user_type = escape_string($_POST['user_type']);
	$user_id = escape_string($_POST['user_id']);
	$output = '';
	if($user_type == 1)
	{
		$author_query = query("DELETE FROM user_journal_table where user_id = '{$user_id}'");
	  $update_user = query("UPDATE user_table SET user_role_id = '{$user_type}' where user_id = '{$user_id}'");
		$message = "Data Updated";
		$output .= '<label class= "text-sucess">'.$message.'</label>';
		$sql = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name 
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  join user_journal_table u3 on u3.user_id=u1.user_id 
                  join journal_table j1 on j1.journal_id=u3.journal_id
                  where u1.user_role_id <> 1 AND u1.user_id <> '{$_SESSION['id']}'");
		$output .= '<table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Affiliation</th>
               <th>Journal</th>
              <th>Expertise</th>
              <th>Gender</th>
              <th>Date of Registered</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>';

			while($row = fetch_assoc($sql))
			{
				$output .= '<tr>
                  <td>'.$row['user_fname']." ".$row['user_mname']." ".$row['user_lname'].'</td>
                  <td>'.$row['user_role_name'].'</td>
                  <td>'. $row['user_affliation'].'</td>
                  <td>'. $row['journal_name'].'</td>
                  <td>'.$row['expertise'].'</td>
                  <td>'. $row['gender'].'</td>
                  <td>'. $row['register_date'].'</td>
                  <td>
                    <button 
                      data-toggle="modal" 
                      class="btn btn-info btn-md offical_modal" 
                      id = "'.  $row['user_id'].'"
                      name = "user_id"
                      style="margin-left: 20%;"><span class="fas fa-users"></span></button>  </td>

                          
                </tr> ';
			}
				$output .=   '</tbody>
		          </table>
              ';
		     echo $output;
	}
	else if ($user_type == 2)
	{
		$me_query = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name, u3.journal_id, u2.user_role_id
			FROM user_table u1 
			join user_role_table u2 on u1.user_role_id = u2.user_role_id 
			join user_journal_table u3 on u3.user_id=u1.user_id 
			join journal_table j1 on j1.journal_id=u3.journal_id
			where u2.user_role_id = 2 AND u3.journal_id = '{$journal_id}'");
		if(row_count($me_query) > 0)
		{
			$output = "Repeating ME";
			echo $output;
		}
		else
		{
			$update_user = query("UPDATE user_table SET user_role_id = '{$user_type}' where user_id = '{$user_id}'");
			$update_user_journal = query("UPDATE user_journal_table SET journal_id = '{$journal_id}' where user_id = '{$user_id}'");
			$message = "Data Updated";
		$output .= '<label class= "text-sucess">'.$message.'</label>';
		$sql = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name 
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  join user_journal_table u3 on u3.user_id=u1.user_id 
                  join journal_table j1 on j1.journal_id=u3.journal_id
                  where u1.user_role_id <> 1 AND u1.user_id <> '{$_SESSION['id']}'");
		$output .= '<table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Affiliation</th>
               <th>Journal</th>
              <th>Expertise</th>
              <th>Gender</th>
              <th>Date of Registered</th>
              <th>Actions</th>
             

            </tr>
            </thead>
            <tbody>';

			while($row = fetch_assoc($sql))
			{
				$output .= '<tr>
                  <td>'.$row['user_fname']." ".$row['user_mname']." ".$row['user_lname'].'</td>
                  <td>'.$row['user_role_name'].'</td>
                  <td>'. $row['user_affliation'].'</td>
                  <td>'. $row['journal_name'].'</td>
                  <td>'.$row['expertise'].'</td>
                  <td>'. $row['gender'].'</td>
                  <td>'. $row['register_date'].'</td>
                  <td>
                    <button 
                      data-toggle="modal" 
                      class="btn btn-info btn-md offical_modal" 
                      id = "'.  $row['user_id'].'"
                      name = "user_id"
                      style="margin-left: 20%;"><span class="fas fa-users"></span></button>  </td>

                          
                </tr> ';
			}
				$output .=   '</tbody>
		          </table>';
		     echo $output;
		}
	}
	else if ($user_type == 3)
	{
		$eic_query = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name, u3.journal_id, u2.user_role_id
			FROM user_table u1 
			join user_role_table u2 on u1.user_role_id = u2.user_role_id 
			join user_journal_table u3 on u3.user_id=u1.user_id 
			join journal_table j1 on j1.journal_id=u3.journal_id
			where u2.user_role_id = 3 AND u3.journal_id = '{$journal_id}'");
		if(row_count($eic_query) > 0)
		{
			$output = "Repeating EIC";
			echo $output;
		}
		else
		{
			$update_user = query("UPDATE user_table SET user_role_id = '{$user_type}' where user_id = '{$user_id}'");
			$update_user_journal = query("UPDATE user_journal_table SET journal_id = '{$journal_id}' where user_id = '{$user_id}'");
			$message = "Data Updated";
		$output .= '<label class= "text-sucess">'.$message.'</label>';
		$sql = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name 
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  join user_journal_table u3 on u3.user_id=u1.user_id 
                  join journal_table j1 on j1.journal_id=u3.journal_id
                  where u1.user_role_id <> 1 AND u1.user_id <> '{$_SESSION['id']}'");
		$output .= '<table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Affiliation</th>
               <th>Journal</th>
              <th>Expertise</th>
              <th>Gender</th>
              <th>Date of Registered</th>
              <th>Actions</th>
             

            </tr>
            </thead>
            <tbody>';

			while($row = fetch_assoc($sql))
			{
				$output .= '<tr>
                  <td>'.$row['user_fname']." ".$row['user_mname']." ".$row['user_lname'].'</td>
                  <td>'.$row['user_role_name'].'</td>
                  <td>'. $row['user_affliation'].'</td>
                  <td>'. $row['journal_name'].'</td>
                  <td>'.$row['expertise'].'</td>
                  <td>'. $row['gender'].'</td>
                  <td>'. $row['register_date'].'</td>
                  <td>
                    <button 
                      data-toggle="modal" 
                      class="btn btn-info btn-md offical_modal" 
                      id = "'.  $row['user_id'].'"
                      name = "user_id"
                      style="margin-left: 20%;"><span class="fas fa-users"></span></button>  </td>

                          
                </tr> ';
			}
				$output .=   '</tbody>
		          </table>';
		     echo $output;

		}
	}
  else  if($user_type == 6)
  {
      $chk_post_office_proofreader = query("Select * from user_table where user_role_id = '6'");
        if(row_count($chk_post_office_proofreader) > 0)
    {
      $output = "Repeating Proofreader";
      echo $output;
    }
    else
    { 
    $author_query = query("DELETE FROM user_journal_table where user_id = '{$user_id}'");
    $update_user = query("UPDATE user_table SET user_role_id = '{$user_type}' where user_id = '{$user_id}'");
    $message = "Data Updated";
    $output .= '<label class= "text-sucess">'.$message.'</label>';
    $sql = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name 
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  join user_journal_table u3 on u3.user_id=u1.user_id 
                  join journal_table j1 on j1.journal_id=u3.journal_id
                  where u1.user_role_id <> 1 AND u1.user_id <> '{$_SESSION['id']}'");
    $output .= '<table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Affiliation</th>
               <th>Journal</th>
              <th>Expertise</th>
              <th>Gender</th>
              <th>Date of Registered</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>';

      while($row = fetch_assoc($sql))
      {
        $output .= '<tr>
                  <td>'.$row['user_fname']." ".$row['user_mname']." ".$row['user_lname'].'</td>
                  <td>'.$row['user_role_name'].'</td>
                  <td>'. $row['user_affliation'].'</td>
                  <td>'. $row['journal_name'].'</td>
                  <td>'.$row['expertise'].'</td>
                  <td>'. $row['gender'].'</td>
                  <td>'. $row['register_date'].'</td>
                  <td>
                    <button 
                      data-toggle="modal" 
                      class="btn btn-info btn-md offical_modal" 
                      id = "'.  $row['user_id'].'"
                      name = "user_id"
                      style="margin-left: 20%;"><span class="fas fa-users"></span></button>  </td>

                          
                </tr> ';
      }
        $output .=   '</tbody>
              </table>
              ';
         echo $output;
  }
  }
    else  if($user_type == 7)
  {
      $chk_post_office_proofreader = query("Select * from user_table where user_role_id = '7'");
        if(row_count($chk_post_office_proofreader) > 0)
    {
      $output = "Repeating Layout Editor";
      echo $output;
    }
    else
    { 
    $author_query = query("DELETE FROM user_journal_table where user_id = '{$user_id}'");
    $update_user = query("UPDATE user_table SET user_role_id = '{$user_type}' where user_id = '{$user_id}'");
    $message = "Data Updated";
    $output .= '<label class= "text-sucess">'.$message.'</label>';
    $sql = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name 
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  join user_journal_table u3 on u3.user_id=u1.user_id 
                  join journal_table j1 on j1.journal_id=u3.journal_id
                  where u1.user_role_id <> 1 AND u1.user_id <> '{$_SESSION['id']}'");
    $output .= '<table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Affiliation</th>
               <th>Journal</th>
              <th>Expertise</th>
              <th>Gender</th>
              <th>Date of Registered</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>';

      while($row = fetch_assoc($sql))
      {
        $output .= '<tr>
                  <td>'.$row['user_fname']." ".$row['user_mname']." ".$row['user_lname'].'</td>
                  <td>'.$row['user_role_name'].'</td>
                  <td>'. $row['user_affliation'].'</td>
                  <td>'. $row['journal_name'].'</td>
                  <td>'.$row['expertise'].'</td>
                  <td>'. $row['gender'].'</td>
                  <td>'. $row['register_date'].'</td>
                  <td>
                    <button 
                      data-toggle="modal" 
                      class="btn btn-info btn-md offical_modal" 
                      id = "'.  $row['user_id'].'"
                      name = "user_id"
                      style="margin-left: 20%;"><span class="fas fa-users"></span></button>  </td>

                          
                </tr> ';
      }
        $output .=   '</tbody>
              </table>
              ';
         echo $output;
  }
  }
    else  if($user_type == 8)
  {
      $chk_post_office_proofreader = query("Select * from user_table where user_role_id = '8'");
        if(row_count($chk_post_office_proofreader) > 0)
    {
      $output = "Repeating Publication Office";
      echo $output;
    }
    else
    { 
    $author_query = query("DELETE FROM user_journal_table where user_id = '{$user_id}'");
    $update_user = query("UPDATE user_table SET user_role_id = '{$user_type}' where user_id = '{$user_id}'");
    $message = "Data Updated";
    $output .= '<label class= "text-sucess">'.$message.'</label>';
    $sql = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name 
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  join user_journal_table u3 on u3.user_id=u1.user_id 
                  join journal_table j1 on j1.journal_id=u3.journal_id
                  where u1.user_role_id <> 1 AND u1.user_id <> '{$_SESSION['id']}'");
    $output .= '<table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Affiliation</th>
               <th>Journal</th>
              <th>Expertise</th>
              <th>Gender</th>
              <th>Date of Registered</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>';

      while($row = fetch_assoc($sql))
      {
        $output .= '<tr>
                  <td>'.$row['user_fname']." ".$row['user_mname']." ".$row['user_lname'].'</td>
                  <td>'.$row['user_role_name'].'</td>
                  <td>'. $row['user_affliation'].'</td>
                  <td>'. $row['journal_name'].'</td>
                  <td>'.$row['expertise'].'</td>
                  <td>'. $row['gender'].'</td>
                  <td>'. $row['register_date'].'</td>
                  <td>
                    <button 
                      data-toggle="modal" 
                      class="btn btn-info btn-md offical_modal" 
                      id = "'.  $row['user_id'].'"
                      name = "user_id"
                      style="margin-left: 20%;"><span class="fas fa-users"></span></button>  </td>

                          
                </tr> ';
      }
        $output .=   '</tbody>
              </table>
              ';
         echo $output;
  }
  }
	else
	{
		$update_user = query("UPDATE user_table SET user_role_id = '{$user_type}' where user_id = '{$user_id}'");
		$chk_query = query("SELECT * from user_journal_table where user_id = '{$user_id}'");
    if(row_count($chk_query) > 0)
    {
    $update_user_journal = query("UPDATE user_journal_table SET journal_id = '{$journal_id}' where user_id = '{$user_id}'");
    }
    else
    {
      $update_user_journal = query("INSERT INTO user_journal_table(journal_id, user_id) 
        VALUES ('{$journal_id}','{$user_id}')");
    } 
			$message = "Data Updated";
		$output .= '<label class= "text-sucess">'.$message.'</label>';
		$sql = query("SELECT u1.user_id, user_fname, user_mname, user_lname, user_affliation, DATE_FORMAT(register_date, \" %M %d %Y %r \") as register_date, gender, expertise, user_role_name, journal_name 
                  FROM user_table u1 
                  join user_role_table u2 on u1.user_role_id = u2.user_role_id 
                  join user_journal_table u3 on u3.user_id=u1.user_id 
                  join journal_table j1 on j1.journal_id=u3.journal_id
                  where u1.user_role_id <> 1 AND u1.user_id <> '{$_SESSION['id']}'");
		$output .= '<table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Affiliation</th>
               <th>Journal</th>
              <th>Expertise</th>
              <th>Gender</th>
              <th>Date of Registered</th>
              <th>Actions</th>
             

            </tr>
            </thead>
            <tbody>';

			while($row = fetch_assoc($sql))
			{
				$output .= '<tr>
                  <td>'.$row['user_fname']." ".$row['user_mname']." ".$row['user_lname'].'</td>
                  <td>'.$row['user_role_name'].'</td>
                  <td>'. $row['user_affliation'].'</td>
                  <td>'. $row['journal_name'].'</td>
                  <td>'.$row['expertise'].'</td>
                  <td>'. $row['gender'].'</td>
                  <td>'. $row['register_date'].'</td>
                  <td>
                    <button 
                      data-toggle="modal" 
                      class="btn btn-info btn-md offical_modal" 
                      id = "'.  $row['user_id'].'"
                      name = "user_id"
                      style="margin-left: 20%;"><span class="fas fa-users"></span></button>  </td>

                          
                </tr> ';
			}
				$output .=   '</tbody>
		          </table>';
		     echo $output;
	}

}
?>