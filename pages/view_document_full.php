<?php
include 'function.php';
$id = $_GET['id'];
 $query = query("SELECT r_filename,  research_id, s_filename, DATE_FORMAT(date_submitted, \"%M %d %Y\") as date_submitted, DATE_FORMAT(date_published, \"%M %d %Y\") as date_published,   j2.journal_name, title, abstract, reference_code from research_table r1 join journal_table j2 on r1.journal_id=j2.journal_id    where r1.research_id = '{$id}'");
$row_file = fetch_assoc($query);
$r_filename = $row_file['r_filename'];
$counter = $row_file['reference_code'];
$replacement = '('.$counter.').';
$pattern = '/[.]/';
$pdf_filename = preg_replace($pattern,$replacement,$r_filename);
$filename = substr($pdf_filename, 0, strpos($pdf_filename, "."));
$path = '../upload_pdf_file/'.$filename.'.pdf';
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename='.$path);
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
readfile($path);

?>