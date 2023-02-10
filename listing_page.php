<?php include('header.php'); ?>

<style type="text/css">#banner{ background-position: center !important; }</style>
<?php  
	global $select_free_row;
	global $select_standard_row;
	global $select_premium_row;
	error_reporting(0);

	$lid = $_GET['lid'];

	$select_free = mysqli_query($conn,"SELECT * FROM listing WHERE id='{$lid}' AND type='free' ");
	$select_free_row = mysqli_fetch_row($select_free);

	$select_standard = mysqli_query($conn,"SELECT * FROM listing WHERE id='{$lid}' AND type='standard' ");
	$select_standard_row = mysqli_fetch_row($select_standard);

	$select_premium = mysqli_query($conn,"SELECT * FROM listing WHERE id='{$lid}' AND type='premium' ");
	$select_premium_row = mysqli_fetch_row($select_premium);

?>
<?php  

	

?>
<?php  

	if (mysqli_num_rows($select_free)>0) 
	{	

		$select_fav = mysqli_query($conn,"SELECT * FROM favourite WHERE listing_id = '{$lid}' ");

		$list_to_hour_un = unserialize($select_free_row['9']);

	    $mthr = $list_to_hour_un[0];
	    $tthr = $list_to_hour_un[1];
	    $wthr = $list_to_hour_un[2];
	    $ththr = $list_to_hour_un[3];
	    $fthr = $list_to_hour_un[4];
	    $sthr = $list_to_hour_un[5];
	    $suthr = $list_to_hour_un[6];

		$list_from_hour_un = unserialize($select_free_row['8']);

	    $mfhr = $list_from_hour_un[0];
	    $tfhr = $list_from_hour_un[1];
	    $wfhr = $list_from_hour_un[2];
	    $thfhr = $list_from_hour_un[3];
	    $ffhr = $list_from_hour_un[4];
	    $sfhr = $list_from_hour_un[5];
	    $sufhr = $list_from_hour_un[6];

		?>
		<div class="listing_page">
		<title>Getlisting - <?php echo $select_free_row['1']; ?></title>
		<section id="banner" style="background: url('<?php echo "listed%20images/".$select_free_row['13']; ?>');background-size: cover;">
				<div class="inner inner_listing">
					<div class="banner_left">
						<h2><?php echo $select_free_row['1']; ?></h2>
						<h3><?php echo $select_free_row['2']; ?></h3>
						<h3><?php echo $select_free_row['24']." Views"; ?></h3>
						<h3><?php echo mysqli_num_rows($select_fav)." Favourites"; ?></h3>
					</div>
					<div class="banner_right">
						<?php echo '<a href="add_to_favourite.php?listing_id='.$select_free_row['0'].'">Add To Favourite</a>'; ?>
						<?php echo '<a href="write_review.php?lid='.$select_free_row['0'].'">Write A Review</a>'; ?>
					</div>
				</div>
		</section>

	<section class="listingdtl">
		<div class="row">
			<div class="col-left">
				<div class="about_member_portion ldtlbx">
					<div class="about_portion">
						<label class="ttl">About The Listing</label>
						<div>
							<p><?php echo $select_free_row['10']; ?></p>
						</div>
					</div>
				</div>
				<div class="tagline_category_city ldtlbx">
					<div class="title">
						<label>Tagline</label>
						<label>Category</label>
						<label>City</label>
					</div>
					<br>
					<hr>
					<div class="value">
						<label><?php echo $select_free_row['6']; ?></label>
						<label><?php echo $select_free_row['5']; ?></label>
						<label><?php echo $select_free_row['7']; ?></label>
					</div>
				</div>
				<div class="explore_other ldtlbx">
					<label class="ttl">Explore More From <?php echo $select_free_row['1']; ?></label>
					<div>
						<?php echo '<a href="gallery.php?listing_id='.$select_free_row['0'].'">Gallery</a>'; ?>
						<?php echo '<a href="faq.php?listing_id='.$select_free_row['0'].'">FAQ</a>'; ?>
					</div>
				</div>
				<div class="hours_operation ldtlbx">
					<label class="ttl">Hours Of Operation</label>
					<div class="hours_sub">
						<?php 
							if ($mfhr == "Open 24 Hour" OR $mthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Monday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($mfhr == "Closed" OR $mthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Monday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Monday</label><label class='value'>".$mfhr." To ".$mthr."</label></div>";
							}
						?>
						<?php 
							if ($tfhr == "Open 24 Hour" OR $tthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Tuesday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($tfhr == "Closed" OR $tthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Tuesday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Tuesday</label><label class='value'>".$tfhr." To ".$tthr."</label></div>";
							}
						?>
						<?php 
							if ($wfhr == "Open 24 Hour" OR $wthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Wednesday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($wfhr == "Closed" OR $wthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Wednesday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Wednesday</label><label class='value'>".$wfhr." To ".$wthr."</label></div>";
							}
						?>
						<?php 
							if ($thfhr == "Open 24 Hour" OR $ththr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Thursday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($thfhr == "Closed" OR $ththr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Thursday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Thursday</label><label class='value'>".$thfhr." To ".$ththr."</label></div>";
							}
						?>
						<?php 
							if ($ffhr == "Open 24 Hour" OR $fthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Friday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($ffhr == "Closed" OR $fthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Friday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Friday</label><label class='value'>".$ffhr." To ".$fthr."</label></div>";
							}
						?>
						<?php 
							if ($sfhr == "Open 24 Hour" OR $sthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Saturday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($sfhr == "Closed" OR $sthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Saturday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Saturday</label><label class='value'>".$sfhr." To ".$sthr."</label></div>";
							}
						?>
						<?php 
							if ($sufhr == "Open 24 Hour" OR $suthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Sunday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($sufhr == "Closed" OR $suthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Sunday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Sunday</label><label class='value'>".$sufhr." To ".$suthr."</label></div>";
							}
						?>
					</div>
				</div>
				<div class="review ldtlbx">
					<label class="ttl">People's Review About <?php echo $select_free_row['1']; ?></label>
					
					<div>
						<?php  

							$select_free_review = mysqli_query($conn,"SELECT * FROM review WHERE listing_id = '{$select_free_row['0']}' ");

							while ($select_free_review_row = mysqli_fetch_row($select_free_review)) 
							{
								echo "

										<label>".$select_free_review_row['4']."</label>
										<label>".$select_free_review_row['6']."</label>
										<label style='margin-bottom:5px;'>Rating : </label>";
										for($i=1; $i<=$select_free_review_row['7']; $i++){
											echo '<img src="images/star.png" />&nbsp&nbsp&nbsp&nbsp';
										}
										
										
										echo "<label style='margin-top:5px;'>".$select_free_review_row['8']."</label>
										<hr>

									";
							}

						?>
					</div>
				</div>
			</div>
			<div class="col-right">
				<div class="member_portion lsdbrbx">
					<label class="ttl">Member Profile</label>
					<div>
						<p><?php echo $select_free_row['4']; ?></p>
						<p><?php echo $select_free_row['3']; ?></p>
						<p><?php echo "Contact : ".$select_free_row['11']; ?></p>
						<p><?php echo "Telephone : ".$select_free_row['12']; ?></p>
					</div>
				</div>
				
			</div>
		</div>
	</section>
</div>
	<?php 
	
		}

		listing_view1();

		function listing_view1()
		{
			global $select_free_row;
			global $conn;

			$listing_view1 = $select_free_row['24'];
			if($listing_view1 >= 0) 
			{	
				$listing_view1_inc = $listing_view1+1;	
				$update = mysqli_query($conn,"UPDATE listing SET views='$listing_view1_inc' WHERE id = '{$select_free_row['0']}' ");
			}
		}

	?>

<?php  

	if (mysqli_num_rows($select_standard)>0) 
	{	
		$select_fav = mysqli_query($conn,"SELECT * FROM favourite WHERE listing_id = '{$lid}' ");
		
		$list_to_hour_un = unserialize($select_standard_row['9']);

	    $mthr = $list_to_hour_un[0];
	    $tthr = $list_to_hour_un[1];
	    $wthr = $list_to_hour_un[2];
	    $ththr = $list_to_hour_un[3];
	    $fthr = $list_to_hour_un[4];
	    $sthr = $list_to_hour_un[5];
	    $suthr = $list_to_hour_un[6];

		$list_from_hour_un = unserialize($select_standard_row['8']);

	    $mfhr = $list_from_hour_un[0];
	    $tfhr = $list_from_hour_un[1];
	    $wfhr = $list_from_hour_un[2];
	    $thfhr = $list_from_hour_un[3];
	    $ffhr = $list_from_hour_un[4];
	    $sfhr = $list_from_hour_un[5];
	    $sufhr = $list_from_hour_un[6];

		?>
		<div class="listing_page">
		<title>Getlisting - <?php echo $select_standard_row['1']; ?></title>
		<section id="banner" style="background: url('<?php echo "listed%20images/".$select_standard_row['13']; ?>');background-size: cover;">
				<div class="inner inner_listing">
					<div class="banner_left">
						<h2><?php echo $select_standard_row['1']; ?></h2>
						<h3><?php echo $select_standard_row['2']; ?></h3>
						<h3><?php echo $select_standard_row['24']." Views"; ?></h3>
						<h3><?php echo mysqli_num_rows($select_fav)." Favourites"; ?></h3>
					</div>
					<div class="banner_right">
						<?php echo '<a href="add_to_favourite.php?listing_id='.$select_standard_row['0'].'">Add To Favourite</a>'; ?>
						<?php echo '<a href="write_review.php?lid='.$select_standard_row['0'].'">Write A Review</a>'; ?>
					</div>
				</div>
		</section>

	<section class="listingdtl">
		<div class="row">
			<div class="col-left">
				<div class="about_member_portion ldtlbx">
					<div class="about_portion">
						<label class="ttl">About The Listing</label>
						<div>
							<p><?php echo $select_standard_row['10']; ?></p>
						</div>
					</div>
				</div>
				<div class="tagline_category_city ldtlbx">
					<div class="title">
						<label>Tagline</label>
						<label>Category</label>
						<label>City</label>
					</div>
					<br>
					<hr>
					<div class="value">
						<label><?php echo $select_standard_row['6']; ?></label>
						<label><?php echo $select_standard_row['5']; ?></label>
						<label><?php echo $select_standard_row['7']; ?></label>
					</div>
				</div>
				<div class="explore_other ldtlbx">
					<label class="ttl">Explore More From <?php echo $select_standard_row['1']; ?></label>
					<div>
						<?php echo '<a href="video.php?listing_id='.$select_standard_row['0'].'">Video</a>'; ?>
						<?php echo '<a href="gallery.php?listing_id='.$select_standard_row['0'].'">Gallery</a>'; ?>
						<?php echo '<a href="announcement.php?listing_id='.$select_standard_row['0'].'">Announcement</a>'; ?>
						<?php echo '<a href="deals_offers.php?listing_id='.$select_standard_row['0'].'">Deals & Offers</a>'; ?>
						<?php echo '<a href="get_appointment.php?listing_id='.$select_standard_row['0'].'">Get Appointment</a>'; ?>
						<?php echo '<a href="faq.php?listing_id='.$select_standard_row['0'].'">FAQ</a>'; ?>
					</div>
				</div>
				<div class="hours_operation ldtlbx">
					<label class="ttl">Hours Of Operation</label>
					
					<div class="hours_sub">
						<?php 
							if ($mfhr == "Open 24 Hour" OR $mthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Monday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($mfhr == "Closed" OR $mthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Monday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Monday</label><label class='value'>".$mfhr." To ".$mthr."</label></div>";
							}
						?>
						<?php 
							if ($tfhr == "Open 24 Hour" OR $tthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Tuesday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($tfhr == "Closed" OR $tthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Tuesday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Tuesday</label><label class='value'>".$tfhr." To ".$tthr."</label></div>";
							}
						?>
						<?php 
							if ($wfhr == "Open 24 Hour" OR $wthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Wednesday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($wfhr == "Closed" OR $wthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Wednesday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Wednesday</label><label class='value'>".$wfhr." To ".$wthr."</label></div>";
							}
						?>
						<?php 
							if ($thfhr == "Open 24 Hour" OR $ththr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Thursday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($thfhr == "Closed" OR $ththr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Thursday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Thursday</label><label class='value'>".$thfhr." To ".$ththr."</label></div>";
							}
						?>
						<?php 
							if ($ffhr == "Open 24 Hour" OR $fthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Friday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($ffhr == "Closed" OR $fthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Friday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Friday</label><label class='value'>".$ffhr." To ".$fthr."</label></div>";
							}
						?>
						<?php 
							if ($sfhr == "Open 24 Hour" OR $sthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Saturday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($sfhr == "Closed" OR $sthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Saturday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Saturday</label><label class='value'>".$sfhr." To ".$sthr."</label></div>";
							}
						?>
						<?php 
							if ($sufhr == "Open 24 Hour" OR $suthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Sunday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($sufhr == "Closed" OR $suthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Sunday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Sunday</label><label class='value'>".$sufhr." To ".$suthr."</label></div>";
							}
						?>
					</div>
				</div>									
				<div class="review ldtlbx">
					<label class="ttl">People's Review About <?php echo $select_standard_row['1']; ?></label>
					
					<div>
						<?php  

							$select_standard_review = mysqli_query($conn,"SELECT * FROM review WHERE listing_id = '{$select_standard_row['0']}' ");

							while ($select_standard_review_row = mysqli_fetch_row($select_standard_review)) 
							{
								echo "

										<label>".$select_standard_review_row['4']."</label>
										<label>".$select_standard_review_row['6']."</label>
										<label style='margin-bottom:5px;'>Rating : </label>";
										for($i=1; $i<=$select_standard_review_row['7']; $i++){
											echo '<img src="images/star.png" />&nbsp&nbsp&nbsp&nbsp';
										}
										
										
										echo "<label style='margin-top:5px;'>".$select_standard_review_row['8']."</label>
										<hr>

									";
							}

						?>
					</div>
				</div>
			</div>
			<div class="col-right">
				<div class="member_portion lsdbrbx">
					<label class="ttl">Business Location</label>
					<div>
						<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $select_standard_row['26']; ?>,<?php echo $select_standard_row['27']; ?>&output=embed"></iframe>
					</div>
				</div>
				<div class="member_portion lsdbrbx">
					<label class="ttl">Member Profile</label>
					<div>
						<p><?php echo $select_standard_row['4']; ?></p>
						<p><?php echo $select_standard_row['3']; ?></p>
						<p><?php echo "Contact : ".$select_standard_row['11']; ?></p>
						<p><?php echo "Telephone : ".$select_standard_row['12']; ?></p>
					</div>
				</div>
				<div class="social_media lsdbrbx">
					<label  class="ttl">Social Media About <?php echo $select_standard_row['1']; ?></label>
					
					<div>
						<label><?php echo $select_standard_row['1']."'s "; ?>Website</label><label class="value"><a style="word-break: break-all;" target="_BLANK" href=<?php echo $select_standard_row['17']; ?>><?php echo $select_standard_row['17']; ?></a></label>
					</div>
				</div>

				
			</div>
		</div>
	</section>
</div>
	<?php 
	
		}

		listing_view2();

		function listing_view2()
		{
			global $select_standard_row;
			global $conn;

			$listing_view2 = $select_standard_row['24'];
			if($listing_view2 >= 0) 
			{	
				$listing_view2_inc = $listing_view2+1;
				$update = mysqli_query($conn,"UPDATE listing SET views='$listing_view2_inc' WHERE id = '{$select_standard_row['0']}' ");
			}
		}

	?> 


<?php  

	if (mysqli_num_rows($select_premium)>0) 
	{	
		$select_fav = mysqli_query($conn,"SELECT * FROM favourite WHERE listing_id = '{$lid}' ");
		
		$list_to_hour_un = unserialize($select_premium_row['9']);

	    $mthr = $list_to_hour_un[0];
	    $tthr = $list_to_hour_un[1];
	    $wthr = $list_to_hour_un[2];
	    $ththr = $list_to_hour_un[3];
	    $fthr = $list_to_hour_un[4];
	    $sthr = $list_to_hour_un[5];
	    $suthr = $list_to_hour_un[6];

		$list_from_hour_un = unserialize($select_premium_row['8']);

	    $mfhr = $list_from_hour_un[0];
	    $tfhr = $list_from_hour_un[1];
	    $wfhr = $list_from_hour_un[2];
	    $thfhr = $list_from_hour_un[3];
	    $ffhr = $list_from_hour_un[4];
	    $sfhr = $list_from_hour_un[5];
	    $sufhr = $list_from_hour_un[6];

		?>
		<div class="listing_page">
		<title>Getlisting - <?php echo $select_premium_row['1']; ?></title>
		<section id="banner" style="background: url('<?php echo "listed%20images/".$select_premium_row['13']; ?>');background-size: cover;">
				<div class="inner inner_listing">
					<div class="banner_left">
						<h2><?php echo $select_premium_row['1']; ?></h2>
						<h3><?php echo $select_premium_row['2']; ?></h3>
						<h3><?php echo $select_premium_row['24']." Views"; ?></h3>
						<h3><?php echo mysqli_num_rows($select_fav)." Favourites"; ?></h3>
					</div>
					<div class="banner_right">
						<?php echo '<a href="add_to_favourite.php?listing_id='.$select_premium_row['0'].'">Add To Favourite</a>'; ?>
						<?php echo '<a href="write_review.php?lid='.$select_premium_row['0'].'">Write A Review</a>'; ?>
					</div>
				</div>
		</section>

	<section class="listingdtl">
		<div class="row">
			<div class="col-left">
				<div class="about_member_portion ldtlbx">
					<div class="about_portion">
						<label class="ttl">About The Listing</label>
						<div>
							<p><?php echo $select_premium_row['10']; ?></p>
						</div>
					</div>
				</div>
				<div class="tagline_category_city ldtlbx">
					<div class="title">
						<label>Tagline</label>
						<label>Category</label>
						<label>City</label>
					</div>
					<br>
					<hr>
					<div class="value">
						<label><?php echo $select_premium_row['6']; ?></label>
						<label><?php echo $select_premium_row['5']; ?></label>
						<label><?php echo $select_premium_row['7']; ?></label>
					</div>
				</div>
				<div class="explore_other ldtlbx">
					<label class="ttl">Explore More From <?php echo $select_premium_row['1']; ?></label>
					<div>
						<?php echo '<a href="video.php?listing_id='.$select_premium_row['0'].'">Video</a>'; ?>
						<?php echo '<a href="gallery.php?listing_id='.$select_premium_row['0'].'">Gallery</a>'; ?>
						<?php echo '<a href="announcement.php?listing_id='.$select_premium_row['0'].'">Announcement</a>'; ?>
						<?php echo '<a href="deals_offers.php?listing_id='.$select_premium_row['0'].'">Deals & Offers</a>'; ?>
						<?php echo '<a href="get_appointment.php?listing_id='.$select_premium_row['0'].'">Get Appointment</a>'; ?>
						<?php echo '<a href="product.php?listing_id='.$select_premium_row['0'].'">Product</a>'; ?>
						<?php echo '<a href="faq.php?listing_id='.$select_premium_row['0'].'">FAQ</a>'; ?>

					</div>
				</div>
				<div class="hours_operation ldtlbx">
					<label class="ttl">Hours Of Operation</label>
					
					<div class="hours_sub">
						<?php 
							if ($mfhr == "Open 24 Hour" OR $mthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Monday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($mfhr == "Closed" OR $mthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Monday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Monday</label><label class='value'>".$mfhr." To ".$mthr."</label></div>";
							}
						?>
						<?php 
							if ($tfhr == "Open 24 Hour" OR $tthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Tuesday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($tfhr == "Closed" OR $tthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Tuesday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Tuesday</label><label class='value'>".$tfhr." To ".$tthr."</label></div>";
							}
						?>
						<?php 
							if ($wfhr == "Open 24 Hour" OR $wthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Wednesday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($wfhr == "Closed" OR $wthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Wednesday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Wednesday</label><label class='value'>".$wfhr." To ".$wthr."</label></div>";
							}
						?>
						<?php 
							if ($thfhr == "Open 24 Hour" OR $ththr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Thursday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($thfhr == "Closed" OR $ththr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Thursday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Thursday</label><label class='value'>".$thfhr." To ".$ththr."</label></div>";
							}
						?>
						<?php 
							if ($ffhr == "Open 24 Hour" OR $fthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Friday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($ffhr == "Closed" OR $fthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Friday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Friday</label><label class='value'>".$ffhr." To ".$fthr."</label></div>";
							}
						?>
						<?php 
							if ($sfhr == "Open 24 Hour" OR $sthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Saturday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($sfhr == "Closed" OR $sthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Saturday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Saturday</label><label class='value'>".$sfhr." To ".$sthr."</label></div>";
							}
						?>
						<?php 
							if ($sufhr == "Open 24 Hour" OR $suthr == "Open 24 Hour") 
							{
								echo "<div class='hrow'><label class='name'>Sunday</label><label class='value'>Open 24 Hours</label></div>";
							}
							elseif ($sufhr == "Closed" OR $suthr == "Closed") 
							{
								echo "<div class='hrow'><label class='name'>Sunday</label><label class='value'>Closed</label></div>";
							}
							else
							{
								echo "<div class='hrow'><label class='name'>Sunday</label><label class='value'>".$sufhr." To ".$suthr."</label></div>";
							}
						?>
					</div>
				</div>
				<div class="review ldtlbx">
					<label class="ttl">People's Review About <?php echo $select_premium_row['1']; ?></label>
					
					<div>
						<?php  

							$select_premium_review = mysqli_query($conn,"SELECT * FROM review WHERE listing_id = '{$select_premium_row['0']}' ");

							while ($select_premium_review_row = mysqli_fetch_row($select_premium_review)) 
							{
								echo "

										<label>".$select_premium_review_row['4']."</label>
										<label>".$select_premium_review_row['6']."</label>
										<label style='margin-bottom:5px;'>Rating : </label>";
										for($i=1; $i<=$select_premium_review_row['7']; $i++){
											echo '<img src="images/star.png" />&nbsp&nbsp&nbsp&nbsp';
										}
										
										
										echo "<label style='margin-top:5px;'>".$select_premium_review_row['8']."</label>
										<hr>

									";
							}

						?>
					</div>
				</div>

			</div>
			<div class="col-right">
				<div class="member_portion lsdbrbx">
					<label class="ttl">Business Location</label>
					<div>
						<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $select_premium_row['26']; ?>,<?php echo $select_premium_row['27']; ?>&output=embed"></iframe>
					</div>
				</div>
				<div class="member_portion lsdbrbx">
					<label class="ttl">Member Profile</label>
					<div>
						<p><?php echo $select_premium_row['4']; ?></p>
						<p><?php echo $select_premium_row['3']; ?></p>
						<p><?php echo "Contact : ".$select_premium_row['11']; ?></p>
						<p><?php echo "Telephone : ".$select_premium_row['12']; ?></p>

					</div>
				</div>
				<div class="social_media lsdbrbx">
					<label  class="ttl">Social Media About <?php echo $select_premium_row['1']; ?></label>
					
					<div>
						<label><?php echo $select_premium_row['1']."'s "; ?>Website</label><label class="value"><a style="word-break: break-all;" href=<?php echo $select_premium_row['17']; ?>><?php echo $select_premium_row['17']; ?></a></label>
						<label><?php echo $select_premium_row['1']."'s "; ?>Facbook</label><label class="value"><a style="word-break: break-all;" href=<?php echo $select_premium_row['19']; ?>><?php echo $select_premium_row['19']; ?></a></label>
						<label><?php echo $select_premium_row['1']."'s "; ?>Instagram</label><label class="value"><a style="word-break: break-all;"href=<?php echo $select_premium_row['20']; ?>><?php echo $select_premium_row['20']; ?></a></label>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	<?php 
	
		}

		listing_view3();

		function listing_view3()
		{
			global $select_premium_row;
			global $conn;

			$listing_view3 = $select_premium_row['24'];
			if($listing_view3 >= 0) 
			{	
				$listing_view3_inc = $listing_view3+1;	
				$update = mysqli_query($conn,"UPDATE listing SET views='$listing_view3_inc' WHERE id = '{$select_premium_row['0']}' ");
			}
		}

	?>
	
<?php include('footer.php'); ?>