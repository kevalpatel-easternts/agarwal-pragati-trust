<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('data' => array());
	$queryString =  ets_db_query("SELECT * from hall_master order by sortorder") or die(ets_db_error());	
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
			
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "h_id:".$res['h_id'];
				$hallId=$res['h_id'];
				
				$hallTitle=$res['hallname'];
				
				
				$hallStatus='<a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a>';
				
				$hallSortorder='<a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a>';
				
				$Action='<a href="index.php?controller=hall&action=hall&subaction=editForm&h_id='.$res['h_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=hall&action=hall&subaction=delete&h_id='.$res['h_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>| 
			<a href="index.php?controller=hall&action=hall_images&subaction=listData&h_id='.$res['h_id'].'" title="Add Project Floor Plans" data-toggle="tooltip" class="btn btn-info marker"><i class="fa fa-building"></i></a>
				';
				
			$result['data'][] = array( "$hallId",  "$hallTitle",  "$hallStatus","$hallSortorder","$Action");		
		}
		// End While Loop
		echo json_encode($result);

?>
