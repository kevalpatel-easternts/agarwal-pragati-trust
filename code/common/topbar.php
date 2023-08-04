<?php
$web_arr = get_website_details();
?>   	
<div id="top-bar" class="top-bar-section top-bar-bg-color hidden-xs">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							
							<div class="top-contact link-hover-black">
							<a href="tel:<?php echo $web_arr['tel1'];?>" class="f-12">
							    <i class="fa fa-phone"></i><?php echo $web_arr['tel1'];?>&nbsp;&nbsp;|
						    </a>
							<a href="tel:<?php echo $web_arr['tel2'];?>" class="f-12">
						    	<?php echo $web_arr['tel2'];?>
					    	</a> 
							<a href="mailto:<?php echo $web_arr['email1'];?>" class="f-12">
							<i class="fa fa-envelope"></i><?php echo $web_arr['email1'];?></a></div>
						
							<div class="top-social-icon icons-hover-black">
							<a  href="https://www.facebook.com/Agrawal-Pragati-Trust-203972603361500/" target="_blank">
								<i class="fa fa-facebook"></i>
							</a> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Top Bar -->
