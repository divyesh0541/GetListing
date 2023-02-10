<!-- Header Include -->
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
        if (mysqli_num_rows($free)>0) 
        {
        	header('location:home.php');
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	$deals_offers = mysqli_query($conn,"SELECT * FROM deals_offers WHERE member_email = '{$standard_row['2']}' AND id = '{$_GET['did']}' ");
        	$deals_offers_row = mysqli_fetch_row($deals_offers);

        	include('standard_sidebar.php');
        	?>
        	<title><?php echo ucfirst($standard_row['1']).$deals_offers_row['4']; ?></title>
        	<?php
            echo '
	            <div class="bread_crumb">
	            	<label><a href="home.php" class="a_left">Home</a>/<a href="deals_offers.php" class="a_right">Deals Offers</a>/<a href="deals_details.php?id='.$_GET['did'].'" class="a_right">Deals Offers Details</a></label>
	            </div>
	            <div class="listing">
	            	<table>

	            		<tr>
	            			<th>Deals & Offers Title</th>
	            			<td>'.$deals_offers_row['4'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Deals & Offers Description</th>
	            			<td>'.$deals_offers_row['5'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Terms & Condition</th>
	            			<td>'.$deals_offers_row['6'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Deals & Offers Date</th>
	            			<td>'.$deals_offers_row['7'].'</td>
	            		</tr>

	            	</table>
	          
	            </div>
			';
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	$deals_offers = mysqli_query($conn,"SELECT * FROM deals_offers WHERE member_email = '{$premium_row['2']}' AND id = '{$_GET['did']}' ");
        	$deals_offers_row = mysqli_fetch_row($deals_offers);

        	include('premium_sidebar.php');
        	?>
        	<title><?php echo ucfirst($premium_row['1']).$deals_offers_row['4']; ?></title>
        	<?php
            echo '
	            <div class="bread_crumb">
	            	<label><a href="home.php" class="a_left">Home</a>/<a href="deals_offers.php" class="a_right">Deals Offers</a>/<a href="deals_details.php?id='.$_GET['did'].'" class="a_right">Deals Offers Details</a></label>
	            </div>
	            <div class="listing">
	            	<table>

	            		<tr>
	            			<th>Deals & Offers Title</th>
	            			<td>'.$deals_offers_row['4'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Deals & Offers Description</th>
	            			<td>'.$deals_offers_row['5'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Terms & Condition</th>
	            			<td>'.$deals_offers_row['6'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Deals & Offers Date</th>
	            			<td>'.$deals_offers_row['7'].'</td>
	            		</tr>

	            	</table>
	          
	            </div>
			';
        }
        
?>