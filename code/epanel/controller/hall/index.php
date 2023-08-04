<?php

if(isset($_REQUEST['action'])){
	
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	/* Start halltype Master */
	if($_REQUEST['action'] == 'halltype'){
		$halltype = new halltype();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($halltype->add()){
						echo '<script>location.href="index.php?controller=hall&action=halltype&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=hall&action=halltype&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				/*if($halltype->add()){
					echo'<script>location.href="index.php?controller=hall&action=halltype&subaction=listData&msg=addmsg";</script>';
				}*/
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$halltype->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				/*$halltype->addForm();
				$permission = getPermission($_SESSION['group'],'halltype');
				$pos = strrpos($permission,"a");	
				if(!(is_bool($pos)) && $pos >= 0){
					$halltype->newhalltype_display();
				}else	{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Add New Records</strong></div></center>';	
				}*/
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$halltype->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				/*$halltype->listData();
				$permission = getPermission($_SESSION['group'],'halltype');
				$pos = strrpos($permission,"v");	
				if(!(is_bool($pos)) && $pos >= 0){
					$halltype->listhalltype();
				}else {
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to View Records</strong></div></center>';
				} */
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($halltype->edit()){
					echo '<script>location.href="index.php?controller=hall&action=halltype&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*
				if($halltype->edit()){
					echo'<script>location.href="index.php?controller=hall&action=halltype&subaction=listData";</script>';
				}*/
				break;
			case 'editForm':
					if(strpos($_SESSION['userper'],'e') !== false) {
					$halltype->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*$halltype->editForm();
				$permission = getPermission($_SESSION['group'],'halltype');
				$pos = strrpos($permission,"e");	
				if(!(is_bool($pos)) && $pos >= 0){
					$halltype->edithalltype_display();
				}else{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Edit Records</strong></div></center>';
				}
				*/
				break;
				case 'delete':
					if(strpos($_SESSION['userper'],'d') !== false) {
					if($halltype->delete()){
					echo '<script>location.href="index.php?controller=hall&action=halltype&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				 /*$halltype->delete();
					echo'<script>location.href="index.php?controller=hall&action=halltype&subaction=listData";</script>';*/
				break;
		}
	}
	
/* Start hall Master */
	if($_REQUEST['action'] == 'hall'){
		$hall = new hall();
		switch($_REQUEST['subaction']){
			case 'add':
				
					if($hall->add()){
						echo '<script>location.href="index.php?controller=hall&action=hall&subaction=listData";</script>';
					}
				
				/*if($hall->add()){
					echo'<script>location.href="index.php?controller=hall&action=hall&subaction=listData&msg=addmsg";</script>';
				}*/
				break;
			case 'addForm':
				
					$hall->addForm();
			
				break;
			case 'listData':
			
					
					$hall->listData();
				
				break;
			case 'edit':
				
					if($hall->edit()){
					echo '<script>location.href="index.php?controller=hall&action=hall&subaction=listData";</script>';
					}
				
				
				break;
			case 'editForm':
					
					$hall->editForm();
				
				
				break;
				case 'delete':			
				
					if($hall->delete()){
					echo '<script>location.href="index.php?controller=hall&action=hall&subaction=listData";</script>';
					}	
				
				
				break;
		}
	}
		if($_REQUEST['action'] == 'halltypetype'){
		$halltypetype = new halltypetype();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($halltypetype->add()){
						echo '<script>location.href="index.php?controller=hall&action=halltypetype&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=hall&action=halltypetype&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$halltypetype->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$halltypetype->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($halltypetype->edit()){
					echo '<script>location.href="index.php?controller=hall&action=halltypetype&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
			case 'editForm':
					if(strpos($_SESSION['userper'],'e') !== false) {
					$halltypetype->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
				case 'delete':			
					if(strpos($_SESSION['userper'],'d') !== false) {
					if($halltypetype->delete()){
					echo '<script>location.href="index.php?controller=hall&action=halltypetype&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				
				break;
		}
	}
	
		if($_REQUEST['action'] == 'hall_images'){
		$h_id = $_REQUEST['h_id'];
		$hall_images = new hall_images();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($hall_images->add()){
					echo'<script>location.href="index.php?controller=hall&action=hall_images&subaction=listData&h_id='.$h_id.'";</script>';
				}
				break;
			case 'addForm':
				//if(strpos($_SESSION['userper'],'a') !== false) {
					$hall_images->addForm();
				/*}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}*/
				break;
			case 'edit':
				if($hall_images->edit()){
					echo'<script>location.href="index.php?controller=hall&action=hall_images&subaction=listData&h_id='.$h_id.'";</script>';
				}
				break;
			case 'editForm':
				//if(strpos($_SESSION['userper'],'e') !== false) {
					$hall_images->editForm();
				/*}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}*/
				break;				
			case 'listData':
				//if(strpos($_SESSION['userper'],'v') !== false) {
					$hall_images->listData();
				/*}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}*/
				break;
			case 'delete':
				//if(strpos($_SESSION['userper'],'d') !== false) {
					if($hall_images->delete()){
						echo'<script>location.href="index.php?controller=hall&action=hall_images&subaction=listData&h_id='.$h_id.'";</script>';
					}
				/*}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}*/
				break;
		}
	}
}

else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>