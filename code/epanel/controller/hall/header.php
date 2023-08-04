<?php

if($_REQUEST['action'] == 'hall'){
?>
<div class="box-header">
	<h2>hall Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=hall&action=hall&subaction=listData" data-toggle="tooltip" class="marker" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=hall&action=hall&subaction=addForm" data-toggle="tooltip" class="marker" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
} else if($_REQUEST['action'] == 'hall_images'){
	
?>
<div class="box-header">
	<h2>Module Images Management(<a href="index.php?controller=hall&action=hall&subaction=listData">Back</a>)</h2>
	<div class="box-icon">
		<a href="index.php?controller=hall&action=hall_images&subaction=listData&h_id=<?php echo $_REQUEST['h_id']; ?>" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=hall&action=hall_images&subaction=addForm&h_id=<?php echo $_REQUEST['h_id']; ?>" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>


