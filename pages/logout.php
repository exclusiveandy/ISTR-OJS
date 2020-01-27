<?php include "../function.php"; 
unset( $_SESSION['fname'] );
unset( $_SESSION['mname']); 
unset($_SESSION['lname']);  
unset($_SESSION['id']); 
unset($_SESSION['email']); 
unset($_SESSION['affi']);
unset($_SESSION['journal_id']);
  set_message("<div class=\"alert alert-primary\" role=\"alert\"><h5>Your account has been logout.</h5></div>");
redirect("login.php")
?>
