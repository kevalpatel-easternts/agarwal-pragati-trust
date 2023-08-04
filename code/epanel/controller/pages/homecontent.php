<?php 
include WS_PFBC_ROOT."Form.php";
class homecontent{
	
	function fillpage(){
        $content = array();
		$pgqry = "select * from homecontent";
		$pgqry_exec = ets_db_query($pgqry) or die(ets_db_error());
		$pgarr = ets_db_fetch_array($pgqry_exec);
	    $content['x_contentvalue'] = stripslashes($pgarr['home_content']);
	    $content['cover_image'] = stripslashes($pgarr['cover_image']);
		return $content;
	}
	function edit_homepg($maincontent){
		$to_contentsave = stripslashes($maincontent);
        $updimg = $_FILES["cover_image"]["name"];	
        $path = DIR_FS_PAGE_IMAGE_PATH;
		if(!file_exists($path))
			{
				mkdir($path);
				exec("chown ".FILEUSER.FILEUSER." ".$path);
				exec("chmod 0777 ".$path);
				
			}
		$select = ets_db_query("select * from homecontent");
		if(ets_db_num_rows($select) == 0){
			$pgqry = "insert into homecontent values(null,'".$_SESSION['username']."',now(),now(),'".addslashes($to_contentsave)."','')";
			$pgqry_exec = ets_db_query($pgqry) or die(ets_db_error());
		}else {
			
			$pgqry = "update homecontent set username = '".$_SESSION['username']."',modifieddate = now(),home_content  = '".addslashes($to_contentsave)."'";
			$pgqry_exec = ets_db_query($pgqry) or die(ets_db_error());
		}
        
        if($updimg != ""){
			@unlink(DIR_FS_PAGE_IMAGE_PATH.$_POST['prevImage']);
			$upload = "1-".$_FILES["cover_image"]["name"];
			$target_path = DIR_FS_PAGE_IMAGE_PATH."1-".$_FILES["cover_image"]["name"];
			if(!move_uploaded_file($_FILES["cover_image"]["tmp_name"],$target_path)){
				$error = true;
				echo "Error in Uploading File....";
			}
			
			if(!$error){
				$updSQL = "update homecontent set username = '".$_SESSION['username']."',modifieddate = now(),cover_image  = '".$upload."'";
			
				if(ets_db_query($updSQL)){
					//return true;
				}else{
					echo "Updating  page_master records query failed: ".ets_db_error();
					//return false;
				}
			
			}
		}
		
		return true;
	}

	function editpg_display(){
		$form = new Form("frmadd");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_Inline
		));
		
		$form->addElement(new Element_Hidden("controller", "pages"));
		$form->addElement(new Element_Hidden("action", "homecontent"));
		$form->addElement(new Element_Hidden("subaction", "editmaincontent"));
        $content = $this->fillpage();
        $form->addElement(new Element_Hidden("prevImage", $content['cover_image']));
	
		/* Actual Form Fields Started */
		$form->addElement(new Element_TinyMCE("", "page_content", array("value"=> stripslashes($content['x_contentvalue']))
			));
        $form->addElement(new Element_HTML('<br>'));
        if($content['cover_image'] != '')
        {
            $form->addElement(new Element_HTML('<img src="'.DIR_WS_PAGE_IMAGE_PATH.$content['cover_image'].'" width="10%" height="10%" >'));
        }
        $form->addElement(new Element_HTML('<br><br>'));
        $form->addElement(new Element_File("Browse Cover Image:", "cover_image", array( 
			"placeholder" => "Browse Cover Image"
			)));

		
		$form->addElement(new Element_HTML('<hr>'));
		$form->addElement(new Element_Button);
		$form->addElement(new Element_Button("Cancel", "button", array(
			"onclick" => "history.go(-1);"
		)));
		$form->render();
	}
}
?>