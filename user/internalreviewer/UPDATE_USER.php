<?php include "../../../function.php";
$fname = escape_string($_POST['fname']);
$mname = escape_string($_POST['mname']);
$lname = escape_string($_POST['lname']);
$contact =  escape_string($_POST['contact']);
$address =  escape_string($_POST['maddress']);
$affli =  escape_string($_POST['affli']);
$bio =  escape_string($_POST['bio']);
$salutation = escape_String($_POST['salutation']);
if((!empty($fname) && !empty($lname)) && !ctype_space($fname) && !ctype_space($address) && !ctype_space($contact) && !ctype_space($lname) && !ctype_space($mname))
{
$query = query("UPDATE user_table SET user_fname= '{$fname}', user_mname = '{$mname}', user_lname = '{$lname}', user_contact = '{$contact}', user_address = '{$address}', user_affliation = '{$affli}', user_salutation = '{$salutation}', user_bio = '{$bio}' WHERE user_id = '{$_SESSION['id']}' ");
confirm($query); 
echo "Updated Successfully";
$update_query = query("Select * from user_table WHERE user_id = '{$_SESSION['id']}'");
confirm($update_query);
while($row = fetch_assoc($update_query))
            {
                $_SESSION['fname'] = $row['user_fname'];
                $_SESSION['mname'] = $row['user_mname'];
                $_SESSION['lname'] = $row['user_lname'];
            }
            echo '<script>window.location.href = "home.php";</script>';

}

else 
{
    $span = "Empty Fields";
    echo $span;
}
?>