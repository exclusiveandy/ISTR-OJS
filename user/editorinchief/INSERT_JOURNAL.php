            
     <?php
 include "../../function.php";

     			$title = escape_string($_POST['title']);
              	
              	$desc = escape_string($_POST['Description']);
              	
              	$print_issn = escape_string($_POST['Print_issn']);
              	
              	$online_issn = escape_string($_POST['Online_issn']);
              	
              	$email = escape_string($_POST['email_address']);
              	$journal_image = $_FILES['journal_picture']['name'];
              	if(!empty($title) && !empty($desc) && !empty($print_issn) && !empty($online_issn) && !empty($email))
              	{
         			$target = "../../images/".$journal_image;
              	
              	move_uploaded_file($_FILES['journal_picture']['tmp_name'], $target);
              	$insert = query("INSERT INTO journal_table(journal_name, description, print_issn, online_issn, email_address, journal_image, status) VALUES ('{$title}', '{$desc}', '{$print_issn}', '{$online_issn}', '{$email}', '{$journal_image}', 'Active')");
              	confirm($insert);
              	}		

              ?>