<?php
include("includes/configure.php");
if(isset($_GET['action'])){
	$include_class = $_GET['action'].".php";
	include ($include_class);
	if($_GET['action'] == 'contact'){
		$contact = new contact();	
		switch($_GET['subaction']){
			case 'listcontact':
				$contact->listcontact();
				break;
			case 'deletecontact':
				if($contact->delete()){
					echo '<script>location.href="index.php?controller=contact&action=contact&subaction=listcontact";</script>';
				}
				break;
		}
	}
}
?>