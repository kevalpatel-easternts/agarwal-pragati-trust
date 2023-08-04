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
	
	$(document).on("click",".loadModal" ,function(){
       
	var donationID = $(this).attr('data-donation');
	$('.modal-body').load('viewdonation.php?donation_id='+donationID);
	
    }); 

$("#deleteMultiple").click(function(){
	
	  var result = confirm("Are You Sure you want to delete the donation Data ? ");
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
			var loc = 'index.php?controller=donation&action=donation&subaction=deletedonation&donation_id='+finalDelArray;
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
class donation
{
	function listdata()
	{
		
		$table = 'donation_master';
		update_data($table);
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/donationList.php';
	$('#donationlist').dataTable( {
        "ajax": listURL,
        "order": [[ 2, "desc" ]]
    } );
    /*
	$('#donationlist').dataTable({
		"bProcessing": true,
		"sAjaxSource": listURL,
		"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {"sLengthMenu": "_MENU_ Records Per Page"} 
	});
	*/
});
</script>
	<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<a href="donation-report.php">Export To Excel</a>';
		echo $list='<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable"	id="donationlist" width="100%">
					<thead>
						<tr>
							<th colspan="9"><input type="checkbox" id="selectall" value="false">&nbsp; &nbsp;Select All</input>&nbsp; &nbsp;
							<button class="btn btn-danger" id="deleteMultiple">Delete Selected</th>	
						</tr>
						<tr>
							<th><center>Select</center></th>
							<th>donation Id</th>		
							<th>Name</th>
							<th>Email</th>
							<th>Phone No</th>
							<th>Address</th>	<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot>
						<tr>
							<th><center>Select</center></th>
							<th>donation Id</th>			
							<th>Name</th>
							<th>Email</th>
							<th>Phone No</th>
							<th>Address</th>
						
							<th>Action</th>
						</tr>
					</tfoot>	
				</table></div>';
?>
<script>
	/*$("body").on("click","a[rel^='donationDetail']", function(e){
		var donationID = $(this).attr('data-donation');
		$('#myModal').modal('show');
		$('.modal-body').load('viewdonation.php',{donation_id: donationID, ajax: 'true'});
		
		
	});*/
	
	
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"donation_master"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
	
	
	
	
</script>

<?php	 
	}
	function delete()    
	{	
		$values = explode(",", $_GET["donation_id"]);
		if(count($values) > 1){
			foreach($values as $key => $val){
				$delsql = "DELETE FROM  `donation_master` WHERE donation_id = '".$val."'";
				$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
			}
		}else{
			$delsql = "DELETE FROM  `donation_master` WHERE donation_id='".$_GET['donation_id']."'";
			$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		}
		return true;		
	}	
}
?>

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 id="myModalLabel">Resume Detail</h3>
        </div>
        <div class="modal-body">
          &nbsp;
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
 <!-- 
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
		<h3 id="myModalLabel">Resume Detail</h3>
	</div>
	<div class="modal-body">&nbsp;</div>
	
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>
-->

