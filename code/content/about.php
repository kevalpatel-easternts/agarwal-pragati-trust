<?php
$a = $get_object[2];
?>
<!-- page-header -->
      <section id="contact-us" class="page-section">
                <div class="container">
					<div class="row">
					   
  						<?php echo stripslashes($page_res['page_content']); 
                             if($a == 'foundation' || $a == 'maharaja-agrasen' || $a == 'gotras') {
                                 ?>
                        <div class="col-sm-4 col-md-4 marbot30">
						
                        <div id="carousel-example-generic" class="carousel slide mobtop12" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
<!--                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                 <img src="images/drone-hall-view.png" width="800" height="570" alt="" title="" />
                            </div>
							 <div class="item">
                                <img src="images/bhumipoojan.jpg" style="height:222px;width:100%" />
                            </div>
              
                            <div class="item">
                                <img src="images/bhavan.png" width="800" height="570" alt="" title="" />
<!--
                                <div class="carousel-caption">
                                    <h2>Team Work</h2>
                                </div>
-->
                            </div>
							
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span> 
                        <span class="sr-only">Previous</span></a> 
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span> 
                        <span class="sr-only">Next</span></a></div>
							<div  id="side" class="martop40 hidden-xs">
						
					<div class="widget">
                        <div class="widget-search-causes">
                            <div class="box-wrapper">
                                <div class="box">

                                    <!-- widget title -->
                                    <div class="widget-title">
                                        <h5 class="theme-color">About Us</h5>
                                    </div>
                                    <!-- .widget title -->

                                    <!-- widget box -->
                                    <div class="widget-box">
                                        <ul class="list-unstyled">
										<li><a href="<?php echo get_pageseo_url('10','pages');?>">Foundation</a></li>
										<li><a href="<?php echo get_pageseo_url('13','pages');?>">Maharaja Agrasen</a></li>
										<li><a href="<?php echo get_pageseo_url('15','pages');?>">Gotras</a></li>
										<li><a href="<?php echo get_pageseo_url('14','pages');?>">Office Bearer</a></li>
                                            
                                        </ul>
                                    </div>
                                    <!-- .widget box -->

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
						</div>
                        <?php } ?>
                     <?php 
                          if($a == 'office-bearer') {
                              ?>
                              <section id="tabs" class="">
            
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
								     <li role="presentation" class="active">
                                    <a href="#CoreTeam" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">Managing Committe</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#TrustBoard" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Trust Board</a>
                                </li>
                           
                                <li role="presentation" class="">
                                    <a href="#InviteeFounderTrustee" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">Invitee Trustee</a>
                                </li>
                                <!--<li role="presentation" class="">-->
                                <!--    <a href="#InviteePatronTrustee" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Invitee Patron Trustee</a>-->
                                <!--</li>-->
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="CoreTeam">
                              	<table id="example" class="table table-striped table-bordered dispaly compact" cellspacing="0" width="100%">
<!--				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">-->
        			<thead>
						<tr>
							
							
							<th width="30%">Name</th>
							<th width="10%">Mob. Number</th>
							<th width="30%">Address</th>
							<!--<th width="12%">More Details</th>-->
            			</tr>
					</thead>
					<tfoot>
						<tr>
							<th width="30%">Name</th>
							<th width="10%">Mob. Number</th>
							<th width="30%">Address</th>
							<!--<th width="30%">Name</th>-->
							<!--<th width="40%">Address</th>-->
							<!--<th width="12%">More Details</th>-->
            			</tr>
					</tfoot>
					<tbody>
                        
     <!--                   <tr >-->
					<!--	<td >Shri Chiranji lal Madanlal Agarwal</td>-->
					<!--	<td>160 Radhe Mkt</td>-->
						
						
					<!--	<td>-->
					<!--	<center><button type="button" class="btn btn-primary loadModal" data-job="2717" style="padding: 6px 12px;">-->
					<!--	<i class="fa fa-eye"></i>-->
					<!--	</button></center>-->
						
					<!--	</td>-->
					<!--</tr>-->
     <!--                   <tr >-->
					<!--	<td >Shri Gokul Rameshwarlal  Bajaj</td>-->
					<!--	<td>O-383 NTM</td>-->
						
						
					<!--	<td>-->
					<!--	<center><button type="button" class="btn btn-primary loadModal" data-job="2718" style="padding: 6px 12px;">-->
					<!--	<i class="fa fa-eye"></i>-->
					<!--	</button></center>-->
						
					<!--	</td>-->
					<!--</tr>-->

                <?php
					$msql = "select * from membertype where  status = 'E' and a_id = '12'" ; 

					$mselectqry = ets_db_query($msql) or die(ets_db_error());
					if(ets_db_num_rows($mselectqry) > 0){
					
					while($mresult = ets_db_fetch_assoc($mselectqry)) {	
				?>
        				
    				    <?php
        				    $selectsql = "select * from member_master where status = 'E' and a_id = '12' order by sortorder asc;" ;
        				
        					$selectqry = ets_db_query($selectsql) or die(ets_db_error());
        					
        					if(ets_db_num_rows($selectqry) > 0){
        						
        					while($result = ets_db_fetch_assoc($selectqry)) {
        				?>
        	                    <tr>
        						    <td><?php echo $result['image_title']; ?></td>
        						    <td><?php echo $result['cnum']; ?></td>
        						    <td><?php echo $result['madr']; ?></td>
            						<!--<td>-->
                		<!--				<center>-->
                						    <!--<button type="button" class="btn btn-primary loadModal" data-job="<?php // echo $result['m_id'];?>" style="padding: 6px 12px;">-->
                		<!--				        <i class="fa fa-eye"></i>-->
                		<!--				    </button>-->
                		<!--				</center>-->
            						<!--</td>-->
            					</tr>
                            <?php
				            }
		            }
				}
			}
						
			?>
						
			
					</tbody>
				</table>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header">
                <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><img src="images/closebox.png"></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <?php include "common/member_col.php"?>


                   
           
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
			</div> 
                                
                                <div role="tabpanel" class="tab-pane" id="InviteeFounderTrustee">
                                
                                <table id="example1" class="table table-striped table-bordered dispaly compact" cellspacing="0" width="100%">
<!--				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">-->
        			<thead>
						<tr>
							
							
							<th width="40%">Name</th>
							<th width="30%">Mobile Number</th>
							<!--<th width="10%">More Details</th>-->
            			</tr>
					</thead>
					<tfoot>
						<tr>
							
							<th width="40%">Name</th>
							<th width="30%">Mobile Number</th>
							<!--<th width="10%">More Details</th>-->
            			</tr>
					</tfoot>
					<tbody>
            <?php
						
						
					$msql = "select * from membertype where status = 'E' and a_id = (
                              SELECT a_id
                              FROM membertype
                              WHERE a_id IN (10, 13)
                              LIMIT 1
                            );" ;

					$mselectqry = ets_db_query($msql) or die(ets_db_error());
					if(ets_db_num_rows($mselectqry) > 0){
					
					while($mresult = ets_db_fetch_assoc($mselectqry)) {
					
					
					
				?>
				<?php
					$selectsql = "select * from member_master where status = 'E' and a_id IN (10, 13) order by sortorder asc;" ;
					
					$selectqry = ets_db_query($selectsql) or die(ets_db_error());
					
					if(ets_db_num_rows($selectqry) > 0){
						
					while($result = ets_db_fetch_assoc($selectqry)) {
					
						
				?>
					<tr>
						<td><?php echo $result['image_title']; ?></td>
						<td><?php echo $result['cnum']; ?></td>
						
						
						<!--<td>-->
						<!--<center><button type="button" class="btn btn-primary loadModal1" data-job="<?php //echo $result['m_id'];?>" style="padding: 6px 12px;">-->
						<!--<i class="fa fa-eye"></i>-->
						<!--</button></center>-->
						
						<!--</td>-->
					</tr>
                        <?php
					}
				}
					}
					}
						
			?>
						
			
					</tbody>
				</table>
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header">
                <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><img src="images/closebox.png"></button>
                <h4 class="modal-title" id="myModalLabel1"></h4>
            </div>
            <div class="modal-body">
                <?php include "common/member_col.php"?>


                   
           
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
</div>

            <div role="tabpanel" class="tab-pane" id="InviteePatronTrustee">
                           
                <table id="example2" class="table table-striped table-bordered dispaly compact" cellspacing="0" width="100%">
        			<thead>
						<tr>
							<th width="30%">Name</th>
							<th width="40%">Address</th>
							
							<!--<th width="30%">Name</th>-->
							<!--<th width="40%">Address</th>-->
							<!--<th width="10%">More Details</th>-->
            			</tr>
					</thead>
					<tfoot>
						<tr>
							
							<th width="30%">Name</th>
							<th width="40%">Address</th>
                            <!--<th width="10%">More Details</th>-->
                        </tr>
					</tfoot>
					<tbody>
            <?php
						
						
					$msql = "select * from membertype where  status = 'E' and a_id = '13'" ;

					$mselectqry = ets_db_query($msql) or die(ets_db_error());
					if(ets_db_num_rows($mselectqry) > 0){
					
					while($mresult = ets_db_fetch_assoc($mselectqry)) {
					
					
					
				?>
				<?php
					$selectsql = "select * from member_master where status = 'E' and a_id = '13' order by sortorder asc;" ;
					
					$selectqry = ets_db_query($selectsql) or die(ets_db_error());
					
					if(ets_db_num_rows($selectqry) > 0){
						
					while($result = ets_db_fetch_assoc($selectqry)) {
					
						
				?>
					<tr>
						<td><?php echo $result['image_title']; ?></td>
						<td><?php echo $result['madr']; ?></td>
						
						
						<!--<td>-->
						<!--<center><button type="button" class="btn btn-primary loadModal2" data-job="<?php //echo $result['m_id'];?>" style="padding: 6px 12px;">-->
						<!--<i class="fa fa-eye"></i>-->
						<!--</button></center>-->
						
						<!--</td>-->
					</tr>
                        <?php
					}
				}
					}
					}
						
			?>
						
			
					</tbody>
				</table>
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header">
                <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><img src="images/closebox.png"></button>
                <h4 class="modal-title" id="myModalLabel2"></h4>
            </div>
            <div class="modal-body">
                <?php include "common/member_col.php"?>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   
                </div>
                <div role="tabpanel" class="tab-pane" id="TrustBoard">
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
							<!-- image -->
							<img src="images/member/mahesh-mittal.webp" alt="member-image" title="member-image" style="height: 260px;">
							<!-- Title -->
							<div class="description">
                            <!-- nameboard -->
                            <h1 class="nameboard">Shri Mahesh Mittal</h1>
                            <!-- Designation -->
                            <h6 class="trust-board-designation">(President)</h6>
                        </div></div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
							<!-- image -->
							<img src="images/member/natwarlal.png" alt="member-image" title="member-image" style="height: 260px;">
							<!-- Title -->
							<div class="description">
                            <!-- nameboard -->
                            <h1 class="nameboard">Shri Ratanlal Daruka</h1>
                            <!-- Designation -->
                            <h6 class="trust-board-designation">(Secretary)</h6>
                        </div></div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 bottom-margin-30">
							<div class="image">
    							<!-- image -->
    							<img src="images/member/RameshjiAgarwal.jpg" alt="member-image" title="member-image" style="height: 260px;">
    							<!-- Title -->
    							<div class="description">
                                    <!-- nameboard -->
                                    <h1 class="nameboard">Shri Ramesh Agarwal</h1>
                                    <!-- Designation -->
                                    <h6 class="trust-board-designation">(Treasurer)</h6>
                                </div>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
							    <!-- image -->
							    <img src="images/member/ChiranjiLalAgarwal.jpg" alt="member-image" title="member-image" style="height: 260px;">
    							<!-- Title -->
    							<div class="description">
                                    <!-- nameboard -->
                                    <h1 class="nameboard">Shri Chiranjilal Agarwal</h1>
                                    <!-- Designation -->
                                    <h6 class="trust-board-designation">(PPI)</h6>
                                </div>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
							<!-- image -->
							<img src="images/member/Pawanjijhunjhunwala.jpg" alt="member-image" title="member-image" style="height: 260px;">
							<!-- Title -->
							<div class="description">
                            <!-- nameboard -->
                            <h3 class="nameboard">Shri Pawan Jhunjhunwala</h3>
                            <!-- Designation -->
                            <h6 class="trust-board-designation">(Sr. Vice President)</h6>
                        </div></div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
							<!-- image -->
							<img src="images/member/NatwarjiAgarwal.jpg" alt="member-image" title="member-image" style="height: 260px;">
							<!-- Title -->
							<div class="description">
                            <!-- nameboard -->
                            <h1 class="nameboard">Shri Natwarlal Tatanwala</h1>
                            <!-- Designation -->
                            <h6 class="trust-board-designation">(Vice President)</h6>
                        </div></div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/motilal_jalan.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Motilal Jalan</h1>
                                <h6 class="trust-board-designation">(Vice President)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/ashok-singhal.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Ashok J Singhal</h1>
                                <h6 class="trust-board-designation">(Joit Secretary)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/shyamsunder-sihotia.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Shyam Sunder Sihotia</h1>
                                <h6 class="trust-board-designation">(Joint Treasurer)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/arun-patodia.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Arun Kashi Psd Patodia</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/BajaragjiGarodia.jpg" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Bajranglal Gupta (Garodia)</h1>
                                <h6 class="trust-board-designation">(Trustee of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/bajranglal-agarwal.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Bajranglal Agarwal</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                   
                   <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/Basudev-Chokhani.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Basudev Chokhani</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/Chandi-Prasad.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Chandi Prasad Pansari</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
							<!-- image -->
							<img src="images/member/GokuljiBajaj.jpg" alt="member-image" title="member-image" style="height: 260px;">
							<!-- Title -->
							<div class="description">
                            <!-- nameboard -->
                            <h1 class="nameboard">Shri Gokulchand Bajaj</h1>
                            <!-- Designation -->
                            <h6 class="trust-board-designation">(Trustee of Trust Board)</h6>
                        </div></div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/govind-prasad.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Govind Prasad Agarwal</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/Kailashchandra-Kanodia.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Kailashchandra Kanodia</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/Mukesh-Ladia.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Mukesh S. Ladia</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/Nandkishore-Tola.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Nandkishore Tola</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/Niranjan-Agarwal.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Niranjan H. Agarwal</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/Pramod-Agarwal.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Pramod Agarwal (Kansal)</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
							    <img src="images/member/PramodjiPoddar.jpg" alt="member-image" title="member-image" style="height: 260px;">
						    </div>
							<div class="description">
                                <h1 class="nameboard">Shri Pramod Podar (Rachit)</h1>
                                <h6 class="trust-board-designation">(Trustee of Trust Board)</h6>
                            </div>
                        </div>
					</div>
                                 
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/shambhu-poddar.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Shambhu Poddar</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/Suresh-Bansal.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Suresh P Bansal</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 padbot10 bottom-margin-30">
							<div class="image">
    							<img src="images/member/Vikash-Pacheriwal.webp" alt="member-image" title="member-image" style="height: 260px;">
							</div>
							<div class="description">
                                <h1 class="nameboard">Shri Vikash D. Pacheriwal</h1>
                                <h6 class="trust-board-designation">(Trustee Of Trust Board)</h6>
                            </div>
						</div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 animated fadeInLeft visible text-center pad5" data-animation="fadeInLeft">
						<div class="boxed-block light-bg  pad-20 padbot10 bottom-margin-30">
							<div class="image">
							<!-- image -->
							<img src="images/member/vinod-agarwal.webp" alt="member-image" title="member-image" style="height: 260px;">
							<!-- Title -->
							<div class="description">
                            <!-- nameboard -->
                            <h1 class="nameboard">Shri Vinod Agarwal (G.C.G)</h1>
                            <!-- Designation -->
                            <h6 class="trust-board-designation">(Trustee of Trust Board)</h6>
                        </div></div>
						</div>
                    </div>
      
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4 col-md-4 marbot30 hidden-sm hidden-xs">
						
                        <div id="carousel-example-generic" class="carousel slide mobtop12" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                       
<!--                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                 <img src="images/team-3.png" width="800" height="570" alt="" title="" />
                            </div>
                           <div class="item">
                                <img src="images/team-2.png" style="height:222px;width:100%" />
                            </div>
              
                            <div class="item">
                               <img src="images/team-1.png" width="800" height="570" alt="" title="" />
<!--
                                <div class="carousel-caption">
                                    <h2>Team Work</h2>
                                </div>
-->
                            </div>

              
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span> 
                        <span class="sr-only">Previous</span></a> 
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span> 
                        <span class="sr-only">Next</span></a></div>
							<div  id="side" class="martop40 hidden-xs">
						
					<div class="widget">
                        <div class="widget-search-causes">
                            <div class="box-wrapper">
                                <div class="box">

                                    <!-- widget title -->
                                    <div class="widget-title">
                                        <h5>About Us</h5>
                                    </div>
                                    <!-- .widget title -->

                                    <!-- widget box -->
                                    <div class="widget-box">
                                        <ul class="list-unstyled">
										<li><a href="<?php echo get_pageseo_url('10','pages');?>">Foundation</a></li>
										<li><a href="<?php echo get_pageseo_url('13','pages');?>">Maharaja Agrasen</a></li>
										<li><a href="<?php echo get_pageseo_url('15','pages');?>">Gotras</a></li>
										<li><a href="<?php echo get_pageseo_url('14','pages');?>">Office Bearer</a></li>
                                            
                                        </ul>
                                    </div>
                                    <!-- .widget box -->

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
						</div>
                                </section> 
                            <?php   
                          }  
                        
                        ?>           
                  
                  
              
                       
                </div>
		  </div>
</section>