<?php
 include "../../../function.php"; 
if(!empty($_POST))
{
	$author_first_name = escape_string($_POST['first_name']);
	$author_middle_name = escape_string($_POST['middle_name']);
	$author_last_name = escape_string($_POST['last_name']);
	$author_email = escape_string($_POST['email']);
	$author_affliation = escape_string($_POST['affliation']);
	$r_id = $_POST['r_id'];
	$output = '';

	 	if(!empty($_POST['a_id']))
	 	{
	 		$a_id = $_POST['a_id'];
			 $query = "UPDATE authors_table SET authors_first_name = '{$author_first_name}', authors_middle_name = '{$author_middle_name}', authors_last_name = '{$author_last_name}', authors_email = '{$author_email}', authors_affliation = '{$author_affliation}' WHERE authors_id = '{$a_id}' ";
			 $message = "Data Updated";
	 	}
	 	else
	 	{
	 		$query = "INSERT into authors_table (authors_first_name, authors_middle_name, authors_last_name, authors_email, authors_affliation, research_id)
	 		VALUES ('{$author_first_name}', '{$author_middle_name}', '{$author_last_name}', '{$author_email}', '{$author_affliation}',  '{$r_id}')"; 
	 		$message = "Data Inserted";
	 	}
	 		$final_query = query($query);
			confirm($final_query);
			$output .= '<label class= "text-sucess">'.$message.'</label>';
			$sql = query("SELECT * from research_table  join authors_table on research_table.research_id=authors_table.research_id where research_table.research_id = '{$r_id}'");
                  $counter = 1;
			$output .= '   <table class="table table-bordered" >
                                    <tr>
                                      <th style=" white-space:nowrap;">First Name</th>
                                        <th style=" white-space:nowrap;">Middle Name</th>
                                          <th style=" white-space:nowrap;">Last Name</th>
                                      <th>Email</th>
                                      <th>Affiliation</th>
                                       <th>Edit</th>
                                      <th>Remove</th>
                                    </tr>';

			while($row = fetch_assoc($sql))
			{
					$output .= '<tr>
                                      <td  style=" white-space:nowrap;" >'.$row['authors_first_name'].'</td>
                                      <td  style=" white-space:nowrap;"  >'.$row['authors_middle_name'].'</td>                              
                                      <td  style=" white-space:nowrap;"  >'.$row['authors_last_name'].'</td>
                                      <td  style=" white-space:nowrap;"  >'.$row['authors_email'].'</td>
                                      <td  style=" white-space:nowrap;" >'.$row['authors_affliation'].'</td>';

                                   
           if($counter != 1)
                    {
                    	$output .= ' <td><button type="button" data-toggle="modal" id="'.$row['authors_id'].'" class="fa btn-success btn-md edit_author" >Edit</button></Td>
                                      <td><button class="fa fa-times btn-danger btn-block delete_author" id="'.$row['authors_id'].'"></button></td>';
                    }
                    $output .= '</tr>';

                    $counter +=1;
                                       
                                   
			}
			$output .=   '</tbody>
		                              </table>';
		     echo $output;
 	}

?>
