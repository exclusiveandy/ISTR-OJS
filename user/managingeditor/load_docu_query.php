<?php
include "../../function.php";
$user_id = $_SESSION['id'];
$journal_id  = $_SESSION['journal_id'];
$sql = "SELECT title, r1.status, journal_name,  DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted from research_table r1
join journal_table j2
on r1.journal_id = j2.journal_id";
if($_POST['status'] != "All" && $_POST['status'] != "On Going" && $_POST['status'] !="Rejected")
{
	$status = $_POST['status'];
	$sql .=" AND r1.status ='{$status}'";
}
if($_POST['status'] == "On Going")
{
	$status = $_POST['status'];
	$sql .=" AND r1.status NOT IN (\"Published\", \"Rejected\")";
}
if($_POST['status'] == "Rejected")
{
	$status = $_POST['status'];
	$sql .=" AND r1.status = \"Rejected\" and r1.user_role_id = '1'";
}
if($_POST['status'] == "Published")
{
	if($_POST['volume'] != "All")
	{
	$volume = $_POST['volume'];
	$sql .=" join volume_table v on v.volume_id=r1.volume_id AND r1.volume_id = '{$volume}'";
	}
}
if($_POST['Journal'] != "All")
{
		$Journal = $_POST['Journal'];
	$sql .=" AND r1.journal_id = '{$Journal}'";
}

if($_POST['date_beg'] != "" && ($_POST['date_end']) == "")
{
	$date_beg = $_POST['date_beg'];
	$sql .=" AND date_submitted <= '{$date_beg}'";
}
if($_POST['date_beg'] == "" && ($_POST['date_end']) != "")
{
	$date_end = $_POST['date_end'];
	$sql .=" AND date_submitted >= '{$date_end}'";
}
if($_POST['date_beg'] != "" && ($_POST['date_end']) != "")
{
	$date_beg = $_POST['date_beg'];
	$date_end = $_POST['date_end'];
	$sql .=" AND date_submitted between '{$date_beg}' and '{$date_end}'";
}
$sql .= " AND r1.journal_id = '{$journal_id}'";
$output = '';
$final_query = query($sql);
confirm($final_query);

	$output .= '<table id="user_query" class="table table-bordered table-hover">
                                <thead>
                                <tr>  
                                <th>Document Name</th>
                                    <th>Status</th>                                    
                                    <th>Journal</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>';
if(row_count($final_query) > 0)
{
while($row_docu = fetch_assoc($final_query))
{

	
				$output .= '<tr>
                   <td style="white-space: nowrap;">'. $row_docu['title'].'</td>
                  <td style="white-space: nowrap;">'. $row_docu['status'].'</td>
                   <td style="white-space: nowrap;">'.$row_docu['journal_name'].'</td>
                   <td style="white-space: nowrap;">'. $row_docu['date_submitted'].'</td>

                          
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