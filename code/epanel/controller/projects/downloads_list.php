<script> 
$(document).ready(function(){
    $('#mainpages').select2({
		placeholder: "Select a Main Page"
	});
	
$("#selectall").click(function(){
    $('.case').not(this).prop('checked', this.checked);
}); 

 $(document).on("click",".case" ,function(){
        if($(".case").length == $(".case:checked").length) {
            $("#selectall").prop("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }
 
    }); 

$("#deleteMultiple").click(function(){
	
	  var result = confirm("Are You Sure you want to delete? ");
		if (result == true) 
		{	
			var delIDarray = [];
			  $('.case').each(function(){
					var ar = this.id;
					var selectval = $('#'+ar).is(':checked');
					if(selectval){
						delIDarray.push(ar);
					}
			  });
			var finalDelArray = delIDarray.join(',');
			console.log(finalDelArray);
			var loc = 'index.php?controller=projects&action=downloads_list&subaction=delete&b_id='+finalDelArray;
			window.location.assign(loc);
		}
		else 
		{
			
		}	  
	  //location.href="index.php?controller=products&action=subscriptionlist&subaction=delete&sid="+finalDelArray;
});   
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class downloads_list
{

	function listData(){
?>
	<script>
	$(document).ready(function() {
		var listURL = "helperfunc/downloadsList.php";
		var oTable = $('#inquirylist').dataTable({
			"ajax": listURL ,
			"order": [[ 4, "desc" ]]
		});
		
		$(window).bind('resize', function () {  oTable.fnAdjustColumnSizing();  });
		$('.esortorder').editable({params:{"tblName":"inquiry"}});
	});
	</script>
<?php
	$subvar = 'onclick="return confirmSubmit();"';
	echo '<a href="inquiry-report.php">Export To Excel</a><br>';
	echo '<div id="no-more-tables">
	<table class="table table-striped table-bordered dataTable" id="inquirylist" style="width:100%;">
		<thead>
		<tr>
			<th colspan="8"><input type="checkbox" id="selectall" value="false">&nbsp; &nbsp;Select All</input>&nbsp; &nbsp;
			<button class="btn btn-danger" id="deleteMultiple">Delete Selected</th>	
		</tr>
		<tr>
			<th></th>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Date</th>
			<th>Project</th>
			<th>Action</th>
			
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>	
		<tr>
			<th></th>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Date</th>
			<th>Project</th>
			<th>Action</th>
			
		</tr>
		</tfoot>
	</table></div>';	
?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"inquiry"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php	
	}
	function delete()    
	{
		$values = explode(",", $_GET["b_id"]);
		print count($values);
		if(count($values) > 1){
			foreach($values as $key => $val){
				$delsql = "DELETE FROM `download_brochure` WHERE b_id='".$val."'";
				$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
			}
		}else{
			$delsql = "DELETE FROM `download_brochure` WHERE b_id='".$_GET['b_id']."'";
			$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		}
		return true;		
	}
}
?>
