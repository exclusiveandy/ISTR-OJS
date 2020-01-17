   <?php
 include "../../../function.php";
if(isset($_GET['id']))
	$id = $_GET['id'];
{
	$sql = query("UPDATE  journal_table set status = 'Inactive' where journal_id = '{$id}'");
	confirm($sql);
	redirect("journal.php");
}