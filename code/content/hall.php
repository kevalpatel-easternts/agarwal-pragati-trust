<!------- visible-xs -------->
<section class="visible-xs hidden-sm hidden-md" style="margin-top:40px">
      <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="visible-xs hidden-md hidden-sm hidden-lg">
				<div id="accordion" class="panel-group">
		<?php
			if($page_res1['projectDescr'] != ""){
				$galImgo = DIR_WS_PROJECT_PATH.'1'.'/'.$page_res1['projectThumbnail'];
				
				echo '<div class="panel panel-default">
						<div class="panel-heading "><h4 class="panel-title "><a href="#overview" data-parent="#accordion" data-toggle="collapse" class="theme-color">Overview</a></h4></div>
						<div class="panel-collapse collapse in" id="overview">
							<div class="panel-body">		
								'.stripslashes($page_res1['projectDescr']).'<br>
								<img src="'.$galImgo.'" alt="" class="img-responsive">
							</div>
						</div>
					</div>';
			}
						
								echo '
				<div class="panel panel-default">
						<div class="panel-heading theme-color"><h4 class="panel-title"><a href="#floorplans" data-parent="#accordion" data-toggle="collapse" class="collapsed theme-color">Floor Plans</a></h4></div>
						<div class="panel-collapse collapse" id="floorplans">
							<div class="panel-body">
							';
							   $floor1 ="select * from project_gallery where projectID = '1' and status = 'E' and type = 'F' order by sortorder";

				   $floorqry1 = ets_db_query($floor1);  
							
                    
			  if(ets_db_num_rows ($floorqry1) > 0){
				  ?>
						<div class="row">
					<?php
				  	while($rsf = ets_db_fetch_array($floorqry1)) {
						$galImgf = "timthumb.php?src=".DIR_WS_PROJECT_PATH.'1'.'/'.$rsf['galleryImage']."&w=500&h=350&a=c";
					$large_imagef = DIR_WS_PROJECT_PATH.'1'."/".$rsf['galleryImage'];
			?>
								<div class="col-md-3 col-sm-6 col-xs-12 marbot30" >
    <div class="hovereffect">
		
        <img src="<?php echo $galImgf;?>" alt="" class="img-responsive">
		
            <div class="overlay text-center" >
				  
        
				<div class="inner-overlay-content with-icons workimg">
				<p class="overimgae"> 
					  <a href="<?php echo $large_imagef;?>" class="fancybox-pop" rel="portfolio-1" title="">
                                <i class="fa fa-search"></i>
                            </a> 
				</p>
            </div>
				</div>
    </div>
							<figcaption class="belowimg"><?php echo $rsf['galleryTitle'];?></figcaption>
</div>
				<?php		} ?>
					</div>
					<?php
								
				echo '
					</div></div></div>';
			}	
						echo '
				<div class="panel panel-default">
						<div class="panel-heading theme-color"><h4 class="panel-title"><a href="#gallery" data-parent="#accordion" data-toggle="collapse" class="collapsed theme-color">Gallery</a></h4></div>
						<div class="panel-collapse collapse" id="gallery">
							<div class="panel-body">
							';
	$gallery1 ="select * from project_gallery where projectID = '1' and status = 'E' and type = 'G' order by sortorder";

				   $galleryqry1 = ets_db_query($gallery1);    
                    
			  if(ets_db_num_rows ($galleryqry1) > 0){
					?>
					<div class="row">
						<?php
				  while($rsg = ets_db_fetch_array($galleryqry1)) {
						$galImgg = "timthumb.php?src=".DIR_WS_PROJECT_PATH.'1'.'/'.$rsg['galleryImage']."&w=500&h=350&a=c";
					$large_imageg = DIR_WS_PROJECT_PATH.'1'."/".$rsg['galleryImage'];	
				  ?>
					<div class="col-md-3 col-sm-6 col-xs-12 marbot30">
    <div class="hovereffect">
		
        <img src="<?php echo $galImgg;?>" alt="" class="img-responsive">
		
            <div class="overlay text-center" >
				  
        
				<div class="inner-overlay-content with-icons workimg">
				<p class="overimgae"> 
					  <a href="<?php echo $large_imageg;?>" class="fancybox-pop-gallery" rel="portfolio-1" title="">
                                <i class="fa fa-search"></i>
                            </a> 
				</p>
            </div>
				</div>
    </div>
</div>
<?php } ?>
		  </div>
					<?php } 
					
						echo '
					</div></div></div>';
					
			if($page_res1['projectMap'] != ""){
				
				echo '<div class="panel panel-default">
						<div class="panel-heading theme-color"><h4 class="panel-title"><a href="#location" data-parent="#accordion" data-toggle="collapse" class="collapsed theme-color">Location</a></h4></div>
						<div class="panel-collapse collapse" id="location" >
							<div class="panel-body">';	
                
						
								echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.709958358175!2d72.72035125958098!3d21.12412652633211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be052b7571a5659%3A0x46a368fde1b222e9!2sAgrawal+Pragati+Trust%2C+102%2FB%2C+T.P.82%2C+Opp.+Airport%2C+Dumas+Road%2C+Gaviyer%2C+Surat%2C+Gujarat+395007!5e0!3m2!1sen!2sin!4v1477293339666" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>';
							
				           
                          
                    
							    
					echo '</div>
						</div>
					</div>';
			}
					?>
		  </div>
			</div>
		  </div>
			</div>
	</div>
