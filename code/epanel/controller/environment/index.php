<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'environment'){
		$environment = new environment();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($environment->add()){
						echo'<script>location.href="index.php?controller=environment&action=environment&subaction=listData&msg=addmsg";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				$environment->addForm();
				break;
			case 'listData':
				$environment->listData();
				break;
			case 'edit':
				if($environment->edit()){
					echo'<script>location.href="index.php?controller=environment&action=environment&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$environment->editForm();
				break;
			case 'delete':			    
				$environment->delete();
				echo'<script>location.href="index.php?controller=environment&action=environment&subaction=listData";</script>';
				break;
		}
	}
	

}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>