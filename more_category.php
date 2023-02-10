<?php include('header.php'); ?>
<title>Getlisting - Business Categories</title>
<?php  

	$category_fetch = mysqli_query($conn,"SELECT distinct(listing_category) FROM listing WHERE status != 0 AND active_deactive = 'active' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2 class='media_cat'>FIND LOCAL BUSINESS BY CATEGORY</h2>
							</header>
							";
							
							echo "
							<div class='highlights'>
			 ";
			
			 while ($category_fetch_row = mysqli_fetch_row($category_fetch)) 
			 {
			 	
			 	echo "

			 			<section>
							<div class='content padding_reduce_content'>
								<header>
									<h3><a href='listing_category.php?category=".$category_fetch_row['0']."'>".$category_fetch_row['0']."</a></h3>
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