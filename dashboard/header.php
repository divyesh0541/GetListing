<?php include('../db.php'); session_start(); ?>

<!-- CSS Link -->
<link rel="stylesheet" href="../css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Mobile Toggle Menu -->
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".togglemnu").click(function(){
			jQuery(".nav_header").slideToggle();
		});

		//Dashboard Sidebar
		jQuery("<div class='sdbr_tgl'><span></span><span></span><span></span></div>").insertBefore(".sidebar");
		jQuery(".sdbr_tgl").click(function(){
			jQuery(this).toggleClass("open_sidebar");
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
						<a class='logo' href='../index.php'>GET LISTING</a>
				</div>
				<div class='togglemnu'><span></span><span></span><span></span></div>
				<nav class='nav_header'>
					<a href='../index.php'>Home</a>
					<a href='../explore.php'>Explore</a>
					<a href='../learn.php'>Learn</a>
					<a href='../blog.php'>Blog</a>
					<a href='../plans.php'>Add Properties</a>
					<a href='home.php' class='header_a'>{$row['1']}</a>
				</nav>
			</header>

		";
	}
	else
	{
		echo "

			<header id='header'>
				<div class='logo_div'>
						<a class='logo' href='../index.php'>GET LISTING</a>
				</div>
				<div class='togglemnu'><span></span><span></span><span></span></div>
				<nav class='nav_header'>
					<a href='../index.php'>Home</a>
					<a href='../explore.php'>Explore</a>
					<a href='../learn.php'>Learn</a>
					<a href='../blog.php'>Blog</a>
					<a href='../plans.php'>Add Properties</a>
					<a href='../signup.php'>Join Us</a>
					<a href='../login.php'>Login</a>
				</nav>
			</header>

		";
	}

?>