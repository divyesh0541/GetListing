<!-- Header Include -->
<?php include('header.php'); ?>

<?php  

	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['listing_id']}' ");
	$listing_row = mysqli_fetch_row($listing);

	$url = $listing_row['16'];
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
?>
<title><?php echo $listing_row['1']; ?> - Video</title>
<h2 class="listing_feature_h2">Business Listing Video From <?php echo $listing_row['1']; ?></h2>
<div class="listing_page">
	<div class="listingdtl">
			<div class="ldtlbx listing_feature_video">
				<label>Business Listing Video</label>
				<iframe width="720" height="345"
					src="https://www.youtube.com/embed/<?php echo $my_array_of_vars['v']; ?>">
				</iframe>
			</div>
			<?php echo "<a href='listing_page.php?lid=".$listing_row['0']."' class='l_video_a'>Back To Listing</a>"; ?>
	</div>	
</div>

<?php include('footer.php'); ?>