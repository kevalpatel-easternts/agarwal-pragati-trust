<?php 
	include("includes/configure.php");
	$j_sql = "Select * from contact_master where cid = '".$_REQUEST['cid']."'";
	$j_qry = ets_db_query($j_sql) or die(ets_db_error().$j_sql);
	$j_rs = ets_db_fetch_assoc($j_qry); 
	$id = $j_rs['cid'];
	$name = $j_rs['cname'];
	$email = $j_rs['cemail'];
	$mobile = $j_rs['ccontact'];
	$subject = $j_rs['csubject'];
	$message = $j_rs['cmessage'];
	$jdate = date("d-m-Y H:i a",strtotime($j_rs['cdate']));
	?>
	
<!--<link rel="stylesheet" href="stylesheet.css" type="text/css" media="screen" />-->
	<table class="main" cellspacing="3" cellpadding="3" width="100%">
		<tr>
		<th align="right" width="130">Date&nbsp;:&nbsp;</th>
		<td><?php echo $jdate; ?></td>
		</tr>
		
		<tr>
		<th align="right" width="130">Name&nbsp;:&nbsp;</th>
		<td><?php echo $name; ?></td>
		</tr>
		
		<tr>
		<th align="right">E-Mail&nbsp;:&nbsp;</th>
		<td><?php echo $email; ?></td></tr>
		
		<tr>
		<th align="right">Mobile&nbsp;:&nbsp;</th>
		<td><?php echo $mobile; ?></td>	
		</tr>
		
		<tr>
		<th align="right">Subject&nbsp;:&nbsp;</th>
		<td><?php echo $subject; ?></td>	
		</tr>

		<tr>
		<th align="right" valign = "top" >Message&nbsp;:&nbsp;</th>
		<td style="word-break: break-all;"><?php echo $message; ?></td>	
		
		</tr>
	</table>


