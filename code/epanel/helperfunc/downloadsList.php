<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('data' => array());
	$queryString =  ets_db_query("SELECT * from downloads order by sortorder") or die(ets_db_error());	
	// Same from main controller File
		while($res = ets_db_fetch_array($queryString)){
			
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "download_id:".$res['download_id'];
			
				$download_id=$res['download_id'];
				$title = $res['title'];
			
				$downloadStatus='<a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a>';
				
				$downloadSortorder='<a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a>';
				
				$Action='<a href="index.php?controller=downloads&action=downloads&subaction=editForm&download_id='.$res['download_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=downloads&action=downloads&subaction=delete&download_id='.$res['download_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				';
				
			$result['data'][] = array("$download_id", "$title", "$downloadStatus", "$downloadSortorder", "$Action");		
		}
		// End While Loop
		echo json_encode($result);

?>
