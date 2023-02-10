<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php include('header.php'); ?>

<?php include('prevent_user.php'); ?>
<style type="text/css">
	p .fa{color: #EF3652;font-size:55px}
	p .fab{color: #EF3652;font-size:55px}
	p .fas{color: #EF3652;font-size:55px}
	header.special {text-align: center !important;margin-bottom: 2rem !important; }
</style>
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
        	$favourite = mysqli_query($conn,"SELECT * FROM favourite WHERE user_email = '{$user_row['2']}' ");
        	$review = mysqli_query($conn,"SELECT * FROM review WHERE user_email = '{$user_row['2']}' ");
        	$appointment = mysqli_query($conn,"SELECT * FROM appointment WHERE user_email = '{$user_row['2']}' ");

        	include('user_sidebar.php');
        	?>
        	<title><?php echo ucfirst($user_row['1'])." - Home"; ?></title>
        	<?php
            echo "
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
											<p><i class='fa fa-thumbs-up'></i></p>
											<h3 style='margin-bottom: 5%;'>FAVOURITE LISTING</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($favourite)."</h4>
											<a href='favourite_listing.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-star'></i></p>
											<h3 style='margin-bottom: 5%;'>REVIEW</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($review)."</h4>
											<a href='review.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><p><i class='fa fa-coffee'></i></p></p>
											<h3 style='margin-bottom: 5%;'>APPOINTMENT</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($appointment)."</h4>
											<a href='appointment.php'>View</a>
										</header>
									</div>
								</section>
							</div>
						</div>
					</section>
				</div>

            ";
        }
        elseif (mysqli_num_rows($free)>0) 
        {	
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$free_row['2']}' AND status = '1' ");
        	$listing_p = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$free_row['2']}' AND status = '0' ");
        	$blog = mysqli_query($conn,"SELECT * FROM blog WHERE member_email = '{$free_row['2']}' ");
        	$visitor = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$free_row['2']}' ");
        	$visitor_row = mysqli_fetch_row($visitor);
        	$visitor_num = $visitor_row['24'];
        	$review = mysqli_query($conn,"SELECT * FROM review WHERE member_email = '{$free_row['2']}' ");
        	$faq = mysqli_query($conn,"SELECT * FROM faq WHERE member_email = '{$free_row['2']}' ");

        	include('free_sidebar.php');
        	?>
        	<title><?php echo ucfirst($free_row['1'])." - Home"; ?></title>
        	<?php
        	echo "
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
											<a href='pending_listing.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fab fa-blogger-b'></i></p>
											<h3 style='margin-bottom: 5%;'>BLOG</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($blog)."</h4>
											<a href='blog.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fas fa-user-friends'></i></p>
											<h3 style='margin-bottom: 5%;'>VISITOR</h3>
											<h4 style='margin-bottom: 5%;'>".$visitor_num."</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-star'></i></p>
											<h3 style='margin-bottom: 5%;'>REVIEW</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($review)."</h4>
											<a href='review.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-question'></i></p>
											<h3 style='margin-bottom: 5%;'>FAQ</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($faq)."</h4>
										</header>
									</div>
								</section>
							</div>
						</div>
					</section>
				</div>

            ";
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}' AND status = '1' ");
        	$listing_p = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}' AND status = '0' ");
        	$blog = mysqli_query($conn,"SELECT * FROM blog WHERE member_email = '{$standard_row['2']}' ");
        	$visitor = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}' ");
        	$visitor_row = mysqli_fetch_row($visitor);
        	$visitor_num = $visitor_row['24'];
        	$review = mysqli_query($conn,"SELECT * FROM review WHERE member_email = '{$standard_row['2']}' ");
        	$appointment = mysqli_query($conn,"SELECT * FROM appointment WHERE member_email = '{$standard_row['2']}' ");

        	include('standard_sidebar.php');
        	?>
        	<title><?php echo ucfirst($standard_row['1'])." - Home"; ?></title>
        	<?php
        	echo "
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
											<a href='pending_listing.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fab fa-blogger-b'></i></p>
											<h3 style='margin-bottom: 5%;'>BLOG</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($blog)."</h4>
											<a href='blog.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fas fa-user-friends'></i></p>
											<h3 style='margin-bottom: 5%;'>VISITOR</h3>
											<h4 style='margin-bottom: 5%;'>".$visitor_num."</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-star'></i></p>
											<h3 style='margin-bottom: 5%;'>REVIEW</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($review)."</h4>
											<a href='review.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-question'></i></p>
											<h3 style='margin-bottom: 5%;'>APPOINTMENT</h3>
											<h4 style='margin-bottom: 5%;'>".mysqli_num_rows($appointment)."</h4>
											<a href='appointment.php'>View</a>
										</header>
									</div>
								</section>
							</div>
						</div>
					</section>
				</div>

            ";
        }
        elseif (mysqli_num_rows($premium)>0)
        {	
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' AND status = '1' ");
        	$listing_p = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' AND status = '0' ");
        	$blog = mysqli_query($conn,"SELECT * FROM blog WHERE member_email = '{$premium_row['2']}' ");
        	$visitor = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' ");
        	$visitor_row = mysqli_fetch_row($visitor);
        	$visitor_num = $visitor_row['24'];
        	$review = mysqli_query($conn,"SELECT * FROM review WHERE member_email = '{$premium_row['2']}' ");
        	$appointment = mysqli_query($conn,"SELECT * FROM appointment WHERE member_email = '{$premium_row['2']}' ");
	     		

        	include('premium_sidebar.php');
        	?>
        	<title><?php echo ucfirst($premium_row['1'])." - Home"; ?></title>
        	<?php
            echo "
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
											<h3>APPROVED LISTING</h3>
											<h4>".mysqli_num_rows($listing)."</h4>
											<a href='listing.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-clock-o'></i></p>
											<h3>PENDING LISTING</h3>
											<h4>".mysqli_num_rows($listing_p)."</h4>
											<a href='pending_listing.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fab fa-blogger-b'></i></p>
											<h3>BLOG</h3>
											<h4>".mysqli_num_rows($blog)."</h4>
											<a href='blog.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fas fa-user-friends'></i></p>
											<h3>VISITOR</h3>
											<h4>".$visitor_num."</h4>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-star'></i></p>
											<h3>REVIEW</h3>
											<h4>".mysqli_num_rows($review)."</h4>
											<a href='review.php'>View</a>
										</header>
									</div>
								</section>
								<section>
									<div class='content padding_reduce_content'>
										<header>
											<p><i class='fa fa-question'></i></p>
											<h3>APPOINTMENT</h3>
											<h4>".mysqli_num_rows($appointment)."</h4>
											<a href='appointment.php'>View</a>
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