<?php

if(isset($_REQUEST['action'])){
	
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	/* Start membertype Master */
	if($_REQUEST['action'] == 'membertype'){
		$membertype = new membertype();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($membertype->add()){
						echo '<script>location.href="index.php?controller=member&action=membertype&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=member&action=membertype&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				/*if($membertype->add()){
					echo'<script>location.href="index.php?controller=member&action=membertype&subaction=listData&msg=addmsg";</script>';
				}*/
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$membertype->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				/*$membertype->addForm();
				$permission = getPermission($_SESSION['group'],'membertype');
				$pos = strrpos($permission,"a");	
				if(!(is_bool($pos)) && $pos >= 0){
					$membertype->newmembertype_display();
				}else	{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Add New Records</strong></div></center>';	
				}*/
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$membertype->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				/*$membertype->listData();
				$permission = getPermission($_SESSION['group'],'membertype');
				$pos = strrpos($permission,"v");	
				if(!(is_bool($pos)) && $pos >= 0){
					$membertype->listmembertype();
				}else {
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to View Records</strong></div></center>';
				} */
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($membertype->edit()){
					echo '<script>location.href="index.php?controller=member&action=membertype&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*
				if($membertype->edit()){
					echo'<script>location.href="index.php?controller=member&action=membertype&subaction=listData";</script>';
				}*/
				break;
			case 'editForm':
					if(strpos($_SESSION['userper'],'e') !== false) {
					$membertype->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*$membertype->editForm();
				$permission = getPermission($_SESSION['group'],'membertype');
				$pos = strrpos($permission,"e");	
				if(!(is_bool($pos)) && $pos >= 0){
					$membertype->editmembertype_display();
				}else{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Edit Records</strong></div></center>';
				}
				*/
				break;
				case 'delete':
					if(strpos($_SESSION['userper'],'d') !== false) {
					if($membertype->delete()){
					echo '<script>location.href="index.php?controller=member&action=membertype&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				 /*$membertype->delete();
					echo'<script>location.href="index.php?controller=member&action=membertype&subaction=listData";</script>';*/
				break;
		}
	}
	
/* Start member Master */
	if($_REQUEST['action'] == 'member'){
		$member = new member();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($member->add()){
						echo '<script>location.href="index.php?controller=member&action=member&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				/*if($member->add()){
					echo'<script>location.href="index.php?controller=member&action=member&subaction=listData&msg=addmsg";</script>';
				}*/
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$member->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					
					$member->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($member->edit()){
					echo '<script>location.href="index.php?controller=member&action=member&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
			case 'editForm':
					if(strpos($_SESSION['userper'],'e') !== false) {
					$member->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
				case 'delete':			
					if(strpos($_SESSION['userper'],'d') !== false) {
					if($member->delete()){
					echo '<script>location.href="index.php?controller=member&action=member&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				
				break;
		}
	}
		if($_REQUEST['action'] == 'membertypetype'){
		$membertypetype = new membertypetype();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($membertypetype->add()){
						echo '<script>location.href="index.php?controller=member&action=membertypetype&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=member&action=membertypetype&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$membertypetype->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$membertypetype->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($membertypetype->edit()){
					echo '<script>location.href="index.php?controller=member&action=membertypetype&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
			case 'editForm':
					if(strpos($_SESSION['userper'],'e') !== false) {
					$membertypetype->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
				case 'delete':			
					if(strpos($_SESSION['userper'],'d') !== false) {
					if($membertypetype->delete()){
					echo '<script>location.href="index.php?controller=member&action=membertypetype&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>