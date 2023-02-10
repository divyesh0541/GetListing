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
        	$pid = $_GET['pid'];
			$product = mysqli_query($conn,"SELECT * FROM product WHERE id = '$pid' ");
			$product_fetch_row = mysqli_fetch_row($product);

        	include('premium_sidebar.php');
        	?>
        	<title><?php echo ucfirst($premium_row['1'])." - ",$product_fetch_row['4']; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='product.php' class='a_right'>Product</a>/<a href='product_details.php' class='a_right'>Product Details</a></label>
	            </div>
	            <div class='allow_listing'>
	            	<table>

	            		<tr>
	            			<th>Product Name</th>
	            			<td>".$product_fetch_row['4']."</td>
	            		</tr>
	            		<tr>
	            			<th>Product Description</th>
	            			<td>".$product_fetch_row['5']."</td>
	            		</tr>
	            		<tr>
	            			<th>Product Date</th>
	            			<td>".$product_fetch_row['7']."</td>
	            		</tr>
	            		<tr>
	            			<th>Product Image</th>
	            			<td><img src='../product images/".$product_fetch_row['8']."' class='blog_imgs' style='width: 25%;'></td>
	            		</tr>
	            		<tr>
	            			<th>Product URL</th>
	            			<td>".$product_fetch_row['6']."</td>
	            		</tr>
	            		
	            </div>

					";


        }
        
?>