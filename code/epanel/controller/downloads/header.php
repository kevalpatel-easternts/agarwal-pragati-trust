<?php 
if($_REQUEST['action'] == 'downloads')
{
?>	
<div class="box-header">
	<h2>download Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=downloads&action=downloads&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=downloads&action=downloads&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>

<?php } ?>
