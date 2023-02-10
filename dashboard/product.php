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
        	header('location:home.php');
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
			$product = mysqli_query($conn,"SELECT * FROM product WHERE member_email = '{$premium_row['2']}'");

        	include('premium_sidebar.php');
        	?>
        	<title><?php echo ucfirst($premium_row['1'])." - Product"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='product.php' class='a_right'>Product</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Product Name</th>
							<th>Product Description</th>
							<th>Product Date</th>
							<th>Action</th>
						</tr>
					";
	
						if (mysqli_num_rows($product)>0) 
						{
							$i = 1;
							while ($product_row = mysqli_fetch_row($product)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$product_row['4'].'</td>
									<td>'.$product_row['5'].'</td>
									<td>'.$product_row['7'].'</td>
									<td><a href="product_details.php?pid='.$product_row['0'].'">View</td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Product Name</th>
								<th>Product Description</th>
								<th>Product Date</th>
								<th>Action</th>
							</tr>
						</table>
				</div>

					";


        }
        
?>