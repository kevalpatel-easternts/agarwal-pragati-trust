<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('data' => array());
	$queryString =  ets_db_query("SELECT * from member_master order by sortorder") or die(ets_db_error());	
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
			
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "m_id:".$res['m_id'];
				$memberId=$res['m_id'];
				
				$memberTitle=$res['image_title'];
				
				
				$memberStatus='<a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a>';
				
				$memberSortorder='<a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a>';
				
				$Action='<a href="index.php?controller=member&action=member&subaction=editForm&m_id='.$res['m_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=member&action=member&subaction=delete&m_id='.$res['m_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				';
				
			$result['data'][] = array( "$memberId",  "$memberTitle",  "$memberStatus","$memberSortorder","$Action");		
		}
		// End While Loop
		echo json_encode($result);

?>
