

<script type="text/javascript">
            $(document).ready(function($){
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             	
                $("#dtBox").DateTimePicker({
                    isPopup: true
                });
                
            });
        </script>
<?php
include WS_PFBC_ROOT."Form.php";
class news
{
	function addForm()
	{
		$form = new Form("newsFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "newsFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$position = array("H" => "Set As Home Page", "I" => "Not Set As Home Page");
		$form->addElement(new Element_HTML("<legend>Add News </legend>"));
		$form->addElement(new Element_Hidden("controller", "news"));
		$form->addElement(new Element_Hidden("action", "news"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		/* Actual Form Fields Started */
		$news = getnewslist();
        	$form->addElement(new Element_HTML('<div id="dtBox"></div>'));	
		$form->addElement(new Element_Select("News/Event Type:", "news_type",$news, array(
			"placeholder" => "News Type"
			)));
		$form->addElement(new Element_Textbox("News Title:", "news_title", array(
			"required" => 1, 
			"placeholder" => "News Title"
			)));
		
		$form->addElement(new Element_TinyMCE("News Description:", "news_desc", array(
		"value"=> stripslashes($rs['news_desc']))
			));
			
		
		$form->addElement(new Element_jQueryDatePicker("Date:", "eve_date", array(
                    "placeholder" => "Date",
                    "required" => 1
                )));
				
		
			
			
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('news').'</label><br><br>'));				
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
		$news_slug = pro_SeoSlug(stripslashes($_POST['news_title']));
		$username=$_SESSION['username'];
		$createdate = date("Y-m-d");
		
		$my_date = date('Y-m-d', strtotime($_POST['eve_date']));
		
		$sql = "Insert into news set 
		username = '".$username."',
		createdate = '".$createdate."',
		news_type = '".$_POST['news_type']."',
		news_title = '".ets_db_real_escape_string($_POST['news_title'])."',
		news_desc = '".ets_db_real_escape_string($_POST['news_desc'])."',
		eve_date = '".($my_date)."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		if(ets_db_query($sql)){			
			$news_id = ets_db_insert_id();
				$seo_mod = "News"."/".strtolower(str_replace(" ","-",getNewsType($_POST['news_type'])));
				insSeoLnk($news_id,$seo_mod,$news_slug);		
				return true;
		}else{
			die(ets_db_error());
			return false;			
		}
		
	}
	function editForm()
	{		
		$sql = "select * from news where news_id ='".$_REQUEST['news_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("newsFrm");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "newsFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			
			$form->addElement(new Element_HTML("<legend>Edit News</legend>"));
			$form->addElement(new Element_Hidden("controller", "news"));
			$form->addElement(new Element_Hidden("action", "news"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("news_id", $_REQUEST['news_id']));
			
			
			/* Actual Form Fields Started */
			$news = getnewslist();
            	$form->addElement(new Element_HTML('<div id="dtBox"></div>'));	
			$form->addElement(new Element_Select("News/Event Type:", "news_type",$news, array(
			"required" => 1, 
			"value"=> $rs['news_type']
			)));
			$form->addElement(new Element_Textbox("News Title:", "news_title", array(
				"required" => 1,
				"placeholder" => "News Title",
				"value"=> $rs['news_title']
				)));
		
			$form->addElement(new Element_TinyMCE("News Description:", "news_desc", array(
			"value"=> stripslashes($rs['news_desc']))
				));
					
			
			$form->addElement(new Element_jQueryDatePicker("Date:", "eve_date", array(
                    "placeholder" => "Date",
                    "required" => 1,
                    "value"=> $rs['eve_date']
                )));
				
//			$form->addElement(new Element_jQueryUIDate("Date:", "eve_date", array(
//			"jqueryOptions" => array("pickTime" => "false"),
//			"required" => 1,
//			"data-date-format" => "yyyy-mm-dd",
//			"placeholder" => "Date",
//			"value"=> $rs['eve_date']
//			)));
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('news').'</label><br><br>'));			
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
		$news_slug = pro_SeoSlug(stripslashes($_POST['news_title']));
	    $username=$_SESSION['username'];
	    $modifieddate = date("Y-m-d");
		$updimg = true;		
		$error = false;
		
		if(!$error){
			$my_date = date('Y-m-d', strtotime($_POST['eve_date']));
			
			$updqry = ets_db_query("update news set 
			username = '".$username."',
			modifieddate = '".$modifieddate."',
			news_type = '".ets_db_real_escape_string($_POST['news_type'])."',
			news_title = '".ets_db_real_escape_string($_POST['news_title'])."',
			news_desc = '".ets_db_real_escape_string($_POST['news_desc'])."',
			eve_date = '".($my_date)."',
			sortorder = '".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			where news_id='" .$_POST['news_id']."'") or die ("Updating news records query failed: ".ets_db_error());	
			$seo_mod = "News"."/".strtolower(str_replace(" ","-",getNewsType($_POST['news_type'])));
			updSeoLnk($_POST['news_id'],$seo_mod,$news_slug);
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
	var listURL = 'helperfunc/newsList.php';
	var oTable = $('#newslist').dataTable({
			"ajax": listURL
	});
	
    $(".marker").tooltip({placement: 'top'});
	$('.esortorder').editable({params:{"tblName":"news"}});
});
</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="newslist" width="100%">
		<thead>
		<tr>
			<th>News/Event Type</th>
			<th>Date</th>
			<th>News Title</th>
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
					<th>News/Event Type</th>
					<th>Date</th>
					<th>News Title</th>
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
		params:{"tblName":"news"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php
			
	}		
	function delete()
	{
		$delsql = "Delete from news where news_id='".$_GET['news_id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		delSeoLnk($_GET['news_id'],"News");
		return true;		
	}
	function ajaxPost()
	{
		print_r($_POST);
		return true;
	}
	
	}
?>
