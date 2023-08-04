<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<title><?php echo $title; ?></title>
		<meta name="keywords" content="<?php echo $keyword; ?>">
		<meta name="description" content="<?php echo $description; ?>">
		<base href="<?php echo HTTP_SERVER.WS_ROOT ;?>">
       
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.png">
        <!-- Font -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:300,400,700,400italic,700italic'>
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <!-- Font Awesome Icons -->
        <link href='css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/hover-dropdown-menu.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet" />
        <!-- Icomoon Icons -->
        <link href="css/icons.css" rel="stylesheet">
   		<link href="css/owl/owl.carousel.css" rel="stylesheet" />
        <link href="css/owl/owl.theme.css" rel="stylesheet" />
        <link href="css/owl/owl.transitions.css" rel="stylesheet" />
        <!-- Custom Style -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/color.css" rel="stylesheet">
		<script src="js/modernizr.custom.js"></script>
		<!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-HH85BCSHDB"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'G-HH85BCSHDB');
        </script>
    </head>
	<style>
		#news h4{font-size: 18px;}
		.quote blockquote {color: #fff}
		.client-details span{color:#fff}
		.quote blockquote {
    margin: 0;
    padding: 0 0 0 34px;
}
		
.quote blockquote {
    color: #ccc;
}
		.text-color{color: #fff}
		@media(min-width:1200px){
		.owl-wrapper-outer{min-height: 500px !important}
		}
	</style>
	 
    <body  class="footer-hidden">
     
  <div id="page">
			<?php include "common/loader.php"; ?>	
            <!-- Top Bar -->
				<?php include "common/topbar.php"; ?>	
			<?php include "common/header.php"; ?>	
	 <?php include "common/slider.php"; ?>	
	  <section id="about-us" class="page-section animated fadeInUp visible gray" data-animation="fadeInUp" style="margin-top: -10px;">
<!--
		  <div class="pattern_overlay" style="background-position: center;background-image:url('images/pattern-01.png');opacity:0.8"></div>
		  <div class="bg_overlay " style="opacity:0.8;"></div>
-->
            <div class="container">
                <div class="section-title animated fadeInUp visible" data-animation="fadeInUp">
                    <h2 class="title theme-color">About Agarwal Pragati Trust</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center animated fadeInUp visible" data-animation="fadeInUp">
                        <!-- Text -->
						
						<?php

$Sql = ets_db_query("SELECT * FROM page_master where status = 'E' and page_id = '10'") or die(ets_db_error());

if(ets_db_num_rows($Sql) > 0){

			while($prs = ets_db_fetch_array($Sql)){
            
				if(strlen($prs['page_content']) > 700)
																												{
																													$description = substr(stripslashes($prs['page_content']),0,700).'...';
																												}
																												else
																												{
																													$description = stripslashes($prs['page_content']);
																												}
				?>
							
		<p class="justify">Agarwal Pragati Trust Surat was founded in 2012 with a view to providing better social, financial, educational and medical growth to people of Surat. The trust was formed on 01/01/2012. After formation, 4784 sq yard plot was acquired near Airport at Dumas Village for the construction of Modern Bhawan for the community. This is a fast upcoming area of Surat. The trust was registered with Income tax...</p>
						<?php 
			}
}
						?>
						<div class="text-center mt-20">
							<a  href="<?php echo get_pageseo_url('10','pages'); ?>"  class="wow fadeInUp delay-400 btn-medium btn-border-black" type="submit">Read More</a>
						
							</div>
                    </div>
                </div>
		  </div>
	  </section>
	   <section id="clients" class="page-section animated fadeInUp visible padbot30" data-animation="fadeInUp" >
            <div class="container">
                <div class="row" style="align-items: center;display: flex;">
						<?php

$Sql1 = ets_db_query("SELECT * FROM homecontent where status = 'E'") or die(ets_db_error());

if(ets_db_num_rows($Sql1) > 0){

			while($r1 = ets_db_fetch_array($Sql1)){
				?>
            
                    <div data-appear-animation="fadeInLeft" class="col-md-6 col-sm-6 text-center appear-animation fadeInLeft appear-animation-visible animated visible marbot12" data-animation="fadeInLeft">
                        <!-- Image -->
						
                        <img src="<?php echo DIR_WS_PAGE_IMAGE_PATH.$r1['cover_image']; ?>" class="img-responsive">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="section-title text-left animated fadeInRight visible" data-animation="fadeInRight">
                            <!-- Title -->
                            <h2 class="title theme-color">About Maharaja Agrasen </h2>
                        </div>
                        <!-- Content -->
                    <?php echo $r1['home_content']; ?>
                    </div>
					<?php 
			}
}
				?>
                </div>
            </div>
        </section>
	 
	  
	     <section id="works" class="page-section" style="padding:85px 0px">
            <div class="image-bg content-in fixed" data-background="images/about-home-page.png">
                <div class="overlay"></div>
            </div>
            <div class="container work-section">
                <div class="section-title white" data-animation="fadeInUp">
                    <!-- Heading -->
                    <h2 class="title">About Banquet</h2>
                </div>
				<div class="row">
				<div class="col-sm-12">
<!--
             <div class="owl-carousel pagination-1 dark-switch text-center" data-pagination="true" data-autoplay="true" data-navigation="false" data-items="1">
				
                            <div class="item">
-->
                                <div class="quote" style="    margin-top: -22px;">
                                    <blockquote class="small-text"><strong>APT</strong> has a dedicated team of Members for  serving society.</blockquote>
                                   
                                </div>
<!--
                                <div class="client-details text-center">
                                  
                                    <div class="client-details">
                                    
                                    <strong class="text-color"><?php echo $rs['name']; ?></strong> 
                                 
                                     

										</div>
                                </div>
-->
<!--
                            </div>
                         
                        </div>
-->
                    </div>
            </div>
           </div>
				
        </section>
	  <section id="news" class="page-section">
            <div class="container">
			<div class="section-title animated fadeInUp visible" data-animation="fadeInUp">
                        <h2 class="title theme-color">News & Events</h2>
                    </div>
                <div class="col-sm-12 marbot6">

	   <div class="row" data-animation="fadeInUp">
                       <?php
		$selectsql = "select * from news where news_type = '1' and status = 'E' order by sortorder asc LIMIT 4" ;
		$selectqry = ets_db_query($selectsql) or die(ets_db_error());
		if(ets_db_num_rows($selectqry) > 0){
			while($result = ets_db_fetch_assoc($selectqry)) {
			?>
                        <!-- post -->
                        <div class="col-sm-3">
                           
                            <h4 class="mb-6 theme-color">
                                <a class="theme-color" href="#"><?php echo $result['news_title']; ?></a>
                            </h4>
                            <p><?php echo stripslashes($result['news_desc']); ?></p>
                            <div class="meta mt-10">
                            <!-- Meta Date -->
                            <span class="time"><i class="fa fa-calendar"></i> <?php echo date('d-m-Y',strtotime($result['eve_date'])); ?></span> 
                            <span class="pull-right">
                            
                          
							</span>
						</div>
                        </div>
		  <?php } } ?>
    </div>
						<div class="text-center mt-20">
							<a  href="<?php echo HTTP_SERVER.WS_ROOT.'News';?>"   class="wow fadeInUp delay-400 btn-medium btn-border-black" type="submit">Read More</a>
							</div>
					
				</div>
		  </div>
	  </section>
		</div>
  
			<?php include "common/footer.php"; ?>	
            <!-- request -->
 
        <!-- page -->
    
		 <script src="js/jquery-1.10.2.min.js"></script>
		 <script type="text/javascript" src="js/bootstrap.min.js"></script>
		 
        <!-- Menu jQuery plugin -->
        
        <!-- Scroll Top Menu -->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <!-- Sticky Menu -->	
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
     		<script src="js/owl.carousel.min.js"></script>
     		
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <!-- Parallax BG -->
		<script src="js/jquery.dlmenu.js"></script>
        <script type="text/javascript"  src="js/jquery.parallax-1.1.3.js"></script>
		<script src="js/jqueryvalidation/jquery.validate.min.js"></script>
		<script src="js/jqueryvalidation/additional-methods.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
   <script type="text/javascript">

	$(document).ready(function(){
        $(window).scroll(function(){
 			$('.scrollup').css('z-index','10');
            if ($(this).scrollTop() > 600) {

               $('.scrollup').fadeIn();

            } else {

                $('.scrollup').fadeOut();
            }

        });
        $('.scrollup').click(function(e){
			e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, 600);

            return false;

        });
  
    });
	  
	</script>

</body>
</html>