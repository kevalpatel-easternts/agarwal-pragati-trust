<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'download'){
		$download = new download();	
		switch($_REQUEST['subaction']){
			case 'add':
				
					if($download->add()){
						echo'<script>location.href="index.php?controller=download&action=download&subaction=listData&msg=addmsg";</script>';
					
				}
			case 'addForm':
				$download->addForm();
				break;
			case 'listData':
				$download->listData();
				break;
			case 'edit':
				if($download->edit()){
					echo'<script>location.href="index.php?controller=download&action=download&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$download->editForm();
				break;
			case 'delete':			    
				$download->delete();
				echo'<script>location.href="index.php?controller=download&action=download&subaction=listData";</script>';
				break;
		}
	}
	

}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>