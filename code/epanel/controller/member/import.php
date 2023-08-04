<?php
    
    require('inc/mainapp.php');
    $action = (isset($_GET['action']) ? $_GET['action'] : '');

      if (!empty($action)) {
            switch ($action) {
            case 'imp_rate':
                $error = false;
                if(isset($_FILES) && ($_FILES['import_file']['type'] == 'application/vnd.ms-excel' || $_FILES['import_file']['type'] == 'application/x-msexcel')){
                	$target_path = $_FILES["import_file"]["name"];                 
                 if (move_uploaded_file($_FILES["import_file"]["tmp_name"],$target_path)) {
					 
						$filetoimport = $target_path;
                        require('ext/proExcelReader.php');
                        require('ext/SpreadsheetReader.php');
                        $Reader = new SpreadsheetReader($filetoimport);
                        $i = 0;
						$username=$_SESSION['username'];
						$createdate = date("Y-m-d");
                	 	foreach ($Reader as $rows)
						{
							echo $rows[0];
							
							echo $inssql = "insert into rate_master set
									createdate = now(),
									rate = '".$rows[5]."',
									uom_id = '".$uom."',
									contract_id= '1',
									sap_item_code = '".$rows[1]."',
									line_item_name = '".$rows[3]."',
									sap_item_desc = '".$rows[4]."',
									status = 'E',
									remote_ip ='".$_SERVER['REMOTE_ADDR']."'";
							ets_db_query($inssql) or die(ets_db_error());
							
							$i++;
						}
                       
                    }else{
                        $error = true;
                    	$importStatus = "ERROR in File Upload, Please try again !!!";
                    }
                }else{
                    $error = true;
                	$importStatus = $_FILES['import_file']['type']." Only .xls file is allowed!!!";
                }
            break;
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