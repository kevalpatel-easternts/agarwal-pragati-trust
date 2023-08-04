<?php

include "inc/mainapp.php";


$name = $_REQUEST['sname'];
$email = $_REQUEST['semail'];
$mobile = $_REQUEST['smobile'];

$qry = "Insert into subscription_master set
		s_name = '".$name."',
		s_email = '".$email."',
		s_mobile = '".$mobile."',
	    s_date = now()
	    ";
$res = ets_db_query($qry) or die(ets_db_error());
echo '<h3 class="sub-msg">You have successfully subscribed with us.</h3>';

?>
