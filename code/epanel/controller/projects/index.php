<?php
if(isset($_REQUEST['action'])){
	
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	/* Start projects Master*/
	if($_REQUEST['action'] == 'projects'){
		$projects = new projects();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($projects->add()){
					echo'<script>location.href="index.php?controller=projects&action=projects&subaction=listData";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$projects->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($projects->edit()){
					echo'<script>location.href="index.php?controller=projects&action=projects&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$projects->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;				
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$projects->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($projects->delete()){
						echo'<script>location.href="index.php?controller=projects&action=projects&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	
	
if($_REQUEST['action'] == 'downloads_list'){
	
		$downloads_list = new downloads_list();	
		switch($_REQUEST['subaction']){				
			case 'listData':	
					$downloads_list->listData();
				
				break;
			case 'delete':
			
					if($downloads_list->delete()){
						echo'<script>location.href="index.php?controller=projects&action=downloads_list&subaction=listData";</script>';
					}
				break;
		}
	}
	
if($_REQUEST['action'] == 'subscriptionlist'){
	
		$subscriptionlist = new subscriptionlist();	
		switch($_REQUEST['subaction']){				
			case 'listData':	
					$subscriptionlist->listData();
				
				break;
			case 'delete':
			
					if($subscriptionlist->delete()){
						echo'<script>location.href="index.php?controller=projects&action=subscriptionlist&subaction=listData";</script>';
					}
				break;
		}
	}
	
	/* Start project Type Master*/
	if($_REQUEST['action'] == 'project_type'){
		$project_type = new project_type();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($project_type->add()){
					echo'<script>location.href="index.php?controller=projects&action=project_type&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$project_type->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($project_type->edit()){
					echo'<script>location.href="index.php?controller=projects&action=project_type&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$project_type->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;				
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$project_type->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($project_type->delete()){
						echo'<script>location.href="index.php?controller=projects&action=project_type&subaction=listData&msg=addmsg";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	
	/* Start project Images Master*/
	if($_REQUEST['action'] == 'projectimages'){
		$projectimages = new projectimages();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($projectimages->add()){
					echo'<script>location.href="index.php?controller=projects&action=projectimages&subaction=listData&projectID='.$_REQUEST['projectID'].'";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$projectimages->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($projectimages->edit()){
					echo'<script>location.href="index.php?controller=projects&action=projectimages&subaction=listData&projectID='.$_REQUEST['projectID'].'";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$projectimages->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$projectimages->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($projectimages->delete()){
						echo'<script>location.href="index.php?controller=projects&action=projectimages&subaction=listData&projectID='.$_REQUEST['projectID'].'";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	if($_REQUEST['action'] == 'projectfloors'){
		$projectfloors = new projectfloors();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($projectfloors->add()){
					echo'<script>location.href="index.php?controller=projects&action=projectfloors&subaction=listData&projectID='.$_REQUEST['projectID'].'";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$projectfloors->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($projectfloors->edit()){
					echo'<script>location.href="index.php?controller=projects&action=projectfloors&subaction=listData&projectID='.$_REQUEST['projectID'].'";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$projectfloors->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$projectfloors->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($projectfloors->delete()){
						echo'<script>location.href="index.php?controller=projects&action=projectfloors&subaction=listData&projectID='.$_REQUEST['projectID'].'";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	if($_REQUEST['action'] == 'projectslider'){
		$projectslider = new projectslider();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($projectslider->add()){
					echo'<script>location.href="index.php?controller=projects&action=projectslider&subaction=listData&projectID='.$_REQUEST['projectID'].'";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$projectslider->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($projectslider->edit()){
					echo'<script>location.href="index.php?controller=projects&action=projectslider&subaction=listData&projectID='.$_REQUEST['projectID'].'";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$projectslider->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$projectslider->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($projectslider->delete()){
						echo'<script>location.href="index.php?controller=projects&action=projectslider&subaction=listData&projectID='.$_REQUEST['projectID'].'";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>
