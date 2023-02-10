<!-- Header Include -->
<?php include('header.php'); ?>

<?php  

	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['listing_id']}' ");
	$listing_row = mysqli_fetch_row($listing);

	$faq = mysqli_query($conn,"SELECT * FROM faq WHERE listing_id = '{$_GET['listing_id']}' ");

?>
<title><?php echo $listing_row['1']; ?> - FAQs</title>
<h2 class="listing_feature_h2">Business Listing FAQ From <?php echo $listing_row['1']; ?></h2>
<div class="listing_page">
	<div class="listingdtl">
			<div class="ldtlbx listing_feature_announcement">
				<?php  

					$i = 1;
					if (mysqli_num_rows($faq)>0) 
					{
						while ($faq_row = mysqli_fetch_row($faq)) 
						{
							echo "
									<label style='color: #EF3652;'>"."(".$i.")"." ".$faq_row['4']."</label>
									<label style='width: 70%;'>".$faq_row['5']."</label>
									<hr>

								";
							$i++;
						}
					}
					else
					{
						echo "<label>There is no any faq regarding ".$listing_row['1']."</label>";
					}

				?>
				
			</div>
			<?php echo "<a style='margin-left: 16%;margin-bottom: 3%;display: inline-block;' href='listing_page.php?lid=".$listing_row['0']."' class='l_video_a_faq'>Back To Listing</a>"; ?>
	</div>

</div>
	

<?php include('footer.php'); ?>