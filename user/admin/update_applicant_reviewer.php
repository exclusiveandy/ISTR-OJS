<?php
 include "../../../function.php"; 
if(!empty($_POST))
{
	$journal_id = escape_string($_POST['journal_id']);
	$user_type = escape_string($_POST['user_type']);
	$user_id = escape_string($_POST['user_id']);
	$output = '';
		$author_query = query("DELETE FROM apply_reviewer_table where user_id = '{$user_id}'");
		$update_user = query("UPDATE user_table SET user_role_id = '{$user_type}' where user_id = '{$user_id}'");
    $insert_user_journal = query("INSERT INTO user_journal_table(user_id,journal_id) VALUES ('{$user_id}', '{$journal_id}')");
$message = "Data Updated";
   $sql = query("SELECT COUNT(*) as count from apply_reviewer_table");
      $row_count = fetch_assoc($sql);
      $output .=  '<div class="card"  id="Author_table">
        <div class="card-header">
   <h3 class="card-title">List of Authors <strong>('.$row_count['count'].')</strong></h3>
        </div>
   <div class="card-body">';
    $output .= '<label class= "text-sucess">'.$message.'</label>';
		$sql = query("SELECT CONCAT(user_fname, \" \", user_mname,  \" \" ,user_lname) as FULLNAME, u2.user_id, user_affliation, user_bio, DATE_FORMAT(register_date, \"%M %d %Y %r\") as register_date, gender, expertise, DATE_FORMAT(date_applied, \"%M %d %Y %r\") as date_applied from user_table u1 join apply_reviewer_table u2 on u1.user_id = u2.user_id WHERE activate = 1 order by register_date desc");
		$output .= ' <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Name</th>
              <th>Bio Statement</th>
              <th>Affiliation</th>
            
             <th>Expertise</th>
              <th>Gender</th>
              <th>Date of Registered</th>
                <th>Date of Applied</th>
               <th>Actions</th>

            </tr>
            </thead>
            <tbody>';

			while($row = fetch_assoc($sql))
			{
				$output .= '<tr>
                  <td>'.$row['FULLNAME'].'</td>
                  <td>'.$row['user_bio'].'</td>
                  <td>'. $row['user_affliation'].'</td>
                  <td>'.$row['expertise'].'</td>
                  <td>'. $row['gender'].'</td>
                  <td>'. $row['register_date'].'</td>
                  <td>'. $row['date_applied'].'</td>
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
?>