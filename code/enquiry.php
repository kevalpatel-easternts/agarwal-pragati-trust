<?php
date_default_timezone_set('Asia/Calcutta');
include "inc/mainapp.php";
require("inc/class.phpmailer.php");
$today_date = date('Y-m-d');
if($_REQUEST['email'] != ""){
	$name = $_REQUEST['name'];
	$mobile1 = $_REQUEST['number'];
	$email = $_REQUEST['email'];
	$subject = $_REQUEST['subject'];
	$query = $_REQUEST['query'];
$sql = "INSERT INTO  contact_master SET
			cname = '".$name."',
			cemail = '".$email."',
			csubject = '".$subject."',
			ccontact = '".$mobile1."',
			cmessage = '".$query."'";
			
	$sqlqry = ets_db_query($sql) or die(ets_db_error());
	
$message = '

<table width="80%" class="tbl" cellpadding="3">


<tr>

	<td ><strong>&nbsp;1.Name</strong></td>

	<td>:</td>

	<td>'.$_POST['name'].'</td>

</tr>

<tr>

	<td ><strong>&nbsp;2.Mobile</strong></td>

	<td>:</td>

	<td>'.$_POST['number'].'</td>

</tr>

	<tr>

		<td><strong>&nbsp;3. Email Address</strong></td>

		<td>:</td>

		<td>'.$_POST['email'].'</td>

	</tr>
	<tr>

		<td valign="top" width = "30%"><strong>&nbsp;4.Subject. </strong></td>

		<td valign="top">:</td>
		<td>'.$_POST['subject'].'</td>
	</tr>
	<tr>

		<td ><strong>&nbsp;5.Message</strong></td>

		<td>:</td>

		<td>'.$_POST['query'].'</td>

	</tr>

</table>';

	$message_body = 'INQUIRY has been submitted by  <strong> '.$name.'</strong><br />Information is detailed below :<br />'.$message;
	$Mail = new PHPMailer(true);
try {
	$Mail->IsSendmail(); // Use SMTP
	$Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
	//$Mail->SMTPDebug   = 3; // 2 to enable SMTP debug information
	//$Mail->SMTPAuth    = true; // enable SMTP authentication
	//$Mail->SMTPSecure  = "tls"; //Secure conection
	//$Mail->Port        = 587; // set the SMTP port
	$Mail->Username    = 'noreply.aptsurat@gmail.com'; // SMTP account username
	$Mail->Password    = 'rqwineexaicbyldf'; // SMTP account password
	$Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
	$Mail->XMailer     = 'NxtBloc - Inquiry';
	$Mail->CharSet     = 'UTF-8';
	$Mail->Encoding    = '8bit';
	$Mail->Subject     = 'NxtBloc  - Inquiry';
	$Mail->ContentType = 'text/html; charset=utf-8\r\n';
	$Mail->From        = 'noreply.aptsurat@gmail.com';
	$Mail->FromName    = 'NxtBloc  - Inquiry';
	$Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line
	$Mail->AddReplyTo($_POST['email']);
	$Mail->AddAddress('info@nxtbloc.in ');
	$Mail->isHTML( TRUE );
	$Mail->Body    = $message_body;
	if($Mail->Send()){
	//echo "in";
	echo '<script>location.href="index.php";</script>';
	}else{

	}
	$Mail->SmtpClose();
	//$jsonoutput['msg']	= 1;
	} catch (phpmailerException $e) {
	} catch (Exception $e) {
	echo $e->getMessage(); //Boring error messages from anything else!
	}

}
else
{
	echo '<script>location.href="enquiry.php";</script>';
}
exit();

?>