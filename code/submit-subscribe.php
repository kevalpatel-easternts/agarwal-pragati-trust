<?php

include "inc/mainapp.php";


$name = $_REQUEST['sname'];
$email = $_REQUEST['semail'];
$contact = $_REQUEST['sphn'];


$qry = "Insert into subscription_master set
		s_name = '".$name."',
		s_email = '".$email."',
	    s_mobile = '".$contact."',
	    new = '1',
	    s_date = now()";
	    
$res = ets_db_query($qry) or die(ets_db_error());
$id = ets_db_insert_id();

echo '<h4 class="submit-message" align = "center" style="font-size:16px;">Your details have been saved successfully<br>We will be in touch with you soon!</h4>';

?>
