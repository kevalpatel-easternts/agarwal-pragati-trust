<?php
//print_r($per);
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	/* Start Products Master*/
	if($_REQUEST['action'] == 'products'){
		$products = new products();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($products->add()){
					echo'<script>location.href="index.php?controller=products&action=products&subaction=listData&pTypeID='.$_REQUEST['pTypeID'].'";</script>';
				}
				break;
			case 'addForm':
					$products->addForm();
				break;
			case 'edit':
				if($products->edit()){
					echo'<script>location.href="index.php?controller=products&action=products&subaction=listData&pTypeID='.$_REQUEST['pTypeID'].'";</script>';
				}
				break;
			case 'editForm':
				
					$products->editForm();
				
				break;				
			case 'listData':
				
					$products->listData();
				
				break;
			case 'delete':
				
					if($products->delete()){
						echo'<script>location.href="index.php?controller=products&action=products&subaction=listData&pTypeID='.$_REQUEST['pTypeID'].'";</script>';
					}
				
				break;
		}
	}
	

	/* Start Product Type Master*/
	if($_REQUEST['action'] == 'producttype'){
		$producttype = new producttype();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($producttype->add()){
					echo'<script>location.href="index.php?controller=products&action=producttype&subaction=listData";</script>';
				}
				break;
			case 'addForm':
				
					$producttype->addForm();
				
				break;
			case 'edit':
				if($producttype->edit()){
					echo'<script>location.href="index.php?controller=products&action=producttype&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'editForm':
				
					$producttype->editForm();
				
				break;				
			case 'listData':
				
					
					$producttype->listData();
				
				break;
			case 'delete':
				
					if($producttype->delete()){
						echo'<script>location.href="index.php?controller=products&action=producttype&subaction=listData&msg=addmsg";</script>';
					}
				
				break;
		}
	}
	/* Start Product Options Master*/
	if($_REQUEST['action'] == 'productoptions'){
		$productoptions = new productoptions();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($productoptions->add()){
					echo'<script>location.href="index.php?controller=products&action=productoptions&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$productoptions->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($productoptions->edit()){
					echo'<script>location.href="index.php?controller=products&action=productoptions&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$productoptions->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;				
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$productoptions->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($productoptions->delete()){
						echo'<script>location.href="index.php?controller=products&action=productoptions&subaction=listData&msg=addmsg";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	/* Start Product Images Master*/
	if($_REQUEST['action'] == 'productimages'){
		$productimages = new productimages();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($productimages->add()){
					echo'<script>location.href="index.php?controller=products&action=productimages&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'addForm':
				
					$productimages->addForm();
				
				break;
			case 'edit':
				if($productimages->edit()){
					echo'<script>location.href="index.php?controller=products&action=productimages&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'editForm':
				
					$productimages->editForm();
				
				break;
			case 'listData':
				
					$productimages->listData();
				
				break;
			case 'delete':
				
					if($productimages->delete()){
						echo'<script>location.href="index.php?controller=products&action=productimages&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
					}
				
				break;
		}
	}
	if($_REQUEST['action'] == 'productfloors'){
		$productfloors = new productfloors();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($productfloors->add()){
					echo'<script>location.href="index.php?controller=products&action=productfloors&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'addForm':
				
					$productfloors->addForm();
				
				break;
			case 'edit':
				if($productfloors->edit()){
					echo'<script>location.href="index.php?controller=products&action=productfloors&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'editForm':
				
					$productfloors->editForm();			
				
				break;
			case 'listData':
				
					$productfloors->listData();
				
				break;
			case 'delete':
				
					if($productfloors->delete()){
						echo'<script>location.href="index.php?controller=products&action=productfloors&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
					}
				
				break;
		}
		
	}
	if($_REQUEST['action'] == 'productgallery'){
		$productgallery = new productgallery();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($productgallery->add()){
					echo'<script>location.href="index.php?controller=products&action=productgallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'addForm':
				
					$productgallery->addForm();
				
				break;
			case 'edit':
				if($productgallery->edit()){
					echo'<script>location.href="index.php?controller=products&action=productgallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'editForm':
				
					$productgallery->editForm();
				
				break;
			case 'listData':
				
					$productgallery->listData();
				
				break;
			case 'delete':
				
					if($productgallery->delete()){
						echo'<script>location.href="index.php?controller=products&action=productgallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
					}
				
				break;
		}
	}
	if($_REQUEST['action'] == 'productsitegallery'){
		$productsitegallery = new productsitegallery();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($productsitegallery->add()){
					echo'<script>location.href="index.php?controller=products&action=productsitegallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'addForm':
			
					$productsitegallery->addForm();
				
				break;
			case 'edit':
				if($productsitegallery->edit()){
					echo'<script>location.href="index.php?controller=products&action=productsitegallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'editForm':
				
					$productsitegallery->editForm();
				
				break;
			case 'listData':
				
					$productsitegallery->listData();
				
				break;
			case 'delete':
				
					if($productsitegallery->delete()){
						echo'<script>location.href="index.php?controller=products&action=productsitegallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
					}
				
				break;
		}
	}
    
    if($_REQUEST['action'] == 'productcampaigngallery'){
		$productcampaigngallery = new productcampaigngallery();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($productcampaigngallery->add()){
					echo'<script>location.href="index.php?controller=products&action=productcampaigngallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'addForm':
			
					$productcampaigngallery->addForm();
				
				break;
			case 'edit':
				if($productcampaigngallery->edit()){
					echo'<script>location.href="index.php?controller=products&action=productcampaigngallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'editForm':
				
					$productcampaigngallery->editForm();
				
				break;
			case 'listData':
				
					$productcampaigngallery->listData();
				
				break;
			case 'delete':
				
					if($productcampaigngallery->delete()){
						echo'<script>location.href="index.php?controller=products&action=productcampaigngallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
					}
				
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>
