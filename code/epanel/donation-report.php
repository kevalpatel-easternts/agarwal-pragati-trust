<?php 	
header ("Content-type: application/x-msexcel");
header("Content-disposition:  attachment; filename=ContactReport.xls");
require('includes/configure.php');
require('includes/functions/general.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8" />
</head>
<body>
<table class="main" cellspacing="3" cellpadding="3" border="1">
<tr>
			
			<th>Date</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Subject</th>
			<th>Message</th>
			
</tr>
<?php
	$disQry =  "SELECT * from donation_master order by cdate desc";	
	$ressql = ets_db_query($disQry) or die('Query failed : ' . ets_db_error());
	if(ets_db_num_rows($ressql) > 0) {	
		while($res = ets_db_fetch_array($ressql)){
			echo '<tr>';
			echo '<td>'.date("d-m-Y H:i a",strtotime($res['ddate'])).'</td>';	
			echo '<td>'.$res['dname'].'</td>';	
			echo '<td>'.$res['demail'].'</td>';
			echo '<td>'.$res['dcontact'].'</td>';
			echo '<td>'.$res['dsubject'].'</td>';
			
			echo '<td>'.$res['dmessage'].'</td>';
			echo '</tr>';
		}
	}
?>
</table>



