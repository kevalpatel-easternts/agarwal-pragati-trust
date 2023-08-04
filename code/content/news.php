 <section id="contact-us" class="page-section2">
                <div class="container">
					<div class="row">
								<div class="col-sm-12">
<div class="news">
	<?php
		$selectsql = "select * from news where news_type = '1' and status = 'E' order by sortorder asc" ;
		$selectqry = ets_db_query($selectsql) or die(ets_db_error());
		if(ets_db_num_rows($selectqry) > 0){
			while($result = ets_db_fetch_assoc($selectqry)) {
			?>
				<div class="panel panel-default">
					 <div class="panel-heading"><h3 class="panel-title"><span class="date1"><?php echo date('d-m-Y',strtotime($result['eve_date'])); ?></span><span class="title theme-color fw-400" id="title"><?php echo $result['news_title']; ?></span></h3></div>
						<div class="panel-body">					
								<p><?php echo stripslashes($result['news_desc']); ?></p> 
							</div>
			</div>
	<?php
			}
		}else{
		}
	?>
			</div>
						</div>
					</div>
	 </div>
</section>
	 