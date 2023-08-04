<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('data' => array());
	$queryString =  ets_db_query("SELECT * from environment order by sortorder") or die(ets_db_error());	
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
			
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "environment_id:".$res['environment_id'];
			$thumb_image = HTTP_SERVER.WS_ROOT."timthumb.php?src=".DIR_WS_ENVIRONMENT_PATH.$res['environment_id']."/".$res['en_image']."&w=100&h=67&zc=0";
			
				$environment_id=$res['environment_id'];
			
				$title=$res['title'];
				$GalleryImage='<img src="'.$thumb_image.'">';
				
				$environmentStatus='<a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a>';
				
				$environmentSortorder='<a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a>';
				
				$Action='<a href="index.php?controller=environment&action=environment&subaction=editForm&environment_id='.$res['environment_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=environment&action=environment&subaction=delete&environment_id='.$res['environment_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				';
				
			$result['data'][] = array( "$environment_id", "$title", "$GalleryImage", "$environmentStatus", "$environmentSortorder", "$Action");		
		}
		// End While Loop
		echo json_encode($result);

?>
