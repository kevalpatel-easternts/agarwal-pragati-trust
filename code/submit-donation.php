<?php

include "inc/mainapp.php";


$name = $_REQUEST['dname'];
$email = $_REQUEST['demail'];
$contact = $_REQUEST['dphone'];
$msg = $_REQUEST['dmessage'];


$qry = "Insert into donation_master set
		dname = '".$name."',
		demail = '".$email."',
	    dcontact = '".$contact."',
	    dmessage = '".$msg."',
	    new = '1',
	    ddate = now()";
	    
$res = ets_db_query($qry) or die(ets_db_error());
$id = ets_db_insert_id();

echo '<h4 class="submit-message" align = "center" style="font-size:16px;">Your details have been saved successfully<br>We will be in touch with you soon!</h4>';

?>
