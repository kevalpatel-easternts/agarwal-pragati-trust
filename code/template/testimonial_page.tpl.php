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
        <!-- Icomoon Icons -->
        <link href="css/icons.css" rel="stylesheet">
   
        <!-- Custom Style -->
        <link href="css/style.css" rel="stylesheet">
       <link href="css/responsive.css" rel="stylesheet" />
        <!-- Color Scheme -->
        <link href="css/color.css" rel="stylesheet">
    </head>
    <body  class="footer-hidden">
        <div id="page">
            <!-- Top Bar -->
				<?php include "common/topbar.php"; ?>	
			<?php include "common/header.php"; ?>	

				 <section id="portfolio-header" class="no-pad">
            <div class="image-bg content-in" data-background="images/single.jpg"></div>
			<div class="overlay"></div>
                <div class="container">
               <div class="col-md-12 text-center">
                   <div class="section-title white animated fadeInUp visible" data-animation="fadeInUp">
             
                    <h1 class="title text-uppercase"><?php echo $pageTitle; ?></h1>
                </div>
					<p class="details">We welcome you to visit our company or anyway you like to contact us. We will provide you with the best quality service.</p>

                </div>
                </div>
         
        </section>
            <?php 	
							if(isset($content_include)) {
								include $content_include; 
							} else {
								echo do_shortcode(stripslashes($pageContent));
							} 
						?>

    </div>
  
			<?php include "common/footer.php"; ?>	
            <!-- request -->
 
        <!-- page -->
        <!-- Scripts -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- Menu jQuery plugin -->
       
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <!-- Sticky Menu -->	
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
     
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <!-- Parallax BG -->
        <script type="text/javascript"  src="js/jquery.parallax-1.1.3.js"></script>
        <!-- Fun Factor / Counter -->
  
        <!-- Custom Js Code -->
      
        <!-- Scripts -->
		<script src="js/jqueryvalidation/jquery.validate.min.js"></script>
<script src="js/jqueryvalidation/additional-methods.min.js"></script>
		  <script type="text/javascript" src="js/custom.js"></script>
   <script type="text/javascript">

	$(document).ready(function(){
        $(window).scroll(function(){

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