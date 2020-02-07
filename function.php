<?php 
include("database/connection.php");
require("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Intervention\Image\ImageManagerStatic as Image;



$cvfileurl = "C:/Users/APN-Guest-/Desktop/xamppnew/htdocs/ISTR-OJS/uploads/cv/";
$originalfileurl = "C:/Users/APN-Guest-/Desktop/xamppnew/htdocs/ISTR-OJS/uploads/original/";
$pdffileurl = "C:/Users/APN-Guest-/Desktop/xamppnew/htdocs/ISTR-OJS/uploads/pdf/";
$plagiarismfileurl = "C:/Users/APN-Guest-/Desktop/xamppnew/htdocs/ISTR-OJS/uploads/plagiarism/";; 



require_once 'vendor/phpoffice/phpword/bootstrap.php';

ob_start();
session_start();    
function redirect($location){
    header("Location: $location");
}

function validate(){
if(!isset($_SESSION['id']))
    {
      redirect('../../login.php');
    }
}

function resize_image($filelocation, $width, $height, $saveas){
$image = Image::make($filelocation)->resize($width, $height)->save($saveas);
}

function forgot_password(){
              if(isset($_POST['cancel']))
          {
              redirect("login.php");
          }
             else if(isset($_POST['send']))
            {
              if(empty($_POST['email']))
              {
                validation_error("Please fill out your email");
              }
              else
                {
                          $email = escape_string($_POST['email']);
                          $sql = query("SELECT * from user_table where user_email = '{$email}'");
                           if(row_count($sql)==1)
                          {
                            $validation_code = escape_string(md5($email . microtime()));
                            $subject = "Please reset your password";
                            $msg = "Here is your password reset code <b>{$validation_code}</b>
                            Click here to reset your password http://localhost/istr-ojs/pages/code.php?email=$email&code=$validation_code";
                            setcookie('temp_access_code', $validation_code, time()+900);
                            send_email($email, $subject, $msg);
                            $sql = query("UPDATE user_table set validation_code = '{$validation_code}' where user_email = '{$email}'");
                            confirm($sql);
                               set_message("<div class=\"alert alert-primary\" role=\"alert\">Please check your email or spam folder for password reset</div>");
                                redirect("login.php");
                            

                           }
                      else
                      {
                        validation_error("Your email does not exsist in our system. Kindly register first");
                      }
                }
            }
}
function validation_code(){
    if(isset($_COOKIE['temp_access_code']))
    {
            if(isset($_GET['email']) && isset($_GET['code']))
            {
                    if(isset($_POST['validation_code']))
                    {
                            $email = escape_string($_GET['email']);
                            $code = escape_string($_POST['validation_code']);
                            $sql = query("SELECT * from user_table where validation_code = '{$code}' AND user_email = '{$email}'");
                            confirm($sql);
                            if(row_count($sql) == 1)
                            {
                              setcookie('temp_access_code', $code, time()+300);
                              redirect("resetpassword.php?email=$email&validation_code=$code");
                            }
                            else
                            {
                                echo validation_error("Sorry wrong validation code");
                            }


                    }
            }
            else
            {
                redirect("login.php");
            }
    }
    else
    {
        set_message("<div class=\"alert alert-secondary\" role=\"alert\"> Sorry your validation code has expired!! </div>");
        redirect("login.php");

    }
}

function password_reset(){
     if(isset($_COOKIE['temp_access_code']))
    {
         
                if(isset($_GET['email']) && isset($_GET['validation_code']))
                {
                    if(isset($_POST['Reset']))
                    {
                        if($_POST['cpassword'] === $_POST['npassword'])
                        {
                            $pass = escape_string($_POST['npassword']);
                            $cpassword = escape_string($_POST['cpassword']);
                            $email = escape_string($_GET['email']);
                            if(empty($pass) || empty($cpassword))
                            {
                                validation_error("Please fill out both fields");
                            }
                            else
                            {
                                 
                                 $password = password_hash($pass, PASSWORD_BCRYPT, array('cost' => 12) );
                                 $sql = query("UPDATE user_table set user_password = '{$password}' where user_email = '{$email}'");
                                 confirm($sql);
                                set_message("<div class=\"alert alert-primary\" role=\"alert\">Successful on reseting the password</div>");
                                    redirect("login.php");



                            } 

                        }
                        else
                        {
                            echo validation_error("Password does not match");
                        }
                    }
               


                }
                else
                {

                }
    }
    else
    {
                set_message("<div class=\"alert alert-secondary\" role=\"alert\"> Sorry your time has expired!! </div>");
                redirect("forgotpassword.php");

    }
}


function send_email($email, $subject, $msg){
// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);


    //Server settings
                                    // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ojs.pup@gmail.com';                     // SMTP username
    $mail->Password   = 'pupojs2019';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;   
            
    $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );                         // TCP port to connect to

    //Recipients
    $mail->AddReplyTo( 'ojs.pup@gmail.com', 'Contact ISTR' );
    $mail->setFrom('ojs.pup@gmail.com', 'Institute of Science and Research Technology - PUP ');
    $mail->addAddress($email);     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;
    $mail->AltBody = $msg;
    $mail->send();
  

//return mail($email, $subject, $msg);


}

