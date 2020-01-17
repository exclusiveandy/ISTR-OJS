<?php
 include "../../../function.php"; 
if(!empty($_POST))
{
	$output = '';
	 		
	 		$a_id = $_POST['delete_a_id'];
	 		$r_id = $_POST['r_id'];
			 $query = "DELETE FROM authors_table where authors_id = '{$a_id}'";
			 $message = "Data Deleted";
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