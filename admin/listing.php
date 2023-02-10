<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title>Getlisting - Listing</title>
<?php include('header.php'); ?>

<?php include('prevent_admin.php'); ?>

<?php  

	$admin = mysqli_query($conn,"SELECT * FROM admin WHERE id='{$_SESSION['admin_id']}'");
	$admin_row = mysqli_fetch_row($admin);

	$listing = mysqli_query($conn,"SELECT * FROM listing ");

	if (mysqli_num_rows($admin)>0) 
        {
            echo "

            	<div class='sidebar'>
	            	<label><a href='home.php'>Home</a></label>
	            	<label><a href='profile.php'>Profile</a></label>
	            	<label><a href='feedback.php'>Feedbacks</a></label>
	            	<label><a href='allow_listing.php'>Allow Listing</a></label>
	            	<label><a href='allow_blog.php'>Allow Blog</a></label>
	            	<label><a href='change_password.php'>Change Password</a></label>
	            	<label><a href='logout.php'>Logout</a></label>
	            </div>
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='listing.php' class='a_right'>Listing</a></label>
	            </div>
	            <div class='allow_listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Listing</th>
							<th>Location</th>
							<th>Email</th>
							<th>Package</th>
							<th>Payment</th>
						</tr>
					";

					$i=1;
					while ($listing_row = mysqli_fetch_row($listing)) 
					{
						echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$listing_row['1'].'</td>
									<td>'.$listing_row['2'].'</td>
									<td>'.$listing_row['3'].'</td>
									<td>'.$listing_row['21'].'</td>
									<td>'.$listing_row['22'].'</td>
								</tr>

							';
						$i++;
					}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Location</th>
								<th>Email</th>
								<th>Package</th>
								<th>Payment</th>
							</tr>
						</table>
				</div>

					";
					

            
        }

?>