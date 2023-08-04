<?php
$web_arr = get_website_details();
?>   
<header id="sticker" class="sticky-navigation hidden-xs hidden-sm">
                <!-- Sticky Menu -->
                <div class="sticky-menu relative">
                    <!-- navbar -->
                    <div class="navbar navbar-default navbar-bg-light" role="navigation">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="navbar-header">
                                        <!-- Button For Responsive toggle -->
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span> 
                                        <span class="icon-bar"></span> 
                                        <span class="icon-bar"></span> 
                                        <span class="icon-bar"></span></button> 
                                        <!-- Logo -->
                                        <a class="navbar-brand" href="<?php echo HTTP_SERVER.WS_ROOT; ?>" style="padding-top: 8px;">
                                        <img class="site_logo" alt="Site Logo" src="<?php echo $web_arr['logo']; ?>" />
                                        </a>
                                    </div>
                                    <!-- Navbar Collapse -->
                                    <div class="navbar-collapse collapse">
                                        <!-- nav -->
                                        <ul class="nav navbar-nav">
                                            <!-- Home  Mega Menu -->
                                         
												<?php
											if($module == '' || $module == 'home')
												echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'">Home</a></li>';
											else
													echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'">Home</a></li>';
											
                                            if(($module_id == '10' || $module_id == '13' || $module_id == '14' || $module_id == '15') && $module == 'pages'){
                                            echo '<li class="dropdown active">
                                                        <a style="cursor:pointer">About Us&nbsp;<i class="fa fa-angle-down hidden-xs hidden-sm"></i></a> 

                                                        <ul class="dropdown-menu">';
															
					if($module_id == '10' && $module == 'pages')
                        echo '<li class="active"><a href="'.get_pageseo_url('10','pages').'">Foundation</a></li>';
												
				else
					  echo '<li><a href="'.get_pageseo_url('10','pages').'">Foundation</a></li>';
                        
								if($module_id == '13' && $module == 'pages')			
										
                       echo '<li class="active"><a href="'.get_pageseo_url('13','pages').'">Maharaja Agrasen</a></li>';
							else
								   echo '<li><a href="'.get_pageseo_url('13','pages').'">Maharaja Agrasen</a></li>';
						if($module_id == '15' && $module == 'pages')	
                        echo '<li class="active"><a href="'.get_pageseo_url('15','pages').'">Gotras</a></li>';
						else
						 echo '<li ><a href="'.get_pageseo_url('15','pages').'">Gotras</a></li>';
												
						if($module_id == '14' && $module == 'pages')
                       echo '<li class="active"><a href="'.get_pageseo_url('14','pages').'">Office Bearer</a></li>';				
                             else                              
                                             echo '<li><a href="'.get_pageseo_url('14','pages').'">Office Bearer</a></li>';	                 
                                                        echo '</ul>
                                                    
                                            </li>';
											}
											
											   else{
                                            echo '<li class="dropdown">
                                                        <a style="cursor:pointer">About Us&nbsp;<i class="fa fa-angle-down hidden-xs hidden-sm"></i></a> 

                                                        <ul class="dropdown-menu">
															
                        <li><a href="'.get_pageseo_url('10','pages').'">Foundation</a></li>
						
				
                        <li><a href="'.get_pageseo_url('13','pages').'">Maharaja Agrasen</a></li>
						
                        <li ><a href="'.get_pageseo_url('15','pages').'">Gotras</a></li>
						
                       <li ><a href="'.get_pageseo_url('14','pages').'">Office Bearer</a></li>
						
														
                                                           
                                                          
                                                        </ul>
                                                    
                                            </li>';
											}
											
															
						if( $module == 'the-hall')
                      echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'the-hall/all'.'">About Banquet </a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'the-hall/all'.'">About Banquet</a></li>';
										
											if( $module == 'member')
											{
                                           echo ' <li class="active dropdown">
                                                <a style="cursor:pointer">Members&nbsp;<i class="fa fa-angle-down hidden-xs hidden-sm"></i></a> 
                                                
                                                <ul class="dropdown-menu">';
                                                 
													$sql = "select * from membertype where status = 'E' and about = 'D' order by sortorder desc";
													$sql1 = ets_db_query($sql) or die();
													if(ets_db_num_rows($sql1) > 0){
														while($r = ets_db_fetch_assoc($sql1)) {
												
													echo'<li>
                                                        <a href="'.get_pageseo_url($r['a_id'],"member").'">'.$r['a_title'].'</a>
                                                    </li>';
														}
													}
                                                            
                                                echo '</ul>
                                               
                                            </li>';
											}else{
												 echo ' <li class="dropdown">
                                                <a style="cursor:pointer">Members&nbsp;<i class="fa fa-angle-down hidden-xs hidden-sm"></i></a> 
                                                <!-- Shop Dropdown Menu -->
                                                <ul class="dropdown-menu">';
                                                 
													$sql = "select * from membertype where status = 'E' and about = 'D' order by sortorder desc";
													$sql1 = ets_db_query($sql) or die();
													if(ets_db_num_rows($sql1) > 0){
														while($r = ets_db_fetch_assoc($sql1)) {
												
													echo'<li>
                                                       <a href="'.get_pageseo_url($r['a_id'],"member").'">'.$r['a_title'].'</a>
                                                    </li>';
														}
													}
                                                            
                                                echo '</ul>
                                               
                                            </li>';
											}
				if( $module == 'News' || $module == 'gallery' || $module == 'downloads'){
											    echo '<li class="dropdown active">
                                                        <a style="cursor:pointer">Media&nbsp;<i class="fa fa-angle-down hidden-xs hidden-sm"></i></a> 

                                                        <ul class="dropdown-menu">';
								
					if($module == 'News')													
						echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'News'.'">News & Events</a></li>';
					else
						echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'News'.'">News & Events</a></li>';
										
					if($module == 'gallery')	
                     echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'gallery/all'.'">Photo Gallery</a></li>';
					else
						 echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'gallery/all'.'">Photo Gallery</a></li>';
//					 	if($module == 'videogallery')
//                      echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'videogallery'.'">Video Gallery</a></li>';
//					else
//						 echo '<li ><a href="'.HTTP_SERVER.WS_ROOT.'videogallery'.'">Video Gallery</a></li>';
					   	if($module == 'downloads')
                     echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'downloads'.'">Downloads</a></li> ';
					else
						echo '<li ><a href="'.HTTP_SERVER.WS_ROOT.'downloads'.'">Downloads</a></li> ';
						
                                                        echo'</ul>
                                                    
                                            </li>';
											}
											else{
											    echo '<li class="dropdown">
                                                        <a style="cursor:pointer">Media&nbsp;<i class="fa fa-angle-down hidden-xs hidden-sm"></i></a> 

                                                        <ul class="dropdown-menu">
																					
						<li ><a href="'.HTTP_SERVER.WS_ROOT.'News'.'">News & Events</a></li>
						
                     <li ><a href="'.HTTP_SERVER.WS_ROOT.'gallery/all'.'">Photo Gallery</a></li>
					 

					  
                      <li ><a href="'.HTTP_SERVER.WS_ROOT.'downloads'.'">Downloads</a></li>  
                                                        </ul>
                                                    
                                            </li>';
											}
																
						if( $module == 'donation')
                      echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'donation'.'">Donation</a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'donation'.'">Donation</a></li>';
											?>
                                            <?php							
						if( $module == 'career')
                      echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'career'.'">Career</a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'career'.'">Career</a></li>';
											?>
											<?php
							if( $module == 'contact-us')
                        echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'contact-us'.'">Contact Us</a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'contact-us'.'">Contact Us</a></li>';
				
											
						?>
                                       
