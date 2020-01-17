<?php
include '../../../function.php';
$id = $_GET['id'];
 $plagiarism_file_query = query("SELECT plagiarism_file from research_table where research_id = '{$id}'");
$row_file = fetch_assoc($plagiarism_file_query);
$path = '../../../upload_plagiarism/'.$row_file['plagiarism_file'];
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename='.$path);
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
readfile($path);