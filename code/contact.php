<?php

include 'inc/config.php';

if($_REQUEST['email'] != ""){
	
	$contactname = $_REQUEST['name'];
	$clientemail = $_REQUEST['email'];
	$clientsubject = $_REQUEST['subject'];
	$clientcontact = $_REQUEST['phone'];
	$clientmsg = $_REQUEST['message'];

	$sql = "insert into contact_master set
			cname = '".$contactname."',
			cemail = '".$clientemail."',
			csubject = '".$clientsubject."',
			ccontact = '".$clientcontact."',
			cmessage = '".$clientmsg."'";
			
	$sqlqry = ets_db_query($sql) or die(ets_db_error());
	
	echo '<script>location.href="thankyou/";</script>';
}
	
?>
