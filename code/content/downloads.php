 <section id="contact-us" class="page-section">
                <div class="container">
					<div class="row">
								<div class="col-sm-12 col-xs-12 col-md-9">
<div class="news">
	<?php
		$selectsql = "select * from downloads where status = 'E' order by sortorder desc" ;
		$selectqry = ets_db_query($selectsql) or die(ets_db_error());
		if(ets_db_num_rows($selectqry) > 0){
			while($result = ets_db_fetch_assoc($selectqry)) {
		
			echo '<table width="100%" class="table table-bordered">';
            
			  
				echo '<tr class="themebg"><td><a class="download-icon" title="Download '.$result['download_title'].'" href="'.DIR_WS_UPLOAD_PATH.$result['image'].'" target="_blank">'.'<span style="color:inherit">Click here to download the </span>'.$result['title'].'</a></td><td width="30"><a class="download-icon" title="Download '.$result['title'].'" href="'.DIR_WS_UPLOAD_PATH.$result['image'].'" target="_blank"><i class="fa fa-file-pdf-o"></i></a></td></tr>';
	

	
			echo '</table>';	
						}
		}
			
	?>
			</div>
						</div>
							<div class="hidden-sm hidden-xs col-md-3 marbot30" id="side">
			<div class="widget">
                        <div class="widget-search-causes">
                            <div class="box-wrapper">
                                <div class="box">

                                    <!-- widget title -->
                                    <div class="widget-title">
                                        <h5 class="theme-color">Media</h5>
                                    </div>
                                    <!-- .widget title -->

                                    <!-- widget box -->
                                    <div class="widget-box">
                                        <ul class="list-unstyled">
					<li><a href="<?php echo HTTP_SERVER.WS_ROOT.'News';?>">News & Events</a></li>
					<li><a href="<?php echo HTTP_SERVER.WS_ROOT.'gallery/all';?>">Photo Gallery</a></li>
<!--					<li><a href="<?php echo HTTP_SERVER.WS_ROOT.'videogallery';?>">Video Gallery</a></li>-->
					<li><a href="<?php echo HTTP_SERVER.WS_ROOT.'downloads';?>">Downloads</a></li>
                                          
                                        </ul>
                                    </div>
                                    <!-- .widget box -->

                                </div>
                            </div>
                        </div>
                    </div>
			</div>
					</div>
	 </div>
</section>
	 