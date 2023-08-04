<?php
if($get_object[3] != "")
 $page = $get_object[3];

else
 $page = 1;


$gallery_id = $get_object[2];
if($gallery_id == "all")
    $gqry = "Select count(*) as total from gallery_master where status = 'E' order by sortorder desc";
		
else
    $gqry = "Select count(*) as total from gallery_master where a_id = '".$gallery_id."' and status = 'E' order by sortorder desc";

$gres = ets_db_query($gqry) or die(ets_db_error());
$garr = ets_db_fetch_array($gres);

$total = $garr['total'];

$perPage = 9;

$total_pages = ceil((int)$total/(int)$perPage);
$start = $perPage * ($page - 1);

?> 
<section id="works" class="page-section" style="padding-bottom:30px;">
            <div class="container">
                <div class="mixed-grid pad">
                    <div class="filter-menu">
                        <ul class="nav black works-filters text-center" id="filters">
							<?php
					$albums = array();
					$sql = "select * from album where status = 'E'  order by sortorder asc";
					$selectqry = ets_db_query($sql) or die(ets_db_error());
					if(ets_db_num_rows($selectqry) > 0){
						   if($gallery_id == "all")
                             echo ' <li class="active"><a  href="'.HTTP_SERVER.WS_ROOT.'gallery/all">Show All</a></li>';
                        else    
                               echo ' <li><a  href="'.HTTP_SERVER.WS_ROOT.'gallery/all" >Show All</a></li>';
						while($result = ets_db_fetch_assoc($selectqry)) { 
                             $id = $result['a_id'];
				             $link = HTTP_SERVER.WS_ROOT.'gallery/'.$id;
                             $title = $result['a_title'];
							   $gqry = "Select * from gallery_master where a_id = '".$id."' and status = 'E' order by sortorder desc";
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
                                $gqry = "Select * from gallery_master where status = 'E' order by sortorder desc LIMIT ".$start.",".$perPage;
            
                            else
                                $gqry = "Select * from gallery_master where a_id = '".$gallery_id."' and status = 'E' order by sortorder desc LIMIT ".$start.",".$perPage;
            
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
                                            <a href="<?php echo $image;?>" class="search-icon fancybox-pop" rel="portfolio-1" title="<?php echo $garr['image_title'];?>"><i class="fa fa-search-plus"></i></a>
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
                            header('Location:'.HTTP_SERVER.WS_ROOT.'gallery/all/');
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
                                                <a href="'.HTTP_SERVER.WS_ROOT.'gallery/'.$gallery_id.'/'.$k.'">'.$k.'</a>
                                            </li>';	
        							}
        							else
        							{
        								echo ' <li>
                                                <a href="'.HTTP_SERVER.WS_ROOT.'gallery/'.$gallery_id.'/'.$k.'">'.$k.'</a>
                                            </li>';	
        							}
        							
        						}
                                           
                                            
                                echo  '<li><a href="javascript:void(0);"><i class="icon fa fa-angle-right"></i></a></li>
                                        </ul></center>
                                    
        						';
        					}
                    ?>

			
<!--
							<div class="col-md-4 col-sm-6 col-xs-12 pad44">
    <div class="hovereffect">
        <img src="img/sections/portfolio/b1.jpg" alt="Recent Work" class="img-responsive" />
            <div class="overlay" style="text-align:center;">
				  
        
				<div class="inner-overlay-content with-icons workimg">
				<p class="overimgae"> 
					  <a href="img/sections/portfolio/b1.jpg" data-rel="prettyPhoto[portfolio]">
                                <i class="fa fa-search"></i>
                            </a> 
				</p>
            </div>
				</div>
    </div>
</div>
							<div class="col-md-4 col-sm-6 col-xs-12 pad44">
    <div class="hovereffect">
        <img src="img/sections/portfolio/b1.jpg" alt="Recent Work" class="img-responsive" />
            <div class="overlay" style="text-align:center;">
				  
        
				<div class="inner-overlay-content with-icons workimg">
				<p class="overimgae"> 
					  <a href="img/sections/portfolio/b1.jpg" data-rel="prettyPhoto[portfolio]">
                                <i class="fa fa-search"></i>
                            </a> 
				</p>
            </div>
				</div>
    </div>
</div>
-->
		
					</div>
                    
                </div>
            </div>
        </section>
        <!-- works -->