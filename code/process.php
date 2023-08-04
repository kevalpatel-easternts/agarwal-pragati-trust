<?php
include "inc/mainapp.php";
$today_date = date('Y-m-d');

$dwnldsql = "INSERT INTO download_brochure SET
			bname = '".$_REQUEST['Name']."',
			bemail = '".$_REQUEST['Email']."',
			bproject = '".$_REQUEST['Project']."',
			bdate = '".$today_date."',
			bphone = '".$_REQUEST['Mobile']."'";
	$dwnldsqlqry = ets_db_query($dwnldsql) or die(ets_db_error());
	

?>

