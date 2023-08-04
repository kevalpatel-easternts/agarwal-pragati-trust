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
			
			
			<th>Name</th>
			<th>Contact Number</th>
			<th>Address</th>
			<th>Landmark</th>
			<th>City</th>
			<th>State</th>
			
</tr>
<?php
	$disQry =  "SELECT * from member_master order by image_title asc";	
	$ressql = ets_db_query($disQry) or die('Query failed : ' . ets_db_error());
	if(ets_db_num_rows($ressql) > 0) {	
		while($res = ets_db_fetch_array($ressql)){
			echo '<tr>';
			
			echo '<td>'.$res['image_title'].'</td>';	
			echo '<td>'.$res['cnum'].'</td>';
			echo '<td>'.$res['madr'].'</td>';
			echo '<td>'.$res['landmark'].'</td>';
			echo '<td>'.$res['city'].'</td>';
			
			echo '<td>'.$res['state'].'</td>';
			echo '</tr>';
		}
	}
?>
</table>



