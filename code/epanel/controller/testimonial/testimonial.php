<script>

	          $('input').on('blur', function() {      
				if ($("#testiFrm").valid()) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class testimonial
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "testiFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$form->addElement(new Element_HTML("<legend>New Testimonial</legend>"));
		$form->addElement(new Element_Hidden("controller", "testimonial"));
		$form->addElement(new Element_Hidden("action", "testimonial"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		
		/* Actual Form Fields Started */
//		$testimonial = gettestimoniallist();
//		$form->addElement(new Element_Select("Testimonial Type:", "testimonial_type",$testimonial, array(
//			"placeholder" => "Testimonial Type"
//			)));
		$form->addElement(new Element_Textbox("Name:", "name", array(
			"required" => 1, 
			"placeholder" => "Name"
			)));
//		 $form->addElement(new Element_Textbox("City:", "tour_Name", array(
//			"required" => 1, 
//			"placeholder" => "City"
//			)));
		$form->addElement(new Element_Textarea("Description:", "description", array(
			"required" => 1, 
			"placeholder" => "Description"
			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('testimonial').'</label><br><br>'));			
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
		$sql = "Insert into testimonial set 
		
		name = '".ets_db_real_escape_string($_POST['name'])."',
	
		review = '".ets_db_real_escape_string($_POST['description'])."',
		username = '".$username."',
		createdate= now(),
		sortorder='".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		return true;
	}
	function editForm()
	{		
		$sql = "select * from testimonial where testimonial_Id ='".$_REQUEST['testimonial_Id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "testiFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$form->addElement(new Element_HTML("<legend>Edit Testimonial</legend>"));
			$form->addElement(new Element_Hidden("controller", "testimonial"));
			$form->addElement(new Element_Hidden("action", "testimonial"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("testimonial_Id", $_REQUEST['testimonial_Id']));
			/* Actual Form Fields Started */
//			$testimonial = gettestimoniallist();
//			$form->addElement(new Element_Select("Testimonial Type:", "testimonial_type",$testimonial, array(
//			"value"=> $rs['testimonial_type'],
//			"placeholder" => "Testimonial Type"
//			)));
			$form->addElement(new Element_Textbox("Name:", "name", array(
			"value"=> $rs['name'],
			"required" => 1, 
			"placeholder" => "Name"
			)));
			
			$form->addElement(new Element_Textarea("Description:", "description", array(
			"value"=> $rs['review'],
			"required" => 1, 
			"placeholder" => "Description"
			)));
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('testimonial').'</label><br><br>'));			
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
		$username = $_SESSION['username'];
		$updqry = ets_db_query("update testimonial set 
		
		name = '".ets_db_real_escape_string($_POST['name'])."',
        		
        review = '".ets_db_real_escape_string($_POST['description'])."',
		username = '".$username."',	
		sortorder='".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		modifieddate = now(),
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where testimonial_Id='" .$_POST['testimonial_Id']."'") or die ("Updating Testimonial records query failed: ".ets_db_error());	
		return true;
	}
	function listData()
	{
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/testimonialList.php';
	$('#testimoniallist').dataTable({
		"ajax": listURL
	});
});
</script>	
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="testimoniallist" width="100%">
		<thead>
		<tr>
			<th align="left">ID</th>
			<th align="left">Name</th>
		
			<th align="left">Status</th>
			<th align="left">Sortorder</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
					<th align="left">ID</th>
					<th align="left">Name</th>
				
					<th align="left">Status</th>
					<th align="left">Sortorder</th>
					<th>Action</th>
				</tr>
		</tfoot>
		 </table></div>';		
	?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"testimonial"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php		
	}		
function delete()
	{
		$delsql = "Delete from testimonial where testimonial_Id='".$_GET['testimonial_Id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		return true;		
	}
	
	
	}
?>