</section>



<!------- hidden xs -------->


<div class="hidden-xs">
	<?php
					
    	           $overview ="select * from projects where projectID = '1' and status = 'E' order by sortorder";

				   $overviewqry = ets_db_query($overview);    
                    
			  if(ets_db_num_rows ($overviewqry) > 0){
				  ?>
<section id="contact-us" class="page-section gray" style="margin-top:-10px;">
      <div class="container">
		<div class="row" style="padding-top:10px;">
			<div class="col-sm-7">
				<div class="section-title text-left mb-20">
                            <!-- Title -->
                            <h2 class="title theme-color">Overview</h2>
                        </div>
					<?php
				
			while($rs1 = ets_db_fetch_array($overviewqry)) {
			echo $rs1['projectDescr'];
			?>
			</div>
				<div class="col-sm-5">
					
					<img src="<?php echo DIR_WS_PROJECT_PATH.'1'.'/'.$rs1['projectThumbnail'];?>" class="img-responsive">
			</div>
			<?php } ?>
		  </div>
	 </div>
</section>
<?php } 
					
    	           $floor ="select * from project_gallery where projectID = '1' and status = 'E' and type = 'F' order by sortorder asc";

				   $floorqry = ets_db_query($floor);    
                    
			  if(ets_db_num_rows ($floorqry) > 0){
				  ?>
		
<!---------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------->				  
<!---------------------------------------------------------------------------------------------------------------->


<?php
if($get_object[3] != "")
 $page = $get_object[3];

else
 $page = 1;


$gallery_id = $get_object[2];
if($gallery_id == "all")
    $gqry = "Select count(*) as total from gallery_master_hall where status = 'E' order by sortorder asc";
		
else
    $gqry = "Select count(*) as total from gallery_master_hall where a_id = '".$gallery_id."' and status = 'E' order by sortorder asc";

$gres = ets_db_query($gqry) or die(ets_db_error());
$garr = ets_db_fetch_array($gres);

$total = $garr['total'];

$perPage = 9;

$total_pages = ceil((int)$total/(int)$perPage);
$start = $perPage * ($page - 1);

?> 
<section id="works" class="page-section" style="padding-bottom:30px;">
            <div class="container">
                
                <div class="section-title text-center">
                    <h2 class="title theme-color">Our Banquets</h2>
                </div>
                
                <div class="mixed-grid pad">
                    <div class="filter-menu">
                        <ul class="nav black works-filters text-center" id="filters">
							<?php
					$albums = array();
					$sql = "select * from album where status = 'E'  order by sortorder asc";
					$selectqry = ets_db_query($sql) or die(ets_db_error());
					if(ets_db_num_rows($selectqry) > 0){
						   if($gallery_id == "all")
                             echo ' <li class="active"><a  href="'.HTTP_SERVER.WS_ROOT.'the-hall/all">Show All</a></li>';
                        else    
                               echo ' <li><a  href="'.HTTP_SERVER.WS_ROOT.'the-hall/all" >Show All</a></li>';
						while($result = ets_db_fetch_assoc($selectqry)) { 
                             $id = $result['a_id'];
				             $link = HTTP_SERVER.WS_ROOT.'the-hall/'.$id;
                             $title = $result['a_title'];
							   $gqry = "Select * from gallery_master_hall where a_id = '".$id."' and status = 'E' order by sortorder asc";
                             $gres = ets_db_query($gqry) or die(ets_db_error());
                            //  echo "<pre>"; print_r($gres); echo "</pre>";
				              $num = ets_db_num_rows($gres);
                            
                            if($num > 0)
                             {
								  if($gallery_id == $id)
									   echo '<li class="active"><a class="filter" href = "'.$link.'">'.$title.'</a></li>'; 

                                  else
                                  echo '<li><a class="filter" href = "'.$link.'">'.$title.'</a></li>'; 	
                             }
                           
						}
					}
				?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
					<div class="row nomargin">
						 <?php
			
                if($gallery_id == "all")
                    $gqry = "Select * from gallery_master_hall where status = 'E' order by sortorder asc LIMIT ".$start.",".$perPage;

                else
                    $gqry = "Select * from gallery_master_hall where a_id = '".$gallery_id."' and status = 'E' order by sortorder asc LIMIT ".$start.",".$perPage;

                $gres = ets_db_query($gqry) or die(ets_db_error());
                $num = ets_db_num_rows($gres);
                $limit =9;
						 if($num > 0)
			    {
                    while($garr = ets_db_fetch_array($gres))
				    {
                        $image = DIR_WS_GALLERY_PATH.$garr['a_id'].'/'.$garr['gallery_image'];
                        // echo $garr['a_id'].'/'.$garr['gallery_image'];
                    ?>
		<div class="col-sm-6 col-md-6 col-lg-4 mb-30">
                                                        <div class="gallery-link gallery-div">
																<?php $img = "timthumb.php?src=".$image."&w=800&h=533&a=tl";?>
                                                             <img class="img-responsive"  src="<?php echo $image; ?>" alt="<?php echo $garr['image_title'];?>" title="<?php echo $garr['image_title'];?>"> 
                                                             <div class="gallery-hover">
                                                                <div class="row first-row">
                                                                    <div class="col-lg-12 col-sm-12 col-xs-12 text-center">
                                                                        <a href="<?php echo $image;?>" class="search-icon fancybox-pop" rel="portfolio-1" title="<?php echo $garr['image_title'];?>"><i class="fa fa-search"></i></a>
                                                                    </div>
                                                                </div>
                                                               
                                                             </div>
                                                            
                                                        </div>
                                                        
                                                 	<figcaption class="belowimg"><?php echo $garr['image_title'];?></figcaption>
                                                        
                                                </div>
						  <?php
                    }
                }
                else{                
                    header('Location:'.HTTP_SERVER.WS_ROOT.'the-hall/all/');
                }
                ?>
						 <?php 
					if($total_pages > 1 && $page <= $total_pages)
					{
						echo '
						      <center style="clear: both;margin-bottom:-8px;">
                                <ul class="pagination">
                                    <li><a href="javascript:void(0);"><i class="icon fa fa-angle-left"></i></a></li>
						';
						
						for($k = 1;$k <= $total_pages;$k++)
						{
							if($k == $page)
							{
								echo ' <li class="active">
                                        <a href="'.HTTP_SERVER.WS_ROOT.'the-hall/'.$gallery_id.'/'.$k.'">'.$k.'</a>
                                    </li>';	
							}
							else
							{
								echo ' <li>
                                        <a href="'.HTTP_SERVER.WS_ROOT.'the-hall/'.$gallery_id.'/'.$k.'">'.$k.'</a>
                                    </li>';	
							}
							
						}
                                   
                                    
                        echo  '<li><a href="javascript:void(0);"><i class="icon fa fa-angle-right"></i></a></li>
                                </ul></center>
                            
						';
					}
            ?>
		
					</div>
                    
                </div>
            </div>
        </section>


<!---------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------->



<?php } $parallax ="select * from projects where projectID = '1' and status = 'E' order by sortorder";

				   $parallaxqry = ets_db_query($parallax);    
                    
			  if(ets_db_num_rows ($parallaxqry) > 0){
				  		
			while($rs5 = ets_db_fetch_array($parallaxqry)) {
                     $locationImg = DIR_WS_PROJECT_PATH.'1'."/".$rs5['projectParallax'];
   
				  ?>
		 <section id="portfolio-header" class="no-pad detailpara">
            <div class="image-bg content-in" data-background="<?php echo  $locationImg; ?>" data-stellar-background-ratio="0.5"></div>
             <div class="overlay"></div>
			
                <div class="container">
               <div class="col-md-12 text-center">
                  
						<div class="section-title text-center">
                            
                            <h2 class="title ">Banquet</h2>
                        </div>
				<?php echo $rs5['parallaxDescr']; ?>

                </div>
                </div>
         
        </section>
<?php } }

