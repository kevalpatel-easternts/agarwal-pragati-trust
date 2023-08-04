<?php 
if($_REQUEST['action'] == 'home')
{
?>	
<div class="box-header">
	<h2>Home Content Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=home&action=home&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=home&action=home&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>

<?php } ?>