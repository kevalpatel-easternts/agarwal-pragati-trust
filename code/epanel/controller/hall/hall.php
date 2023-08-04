
<script>
$(document).ready(function(){

	
			  flag = 0;
	          $('input').on('blur', function() {      
				if ($("#hallFrm").valid() && flag == 0) {
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
include(DIR_WS_CLASSES."resize-class.php");
class hall
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "hallFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$front = array( "D" => "No", "E" => "Yes");
		$form->addElement(new Element_HTML("<legend>Add hall</legend>"));
		$form->addElement(new Element_Hidden("controller", "hall"));
		$form->addElement(new Element_Hidden("action", "hall"));
		$form->addElement(new Element_Hidden("subaction", "add"));
	
		/* Actual Form Fields Started */
		
//		$form->addElement(new Element_Textbox("Hall Id:", "hid", array(
//		 
//			"placeholder" => "Hall Id"
//			)));
		$form->addElement(new Element_Textbox("Hall Name:", "hallname", array(
			"required" => 1, 
			"placeholder" => "Hall Name"
			)));
			$form->addElement(new Element_TinyMCE("Hall Description:", "hdesc", array(
				"required" => 1,
				"placeholder" => "Hall Description"
				)));
		$form->addElement(new Element_Textbox("Contact Number:", "cnum", array(
		
			"placeholder" => "Contact Number"
			)));

		$form->addElement(new Element_TinyMCE("Hall Aminities:", "haminities", array(

				"placeholder" => "Hall Aminities"
				)));
			$form->addElement(new Element_Textbox("Video:", "video", array(
			
			"placeholder" => "video"
			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('hall_master').'</label><br><br>'));					
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1,
			"placeholder" => "Sortorder"	
			)));
		/*
		$form->addElement(new Element_Select("In Front Cover:", "isFront", $front, array(
			"required" => 1
			)));		
		*/
		$form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1
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
		$sosql = "select sortorder from hall_master where sortorder ='".$_POST['sortorder']."'";	
		$soqry = ets_db_query($sosql);
		
		if(ets_db_num_rows($soqry) > 0)
		{
			echo 'Sort Order -' .$_POST['sortorder'] .  'Already Exists';
			die;
		}
		else
		{
			$username= $_SESSION['username'];
			$createdate = date("Y-m-d");
			
			$hall_slug = pro_SeoSlug(stripslashes($_POST['image_title']));
		
			
			$values = implode(",", $_POST["a_id"]);
			
			$sql = "Insert into  hall_master set 
			username = '".$username."',
          
			createdate = '".$createdate."',
			modifieddate = '".$createdate."',
		
			hdesc = '".ets_db_real_escape_string($_POST['hdesc'])."',
			haminities = '".ets_db_real_escape_string($_POST['haminities'])."',
			cnum = '".$_POST['cnum']."',
			video = '".$_POST['video']."',
			hallname = '".ets_db_real_escape_string($_POST['hallname'])."',
			sortorder ='".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			";		
			$qry = ets_db_query($sql) or die(ets_db_error().$sql);
			$id = ets_db_insert_id();
			
			
			return true;

		}
	}
	function editForm()
	{		
		$sql = "select * from  hall_master where h_id ='".$_REQUEST['h_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "hallFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$front = array( "D" => "No", "E" => "Yes");
			$form->addElement(new Element_HTML("<legend>Edit Gallary</legend>"));
			$form->addElement(new Element_Hidden("controller", "hall"));
			$form->addElement(new Element_Hidden("action", "hall"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("h_id", $_REQUEST['h_id']));
			$form->addElement(new Element_Hidden("old_a_id", $rs['a_id']));
			$form->addElement(new Element_Hidden("prevImage", $rs['hall_image']));	
//			$form->addElement(new Element_Hidden("selected_album", $rs['a_id']));	
			/* Actual Form Fields Started */
		
			$form->addElement(new Element_Textbox("hall Name:", "hallname", array(
				"required" => 1,
				"placeholder" => "hall Name",
				"value"=> $rs['hallname']
				)));
			$form->addElement(new Element_TinyMCE("Hall description:", "hdesc", array(
				"required" => 1,
				"placeholder" => "hall Address",
				"value"=> $rs['hdesc']
				)));
		$form->addElement(new Element_Textbox("Contact Number:", "cnum", array(
		
			"placeholder" => "Contact Number",
			"value"=> $rs['cnum']
			)));
	
			$form->addElement(new Element_TinyMCE("Hall Aminities:", "haminities", array(
			
				"placeholder" => "Hall Aminities",
				"value"=> $rs['haminities']
				)));
			$form->addElement(new Element_Textbox("Video:", "video", array(
			
			"placeholder" => "video",
				"value"=> $rs['video']
			)));
			$sosql = "select max(sortorder) as mx from hall_master ";	
			$soqry = ets_db_query($sosql);
			$sores = ets_db_fetch_assoc($soqry);
		
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('hall_master').'</label><br><br>'));					
			
			
			$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
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
			echo "No Found...";
		}
	}
	function edit()
	{
	    $username=$_SESSION['username'];
	    $modifieddate = date("Y-m-d");
		$updimg = true;		
		$error = false;


		if(!$error){
			$values = implode(",", $_POST["a_id"]);
			
			$updqry = ets_db_query("update hall_master set 
			username = '".$username."',
          
			createdate = '".$createdate."',
			modifieddate = '".$createdate."',
		
			hdesc = '".ets_db_real_escape_string($_POST['hdesc'])."',
			haminities = '".ets_db_real_escape_string($_POST['haminities'])."',
			cnum = '".$_POST['cnum']."',
			hallname = '".ets_db_real_escape_string($_POST['hallname'])."',
			sortorder ='".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			where h_id= '".$_POST['h_id']."'") or die ("Updating hall_master records query failed: ".ets_db_error());
			return !$error;
		}
		
	}	
function listData()
	{
		?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/hallList.php';
	
	$('#halllist').dataTable( {
        "ajax": listURL
    } );
    
	$('.esortorder').editable({params:{"tblName":"hall_master"}});
});
</script>
<?php
		echo '<div id="no-more-tables"><table class="table table-striped table-bordered dataTable" id="halllist" width="100%">
		<thead>
		<tr>
			<th>Id</th>
		
			<th>Title</th>
		
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
			<tr>
				<th>Id</th>
				
				<th>Title</th>
		
				<th>Status</th>
				<th>Sort-Order</th>
				<th>Action</th>
			</tr>
		</tfoot>
		
		 </table></div>';		
	?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"hall_master"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php
			
	}
function delete()
	{
		$sql = "Select * from  hall_master where h_id='".$_GET['h_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		$arr = ets_db_fetch_array($qry);
		$a_id = $arr['a_id'];		
		
		$delsql = "Delete from  hall_master where h_id='".$_GET['h_id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		$path = DIR_FS_hall_PATH.$a_id.'/';
		$mask = $path.$_GET['h_id'].'-*.*';
		array_map('unlink', glob($mask));
		
		return true;		
	}	
}

?>