$gallery ="select * from project_gallery where projectID = '1' and status = 'E' and type = 'G' order by sortorder";

				   $galleryqry = ets_db_query($gallery);    
                    
			  if(ets_db_num_rows ($galleryqry) > 0){
				  ?>
			 <section class="page-section gray" style="padding-bottom:20px;">
      <div class="container">
		<div class="row">
				<div class="section-title text-center">
                            
                            <h2 class="title theme-color">Gallery</h2>
                        </div>
			<?php
				
			while($rs3 = ets_db_fetch_array($galleryqry)) {
						$galImg2 = "timthumb.php?src=".DIR_WS_PROJECT_PATH.'1'.'/'.$rs3['galleryImage']."&w=500&h=350&a=c";
					$large_image1 = DIR_WS_PROJECT_PATH.'1'."/".$rs3['galleryImage'];	


			?>
					<div class="col-md-3 col-sm-6 col-xs-12 marbot30" id="hallgalleryimages">
    <div class="hovereffect">
		
        <img src="<?php echo $galImg2;?>" alt="" class="img-responsive">
		
            <div class="overlay text-center" >
				  
        
				<div class="inner-overlay-content with-icons workimg">
				<p class="overimgae"> 
					  <a href="<?php echo $large_image1;?>" class="fancybox-pop-gallery" rel="portfolio-1" title="<?php echo $rs3['galleryTitle']; ?>">
			
                                <i class="fa fa-search"></i>
                            </a> 
				</p>
            </div>
				</div>
    </div>
							<figcaption class="belowimg"><a href="<?php echo $large_image1;?>" class="fancybox-pop-gallery1" rel="portfolio-1"  title="<?php echo $rs3['galleryTitle']; ?>"><?php echo $rs3['galleryTitle'];?></a></figcaption>
</div>
<?php } ?>
		  </div>
	 </div>
</section>
<?php } ?>
  
		  <section class="page-section  white1">
      <div class="container">
		<div class="row">
				<div class="section-title text-center">
                            
                            <h2 class="title theme-color">Location</h2>
                        </div>
			<center>
                <div id="canvas1" class="map">
			<iframe id="map_canvas1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.709958358175!2d72.72035125958098!3d21.12412652633211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be052b7571a5659%3A0x46a368fde1b222e9!2sAgrawal+Pragati+Trust%2C+102%2FB%2C+T.P.82%2C+Opp.+Airport%2C+Dumas+Road%2C+Gaviyer%2C+Surat%2C+Gujarat+395007!5e0!3m2!1sen!2sin!4v1477293339666" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
			</center>
		  </div>
			  </div>
			</section>

	</div>