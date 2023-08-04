<?php

if($_REQUEST['action'] == 'member'){
?>
<div class="box-header">
	<h2>Member Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=member&action=member&subaction=listData" data-toggle="tooltip" class="marker" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=member&action=member&subaction=addForm" data-toggle="tooltip" class="marker" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}else{
	
?>
<div class="box-header">
	<h2>Member Type Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=member&action=membertype&subaction=listData"  Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=member&action=membertype&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>