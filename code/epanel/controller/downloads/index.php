<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'downloads'){
		$downloads = new downloads();	
		switch($_REQUEST['subaction']){
			case 'add':
				
					if($downloads->add()){
						echo'<script>location.href="index.php?controller=downloads&action=downloads&subaction=listData&msg=addmsg";</script>';
					}
				
				break;
			case 'addForm':
				$downloads->addForm();
				break;
			case 'listData':
				$downloads->listData();
				break;
			case 'edit':
				if($downloads->edit()){
					echo'<script>location.href="index.php?controller=downloads&action=downloads&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$downloads->editForm();
				break;
			case 'delete':			    
				$downloads->delete();
				echo'<script>location.href="index.php?controller=downloads&action=downloads&subaction=listData";</script>';
				break;
		}
	}
	

}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>