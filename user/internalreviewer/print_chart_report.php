<?php
require "../../../fpdf/fpdf.php";
include "../../../function.php";
class myPdf	extends FPDF{
	function header(){
		$this->Image('../../img/istrlogo.png',10,6);
		$this->SetFont('Arial', 'B', 14);
		$this->Cell(276,5,'Documents',0,0,'C');
		$this->Ln();
		$this->SetFont('Times', '',12);
		$this->Cell(276,10,'Institute of Science and Technology Research',0,0,'C');
		$this->Ln(20);
	}
	function footer(){
		$this->	SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}

	function headertable(){
		$this->SetFont('Times','B',12);
		$this->Cell(70,8,'Month', 1,0,'C');
		$this->Cell(50,8,'Submitted', 1,0,'C');
		$this->Cell(50,8,'Publish', 1,0,'C');
				$this->Cell(50,8,'Rejected', 1,0,'C');
				$this->Cell(50,8,'Ongoing', 1,0,'C');
		$this->Ln();
	}

	function passed_table(){
		$user_id = $_SESSION['id'];
		$this->SetFont('Times', '', 12);
		$query = query("SELECT month_table.month as month, COUNT(research_id) as count
FROM month_table
  LEFT JOIN research_table ON (month_table.id = MONTH(research_table.date_submitted) 
    AND research_table.user_id = '{$user_id}'
  )
GROUP BY month_table.month
ORDER BY month_table.id ASC");
		$query_published = query("SELECT month_table.month as month, COUNT(research_id) as count
FROM month_table
  LEFT JOIN research_table ON (month_table.id = MONTH(research_table.date_submitted) 
    AND research_table.user_id = '{$user_id}' and research_table.status = \"Published\"
  )
GROUP BY month_table.month
ORDER BY month_table.id ASC");

$rejected_query = query("SELECT month_table.month as month, COUNT(research_id) as count
FROM month_table
  LEFT JOIN research_table ON (month_table.id = MONTH(research_table.date_submitted) 
    AND research_table.user_id = '{$user_id}' and research_table.status = \"Rejected\" and user_role_id = '1'
  )
GROUP BY month_table.month
ORDER BY month_table.id ASC");

	$ongoing_query = query("SELECT month_table.month as month, COUNT(research_id) as count
	FROM month_table
	  LEFT JOIN research_table ON (month_table.id = MONTH(research_table.date_submitted) 
	    AND research_table.user_id = '{$user_id}' and research_table.status NOT IN (\"Rejected\", \"Published\")
	  )
	GROUP BY month_table.month
	ORDER BY month_table.id ASC");

		while($row_passed = fetch_assoc($query))
		{
		$row_data_publish = fetch_assoc($query_published);
		$row_data_rejected = fetch_assoc($rejected_query);
		$row_data_ongoing = fetch_assoc($ongoing_query);
		$this->Cell(70,8,$row_passed['month'], 1,0,'C');
		$this->Cell(50,8,$row_passed['count'], 1,0,'C');
		$this->Cell(50,8,$row_data_publish['count'], 1,0,'C');
		$this->Cell(50,8,$row_data_rejected['count'], 1,0,'C');
		$this->Cell(50,8,$row_data_ongoing['count'], 1,0,'C');
		$this->Ln();
		
		}
	




	}

	function headertable2(){
		$this->SetFont('Times','B',12);
		$this->Cell(70,8,'Month', 1,0,'C');
		$this->Cell(50,8,'Reviewed', 1,0,'C');
		$this->Cell(50,8,'Accepted', 1,0,'C');
		$this->Cell(50,8,'Rejected', 1,0,'C');
		$this->Ln();
	}

	function passed_table2(){
		$user_id = $_SESSION['id'];
		$this->SetFont('Times', '', 12);
		$reviewed_query = query("SELECT month_table.month as month, COUNT(research_id) as count
FROM month_table
  LEFT JOIN research_table ON (month_table.id = MONTH(research_table.date_submitted) 
    AND research_id in (SELECT research_id from reviewer_table where user_id = '{$user_id}') 
  ) 
GROUP BY month_table.month
ORDER BY month_table.id ASC");
		$query_published = query("SELECT month_table.month as month, COUNT(research_id) as count
FROM month_table
  LEFT JOIN research_table ON (month_table.id = MONTH(research_table.date_submitted) 
    AND research_table.research_id  in ( SELECT
           reviewer_table.research_id
from research_file_history_table
join reviewer_table
on reviewer_table.research_id=research_file_history_table.research_id
AND reviewer_table.user_id = '{$user_id}'
group by research_file_history_table.research_id
having MAX(research_file_history_table.user_role_id)+1 <> 4))
 GROUP BY month_table.month
ORDER BY month_table.id ASC");


$rejected_query = query("SELECT month_table.month as month, COUNT(research_id) as count
FROM month_table
  LEFT JOIN research_table ON (month_table.id = MONTH(research_table.date_submitted) 
    AND research_table.research_id  in ( SELECT
           reviewer_table.research_id
from research_file_history_table
join reviewer_table
on reviewer_table.research_id=research_file_history_table.research_id
AND reviewer_table.user_id = '{$user_id}'
group by research_file_history_table.research_id
having MAX(research_file_history_table.user_role_id)+1 = 4) and research_table.status = \"Rejected\")
 GROUP BY month_table.month
ORDER BY month_table.id ASC");

		while($row_passed = fetch_assoc($reviewed_query))
		{
		$row_data_publish = fetch_assoc($query_published);
		$row_data_rejected = fetch_assoc($rejected_query);
		
		$this->Cell(70,8,$row_passed['month'], 1,0,'C');
		$this->Cell(50,8,$row_passed['count'], 1,0,'C');
		$this->Cell(50,8,$row_data_publish['count'], 1,0,'C');
		$this->Cell(50,8,$row_data_rejected['count'], 1,0,'C');
		$this->Ln();
		}
	




	}
}




$user_id = $_SESSION['id'];
$fullname = $_SESSION['fname']. " ". $_SESSION['mname']." ". $_SESSION['lname'];
$pdf = new myPdf();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->Ln();
$pdf->SetFont('Arial','',15);
$pdf->Cell(110,10,'Name: '.$fullname,0, 0);
$pdf->Ln();
$pdf->Cell(110,10,'Role: Internal Reviewer',0, 0);
$pdf->Ln();
$pdf->headertable();
$pdf->passed_table();
$pdf->AddPage('L','A4',0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',15);
$pdf->Cell(110,10,'Published Articles',0, 0);
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(70,8,'Title', 1,0,'C');
$pdf->Cell(40,8,'Date Submitted', 1,0,'C');
$pdf->Cell(60,8,'Journal Name', 1,0,'C');
$pdf->Cell(40,8,'Date Published', 1,0,'C');
$pdf->Cell(30,8,'Volume', 1,0,'C');
$pdf->Cell(30,8,'Issue', 1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$published_query = query("SELECT title,DATE_FORMAT(date_submitted, \"%M %d %Y\") as date_submitted, journal_name, DATE_FORMAT(r.date_published, \"%M %d %Y\") as date_published, volume, issue
from research_table r 
join volume_table v 
on r.volume_id=v.volume_id
join journal_table
on r.journal_id=journal_table.journal_id
where r.status=\"Published\" and user_id = '{$user_id}'
group by date_submitted
 ");
while($row_published = fetch_assoc($published_query))
{
	if($pdf->GetStringWidth($row_published['title'])>65){
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(70,8, $row_published['title'], 1, 0, 'L');
		$pdf->SetFont('Arial', '', 12);
	}
	else
	{
				$pdf->Cell(70,8, $row_published['title'],1, 0, 'L' );

	}
$pdf->Cell(40,8,$row_published{'date_submitted'}, 1,0,'L');
		$pdf->SetFont('Arial', '', 7);

$pdf->Cell(60,8,$row_published['journal_name'], 1,0,'L');
		$pdf->SetFont('Arial', '', 12);

$pdf->Cell(40,8,$row_published['date_published'], 1,0,'L');
$pdf->Cell(30,8,$row_published['volume'], 1,0,'L');
$pdf->Cell(30,8,$row_published['issue'], 1,0,'L');
$pdf->Ln();
}


$pdf->AddPage('L','A4',0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',15);
$pdf->Cell(110,10,'Rejected Articles',0, 0);
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(70,8,'Title', 1,0,'C');
$pdf->Cell(70,8,'Date Submitted', 1,0,'C');
$pdf->Cell(70,8,'Journal Name', 1,0,'C');
$pdf->Cell(70,8,'Status', 1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$rejected_query = query("SELECT title,DATE_FORMAT(date_submitted, \"%M %d %Y\") as date_submitted, journal_name, r.status
from research_table r 
join journal_table
on r.journal_id=journal_table.journal_id
where r.status=\"Rejected\" and user_id = '{$user_id}'
group by date_submitted
 ");
while($row_published = fetch_assoc($rejected_query))
{
	if($pdf->GetStringWidth($row_published['title'])>65){
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(70,8, $row_published['title'], 1, 0, 'L');
		$pdf->SetFont('Arial', '', 12);
	}
	else
	{
				$pdf->Cell(70,8, $row_published['title'],1, 0, 'L' );

	}
$pdf->Cell(70,8,$row_published{'date_submitted'}, 1,0,'L');
		$pdf->SetFont('Arial', '', 7);

$pdf->Cell(70,8,$row_published['journal_name'], 1,0,'L');
		$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,8,$row_published['status'], 1,0,'L');
		$pdf->SetFont('Arial', '', 12);
$pdf->Ln();
}


$pdf->AddPage('L','A4',0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',15);
$pdf->Cell(110,10,'On going Articles',0, 0);
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(70,8,'Title', 1,0,'C');
$pdf->Cell(40,8,'Date Submitted', 1,0,'C');
$pdf->Cell(60,8,'Journal Name', 1,0,'C');
$pdf->Cell(70,8,'Status', 1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$rejected_query = query("SELECT title,DATE_FORMAT(date_submitted, \"%M %d %Y\") as date_submitted, journal_name, r.status
from research_table r 
join journal_table
on r.journal_id=journal_table.journal_id
where  r.status NOT IN (\"Rejected\", \"Published\") and user_id = '{$user_id}'
group by date_submitted
 ");
while($row_published = fetch_assoc($rejected_query))
{
	if($pdf->GetStringWidth($row_published['title'])>65){
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(70,8, $row_published['title'], 1, 0, 'L');
		$pdf->SetFont('Arial', '', 12);
	}
	else
	{
	 $pdf->Cell(70,8, $row_published['title'],1, 0, 'L' );

	}
$pdf->Cell(40,8,$row_published{'date_submitted'}, 1,0,'L');
		$pdf->SetFont('Arial', '', 7);

$pdf->Cell(60,8,$row_published['journal_name'], 1,0,'L');
		$pdf->SetFont('Arial', '', 12);
if($pdf->GetStringWidth($row_published['status'])>65){
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(70,8, $row_published['status'], 1, 0, 'L');
		$pdf->SetFont('Arial', '', 12);
	}
	else
	{
	 $pdf->Cell(70,8, $row_published['status'],1, 0, 'L' );

	}
$pdf->Ln();
}

$pdf->AddPage('L','A4',0);
$pdf->Ln();
$pdf->SetFont('Times','B',15);
$pdf->Cell(110,10,'As Internal Reviewer',0, 0);
$pdf->Ln();
$pdf->headertable2();
$pdf->passed_table2();
$pdf->AddPage('L','A4',0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',15);
$pdf->Cell(110,10,'Reviewed Articles',0, 0);
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(70,8,'Title', 1,0,'C');
$pdf->Cell(70,8,'Date Submitted', 1,0,'C');
$pdf->Cell(70,8,'Journal Name', 1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$review_query = query("SELECT title,DATE_FORMAT(date_submitted, \"%M %d %Y\") as date_submitted, journal_name, r.status
from research_table r 
join journal_table
on r.journal_id=journal_table.journal_id
where
  research_id in (SELECT research_id from reviewer_table where reviewer_table.user_id = '{$user_id}') "); 
confirm($review_query);
while($row_review = fetch_assoc($review_query))
{
	if($pdf->GetStringWidth($row_review['title'])>65){
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(70,8, $row_review['title'], 1, 0, 'L');
		$pdf->SetFont('Arial', '', 12);
	}
	else
	{
	 $pdf->Cell(70,8, $row_review['title'],1, 0, 'L' );

	}
$pdf->Cell(70,8,$row_review{'date_submitted'}, 1,0,'L');
		$pdf->SetFont('Arial', '', 7);

$pdf->Cell(70,8,$row_review['journal_name'], 1,0,'L');
		$pdf->SetFont('Arial', '', 12);
		$pdf->Ln();

}

$pdf->AddPage('L','A4',0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',15);
$pdf->Cell(110,10,'Accepted Articles',0, 0);
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(70,8,'Title', 1,0,'C');
$pdf->Cell(70,8,'Date Submitted', 1,0,'C');
$pdf->Cell(60,8,'Journal Name', 1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$review_query = query("SELECT title,DATE_FORMAT(date_submitted, \"%M %d %Y\") as date_submitted, journal_name, r.status
from research_table r 
join journal_table
on r.journal_id=journal_table.journal_id
where
  research_id in (SELECT
           reviewer_table.research_id
from research_file_history_table
join reviewer_table
on reviewer_table.research_id=research_file_history_table.research_id
AND reviewer_table.user_id = '{$user_id}'
group by research_file_history_table.research_id
having MAX(research_file_history_table.user_role_id)+1 <> 4)"); 
confirm($review_query);
while($row_review = fetch_assoc($review_query))
{
	if($pdf->GetStringWidth($row_review['title'])>65){
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(70,8, $row_review['title'], 1, 0, 'L');
		$pdf->SetFont('Arial', '', 12);
	}
	else
	{
	 $pdf->Cell(70,8, $row_review['title'],1, 0, 'L' );

	}
$pdf->Cell(70,8,$row_review{'date_submitted'}, 1,0,'L');
		$pdf->SetFont('Arial', '', 7);

$pdf->Cell(60,8,$row_review['journal_name'], 1,0,'L');
		$pdf->SetFont('Arial', '', 12);
		$pdf->Ln();
		
}



$pdf->AddPage('L','A4',0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','B',15);
$pdf->Cell(110,10,'Rejected Articles',0, 0);
$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(70,8,'Title', 1,0,'C');
$pdf->Cell(70,8,'Date Submitted', 1,0,'C');
$pdf->Cell(60,8,'Journal Name', 1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$review_query = query("SELECT title,DATE_FORMAT(date_submitted, \"%M %d %Y\") as date_submitted, journal_name, r.status
from research_table r 
join journal_table
on r.journal_id=journal_table.journal_id
where
  research_id in (SELECT
           reviewer_table.research_id
from research_file_history_table
join reviewer_table
on reviewer_table.research_id=research_file_history_table.research_id
AND reviewer_table.user_id = '{$user_id}'
group by research_file_history_table.research_id
having MAX(research_file_history_table.user_role_id)+1 = 4)"); 
confirm($review_query);
while($row_review = fetch_assoc($review_query))
{
	if($pdf->GetStringWidth($row_review['title'])>65){
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(70,8, $row_review['title'], 1, 0, 'L');
		$pdf->SetFont('Arial', '', 12);
	}
	else
	{
	 $pdf->Cell(70,8, $row_review['title'],1, 0, 'L' );

	}
$pdf->Cell(70,8,$row_review{'date_submitted'}, 1,0,'L');
		$pdf->SetFont('Arial', '', 7);

$pdf->Cell(60,8,$row_review['journal_name'], 1,0,'L');
		$pdf->SetFont('Arial', '', 12);
		$pdf->Ln();
		
}

$pdf->Output();
?>