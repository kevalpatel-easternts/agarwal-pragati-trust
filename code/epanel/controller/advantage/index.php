<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'advantage'){
		$advantage = new advantage();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($advantage->add()){
						echo'<script>location.href="index.php?controller=advantage&action=advantage&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				$advantage->addForm();
				break;
			case 'listData':
				$advantage->listData();
				break;
			case 'edit':
				if($advantage->edit()){
					echo'<script>location.href="index.php?controller=advantage&action=advantage&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$advantage->editForm();
				break;
			case 'delete':			    
				$advantage->delete();
				echo'<script>location.href="index.php?controller=advantage&action=advantage&subaction=listData";</script>';
				break;
		}
	}
	

}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>