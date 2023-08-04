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
        <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Icomoon Icons -->
        <link href="css/icons.css" rel="stylesheet">
   <link href="css/hover-dropdown-menu.css" rel="stylesheet">
        <!-- Custom Style -->
        <link href="css/style.css" rel="stylesheet">
       <link href="css/responsive.css" rel="stylesheet" />
        <!-- Color Scheme -->
        <link href="css/color.css" rel="stylesheet">
		<script src="js/modernizr.custom.js"></script>
		<style>
    .scrolloff {
        pointer-events: none;
    }
		</style>
    </head>
    <body  class="footer-hidden">
        <div id="page">
            <!-- Top Bar -->
			   <?php include "common/loader.php"; ?>	
				<?php include "common/topbar.php"; ?>	
			<?php include "common/header.php"; ?>	

		<section id="canvas1" class="map">
<iframe id="map_canvas1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.709958358175!2d72.72035125958098!3d21.12412652633211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be052b7571a5659%3A0x46a368fde1b222e9!2sAgrawal+Pragati+Trust%2C+102%2FB%2C+T.P.82%2C+Opp.+Airport%2C+Dumas+Road%2C+Gaviyer%2C+Surat%2C+Gujarat+395007!5e0!3m2!1sen!2sin!4v1477293339666" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			
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
        <!-- Scroll Top Menu -->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <!-- Sticky Menu -->	
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
     
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <!-- Parallax BG -->
        <script type="text/javascript"  src="js/jquery.parallax-1.1.3.js"></script>
        <!-- Fun Factor / Counter -->
        <!-- Custom Js Code -->
        <script src="js/jquery.dlmenu.js"></script>
        <!-- Scripts -->
		<script src="js/jqueryvalidation/jquery.validate.min.js"></script>
<script src="js/jqueryvalidation/additional-methods.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
   <script type="text/javascript">
	
	$.validator.addMethod('regex', function (value, element, param) {
    return this.optional(element) || value.match(typeof param == 'string' ? new RegExp(param) : param);
}, 'Please Enter a value in the correct format.');
$(document).ready(function () {
    $('#contact-form').validate({
        rules: {
            contact_name: {
                required: true
            },
            contact_email: {
                required: true
            },
			contact_subject: {
                required: true
            },
            contact_phone: {
				
                //maxlength: 15,
                regex: "^(?=.*[0-9])[- +()0-9]+$",
                required: true
            },
            contact_message: {
                required: true
            }
        },
        messages: {
            contact_name: {
                required: "Please Enter Name"
            },
            contact_email: {
                required: "Please Enter Email Address"
            },
			 contact_subject: {
                required: "Please Enter Subject"
            },
            contact_phone: {
                required: "Please Enter Mobile Number"
            },
            contact_message: {
                required: "Please Enter Message"
            }
        }

    });
});
      
       $('#submit').click(function(e){
            e.preventDefault();
			var data =  $('#contact-form').serialize();
			
			if ($("#contact-form").valid()) {
				
				$('#submit').val('PLEASE WAIT..');
				$("#submit").prop("disabled", true);
				$.ajax({
					'url' : './sendmail.php',
					'method' : 'POST',
					'data' : data,
					'success' : function(response){
						$('#submit').val('SUBMIT');
						$("#submit").prop("disabled",false);
						$('#contact-form input[type=text]').val('');
						$('#contact-form input[type=email]').val('');
						$('#contact-form textarea').val('');
						$('#alert_div').removeClass("display-none");
						$('#alert_div').html(response);
							var $elm = $('#alert_div');
							$elm.fadeIn();
							setTimeout(function() {
								$elm.fadeOut();
							}, 2000);
					}
				 })
			}
	 });
	

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
