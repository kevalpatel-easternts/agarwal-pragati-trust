<?php
if($_REQUEST['action'] == 'projects'){
?>
<div class="box-header">
	<h2>Project Management </h2>
	<div class="box-icon">
		<a href="index.php?controller=projects&action=projects&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=projects&action=projects&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
if($_REQUEST['action'] == 'project_type'){
?>
<div class="box-header">
	<h2>Project's Type Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=projects&action=project_type&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=projects&action=project_type&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
if($_REQUEST['action'] == 'projectoptions'){
?>
<div class="box-header">
	<h2>Project's Options Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=projects&action=projectoptions&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=projects&action=projectoptions&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
if($_REQUEST['action'] == 'projectimages'){
?>
<div class="box-header">
	<h2>Project's Images Management (<?php echo getfldValue('projects','projectID',$_REQUEST['projectID'],'projectTitle'); ?>&nbsp;&nbsp;<a href="index.php?controller=projects&action=projects&subaction=listData&pTypeID=<?php echo getfldValue('projects','projectID',$_REQUEST['projectID'],'projectID'); ?>" Title="Go Back to Projects's List"><i class="fa fa-mail-reply"></i></a>)</h2>
	<div class="box-icon">
		<a href="index.php?controller=projects&action=projectimages&subaction=listData&projectID=<?php echo $_REQUEST['projectID']; ?>" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=projects&action=projectimages&subaction=addForm&projectID=<?php echo $_REQUEST['projectID']; ?>" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
if($_REQUEST['action'] == 'projectfloors'){
?>
<div class="box-header">
	<h2>Project's Images Management (<?php echo getfldValue('projects','projectID',$_REQUEST['projectID'],'projectTitle'); ?>&nbsp;&nbsp;<a href="index.php?controller=projects&action=projects&subaction=listData&pTypeID=<?php echo getfldValue('projects','projectID',$_REQUEST['projectID'],'projectID'); ?>" Title="Go Back to Projects's List"><i class="fa fa-mail-reply"></i></a>)</h2>
	<div class="box-icon">
		<a href="index.php?controller=projects&action=projectfloors&subaction=listData&projectID=<?php echo $_REQUEST['projectID']; ?>" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=projects&action=projectfloors&subaction=addForm&projectID=<?php echo $_REQUEST['projectID']; ?>" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>
<?php 
if($_REQUEST['action'] == 'downloads_list'){
?>
<div class="box-header">
	<h2>Brochure Downloads Management </h2>
</div>
<?php
}
?>
<?php
if($_REQUEST['action'] == 'projectslider'){
?>
<div class="box-header">
	<h2>Project Slider Images (<?php echo getfldValue('projects','projectID',$_REQUEST['projectID'],'projectTitle'); ?>&nbsp;&nbsp;<a href="index.php?controller=projects&action=projects&subaction=listData&pTypeID=<?php echo getfldValue('projects','projectID',$_REQUEST['projectID'],'projectID'); ?>" Title="Go Back to Projects's List"><i class="fa fa-mail-reply"></i></a>)</h2>
	<div class="box-icon">
		<a href="index.php?controller=projects&action=projectslider&subaction=listData&projectID=<?php echo $_REQUEST['projectID']; ?>" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=projects&action=projectslider&subaction=addForm&projectID=<?php echo $_REQUEST['projectID']; ?>" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>
