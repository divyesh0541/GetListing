<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php include('header.php'); ?>

<?php include('prevent_user.php'); ?>

<!-- User Roll Code For Dashboard-->
<?php 	
		$user = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='user'");
        $free = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='free'");
        $standard = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='standard'");
		$premium = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='premium'");
        
        // Fetching all the above data
        $user_row = mysqli_fetch_row($user);
        $free_row = mysqli_fetch_row($free);
        $standard_row = mysqli_fetch_row($standard);
        $premium_row = mysqli_fetch_row($premium);

        // Dashboard as per the priority
        if (mysqli_num_rows($user)>0) 
        {
        	include('user_sidebar.php');
        	?>
        	<title><?php echo ucfirst($user_row['1'])." - Payment"; ?></title>
        	<?php
        	$check_listing = mysqli_query($conn,"SELECT * FROM user_type  WHERE email = '{$user_row['2']}' && listing != '1' ");
        	if (mysqli_num_rows($check_listing)>0)
        	{
        		echo "

        			<div class='bread_crumb'>
		            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
		            </div>

		            <div class='allow_listing'>
		            	<table>
		            		<td>
		            			<label>You have not added any listing, no need for payment</label>
		            		</td>
		            	</table>
		            </div>
        			";
        		
        	}
        	else
        	{
        		$payment = mysqli_query($conn,"SELECT * FROM payment WHERE member_email = '{$user_row['2']}'");
	        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$user_row['2']}' ");
	        	$listing_row = mysqli_fetch_row($listing);

	        	if (mysqli_num_rows($payment)>0)
	        	{
	        		echo "
		            <div class='bread_crumb'>
		            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
		            </div>
		            <div class='listing'>
						<table>
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Purchase Date</th>
								<th>Payment</th>
								<th>Expired date</th>
								<th>days Remaining</th>
								<th>Amount</th>
							</tr>
						";
		
							if (mysqli_num_rows($payment)>0)
							{
								$i = 1;
								while ($payment_row = mysqli_fetch_row($payment)) 
								{
									echo '

									<tr>
										<td>'.$i.'</td>
										<td>'.$listing_row['1'].'</td>
										<td>'.$payment_row['7'].'</td>
										<td>'.$listing_row['22'].'</td>
										<td>'.$payment_row['8'].'</td>
										<td>'.$rem_day.'</td>
										<td>'.$payment_row['4'].'</td>
									</tr>

									';
									$i++;
								}
								
							}
							
							
						echo "
								<tr>
									<th>Sr No</th>
									<th>Listing</th>
									<th>Purchase Date</th>
									<th>Payment</th>
									<th>Expired date</th>
									<th>days Remaining</th>
									<th>Amount</th>
								</tr>
							</table>
					</div>

						";
	        	}
	        	else
	        	{
		        		echo "
			            <div class='bread_crumb'>
			            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
			            </div>
			            <div class='listing'>
							<table>
								<tr>
									<th>Sr No</th>
									<th>Listing</th>
									<th>Purchase Date</th>
									<th>Payment</th>
									<th>Expired date</th>
									<th>days Remaining</th>
									<th>Amount</th>
								</tr>
							";
			
								if ($listing_row['21'] == 'premium') 
								{
									$amount_payment = '7999';
									$redirect_loc = 'payment_premium';
								}
								elseif ($listing_row['21'] == 'standard') 
								{
									$amount_payment = '3999';
									$redirect_loc = 'payment_standard';
								}
										echo '

										<tr>
											<td>1</td>
											<td>'.$listing_row['1'].'</td>
											<td>'.$listing_row['22'].'</td>
											<td>'.$amount_payment.'</td>
											<td><a href="../'.$redirect_loc.'.php">Make Payment</td>
										</tr>

										';
									
									
								
								
								
							echo "
									<tr>
										<th>Sr No</th>
										<th>Listing</th>
										<th>Purchase Date</th>
										<th>Payment</th>
										<th>Expired date</th>
										<th>days Remaining</th>
										<th>Amount</th>
									</tr>
								</table>
						</div>

							";
		        	}
        	}
        }
        elseif (mysqli_num_rows($free)>0) 
        {
        	include('free_sidebar.php');
        	?>
        	<title><?php echo ucfirst($free_row['1'])." - Payment"; ?></title>
        	<?php

        	$check_listing = mysqli_query($conn,"SELECT * FROM user_type  WHERE email = '{$free_row['2']}' && listing != '1' ");
        	
        	if (mysqli_num_rows($check_listing)>0) 
        	{
        		echo "

        			<div class='bread_crumb'>
		            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
		            </div>

		            <div class='allow_listing'>
		            	<table>
		            		<td>
		            			<label>You have not added any listing, no need for payment</label>
		            		</td>
		            	</table>
		            </div>
        			";
        		
        	}
        	else
        	{

        		$payment = mysqli_query($conn,"SELECT * FROM payment WHERE member_email = '{$free_row['2']}'");
	        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$free_row['2']}' ");
	        	$listing_row = mysqli_fetch_row($listing);

	        	if ($listing_row['21'] == 'free') 
	        	{
	        		
					$pur_date =  strtotime(date("Y/m/d"));
					$exp_date =  strtotime($listing_row['28']);
					$rem_day = ceil(($exp_date - $pur_date) / 86400);

					echo "

        			<div class='bread_crumb'>
		            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
		            </div>

		            
		         
        			";

					if ($rem_day <= 0) 
					{
						echo '
						<div class="allow_listing">
		            	<table>
		            	<tr>
							<th>Sr No</th>
							<th>Listing</th>
							<th>Listing Date</th>
							<th>Payment Status</th>
							<th>Expired date</th>
							<th>Days Remaining</th>
							
						</tr>
						<tr>
							<td>1</td>
							<td>'.$listing_row['1'].'</td>
							<td>'.$listing_row['18'].'</td>
							<td>Free Plan Expired</td>
							<td>'.$listing_row['28'].'</td>
							<td>Days Limit Over</td>
							
						</tr>
						<tr>
									<th>Sr No</th>
									<th>Listing</th>
									<th>Purchase Date</th>
									<th>Payment</th>
									<th>Expired date</th>
									<th>Days Remaining</th>
									
								</tr>
							</table>
					</div>
						';
					}
					else
					{
						echo '
						<div class="allow_listing">
		            	<table>
		            	<tr>
							<th>Sr No</th>
							<th>Listing</th>
							<th>Listing Date</th>
							<th>Payment Status</th>
							<th>Expired date</th>
							<th>days Remaining</th>
						</tr>
						<tr>
							<td>1</td>
							<td>'.$listing_row['1'].'</td>
							<td>'.$listing_row['18'].'</td>
							<td>Free Plan Running</td>
							<td>'.$listing_row['28'].'</td>
							<td>'.$rem_day.'</td>
						</tr>
						<tr>
									<th>Sr No</th>
									<th>Listing</th>
									<th>Purchase Date</th>
									<th>Payment</th>
									<th>Expired date</th>
									<th>days Remaining</th>
								</tr>
							</table>
					</div>
						';
					}

					}
					else
					{
						echo "

		        			<div class='bread_crumb'>
				            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
				            </div>

				            <div class='allow_listing'>
				            	<table>
				            		<td>
				            			<label>Your Plan is Expired</label>
				            		</td>
				            	</table>
				            </div>
        			";
					} 

	        	}

	        	if (mysqli_num_rows($payment)>0) 
	        	{
	        		echo "
		            <div class='bread_crumb'>
		            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
		            </div>
		            <div class='listing'>
						<table>
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Purchase Date</th>
								<th>Payment</th>
								<th>Expired date</th>
								<th>days Remaining</th>
								<th>Amount</th>
							</tr>
						";
		
							if (mysqli_num_rows($payment)>0) 
							{
								$i = 1;
								while ($payment_row = mysqli_fetch_row($payment)) 
								{
									echo '

									<tr>
										<td>'.$i.'</td>
										<td>'.$listing_row['1'].'</td>
										<td>'.$payment_row['7'].'</td>
										<td>'.$listing_row['22'].'</td>
										<td>'.$payment_row['8'].'</td>
										<td>'.$rem_day.'</td>
										<td>'.$payment_row['4'].'</td>
									</tr>

									';
									$i++;
								}
								
							}
							
							
						echo "
								<tr>
									<th>Sr No</th>
									<th>Listing</th>
									<th>Purchase Date</th>
									<th>Payment</th>
									<th>Expired date</th>
									<th>days Remaining</th>
									<th>Amount</th>
								</tr>
							</table>
					</div>

						";
	        	}
	        	
        	}
        elseif (mysqli_num_rows($standard)>0)
        {
        	include('standard_sidebar.php');
        	?>
        	<title><?php echo ucfirst($standard_row['1'])." - Payment"; ?></title>
        	<?php
        	$payment = mysqli_query($conn,"SELECT * FROM payment WHERE member_email = '{$standard_row['2']}'");
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}' ");
        	$listing_row = mysqli_fetch_row($listing);
        	$check_listing = mysqli_query($conn,"SELECT * FROM user_type  WHERE email = '{$standard_row['2']}' && listing != '1' ");

        	if (mysqli_num_rows($check_listing)>0) 
        	{
        		echo "

        			<div class='bread_crumb'>
		            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
		            </div>

		            <div class='allow_listing'>
		            	<table>
		            		<td>
		            			<label>You have not added any listing, no need for payment</label>
		            		</td>
		            	</table>
		            </div>
        			";
        		
        	}
        	elseif (mysqli_num_rows($payment)>0) 
        	{
        		echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Purchase Date</th>
								<th>Payment</th>
								<th>Expired date</th>
								<th>days Remaining</th>
								<th>Amount</th>
						</tr>
					";
	
						if (mysqli_num_rows($payment)>0) 
						{
							$i = 1;
							while ($payment_row = mysqli_fetch_row($payment)) 
							{
								$pur_date =  strtotime(date("Y/m/d"));
								$exp_date =  strtotime($payment_row['8']);
								$rem_day = ceil(abs($exp_date - $pur_date) / 86400);

								echo '

								<tr>
										<td>'.$i.'</td>
										<td>'.$listing_row['1'].'</td>
										<td>'.$payment_row['7'].'</td>
										<td>'.$listing_row['22'].'</td>
										<td>'.$payment_row['8'].'</td>
										<td>'.$rem_day.'</td>
										<td>'.$payment_row['4'].'</td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Purchase Date</th>
								<th>Payment</th>
								<th>Expired date</th>
								<th>days Remaining</th>
								<th>Amount</th>
							</tr>
						</table>
				</div>

					";
        	}
        	else
        	{

        		echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Purchase Date</th>
								<th>Payment</th>
								<th>Expired date</th>
								<th>days Remaining</th>
								<th>Amount</th>
						</tr>
					";
	
								if ($listing_row['21'] == 'premium') 
								{
									$amount_payment = '7999';
									$redirect_loc = 'payment_premium';
								}
								elseif ($listing_row['21'] == 'standard') 
								{
									$amount_payment = '3999';
									$redirect_loc = 'payment_standard';
								}
							
								echo '

								<tr>
									<td>1</td>
									<td>'.$listing_row['1'].'</td>
									<td>'.$listing_row['22'].'</td>
									<td>'.$amount_payment.'</td>
									<td><a href="..'.$redirect_loc.'.php">Make Payment</td>
								</tr>

								';
								
							
							
						
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Purchase Date</th>
								<th>Payment</th>
								<th>Expired date</th>
								<th>days Remaining</th>
								<th>Amount</th>
							</tr>
						</table>
				</div>

					";
        	}
            
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');
        	?>
        	<title><?php echo ucfirst($premium_row['1'])." - Payment"; ?></title>
        	<?php
        	$payment = mysqli_query($conn,"SELECT * FROM payment WHERE member_email = '{$premium_row['2']}'");
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' ");
        	$listing_row = mysqli_fetch_row($listing);
        	$check_listing = mysqli_query($conn,"SELECT * FROM user_type  WHERE email = '{$premium_row['2']}' && listing != '1' ");

        	if (mysqli_num_rows($check_listing)>0) 
        	{
        		echo "

        			<div class='bread_crumb'>
		            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
		            </div>

		            <div class='allow_listing'>
		            	<table>
		            		<td>
		            			<label>You have not added any listing, no need for payment</label>
		            		</td>
		            	</table>
		            </div>
        			";
        		
        	}
        	elseif (mysqli_num_rows($payment)>0)
        	{
        		echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Purchase Date</th>
								<th>Payment</th>
								<th>Expired date</th>
								<th>days Remaining</th>
								<th>Amount</th>
						</tr>
					";
	
						if (mysqli_num_rows($payment)>0) 
						{
							$i = 1;
							while ($payment_row = mysqli_fetch_row($payment)) 
							{
								$pur_date =  strtotime(date("Y/m/d"));
								$exp_date =  strtotime($payment_row['8']);
								$rem_day = ceil(abs($exp_date - $pur_date) / 86400);
								echo '

								<tr>
									<td>'.$i.'</td>
										<td>'.$listing_row['1'].'</td>
										<td>'.$payment_row['7'].'</td>
										<td>'.$listing_row['22'].'</td>
										<td>'.$payment_row['8'].'</td>
										<td>'.$rem_day.'</td>
										<td>'.$payment_row['4'].'</td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Purchase Date</th>
								<th>Payment</th>
								<th>Expired date</th>
								<th>days Remaining</th>
								<th>Amount</th>
							</tr>
						</table>
				</div>

					";
        	}
        	else
        	{

        		echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='payment.php' class='a_right'>Payment</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Purchase Date</th>
								<th>Payment</th>
								<th>Expired date</th>
								<th>days Remaining</th>
								<th>Amount</th>
						</tr>
					";
	
								if ($listing_row['21'] == 'premium') 
								{
									$amount_payment = '7999';
									$redirect_loc = 'payment_premium';
								}
								elseif ($listing_row['21'] == 'standard') 
								{
									$amount_payment = '3999';
									$redirect_loc = 'payment_standard';
								}
							
								echo '

								<tr>
									<td>1</td>
									<td>'.$listing_row['1'].'</td>
									<td>'.$listing_row['22'].'</td>
									<td>'.$amount_payment.'</td>
									<td><a href="../'.$redirect_loc.'.php">Make Payment</td>
								</tr>

								';
								
							
							
						
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Purchase Date</th>
								<th>Payment</th>
								<th>Expired date</th>
								<th>days Remaining</th>
								<th>Amount</th>
							</tr>
						</table>
				</div>

					";
        	}
            
        }
        
?>