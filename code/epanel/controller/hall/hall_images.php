	<script type="text/javascript" src="js/tmpl.min.js"></script>	
	<script type="text/javascript" src="js/load-image.min.js"></script>	
	<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="js/jquery.iframe-transport.js"></script>
	<script type="text/javascript" src="js/jquery.fileupload.js"></script>
	<script type="text/javascript" src="js/jquery.fileupload-ui.js"></script>
	<script type="text/javascript" src="js/jquery.fileupload-process.js"></script>
	<script type="text/javascript" src="js/jquery.fileupload-image.js"></script>
	<script type="text/javascript" src="js/jquery.fileupload-validate.js"></script>

<?php
include WS_PFBC_ROOT."Form.php";
class hall_images
{
function addForm()
	{

		echo '<form action="/" enctype="multipart/form-data" method="POST" id = "myForm">
        <input type = "hidden" id = "h_id" value = "'.$_REQUEST['h_id'].'">
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
            url: "uploadhall.php",
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilesize: 2,
            parallelUploads: 5,
            maxFiles: 5,
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
		$h_id = $_REQUEST['h_id'];
		$sql = "select * from  hall_images where id = '".(int)$_REQUEST['id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("editForm");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$front = array("Y" => "Yes", "N" => "No");
			
			$form->addElement(new Element_HTML("<legend>Edit Product</legend>"));
			$form->addElement(new Element_Hidden("controller", "hall"));
			$form->addElement(new Element_Hidden("action", "hall_images"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("h_id",$h_id ));
			$form->addElement(new Element_Hidden("id",$_REQUEST['id'] ));
			
						
			/* Actual Form Fields Started */
			
			$form->addElement(new Element_Textbox("Image Title:", "title", array(
				"required" => 1,
				"value" => $rs['title']
				)));
			$form->addElement(new Element_File("Browse Image:", "image", array( 
			"placeholder" => "Browse Image"
			)));
			
			$form->addElement(new Element_HTML('<img src="'.DIR_WS_PROJECT_PATH.$rs['h_id']."/".$rs['name'].'" width="10%" height="10%" style="margin-left:200px;">'));
			
			
			$form->addElement(new Element_Textbox("Item Code:", "item", array(
				"required" => 1,
				"value" => $rs['itemcode']
				)));
			$form->addElement(new Element_Select("Status:", "status", $status, array(
				"required" => 1,
				"value" => $rs['status']
				)));
				
			$form->addElement(new Element_Textbox("Sort Order:", "sort_order", array(
				"required" => 1,
				"placeholder" => "Sort Order",
				"value" => $rs['sortorder']
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
		$err = false;
		$upload = $_FILES["image"]["name"];
		$target_path = DIR_FS_PROJECT_PATH.$_POST['h_id']."/".$_FILES["image"]["name"];
		
		$path = DIR_FS_PROJECT_PATH.$_POST['h_id']."/";
		if(!file_exists($path))
		{
				mkdir($path);
				exec("chown ".FILEUSER.FILEUSER." ".$path);
				exec("chmod 0777 ".$path);
				
		}

		if($upload)
		{
			$qry = "select * from hall_images where id ='".$_POST['id']."'";
			$res = ets_db_query($qry);
			$arr = ets_db_fetch_assoc($res);
			if($arr['name'])
			{
				@unlink(DIR_FS_PROJECT_PATH.$_POST['h_id']."/".$arr['name']);
			}
			
			if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_path)){
				$sql1 = "update hall_images set
				name = '".$upload."'
				where id = '".(int)$_REQUEST['id']."'";
				
				if(ets_db_query($sql1))
					$err = true;
			}	
		}
		
		$sql = "update hall_images set
			title = '".ets_db_real_escape_string($_POST['title'])."',
			itemcode = '".ets_db_real_escape_string($_POST['item'])."',
			is_front = '".$_POST['is_front']."',
			status = '".$_POST['status']."',
			sortorder = '".$_POST['sort_order']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			where id = '".(int)$_REQUEST['id']."'";		

			
			if(ets_db_query($sql))
			{
				$err = true;
			}
			else
			{
				$err = false;
			}
		return $err;
	}
	
	function listData(){
		$h_id = $_REQUEST['h_id'];
?>
	<script>
	$(document).ready(function() {
		var listURL = "helperfunc/hallimagesList.php?h_id="+<?php echo $h_id; ?>;
		
		var oTable = $('#categorylist').dataTable({
			
			"ajax": listURL,
			"order": [[ 4, "desc" ]]
		});
		/*var oTable = $('#categorylist').dataTable({
			"bProcessing": true,
			"sAjaxSource": listURL,
			"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
			"sPaginationType": "bootstrap",
			"iDisplayLength": 50,
			"oLanguage": {"sLengthMenu": "_MENU_ records per page"} 
		});*/
		$(window).bind('resize', function () {  oTable.fnAdjustColumnSizing();  });
		$('.esortorder').editable({params:{"tblName":"hall_images"}});
	});
	</script>
<?php
	$subvar = 'onclick="return confirmSubmit();"';
	echo '
	<table class="table table-striped table-bordered dataTable" id="categorylist" style="width:100%;">
		<thead>
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Image</th>
			<th>Status</th>
			<th>Sort Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>	
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Image</th>
			<th>Status</th>
			<th>Sort Order</th>
			<th>Action</th>
		</tr>
		</tfoot>
	</table>';	
?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"hall_images"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
	
</script>
<?php	
	}
	function delete()
	{
		$delsql = "Delete from hall_images where id = '".$_GET['id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		$arr = ets_db_fetch_array($res);
		
		if($arr['name'])
		{
			@unlink(DIR_FS_SERVICE_IMAGE_PATH.$_GET['h_id'].'/'.$arr['name']);
		}
		
		
		
		return true;		
	}	
}
?>