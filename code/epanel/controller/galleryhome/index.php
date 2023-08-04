<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'galleryhome'){
		$galleryhome = new galleryhome();	
		switch($_REQUEST['subaction']){
			case 'add':
				
					if($galleryhome->add()){
						echo'<script>location.href="index.php?controller=galleryhome&action=galleryhome&subaction=listData&msg=addmsg";</script>';
					}
				
				break;
			case 'addForm':
				$galleryhome->addForm();
				break;
			case 'listData':
				$galleryhome->listData();
				break;
			case 'edit':
				if($galleryhome->edit()){
					echo'<script>location.href="index.php?controller=galleryhome&action=galleryhome&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$galleryhome->editForm();
				break;
			case 'delete':			    
				$galleryhome->delete();
				echo'<script>location.href="index.php?controller=galleryhome&action=galleryhome&subaction=listData";</script>';
				break;
		}
	}
	

}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>