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
   		<link href="css/owl/owl.carousel.css" rel="stylesheet" />
        <link href="css/owl/owl.theme.css" rel="stylesheet" />
        <link href="css/owl/owl.transitions.css" rel="stylesheet" />
        <!-- Custom Style -->
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
       <link href="css/style.css" rel="stylesheet">
       <link href="css/responsive.css" rel="stylesheet" />
        <!-- Color Scheme -->
        <link href="css/color.css" rel="stylesheet">
		<script src="js/modernizr.custom.js"></script>
          <style>
    .scrolloff {
        pointer-events: none;
    }
/*			  .hovereffect{min-height: 43vh;}		  */
.owl-theme .owl-controls{display: none !important}
		</style>
    </head>
    <body  class="footer-hidden">
        <div id="page">
            <!-- Top Bar -->
			   <?php include "common/loader.php"; ?>	
				<?php include "common/topbar.php"; ?>	
			<?php include "common/header.php"; ?>	
   <div class="clearfix"></div>
     <section class="slider hidden-sm hidden-md" id="home">
     
                <div id="main-slider">
                    <div id="owl-demo" class="owl-carousel custom-styles" data-effect="fade" data-singleItem="true" data-pagination="false" data-navigation="true">
                       				<?php
		$selectsql = "select * from project_gallery where projectID = '1' and status = 'E' and type = 'S' order by sortorder";
						
		$selectqry = ets_db_query($selectsql) or die(ets_db_error());
		if(ets_db_num_rows($selectqry) > 0){
			while($result = ets_db_fetch_assoc($selectqry)) {
		?>
                       <div class="item">
                            <!--                            <div class="overlay"></div>-->
                         
                                <img src="<?php echo DIR_WS_PROJECT_PATH.'1'.'/'.$result['galleryImage']; ?>" alt="" class="img-responsive"/>
                        </div>
                    	<?php		
		}
	}
	?>
                    </div>
                </div>
            </section>
        <section class="slider visible-sm visible-md" id="home">
     
                <div id="main-slider">
                    <div id="owl-demo" class="owl-carousel custom-styles" data-effect="fade" data-singleItem="true" data-pagination="false" data-navigation="true">
                       				<?php
		$selectsql = "select * from project_gallery where projectID = '1' and status = 'E' and type = 'S' order by sortorder";
						
		$selectqry = ets_db_query($selectsql) or die(ets_db_error());
		if(ets_db_num_rows($selectqry) > 0){
			while($result = ets_db_fetch_assoc($selectqry)) {
		?>
                       <div class="item">
<!--                            <div class="overlay"></div>-->
                         
                                <img src="<?php echo DIR_WS_PROJECT_PATH.'1'.'/'.$result['galleryImage']; ?>" alt="" class="img-responsive"/>
                        </div>
                    	<?php		
		}
	}
	?>
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
       
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <!-- Sticky Menu -->	
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
     	<script src="js/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
        <!-- Parallax BG -->
		<script src="js/owl.carousel.min.js"></script>
     	
        <script type="text/javascript"  src="js/jquery.parallax-1.1.3.js"></script>
        <!-- Fun Factor / Counter -->
     
        <!-- Custom Js Code -->
     <script src="js/jquery.dlmenu.js"></script>
        <!-- Scripts -->
        
        <script src="//npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
		
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
    $(document).ready(function () {
    
        $("a.fancybox").fancybox({
    			maxWidth	: 900,
    			maxHeight	: 700,
    			fitToView	: true,
    			width		: '80%',
    			height		: '80%',
    			autoSize	: false,
    			closeClick	: false,
    			openEffect	: 'elastic',
    			closeEffect	: 'elastic'
    		});
    		
    		$(".gallery a").fancybox();
        
        // init Isotope
        var $grid = $('.grid').isotope({
          itemSelector: '.element-item',
          layoutMode: 'fitRows'
        });
        // filter functions
        var filterFns = {
          // show if number is greater than 50
          numberGreaterThan50: function() {
            var number = $(this).find('.number').text();
            return parseInt( number, 10 ) > 50;
          },
          // show if name ends with -ium
          ium: function() {
            var name = $(this).find('.name').text();
            return name.match( /ium$/ );
          }
        };
        // bind filter button click
        $('.filters-button-group').on( 'click', 'button', function() {
          var filterValue = $( this ).attr('data-filter');
          // use filterFn if matches value
          filterValue = filterFns[ filterValue ] || filterValue;
          $grid.isotope({ filter: filterValue });
        });
        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup ) {
          var $buttonGroup = $( buttonGroup );
          $buttonGroup.on( 'click', 'button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $( this ).addClass('is-checked');
          });
        });

        
        
        // you want to enable the pointer events only on click;

        $('#map_canvas1').addClass('scrolloff'); // set the pointer events to none on doc ready
        $('#canvas1').on('click', function () {
           
            $('#map_canvas1').removeClass('scrolloff'); // set the pointer events true on click
        });

        // you want to disable pointer events when the mouse leave the canvas area;

        $("#map_canvas1").mouseleave(function () {
            $('#map_canvas1').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
        });
    });   
	   
	</script>
	
    </body>
</html>