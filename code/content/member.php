 <section id="contact-us" class="page-section">
      <div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-9 ">
				<table id="example" class="table table-striped table-bordered dispaly compact" cellspacing="0" width="100%">
<!--				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">-->
        			<thead>
						<tr>
							
							
							<th width="30%">Name</th>
							<th width="40%">Address</th>
							<!--<th width="15%">More Details</th>-->
            			</tr>
					</thead>
					<tfoot>
						<tr>
							
							<th width="30%">Name</th>
							<th width="40%">Address</th>
							<!--<th width="15%">More Details</th>-->
            			</tr>
					</tfoot>
					<tbody>
            <?php
						
						
					$msql = "select * from membertype where  status = 'E' and a_id = '".$module_id."' order by sortorder desc" ;
					$mselectqry = ets_db_query($msql) or die(ets_db_error());
					if(ets_db_num_rows($mselectqry) > 0){
					
					while($mresult = ets_db_fetch_assoc($mselectqry)) {
					
					
					
				?>
				<?php 
					$selectsql = "select * from member_master where status = 'E' and a_id LIKE '%".$module_id."%' order by sortorder " ;
					
					$selectqry = ets_db_query($selectsql) or die(ets_db_error());
					
					if(ets_db_num_rows($selectqry) > 0){
						
					while($result = ets_db_fetch_assoc($selectqry)) {
					
						
				?>
					<tr>
						<td><?php echo $result['image_title']; ?></td>
						<td><?php echo $result['madr']; ?></td>
						
						
						<!--<td>-->
						<!--<center><button type="button" class="btn btn-primary loadModal" data-job="<?php echo $result['m_id'];?>" style="padding: 6px 12px;">-->
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
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header">
                <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><img src="images/closebox.png"></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <?php include "common/member_col.php"?>
<!--
               <span id="member-name"></span><br>
	<span id = "member-address"></span>	<br>
<span id = "member-landmark"></span><br>
                			<span id = "member-city"></span><br>
                <span id = "member-state"></span>
                
-->
                <!--
	  <table class="table table-striped " >

		
		<tbody><tr>
		<th align="right" width="130">Member Name</th>
						<td id="member-name"></td>
						</tr>
		

		<tr>
		<th align="right">Address</th>
					<td id = "member-address"></td>	
					</tr>
		
		<tr>
		<th align="right">Landmark</th>
					<td id = "member-landmark"></td>
						</tr>

		<tr>
		<th align="right">State</th>
						<td id = "member-state"></td>
					</tr>
		
		<tr>
		<th align="right">City</th>
			<td id = "member-city"></td>	
	
		</tr>

	</tbody></table>
-->

                   
           
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
			</div>
			<div class="col-md-3 hidden-sm hidden-xs" id="side">
			<div class="widget">
                        <div class="widget-search-causes">
                            <div class="box-wrapper">
                                <div class="box">

                                    <!-- widget title -->
                                    <div class="widget-title">
                                        <h5 class="theme-color">Members</h5>
                                    </div>
                                    <!-- .widget title -->

                                    <!-- widget box -->
                                    <div class="widget-box">
                                        <ul class="list-unstyled">
											 <?php
						
						
					$msql1 = "select * from membertype where status = 'E' and about = 'D' order by sortorder DESC" ;

					$mselectqry1 = ets_db_query($msql1) or die(ets_db_error());
										
					if(ets_db_num_rows($mselectqry1) > 0){
					
					while($mresult1 = ets_db_fetch_assoc($mselectqry1)) {
					
					
					
				?>
                                            <li><a href="<?php echo get_pageseo_url($mresult1['a_id'],"member");?>"><?php echo $mresult1['a_title']?> </a>
                                            </li>
                                           <?php } 
					} 
											?>
                                        </ul>
                                    </div>
                                    <!-- .widget box -->

                                </div>
                            </div>
                        </div>
                    </div>
			</div>
		</div>
	 </div>
</section>
        