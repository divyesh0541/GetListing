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
        	$favourite = mysqli_query($conn,"SELECT * FROM favourite WHERE user_email = '{$user_row['2']}'");

        	include('user_sidebar.php');
        	?>
        	<title><?php echo ucfirst($user_row['1'])." - Favourite Listing"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='favourite_listing.php' class='a_right'>favourite Listing</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Listing</th>
							<th>Member Email</th>
							<th>Action</th>
						</tr>
					";
	
						if (mysqli_num_rows($favourite)>0) 
						{
							$i = 1;
							while ($favourite_row = mysqli_fetch_row($favourite)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$favourite_row['2'].'</td>
									<td>'.$favourite_row['3'].'</td>
									<td><a href="../listing_page.php?lid='.$favourite_row['1'].'">View</td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Member Email</th>
								<th>Action</th>
							</tr>
						</table>
				</div>

					";

        }
        elseif (mysqli_num_rows($free)>0) 
        {
        	header('location:home.php');
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	header('location:home.php');
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	header('location:home.php');
        }
        
?>