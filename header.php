<?php include('db.php'); session_start(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php  
	
	//Expire listing
	
	$cur_date = date("Y-m-d");
	$select_date = mysqli_query($conn,"SELECT * FROM listing WHERE status != '0' ");
	
	while ($select_date_row = mysqli_fetch_row($select_date))
	{

		$expire_listing = mysqli_query($conn,"DELETE FROM listing WHERE date_expire <= '$cur_date' ");
		
	}


?>



<!-- CSS Link -->
<link rel="stylesheet" href="css/style.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Mobile Toggle Menu -->
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".togglemnu").click(function(){
			jQuery(".nav_header").slideToggle();
		});
	});
</script>

<!-- Header User Butoon and Session -->
<?php
	
	if (isset($_SESSION['id'])) 
	{
		$query = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}'");
		$row = mysqli_fetch_row($query);

			echo "

				<header id='header'>
					
					<div class='logo_div'>
						<a class='logo' href='index.php'>GET LISTING</a>
					</div>
					
					<div class='togglemnu'><span></span><span></span><span></span></div>
					<nav class='nav_header'>
						<a href='index.php' class='home_a'>Home</a>
						<a href='explore.php' class='explore_a'>Explore</a>
						<a href='learn.php' class='learn_a'>Learn</a>
						<a href='blog.php' class='blog_a'>Blog</a>
						<a href='plans.php' class='plans_a'>Add Properties</a>
						<a href='dashboard/home.php' class='header_a'>{$row['1']}</a>
					</nav>
				</header>

			";
		
	}
	elseif (isset($_SESSION['admin_id']))
	{
		$admin_prevent = mysqli_query($conn,"SELECT * FROM admin WHERE id = '{$_SESSION['admin_id']}'");

		if (mysqli_num_rows($admin_prevent)>0) 
		{
			header('location:admin/home.php');
		}
	}
	else
	{
		echo "

			<header id='header'>
				
					<div class='logo_div'>
						<a class='logo' href='index.php'>GET LISTING</a>
					</div>
				<div class='togglemnu'><span></span><span></span><span></span></div>
				<nav class='nav_header'>
					<a href='index.php' class='home_a'>Home</a>
					<a href='explore.php' class='explore_a' class='home_a'>Explore</a>
					<a href='learn.php' class='learn_a'>Learn</a>
					<a href='blog.php' class='blog_a'>Blog</a>
					<a href='plans.php' class='plans_a'>Add Properties</a>
					<a href='signup.php' class='signup_a'>Join Us</a>
					<a href='login.php' class='login_a'>Login</a>
				</nav>
			</header>

		";
	}

?>