<!--
                                            <li class="search-dropdown">
                                                <a href="#">
                                                <span class="searchbox-icon">
                                                <i class="fa fa-search"></i>
                                                </span>
                                                </a>
                                                <ul class="dropdown-menu left">
                                                    <li>
                                                        <form class="navbar-form navbar-left" role="search">
                                                            <div class="form-group">
                                                                <input type="text" value="" name="s" id="s" class="form-control" placeholder="search" />
                                                            </div>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
-->
                                            <!-- Ends Search Box Block -->
                                        </ul>
                                        <!-- Right nav -->
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- navbar -->
                </div>
                <!-- Sticky Menu -->
            </header>
            <!-- Sticky Navbar -->
           <header id="stickyribbon" class="visible-xs visible-sm">
                <!-- Sticky Menu -->
                <div class="relative">
                    <!-- navbar -->
                    <div class="navbar navbar-default navbar-bg-light" role="navigation">
                        <div class="container">
                            <div class="row">
                              
                                 <div id="dl-menu" class="dl-menuwrapper">
	<button class="dl-trigger btn-mob">Open Menu</button>
									
	 <a href="<?php echo HTTP_SERVER.WS_ROOT; ?>" style="padding-top: 8px;" class="logo-brand">
                         <img class="site_logo" alt="Site Logo" src="<?php echo $web_arr['logo']; ?>" style="width:155px;"/>
                        </a>
									 <ul class="dl-menu">
                                    <!-- Navbar Collapse -->
                             
												<?php
											if(($module == '') && $module == 'home')
												echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'">Home</a></li>';
											else
													echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'">Home</a></li>';
											
                                           ?>
                                            <li>
                                                        <a style="cursor:pointer">About Us&nbsp;<i class="fa fa-angle-down hidden-xs hidden-sm"></i></a> 

                                                      <ul class="dl-submenu">
																<?php	
						if(($module_id == '10') && $module == 'pages')
                        echo '<li class="active"><a href="'.get_pageseo_url('10','pages').'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Foundation</a></li>';
						else
						echo '<li><a href="'.get_pageseo_url('10','pages').'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Foundation</a></li>';
																if(($module_id == '13') && $module == 'pages')
                        echo '<li class="active"><a href="'.get_pageseo_url('13','pages').'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Maharaja Agrasen</a></li>';
						else
						echo '<li><a href="'.get_pageseo_url('13','pages').'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Maharaja Agrasen</a></li>';
																if(($module_id == '14') && $module == 'pages')
                        echo '<li class="active"><a href="'.get_pageseo_url('14','pages').'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Office Bearer</a></li>';
						else
						echo '<li><a href="'.get_pageseo_url('14','pages').'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Office Bearer</a></li>';
						
															?>
                                                           
                                                          
                                                        </ul>
                                                        <!-- Ends Blog Timeline Dropdown -->
                                                   
                                                <!-- Blog Dropdown Menu -->
                                            </li>
                                           	<?php							
						if( $module == 'the-hall')
                      echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'the-hall/all'.'">About Banquet </a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'the-hall/all'.'">About Banquet</a></li>';
										
											if( $module == 'member')
											{
                                           echo ' <li class="active">
                                                <a style="cursor:pointer">Members&nbsp;<i class="fa fa-angle-down hidden-xs hidden-sm"></i></a> 
                                                
                                                  <ul class="dl-submenu">';
                                                 
													$sql = "select * from membertype where status = 'E' and about = 'D'";
													$sql1 = ets_db_query($sql) or die();
													if(ets_db_num_rows($sql1) > 0){
														while($r = ets_db_fetch_assoc($sql1)) {
												
													echo'<li >
                                                        <a href="'.get_pageseo_url($r['a_id'],"member").'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;'.$r['a_title'].'</a>
                                                    </li>';
														}
													}
                                                            
                                                echo '</ul>
                                               
                                            </li>';
											}else{
												 echo ' <li>
                                                <a style="cursor:pointer">Members&nbsp;<i class="fa fa-angle-down hidden-xs hidden-sm"></i></a> 
                                                <!-- Shop Dropdown Menu -->
                                                   <ul class="dl-submenu">';
                                                 
													$sql = "select * from membertype where status = 'E' and about = 'D'";
													$sql1 = ets_db_query($sql) or die();
													if(ets_db_num_rows($sql1) > 0){
														while($r = ets_db_fetch_assoc($sql1)) {
												
													echo'<li>
                                                       <a href="'.get_pageseo_url($r['a_id'],"member").'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;'.$r['a_title'].'</a>
                                                    </li>';
														}
													}
                                                            
                                                echo '</ul>
                                               
                                            </li>';
											}
											?>
                                            <!-- Ends Shop Menu -->
