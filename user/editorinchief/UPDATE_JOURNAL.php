            
     <?php
 include "../../function.php";

     			$title = escape_string($_POST['title']);
             
              	$desc = escape_string($_POST['Description']);
              	
              	$print_issn = escape_string($_POST['Print_issn']);
              	
              	$id = escape_string($_POST['id']);
              	
              	$online_issn = escape_string($_POST['Online_issn']);
              	
              	$email = escape_string($_POST['email_address']);
              	$journal_image = $_FILES['journal_picture']['name'];
              	if(empty($journal_image))
              	{
              		if(!empty($title) && !empty($desc) && !empty($print_issn) && !empty($online_issn) && !empty($email))
              	{
              	$UPDATE = query("UPDATE journal_table SET journal_name='{$title}',description='{$desc}',print_issn='{$print_issn}',online_issn='{$online_issn}',email_address='{$email}' WHERE journal_id = '{$id}'");
              	confirm($UPDATE);
              	}	

              	}
              	else
              	{


              	if(!empty($title) && !empty($desc) && !empty($print_issn) && !empty($online_issn) && !empty($email))
              	{
         			$target = "../../images/".$journal_image;
  
              	move_uploaded_file($_FILES['journal_picture']['tmp_name'], $target);
              	$UPDATE = query("UPDATE journal_table SET journal_name='{$title}',description='{$desc}',print_issn='{$print_issn}',online_issn='{$online_issn}',email_address='{$email}', journal_image = '{$journal_image}' WHERE journal_id = '{$id}'");
              	confirm($UPDATE);

              	}		
              		}
              ?>