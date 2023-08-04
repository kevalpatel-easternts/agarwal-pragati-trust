<script>
	$(document).ready(function(){
    $('#maincategory').select2();
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class downloads
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$form->addElement(new Element_HTML("<legend>Add download</legend>"));
		$form->addElement(new Element_Hidden("controller", "downloads"));
		$form->addElement(new Element_Hidden("action", "downloads"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		/* Actual Form Fields Started */
		
		$form->addElement(new Element_Textbox("Download File Title:", "title", array(
			"required" => 1, 
			"placeholder" => "Download File Title"
			)));	
		$form->addElement(new Element_File("Download File:", "image", array(
			"placeholder" => "Download File"
			)));
		
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "Sortorder"
			)));	
		$form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1, 
			"placeholder" => "Status"
			)));
		$form->addElement(new Element_HTML('<hr>'));
		$form->addElement(new Element_Button);
		$form->addElement(new Element_Button("Cancel", "button", array(
			"onclick" => "history.go(-1);"
		)));
		$form->addElement(new Element_HTML('<hr>'));
		$form->render();
	}
	function add()
	{
	
		$username=$_SESSION['username'];
		$createdate = date("Y-m-d");
		$upload = $_FILES["image"]["name"];
		$target_path = DIR_FS_DOWNLOAD_PATH.$_FILES["image"]["name"]; 
                 $sql = "Insert into downloads set 
		username = '".$username."',
		createdate = now(),
		title = '".$_POST['title']."',
		image = '".$upload."',
		
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";

                
        
		if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_path)){
		
        
        $qry = ets_db_query($sql) or die(ets_db_error().$sql);
		return true;
		}else{
		echo "Error in uploading Image..";

		}
	}
	function editForm()
	{		
		$sql = "select * from downloads where download_id ='".$_REQUEST['download_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$form->addElement(new Element_HTML("<legend>Edit Download</legend>"));
			$form->addElement(new Element_Hidden("controller", "downloads"));
			$form->addElement(new Element_Hidden("action", "downloads"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("download_id", $_REQUEST['download_id']));
			$form->addElement(new Element_Hidden("modifieddate"));
			$form->addElement(new Element_Hidden("username"));	
			$form->addElement(new Element_Hidden("prevImage", $rs['image']));	
			/* Actual Form Fields Started */
			/*
			$downloadlist = getdownloadlist();
			$form->addElement(new Element_Select("Select Download Type:", "download_type",$downloadlist, array(
			"required" => 1,
			"value"=> $rs['download_type']
			)));
			*/
			$form->addElement(new Element_Textbox("Download File Title:", "title", array(
			"required" => 1, 
			"placeholder" => "Download File Title",
			"value"=> $rs['title']
			)));
			
			$form->addElement(new Element_HTML('<strong>'.$rs['image'].'</strong>'));
			$form->addElement(new Element_File("Download File:", "image", array( 
			"placeholder" => "Download File"
			)));
			
			$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "Sortorder",
			"value"=> $rs['sortorder']
			)));
			$form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1, 
			"value"=> $rs['status']
			)));
			$form->addElement(new Element_HTML('<hr>'));
			$form->addElement(new Element_Button);
			$form->addElement(new Element_Button("Cancel", "button", array(
				"onclick" => "history.go(-1);"
			)));
			$form->addElement(new Element_HTML('<hr>'));
			$form->render();
		}
		else
		{
			echo "No Tax Found...";
		}
		
	}
	function edit()
	{
		
	    $username=$_SESSION['username'];
	   
		$updimg = true;		
		$error = false;
		
		if($updimg){
//			@unlink(DIR_FS_DOWNLOAD_PATH.$_POST['prevImage']);
			$upload = $_FILES["image"]["name"];
			$target_path = DIR_FS_DOWNLOAD_PATH.$_FILES["image"]["name"];
			
		if(move_uploaded_file($_FILES["image"]["name"],$target_path)){
		
        
        $qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		}else{
		echo "Error in uploading Image..";

		}
		}
		if(!$error){
		$updqry = ets_db_query("update downloads set 
		username = '".$username."',
		modifieddate = now(),
		title = '".$_POST['title']."',
		image = '".$upload."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where download_id= '".$_POST['download_id']."'") or die ("Updating download records query failed: ".ets_db_error());
	
		}
        	return true;
	}
		function delete()
		{
			$delsql = "Delete from downloads where download_id='".$_GET['download_id']."'";
			$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
			return true;		
		}	
	function listData(){
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/downloadsList.php';
	$('#downloadslist').dataTable({
		
		"ajax": listURL,
		
	});
});
</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';
		echo '
		<div id="no-more-tables">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="downloadslist">
		<thead>
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		</tbody>	
		<tfoot class="hidden-xs">
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Status</th>
					<th>Sort-Order</th>
					<th>Action</th>
				</tr>
		</tfoot>
		 </table>
		  </div>';		
?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"downloads"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php				 
	}	
}
?>
