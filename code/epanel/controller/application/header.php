<?php
if($_REQUEST['action'] == 'album'){
?>
<div class="box-header">
	<h2>Album Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=application&action=album&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=application&action=album&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}if($_REQUEST['action'] == 'application'){
?>
<div class="box-header">
	<h2>application Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=application&action=application&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=application&action=application&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
} if($_REQUEST['action'] == 'albumtype'){
?>
<div class="box-header">
	<h2>Album Type Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=application&action=albumtype&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=application&action=albumtype&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php } ?>