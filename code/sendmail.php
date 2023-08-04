<?php

date_default_timezone_set('Asia/Calcutta');
include "inc/mainapp.php";
require("inc/class.phpmailer.php");
$today_date = date('Y-m-d');

if(isset($_POST['contact_email'])) {
	
	$contactname = $_POST['contact_name'];
	$clientemail = $_POST['contact_email'];
	$clientsubject = $_POST['contact_subject'];
	$clientcontact = $_POST['contact_phone'];
	$clientmsg = $_POST['contact_message'];
	
	$sql = "INSERT INTO  contact_master SET
			cname = '".$contactname."',
			cemail = '".$clientemail."',
			csubject = '".$clientsubject."',
			ccontact = '".$clientcontact."',
			new		= '1',
			cdate	= '".$today_date."',
			cmessage = '".$clientmsg."'";
			
	$sqlqry = ets_db_query($sql) or die(ets_db_error());
	$id = ets_db_insert_id();
	
	if($id != 0){
		echo '<div class="alert alert-success" id="alert" style="margin-top:10px" >Your Inquiry has been submitted Successfully !!</div>';
	}else{
		echo '<div class="alert alert-danger" id="alert" style="margin-top:10px" >Error submitting your inquiry !!</div>';
	}	
	
}else{
	echo '<div class="alert alert-danger" id="alert" style="margin-top:10px" >Error submitting your inquiry !!</div>';
}
	
?>
