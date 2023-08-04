<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'home'){
		$home = new home();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($home->add()){
						echo'<script>location.href="index.php?controller=home&action=home&subaction=listData&msg=addmsg";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				$home->addForm();
				break;
			case 'listData':
				$home->listData();
				break;
			case 'edit':
				if($home->edit()){
					echo'<script>location.href="index.php?controller=home&action=home&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$home->editForm();
				break;
			case 'delete':			    
				$home->delete();
				echo'<script>location.href="index.php?controller=home&action=home&subaction=listData";</script>';
				break;
		}
	}
	

}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>