function read_doc($filename){
require_once 'phpdocx-master/Classes/Phpdocx/Create/CreateDocx.inc';
$newDocx = new Phpdocx\Utilities\DocxUtilities();
$newDocx->setLineNumbering($filename, $filename, array('continuous'));
}

function remove_line_number($filename){
require_once 'phpdocx-master/Classes/Phpdocx/Create/CreateDocx.inc';
$newDocx = new Phpdocx\Utilities\DocxUtilities();
$newDocx->setLineNumbering($filename, $filename, array('countBy' => 0));
}


function validate_pages($filetmpname)
{

    if(!empty($filetmpname))
        {
      $zip = new \PhpOffice\PhpWord\Shared\ZipArchive();
      $zip->open($filetmpname);
      $xml = new \DOMDocument();
      $xml->loadXML($zip->getFromName("docProps/app.xml"));
       // Echoes number of pages according to app.xml 
       $pages = $xml->getElementsByTagName('Pages')->item(0)->nodeValue;
      if($pages < 5 )
      {   
        echo "*THE RESEARCH SHOULD BE MORE THAN 5 PAGES";
        return true;
      }
      else if ($pages > 15)
      {
        echo "*THE RESEARCH SHOULD BE LESS THAN 15 PAGES";
        return true;
      }
      else
      {
        return false;
      }
    }
    else
    {
      echo "*ERROR IN READING THE FILE";
      return true;
    }

}



function pdf_conversion($file,$filename)
{

  $url_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  chdir('../../uploads/original');   
  
  // if you are using composer, just use this
  $word = new COM("Word.Application") or die ("Could not initialise Object.");
  // set it to 1 to see the MS Word window (the actual opening of the document)
  $word->Visible = 0;
  // recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
  $word->DisplayAlerts = 0;
  // open the word 2007-2013 document    
  $word->Documents->Open(getcwd()."/{$file}"); //localhost   //dirname($url_link)."/uploads/original/{$file}.docx"  
  // convert word 2007-2013 to PDF
  $word->ActiveDocument->ExportAsFixedFormat(getcwd()."/{$filename}.pdf", 17, false, 0, 0, 0, 0, 7, true, true, 2, true, true, false);
  // quit the Word process
  $word->Documents->Close(false);
  $word->Quit(false);
  // clean up
  unset($word);

}


function pdf_conversion2($file,$filename)
{

  chdir('../../uploads/original');  
  // if you are using composer, just use this
  $word = new COM("Word.Application") or die ("Could not initialise Object.");
  // set it to 1 to see the MS Word window (the actual opening of the document)
  $word->Visible = 0;
  // recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
  $word->DisplayAlerts = 0;
  // open the word 2007-2013 document 
  $word->Documents->Open(getcwd()."/{$file}"); //localhost
  // convert word 2007-2013 to PDF
  chdir('../uploads/pdf');
  $word->ActiveDocument->ExportAsFixedFormat(getcwd()."/{$filename}.pdf", 17, false, 0, 0, 0, 0, 7, true, true, 2, true, true, false);
  // quit the Word process
  $word->Documents->Close(false);
  $word->Quit(false);
  // clean up
  unset($word);
}





function query($sql) {
global $connection;
    return mysqli_query($connection, $sql);
}

