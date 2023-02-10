<?php include('header.php'); ?>
<title>Getlisting - Business City</title>
<?php  

	$city_fetch = mysqli_query($conn,"SELECT distinct(listing_city) FROM listing WHERE status != 0 AND active_deactive = 'active' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2 class='media_city'>FIND LOCAL BUSINESS BY CITY</h2>
							</header>
							";
							
							echo "
							<div class='highlights'>
			 ";
			
			 while ($city_fetch_row = mysqli_fetch_row($city_fetch)) 
			 {
			 	
			 	echo "

			 			<section>
							<div class='content padding_reduce_content'>
								<header>
									<h3><a href='listing_city.php?city=".$city_fetch_row['0']."'>".$city_fetch_row['0']."</a></h3>
								</header>
							</div>
						</section>

			 		 ";
			 }

			 echo "

			 				</div>
						</div>
					</section>
				</div>

			 	  ";

?>

<?php include('footer.php'); ?>