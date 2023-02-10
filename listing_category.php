<?php include('header.php'); ?>
<?php  
	
	$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status != '0' AND active_deactive = 'active' AND listing_category = '{$_GET['category']}' ");
		
	echo "

		<div class='blog'>
		<!-- Highlights -->
			<section class='wrapper'>
				<div class='inner'>
					<header class='special'>
						<h2 class='media_cat'>FIND LOCAL BUSINESS IN ".$_GET['category']." CATEGORY</h2>
					</header>
		";
		if (mysqli_num_rows($listing_fetch) == 0) 
		{
			echo "<div style='text-align: center;font-size: 20px;color: #EF3652;'>No business listing found in ".$_GET['category']." category</div>";
		}
		echo "
			<div class='highlights'>
		";

			 while ($listing_fetch_row = mysqli_fetch_row($listing_fetch)) 
			 {
			 	echo "

			 			<section>
							<div class='content padding_reduce_content'>
								<header>
									<a href='listing_page.php?lid=".$listing_fetch_row['0']."'><img src='listed images/".$listing_fetch_row['13']."'></a>
									<h3>".$listing_fetch_row['1']."</h3>
									<h4>".$listing_fetch_row['23']." Likes</h4>
								</header>
								<p>".$listing_fetch_row['2']."</p>
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
<title>Getlisting - <?php echo "Listings By ".$_GET['category']; ?></title>
<?php include('footer.php'); ?>