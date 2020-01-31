<?php
include "../../function.php";
  date_default_timezone_set('Asia/Manila');
  $date = date("Y-m-d");  

$calendar_events = query("SELECT announcement_id, announcement_title, announcement_description, DATE_FORMAT(announcement_date, \"%M %d %Y\") as announcement_date  FROM announcement_table");
	$data =array();
	confirm($calendar_events);
  $result = mysqli_fetch_all($calendar_events, MYSQLI_ASSOC);
	foreach ($result as $row) {
			$data[] = array(
	'id' => $row['announcement_id'],
	'title' => $row['announcement_title'],
	'description' => $row['announcement_description'],
	'date' => $row['announcement_date']);		
	}	
	echo json_encode($data);





?>