<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'slider'){
		$slider = new slider();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($slider->add()){
						echo'<script>location.href="index.php?controller=slider&action=slider&subaction=listData&msg=addmsg";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				$slider->addForm();
				break;
			case 'listData':
				$slider->listData();
				break;
			case 'edit':
				if($slider->edit()){
					echo'<script>location.href="index.php?controller=slider&action=slider&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$slider->editForm();
				break;
			case 'delete':			    
				$slider->delete();
				echo'<script>location.href="index.php?controller=slider&action=slider&subaction=listData";</script>';
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>