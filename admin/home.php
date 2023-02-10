<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

<?php include('header.php'); ?>

<?php include('prevent_admin.php'); ?>
<style type="text/css">
	p .fa{color: #EF3652;font-size:55px}
	p .fab{color: #EF3652;font-size:55px}
	p .fas{color: #EF3652;font-size:55px}
	p .material-icons{color: #EF3652;font-size:55px}
	header.special {text-align: center !important;margin-bottom: 2rem !important; }
</style>
<?php  

	$admin = mysqli_query($conn,"SELECT * FROM admin WHERE id='{$_SESSION['admin_id']}'");
	
	$admin_row = mysqli_fetch_row($admin);

	if (mysqli_num_rows($admin)>0) 
        {
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE status != '0'");
        	$listing_p = mysqli_query($conn,"SELECT * FROM listing WHERE status = '0' ");
        	$blog = mysqli_query($conn,"SELECT * FROM blog WHERE status != '0'");
        	$blog_p = mysqli_query($conn,"SELECT * FROM blog WHERE status = '0' ");
        	$user = mysqli_query($conn,"SELECT * FROM user_type ");
        	$member = mysqli_query($conn,"SELECT * FROM user_type WHERE type = 'free' OR type = 'standard' OR type = 'premium'");
        	$feedback = mysqli_query($conn,"SELECT * FROM feedback");
        	$visitor = mysqli_query($conn,"SELECT * FROM visitor");
      		$visitor_row = mysqli_fetch_row($visitor);
      		$payment = mysqli_query($conn,"SELECT * FROM payment");

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
	            	<label><a href='home.php'>Home</a></label>
	            </div>
	            <div class='count_box'>
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
							</header>
							<div class='highlights'>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-check'></i></p>
											<h3 style='margin-bottom: 5%;'>APPROVED LISTING</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($listing)."</h4>
											<a href='listing.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-clock-o'></i></p>
											<h3 style='margin-bottom: 5%;'>PENDING LISTING</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($listing_p)."</h4>
											<a href='allow_listing.php'>Allow</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-check'></i></p>
											<h3 style='margin-bottom: 5%;'>APPROVED BLOG</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($blog)."</h4>
											<a href='blog.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-clock-o'></i></p>
											<h3 style='margin-bottom: 5%;'>PENDING BLOG</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($blog_p)."</h4>
											<a href='allow_blog.php'>Allow</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fas fa-wallet'></i></p>
											<h3 style='margin-bottom: 5%;'>PACKAGE PURCHASED</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($payment)."</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fas fa-user-friends'></i></p>
											<h3 style='margin-bottom: 5%;'>WEBSITE VISITOR</h3>
											<h4 style='margin-bottom: 5%;'>".$visitor_row['1']."</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-user'></i></p>
											<h3 style='margin-bottom: 5%;'>USERS</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($user)."</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fas fa-user-tie'></i></p>
											<h3 style='margin-bottom: 5%;'>LISTING MEMBERS</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($member)."</h4>
											<a href='listing_member.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='material-icons'>feedback</i></p>
											<h3 style='margin-bottom: 5%;'>FEEDBACK</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($feedback)."</h4>
											<a href='feedback.php'>View</a>
										</header>
									</div>
								</section>
							</div>
						</div>
					</section>
				</div>

            ";
        }

?>
<title>Getlisting - <?php echo $admin_row['1']; ?></title>