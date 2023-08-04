<?php 

	include("inc/config.php");
	$download_id = $_GET['download'];
	
	$select_download = ets_db_query("select image from downloads where download_id = '".$download_id."' ");

	$select_res = ets_db_fetch_array($select_download);
	$myfile = DIR_FS_DOWNLOAD_PATH.$select_res['image'];

	$file = $select_res['image'];
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