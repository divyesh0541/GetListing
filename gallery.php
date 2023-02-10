<!-- Header Include -->
<?php include('header.php'); ?>

<?php  

	$listing_free = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['listing_id']}' AND type='free' ");
	$listing_free_row = mysqli_fetch_row($listing_free);

	$listing_standard = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['listing_id']}' AND type='standard' ");
	$listing_standard_row = mysqli_fetch_row($listing_standard);

	$listing_premium = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['listing_id']}' AND type='premium' ");
	$listing_premium_row = mysqli_fetch_row($listing_premium);

?>

<?php  

	if (mysqli_num_rows($listing_free)>0) 
	{
		?>
			<title><?php echo $listing_free_row['1']; ?> - Gallery</title>
			<h2 class="listing_feature_h2">Business Listing Gallery From <?php echo $listing_free_row['1']; ?></h2>
			<div class="listing_page">
				<div class="listingdtl">
						<div class="ldtlbx listing_feature_gallery">
							<label>Business Listing Gallery</label>
							<?php echo "<img src='listed images/".$listing_free_row['13']."' class='img1'>" ?>
						</div>
						<?php echo "<a href='listing_page.php?lid=".$listing_free_row['0']."' class='l_video_a'>Back To Listing</a>"; ?>
				</div>	
			</div>

<?php } ?>

<?php  

	if (mysqli_num_rows($listing_standard)>0) 
	{
		?>
			<title><?php echo $listing_standard_row['1']; ?> - Gallery</title>
			<h2 class="listing_feature_h2">Business Listing Gallery From <?php echo $listing_standard_row['1']; ?></h2>
			<div class="listing_page">
				<div class="listingdtl">
						<div class="ldtlbx listing_feature_gallery">
							<label>Business Listing Gallery</label>
							<?php echo "<img src='listed images/".$listing_standard_row['13']."' class='img1'>" ?>
							<?php echo "<img src='listed images/".$listing_standard_row['14']."' class='img2'>" ?>
						</div>
						<?php echo "<a href='listing_page.php?lid=".$listing_standard_row['0']."' class='l_video_a'>Back To Listing</a>"; ?>
				</div>	
			</div>

<?php } ?>

<?php  

	if (mysqli_num_rows($listing_premium)>0) 
	{
		?>
			<title><?php echo $listing_premium_row['1']; ?> - Gallery</title>
			<h2 class="listing_feature_h2">Business Listing Gallery From <?php echo $listing_premium_row['1']; ?></h2>
			<div class="listing_page">
				<div class="listingdtl">
						<div class="ldtlbx listing_feature_gallery">
							<label>Business Listing Gallery</label>
							<?php echo "<img src='listed images/".$listing_premium_row['13']."' class='img1'>" ?>
							<?php echo "<img src='listed images/".$listing_premium_row['14']."' class='img2'>" ?>
							<?php echo "<img src='listed images/".$listing_premium_row['15']."' class='img2'>" ?>
						</div>
						<?php echo "<a href='listing_page.php?lid=".$listing_premium_row['0']."' class='l_video_a'>Back To Listing</a>"; ?>
				</div>	
			</div>

<?php } ?>



<?php include('footer.php'); ?>