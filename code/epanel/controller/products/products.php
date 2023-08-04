<script> 
$(document).ready(function(){
    $('#mainpages').select2({
		placeholder: "Select a Main Page"
	});
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
//require_once DIR_WS_CLASSES."proUpload.php";

class products
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$pstatus = array("Ongoing" => "Ongoing", "Completed" => "Completed", "Upcoming" => "Upcoming");
		$layoutplan = array("Yes" => "Yes", "No" => "No");
		$homepage = array("N" => "No", "Y" => "Yes");
        $headermenu = array("N" => "No", "Y" => "Yes");
		$form->addElement(new Element_HTML("<legend>New Project</legend>"));
		$form->addElement(new Element_Hidden("controller", "products"));
		$form->addElement(new Element_Hidden("action", "products"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("sortorder","1"));
		$form->addElement(new Element_Hidden("status","E"));

		
		/* Actual Form Fields Started */
		$pTypeID = getproducttypelist();
		$query = 'select pTypeID, pTypeTitle, pTypeParent from producttype ORDER BY pTypeID'; 
		$result = ets_db_query($query); 
		$menu_array = array(); 
		while($row=ets_db_fetch_array($result)){ 
			$menu_array[$row['pTypeID']] = $row; 
		}
	
		$typeParents = '<select name="pTypeID" id="mainpages" class="span3"><option value="0">Project Type Parent</option>'.display_parent_items($menu_array,'pTypeParent','pTypeID','pTypeTitle',$_REQUEST['pTypeID']).'</select>';
	
		
		$form->addElement(new Element_HTML('
			<div class="control-group"><label class="control-label" for="frmedit-element-5">Type Parent:</label><div class="controls">'.$typeParents.'</div></div>
		'));
		
		$form->addElement(new Element_Textbox("Project Name:", "productTitle", array(
				"required" => 1,
				"placeholder" => "Project Name"
				)));
		$form->addElement(new Element_Textbox("Type Title:", "producttypeTitle", array(
				"required" => 1,
				"placeholder" => "Type Title"
				)));
		
		$form->addElement(new Element_Select("Project Status:", "productStatus", $pstatus, array(
			"required" => 1
			)));
		$form->addElement(new Element_TinyMCE("Project Description:", "productDescr", array(
				"required" => 1,
				"placeholder" => "Project Description"
				)));
			
		$form->addElement(new Element_Textbox("Booking Status:", "productBS", array(
				
				"placeholder" => "Booking Status"
				)));
		$form->addElement(new Element_Textbox("Project Area:", "productArea", array(
				
				"placeholder" => "Project Area"
				)));
		$form->addElement(new Element_Textbox("Project Units:", "productUnits", array(
				
				"placeholder" => "Project Units"
				)));
		$form->addElement(new Element_Textbox("Contact Person:", "ContactPerson", array(
				
				"placeholder" => "Contact Person"
				)));
		$form->addElement(new Element_Select("Project Layout Plans:", "productPlans", $layoutplan, array(
		
			)));
			
		$form->addElement(new Element_TinyMCE("Project Amenities:", "productAbout", array(
				"placeholder" => "Project Amenities"
				)));
		$form->addElement(new Element_TinyMCE("Project Specification:", "productSpecification", array(
				"placeholder" => "Project Specification"
				)));
		$form->addElement(new Element_File("Project Location:", "productLocation", array(
				"placeholder" => "Project Location"
				)));
        $form->addElement(new Element_File("Project Location Thumbnail:", "productLocation1", array(
				"placeholder" => "Project Location"
				)));
        
        $form->addElement(new Element_Textbox(" Project Map: (Link)", "productMap", array(
				"placeholder" => "Project Map: (Link)"
        )));
        
		$form->addElement(new Element_File("Project Thumbnail:", "productThumbnail", array(
			"placeholder" => "Project Thumbnail"
			)));
		$form->addElement(new Element_File("Brochure File:", "productBrochure", array(
			"placeholder" => "Brochure File"
			)));
        $form->addElement(new Element_File("Parallax Image:", "parallaximage", array(
			"placeholder" => "Parallax Image",
            "required" => 1
			)));
		$form->addElement(new Element_TinyMCE("Parallax Description:", "parallaxdesc", array(
				"placeholder" => "Project Specification"
				)));
		 $hasform = array("Yes" => "Yes", "No" => "No");
		$form->addElement(new Element_Select("Has Form:", "hasForm",$hasform, array(
			//"required" => 1
			)));
		$form->addElement(new Element_Textarea("Project Video:", "productVideo", array(
				"placeholder" => "Project Video Share Code"
				)));										
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1,
			"placeholder" => "Sortorder"	
			)));
        $form->addElement(new Element_Textbox("Home Page Sort Order:", "homesortorder", array(
			"required" => 1,
			"placeholder" => "Home Page Sort Order"	
			)));
		$form->addElement(new Element_Select("Set Home Page:", "homepage", $homepage, array(
			"required" => 1, 
			)));
        $form->addElement(new Element_Select("Set in Menu:", "menu", $headermenu, array(
			"required" => 1, 
			)));
		$form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1
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
		$username = $_SESSION['fname'];
		$createdate = date("Y-m-d");
		
		$product_slug = pro_SeoSlug(stripslashes($_POST['productTitle']));
		
		echo $sql = "Insert into products set 
		username = '".$username."',
		createdate = now(),
		modifieddate = now(),
		productTitle = '".ets_db_real_escape_string($_POST['productTitle'])."',
		productsUrl = '".ets_db_real_escape_string($_POST['productsUrl'])."',
		productDescr = '".ets_db_real_escape_string($_POST['productDescr'])."',
		productAbout = '".ets_db_real_escape_string($_POST['productAbout'])."',
		productSpecification = '".ets_db_real_escape_string($_POST['productSpecification'])."',
        parallaxdesc = '".ets_db_real_escape_string($_POST['parallaxdesc'])."',
		producttypeTitle = '".ets_db_real_escape_string($_POST['producttypeTitle'])."',
		productStatus = '".$_POST['productStatus']."',
		pTypeID = '".$_POST['pTypeID']."',
		productBS = '".ets_db_real_escape_string($_POST['productBS'])."',
		productArea = '".ets_db_real_escape_string($_POST['productArea'])."',
		productUnits = '".ets_db_real_escape_string($_POST['productUnits'])."',
		ContactPerson = '".ets_db_real_escape_string($_POST['ContactPerson'])."',
		productPlans = '".ets_db_real_escape_string($_POST['productPlans'])."',
		productMap = '".ets_db_real_escape_string($_POST['productMap'])."',
		productBrochure = '".$_FILES["productBrochure"]["name"]."',
		productLocation = '".$_FILES["productLocation"]["name"]."',	
        productLocationThumbnail = '".$_FILES["productLocation1"]["name"]."',	

		productThumbnail = '".$_FILES["productThumbnail"]["name"]."',	
        	parallaximage = '".$_FILES["parallaximage"]["name"]."',	
		productVideo = '".ets_db_real_escape_string($_POST['productVideo'])."',
		homepage = '".$_POST['homepage']."',
		sortorder = '".$_POST['sortorder']."',
		homesortorder = '".$_POST['homesortorder']."',
		status = '".$_POST['status']."',
        menu = '".$_POST['menu']."',
		hasForm = '".$_POST['hasForm']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		if(ets_db_query($sql)){
			$productID = ets_db_insert_id();
			
			$path = DIR_FS_PROJECT_PATH.$productID.'/';
			if(!file_exists($path))	{
				mkdir($path);
				exec("chown ".FILEUSER.FILEUSER." ".$path);
				exec("chmod 0777 ".$path);
			}
	
			$targetl_path = DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["productLocation"]["name"]; 
			move_uploaded_file($_FILES["productLocation"]["tmp_name"],$targetl_path);
            
	
			
			//$image = new ImageUploader\ProUpload;
			
			$filename = $_FILES["productLocation"]["name"];
           
            		$targetl_path = DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["productLocation1"]["name"]; 
			move_uploaded_file($_FILES["productLocation1"]["tmp_name"],$targetl_path);
            $filename1 = $_FILES["productLocation"]["name"];
			$target_path = DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["productBrochure"]["name"]; 
			move_uploaded_file($_FILES["productBrochure"]["tmp_name"],$target_path);
			
			$targetthumb_path = DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["productThumbnail"]["name"]; 
			move_uploaded_file($_FILES["productThumbnail"]["tmp_name"],$targetthumb_path);
			
            $target_path1 = DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["parallaximage"]["name"]; 
			move_uploaded_file($_FILES["parallaximage"]["tmp_name"],$target_path1);
             $filename2 = $_FILES["parallaximage"]["name"];
            
			$typeParent = getproducttypeParent($_POST['pTypeID']);
			if( $typeParent > 0){
				$parent = getfldValue('producttype','pTypeID',$typeParent,'pTypeTitle');
				$seo_mod = "projects"."/".strtolower(str_replace(" ","-",$parent))."/".strtolower(str_replace(" ","-",getfldValue("producttype","pTypeID",$_POST['pTypeID'],"pTypeTitle")));
			}else{
				$seo_mod = "projects"."/".strtolower(str_replace(" ","-",getfldValue("producttype","pTypeID",$_POST['pTypeID'],"pTypeTitle")));
			}
			$seo_mod = str_replace("---","-", $seo_mod);
			insSeoLnk($productID,$seo_mod,$product_slug);
			return true;
		}else{
			echo "Error in Inserting Project..";
		}
		
	}
	function editForm()
	{		
		$sql = "select * from  products where productID ='".$_REQUEST['productID']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("editForm");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$pstatus = array("Ongoing" => "Ongoing", "Completed" => "Completed", "Upcoming" => "Upcoming");
			$layoutplan = array("Yes" => "Yes", "No" => "No");
			$hasform = array("Yes" => "Yes", "No" => "No");
			$homepage = array("N" => "No", "Y" => "Yes");
            $headermenu = array("N" => "No", "Y" => "Yes");
			$form->addElement(new Element_HTML("<legend>Edit Project</legend>"));
			$form->addElement(new Element_Hidden("controller", "products"));
			$form->addElement(new Element_Hidden("action", "products"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("productID",$_REQUEST['productID']));
			//$form->addElement(new Element_Hidden("pTypeID",$_REQUEST['pTypeID']));
			$form->addElement(new Element_Hidden("prevImage", $rs['productImage']));
			
			

			/* Actual Form Fields Started */
			$pTypeID = getproducttypelist();
		$query = 'select pTypeID, pTypeTitle, pTypeParent from producttype ORDER BY pTypeID'; 
		$result = ets_db_query($query); 
		$menu_array = array(); 
		while($row=ets_db_fetch_array($result)){ 
			$menu_array[$row['pTypeID']] = $row; 
		}
	
		$typeParents = '<select name="pTypeID" id="mainpages" class="span3"><option value="0">Project Type Parent</option>'.display_parent_items($menu_array,'pTypeParent','pTypeID','pTypeTitle',$_REQUEST['pTypeID']).'</select>';
		
		$form->addElement(new Element_HTML('
			<div class="control-group"><label class="control-label" for="frmedit-element-5">Type Parent:</label><div class="controls">'.$typeParents.'</div></div>
		'));	
		
			$form->addElement(new Element_Textbox("Project Name:", "productTitle", array(
					"required" => 1,
					"value" => stripcslashes($rs['productTitle'])
					)));
			$form->addElement(new Element_Textbox("Type Title:", "producttypeTitle", array(
				"required" => 1,
				"value" => $rs['productTypeTitle']
				)));
			$form->addElement(new Element_Select("Project Status:", "productStatus", $pstatus, array(
				"required" => 1,
				"value" => $rs['productStatus']
				)));
			$form->addElement(new Element_TinyMCE("Project Description:", "productDescr", array(
					"required" => 1,
					"value" => stripcslashes($rs['productDescr'])
					)));
			$form->addElement(new Element_Textbox("Booking Status:", "productBS", array(
				
				"value" => $rs['productBS']	
				)));
			$form->addElement(new Element_Textbox("Project Area:", "productArea", array(
					"value" => stripcslashes($rs['productArea'])	
				)));
			$form->addElement(new Element_Textbox("Project Units:", "productUnits", array(
					"value" => stripcslashes($rs['productUnits'])	
				)));
			$form->addElement(new Element_Textbox("Contact Person:", "ContactPerson", array(
					"value" => stripcslashes($rs['ContactPerson'])	
				)));	
				$form->addElement(new Element_TinyMCE("Parallax Description:", "parallaxdesc", array(	
                    	"required" => 1,
                    	"value" => stripcslashes($rs['parallaxdesc'])	
				)));	
			$form->addElement(new Element_TinyMCE("Project Amenities:", "productAbout", array(
					"value" => stripcslashes($rs['productAbout'])
				)));
			$form->addElement(new Element_TinyMCE("Project Specification:", "productSpecification", array(
					"value" => stripcslashes($rs['productSpecification'])
				)));
			$form->addElement(new Element_Select("Project Layout Plans:", "productPlans", $layoutplan, array(
				"value" => $rs['productPlans']
				)));
			if($rs["productThumbnail"] != ""){
				$location_path = DIR_WS_PROJECT_PATH.$_REQUEST['productID'].'/'.$rs["productThumbnail"];
				$form->addElement(new Element_HTML('<a href="'.$location_path.'" target="_blank">View Location</a>'));
				$form->addElement(new Element_Hidden("OldproductThumbnail",$rs["productThumbnail"]));
			}
			
			$form->addElement(new Element_File("Project Thumbnail:", "productThumbnail", array(
			"placeholder" => "Project Thumbnail"
			)));
            if($rs["productLocationThumbnail"] != ""){
				$location_path = DIR_WS_PROJECT_PATH.$_REQUEST['productID'].'/'.$rs["productLocationThumbnail"];
				$form->addElement(new Element_HTML('<a href="'.$location_path.'" target="_blank">View Location</a>'));
				$form->addElement(new Element_Hidden("OldproductLocation1",$rs["productLocationThumbnail"]));
			}
			
			$form->addElement(new Element_File("Project Location Thumbnail:", "productLocation1", array(
			"placeholder" => "Project Location"
			)));
			if($rs["parallaximage"] != "")
			{
				$thumbnail_path = DIR_WS_PROJECT_PATH.$_REQUEST['productID'].'/'.$rs["parallaximage"];
				$form->addElement(new Element_HTML('<a href="'.$thumbnail_path.'" target="_blank">View Thumbnail</a>'));
				$form->addElement(new Element_Hidden("OldparallaxThumbnail",$rs["parallaximage"]));
			}
			$form->addElement(new Element_File("Parallax Image:", "parallaximage", array(
			"placeholder" => "Parallax Image"
			)));
			 if($rs["productLocationThumbnail"] != ""){
				$location_path = DIR_WS_PROJECT_PATH.$_REQUEST['productID'].'/'.$rs["productLocationThumbnail"];
				$form->addElement(new Element_HTML('<a href="'.$location_path.'" target="_blank">View Location</a>'));
				$form->addElement(new Element_Hidden("Oldparallaximage",$rs["productLocationThumbnail"]));
			}
			
			$form->addElement(new Element_File("Project Location Thumbnail:", "productLocation1", array(
			"placeholder" => "Project Location"
			)));
            
              $form->addElement(new Element_Textbox(" Project Map: (Link)", "productMap", array(
				"placeholder" => "Project Map: (Link)",
                "value" => $rs['productMap']
              )));
            
			if($rs["productBrochure"] != ""){
				$brochure_path = DIR_WS_PROJECT_PATH.$_REQUEST['productID'].'/'.$rs["productBrochure"];
				$form->addElement(new Element_HTML('<a href="'.$brochure_path.'" target="_blank">View Brochure</a>'));
				$form->addElement(new Element_Hidden("OldproductBrochure",$rs["productBrochure"]));
			}
			$form->addElement(new Element_File("Brochure File:", "productBrochure", array(
			"placeholder" => "productBrochure"
			)));
			$form->addElement(new Element_Select("Has Form:", "hasForm", $hasform, array(
				
				"value" => $rs['hasForm']
				)));
			$form->addElement(new Element_Textarea("Project Video:", "productVideo", array(
				"value" => stripcslashes($rs['productVideo'])
				)));	
							
			$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
				"required" => 1,
				"value" => $rs['sortorder']	
				)));	
            
			$form->addElement(new Element_Select("Set Home Page:", "homepage", $homepage, array(
			"value"=> $rs['homepage'],
			"required" => 1, 
			)));
            $form->addElement(new Element_Textbox("Home Page Sort Order:", "homesortorder", array(
			"required" => 1,
			"placeholder" => "Home Page Sort Order"	,
            "value"=> $rs['homesortorder']
                
			)));
            $form->addElement(new Element_Select("Set in Menu:", "menu", $headermenu, array(
            "value"=> $rs['menu'],
			"required" => 1, 
			)));	
			$form->addElement(new Element_Select("Status:", "status", $status, array(
				"required" => 1,
				"value" => $rs['status']
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
	    
		$username = $_SESSION['fname'];
		$createdate = date("Y-m-d");
		if($_FILES['productLocation']['name']==''){
			$lfilename = $_POST['OldproductLocation'];
		}else{
			$lfilename = $_FILES['productLocation']['name'];
		}
        if($_FILES['productLocation1']['name']==''){
			$lfilename1 = $_POST['OldproductLocation1'];
		}else{
			$lfilename1 = $_FILES['productLocation1']['name'];
		}
        if($_FILES['parallaximage']['name']==''){
			$lfilename2 = $_POST['OldparallaxThumbnail'];
		}else{
			$lfilename2 = $_FILES['parallaximage']['name'];
		}
		if($_FILES['productBrochure']['name']==''){
			$filename = $_POST['OldproductBrochure'];
		}else{
			$filename = $_FILES['productBrochure']['name'];
		}
		if($_FILES['productThumbnail']['name']==''){
			$tfilename = $_POST['OldproductThumbnail'];
		}else{
			$tfilename = $_FILES['productThumbnail']['name'];
		}
		$product_slug = pro_SeoSlug(stripslashes($_POST['productTitle']));
		$sql = "update products set 
		username = '".$username."',
		createdate = now(),
		productTitle = '".ets_db_real_escape_string($_POST['productTitle'])."',
		productsUrl = '".ets_db_real_escape_string($_POST['productsUrl'])."',
		producttypeTitle = '".ets_db_real_escape_string($_POST['producttypeTitle'])."',
		productDescr = '".ets_db_real_escape_string($_POST['productDescr'])."',
		productAbout = '".ets_db_real_escape_string($_POST['productAbout'])."',
		productSpecification = '".ets_db_real_escape_string($_POST['productSpecification'])."',
        parallaxdesc = '".ets_db_real_escape_string($_POST['parallaxdesc'])."',
		productStatus = '".$_POST['productStatus']."',
		pTypeID = '".$_POST['pTypeID']."',
		productBS = '".ets_db_real_escape_string($_POST['productBS'])."',
		productArea = '".ets_db_real_escape_string($_POST['productArea'])."',
		productUnits = '".ets_db_real_escape_string($_POST['productUnits'])."',
		ContactPerson = '".ets_db_real_escape_string($_POST['ContactPerson'])."',
		productPlans = '".ets_db_real_escape_string($_POST['productPlans'])."',
		productMap = '".ets_db_real_escape_string($_POST['productMap'])."',
        parallaximage = '".$lfilename2."',	
		productBrochure = '".$filename."',
		productThumbnail = '".$tfilename."',
		productLocation = '".$lfilename."',
        productLocationThumbnail = '".$lfilename1."',
		productVideo = '".ets_db_real_escape_string($_POST['productVideo'])."',
		homepage = '".$_POST['homepage']."',
		menu = '".$_POST['menu']."',
		sortorder = '".$_POST['sortorder']."',
		homesortorder = '".$_POST['homesortorder']."',
		hasForm = '".$_POST['hasForm']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where productID = '".$_POST['productID']."'
		";
    
    
		if(ets_db_query($sql)){
			
			
			$productID = $_POST['productID'];
			$path = DIR_FS_PROJECT_PATH.$productID.'/';
			if(!file_exists($path))	{
				mkdir($path);
				exec("chown ".FILEUSER.FILEUSER." ".$path);
				exec("chmod 0777 ".$path);
			}
			if($_FILES['productLocation']['name']!=''){
				echo $target_path = DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["productLocation"]["name"]; 
				move_uploaded_file($_FILES["productLocation"]["tmp_name"],$target_path);
				
				//$image = new ImageUploader\ProUpload;
			
				$filename = $_FILES["productLocation"]["name"];
				/*
				if(!empty($filename))
				{
					$mresult = $image->shrink(array("height"=>480, "width"=>480),true)
	    				->makecopy('shrink',$target_path,DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["productLocation"]["name"].'_mobile.jpg');
	    		}
	    		* */
				
			}
            if($_FILES['parallaximage']['name']!=''){
				echo $target_path = DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["parallaximage"]["name"]; 
				move_uploaded_file($_FILES["parallaximage"]["tmp_name"],$target_path);
				
				//$image = new ImageUploader\ProUpload;
			
				$filename2 = $_FILES["parallaximage"]["name"];

				
			}
            if($_FILES['productLocation1']['name']!=''){
				echo $target_path = DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["productLocation1"]["name"]; 
				move_uploaded_file($_FILES["productLocation1"]["tmp_name"],$target_path);
				
				//$image = new ImageUploader\ProUpload;
			
				$filename1 = $_FILES["productLocation1"]["name"];
				/*
				if(!empty($filename))
				{
					$mresult = $image->shrink(array("height"=>480, "width"=>480),true)
	    				->makecopy('shrink',$target_path,DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["productLocation"]["name"].'_mobile.jpg');
	    		}
	    		* */
				
	}
			if($_FILES['productBrochure']['name']!=''){
				$target_path1 = DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["productBrochure"]["name"]; 
				move_uploaded_file($_FILES["productBrochure"]["tmp_name"],$target_path1);
			}
		   if($_FILES['productThumbnail']['name']!=''){
				$thumbtarget_path = DIR_FS_PROJECT_PATH.$productID.'/'.$_FILES["productThumbnail"]["name"]; 
				move_uploaded_file($_FILES["productThumbnail"]["tmp_name"],$thumbtarget_path);
			}
			$typeParent = pro_SeoSlug(getproducttypeTitle($_POST['pTypeID']));
			$seo_mod = getSeoModule($typeParent,$_POST['pTypeID'])."/".$typeParent;
			/*
			if( $typeParent > 0){
				$parent = getfldValue('producttype','pTypeID',$typeParent,'pTypeTitle');
				$seo_mod = "projects"."/".strtolower(str_replace(" ","-",$parent))."/".strtolower(str_replace(" ","-",getfldValue("producttype","pTypeID",$_POST['pTypeID'],"pTypeTitle")));
			}else{
				$seo_mod = "projects"."/".strtolower(str_replace(" ","-",getfldValue("producttype","pTypeID",$_POST['pTypeID'],"pTypeTitle")));
			}
			*/
			$seo_mod = str_replace("---","-", $seo_mod);
			updSeoLnk($productID,$seo_mod,$product_slug);
			
			return true;
		}else{
			echo "Error in updating project..";
		}
		
	}	
	function listData(){
?>
	<script>
	$(document).ready(function() {
		var listURL = "helperfunc/productsList.php?pTypeID=<?php echo $_REQUEST['pTypeID']; ?>";
		var oTable = $('#productslist').dataTable({
			"ajax": listURL
		});
		//$(window).bind('resize', function () {  oTable.fnAdjustColumnSizing();  });
		$('.esortorder').editable({params:{"tblName":"products"}});
	});
	</script>
<?php
	$subvar = 'onclick="return confirmSubmit();"';
	echo '
	<table class="table table-striped table-bordered dataTable" id="productslist" style="width:100%;">
		<thead>
		<tr>
			<th>Id</th>
			<th>Type</th>
			<th>Name</th>
			<th>Project Status</th>
			<th width="60">Status</th>
			<th width="60">SortOrder</th>
			<th width="150">Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>	
		<tr>
			<th>Id</th>
			<th>Type</th>
			<th>Name</th>
			<th>Project Status</th>
			<th>Status</th>
			<th>SortOrder</th>
			<th>Action</th>
		</tr>
		</tfoot>
	</table>';	
?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"products"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php	
	}
	function delete()
	{
		$delsql = "Delete from products where productID = '".$_GET['productID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		$typeParent = pro_SeoSlug(getproducttypeTitle($_GET['pTypeID']));
		$seo_mod = getSeoModule($typeParent,$_GET['pTypeID'])."/".$typeParent;
		
		
		delSeoLnk($_GET['productID'], $seo_mod);
		return true;		
	}	
}
?>
