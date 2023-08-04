<?php
	require ('../includes/configure.php');
	include ('../includes/functions/general.php');
	$result = array('aaData' => array());
	$queryString =  ets_db_query("SELECT * from project_gallery where projectID = '".(int)$_REQUEST['projectID']."' and type = 'F'  order by sortorder") or die(ets_db_error());	
		while($res = ets_db_fetch_array($queryString)){
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "galleryID:".$res['galleryID'];
			if($res['isFront']=='E'){
				$isFront = "Yes";
			}else{
				$isFront = "No";
			}
				$thumb_image = DIR_WS_PROJECT_PATH.$res['projectID']."/thumbnail/".$res['galleryImage'];
			
				$GalleryId='<td>'.$res['galleryID'].'</td>';
				
				$GalleryType='<td>'.getfldValue("projects","projectID",$res['projectID'],"projectTitle").'</td>';
				
				$GalleryTitle='<td>'.$res['galleryTitle'].'</td>';
				
				
				
				$GalleryImage='<td><img src="'.$thumb_image.'" style="height: 100px;
    width: 100px;"></td>';
				
				$GalleryStatus='<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>';
				
				$GallerySortorder='<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>';
				
				$Action='<td><a href="index.php?controller=projects&action=projectfloors&subaction=editForm&galleryID='.$res['galleryID'].'&projectID='.$res['projectID'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=projects&action=projectfloors&subaction=delete&galleryID='.$res['galleryID'].'&projectID='.$res['projectID'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				</td>';
				
			$result['aaData'][] = array( "$GalleryId", "$GalleryType", "$GalleryTitle", "$GalleryImage", "$GalleryStatus","$GallerySortorder","$Action");		
		}
		// End While Loop
		echo json_encode($result);

?>