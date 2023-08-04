<?php
include WS_PFBC_ROOT."Form.php";

class advantage
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$form->addElement(new Element_HTML("<legend>New advantage</legend>"));
		$form->addElement(new Element_Hidden("controller", "advantage"));
		$form->addElement(new Element_Hidden("action", "advantage"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		/* Actual Form Fields Started */		
		$form->addElement(new Element_Textbox("Title Of Content :", "title", array(
			"required" => 1, 
			"placeholder" => "Title Of Content"
			)));
		$form->addElement(new Element_Textbox("Description :", "desc", array(
			"required" => 1, 
			"placeholder" => "Description"
			)));
		$form->addElement(new Element_File("Image:", "image", array(
		"required" => 1, 
			"placeholder" => "Image"
			)));
		$form->addElement(new Element_HTML('E.g: width= 1,024px , height= 416px require jpg file'));	
	
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
		
		$username=$_SESSION['username'];
	//	$home_slug = pro_SeoSlug(stripslashes($_POST['title']));
		
		
            $sql = "Insert into advantage set 
            title = '".ets_db_real_escape_string($_POST['title'])."',		
           	
            description = '".addslashes($_POST['desc'])."',
            username = '".$username."',
            createdate= now(),
            sortorder='".$_POST['sortorder']."',
            status = '".$_POST['status']."',
            remote_ip ='".$_SERVER['REMOTE_ADDR']."'
            ";
          $qry = ets_db_query($sql) or die(ets_db_error().$sql);
             $a_id = ets_db_insert_id();
        	$img1 = $_FILES['image']['name'];
			
			if($img1 != "")
			{
				$path = DIR_FS_ADVANTAGE_PATH.$a_id.'/';

				if(!file_exists($path))
				{
                   
	               mkdir($path, 0777, true);
                   
					exec("chown ".FILEUSER.FILEUSER." ".$path);
                     
					exec("chmod 0777 ".$path);
					
				}
				
				$img1 = $a_id.'-'.$_FILES['image']['name'];
               
				if(move_uploaded_file($_FILES['image']['tmp_name'],$path.$img1))
				{
                  
					ets_db_query("UPDATE advantage set ad_image = '".$img1."' where advantage_id = '".$a_id."'") or die(ets_db_error());
				}
			}
	
            return true;
		
	}
	function editForm()
	{		
		$sql = "select * from advantage where advantage_id ='".$_REQUEST['advantage_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
      
		if(ets_db_num_rows($qry) > 0){
             
			$rs=ets_db_fetch_array($qry);
            	$advantage_id = $rs['advantage_id'];
			$form = new Form("frmEdit");
			$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			
			$form->addElement(new Element_HTML("<legend>Edit Advantages</legend>"));
			$form->addElement(new Element_Hidden("controller", "advantage"));
			$form->addElement(new Element_Hidden("action", "advantage"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("advantage_id", $_REQUEST['advantage_id']));
			$form->addElement(new Element_Hidden("prevImage", $rs['ad_image']));
			$form->addElement(new Element_Hidden("createdate"));
			$form->addElement(new Element_Hidden("username"));
			/* Actual Form Fields Started */
			$form->addElement(new Element_Textbox("Title Of Content:", "title", array(
				"value"=> $rs['title'],
				"required" => 1, 
				"placeholder" => "Title Of Content"
			)));
			$form->addElement(new Element_Textbox("Description :", "desc", array(
				"value"=> $rs['description'],
				"required" => 1, 
				"placeholder" => "Description"
				)));
		
			$form->addElement(new Element_HTML('<img src="'.DIR_WS_ADVANTAGE_PATH.$advantage_id.'/'.$rs['ad_image'].'" width="10%" height="10%"">'));
			$form->addElement(new Element_File("Image:", "image", array(
			"placeholder" => " Image"
			)));
			$form->addElement(new Element_HTML('E.g: width= 1,024px , height= 416px require jpg file'));
		
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
	//	$product_slug = pro_SeoSlug(stripslashes($_POST['product_title']));
	    $username=$_SESSION['username'];
	    $modifieddate = date("Y-m-d");
		$updimg = true;		
		$error = false;

		if(!$error){
		$updqry = ets_db_query("update advantage set 
		username = '".$username."',
		modifieddate = now(),
		 title = '".ets_db_real_escape_string($_POST['title'])."',		
           	
            description = '".addslashes($_POST['desc'])."',
          
            sortorder='".$_POST['sortorder']."',
            status = '".$_POST['status']."',
            remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where advantage_id='" .$_POST['advantage_id']."'") or die ("Updating advantage records query failed: ".ets_db_error());	
		
			$image1 = $_FILES['image']['name'];
			$a_id = $_POST['advantage_id'];
			
			if($image1 != "")
			{
				$path = DIR_FS_ADVANTAGE_PATH.$a_id.'/';
				if(!file_exists($path))
				{
                   
	               mkdir($path, 0777, true);
                   
					exec("chown ".FILEUSER.FILEUSER." ".$path);
                     
					exec("chmod 0777 ".$path);
					
				}
				@unlink($path.$_POST['prevImage']);
				$image1 = $a_id.'-'.$_FILES['image']['name'];
				if(move_uploaded_file($_FILES['image']['tmp_name'],$path.$image1))
				{
					ets_db_query("UPDATE advantage set ad_image = '".$image1."' where advantage_id = '".$a_id."'") or die(ets_db_error());
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
	var listURL = 'helperfunc/advantageList.php';
	$('#advantagelist').dataTable({
		"ajax": listURL,
	});
});

</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	

		echo '
		<div id="no-more-tables">
		<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="advantagelist" width="100%">
		<thead>
		<tr>
			<th align="left">Id</th>
			<th align="left">Title</th>
			<th align="left">Image</th>			
			<th align="left">Status</th>
			<th align="left">Sort Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot class="hidden-xs">
				<tr>
					<th align="left">Id</th>
					<th align="left">Title</th>
					<th align="left">Image</th>					
					<th align="left">Status</th>
					<th align="left">Sort Order</th>
					<th>Action</th>
				</tr>
		</tfoot>		
		 </table>
		 </div>';		
		?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"advantage"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php		
	}	
	function delete()
	{
		$image = getfldValue('advantage','advantage_id',$_GET['advantage_id'],'ad_image');
        @unlink(DIR_FS_ADVANTAGE_PATH.$image);
        $delsql = "Delete from advantage where advantage_id='".$_GET['advantage_id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		delSeoLnk($_GET['advantage_id'],"advantage");
		return true;		
	}
}
?>
