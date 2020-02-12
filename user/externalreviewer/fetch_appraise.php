<?php
 include "../../function.php"; 
if(isset($_POST['r_id']))
{
	$research_id = $_POST['r_id'];
	$line_number_query = query("SELECT * from line_number where research_id = '{$research_id}'");
	confirm($line_number_query);
	$output = '';
	$output .= ' <table><thead>
                            <tr>
                              <th>Line #</th>
                              <th>Appraise</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>';
	if(row_count($line_number_query) > 0)
	{
		$count = 0;
		while($row = fetch_assoc($line_number_query))
		{
			$output .= '<tr id ="row'.$count.'">
			<td class= "a_line_number">'.$row['line_number'].'</td>
			<td class="a_appraise">'.$row['comment'].'</td>
			<td><button type="button" name="remove" data-row="row'.$count.'" class="btn btn-danger btn-s remove">REMOVE</button></td></tr>';
			$count += 1;
		}
	}


$output .=   '</tbody> </table>';
		     echo $output;
}

?>