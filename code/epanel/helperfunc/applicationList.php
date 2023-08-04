<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('data' => array());
	$queryString =  ets_db_query("SELECT * from application_master order by sortorder") or die(ets_db_error());	
   
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
			
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "application_id:".$res['application_id'];
			$thumb_image = HTTP_SERVER.WS_ROOT."timthumb.php?src=".DIR_WS_APPLICATION_PATH.$res['a_id'].'/'.$res['application_image']."&w=100&h=67&zc=0";
			
				$applicationId=$res['application_id'];
			
				$applicationTitle=$res['image_title'];
				$applicationImage='<img src="'.$thumb_image.'">';
				
				$applicationStatus='<a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a>';
				
				$applicationSortorder='<a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a>';
				
				$Action='<a href="index.php?controller=application&action=application&subaction=editForm&application_id='.$res['application_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=application&action=application&subaction=delete&application_id='.$res['application_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				';
				
			$result['data'][] = array( "$applicationId","$applicationTitle", "$applicationImage", "$applicationStatus","$applicationSortorder","$Action");		
		}
		// End While Loop
		echo json_encode($result);

?>
