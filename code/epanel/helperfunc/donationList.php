<?php
		require ('../includes/configure.php');
		include ('../includes/functions/general.php');
		$result = array('data' => array());
		$sqlsel = "SELECT * from donation_master";
		$ressql = ets_db_query($sqlsel) or die('Query failed : ' . ets_db_error());
		// Same from main controller File
			if(ets_db_num_rows($ressql) > 0) {
					while($row = ets_db_fetch_array($ressql)){ 
						$donationid = $row['donation_id'];
						$name = $row['dname'];
						$email = $row['demail'];	
						$phone = $row['dcontact'];
						$address = $row['dmessage'];

						$donationID = $donationid;
						$donationDT = date('Y-m-d',strtotime($row['d_date']));
						
						$donationName=$name;
						
						$donationEmail=$email;
						
						$donationPhone=$phone;
						
						$donationAddress=$address;
//											
//						$donationResume='<center><button type="button" class="btn btn-primary loadModal" data-donation="'.$row['donation_id'].'" data-toggle="modal" data-target="#myModal">
//						<i class="fa fa-eye"></i>
//						</button></center>';
						
						/*$donationResume='<center><button type="button" class="btn btn-primary btn-lg" data-donation="'.$row['donation_id'].'" data-toggle="modal" data-target="#myModal">
						Launch demo modal
						</button></center>';*/
						
						
						$donationAction='<center>
						<a href="index.php?controller=donation&action=donation&subaction=deletedonation&donation_id='.$row['donation_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></center></a></td>';
						$select='<center><input type="checkbox" class="case" id="'.$donationid.'"></center></a>';

						$result['data'][] = array( "$select","$donationID", "$donationName", "$donationEmail", "$donationPhone","$donationAddress","$donationAction");
						}
							// End While Loop
							//echo json_encode($result);
						}
						else {
								$select='<td></td>';
								$donationID = '<td></td>';	
								$donationDT = '<td></td>';
								$donationName = '<td>'.'No Result Found'.'</td>';
								$donationEmail = '<td></td>';
								$donationPhone = '<td></td>';
								$donationAddress = '<td></td>';
//								$donationResume='<td></td>';
								$donationAction='<td></td>';
								$result['data'][] = array( "$select","$donationID", "$donationDT", "$donationName", "$donationEmail", "$donationPhone","$donationAddress","$donationResume","$donationAction");
					}	
					echo json_encode($result);
?>		

