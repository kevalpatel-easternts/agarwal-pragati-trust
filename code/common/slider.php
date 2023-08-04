   <div class="clearfix"></div>
     <section class="slider hidden-sm hidden-md visible-xs" id="home">
     
                <div id="main-slider">
                    <div id="owl-demo" class="owl-carousel custom-styles" data-effect="fade" data-singleItem="true" data-pagination="false" data-navigation="true">
                        	<?php
		$selectsql = "select * from sliderimage where status = 'E' order by sortorder desc";
		$selectqry = ets_db_query($selectsql) or die(ets_db_error());
		if(ets_db_num_rows($selectqry) > 0){
			while($result = ets_db_fetch_assoc($selectqry)) {
		?>
                       <div class="item">
<!--                            <div class="overlay"></div>-->
                         
                                <img src="<?php echo DIR_WS_SLIDER_PATH.$result['image']; ?>" alt="" class="img-responsive" />
                        </div>
                    	<?php		
		}
	}
	?>
                    </div>
                </div>
            </section>
           <section class="slider visible-sm visible-md hidden-xs" id="home">
     
                <div id="main-slider">
                    <div id="owl-demo1" class="owl-carousel custom-styles" data-effect="fade" data-singleItem="true" data-pagination="false" data-navigation="true">
                        	<?php
		$selectsql = "select * from sliderimage where status = 'E' order by sortorder desc";
		$selectqry = ets_db_query($selectsql) or die(ets_db_error());
		if(ets_db_num_rows($selectqry) > 0){
			while($result = ets_db_fetch_assoc($selectqry)) {
		?>
                       <div class="item">
<!--                            <div class="overlay"></div>-->
                         
                                <img src="<?php echo DIR_WS_SLIDER_PATH.$result['image']; ?>" alt="" class="img-responsive" />
                        </div>
                    	<?php		
		}
	}
	?>
                    </div>
                </div>
            </section>