<!--
                                            <li class="center-logo">
                                                <a class="navbar-brand" href="index.html">
                                                <img class="site_logo" alt="Site Logo" src="img/logo.png" />
                                                </a>
                                            </li>
   
-->
				
											    <li>
                                                        <a style="cursor:pointer">Media&nbsp;<i class="fa fa-angle-down hidden-xs hidden-sm"></i></a> 

                                                          <ul class="dl-submenu">
																<?php							
						if( $module == 'News')
                      echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'News'.'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;News & Events</a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'News'.'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;News & Events</a></li>';
                                    if( $module == 'gallery')
                      echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'gallery/all'.'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Photo Gallery</a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'gallery/all'.'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Photo Gallery</a></li>';  
//					if( $module == 'videogallery')
//                      echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'videogallery'.'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Video Gallery</a></li>';
//						else
//							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'videogallery'.'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Video Gallery</a></li>';   
															if( $module == 'downloads')
                      echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'downloads'.'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Downloads</a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'downloads'.'"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Downloads</a></li>';   
															?>
                                                           
                                                          
                                                        </ul>
                                                        <!-- Ends Blog Timeline Dropdown -->
                                                   
                                                <!-- Blog Dropdown Menu -->
                                            </li>
												<?php							
						if( $module == 'donation')
                      echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'donation'.'">Donation</a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'donation'.'">Donation</a></li>';
											?>
										 <?php
							if( $module == 'career')
                        echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'career'.'">Career</a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'career'.'">Career</a></li>';
				
											
						?>
											<?php
							if( $module == 'contact-us')
                        echo '<li class="active"><a href="'.HTTP_SERVER.WS_ROOT.'contact-us'.'">Contact Us</a></li>';
						else
							  echo '<li><a href="'.HTTP_SERVER.WS_ROOT.'contact-us'.'">Contact Us</a></li>';
				
											
						?>
                                       

                                        </ul>
                                        <!-- Right nav -->
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- navbar -->
            
                <!-- Sticky Menu -->
            </header>
            <!-- Sticky Navbar -->
           