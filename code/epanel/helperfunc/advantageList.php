<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('data' => array());
	$queryString =  ets_db_query("SELECT * from advantage order by sortorder") or die(ets_db_error());	
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "advantage_id:".$res['advantage_id'];
			$thumb_image = HTTP_SERVER.WS_ROOT."timthumb.php?src=".DIR_WS_ADVANTAGE_PATH.$res['advantage_id']."/".$res['ad_image']."&w=100&h=67&zc=0";
			
				$advantage_id=$res['advantage_id'];
			
				$title=$res['title'];
				$advantageImage='<img src="'.$thumb_image.'">';
				
				$advantageStatus='<a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a>';
				
				$advantageSortorder='<a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a>';
				
				$Action='<a href="index.php?controller=advantage&action=advantage&subaction=editForm&advantage_id='.$res['advantage_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=advantage&action=advantage&subaction=delete&advantage_id='.$res['advantage_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				';
				
			$result['data'][] = array("$advantage_id", "$title", "$advantageImage", "$advantageStatus", "$advantageSortorder", "$Action");		
		}
		// End While Loop
		echo json_encode($result);

?>
