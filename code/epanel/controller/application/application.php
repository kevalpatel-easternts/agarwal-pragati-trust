<script>
$(document).ready(function(){
			  flag = 0;
	          $('input').on('blur', function() {      
				if ($("#applicationFrm").valid() && flag == 0) {
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
class application
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "applicationFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$front = array( "D" => "No", "E" => "Yes");
		$form->addElement(new Element_HTML("<legend>Add application</legend>"));
		$form->addElement(new Element_Hidden("controller", "application"));
		$form->addElement(new Element_Hidden("action", "application"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		
		/* Actual Form Fields Started */
		$album = getalbumlist();
		$form->addElement(new Element_Select("Select Album:", "a_id",$album, array(
			"required" => 1
			)));
		$form->addElement(new Element_Textbox("Image Title:", "image_title", array(
			"required" => 1, 
			"placeholder" => "Image Title"
			)));
		$form->addElement(new Element_File("Browse Image:", "application_image", array(
			"placeholder" => "Browse Image"
			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('application_master').'</label><br><br>'));					
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1,
			"placeholder" => "Sortorder"	
			)));
		$form->addElement(new Element_Select("In Front Cover:", "isFront", $front, array(
			"required" => 1
			)));		
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
		$sosql = "select sortorder from application_master where sortorder ='".$_POST['sortorder']."'";	
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
			
			$application_slug = pro_SeoSlug(stripslashes($_POST['image_title']));
			
			
			 
			
			
			$sql = "Insert into  application_master set 
			username = '".$username."',
			createdate = '".$createdate."',
			a_id = '".$_POST['a_id']."',
			image_title = '".ets_db_real_escape_string($_POST['image_title'])."',
			sortorder ='".$_POST['sortorder']."',
			isFront = '".$_POST['isFront']."',
			status = '".$_POST['status']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			";		
			$qry = ets_db_query($sql) or die(ets_db_error().$sql);
			$id = $_POST['a_id'];
            $id1 =  ets_db_insert_id();
		//  insSeoLnk($environment_id,ourenvironment,$environment_slug);
        	$img2 = $_FILES['application_image']['name'];
			
			if($img2 != "")
			{
				$path = DIR_FS_APPLICATION_PATH.$id.'/';
           
				
				if(!file_exists($path))
				{
					mkdir($path, 0777, true);
					exec("chown ".FILEUSER.FILEUSER." ".$path);
					exec("chmod 0777 ".$path);
					
				}
				
				$img1 = $id1.'-'.$_FILES['application_image']['name'];
               
				if(move_uploaded_file($_FILES['application_image']['tmp_name'],$path.$img1))
				{
					ets_db_query("UPDATE application_master set application_image = '".$img1."' where application_id = '".$id1."'") or die(ets_db_error());
				}
			}
	
            return true;
		
	}
    }
	function editForm()
	{		
		$sql = "select * from  application_master where application_id ='".$_REQUEST['application_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "applicationFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$front = array( "D" => "No", "E" => "Yes");
			$form->addElement(new Element_HTML("<legend>Edit Application</legend>"));
			$form->addElement(new Element_Hidden("controller", "application"));
			$form->addElement(new Element_Hidden("action", "application"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("application_id", $_REQUEST['application_id']));
			//$form->addElement(new Element_Hidden("old_a_id", $rs['a_id']));
			$form->addElement(new Element_Hidden("prevImage", $rs['application_image']));	
			/* Actual Form Fields Started */
			$album = getalbumlist();
			$form->addElement(new Element_Select("Select Album:", "a_id",$album, array(
			"required" => 1, 
			"value"=> $rs['a_id']
			)));
			$form->addElement(new Element_Textbox("Image Title:", "image_title", array(
				"required" => 1,
				"placeholder" => "Image Title",
				"value"=> $rs['image_title']
				)));
			$form->addElement(new Element_HTML('<img src="'.DIR_WS_APPLICATION_PATH.$rs['a_id']."/".$rs['application_image'].'" width="10%" height="10%" style="margin-left:200px;">'));
			$form->addElement(new Element_File("Browse Image:", "application_image", array( 
			"placeholder" => "Browse Image"
			)));
			
			$sosql = "select max(sortorder) as mx from application_master ";	
			$soqry = ets_db_query($sosql);
			$sores = ets_db_fetch_assoc($soqry);
		
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('application_master').'</label><br><br>'));					
			
			
			$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"value"=> $rs['sortorder']
			)));
			$form->addElement(new Element_Select("In Front Cover:", "isFront", $front, array(
			"required" => 1,
			"value"=> $rs['isFront']
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
			$updqry = ets_db_query("update application_master set 
			username = '".$username."',
			modifieddate = '".$modifieddate."',
			a_id = '".ets_db_real_escape_string($_POST['a_id'])."',
			image_title = '".ets_db_real_escape_string($_POST['image_title'])."',
			application_image = '".$upload."',
			sortorder = '".$_POST['sortorder']."',
			isFront = '".$_POST['isFront']."',
			status = '".$_POST['status']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			where application_id= '".$_POST['application_id']."'") or die ("Updating application_master records query failed: ".ets_db_error());
			
            $id = $_POST['a_id'];
            $id1 =  $_POST['application_id'];
            $image1 = $_FILES['application_image']['name'];
			if($image1 != "")
			{
				$path = DIR_FS_APPLICATION_PATH.$id.'/';
               
                //$path1 = $id1.'-'.$_FILES['application_image']['name'];;
				if(!file_exists($path))
				{
					mkdir($path);
					exec("chown ".FILEUSER.FILEUSER." ".$path);
					exec("chmod 0777 ".$path);
					
				}
				@unlink($path.$_POST['prevImage']);
				$image1 = $id1.'-'.$_FILES['application_image']['name'];
           
				if(move_uploaded_file($_FILES['application_image']['tmp_name'],$path.$image1))
				{
					ets_db_query("UPDATE application_master set application_image = '".$image1."' where application_id = '".$id1."'") or die(ets_db_error());
				}
			}
			
	
            
            
            
        } else{
			echo "Error in uploading image..";
			return false;
		}
        return true;
    }
function listData()
	{
		?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/applicationList.php';
	
	$('#applicationlist').dataTable( {
        "ajax": listURL
    } );
    
	$('.esortorder').editable({params:{"tblName":"application_master"}});
});
</script>
<?php
		echo '<div id="no-more-tables"><table class="table table-striped table-bordered dataTable" id="applicationlist" width="100%">
		<thead>
		<tr>
			<th>Id</th>
			<th>Image Title</th>
			<th>Image</th>
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
				<th>Image</th>
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
		params:{"tblName":"application_master"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php
			
	}
function delete()
	{
		$sql = "Select * from  application_master where application_id='".$_GET['application_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		$arr = ets_db_fetch_array($qry);
		$a_id = $arr['a_id'];		
		
		$delsql = "Delete from  application_master where application_id='".$_GET['application_id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		$path = DIR_FS_application_PATH.$a_id.'/';
		$mask = $path.$_GET['application_id'].'-*.*';
		array_map('unlink', glob($mask));
		
		return true;		
	}	
}

?>
