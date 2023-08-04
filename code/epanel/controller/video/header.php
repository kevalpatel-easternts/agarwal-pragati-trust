<?php
if($_REQUEST['action'] == 'video'){
?>
<div class="box-header">
	<h2>video Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=video&action=video&subaction=listData" data-toggle="tooltip" class="marker" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=video&action=video&subaction=addForm" data-toggle="tooltip" class="marker" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>
