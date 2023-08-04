<?php

include "inc/mainapp.php";


$name = $_REQUEST['cname'];
$email = $_REQUEST['cemail'];
$contact = $_REQUEST['cphone'];
$msg = $_REQUEST['cmessage'];

$qry = "Insert into job_master set
		j_name = '".$name."',
		j_email = '".$email."',
	    j_contact = '".$contact."',
	    j_message = '".$msg."',
	    j_date = now()";
	    
$res = ets_db_query($qry) or die(ets_db_error());
$id = ets_db_insert_id();
$img1 = $_FILES['resume']['name'];
	
			if($img1 != "")
			{
				$path = DIR_FS_BIODATA_PATH;
           
				
				if(!file_exists($path))
				{
					mkdir($path, 0777, true);
					exec("chown ".FILEUSER.FILEUSER." ".$path);
					exec("chmod 0777 ".$path);
					
				}
				
				$img1 = $id.'-'.$_FILES['resume']['name'];
            
				if(move_uploaded_file($_FILES['resume']['tmp_name'],$path.$img1))
				{
                
                    ets_db_query('Update job_master set j_resume = "'.$img1.'" where job_id = "'.$id.'"') or die(ets_db_error());
				}
			}
	
//$resume = $id.'-'.$_FILES['resume']['name'];
//
//if(move_uploaded_file($_FILES['resume']['tmp_name'],DIR_FS_BIODATA_PATH.$resume))
//{
//	ets_db_query('Update job_master set j_resume = "'.$resume.'" where job_id = "'.$id.'"') or die(ets_db_error());
//}

echo '<h4 class="submit-message1" align = "center" style="font-size:16px;">Your details have been saved successfully<br>We will be in touch with you soon!</h4>';

?>
