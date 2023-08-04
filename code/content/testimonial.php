<section id="contact-us" class="page-section">
                <div class="container">
					<div class="row" id="testimonial">
								<div class="col-sm-12">
									<?php
	$sql ="select * from testimonial where status = 'E' order by sortorder desc";
	$sqlquery = ets_db_query($sql);         
	while($rs = ets_db_fetch_array($sqlquery)) {
?>
									<section class="grayarea">
		<div class="cbp-qtrotator  fadeInRight ">
		
			<blockquote class="martop9">
				<p class="bigquote text-left" style="display:inline;">
					
					<i class="icon-quote-left colortext quoteicon"></i><div class="margin"><?php echo $rs['review'];?></div>
				</p>
				<footer><?php echo $rs['name']; ?> </footer>
			</blockquote>
		</div>
		</section>
						<?php } ?>
						</div>
					</div>
	</div>
</section>