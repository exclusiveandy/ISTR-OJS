<?php include "../../function.php"; 
unset( $_SESSION['fname'] );
unset( $_SESSION['mname']); 
unset($_SESSION['lname']);  
unset($_SESSION['id']); 
unset($_SESSION['email']); 
unset($_SESSION['affi']);
set_message("<h6><p>Your account has been logout</p></h6>");
redirect("../../pages/login.php")
?>
