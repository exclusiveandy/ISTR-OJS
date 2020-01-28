<?php
include "../function.php";


       $fname = escape_string($_POST['fname']);
       $mname = escape_string($_POST['mname']);
       $lname = escape_string($_POST['lname']);
       $email = escape_string($_POST['email']);
       $password = escape_string($_POST['password']);
       $contact =  $_POST['contact'];
       $address =  escape_string($_POST['maddress']);
       $affli =  escape_string($_POST['affli']);
       $bio =  escape_string($_POST['bio']);
       $expert = escape_string($_POST['expert']);
       $gender = escape_string($_POST['gender']);
       $salutation = escape_string($_POST['salutation']);
       if((!empty($fname) &&  !empty($lname) && !empty($email) && !empty($password) && !empty($password) && !empty($password)) && !ctype_space($fname) && !ctype_space($lname) && !ctype_space($email) && !ctype_space($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) 
       {
            $query = query("SELECT * from user_table where user_email = '{$email}'");
            confirm($query);
            if(mysqli_num_rows($query)==1)
            {
                $response['status'] = "Email is Already used";
                echo json_encode($response);

            }
            else
            {
                $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12) );
                $query = "INSERT INTO user_table (user_fname, user_mname, user_lname, user_email, user_password, user_role_id, user_contact, user_address, user_affliation, user_bio, expertise, gender, user_salutation) ";
                $query .= "Values('{$fname}', '{$mname}', '{$lname}', '{$email}', '{$password}', '1', '{$contact}', '{$address}', '{$affli}', '{$bio}', '{$expert}', '{$gender}', '{$salutation}')" ;
                $register_user_query = query($query);
                confirm($register_user_query);
                set_message("<p class='text-center'>Thank for your registration.<br></p><p>Please check your email or spam folder for activation link</p>");
                $subject = "Acitvate Account";
                $msg = "Hello thank you for registering in Polytechnic University Of the Philippines. For your account activation kindly click the link
                <a href=\"http://localhost/istr-ojs/pages/activate.php?email=$email\">Link Here</a>";
                $name = $lname.", ".$mname.", ".$fname;
                send_email($email, $subject, $msg);
                $response['status'] = "register_guide.php";
                echo json_encode($response);
                
            } 
        }

        if( !empty($email) &&  !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $response['status'] = "Please use appropriate email";
            echo json_encode($response);
        }

                


       // if(empty($fname) || ctype_space($fname)  )
       // {
       //  $span = "First Name is required";
       //  echo $span;
       //  exit;
       // }
       //  if(empty($mname) || ctype_space($mname) )
       // {
       //  $span = "Middle Name is required";
       //  echo $span;
       //  exit;
       // }
       // if(empty($lname) || ctype_space($lname) )
       // {
       //  $span = "Last Name is required";
       //  echo $span;
       //  exit;
       // }
       // if(empty($email) || ctype_space($email) )
       // {
       //  $span = "Email is required";
       //  echo $span;
       //  exit;
       // }
       // if(empty($password) || ctype_space($password) )
       // {
       //  $span = "Password is required";
       //  echo $span;
       //  exit;
       // }
       



    
?>