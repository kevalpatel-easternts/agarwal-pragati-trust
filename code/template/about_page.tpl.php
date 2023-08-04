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
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<link href="css/hover-dropdown-menu.css" rel="stylesheet">
        <!-- Icomoon Icons -->
        <link href="css/icons.css" rel="stylesheet">
   
        <!-- Custom Style -->
        <link href="css/style.css" rel="stylesheet">

        <link href="css/color.css" rel="stylesheet">
		<script src="js/modernizr.custom.js"></script>
 
    </head>
    <body  class="footer-hidden">
    
  <div id="page">
	     <?php include "common/loader.php"; ?>	
            <!-- Top Bar -->
				<?php include "common/topbar.php"; ?>	
			<?php include "common/header.php"; ?>	
				 <section id="portfolio-header" class="no-pad" >
                     <?php
           $image = DIR_WS_PAGE_IMAGE_PATH.$page_res['page_image'];
                     ?>
            <div class="image-bg content-in" data-background="<?php echo $image ; ?>"></div>
                
			<div class="overlay"></div>
                <div class="container">
					<?php 
					if($get_object[2] == 'gotras'){
						?>
						
						  <div class="col-md-12 text-center">
                   <div class="section-title white animated fadeInUp visible" data-animation="fadeInUp">
             
                    <h1 class="title text-uppercase"><?php echo $pageTitle; ?></h1>
                </div>
					<p class="details">
Agarwals are basically a commercial community or Vaishyas. They are one of the most respectable and enterprising of mercantile tribes.  </p>

                </div>
					
					<?php }else{
					?>
               <div class="col-md-12 text-center">
                   <div class="section-title white animated fadeInUp visible" data-animation="fadeInUp">
             
                    <h1 class="title text-uppercase"><?php echo $pageTitle; ?></h1>
                </div>
					<p class="details">Agarwal Pragati Trust, was founded for providing better social, financial, educational and medical growth to the people of Agarwal community. </p>

                </div>
					<?php } ?>
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

		 <script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
		 <script type="text/javascript" src="js/bootstrap.min.js"></script>
		
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <!-- Sticky Menu -->	
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <!-- Parallax BG -->
        <script type="text/javascript"  src="js/jquery.parallax-1.1.3.js"></script>
       
        <!-- Custom Js Code -->
      
        <!-- Scripts -->
		<script src="js/jqueryvalidation/jquery.validate.min.js"></script>
		<script src="js/jqueryvalidation/additional-methods.min.js"></script>
		<script src="js/jquery.dlmenu.js"></script>
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
            	  $(document).ready(function() {
   var table = $('#example').DataTable( {
		    "columnDefs": [
           { "targets": "_all", "width": '1%' }
       ]  , "aaSorting" : []   
	   } );
    var table = $('#example1').DataTable( {
		    "columnDefs": [
           { "targets": "_all", "width": '1%' }
       ]     
	   } );
                       var table = $('#example2').DataTable( {
		      "columnDefs": [
           { "targets": "_all", "width": '1%' }
       ]     
	   } );
} );
	</script>
<script>
$(".loadModal").click(function(e) {
		var jobID = $(this).attr('data-job');
		e.preventDefault();
		//$('.modal-body').load('viewdata.php?m_id='+jobID);
        $.ajax({
            url : 'viewdata.php?m_id='+jobID,
            method : 'POST',
            dataType : 'json',
            beforeSend : function(e){
                
            },
            success : function(data){
                var name = data.name;
                var city = data.city;
                var state = data.state;
                var address = data.address;
                var landmark = data.landmark;
                
                $('.modal-body #member-name').text(name);
                $('.modal-body #member-city').text(city);
                $('.modal-body #member-state').text(state);
                $('.modal-body #member-address').text(address);
                $('.modal-body #member-landmark').text(landmark);
                
                
                $('#myModalLabel').html(name);
//                $('#tblGrid').css('display','block');
                $('#myModal').appendTo("body").modal('show');
            }
        })
        
    
	 });        
$(".loadModal1").click(function(e) {
		var jobID = $(this).attr('data-job');
		e.preventDefault();
		//$('.modal-body').load('viewdata.php?m_id='+jobID);
        $.ajax({
            url : 'viewdata.php?m_id='+jobID,
            method : 'POST',
            dataType : 'json',
            beforeSend : function(e){
                
            },
            success : function(data){
                var name = data.name;
                var city = data.city;
                var state = data.state;
                var address = data.address;
                var landmark = data.landmark;
                
                $('.modal-body #member-name').text(name);
                $('.modal-body #member-city').text(city);
                $('.modal-body #member-state').text(state);
                $('.modal-body #member-address').text(address);
                $('.modal-body #member-landmark').text(landmark);
                
                
                $('#myModalLabel1').html(name);
//                $('#tblGrid').css('display','block');
                $('#myModal1').appendTo("body").modal('show');
            }
        })
        
    
	 });   
    $(".loadModal2").click(function(e) {
		var jobID = $(this).attr('data-job');
		e.preventDefault();
		//$('.modal-body').load('viewdata.php?m_id='+jobID);
        $.ajax({
            url : 'viewdata.php?m_id='+jobID,
            method : 'POST',
            dataType : 'json',
            beforeSend : function(e){
                
            },
            success : function(data){
                var name = data.name;
                var city = data.city;
                var state = data.state;
                var address = data.address;
                var landmark = data.landmark;
                
                $('.modal-body #member-name').text(name);
                $('.modal-body #member-city').text(city);
                $('.modal-body #member-state').text(state);
                $('.modal-body #member-address').text(address);
                $('.modal-body #member-landmark').text(landmark);
                
                
                $('#myModalLabel2').html(name);
//                $('#tblGrid').css('display','block');
                $('#myModal2').appendTo("body").modal('show');
            }
        })
        
    
	 });       
</script>

</body>
</html>