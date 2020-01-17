<?php
include "../../../function.php";

if(isset($_GET['path']))
{
	
	$path = $_GET['path'];
	read_doc($path);
	header('Cache-Control: public');
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($path).'"');
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Content-Length: ' . filesize($path));
	readfile($path);
	exit;
}