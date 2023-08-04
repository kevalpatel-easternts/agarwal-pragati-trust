          <section id="contact-us" class="page-section">
                <div class="container">
					<div class="row">
                        <div class="col-sm-6 col-md-8">
							<div class="row">
								<div class="col-sm-6 col-md-4">
									 <address>
										<h5 class="title theme-color"><i class="icon-map-pin text-color theme-color"></i> Address</h5>
									102/B, T.P.82, Opp. Airport, <br>
										 Dumas Road, Surat - 395007 <br>
										 Gujarat, India. <br>
									
									</address>
								</div>
								<div class="col-sm-6 col-md-4">
									<h5 class="title theme-color"><i class="icon-phone10 text-color theme-color"></i> Phone</h5>
									<div><a href="tel:<?php echo $web_arr['tel1'];?>"><?php echo $web_arr['tel1'];?> - Booking</a></div>
									<div><a href="tel:<?php echo $web_arr['tel2'];?>"><?php echo $web_arr['tel2'];?> - Inquiry</a></div>
								
								</div>
								<div class="col-sm-6 col-md-4">
									<h5 class="title theme-color"><i class="icon-envelope7 text-color theme-color"></i> Email</h5>
									<div><a href="mailto:<?php echo $web_arr['email1'];?>" class="inherit"><?php echo $web_arr['email1'];?></a></div>
								</div>
							</div>
							<hr>
							<p class="text-justify">Agrawal Pragati Trust Surat was founded in 2012 with the object of providing social, financial, educational, medical help and overall growth to society.</p>
							<p class="text-justify">Please fill up a form and we shall get back to you as soon as we can.</p>
						</div>
						<div class="col-sm-6 col-md-4">							
							
							<div class="contact-form">
								<!-- Form Begins -->
							        <form id="contact-form" name="contact-form" role=form  action="sendmail.php">
										<!-- Field 1 -->
										<div class="input-text form-group">
											<input type="text" name="contact_name" id="contact_name" class="input-name form-control" placeholder="Name*" required/>
										</div>
										<!-- Field 2 -->
										<div class="input-email form-group">
											<input type="email" name="contact_email" id="contact_email" class="input-email form-control" placeholder="Email Address*" required/>
										</div>
										<!-- Field 3 -->
										<div class="input-email form-group">
											<input type="text" name="contact_subject" class="input-phone form-control" id="contact_subject" placeholder="Subject*" required/>
										</div>
										<div class="input-email form-group">
											<input type="text" name="contact_phone" id="contact_phone" class="input-phone form-control" placeholder="Mobile Number*" required/>
										</div>
										<!-- Field 4 -->
										<div class="textarea-message form-group">
											<textarea name="contact_message" id="contact_message"  class="textarea-message form-control" placeholder="Message*" rows="2" required></textarea>
										</div>
										<!-- Button -->
										<button class="nobg">
							<a class="wow fadeInUp delay-400 btn-medium btn-border-black" type="submit"  id="submit">Leave us your Message</a>
					</button>
<!--										<button class="btn btn-default" type="submit" id="submit">Send Now <i class="icon-paper-plane"></i></button>-->
									
								</form>
								 	<div id = "alert_div" class="display-none"></div>
								<!-- Form Ends -->
							</div>
					</div>
                </div>
				</div>
            </section><!-- page-section -->