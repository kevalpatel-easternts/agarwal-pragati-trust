<?php 
	include("inc/config.php");
	$j_sql = "Select * from member_master where m_id = '".$_REQUEST['m_id']."'";
	$j_qry = ets_db_query($j_sql) or die(ets_db_error().$j_sql);
	$j_rs = ets_db_fetch_assoc($j_qry); 
	$id = $j_rs['m_id'];
	$name = $j_rs['image_title'];
	$mid = $j_rs['memberid'];
	$city = $j_rs['city'];
	$state = $j_rs['state'];
	$cnum = $j_rs['cnum'];
$madr = $j_rs['madr'];
$landmark = $j_rs['landmark'];

$response = array();
$response['name'] = ($name != '' ? $name : '-');
$response['city'] = ($city != '' ? $city : '-');
$response['landmark'] = ($landmark != '' ? $landmark : '-');
$response['address'] = ($madr != '' ? $madr : '-');
$response['state'] = ($state != '' ? $state : '-');
echo json_encode($response);
//	$jdate = date("d-m-Y H:i a",strtotime($j_rs['j_date']));
?>
	


