

<script type="text/javascript">
            $(document).ready(function($){
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             	
                $("#dtBox").DateTimePicker({
                    isPopup: true
                });
                
            });
        </script>
<?php
include WS_PFBC_ROOT."Form.php";
class video
{
	function addForm()
	{
		$form = new Form("videoFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "videoFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$position = array("H" => "Set As Home Page", "I" => "Not Set As Home Page");
		$form->addElement(new Element_HTML("<legend>Add video </legend>"));
		$form->addElement(new Element_Hidden("controller", "video"));
		$form->addElement(new Element_Hidden("action", "video"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		/* Actual Form Fields Started */
//		$video = getvideolist();
//        	$form->addElement(new Element_HTML('<div id="dtBox"></div>'));	
//		$form->addElement(new Element_Select("video/Event Type:", "video_type",$video, array(
//			"placeholder" => "video Type"
//			)));
		$form->addElement(new Element_Textbox("video Title:", "video_title", array(
			"required" => 1, 
			"placeholder" => "video Title"
			)));
		
		$form->addElement(new Element_TinyMCE("video Description:", "video_desc", array(
		"value"=> stripslashes($rs['video_desc']))
			));
			
		
		$form->addElement(new Element_jQueryDatePicker("Date:", "eve_date", array(
                    "placeholder" => "Date"
                    
                )));
				
		
			
			
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('video').'</label><br><br>'));				
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "Sortorder"
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
		$form->addElement(new Element_HTML('<hr>'));
		$form->render();
	}
	function add()
	{
		
		$username=$_SESSION['username'];
		$createdate = date("Y-m-d");
		
		$my_date = date('Y-m-d', strtotime($_POST['eve_date']));
		
		$sql = "Insert into video set 
		username = '".$username."',
		createdate = '".$createdate."',
		
		video_title = '".ets_db_real_escape_string($_POST['video_title'])."',
		video_desc = '".ets_db_real_escape_string($_POST['video_desc'])."',
		eve_date = '".($my_date)."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		if(ets_db_query($sql)){			
			$video_id = ets_db_insert_id();
			
				return true;
		}else{
			die(ets_db_error());
			return false;			
		}
		
	}
	function editForm()
	{		
		$sql = "select * from video where video_id ='".$_REQUEST['video_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("videoFrm");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "videoFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			
			$form->addElement(new Element_HTML("<legend>Edit video</legend>"));
			$form->addElement(new Element_Hidden("controller", "video"));
			$form->addElement(new Element_Hidden("action", "video"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("video_id", $_REQUEST['video_id']));
			
			
			/* Actual Form Fields Started */
			
			$form->addElement(new Element_Textbox("video Title:", "video_title", array(
				"required" => 1,
				"placeholder" => "video Title",
				"value"=> $rs['video_title']
				)));
		
			$form->addElement(new Element_TinyMCE("video Description:", "video_desc", array(
			"value"=> stripslashes($rs['video_desc']))
				));
					
			
			$form->addElement(new Element_jQueryDatePicker("Date:", "eve_date", array(
                    "placeholder" => "Date",
                    
                    "value"=> $rs['eve_date']
                )));
				
//			$form->addElement(new Element_jQueryUIDate("Date:", "eve_date", array(
//			"jqueryOptions" => array("pickTime" => "false"),
//			"required" => 1,
//			"data-date-format" => "yyyy-mm-dd",
//			"placeholder" => "Date",
//			"value"=> $rs['eve_date']
//			)));
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('video').'</label><br><br>'));			
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
			echo "No Data Exists...";
		}
		
	}
	function edit()
	{
	
	    $username=$_SESSION['username'];
	    $modifieddate = date("Y-m-d");
		$updimg = true;		
		$error = false;
		
		if(!$error){
			$my_date = date('Y-m-d', strtotime($_POST['eve_date']));
			
			$updqry = ets_db_query("update video set 
			username = '".$username."',
			modifieddate = '".$modifieddate."',
		
			video_title = '".ets_db_real_escape_string($_POST['video_title'])."',
			video_desc = '".ets_db_real_escape_string($_POST['video_desc'])."',
			eve_date = '".($my_date)."',
			sortorder = '".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			where video_id='" .$_POST['video_id']."'") or die ("Updating video records query failed: ".ets_db_error());	
			
			return !$error;
		}else{
			die(ets_db_error());
			return false;
		}
	}
	function listData()
	{
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/videoList.php';
	var oTable = $('#videolist').dataTable({
			"ajax": listURL
	});
	
    $(".marker").tooltip({placement: 'top'});
	$('.esortorder').editable({params:{"tblName":"video"}});
});
</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="videolist" width="100%">
		<thead>
		<tr>
				<th>Id</th>
			<th>video Title</th>
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
						<th>Id</th>
					<th>video Title</th>
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
		params:{"tblName":"video"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php
			
	}		
	function delete()
	{
		$delsql = "Delete from video where video_id='".$_GET['video_id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		delSeoLnk($_GET['video_id'],"video");
		return true;		
	}
	function ajaxPost()
	{
		print_r($_POST);
		return true;
	}
	
	}
?>
