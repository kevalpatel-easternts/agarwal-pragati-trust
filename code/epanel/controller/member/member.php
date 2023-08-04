<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>
<script>
$(document).ready(function(){

	var selected_a_id = $('input[name=old_a_id]').val();
	console.log(selected_a_id);
	if(selected_a_id != '' && selected_a_id != undefined)
	{
		var dataarray = selected_a_id.split(",");

        $('#example-getting-started').val(dataarray);
        $('#example-getting-started').multiselect("refresh");
	}
			  flag = 0;
	          $('input').on('blur', function() {      
				if ($("#memberFrm").valid() && flag == 0) {
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

    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });

</script>
<?php
include WS_PFBC_ROOT."Form.php";
include(DIR_WS_CLASSES."resize-class.php");
class member
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "memberFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$front = array( "D" => "No", "E" => "Yes");
		$form->addElement(new Element_HTML("<legend>Add member</legend>"));
		$form->addElement(new Element_Hidden("controller", "member"));
		$form->addElement(new Element_Hidden("action", "member"));
		$form->addElement(new Element_Hidden("subaction", "add"));
	
		/* Actual Form Fields Started */
		$album = getmemberlist();
			$form->addElement(new Element_Select("Select Member Type:", "a_id",$album, array(
				"id" => 'example-getting-started',
				"multiple" => 'multiple',
				"required" => 1
			)));
//		$form->addElement(new Element_Select("Select Album:", "a_id",$album, array(
//			"required" => 1
//			)));
		$form->addElement(new Element_Textbox("Member Id:", "mid", array(
		 
			"placeholder" => "Member Id"
			)));
		$form->addElement(new Element_Textbox("Member Name:", "image_title", array(
			"required" => 1, 
			"placeholder" => "Member Name"
			)));
		$form->addElement(new Element_Textbox("Contact Number:", "cnum", array(
			"required" => 1, 
			"placeholder" => "Contact Number"
			)));
	$form->addElement(new Element_TinyMCE("Member Address:", "madr", array(
				"required" => 1,
				"placeholder" => "Member Address"
				)));
			$form->addElement(new Element_Textbox("Landmark:", "landmark", array(
			
			"placeholder" => "Landmark"
			)));
			$form->addElement(new Element_Textbox("State:", "state", array(
			
			"placeholder" => "State"
			)));
			$form->addElement(new Element_Textbox("City:", "city", array(
			
			"placeholder" => "City"
			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('member_master').'</label><br><br>'));					
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
		$sosql = "select sortorder from member_master where sortorder ='".$_POST['sortorder']."'";	
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
			
			$member_slug = pro_SeoSlug(stripslashes($_POST['image_title']));
		
			
			$values = implode(",", $_POST["a_id"]);
			
			$sql = "Insert into  member_master set 
			username = '".$username."',
          
			createdate = '".$createdate."',
			modifieddate = '".$createdate."',
			memberid = '".$_POST['m_id']."',
			landmark = '".$_POST['landmark']."',
			state = '".$_POST['state']."',
			cnum = '".$_POST['cnum']."',
			city = '".$_POST['city']."',
			madr = '".ets_db_real_escape_string($_POST['madr'])."',
			a_id = '".$values."',
			image_title = '".ets_db_real_escape_string($_POST['image_title'])."',
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
		$sql = "select * from  member_master where m_id ='".$_REQUEST['m_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "memberFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$front = array( "D" => "No", "E" => "Yes");
			$form->addElement(new Element_HTML("<legend>Edit Gallary</legend>"));
			$form->addElement(new Element_Hidden("controller", "member"));
			$form->addElement(new Element_Hidden("action", "member"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("m_id", $_REQUEST['m_id']));
			$form->addElement(new Element_Hidden("old_a_id", $rs['a_id']));
			$form->addElement(new Element_Hidden("prevImage", $rs['member_image']));	
			$form->addElement(new Element_Hidden("selected_album", $rs['a_id']));	
			/* Actual Form Fields Started */
			$album = getmemberlist();
$string = explode(',', $rs['a_id']);
			
			?>
		
			<?php
			$form->addElement(new Element_Select("Select Member Type:", "a_id",$album, array(
				"id" => 'example-getting-started',
				"multiple" => 'multiple',
				"required" => 1,
				"value"=> $string
				
			)));
		
			$form->addElement(new Element_Textbox("Member Name:", "image_title", array(
				"required" => 1,
				"placeholder" => "Member Name",
				"value"=> $rs['image_title']
				)));
			
			$form->addElement(new Element_Textbox("Member Id:", "mid", array(
		 
			"placeholder" => "Member Id",
			"value"=> $rs['memberid']
			)));
		
		$form->addElement(new Element_Textbox("Contact Number:", "cnum", array(
			"required" => 1, 
			"placeholder" => "Contact Number",
			"value"=> $rs['cnum']
			)));
	$form->addElement(new Element_TinyMCE("Member Address:", "madr", array(
				"required" => 1,
				"placeholder" => "Member Address",
		         "value"=> $rs['madr']
				)));
			$form->addElement(new Element_Textbox("Landmark:", "landmark", array(
			
			"placeholder" => "Landmark",
			   "value"=> $rs['landmark']
			)));
			$form->addElement(new Element_Textbox("State:", "state", array(
			
			"placeholder" => "State",
			  "value"=> $rs['state']	
			)));
			$form->addElement(new Element_Textbox("City:", "city", array(
			
			"placeholder" => "City",
				 "value"=> $rs['city']	
			)));
			$sosql = "select max(sortorder) as mx from member_master ";	
			$soqry = ets_db_query($sosql);
			$sores = ets_db_fetch_assoc($soqry);
		
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('member_master').'</label><br><br>'));					
			
			
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
			
			$updqry = ets_db_query("update member_master set 
			username = '".$username."',
			modifieddate = '".$modifieddate."',
			memberid = '".$_POST['m_id']."',
			landmark = '".$_POST['landmark']."',
			state = '".$_POST['state']."',
			cnum = '".$_POST['cnum']."',
			city = '".$_POST['city']."',
			madr = '".ets_db_real_escape_string($_POST['madr'])."',
			a_id = '".ets_db_real_escape_string($values)."',
			image_title = '".ets_db_real_escape_string($_POST['image_title'])."',
			
			sortorder = '".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			where m_id= '".$_POST['m_id']."'") or die ("Updating member_master records query failed: ".ets_db_error());
			return !$error;
		}
		
	}	
function listData()
	{
		?>
<script>
$(document).ready(function() {
	
	var listURL = 'helperfunc/memberList.php';
	
	$('#memberlist').dataTable( {
        "ajax": listURL
    } );
    
	$('.esortorder').editable({params:{"tblName":"member_master"}});
});
</script>
<?php
			$subvar = 'onclick="return confirmSubmit();"';	
		echo '<a href="member-report.php">Export To Excel</a>';
		echo '<div id="no-more-tables"><table class="table table-striped table-bordered dataTable" id="memberlist" width="100%">
		<thead>
		<tr>
			<th>Id</th>
		
			<th>Image Title</th>
		
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
			<tr>
				<th>Id</th>
				
				<th>Image Title</th>
		
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
		params:{"tblName":"member_master"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php
			
	}
function delete()
	{
		$sql = "Select * from  member_master where m_id='".$_GET['m_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		$arr = ets_db_fetch_array($qry);
		$a_id = $arr['a_id'];		
		
		$delsql = "Delete from  member_master where m_id='".$_GET['m_id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		$path = DIR_FS_member_PATH.$a_id.'/';
		$mask = $path.$_GET['m_id'].'-*.*';
		array_map('unlink', glob($mask));
		
		return true;		
	}	
}

?>
