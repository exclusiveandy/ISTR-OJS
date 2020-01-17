<?php include "../../function.php"; 
unset( $_SESSION['fname'] );
unset( $_SESSION['mname']); 
unset($_SESSION['lname']);  
unset($_SESSION['id']); 
unset($_SESSION['email']); 
unset($_SESSION['affi']);
  set_message("<div class=\"alert alert-primary\" role=\"alert\">Your account has been logout</div>");
  redirect("../../login.php")
?>
