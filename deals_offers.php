<?php include('header.php'); ?>
<?php  

	$select_deals = mysqli_query($conn,"SELECT * FROM deals_offers WHERE listing_id = '{$_GET['listing_id']}' ");

	$select_listing = mysqli_query($conn,"SELECT * FROM listing WHERE id='{$_GET['listing_id']}' ");
	$select_listing_row = mysqli_fetch_row($select_listing);

?>
<title><?php echo $select_listing_row['1']; ?> - Deals Offers</title>
<h2 class="listing_feature_h2_deals listing_feature_h2">Business Listing Deals & Offers From <?php echo $select_listing_row['1']; ?></h2>
<div class="listing_page">
	<div class="listingdtl">
			<div class="ldtlbx listing_feature_announcement">
				<?php  

					$i = 1;
					if (mysqli_num_rows($select_deals)>0) 
					{
						while ($select_deals_row = mysqli_fetch_row($select_deals)) 
						{
							echo "

									<label style='color: #EF3652;'>"."(".$i.")"." ".$select_deals_row['4']."</label>
									<label style='width: 70%;'>".$select_deals_row['5']."</label>
									<label style='color: #EF3652;'>Terms and conditions :- </label>
									<label style='width: 70%;'>".$select_deals_row['6']."</label>
									<label>Added On ".$select_deals_row['7']."</label>
									<hr>
								";
							$i++;
						}
					}
					else
					{
						echo "<label style='margin: 1rem 0 1rem 0;'>There is no any Deals & Offers regarding ".$select_listing_row['1']."</label>";
					}

				?>
				
			</div>
			<?php echo "<a href='listing_page.php?lid=".$select_listing_row['0']."' class='l_video_deals'  style='display: inline-block;margin-left: 16%;margin-bottom: 3%;'>Back To Listing</a>"; ?>
	</div>
			
</div>
	

<?php include('footer.php'); ?>