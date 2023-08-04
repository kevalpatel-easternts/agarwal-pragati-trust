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
<!--        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<!--
        <link href="https://cdn.datatables.net/rowreorder/1.1.2/css/rowReorder.dataTables.min.css" rel="stylesheet">
        <link href="//cdn.datatables.net/responsive/2.1.0/css/dataTables.responsive.css" rel="stylesheet">
-->
<!--        <link href="css/responsive.dataTables.min.css" rel="stylesheet">-->
<!--        <link href="css/buttons.dataTables.min.css" rel="stylesheet">-->
        <link href="css/hover-dropdown-menu.css" rel="stylesheet">
        <!-- Icomoon Icons -->
        <link href="css/icons.css" rel="stylesheet">
   
        <!-- Custom Style -->
        <link href="css/style.css" rel="stylesheet">
<!--       <link href="css/responsive.css" rel="stylesheet" />-->
        <!-- Color Scheme -->
        <link href="css/color.css" rel="stylesheet">
		<script src="js/modernizr.custom.js"></script>
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>-->
 
    </head>
    <body  class="footer-hidden">
        <div id="page">
            <!-- Top Bar -->
			   <?php include "common/loader.php"; ?>	
				<?php include "common/topbar.php"; ?>	
			<?php include "common/header.php"; ?>	

				 <!--<section id="portfolio-header"  style="background:#000;" class="no-pad">-->
				     
				<section id="portfolio-header" class="no-pad">
                    <div class="image-bg content-in" data-background="images/members.jpg"></div>
			        <div class="overlay"></div>
				     
                     <?php 
                     if($get_object[2] == 'patron-trustee'){
                         ?>
            <div class="" style="background:#000;"></div>
                     <?php } ?>
                     <?php 
                     if($get_object[2] == 'founder-trustee'){
                         ?>
            <div class="" style="background:#000;"></div>
                     <?php } ?>
                     <?php 
                     if($get_object[2] == 'trust-board'){
                         ?>
            <div class=""></div>
                     <?php } ?>
<!--			<div class="overlay"></div>-->
                <div class="container">
               <div class="col-md-12 text-center">
                   <div class="section-title white animated fadeInUp visible" data-animation="fadeInUp">
					   <?php 
             $msql1 = "select * from membertype where  status = 'E' and a_id = '".$module_id."' order by sortorder desc" ;

					$mselectqry1 = ets_db_query($msql1) or die(ets_db_error());
					if(ets_db_num_rows($mselectqry1) > 0){
					
					while($mresult1 = ets_db_fetch_assoc($mselectqry1)) {
						?>
                    <h1 class="title text-uppercase"><?php echo $mresult1['a_title']; ?></h1>
					   <?php 
					}
					}
					   ?>
						</div>
					<p class="details">Agrawal Pragati Trust, has a great team of members for providing best for society.</p>

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
<!--
        <script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
-->
		 <script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
		 <script type="text/javascript" src="js/bootstrap.min.js"></script>
<!--		 <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->
		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

        <!-- Scroll Top Menu -->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <!-- Sticky Menu -->	
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
     	
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/effect.js"></script>
        <!-- Parallax BG -->
        <script type="text/javascript"  src="js/jquery.parallax-1.1.3.js"></script>
        <!-- Fun Factor / Counter -->
		
       <script src="js/jquery.dlmenu.js"></script>
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
	  $(document).ready(function() {
   var table = $('#example').DataTable( {
     
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
                $('.modal-body #member-state').text('Gujarat');
                $('.modal-body #member-address').text(address);
                $('.modal-body #member-landmark').text(landmark);
                
                
                $('#myModalLabel').html(name);
//                $('#tblGrid').css('display','block');
                $('#myModal').appendTo("body").modal('show');
            }
        })
        
    
	 });        

</script>
</body>
</html>