<?php include('header.php'); ?>
<?php  

	$select_product = mysqli_query($conn,"SELECT * FROM product WHERE listing_id = '{$_GET['listing_id']}' ");

	$select_listing = mysqli_query($conn,"SELECT * FROM listing WHERE id='{$_GET['listing_id']}' ");
	$select_listing_row = mysqli_fetch_row($select_listing);

?>
<title><?php echo $select_listing_row['1']; ?> - Product</title>
<label class="blog_details_title product_details_title">Products Of <?php echo $select_listing_row['1']; ?></label>
<div class="blog_details product">
	<section class="wrapper">
				<div class="inner">
					<header class="special">
					</header>
					<div class="highlights">
						<?php  
							if (mysqli_num_rows($select_product) == 0) 
							{
								echo "<div style='width: 100%;border: 2px solid;padding: 4% 3%;font-size: 19px;'>There is no any Products regarding ".$select_listing_row['1']."</div>";
							}
							while ($select_product_row = mysqli_fetch_row($select_product)) 
							{
								echo "

										<section class='prdct_section'>
											<div class='content padding_reduce_content'>
												<header>
													<div class='prdct_left'>
														<h3>".$select_product_row['4']."</h3>
														<a href='".$select_product_row['6']."'><img src='product images/".$select_product_row['8']."'></a>
													</div>
													<div class='prdct_right'>
														<h4>".$select_product_row['5']."</h4>
														<h4>".$select_product_row['7']."</h4>
													</div>
												</header>
											</div>
										</section>
										<br>
										<br>
										

									";
							}

						?>
					</div>
					<?php echo "<a href='listing_page.php?lid=".$select_listing_row['0']."' class='l_video_a'>Back To Listing</a>"; ?>
				</div>

			</section>
</div>
<?php include('footer.php'); ?>