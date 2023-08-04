
<?php
	if(hasSub($module_id,'download_master','download_type_id')){
		$getSub = ets_db_query("Select * from download_master where parent_id = '".$module_id."' order by sortorder asc,download_type_id desc ") or die(ets_db_error());
		echo '<table width="100%" class="table table-bordered">';
		while($drs = ets_db_fetch_array($getSub)){
			$download_qry = "select * from download where download_type='".$drs['download_type_id']."' order by sortorder";
			$qry = ets_db_query($download_qry);
			echo '<tr><td><strong>'.$drs['download_type'].'</strong></td>';
			if(ets_db_num_rows($qry) > 0)
			{
				
				while($download_res = ets_db_fetch_array($qry))
				{
					if($download_res['download_file_name'] == ""){
						echo '<td>'.$download_res['download_title'].'</td>';
					}else{
						echo '<td><a class="download-icon" title="Download '.$download_res['download_title'].'" href="download_file.php?download='.$download_res['download_id'].'" target="_blank">'.$download_res['download_title'].'</a></td>';
					}
				}	
						
			}
			echo '</tr>';
			
		}
		echo '</table>';
	}else{
		$download_qry = "select * from download where download_type='".$module_id."' order by sortorder";
		$qry = ets_db_query($download_qry);
		
		if(ets_db_num_rows($qry) > 0)
		{
			while($download_res1 = ets_db_fetch_array($qry))
				{
			      if($module_id == '3' || $module_id == '5' || $module_id == '9'  || $module_id == '4' || $module_id == '6' || $module_id == '8' || $module_id == '15'){
					  ?>
					  <p style="font-size:18px;font-weight:600;"><?php echo $download_res1['download_description'];  ?></p>
<?php
				  }
				else{
				
			echo '<table width="100%" class="table table-bordered">';
            
			  
				echo '<tr><td><a class="download-icon" title="Download '.$download_res1['download_title'].'" href="download_file.php?download='.$download_res1['download_id'].'" target="_blank">'.'<span>Click here to download the </span>'.$download_res1['download_title'].'</a></td><td width="30"><a class="download-icon" title="Download '.$download_res1['download_title'].'" href="download_file.php?download='.$download_res1['download_id'].'" target="_blank"><i class="fa fa-file-pdf-o"></i></a></td></tr>';
			}

	
			echo '</table>';		
		}
			}
		else 
		{
			echo "There is no downlodlist available";
		}
	}
	
?>

