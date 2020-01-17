<?php
include "../../../function.php";
if(!empty($_POST))
{
	$user_id = escape_string($_POST['user_id']);
	$note = escape_string($_POST['note']);
	date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s");

    if(isset($_FILES['file']['tmp_name']))
    {
    	$filename =  $_FILES['file']['name'];
    	$ext = $_FILES['file']['name'];
        $ext=pathinfo($ext, PATHINFO_EXTENSION);
        if($ext == "docx")
        {
        	$word_name = preg_replace('/\s+/', '_', "$filename");
            $pattern = '/[.]/';
            $replacement = '('.$user_id.').';
            $word_final_name = preg_replace($pattern,$replacement,$word_name);   
        	$target = "../../../upload_cv_file/".$word_final_name;
        	$pdf_name = substr($word_final_name, 0, strpos($word_final_name, "."));
        	move_uploaded_file($_FILES['file']['tmp_name'], $target);
        	pdf_conversion2($word_final_name, $pdf_name);
        	$insert_querty = query("INSERT INTO apply_reviewer_table(user_id, pdf_file, note, date_applied, filename) VALUES('{$user_id}', '{$pdf_name}', '{$note}', '{$date}', '{$filename}')");
        }
        else
        {
        	$pdf_name = preg_replace('/\s+/', '_', "$filename");
            $pattern = '/[.]/';
            $replacement = '('.$user_id.').';
            $pdf_final_name = preg_replace($pattern,$replacement,$pdf_name);
            $pdf_name = substr($pdf_final_name, 0, strpos($pdf_final_name, "."));
            $target = "../../../upload_cv_file/".$pdf_final_name;
            $copy_file_r = "../../../upload_pdf_file/".$pdf_final_name;
            move_uploaded_file($_FILES['file']['tmp_name'], $target);
            copy($target, $copy_file_r);
            $chk_query = query("SELECT * from apply_reviewer_table where user_id = '{$user_id}'");
            if(row_count($chk_query) > 0)
            {
                $delete_all = query("DELETE from apply_reviewer_table where user_id = '{$user_id}'");
            }
            $insert_querty = query("INSERT INTO apply_reviewer_table(user_id, pdf_file, note, date_applied, filename) VALUES('{$user_id}', '{$pdf_name}', '{$note}', '{$date}', '{$filename}')");
        }
    }
		
		confirm($insert_querty);
}
?>