<script>
$(document).ready(function(){
			  flag = 0;
	          $('input').on('blur', function() {      
				if ($("#projectFrm").valid() && flag == 0) {
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
<script> 
$(document).ready(function(){
    $('#mainpages').select2({
		placeholder: "Select a Main Page"
	});
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
include(DIR_WS_CLASSES."resize-class.php");

class projects
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "projectFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$pstatus = array("Ongoing" => "Ongoing", "Completed" => "Completed", "Upcoming" => "Upcoming");
		$layoutplan = array("Yes" => "Yes", "No" => "No");
		$hasform = array("Yes" => "Yes", "No" => "No");
		$haswhy = array("No" => "No", "Yes" => "Yes");
		
		$form->addElement(new Element_HTML("<legend>New Project</legend>"));
		$form->addElement(new Element_Hidden("controller", "projects"));
		$form->addElement(new Element_Hidden("action", "projects"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("sortorder","1"));
		$form->addElement(new Element_Hidden("status","E"));

		
		/* Actual Form Fields Started */
		$pTypeID = getproject_typelist();
		$query = 'select pTypeID, pTypeTitle, pTypeParent from project_type ORDER BY pTypeID'; 
		$result = ets_db_query($query); 
		$menu_array = array(); 
		while($row=ets_db_fetch_array($result)){ 
			
			$menu_array[$row['pTypeID']] = $row; 
		}
		
		$typeParents = '<select name="pTypeID" id="mainpages" class="span3"><option value="0">Project Type Parent</option>'.display_parent_items($menu_array,'pTypeParent','pTypeID','pTypeTitle').'</select>';
	
		
		$form->addElement(new Element_HTML('
			<div class="control-group"><label class="control-label" for="frmedit-element-5">Type Parent:</label><div class="controls">'.$typeParents.'</div></div>
		'));
		
		$form->addElement(new Element_Textbox("Project Name:", "projectTitle", array(
				"required" => 1,
				"placeholder" => "Project Name"
				)));
		
	
		$form->addElement(new Element_TinyMCE("Project Description:", "projectDescr", array(
				"required" => 1,
				"placeholder" => "Project Description"
				)));
				
		
		$form->addElement(new Element_TinyMCE("Parallax Description:", "mainFeatures", array(
				"placeholder" => "Parallax Description"
		)));
		
		
		$form->addElement(new Element_File("Project Location:", "projectLocation", array(
				"placeholder" => "Project Location"
				)));
		$form->addElement(new Element_File("Project Thumbnail:", "projectThumbnail", array(
			"placeholder" => "Project Thumbnail"
			)));
		$form->addElement(new Element_File("Project Parallax:", "projectParallax", array(
			"placeholder" => "Project Parallax"
			)));
			
		
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('projects').'</label><br><br>'));								
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1,
			"placeholder" => "Sortorder"	
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
		
		$project_slug = pro_SeoSlug(stripslashes($_POST['projectTitle']));
		
		$sql = "Insert into projects set 
		username = '".$username."',
		createdate = now(),
		projectTitle = '".ets_db_real_escape_string($_POST['projectTitle'])."',
		projectsUrl = '".ets_db_real_escape_string($_POST['projectsUrl'])."',
		projectDescr = '".ets_db_real_escape_string($_POST['projectDescr'])."',
		projectStatus = '".$_POST['projectStatus']."',
		pTypeID = '".$_POST['pTypeID']."',
		projectBS = '".ets_db_real_escape_string($_POST['projectBS'])."',
		projectArea = '".ets_db_real_escape_string($_POST['projectArea'])."',
		projectUnits = '".ets_db_real_escape_string($_POST['projectUnits'])."',
		projectPlans = '".ets_db_real_escape_string($_POST['projectPlans'])."',
		projectVideo = '".ets_db_real_escape_string($_POST['projectVideo'])."',
		hasWhy = '".ets_db_real_escape_string($_POST['hasWhy'])."',
		hasmainFeatures = '".ets_db_real_escape_string($_POST['hasmainFeatures'])."',
		hasexclusiveServices = '".ets_db_real_escape_string($_POST['hasexclusiveServices'])."',
		projectWhy = '".ets_db_real_escape_string($_POST['projectWhy'])."',
		parallaxDescr = '".ets_db_real_escape_string($_POST['mainFeatures'])."',
		mobilemainfeatures = '".ets_db_real_escape_string($_POST['mobilemainfeatures'])."',
		exclusiveServices = '".ets_db_real_escape_string($_POST['exclusiveServices'])."',
		mobileexclusiveservices = '".ets_db_real_escape_string($_POST['mobileexclusiveservices'])."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		hasForm = '".$_POST['hasForm']."',
		hasmasterplan = '".$_POST['hasmasterplan']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		if(ets_db_query($sql)){
			$projectID = ets_db_insert_id();
			
			$path = DIR_FS_PROJECT_PATH.$projectID.'/';
			if(!file_exists($path))
				{
					mkdir($path);
					exec("chown ".FILEUSER.FILEUSER." ".$path);
					exec("chmod 0777 ".$path);
					
				}
			
			
			$targetl_path = DIR_FS_PROJECT_PATH.$projectID.'/'.$_FILES["projectLocation"]["name"]; 
			move_uploaded_file($_FILES["projectLocation"]["tmp_name"],$targetl_path);
			$image = new ImageUploader\ProUpload;
			
			$filename = $projectID.'-'.$_FILES["projectLocation"]["name"];
			
			if(!empty($_FILES["projectLocation"]["name"]))
			{
				$mresult = $image->shrink(array("height"=>480, "width"=>480),true)
    				->makecopy('shrink',$targetl_path,DIR_FS_PROJECT_PATH.$projectID.'/'.$projectID.'-'.$_FILES["projectLocation"]["name"].'_mobile.jpg');
    		}
			
			$target_path = DIR_FS_PROJECT_PATH.$projectID.'/'.$projectID.'-'.$_FILES["projectParallax"]["name"]; 
			move_uploaded_file($_FILES["projectParallax"]["tmp_name"],$target_path);
			
			$target_path = DIR_FS_PROJECT_PATH.$projectID.'/'.$projectID.'-'.$_FILES["conceptPresentation"]["name"]; 
			move_uploaded_file($_FILES["conceptPresentation"]["tmp_name"],$target_path);
			
			$targetthumb_path = DIR_FS_PROJECT_PATH.$projectID.'/'.$projectID.'-'.$_FILES["projectThumbnail"]["name"]; 
			move_uploaded_file($_FILES["projectThumbnail"]["tmp_name"],$targetthumb_path);
			
			$updqry = "Update projects set
			projectParallax = '".$projectID.'-'.$_FILES["projectParallax"]["name"]."',
			conceptPresentation = '".$projectID.'-'.$_FILES["conceptPresentation"]["name"]."',
			projectLocation = '".$projectID.'-'.$_FILES["projectLocation"]["name"]."',	
			projectThumbnail = '".$projectID.'-'.$_FILES["projectThumbnail"]["name"]."'
			where projectID = '".$projectID."'";
			
			$typeParent = getproject_typeParent($_POST['pTypeID']);
			if( $typeParent > 0){
				$parent = getfldValue('project_type','pTypeID',$typeParent,'pTypeTitle');
				$seo_mod = "projects"."/".strtolower(str_replace(" ","-",$parent))."/".strtolower(str_replace(" ","-",getfldValue("project_type","pTypeID",$_POST['pTypeID'],"pTypeTitle")));
			}else{
				$seo_mod = "projects"."/".strtolower(str_replace(" ","-",getfldValue("project_type","pTypeID",$_POST['pTypeID'],"pTypeTitle")));
			}
			$seo_mod = str_replace("---","-", $seo_mod);
			insSeoLnk($projectID,$seo_mod,$project_slug);
			return true;
		}else{
			echo "Error in Inserting Project..";
			die(ets_db_error());
		}
		
	}
	function editForm()
	{		
		$sql = "select * from  projects where projectID ='".$_REQUEST['projectID']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("editForm");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "projectFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$pstatus = array("Ongoing" => "Ongoing", "Completed" => "Completed", "Upcoming" => "Upcoming");
			$layoutplan = array("Yes" => "Yes", "No" => "No");
			$hasform = array("Yes" => "Yes", "No" => "No");
			$haswhy = array("No" => "No", "Yes" => "Yes");
			
			$form->addElement(new Element_HTML("<legend>Edit Project</legend>"));
			$form->addElement(new Element_Hidden("controller", "projects"));
			$form->addElement(new Element_Hidden("action", "projects"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("projectID",$_REQUEST['projectID']));
			$form->addElement(new Element_Hidden("prevImage", $rs['projectImage']));
			
			

			/* Actual Form Fields Started */
			$pTypeID = getproject_typelist();
		$query = 'select pTypeID, pTypeTitle, pTypeParent from project_type ORDER BY pTypeID'; 
		$result = ets_db_query($query); 
		$menu_array = array(); 
		while($row=ets_db_fetch_array($result)){ 
			
			$menu_array[$row['pTypeID']] = $row; 
		}
	
		$typeParents = '<select name="pTypeID" id="mainpages" class="span3"><option value="0">Project Type Parent</option>'.display_parent_items($menu_array,'pTypeParent','pTypeID','pTypeTitle',$_REQUEST['pTypeID']).'</select>';
		
		$form->addElement(new Element_HTML('
			<div class="control-group"><label class="control-label" for="frmedit-element-5">Type Parent:</label><div class="controls">'.$typeParents.'</div></div>
		'));	
		
			$form->addElement(new Element_Textbox("Project Name:", "projectTitle", array(
					"required" => 1,
					"value" => stripcslashes($rs['projectTitle'])
					)));
			
		
			$form->addElement(new Element_TinyMCE("Project Description:", "projectDescr", array(
					"required" => 1,
					"value" => stripcslashes($rs['projectDescr'])
					)));
					
			
			$form->addElement(new Element_TinyMCE("Parallax Description:", "mainFeatures", array(
					"placeholder" => "Parallax Description",
					"value" => stripcslashes($rs['parallaxDescr'])
			)));
			
			if($rs["projectLocation"] != ""){
				$location_path = DIR_WS_PROJECT_PATH.$_REQUEST['projectID'].'/'.$rs["projectLocation"];
				$form->addElement(new Element_HTML('<a href="'.$location_path.'" target="_blank">View Location</a>'));
				$form->addElement(new Element_Hidden("OldprojectLocation",$rs["projectLocation"]));
			}
			
			$form->addElement(new Element_File("Project Location:", "projectLocation", array(
			"placeholder" => "Project Location"
			)));
			if($rs["projectThumbnail"] != "")
			{
				$thumbnail_path = DIR_WS_PROJECT_PATH.$_REQUEST['projectID'].'/'.$rs["projectThumbnail"];
				$form->addElement(new Element_HTML('<a href="'.$thumbnail_path.'" target="_blank">View Thumbnail</a>'));
				$form->addElement(new Element_Hidden("OldprojectThumbnail",$rs["projectThumbnail"]));
			}
			$form->addElement(new Element_File("Project Thumbnail:", "projectThumbnail", array(
			"placeholder" => "Project Thumbnail"
			)));
			
			if($rs["projectParallax"] != ""){
				$brochure_path = DIR_WS_PROJECT_PATH.$_REQUEST['projectID'].'/'.$rs["projectParallax"];
				$form->addElement(new Element_HTML('<a href="'.$brochure_path.'" target="_blank">View projectParallax</a>'));
				$form->addElement(new Element_Hidden("OldprojectParallax",$rs["projectParallax"]));
			}
			$form->addElement(new Element_File("Project Parallax:", "projectParallax", array(
			"placeholder" => "Project Parallax"
			)));
			
			if($rs["conceptPresentation"] != ""){
				$presentation_path = DIR_WS_PROJECT_PATH.$_REQUEST['projectID'].'/'.$rs["conceptPresentation"];
				$form->addElement(new Element_HTML('<a href="'.$presentation_path.'" target="_blank">View Concept Presentation</a>'));
				$form->addElement(new Element_Hidden("OldconceptPresentation",$rs["conceptPresentation"]));
			}
			
			$form->addElement(new Element_File("Concept Presentation:", "conceptPresentation", array(
				"placeholder" => "Concept Presentation"
			)));
			
			
			
			
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('projects').'</label><br><br>'));										
			$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
				"required" => 1,
				"value" => $rs['sortorder']	
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
	    $projectID = $_POST['projectID'];	
		$username = $_SESSION['fname'];
		$createdate = date("Y-m-d");
		/* Location File */
		if($_FILES['projectLocation']['name']==''){
			$lfilename = $_POST['OldprojectLocation'];
		}else{
			$lfilename = $projectID.'-'.$_FILES['projectLocation']['name'];
		}
		/* Brochure File */
		if($_FILES['projectParallax']['name']==''){
			$filename = $_POST['OldprojectParallax'];
		}else{
			$filename = $projectID.'-'.$_FILES['projectParallax']['name'];
		}
		
		/* Concept File */
		if($_FILES['conceptPresentation']['name']==''){
			$cfilename = $_POST['OldconceptPresentation'];
		}else{
			$cfilename = $projectID.'-'.$_FILES['conceptPresentation']['name'];
		}
		
		/* Thumbnail Image */
		if($_FILES['projectThumbnail']['name']==''){
			$tfilename = $_POST['OldprojectThumbnail'];
		}else{
			$tfilename = $projectID.'-'.$_FILES['projectThumbnail']['name'];
		}
	
		$project_slug = pro_SeoSlug(stripslashes($_POST['projectTitle']));
		$sql = "update projects set 
		username = '".$username."',
		createdate = now(),
		projectTitle = '".ets_db_real_escape_string($_POST['projectTitle'])."',
		projectsUrl = '".ets_db_real_escape_string($_POST['projectsUrl'])."',
		
		projectDescr = '".ets_db_real_escape_string($_POST['projectDescr'])."',
		projectStatus = '".$_POST['projectStatus']."',
		pTypeID = '".$_POST['pTypeID']."',
		projectBS = '".ets_db_real_escape_string($_POST['projectBS'])."',
		projectArea = '".ets_db_real_escape_string($_POST['projectArea'])."',
		projectUnits = '".ets_db_real_escape_string($_POST['projectUnits'])."',
		projectPlans = '".ets_db_real_escape_string($_POST['projectPlans'])."',
		projectParallax = '".$filename."',
		conceptPresentation = '".$cfilename."',
		projectThumbnail = '".$tfilename."',
		projectLocation = '".$lfilename."',
		projectVideo = '".ets_db_real_escape_string($_POST['projectVideo'])."',
		hasWhy = '".ets_db_real_escape_string($_POST['hasWhy'])."',
		hasmainFeatures = '".ets_db_real_escape_string($_POST['hasmainFeatures'])."',
		hasexclusiveServices = '".ets_db_real_escape_string($_POST['hasexclusiveServices'])."',
		projectWhy = '".ets_db_real_escape_string($_POST['projectWhy'])."',
		parallaxDescr = '".ets_db_real_escape_string($_POST['mainFeatures'])."',
		mobilemainfeatures = '".ets_db_real_escape_string($_POST['mobilemainfeatures'])."',
		exclusiveServices = '".ets_db_real_escape_string($_POST['exclusiveServices'])."',
		mobileexclusiveservices = '".ets_db_real_escape_string($_POST['mobileexclusiveservices'])."',
		sortorder = '".$_POST['sortorder']."',
		hasForm = '".$_POST['hasForm']."',
		hasmasterplan = '".$_POST['hasmasterplan']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where projectID = '".$_POST['projectID']."'
		";
		if(ets_db_query($sql)){
			
			$projectID = $_POST['projectID'];
			
			
			$path = DIR_FS_PROJECT_PATH.$_POST['projectID'].'/';
			if(!file_exists($path))
				{
					mkdir($path);
					exec("chown ".FILEUSER.FILEUSER." ".$path);
					exec("chmod 0777 ".$path);
					
				}
			
			if($_FILES['projectLocation']['name']!=''){
				$target_path = DIR_FS_PROJECT_PATH.$projectID.'/'.$projectID.'-'.$_FILES["projectLocation"]["name"]; 
				move_uploaded_file($_FILES["projectLocation"]["tmp_name"],$target_path);
				$image = new ImageUploader\ProUpload;
			
				$filename = $projectID.'-'.$_FILES["projectLocation"]["name"];
			
				if(!empty($_FILES["projectLocation"]["name"]))
				{
					$mresult = $image->shrink(array("height"=>480, "width"=>480),true)
	    				->makecopy('shrink',$target_path,DIR_FS_PROJECT_PATH.$projectID.'/'.$projectID.'-'.$_FILES["projectLocation"]["name"].'_mobile.jpg');
	    		}
			}
			
			if($_FILES['conceptPresentation']['name']!=''){
				$target_path = DIR_FS_PROJECT_PATH.$projectID.'/'.$projectID.'-'.$_FILES["conceptPresentation"]["name"]; 
				move_uploaded_file($_FILES["conceptPresentation"]["tmp_name"],$target_path);
			}
			
			if($_FILES['projectParallax']['name']!=''){
				$target_path = DIR_FS_PROJECT_PATH.$projectID.'/'.$projectID.'-'.$_FILES["projectParallax"]["name"]; 
				move_uploaded_file($_FILES["projectParallax"]["tmp_name"],$target_path);
			}
			if($_FILES['projectThumbnail']['name']!=''){
				$target_path = DIR_FS_PROJECT_PATH.$projectID.'/'.$projectID.'-'.$_FILES["projectThumbnail"]["name"]; 
				move_uploaded_file($_FILES["projectThumbnail"]["tmp_name"],$target_path);
			}
			$typeParent = pro_SeoSlug(getproject_typeTitle($_POST['pTypeID']));
			
			$seo_mod = getSeoModule($typeParent,$_POST['pTypeID'])."/".$typeParent;
			
			$seo_mod = str_replace("---","-", $seo_mod);
			updSeoLnk($projectID,$seo_mod,$project_slug);
			
			return true;
		}else{
			echo "Error in updating project..";
			die(ets_db_error());
		}
		
	}	
	function listData(){
		
	$form = new Form("addFrm");
		$form->configure(array(
		"prevent" => array("bootstrap","jQuery"),
		"view" => new View_Inline
	));
	
	$q = "select * from projects where status = 'E'";
	$r = ets_db_query($q);
	$group[''] = 'Select Project';
	
	while($arr = ets_db_fetch_array($r))
	{
		$group[$arr['projectID']] = $arr['projectTitle'];
	}
	
	$form->addElement(new Element_Hidden("controller", "projects"));
	$form->addElement(new Element_Hidden("action", "projects"));
	$form->addElement(new Element_Hidden("subaction", "listData"));
		
	$form->addElement(new Element_HTML('<span id = "group">'));
		if(isset($_POST['group']) && $_POST['group'] != "" ) 
		{
			$grp = $_POST['group'];
		}	
		else
		{
			$grp = '';
		}
		
		$form->addElement(new Element_Select("Project :", "group", $group, array(
			"id" => "group",
			"value" => $grp
			)));	
		
	
		$form->addElement(new Element_HTML('</span>'));
		$form->addElement(new Element_Button);
		$form->render();
	
		$whr = "";
		$disQry =  "SELECT * from projects where 1=1 ";
		
		if(!empty($_REQUEST['group'])) 
			{
				$grp = $_REQUEST['group'];	
				$whr .= ' AND projectID = "'.$grp.'"';
			}
		$disQry .= $whr;
		
		/*if(!empty($_POST['group'])) 
			{
				$grp = $_POST['group'];	
				$whr .= ' AND group_id = "'.$grp.'"';
			}
		$disQry .= $whr;*/
		
		echo '<br>';
		
		if(isset($_SESSION['listSQL']))
		{
			unset($_SESSION['listSQL']); 
		}
		
		$_SESSION['listSQL'] = $disQry;	
?>
	<script>
	$(document).ready(function() {
		var listURL = "helperfunc/projectsList.php?pTypeID=<?php echo $_REQUEST['pTypeID']; ?>";
		var oTable = $('#projectslist').dataTable({
			"ajax": listURL
		});
		
		$(window).bind('resize', function () {  oTable.fnAdjustColumnSizing();  });
		$('.esortorder').editable({params:{"tblName":"projects"}});
	});
	</script>
<?php
	$subvar = 'onclick="return confirmSubmit();"';
	echo '<div id="no-more-tables">
	<table class="table table-striped table-bordered dataTable" id="projectslist" style="width:100%;">
		<thead>
		<tr>
			<th>Id</th>
			<th>Type</th>
			<th>Name</th>
			<th>Project Status</th>
			<th width="60">Status</th>
			<th width="60">SortOrder</th>
			<th width="300">Action</th>
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
			<th width="300">Action</th>
		</tr>
		</tfoot>
	</table></div>';	
?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"projects"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php	
	}
	function delete()
	{
		$pTypeID = getfldValue('projects','projectID',$_GET['projectID'],'pTypeID');
		$delsql = "Delete from projects where projectID = '".$_GET['projectID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		$delsql = "Delete from gallery where projectID = '".$_GET['projectID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		delete_folder(DIR_FS_PROJECT_PATH.$_GET['projectID']);
		$typeParent = pro_SeoSlug(getproject_typeTitle($pTypeID));
			
		$seo_mod = getSeoModule($typeParent,$pTypeID)."/".$typeParent;
			
		$seo_mod = str_replace("---","-", $seo_mod);
		delSeoLnk($projectID,$seo_mod);
		
		return true;		
	}	
}
?>
