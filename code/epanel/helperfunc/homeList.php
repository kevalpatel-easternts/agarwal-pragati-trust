<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('data' => array());
	$queryString =  ets_db_query("SELECT * from home order by sortorder") or die(ets_db_error());	
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
			
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "home_id:".$res['home_id'];
			$thumb_image = HTTP_SERVER.WS_ROOT."timthumb.php?src=".DIR_WS_HOME_PATH.$res['home_id']."/".$res['image']."&w=100&h=67&zc=0";
			
				$home_id=$res['home_id'];
			
				$title=$res['title'];
				$GalleryImage='<img src="'.$thumb_image.'">';
				
				$homeStatus='<a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a>';
				
				$homeSortorder='<a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a>';
				
				$Action='<a href="index.php?controller=home&action=home&subaction=editForm&home_id='.$res['home_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=home&action=home&subaction=delete&home_id='.$res['home_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				';
				
			$result['data'][] = array( "$home_id", "$title", "$GalleryImage", "$homeStatus", "$homeSortorder", "$Action");		
		}
		// End While Loop
		echo json_encode($result);

?>
