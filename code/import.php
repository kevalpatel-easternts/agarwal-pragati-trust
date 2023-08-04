<?php
    
    require('inc/mainapp.php');
    require('ext/proExcelReader.php');
    require('ext/SpreadsheetReader.php');
    
    if(isset($_FILES) && ($_FILES['import_file']['type'] == 'application/vnd.ms-excel' || $_FILES['import_file']['type'] == 'application/x-msexcel')){
		$target_path = $_FILES["import_file"]["name"];   
		if (move_uploaded_file($_FILES["import_file"]["tmp_name"],'excel1/'.$target_path)) {
			echo "Uploaded";
			$filetoimport = $target_path;
			exec("chown ".FILEUSER.FILEUSER." ".'excel1/'.$target_path);
			exec("chmod 0777 ".'excel1/'.$target_path);
			$Reader = new SpreadsheetReader('excel1/'.$target_path);
			
				foreach ($Reader as $rows)
						{
						  if($i >= 1){
							echo $rows[0];
							
							 $inssql = "insert into member_master set
									createdate = now(),
									image_title = '".$rows[1]." ".$rows[2]."',
									cnum= '".$rows[3]."',
									madr = '".$rows[4]." ".$rows[5]."',
									landmark = '".$rows[7]."',
									city = 'Surat',
									state = 'Gujarat',
									a_id = '7',
									status = 'E',
									remote_ip ='".$_SERVER['REMOTE_ADDR']."'";
								echo $inssql;


	//
							 ets_db_query($inssql) or die(ets_db_error());
						   }
							$i++;
						}
			
			
		}else{
			echo "Error";
		}
	}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<body>
<div class="container-fluid">
<div class="row-fluid">
<div class="col-sm-12">
<div class="panel panel-info">
      <div class="panel-heading">Import Tools</div>
        	<div class="panel-body">
        		<div class="row">
        			
        			<div class="col-sm-6">
					<div class="well">        				
        				<h2>Import Contract Rate</h2>
						<form class="form-horizontal" role="form" action="import.php?action=imp_rate" method="post" enctype="multipart/form-data">
							<div class="form-group">
										<label class="col-sm-4" >Select Contract Rate File</label>
										<div class="col-sm-8">
										<input id="ps_file" name="import_file" type="file"> Import will work only with .xls file.
										</div>
									</div>
									 <div class="form-group">
									<div class="col-sm-offset-4 col-sm-8">
									<button type="submit"><i class="fa fa-check"></i> Import Contract Rate</button>
									<button type="reset"><i class="fa fa-refresh"></i> Reset</button>
									<?php
									if(isset($action) && $action == "imp_rate"){
										if($error == true){
											echo '<div class="alert alert-danger">'.$importStatus.'</div>';
										}else{
											echo '<div class="alert alert-info">'.$importStatus.'</div>';
											
										}
									}
									?>
										</div>
									</div>
						</form>
					</div>
        			</div>
        		</div>	
    </div>
</div>
</div>
</div>
</div>
</body>
</html>

