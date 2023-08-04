

             <?php
					
    	           $slider ="select * from project_gallery where projectID = '1' and status = 'E' and type = 'S' order by sortorder";

				   $sliderqry = ets_db_query($slider);    
                    
			  if(ets_db_num_rows ($sliderqry) > 0){
				  ?>
		<section class="slider">
            <div id="main-slider">
                <div id="owl-demo" class="owl-carousel custom-styles" data-effect="backSlide" data-items="1" data-pagination="false" data-navigation="true">
								<?php
				
			while($rs = ets_db_fetch_array($sliderqry)) {
						$galImg = "timthumb.php?src=".DIR_WS_PROJECT_PATH.'1'.'/'.$rs['galleryImage']."&w=500&h=350&a=c";


			?>
                    <div class="item">
                        <a href="#">
                            <img src="<?php echo $galImg; ?>" alt="" />
                        </a>
                    </div>
                    <?php 
			}
			 
					?>
                </div>
            </div>
        </section>


<?php } ?>