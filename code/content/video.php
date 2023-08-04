 <section id="" class="page-section">
                <div class="container">
					<div class="row">
	<div class="col-sm-12 text-center">

	<?php
		$selectsql = "select * from video where status = 'E' order by sortorder desc" ;
		$selectqry = ets_db_query($selectsql) or die(ets_db_error());
		if(ets_db_num_rows($selectqry) > 0){
			while($result = ets_db_fetch_assoc($selectqry)) {
			?>
										
												<h5 class="theme-color"><?php echo $result['video_title']; ?></h5>
													
						<?php echo $result['video_desc']; ?>
						
				

	<?php
			}
		}
	?>
			
					</div>
                    </div>
	 </div>
</section>
	 