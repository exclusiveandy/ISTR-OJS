<?php
 include "../../function.php"; 
if(!empty($_FILES))
{
	
	$name = $_FILES['about_ojs_photo']['name'];
	$target = "../../images/".$name;
	move_uploaded_file($_FILES['about_ojs_photo']['tmp_name'], $target);
	$output = '';
	if(!empty($_POST['about_ojs_photo_id']))
	{
		$id = $_POST['about_ojs_photo_id'];
	 	$query = "UPDATE about_ojs_picture SET picture_name = '{$name}', picture_location = '{$target}' where picture_id = '{$id}'";
	 	resize_image($target, 750, 300, $target);
	}
	else
	{
		 $query ="INSERT into about_ojs_picture(picture_name, picture_location) VALUES('{$name}', '{$date}' ,'{$target}') ";
		resize_image($target, 750, 300, $target);
	}
	 	$final_query = query($query);
	 	confirm($final_query);
		$about_ojs_picture_query = query("SELECT * from about_ojs_picture");
		confirm($about_ojs_picture_query);
		$row = mysqli_fetch_array($about_ojs_picture_query);
		echo json_encode($row);
}
?>