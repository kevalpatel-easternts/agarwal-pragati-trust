<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	// Same from main controller File
	$queryString =  ets_db_query("SELECT * from download_master order by sortorder") or die(ets_db_error());
	while($res = ets_db_fetch_array($queryString)){
		if($res['status']=='E'){
			$status = "Active";
		}else{
			$status = "Disabled";
		}
		$pk = "download_type_id:".$res['download_type_id'];
		
		$downloadsTitle = '<td>'.$res['download_type'].'</td>';
		$downloadsType = '<td>'.getfldValue('download_master','download_type_id',$res['parent_id'],'download_type').'</td>';
		$downloadsStatus = '<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
		$downloadsSortorder = '<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
		
		$Action = '<td><a href="index.php?controller=download&action=downloadmaster&subaction=editForm&download_type_id='.$res['download_type_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=download&action=downloadmaster&subaction=delete&download_type_id='.$res['download_type_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
		
		$result['aaData'][] = array("$downloadsTitle","$downloadsType", "$downloadsStatus", "$downloadsSortorder","$Action");
	}
	// End While Loop
	
	echo json_encode($result);
?>