function multi_query($sql) {
global $connection;
    return mysqli_multi_query($connection, $sql);
}
function last_id(){
    global $connection;
    return mysqli_insert_id($connection);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("Query Failed ". mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;
    return mysqli_escape_string($connection, $string);
}

function fetch_assoc($result){
return mysqli_fetch_assoc($result);
}

function clean($string){
  htmlentities($string);
}

function row_count($result){
  return mysqli_num_rows($result);
}

function set_message($message){
  if(!empty($message))
  {
    $_SESSION['message'] = $message;
  }
  else
  {
      $message = " ";
  }
}

function display_message()
{
  if(isset($_SESSION['message']))
  {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}


function validation_error($error_message)
{
$error_message =<<<END
  <div class="alert alert-dark alert-dismissible" role="alert">
  <strong>Warning!</strong> $error_message
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
END;
echo $error_message;
}


function login()
{
    if(isset($_POST['login']))
    {
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);
                if(empty($email) || empty($password))
                {
                    $message = <<<END
                    <div class="alert alert-dark" role="alert">
                    *Empty Fields
                    </div>

END;
                    echo $message;
                }
             else
                {
                     
                    $author_query = query("SELECT user_fname, user_mname, user_lname, user_id, user_password, user_email, user_affliation
                     from user_table
                      where user_email = '{$email}' and activate = 1 and user_role_id = 1");
                    confirm($author_query);
                    $managingeditor_query = query(
                        "SELECT user_fname, user_mname, user_lname, u1.user_id, user_password, user_email, user_affliation, u2.journal_id 
                        from user_table u1 
                        join user_journal_table u2 on u1.user_id=u2.user_id 
                        join journal_table j1 on u2.journal_id=j1.journal_id 
                        where  user_email = '{$email}' and activate = 1 and user_role_id = 2");
                    confirm($managingeditor_query);
                   
                    $editorinchief_query = query("
                        SELECT user_fname, user_mname, user_lname, u1.user_id, user_password, user_email, user_affliation, u2.journal_id 
                        from user_table u1 
                        join user_journal_table u2 on u1.user_id=u2.user_id 
                        join journal_table j1 on u2.journal_id=j1.journal_id 
                        where  user_email = '{$email}' and activate = 1 and user_role_id = 3");
                    confirm($editorinchief_query);

                    $internalreviewer_query = query("
                        SELECT user_fname, user_mname, user_lname, u1.user_id, user_password, user_email, user_affliation, u2.journal_id 
                        from user_table u1 
                        join user_journal_table u2 on u1.user_id=u2.user_id 
                        join journal_table j1 on u2.journal_id=j1.journal_id 
                        where  user_email = '{$email}' and activate = 1 and user_role_id = 4");
                    confirm($internalreviewer_query);
                        
                        $externalreviewer_query = query("
                        SELECT user_fname, user_mname, user_lname, u1.user_id, user_password, user_email, user_affliation, u2.journal_id 
                        from user_table u1 
                        join user_journal_table u2 on u1.user_id=u2.user_id 
                        join journal_table j1 on u2.journal_id=j1.journal_id 
                        where  user_email = '{$email}' and activate = 1 and user_role_id = 5");
                    confirm($externalreviewer_query);

                   

     
                    $layouteditor_query = query("SELECT user_fname, user_mname, user_lname, user_id, user_password, user_email, user_affliation
                     from user_table
                      where user_email = '{$email}' and activate = 1 and user_role_id = 7");
                    confirm($layouteditor_query);

                    $proofreader_query = query("SELECT user_fname, user_mname, user_lname, user_id, user_password, user_email, user_affliation
                     from user_table
                      where user_email = '{$email}' and activate = 1 and user_role_id = 6");
                    confirm($proofreader_query);

                    $publicationoffice_query = query("SELECT user_fname, user_mname, user_lname, user_id, user_password, user_email, user_affliation
                     from user_table
                      where user_email = '{$email}' and activate = 1 and user_role_id = 8");
                    confirm($publicationoffice_query);


                     $admin_query = query("SELECT user_fname, user_mname, user_lname, user_id, user_password, user_email, user_affliation
                     from user_table
                      where user_email = '{$email}' and activate = 1 and user_role_id = 9");
                    confirm($admin_query);
                    //Author 
                    if(mysqli_num_rows($author_query)==1)
                    {
                        while($row = fetch_assoc($author_query))
                        {
                            $db_fname = $row['user_fname'];
                            $db_mname = $row['user_mname'];
                            $db_lname = $row['user_lname'];
                            $db_id = $row['user_id'];
                            $db_password = $row['user_password'];
                            $db_email = $row['user_email'];
                            $db_affi = $row['user_affliation'];


                        }
                        if(password_verify($password,$db_password))
                        {
                        
                            $_SESSION['fname'] = $db_fname;
                            $_SESSION['mname'] = $db_mname;
                            $_SESSION['lname'] = $db_lname;  
                            $_SESSION['id'] = $db_id;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['affi'] = $db_affi;
                            redirect("../user/author/home.php");
                        }
                        else
                        {
                            $message = <<<END
                            <div class="alert alert-dark" role="alert">
                            Invalid Email or Password
                            </div>
END;
                        echo $message;
                            unset($_SESSION['fname']);
                            unset($_SESSION['lname']);
                            unset($_SESSION['mname']);
                            unset($_SESSION['id']);
                        }
                    } //Author
                    
                    else if(mysqli_num_rows($editorinchief_query)==1)
                    {
                        while($row = fetch_assoc($editorinchief_query))
                        {
                            $db_fname = $row['user_fname'];
                            $db_mname = $row['user_mname'];
                            $db_lname = $row['user_lname'];
                            $db_id = $row['user_id'];
                            $db_password = $row['user_password'];
                            $db_email = $row['user_email'];
                            $db_affi = $row['user_affliation'];
                            $db_journal = $row['journal_id'];

                        }
                        if(password_verify($password,$db_password))
                        {
                        
                            $_SESSION['fname'] = $db_fname;
                            $_SESSION['mname'] = $db_mname;
                            $_SESSION['lname'] = $db_lname;  
                            $_SESSION['id'] = $db_id;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['affi'] = $db_affi;
                            $_SESSION['journal_id'] = $db_journal;
                            redirect("../user/editorinchief/home.php");
                        }
                        else
                        {
                            $message = <<<END
                            <div class="alert alert-dark" role="alert">
                            Invalid Email or Password
                            </div>
END;
                        echo $message;
                            unset($_SESSION['fname']);
                            unset($_SESSION['lname']);
                            unset($_SESSION['mname']);
                            unset($_SESSION['id']);
                            unset( $_SESSION['journal_id']);
                        }
                    }//editor in chief
                     else if(mysqli_num_rows($managingeditor_query)==1)
                    {
                        while($row = fetch_assoc($managingeditor_query))
                        {
                            $db_fname = $row['user_fname'];
                            $db_mname = $row['user_mname'];
                            $db_lname = $row['user_lname'];
                            $db_id = $row['user_id'];
                            $db_password = $row['user_password'];
                            $db_email = $row['user_email'];
                            $db_affi = $row['user_affliation'];
                            $db_journal = $row['journal_id'];

                        }
                        if(password_verify($password,$db_password))
                        {
                        
                            $_SESSION['fname'] = $db_fname;
                            $_SESSION['mname'] = $db_mname;
                            $_SESSION['lname'] = $db_lname;  
                            $_SESSION['id'] = $db_id;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['affi'] = $db_affi;
                            $_SESSION['journal_id'] = $db_journal;

                            redirect("../user/managingeditor/home.php");
                        }
                        else
                        {
                            $message = <<<END
                            <div class="alert alert-dark" role="alert">
                            Invalid Email or Password
                            </div>
END;
                        echo $message;
                            unset($_SESSION['fname']);
                            unset($_SESSION['lname']);
                            unset($_SESSION['mname']);
                            unset($_SESSION['id']);
                            unset( $_SESSION['journal_id']);
                        }
                    }

                      //managing editor

                     else if(mysqli_num_rows($internalreviewer_query)==1)
                    {
                        while($row = fetch_assoc($internalreviewer_query))
                        {
                            $db_fname = $row['user_fname'];
                            $db_mname = $row['user_mname'];
                            $db_lname = $row['user_lname'];
                            $db_id = $row['user_id'];
                            $db_password = $row['user_password'];
                            $db_email = $row['user_email'];
                            $db_affi = $row['user_affliation'];
                            $db_journal = $row['journal_id'];

                        }
                        if(password_verify($password,$db_password))
                        {
                        
                            $_SESSION['fname'] = $db_fname;
                            $_SESSION['mname'] = $db_mname;
                            $_SESSION['lname'] = $db_lname;  
                            $_SESSION['id'] = $db_id;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['affi'] = $db_affi;
                            $_SESSION['journal_id'] = $db_journal;

                            redirect("../user/InternalReviewer/home.php");
                        }
                        else
                        {
                            $message = <<<END
                            <div class="alert alert-dark" role="alert">
                            Invalid Email or Password
                            </div>
END;
                        echo $message;
                            unset($_SESSION['fname']);
                            unset($_SESSION['lname']);
                            unset($_SESSION['mname']);
                            unset($_SESSION['id']);
                            unset( $_SESSION['journal_id']);
                        }
                    }

                      //InternalReviewer

                    else if(mysqli_num_rows($externalreviewer_query)==1)
                    {
                        while($row = fetch_assoc($externalreviewer_query))
                        {
                            $db_fname = $row['user_fname'];
                            $db_mname = $row['user_mname'];
                            $db_lname = $row['user_lname'];
                            $db_id = $row['user_id'];
                            $db_password = $row['user_password'];
                            $db_email = $row['user_email'];
                            $db_affi = $row['user_affliation'];
                            $db_journal = $row['journal_id'];

                        }
                        if(password_verify($password,$db_password))
                        {
                        
                            $_SESSION['fname'] = $db_fname;
                            $_SESSION['mname'] = $db_mname;
                            $_SESSION['lname'] = $db_lname;  
                            $_SESSION['id'] = $db_id;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['affi'] = $db_affi;
                            $_SESSION['journal_id'] = $db_journal;

                            redirect("../user/externalreviewer/home.php");
                        }
                        else
                        {
                            $message = <<<END
                            <div class="alert alert-dark" role="alert">
                            Invalid Email or Password
                            </div>
END;
                        echo $message;
                            unset($_SESSION['fname']);
                            unset($_SESSION['lname']);
                            unset($_SESSION['mname']);
                            unset($_SESSION['id']);
                            unset( $_SESSION['journal_id']);
                        }
                    }

                      //ExternalReviewer

                    else if(mysqli_num_rows($layouteditor_query)==1)
                    {
                        while($row = fetch_assoc($layouteditor_query))
                        {
                            $db_fname = $row['user_fname'];
                            $db_mname = $row['user_mname'];
                            $db_lname = $row['user_lname'];
                            $db_id = $row['user_id'];
                            $db_password = $row['user_password'];
                            $db_email = $row['user_email'];
                            $db_affi = $row['user_affliation'];


                        }
                        if(password_verify($password,$db_password))
                        {
                        
                            $_SESSION['fname'] = $db_fname;
                            $_SESSION['mname'] = $db_mname;
                            $_SESSION['lname'] = $db_lname;  
                            $_SESSION['id'] = $db_id;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['affi'] = $db_affi;
                            redirect("../user/layouteditor/home.php");
                        }
                        else
                        {
                            $message = <<<END
                            <div class="alert alert-dark" role="alert">
                            Invalid Email or Password
                            </div>
END;
                        echo $message;
                            unset($_SESSION['fname']);
                            unset($_SESSION['lname']);
                            unset($_SESSION['mname']);
                            unset($_SESSION['id']);
                        }
                    } 

                      //Admin

                        else if(mysqli_num_rows($proofreader_query)==1)
                    {
                        while($row = fetch_assoc($proofreader_query))
                        {
                            $db_fname = $row['user_fname'];
                            $db_mname = $row['user_mname'];
                            $db_lname = $row['user_lname'];
                            $db_id = $row['user_id'];
                            $db_password = $row['user_password'];
                            $db_email = $row['user_email'];
                            $db_affi = $row['user_affliation'];


                        }
                        if(password_verify($password,$db_password))
                        {
                        
                            $_SESSION['fname'] = $db_fname;
                            $_SESSION['mname'] = $db_mname;
                            $_SESSION['lname'] = $db_lname;  
                            $_SESSION['id'] = $db_id;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['affi'] = $db_affi;
                            redirect("../user/proofreader/home.php");
                        }
                        else
                        {
                            $message = <<<END
                            <div class="alert alert-dark" role="alert">
                            Invalid Email or Password
                            </div>
END;
                        echo $message;
                            unset($_SESSION['fname']);
                            unset($_SESSION['lname']);
                            unset($_SESSION['mname']);
                            unset($_SESSION['id']);
                        }
                    } 

                       else if(mysqli_num_rows($publicationoffice_query)==1)
                    {
                        while($row = fetch_assoc($publicationoffice_query))
                        {
                            $db_fname = $row['user_fname'];
                            $db_mname = $row['user_mname'];
                            $db_lname = $row['user_lname'];
                            $db_id = $row['user_id'];
                            $db_password = $row['user_password'];
                            $db_email = $row['user_email'];
                            $db_affi = $row['user_affliation'];


                        }
                        if(password_verify($password,$db_password))
                        {
                        
                            $_SESSION['fname'] = $db_fname;
                            $_SESSION['mname'] = $db_mname;
                            $_SESSION['lname'] = $db_lname;  
                            $_SESSION['id'] = $db_id;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['affi'] = $db_affi;
                            redirect("../user/publicationoffice/home.php");
                        }
                        else
                        {
                            $message = <<<END
                            <div class="alert alert-dark" role="alert">
                            Invalid Email or Password
                            </div>
END;
                        echo $message;
                            unset($_SESSION['fname']);
                            unset($_SESSION['lname']);
                            unset($_SESSION['mname']);
                            unset($_SESSION['id']);
                        }
                    } 

                    else if(mysqli_num_rows($admin_query)==1)
                    {
                        while($row = fetch_assoc($admin_query))
                        {
                            $db_fname = $row['user_fname'];
                            $db_mname = $row['user_mname'];
                            $db_lname = $row['user_lname'];
                            $db_id = $row['user_id'];
                            $db_password = $row['user_password'];
                            $db_email = $row['user_email'];
                            $db_affi = $row['user_affliation'];


                        }
                        if(password_verify($password,$db_password))
                        {
                        
                            $_SESSION['fname'] = $db_fname;
                            $_SESSION['mname'] = $db_mname;
                            $_SESSION['lname'] = $db_lname;  
                            $_SESSION['id'] = $db_id;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['affi'] = $db_affi;
                            redirect("../user/admin/home.php");
                        }
                        else
                        {
                            $message = <<<END
                            <div class="alert alert-dark" role="alert">
                            Invalid Email or Password
                            </div>
END;
                        echo $message;
                            unset($_SESSION['fname']);
                            unset($_SESSION['lname']);
                            unset($_SESSION['mname']);
                            unset($_SESSION['id']);
                        }
                    }
                      //Admin 
                    else 
                    {
                        
                                    $message = <<<END
                    <div class="alert alert-dark" role="alert">
  Invalid Email or Password
</div>
END;
                        echo $message;
                        unset($_SESSION['fname']);
                        unset($_SESSION['lname']);
                        unset($_SESSION['mname']);
                        unset($_SESSION['id']);

                    }
                }
    }       

}
function display_journal()
{
    $query = query("SELECT * from journal_table");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
        <option value="{$row['journal_id']}">{$row['journal_name']}</option>
END;
    echo $journal_option;
    }
}

function display_internal_reviewer()
{
    $user_id_query = query("SELECT user_id, journal_id from research_table where research_id = '{$_GET['r_id']}'");
    confirm($user_id_query);
    $row_user = fetch_assoc($user_id_query);
    $user_id = $row_user['user_id'];
    $journal_id = $row_user['journal_id'];
    $query = query("SELECT u1.user_id, CONCAT(user_fname, \" \", user_mname, \" \", user_lname) as fullname, Expertise from user_table u1 join user_journal_table u2 on u1.user_id = u2.user_id where user_role_id = 4 and u1.user_id <> '{$user_id}' and u2.journal_id='{$journal_id}'");
    confirm($query);
    if(row_count($query) > 0)
  {
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
        <option value="{$row['user_id']}">{$row['fullname']} ({$row['Expertise']})</option>
END;
    echo $journal_option;
    }
  }
}

function display_assigned_internal_reviewer()
{
    $query = query("SELECT u1.user_id, CONCAT(user_fname, \" \", user_mname, \" \", user_lname) as fullname, Expertise FROM reviewer_table r 
      join user_table u1 
      on r.user_id=u1.user_id 
      join user_role_table u2
      on u1.user_role_id=u2.user_role_id
      WHERE research_id = '{$_GET['r_id']}' and u2.user_role_name = \"Internal Reviewer\"");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
        <option value="{$row['user_id']}">{$row['fullname']} ({$row['Expertise']})</option>
END;
    echo $journal_option;
    }
}


function display_assigned_external_reviewer()
{
    $query = query("SELECT u1.user_id, CONCAT(user_fname, \" \", user_mname, \" \", user_lname) as fullname, Expertise FROM reviewer_table r 
      join user_table u1 
      on r.user_id=u1.user_id 
      join user_role_table u2
      on u1.user_role_id=u2.user_role_id
      WHERE research_id = '{$_GET['r_id']}' and u2.user_role_name = \"External Reviewer\"");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
        <option value="{$row['user_id']}">{$row['fullname']} ({$row['Expertise']})</option>
END;
    echo $journal_option;
    }
}


function display_external_reviewer()
{
     $user_id_query = query("SELECT user_id, journal_id from research_table where research_id = '{$_GET['r_id']}'");
    confirm($user_id_query);
    $row_user = fetch_assoc($user_id_query);
    $user_id = $row_user['user_id'];
    $journal_id = $row_user['journal_id'];
    $query = query("SELECT u1.user_id, CONCAT(user_fname, \" \", user_mname, \" \", user_lname) as fullname, Expertise from user_table u1 join user_journal_table u2 on u1.user_id = u2.user_id where user_role_id = 5 and u1.user_id <> '{$user_id}' and u2.journal_id='{$journal_id}'");
    confirm($query);
    if(row_count($query) > 0)
  {
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
        <option value="{$row['user_id']}">{$row['fullname']} ({$row['Expertise']})</option>
END;
    echo $journal_option;
    }
  }
}


function display_table_research($user_id)
{
    $user = $user_id;
    $query = query("SELECT research_id, journal_name, title, r.status, research_file, reference_code, DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted FROM research_table as r JOIN journal_table as j ON r.journal_id=j.journal_id where user_id = '{$user}' and r.user_role_id = '1' order by date_submitted asc");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
             <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
             <td>
             <a href="view_document.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>
            </tr>     
END;
    echo $journal_option;
    }
}


function display_accepted_with_revision($user_id)
{
    $user = $user_id;
    $query = query("SELECT research_id, journal_name, title, r.status, research_file, reference_code, DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted FROM research_table as r JOIN journal_table as j ON r.journal_id=j.journal_id where user_id = '{$user}' and r.user_role_id = '1' and r.status = \"Accepted with Revisions\" order by date_submitted asc");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
             <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
             <td>
             <a href="document_revision.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>
            </tr>     
END;
    echo $journal_option;
    }
}

function display_layout_consent($user_id)
{
    $user = $user_id;
    $query = query("SELECT research_id, journal_name, title, r.status, research_file, reference_code, DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted FROM research_table as r JOIN journal_table as j ON r.journal_id=j.journal_id where user_id = '{$user}' and r.user_role_id = '1' and r.status = \"To the Author for Consent\" order by date_submitted asc");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
             <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
             <td>
             <a href="view_layout_document.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>
            </tr>     
END;
    echo $journal_option;
    }
}



function display_table_research_managingeditor($journal_id)
{
    
    $query = query("SELECT research_id, journal_name, title, r.status, research_file, reference_code,  DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, r.journal_id
     FROM `research_table`as r 
     JOIN journal_table as j ON r.journal_id=j.journal_id 
     where user_role_id = '2' and r.journal_id='{$journal_id}' order by research_id asc");
    confirm($query);
    while($row = fetch_assoc($query))
    {
         if($row['status'] == "Rejected" || $row['status'] == "Accepted with Revisions" || $row['status'] == "To the Author for Consent")
        {
            $journal_option =<<<END
                       <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                      <td>
             <a href="docview_send_to_author.php?r_id={$row['research_id']}" class="btn btn-info btn-md" id="hello" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>
            </tr>     
END;
                     echo $journal_option;
        }
        else if($row['status'] == "Issue of Volume" || $row['status'] == "To the Publication Office(Proofreader)" || $row['status'] == "To the Publication Office(Layout Editor)")
        {
            $journal_option =<<<END
                       <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                      <td>
             <a href="docview_send_to_EIC.php?r_id={$row['research_id']}" class="btn btn-info btn-md" id="hello" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>
            </tr>     
END;
                     echo $journal_option;
        }
        else
        {
                $journal_option =<<<END
                     <tr>
                      <td>{$row['reference_code']}</td>
                      <td>{$row['title']}</td>
                      <td>{$row['journal_name']}</td>
                      <td>{$row['status']}</td>
                      <td>{$row['date_submitted']}</td>
                          <td>
                     <a href="view_document.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
                     </td>
                      <td>
                    <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
                    </td>

                    </tr>
         
END;
    echo $journal_option;
        }
    }
}


function display_table_research_proofreader($user_id)
{
    
    $query = query("SELECT r1.research_id, journal_name, title, r1.status, research_file, reference_code,  DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, r1.journal_id
     FROM `research_table`as r1 
     JOIN proofreader_table as r2 ON r1.research_id=r2.research_id
      JOIN journal_table as j ON r1.journal_id=j.journal_id 
     where r2.user_id =  '{$user_id}' and r1.user_role_id = 6");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
             <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                  <td>
             <a href="view_document.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>

            </tr>
         
END;
    echo $journal_option;
    }
}


function display_table_research_PublicationOffice()
{
    
    $query = query("SELECT research_id, journal_name, title, r.status, research_file, reference_code,  DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, r.journal_id
     FROM `research_table`as r 
     JOIN journal_table as j ON r.journal_id=j.journal_id 
     where user_role_id = '8' and r.status = \"Assigning of Volume and Issue\"order by research_id asc");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
             <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                  <td>
             <a href="view_document.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
             <a href="volumePO.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fas fa-tasks"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>

            </tr>
         
END;
    echo $journal_option;
    }
}


function display_table_research_LayoutEditor($user_id)
{
    
    $query = query("SELECT r1.research_id, journal_name, title, r1.status, research_file, reference_code,  DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, r1.journal_id
     FROM `research_table`as r1 
     JOIN layouteditor_table as r2 ON r1.research_id=r2.research_id
      JOIN journal_table as j ON r1.journal_id=j.journal_id 
     where r2.user_id =  '{$user_id}' and r1.user_role_id = 7");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
             <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                  <td>
             <a href="view_document.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>

            </tr>
         
END;
    echo $journal_option;
    }
}

function display_table_research_internal_reviewer($user_id)
{
    
    $query = query("SELECT r1.research_id, journal_name, title, r1.status, research_file, reference_code,  DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, r1.journal_id
     FROM `research_table`as r1 
     JOIN reviewer_table as r2 ON r1.research_id=r2.research_id
      JOIN journal_table as j ON r1.journal_id=j.journal_id 
     where r2.user_id =  '{$user_id}' and r1.user_role_id = 4");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
             <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                  <td>
             <a href="view_reviewer_document.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>

            </tr>
         
END;
    echo $journal_option;
    }
}

function display_table_research_external_reviewer($user_id)
{
    
    $query = query("SELECT r1.research_id, journal_name, title, r1.status, research_file, reference_code,  DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted, r1.journal_id
     FROM `research_table`as r1 
     JOIN reviewer_table as r2 ON r1.research_id=r2.research_id
      JOIN journal_table as j ON r1.journal_id=j.journal_id 
     where r2.user_id =  '{$user_id}' and r1.user_role_id = 5");
    confirm($query);
    while($row = fetch_assoc($query))
    {
        $journal_option =<<<END
             <tr>
              <td>{$row['title']}</td>
              <td>{$row['reference_code']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                  <td>
             <a href="view_reviewer_document.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>

            </tr>
         
END;
    echo $journal_option;
    }
}



    
function display_table_research_editorinchief($journal_id)
{
    
    $query = query("SELECT r.research_id, journal_name, title, r.status, research_file, reference_code,  DATE_FORMAT(r.date_submitted, \"%M %d %Y %r\") as date_submitted, r.journal_id, MAX(r2.user_role_id) as counter
     FROM `research_table`as r 
     JOIN journal_table as j ON r.journal_id=j.journal_id 
     join research_file_history_table as r2 ON r.research_id=r2.research_id
     where r.user_role_id = '3' and r.journal_id='{$journal_id}' group by r2.research_id order by r.research_id asc");
    confirm($query);
    while($row = fetch_assoc($query))
    {

        if($row['status'] == "Assign an Internal Reviewer")
        {
                    $journal_option =<<<END
                       <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                      <td>
             <a href="assign_internal_reviewer.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>
            </tr>     
END;
    echo $journal_option;
        }
         else  if($row['status'] == "Assign an External Reviewer")
        {
                    $journal_option =<<<END
                       <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                      <td>
             <a href="assign_external_reviewer.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>


            </tr>
         
END;

    echo $journal_option;

        }

    
       else  if($row['status'] == "To the Publication Office(Layout Editor)" ||  $row['status'] == "To the Publication Office(Proofreader)" || $row['status'] == "Issue of Volume")
        {
                    $journal_option =<<<END
                       <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                      <td>
             <a href="docview_send_to_PO.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
            </td>
            <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>


            </tr>
         
END;

    echo $journal_option;
        }
       else  if($row['status'] == "Rejected" || $row['status'] == "Rejected by the External Reviewer" || $row['status'] == "Accepted with Revisions" || $row['status'] == "Accepted with Revisions" || $row['status'] == "To the Author for Consent")
        {
                    $journal_option =<<<END
                       <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                      <td>
             <a href="docview_send_to_me.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
            </td>
            <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>


            </tr>
         
END;

    echo $journal_option;

        }

        else
        {


        $journal_option =<<<END
                       <tr>
              <td>{$row['reference_code']}</td>
              <td>{$row['title']}</td>
              <td>{$row['journal_name']}</td>
              <td>{$row['status']}</td>
              <td>{$row['date_submitted']}</td>
                      <td>
            
             <a href="view_document.php?r_id={$row['research_id']}" class="btn btn-info btn-md" style="margin-left: 20%;"><span class="fa fa-book"></span></a>
             </td>
              <td>
            <a href="download.php?path={$row['research_file']}" class="btn btn-info btn-md"><span class="fa fa-download"></span></a>
            </td>


            </tr>
         
END;

    echo $journal_option;
       }
    }
}

function activate_user()
{

  if(isset($_GET['email']))
  {
    $email = escape_string($_GET['email']);
      echo $email;
      $sql = query("SELECT * from user_table where user_email = '{$email}'");
      confirm($sql);
      if(row_count($sql) == 1)
      {
        date_default_timezone_set('Asia/Manila');
        $date = date("Y-m-d H:i:s");
        $salutation = escape_string($_POST['salutation']);
        $sql2 = query("UPDATE user_table SET activate = 1, register_date = '{$date}' WHERE user_email = '{$email}'");
        confirm($sql2);
        set_message("<h6><p>Your account has been activated please login</p></h6>");
         $message = $email." has registered to the system";
         $notification = "INSERT INTO notification(message,date,status,notification_type, user_id) VALUES ('{$message}', '{$date}', 'unread', 'user', '2')";
         query($notification);
        redirect("login.php");

      }
      else
      {
        set_message("<h6><p>Your account does not exsist in our system</p></h6>");
        redirect("login.php");

      }

  }   
}


function notification()
{
         $notification = "INSERT INTO notification(message,date,status,notification_type, user_id) VALUES ('{$message}', '{$date}', {$status}, {type}, {user_role_id}, {user_id})";


}

function show_supplementary_file($s_file)
{

  if(!empty($s_file))
{
  $research_id = escape_string($_GET['r_id']);
    $query = query("SELECT r_filename, s_filename, supplementary_file, research_file, DATE_FORMAT(date_submitted, \"%M %d %Y %r\") as date_submitted from research_table where research_table.research_id = '{$research_id}'");
              while($row = fetch_assoc($query))
            {
            
  $s_file =<<<END
            <div class="card-body">
          <h5><b>Supplementary File </b></h5>
          <table class="table table-bordered table-condensed table-striped">
                    <tr><th>Original File</th>
              
              <th>Date Uploaded</th>
              <th></th>
            </tr>
            <tr>
            <td>
            <h5><a href="download.php?path={$row['supplementary_file']}" target="_blank">
            {$row['s_filename']}</a></h5>
            </td>
            <td colspan="2"><h5>{$row['date_submitted']}</h5></td>
           </tr>
           </table>
           </div>
 
END;
      echo $s_file;
        }
    }
}

function show_appraises()
{
    if(isset($_GET['r_id']))
    {   
        $id = $_GET['r_id'];
        $query = query("SELECT * from line_number where research_id = '{$id}'");

        confirm($query);
        while($row = fetch_assoc($query))
        {
        $appraise =<<<END
 <tr>
              <td>{$row['line_number']}</td>
              <td>{$row['comment']}</td>

            </tr>
END;
            echo $appraise;
        }
   }
}



