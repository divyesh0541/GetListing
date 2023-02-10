<!-- Header Include -->
<?php include('header.php'); ?>

<?php  

	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['listing_id']}' ");
	$listing_row = mysqli_fetch_row($listing);

	$announcement = mysqli_query($conn,"SELECT * FROM announcement WHERE listing_id = '{$_GET['listing_id']}' ");
	
?>
<title><?php echo $listing_row['1']; ?> - Announcement</title>
<h2 class="listing_feature_h2_announ listing_feature_h2">Business Listing Announcement From <?php echo $listing_row['1']; ?></h2>
<div class="listing_page">
	<div class="listingdtl">
			<div class="ldtlbx listing_feature_announcement">
				<?php  

					$i = 1;
					if (mysqli_num_rows($announcement)>0) 
					{
						while ($announcement_row = mysqli_fetch_row($announcement)) 
						{
							echo "
									<label style='color: #EF3652;'>"."(".$i.")"." ".$announcement_row['4']."</label>
									<label style='width: 70%;'>".$announcement_row['5']."</label>
									<label>Added On ".$announcement_row['6']."</label>
									<hr>
								";
							$i++;
						}
					}
					else
					{
						echo "<label>There is no any announcement regarding ".$listing_row['1']."</label>";
					}

				?>
				
			</div>
			<?php echo "<a href='listing_page.php?lid=".$listing_row['0']."' class='l_video_anno' style='display: inline-block;margin-left: 16%;margin-bottom: 3%;'>Back To Listing</a>"; ?>
	</div>

</div>
	

<?php include('footer.php'); ?>