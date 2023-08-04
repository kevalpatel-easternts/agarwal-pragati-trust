<script type="text/JavaScript" src="js/ajax.js"></script>
<script> 
$(document).ready(function(){
    $('#mainpages').select2({
		placeholder: "Select a Main Page"
	});
});
function update_seo_slug(){
  var pagename = $('input[name="title"]').val();
  if(pagename != ""){
	url = "includes/get_page_slug.php?pagename="+pagename
	callAjax("page_slug_div",url);
 }else{
	document.getElementById('page_slug_div').innerHTML = "Please Enter Page Title";
}
}
function listpages(parentID){
	location.href='index.php?controller=environment&action=environment&subaction=listpage&parent='+parentID;
}
</script>
<?php
include WS_PFBC_ROOT."Form.php";

class environment
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
        $query = 'select environment_id, title, parent_id from environment ORDER BY environment_id'; 
			$result = ets_db_query($query); 
			$menu_array = array(); 
			while($row=ets_db_fetch_array($result)){ 
				$menu_array[$row['environment_id']] = $row; 
			}
			$parentid = $pgrs['parent_id'];

		$pages = '<select name="mainpages" id="mainpages"><option value="0">Main Page</option>'.display_menu_items($menu_array).'</select>';
		$templates = fill_template_array($template);
		$status = array("E" => "Enabled", "D" => "Disabled");
		$form->addElement(new Element_HTML("<legend>New environment</legend>"));
		$form->addElement(new Element_Hidden("controller", "environment"));
		$form->addElement(new Element_Hidden("action", "environment"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		/* Actual Form Fields Started */		
		$form->addElement(new Element_Textbox("Title Of Content :", "title", array(
			"required" => 1, 
			"placeholder" => "Title Of Content",
            "onkeyup" => "update_seo_slug();"
			)));
        	$form->addElement(new Element_HTML('
			<div class="control-group"><label class="control-label" for="frmedit-element-5">Page Slug:</label><div class="controls"><span id="page_slug_div"><input type="text" name="seo_slug" id="seo_slug" value="" class="select" /></span></div></div>
		'));
		
		$form->addElement(new Element_Textbox("Description :", "desc", array(
			"required" => 1, 
			"placeholder" => "Description"
			)));
		$form->addElement(new Element_File("Image:", "image", array(
		"required" => 1, 
			"placeholder" => "Image"
			)));
		$form->addElement(new Element_HTML('E.g: width= 1,024px , height= 416px require jpg file'));	
	$form->addElement(new Element_Textbox("Meta Title:", "meta_title", array(
				
				)
			));
			$form->addElement(new Element_Textbox("Meta Keyword:", "meta_keyword", array(
				
			)
			));
			$form->addElement(new Element_Textbox("Meta Description:", "meta_desc", array(
				
			)));
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
        $pg_title = addslashes($_POST['meta_title']);
		$pgkeyword = addslashes($_POST['meta_keyword']);
		$pg_desc = addslashes($_POST['meta_desc']);
		$page_slug = $_POST['seo_slug'];
		$username=$_SESSION['username'];
	//	$environment_slug = pro_SeoSlug(stripslashes($_POST['title']));
		
		
            $sql = "Insert into environment set 
            title = '".ets_db_real_escape_string($_POST['title'])."',		
           	page_slug='".$page_slug."',
            description = '".addslashes($_POST['desc'])."',
            username = '".$username."',
            createdate= now(),
            	meta_title = '".$pg_title."', 
	
		meta_keyword = '".$pgkeyword."',
		meta_desc = '".$pg_desc."',
		parent_id = '".$_POST['mainpages']."',
            sortorder='".$_POST['sortorder']."',
            status = '".$_POST['status']."',
            remote_ip ='".$_SERVER['REMOTE_ADDR']."'
            ";
            $qry = ets_db_query($sql) or die(ets_db_error().$sql);
            $environment_id = ets_db_insert_id();
          //  insSeoLnk($environment_id,ourenvironment,$environment_slug);
        	$img1 = $_FILES['image']['name'];
			
			if($img1 != "")
			{
				$path = DIR_FS_ENVIRONMENT_PATH.$environment_id.'/';
           
				
				if(!file_exists($path))
				{
					mkdir($path, 0777, true);
					exec("chown ".FILEUSER.FILEUSER." ".$path);
					exec("chmod 0777 ".$path);
					
				}
				
				$img1 = $environment_id.'-'.$_FILES['image']['name'];
                
				if(move_uploaded_file($_FILES['image']['tmp_name'],$path.$img1))
				{
                  
					ets_db_query("UPDATE environment set en_image = '".$img1."' where environment_id = '".$environment_id."'") or die(ets_db_error());
				}
			}
	insSeoLnk($environment_id,"environment",$page_slug);
            return true;
		
	}
	function editForm()
	{		
		$sql = "select * from environment where environment_id ='".$_REQUEST['environment_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
      
		if(ets_db_num_rows($qry) > 0){
             
			$rs=ets_db_fetch_array($qry);
            	$environment_id = $rs['environment_id'];
			$form = new Form("frmEdit");
			$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
			));
			    $query = 'select environment_id, title, parent_id from environment ORDER BY environment_id'; 
				$result = ets_db_query($query); 
				$menu_array = array(); 
				while($row=ets_db_fetch_array($result)){ 
					$menu_array[$row['environment_id']] = $row; 
				}
				$parentid = $rs['parent_id'];
			
			$template = $rs['page_template'];
			$pgTitle = stripslashes($rs['meta_title']);
			$pgKeyword = stripslashes($rs['meta_keyword']);
			$pgDescr = stripslashes($rs['meta_desc']);
			
			$status = array("E" => "Enabled", "D" => "Disabled");
			$pages = '<select name="mainpages" id="mainpages" class="col-sm-3"><option value="0">Main Page</option>'.display_menu_items($menu_array,$rs['parent_id']).'</select>';
			$templates = fill_template_array($template);
			
			$form->addElement(new Element_HTML("<legend>Edit Facilities</legend>"));
			$form->addElement(new Element_Hidden("controller", "environment"));
			$form->addElement(new Element_Hidden("action", "environment"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("environment_id", $_REQUEST['environment_id']));
			$form->addElement(new Element_Hidden("prevImage", $rs['en_image']));
			$form->addElement(new Element_Hidden("createdate"));
			$form->addElement(new Element_Hidden("username"));
			/* Actual Form Fields Started */
          
			$form->addElement(new Element_HTML('
				<div class="control-group"><label class="control-label" for="frmedit-element-5">Page Slug:</label><div class="controls"><span id="page_slug_div"><input type="text" name="seo_slug" id="seo_slug" value="'.$rs['page_slug'].'" class="select" readonly/></span></div></div>
			'));
        
			$form->addElement(new Element_Textbox("Title Of Content:", "title", array(
				"value"=> $rs['title'],
				"required" => 1, 
				"placeholder" => "Title Of Content",
                "onkeyup" => "update_seo_slug();"
			)));
			$form->addElement(new Element_Textbox("Description :", "desc", array(
				"value"=> $rs['description'],
				"required" => 1, 
				"placeholder" => "Description"
				)));
		
			$form->addElement(new Element_HTML('<img src="'.DIR_WS_ENVIRONMENT_PATH.$environment_id.'/'.$rs['en_image'].'" width="10%" height="10%"">'));
			$form->addElement(new Element_File("Image:", "image", array(
			"placeholder" => " Image"
			)));
			$form->addElement(new Element_HTML('E.g: width= 1,024px , height= 416px require jpg file'));
		$form->addElement(new Element_Textbox("Meta Title:", "meta_title", array(
				"value"=> stripslashes($rs['meta_keyword']),
				"class" => "input-xxlarge"
				)
			));
			$form->addElement(new Element_Textbox("Meta Keyword:", "meta_keyword", array(
				"value"=> stripslashes($rs['meta_keyword']),
				"class" => "input-xxlarge"
			)
			));
			$form->addElement(new Element_Textbox("Meta Description:", "meta_desc", array(
				"value"=> stripslashes($rs['meta_keyword']),
				"class" => "input-xxlarge"
			)));
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
        $pg_title = addslashes($_POST['meta_title']);
		$pgkeyword = addslashes($_POST['meta_keyword']);
		$pg_desc = addslashes($_POST['meta_desc']);
        	$page_slug = $_POST['seo_slug'];
	    $username=$_SESSION['username'];
	    $modifieddate = date("Y-m-d");
		$updimg = true;		
		$error = false;
//		if($_FILES["image1"]['size'] == 0 ||  $_FILES["image1"] == $_POST['prevImage']){
//			$updimg = false;
//			$upload = $_POST['prevImage'];
//		}
//		if($_FILES["image2"]['size'] == 0 ||  $_FILES["image2"] == $_POST['prevImage1']){
//			$updimg = false;
//			$upload1 = $_POST['prevImage1'];
//		}
//	
//		if($updimg){
//			@unlink(DIR_FS_PRODUCT_PATH.$_POST['prevImage']);
//			$upload = $_FILES["image1"]["name"];
//			$target_path = DIR_FS_PRODUCT_PATH.$_FILES["image1"]["name"];
//			if(!move_uploaded_file($_FILES["image1"]["tmp_name"],$target_path)){
//				$error = true;
//				echo "Error in updating staff image..";
//			}
//        }
//		if($updimg){
//			@unlink(DIR_FS_PRODUCT_PATH.$_POST['prevImage1']);
//alert("in 1");
//			$upload1 = $_FILES["image2"]["name"];
//alert("in 2");
//			$target_path = DIR_FS_PRODUCT_PATH.$_FILES["image2"]["name"];
//alert("in 3");
//			if(!move_uploaded_file($_FILES["image2"]["tmp_name"],$target_path)){
//				$error = true;
//				echo "Error in updating staff image..";
//			}
//		}
		if(!$error){
		$updqry = "update environment set 
		username = '".$username."',
		modifieddate = now(),
		 title = '".ets_db_real_escape_string($_POST['title'])."',		
           	page_slug='".$page_slug."',
            description = '".addslashes($_POST['desc'])."',
          meta_title = '".$pg_title."', 
		parent_id = '".$_POST['mainpages']."',
		meta_keyword = '".$pgkeyword."',
		meta_desc = '".$pg_desc."',
            sortorder='".$_POST['sortorder']."',
            status = '".$_POST['status']."',
            remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where environment_id='" .$_POST['environment_id']."'";	
		if(ets_db_query($updqry)){
			updSeoLnk($_POST['environment_id'],"environment",$page_slug);
			return true;
		}else{
			echo ets_db_error().$qry;
			return false;
		}
			$image1 = $_FILES['image']['name'];
			$environment_id = $_POST['environment_id'];
			
			if($image1 != "")
			{
				$path = DIR_FS_ENVIRONMENT_PATH.$environment_id.'/';
				if(!file_exists($path))
				{
					mkdir($path);
					exec("chown ".FILEUSER.FILEUSER." ".$path);
					exec("chmod 0777 ".$path);
					
				}
				@unlink($path.$_POST['prevImage']);
				$image1 = $environment_id.'-'.$_FILES['image']['name'];
				if(move_uploaded_file($_FILES['image']['tmp_name'],$path.$image1))
				{
					ets_db_query("UPDATE environment set en_image = '".$image1."' where environment_id = '".$environment_id."'") or die(ets_db_error());
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
	var listURL = 'helperfunc/environmentList.php';
	$('#environmentlist').dataTable({
		"ajax": listURL,
	});
});

</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	

		echo '
		<div id="no-more-tables">
		<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="environmentlist" width="100%">
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
		params:{"tblName":"environment"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php		
	}	
	function delete()
	{
        $pageID = $_REQUEST['id'];
		$image = getfldValue('environment','environment_id',$_GET['environment_id'],'en_image');
        @unlink(DIR_FS_ENVIRONMENT_PATH.$image);
        $delsql = "Delete from environment where environment_id='".$_GET['environment_id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
        $del_seo_qry = ets_db_query("delete from seo_link_master where module_id = '".$pageID."' and module_name = 'environment'") or die("Delete page query fail ".ets_db_error());
        $qrypage = ets_db_query("select * from environment where parent_id = '".$pageID."'") or die(ets_db_error());
		while($res = ets_db_fetch_array($qrypage)){
			$updsql = ets_db_query("update environment set parent_id = 0 where environment_id = '".$res['environment_id']."'");
		}
		delSeoLnk($_GET['environment_id'],"environment");
		return true;		
	}
}
?>