<?php 	include("includes/configure.php");		
$select_job = ets_db_query("select * from job_master where job_id ='".$_GET['job_id']."'") or die(ets_db_error());	
$select_res = ets_db_fetch_array($select_job);	
$myfile = DIR_FS_BIODATA_PATH.$select_res['j_resume'];	
$file = $select_res['j_resume'];
if (file_exists($myfile)) {    
	header('Content-Description: File Transfer');    
	header('Content-Type: application/octet-stream');    
	header ("Content-Disposition:attachment; filename=\"$file\"");    
	header('Content-Transfer-Encoding: binary');    
	header('Expires: 0');    
	header('Cache-Control: must-revalidate');    
	header('Pragma: public');    
	header('Content-Length: ' . filesize($myfile));    
	ob_clean();    
	flush();    
	readfile($myfile);    
	exit;
}	
?>
