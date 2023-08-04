<script>
$(document).ready(function(){
	flag = 0;
	          $('input').on('blur', function() {      
				if ($("#sliderFrm").valid() && flag == 0) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
			  
			  $('input[type=file]').bind('change', function() {

				  //this.files[0].size gets the size of your file.
				  var iSize = ($("input[type=file]")[0].files[0].size / 1024); 
					iSize = (Math.round(iSize * 100) / 100)
				var max = '<?php echo (int)ini_get('upload_max_filesize'); ?>' * 1024;	
				  if(iSize > max)
				  {
					  $('input[type=submit]').prop('disabled', 'disabled');
					  flag = 1;
					  alert('Maximum file upload size is : '+'<?php echo (int)ini_get('upload_max_filesize'); ?>'+' MB');
				  }
					  
				  else
				  {
					 $('input[type=submit]').prop('disabled', false); 
					 flag = 0;
				  }
					 

				});
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class slider
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "sliderFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$position = array("H" => "Home Page", "I" => "Inner Pages");
		$form->addElement(new Element_HTML("<legend>New slider</legend>"));
		$form->addElement(new Element_Hidden("controller", "slider"));
		$form->addElement(new Element_Hidden("action", "slider"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		/* Actual Form Fields Started */		
		$form->addElement(new Element_Textbox("Image Title:", "sliderTitle", array(
			"required" => 1, 
			"placeholder" => "Title"
			)));
		$form->addElement(new Element_File("Photo:", "image", array(
			"required" => 1, 
			"placeholder" => "Photo"
			)));
		$form->addElement(new Element_HTML('<label>Note : width= 1,900px , height= 800px require jpg file</label>'));

		$form->addElement(new Element_Select("Position:", "sliderPosition", $position, array(
			"required" => 1, 
			"placeholder" => "Position"
			)));	
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('sliderimage').'</label><br><br>'));		
		$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "SortOrder"
			
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
		$form->render();
	}
	function add()
	{
		$upload = $_FILES["image"]["name"];
		$username=$_SESSION['username'];
		$target_path = $_FILES["image"]["name"];
		$sql = "Insert into sliderimage set 
		sliderTitle = '".ets_db_real_escape_string($_POST['sliderTitle'])."',		
		sliderPosition = '".ets_db_real_escape_string($_POST['sliderPosition'])."',		
		username = '".$username."',
		createdate= now(),
		sortorder='".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		$id = ets_db_insert_id();
		if(move_uploaded_file($_FILES["image"]["tmp_name"],DIR_FS_SLIDER_PATH.$id.'-'.$target_path)){

		
			$updqry = "update sliderimage set 
			image = '".$id.'-'.$upload."'
			where sliderID = '".$id."'
			";
			$updres = ets_db_query($updqry) or die(ets_db_error());
		
			return true;
		}else{
		echo "Error in uploading Image..";
		}
	}
	function editForm()
	{		
		$sql = "select * from sliderimage where sliderID ='".$_REQUEST['sliderID']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("frmEdit");
			$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "sliderFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$position = array("H" => "Home Page", "I" => "Inner Pages");
			$form->addElement(new Element_HTML("<legend>Edit slider</legend>"));
			$form->addElement(new Element_Hidden("controller", "slider"));
			$form->addElement(new Element_Hidden("action", "slider"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("sliderID", $_REQUEST['sliderID']));
			$form->addElement(new Element_Hidden("prevImage", $rs['image']));
			$form->addElement(new Element_Hidden("createdate"));
			$form->addElement(new Element_Hidden("username"));
			/* Actual Form Fields Started */
			$form->addElement(new Element_Textbox("Image Title:", "sliderTitle", array(
			"value"=> $rs['sliderTitle'],
			"required" => 1, 
			"placeholder" => "Title"
			)));
			$form->addElement(new Element_HTML('<img src="'.DIR_WS_SLIDER_PATH.$rs['image'].'" width="10%" height="10%" ">'));
			$form->addElement(new Element_File("Slider Image:", "image", array(
			"placeholder" => "Slider Image"
			)));
			$form->addElement(new Element_HTML('E.g: width= 1,900px , height= 800px require jpg file'));
			$form->addElement(new Element_Select("Position:", "sliderPosition", $position, array(
			"value"=> $rs['sliderPosition'],		
			"required" => 1, 
			"placeholder" => "Position"
			)));
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('sliderimage').'</label><br><br>'));			
			$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"value"=> $rs['sortorder'],
			"required" => 1, 
			"placeholder" => "Sort Order"
			)));		
			$form->addElement(new Element_Select("Status:", "status", $status, array(
			"value"=> $rs['status'],
			"required" => 1, 
			"placeholder" => "Status"
			)));	
			$form->addElement(new Element_HTML('<hr>'));
			$form->addElement(new Element_Button);
			$form->addElement(new Element_Button("Cancel", "button", array(
				"onclick" => "history.go(-1);"
			)));
			$form->render();
		}
		else
		{
			echo "No Tax Found...";
		}
		
	}
	function edit()
	{
		$updimg = true;		
		$error = false;
		$username = $_SESSION['username'];
		if($_FILES["image"]['size'] == 0 ||  $_FILES["image"] == $_POST['prevImage']){
			$updimg = false;
			$upload = $_POST['prevImage'];
		}
		if($updimg){
			@unlink(DIR_FS_SLIDER_PATH.$_POST['prevImage']);
			$upload = $_POST['sliderID'].'-'.$_FILES["image"]["name"];
			$target_path = DIR_FS_SLIDER_PATH.$_POST['sliderID'].'-'.$_FILES["image"]["name"];
			if(!move_uploaded_file($_FILES["image"]["tmp_name"],$target_path)){
				$error = true;
				echo "Error in updating member image..";
			}
		}
		if(!$error){
			$updqry = ets_db_query("update sliderimage set 
			sliderTitle = '".ets_db_real_escape_string($_POST['sliderTitle'])."',
			sliderPosition = '".ets_db_real_escape_string($_POST['sliderPosition'])."',
			image = '".$upload."',					
			username = '".$username."',	
			sortorder='".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			modifieddate = now(),
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'		
			where sliderID='" .$_POST['sliderID']."'") or die ("Updating   image records query failed: ".ets_db_error());
			
			return true;
		}else{
			echo "Error in uploading image..";
			return false;
		}
	}
	function listData()
	{
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/sliderList.php';
	$('#sliderlist').dataTable({
		"ajax": listURL
		
	});
});

</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	

		echo '<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="sliderlist" width="100%">
		<thead>
		<tr>
			<th align="left">Title</th>
			<th align="left">Position</th>
			<th align="left">Image</th>			
			<th align="left">Status</th>
			<th align="left">Sort Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
					<th align="left">Title</th>
					<th align="left">Position</th>
					<th align="left">Image</th>					
					<th align="left">Status</th>
					<th align="left">Sort Order</th>
					<th>Action</th>
				</tr>
		</tfoot>		
		 </table>';		
		?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"sliderimage"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php		
	}	
	function delete()
	{
		$selqry = "Select * from sliderimage where sliderID='".$_GET['sliderID']."'";
		$selres = ets_db_query($selqry);
		$arr = ets_db_fetch_array($selres);
		@unlink(DIR_FS_SLIDER_PATH.$arr['image']);
		$delsql = "Delete from sliderimage where sliderID='".$_GET['sliderID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		return true;		
	}
}
?>
