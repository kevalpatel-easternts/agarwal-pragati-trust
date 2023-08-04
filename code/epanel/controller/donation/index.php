<?php
include("includes/configure.php");
if(isset($_GET['action'])){
	$include_class = $_GET['action'].".php";
	include ($include_class);
	if($_GET['action'] == 'donation'){
		$donation = new donation();	
		switch($_GET['subaction']){
			case 'listData':
				$donation->listData();
				break;
			case 'delete':
				if($donation->delete()){
					echo '<script>location.href="index.php?controller=donation&action=donation&subaction=listData";</script>';
				}
				break;
		}
	}
}
?>
