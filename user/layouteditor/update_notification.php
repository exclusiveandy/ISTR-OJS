		<?php
include "../../../function.php";
$user_id = $_SESSION['id'];
$query = query("UPDATE notification set status = 'read' where user_id = '{$user_id}'");
$output = '';
$output .= '
          <i class="far fa-bell"></i>';
        echo $output;

?>