<link rel="stylesheet" href="css/dropzone.css" />
<script type="text/javascript" src="js/dropzone.js"></script>

<?php
include WS_PFBC_ROOT."Form.php";
include(DIR_WS_CLASSES."resize-class.php");

class projectfloors
{
	function addForm()
	{

		echo '<form action="/" enctype="multipart/form-data" method="POST" id = "myForm">
        <input type = "hidden" id = "project_id" value = "'.$_REQUEST['projectID'].'">
          <div class="dropzone" id="my-dropzone" name="mainFileUploader">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>

            </div>
        </form>
        <div>
        <div class="form-actions"><input value="Submit" name="" class="btn btn-primary btn-default" id="submit-all" type="submit"> <input value="Cancel" name="" onclick="history.go(-1);" class="btn btn-default" id="ptypeFrm-element-17" type="button"></div>
       </div>';
?>

<script>
    
 Dropzone.options.myDropzone = {
            url: "uploadProjectFloors.php",
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilesize: 2,
            parallelUploads: 5,
            maxFiles: 10,
            acceptedFiles: "image/*",

            init: function () {

                var submitButton = document.querySelector("#submit-all");
                var wrapperThis = this;
                
                submitButton.addEventListener("click", function () {
                    wrapperThis.processQueue();
                });

                this.on("addedfile", function (file) {

                    // Create the remove button
                    var removeButton = Dropzone.createElement('<a class="btn btn-danger marker"><i class="fa fa-times"></i></a>');
                    var textbox1 = Dropzone.createElement('<div class="control-group"><label class="control-label" for="ptypeFrm-element-5"><span aria-required="true" class="required">* </span>Title:</label><div class="controls"><input placeholder = "Image Title" class="title" aria-required="true" name="title[]" required=""  type="text"></div></div>');
                    var textbox2 = Dropzone.createElement('<div class="control-group"><label class="control-label" for="ptypeFrm-element-5"><span aria-required="true" class="required">* </span>Sort Order:</label><div class="controls"><input class="sortorder" aria-required="true" name="sortorder[]" required=""   placeholder = "Sort Order" type="text"></div></div>');

                    // Listen to the click event
                    removeButton.addEventListener("click", function (e) {
                        // Make sure the button click doesn't submit the form:
                        e.preventDefault();
                        e.stopPropagation();

                        // Remove the file preview.
                        wrapperThis.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                    file.previewElement.appendChild(textbox1);
                    file.previewElement.appendChild(textbox2);
                    
                });

                this.on('sendingmultiple', function (data, xhr, formData) {
                    //var data = $('#myForm').serialize();
                    //formData.append("data", data);
                    formData.append("projectID", $('#project_id').val());
                   
                    var title = $('form .title').serialize();
                    var sortorder = $('form .sortorder').serialize();
                    
                    formData.append("title", title);
                    formData.append("sortorder", sortorder);
                });
            },
            success : function(){
                location.href = "index.php?controller=projects&action=projectfloors&subaction=listData&projectID=<?php echo $_REQUEST['projectID']; ?>";
            }
            
        };
    
</script>    

	
<?php
	}

	function editForm()
	{		
		$sql = "select * from  project_gallery where galleryID ='".$_REQUEST['galleryID']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$front = array( "D" => "No", "E" => "Yes");
			$form->addElement(new Element_HTML("<legend>Edit project Image</legend>"));
			$form->addElement(new Element_Hidden("controller", "projects"));
			$form->addElement(new Element_Hidden("action", "projectfloors"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("galleryID", $_REQUEST['galleryID']));
			$form->addElement(new Element_Hidden("projectID", $_REQUEST['projectID']));
			$form->addElement(new Element_Hidden("prevImage", $rs['galleryImage']));
			/* Actual Form Fields Started */
			$projectID = getMasterArray("projects","projectID","projectTitle");
			
			/*$form->addElement(new Element_Select("Select project:", "projectID",$projectID, array(
			"required" => 1, 
			"value"=> $rs['projectID']
			)));*/
			$form->addElement(new Element_Textbox("Image Title:", "galleryTitle", array(
				"value"=> $rs['galleryTitle']
				)));
	
			$form->addElement(new Element_HTML('<img src="'.DIR_WS_PROJECT_PATH.$rs['projectID']."/thumbnail/".$rs['galleryImage'].'"  style="margin-left:200px;height: 100px;
    width: 100px;">'));
			$form->addElement(new Element_File("Browse Image:", "galleryImage", array( 
			"placeholder" => "Browse Image"
			)));
							
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
			
		$error = false;
		
		$path = DIR_FS_PROJECT_PATH.$_POST['projectID'].'/';
		if(!file_exists($path))
			{
				mkdir($path);
				exec("chown ".FILEUSER.FILEUSER." ".$path);
				exec("chmod 0777 ".$path);
				
			}
		if($_FILES["galleryImage"]["name"] != ""){
			@unlink(DIR_FS_PROJECT_PATH.$_POST['projectID']."/".$_POST['prevImage']);
			@unlink(DIR_FS_PROJECT_PATH.$_POST['projectID']."/thumbnail/".$_POST['prevImage']);
			$upload = $_FILES["galleryImage"]["name"];
			$target_path = DIR_FS_PROJECT_PATH.$_POST['projectID']."/".$_POST['galleryID'].'-'.$_FILES["galleryImage"]["name"];
			if(move_uploaded_file($_FILES["galleryImage"]["tmp_name"],$target_path)){
                $resizeObj = new resize(DIR_FS_PROJECT_PATH.$_POST['projectID']."/".$_POST['galleryID'].'-'.$_FILES["galleryImage"]["name"]);
                   // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                   $resizeObj -> resizeImage(THUMB_WIDTH, THUMB_HEIGHT, 'exact');

                   $resizeObj -> saveImage(DIR_FS_PROJECT_PATH.$_POST['projectID']."/thumbnail/".$_POST['galleryID'].'-'.$_FILES["galleryImage"]["name"], 100);
                $updqry = ets_db_query("update project_gallery set 
			galleryImage = '".$_POST['galleryID'].'-'.$_FILES["galleryImage"]["name"]."'
			
			where galleryID= '".$_POST['galleryID']."'") or die ("Updating  gallery records query failed: ".ets_db_error());
			}
			
		}
		if(!$error){
			$updqry = ets_db_query("update project_gallery set 
			username = '".$username."',
			modifieddate = '".$modifieddate."',
			projectID = '".ets_db_real_escape_string($_POST['projectID'])."',
			galleryTitle = '".ets_db_real_escape_string($_POST['galleryTitle'])."',
			sortorder = '".$_POST['sortorder']."',
			isFront = '".$_POST['isFront']."',
			status = '".$_POST['status']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			where galleryID= '".$_POST['galleryID']."'") or die ("Updating  gallery records query failed: ".ets_db_error());
			return true;
		}
	}	
function listData()
	{
		?>
<script>
$(document).ready(function() {
	var listURL = "helperfunc/projectfloorList.php?projectID=<?php echo (int)$_REQUEST['projectID'];?>";
	var oTable = $('#gallerylist').dataTable({
			"ajax": listURL
		});
	/*
	$('#gallerylist').dataTable({
		"bProcessing": true,
		"sAjaxSource": listURL,
		"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {"sLengthMenu": "_MENU_ records per page"} 
	});
	*/
	$('.esortorder').editable({params:{"tblName":"project_gallery"}});
});
</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="gallerylist" width="100%">
		<thead>
		<tr>
			<th>Id</th>
			<th>Project Name</th>
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
				<th>Project Name</th>
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
		params:{"tblName":"project_gallery"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php
			
	}
function delete()
	{
		$image = getfldValue('project_gallery','galleryID',$_GET['galleryID'],'galleryImage');
		@unlink(DIR_FS_PROJECT_PATH.$_REQUEST['projectID'].'/'.$image);
		@unlink(DIR_FS_PROJECT_PATH.$_REQUEST['projectID'].'/thumbnail/'.$image);
		
		$delsql = "Delete from  project_gallery where galleryID='".$_GET['galleryID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		return true;		
	}	
}

?>
