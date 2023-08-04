<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	h_id = $_REQUEST['h_id'];
	$queryString =  ets_db_query("SELECT * from hall_images where h_id = '".h_id."' order by sortorder desc") or die(ets_db_error());	
	
		while($res = ets_db_fetch_array($queryString)){
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "id:".$res['id'];
			$categoryID = '<td>'.$res['id'].'</td>';
			$categoryTitle = '<td>'.$res['title'].'</td>';
			$Image = '<td><img src="'.DIR_WS_PROJECT_PATH.$h_id."/".$res['name'].'" width="100px" height="100px" ></td>';
			
			$Sortorder = '<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
			$Status='<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
			
			
			$Action='<td><a href="index.php?controller=hall&action=hall_images&subaction=editForm&service_id='.h_id.'&id='.$res['id'].'"  data-toggle="tooltip" title="Edit Records" class="btn btn-success marker"><i class="fa fa-edit"></i></a>
			|&nbsp;<a href="index.php?controller=hall&action=hall_images&subaction=delete&service_id='.h_id.'&id='.$res['id'].'" title="Delete Record" data-toggle="tooltip" class="btn btn-danger marker"><i class="fa fa-times"></i></a>
			';
			
			
			
			$result['aaData'][] = array( "$categoryID", "$categoryTitle","$Image","$Status","$Sortorder","$Action");			
		}
	// End While Loop
	echo json_encode($result);
?>
