<?php 
if($_REQUEST['action'] == 'environment')
{
?>	
<div class="box-header">
	<h2>Environment Content Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=environment&action=environment&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=environment&action=environment&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>

<?php } ?>