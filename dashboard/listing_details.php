<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php include('header.php'); ?>

<?php include('prevent_user.php'); ?>

<!-- User Roll Code For Dashboard-->
<?php 	
		$user = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='user'");
        $free = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='free'");
        $standard = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='standard'");
		$premium = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='premium'");
        
        // Fetching all the above data
        $user_row = mysqli_fetch_row($user);
        $free_row = mysqli_fetch_row($free);
        $standard_row = mysqli_fetch_row($standard);
        $premium_row = mysqli_fetch_row($premium);

        // Dashboard as per the priority
        if (mysqli_num_rows($free)>0) 
        {
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$free_row['2']}' AND id = '{$_GET['id']}' ");
        	$listing_row = mysqli_fetch_row($listing);

        	$fav = mysqli_query($conn,"SELECT * FROM favourite WHERE listing_id = '{$_GET['id']}' ");
        	

        	// Open Operation Unserialize
        	$list_open_un = unserialize($listing_row['8']);
        	$list_open = '';

        	foreach ($list_open_un as  $value2) {
        		$list_open .= $value2.'<br>';
        	}

        	// Close Operation Unserialize
        	$list_close_un = unserialize($listing_row['9']);
        	$list_close = '';

        	foreach ($list_close_un as  $value3) {
        		$list_close .= $value3.'<br>';
        	}


        	include('free_sidebar.php');
        	?>
        	<title><?php echo ucfirst($free_row['1'])." - ".$listing_row['1']; ?></title>
        	<?php
        	$list_to_hour_un = unserialize($listing_row['9']);

		    $mthr = $list_to_hour_un[0];
		    $tthr = $list_to_hour_un[1];
		    $wthr = $list_to_hour_un[2];
		    $ththr = $list_to_hour_un[3];
		    $fthr = $list_to_hour_un[4];
		    $sthr = $list_to_hour_un[5];
		    $suthr = $list_to_hour_un[6];

			$list_from_hour_un = unserialize($listing_row['8']);

		    $mfhr = $list_from_hour_un[0];
		    $tfhr = $list_from_hour_un[1];
		    $wfhr = $list_from_hour_un[2];
		    $thfhr = $list_from_hour_un[3];
		    $ffhr = $list_from_hour_un[4];
		    $sfhr = $list_from_hour_un[5];
		    $sufhr = $list_from_hour_un[6];
            echo '
	            <div class="bread_crumb">
	            	<label><a href="home.php" class="a_left">Home</a>/<a href="listing.php" class="a_right">Listing</a>/<a href="listing_details.php?id='.$_GET['id'].'" class="a_right">Listing Details</a></label>
	            </div>
	            <div class="listing">
	            	<table>

	            		<tr>
	            			<th>Listing Name</th>
	            			<td>'.$listing_row['1'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Location</th>
	            			<td>'.$listing_row['2'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Email</th>
	            			<td>'.$listing_row['3'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Owner</th>
	            			<td>'.$listing_row['4'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing City</th>
	            			<td>'.$listing_row['7'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Category</th>
	            			<td>'.$listing_row['5'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Tagline</th>
	            			<td>'.$listing_row['6'].'</td>
	            		</tr>
	            		<tr class="hour_operation ldtlbx">

	            			<div class="hours_sub">
							';
								if ($mfhr == "Open 24 Hour" OR $mthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Monday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($mfhr == "Closed" OR $mthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Monday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Monday</label><label class="value">'.$mfhr.' To '.$mthr.'</label></div></td>';
								}
							
						 
								if ($tfhr == "Open 24 Hour" OR $tthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Tuesday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($tfhr == "Closed" OR $tthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Tuesday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Tuesday</label><label class="value">'.$tfhr.' To '.$tthr.'</label></div></td>';
								}
							
							
								if ($wfhr == "Open 24 Hour" OR $wthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Wednesday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($wfhr == "Closed" OR $wthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Wednesday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Wednesday</label><label class="value">'.$wfhr.' To '.$wthr.'</label></div></td>';
								}
							 
								if ($thfhr == "Open 24 Hour" OR $ththr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Thursday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($thfhr == "Closed" OR $ththr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Thursday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Thursday</label><label class="value">'.$thfhr.' To '.$ththr.'</label></div></td>';
								}
							 
								if ($ffhr == "Open 24 Hour" OR $fthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Friday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($ffhr == "Closed" OR $fthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Friday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Friday</label><label class="value">'.$ffhr.' To '.$fthr.'</label></div></td>';
								}
							 
								if ($sfhr == "Open 24 Hour" OR $sthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Saturday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($sfhr == "Closed" OR $sthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Saturday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Saturday</label><label class="value">'.$sfhr.' To '.$sthr.'</label></div></td>';
								}
							
								if ($sufhr == "Open 24 Hour" OR $suthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Sunday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($sufhr == "Closed" OR $suthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Sunday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Sunday</label><label class="value">'.$sufhr.' To '.$suthr.'</label></div></td>';
								}

							echo '
						</div>
	            		</tr>
	            		<tr>
	            			<th>Listing Description</th>
	            			<td>'.$listing_row['10'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Contact</th>
	            			<td>'.$listing_row['11'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Telephone</th>
	            			<td>'.$listing_row['12'].'</td>
	            		</tr>
	            		<tr class="listing_gallery">
	            			<th>Listing Gallery</th>
	            			<td><img src="../listed images/'.$listing_row['13'].'"></td>
	            		</tr>
	            		<tr>
	            			<th>Listing Date</th>
	            			<td>'.$listing_row['18'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Status</th>
	            			<td>'.$listing_row['29'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Package</th>
	            			<td>'.$listing_row['21'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Payment</th>
	            			<td>'.$listing_row['22'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Bookmarks</th>
	            			<td>'.mysqli_num_rows($fav).'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Views</th>
	            			<td>'.$listing_row['24'].'</td>
	            		</tr>

	            	</table>
	            	<a href="edit_listing.php?id='.$listing_row['0'].'" class="edit_a edit_amy">Edit Listing</a>
			';
			if ($listing_row['22'] == 'success' AND $listing_row['25'] != '0') 
			{
				echo '<a href="activate_listing.php?id='.$listing_row['0'].'" class="edit_a edit_amy">Activate Listing</a>
	            	<a href="deactive_listing.php?id='.$listing_row['0'].'" class="edit_a edit_amy">Deactivate Listing</a>
	            	</div>';
			}
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}' AND id = '{$_GET['id']}' ");
        	$listing_row = mysqli_fetch_row($listing);
        	$fav = mysqli_query($conn,"SELECT * FROM favourite WHERE listing_id = '{$_GET['id']}' ");

        	$list_to_hour_un = unserialize($listing_row['9']);

		    $mthr = $list_to_hour_un[0];
		    $tthr = $list_to_hour_un[1];
		    $wthr = $list_to_hour_un[2];
		    $ththr = $list_to_hour_un[3];
		    $fthr = $list_to_hour_un[4];
		    $sthr = $list_to_hour_un[5];
		    $suthr = $list_to_hour_un[6];

			$list_from_hour_un = unserialize($listing_row['8']);

		    $mfhr = $list_from_hour_un[0];
		    $tfhr = $list_from_hour_un[1];
		    $wfhr = $list_from_hour_un[2];
		    $thfhr = $list_from_hour_un[3];
		    $ffhr = $list_from_hour_un[4];
		    $sfhr = $list_from_hour_un[5];
		    $sufhr = $list_from_hour_un[6];

			include('standard_sidebar.php');
        	?>
        	<title><?php echo ucfirst($standard_row['1'])." - ".$listing_row['1']; ?></title>
        	<?php
            echo '
	            <div class="bread_crumb">
	            	<label><a href="home.php" class="a_left">Home</a>/<a href="listing.php" class="a_right">Listing</a>/<a href="listing_details.php?id='.$_GET['id'].'" class="a_right">Listing Details</a></label>
	            </div>
	            <div class="listing">
	            	<table>

	            		<tr>
	            			<th>Listing Name</th>
	            			<td>'.$listing_row['1'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Location</th>
	            			<td>'.$listing_row['2'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Email</th>
	            			<td>'.$listing_row['3'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Owner</th>
	            			<td>'.$listing_row['4'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing City</th>
	            			<td>'.$listing_row['7'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Category</th>
	            			<td>'.$listing_row['5'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Tagline</th>
	            			<td>'.$listing_row['6'].'</td>
	            		</tr>
	            		<tr class="hour_operation ldtlbx">

	            			<div class="hours_sub">
	            		';
	            		if ($mfhr == "Open 24 Hour" OR $mthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Monday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($mfhr == "Closed" OR $mthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Monday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Monday</label><label class="value">'.$mfhr.' To '.$mthr.'</label></div></td>';
								}
							
						 
								if ($tfhr == "Open 24 Hour" OR $tthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Tuesday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($tfhr == "Closed" OR $tthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Tuesday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Tuesday</label><label class="value">'.$tfhr.' To '.$tthr.'</label></div></td>';
								}
							
							
								if ($wfhr == "Open 24 Hour" OR $wthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Wednesday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($wfhr == "Closed" OR $wthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Wednesday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Wednesday</label><label class="value">'.$wfhr.' To '.$wthr.'</label></div></td>';
								}
							 
								if ($thfhr == "Open 24 Hour" OR $ththr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Thursday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($thfhr == "Closed" OR $ththr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Thursday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Thursday</label><label class="value">'.$thfhr.' To '.$ththr.'</label></div></td>';
								}
							 
								if ($ffhr == "Open 24 Hour" OR $fthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Friday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($ffhr == "Closed" OR $fthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Friday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Friday</label><label class="value">'.$ffhr.' To '.$fthr.'</label></div></td>';
								}
							 
								if ($sfhr == "Open 24 Hour" OR $sthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Saturday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($sfhr == "Closed" OR $sthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Saturday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Saturday</label><label class="value">'.$sfhr.' To '.$sthr.'</label></div></td>';
								}
							
								if ($sufhr == "Open 24 Hour" OR $suthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Sunday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($sufhr == "Closed" OR $suthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Sunday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Sunday</label><label class="value">'.$sufhr.' To '.$suthr.'</label></div></td>';
								}
	            		echo '
	            		</div>
	            		</tr>
	            		<tr>
	            			<th>Listing Description</th>
	            			<td>'.$listing_row['10'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Contact</th>
	            			<td>'.$listing_row['11'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Telephone</th>
	            			<td>'.$listing_row['12'].'</td>
	            		</tr>
	            		<tr class="listing_gallery">
	            			<th>Listing Gallery</th>
	            			<td><img src="../listed images/'.$listing_row['13'].'"></td>
	            			<td><img src="../listed images/'.$listing_row['14'].'"></td>
	            		</tr>
	            		<tr>
	            			<th>Listing Website</th>
	            			<td>'.$listing_row['17'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Video</th>
	            			<td>'.$listing_row['16'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Date</th>
	            			<td>'.$listing_row['18'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Status</th>
	            			<td>'.$listing_row['29'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Package</th>
	            			<td>'.$listing_row['21'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Payment</th>
	            			<td>'.$listing_row['22'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Bookmarks</th>
	            			<td>'.mysqli_num_rows($fav).'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Views</th>
	            			<td>'.$listing_row['24'].'</td>
	            		</tr>

	            	</table>
	            	<a href="edit_listing.php?id='.$listing_row['0'].'" class="edit_a">Edit Listing</a>
			';
			if ($listing_row['22'] == 'success' AND $listing_row['25'] != '0') 
			{
				echo '<a href="activate_listing.php?id='.$listing_row['0'].'" class="edit_a">Activate Listing</a>
	            	<a href="deactive_listing.php?id='.$listing_row['0'].'" class="edit_a">Deactivate Listing</a>
	            	</div>';
			}
        }
        elseif (mysqli_num_rows($premium)>0)
        { 

        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' AND id = '{$_GET['id']}' ");
        	$listing_row = mysqli_fetch_row($listing);
        	$fav = mysqli_query($conn,"SELECT * FROM favourite WHERE listing_id = '{$_GET['id']}' ");
        	
        	$list_to_hour_un = unserialize($listing_row['9']);

		    $mthr = $list_to_hour_un[0];
		    $tthr = $list_to_hour_un[1];
		    $wthr = $list_to_hour_un[2];
		    $ththr = $list_to_hour_un[3];
		    $fthr = $list_to_hour_un[4];
		    $sthr = $list_to_hour_un[5];
		    $suthr = $list_to_hour_un[6];

			$list_from_hour_un = unserialize($listing_row['8']);

		    $mfhr = $list_from_hour_un[0];
		    $tfhr = $list_from_hour_un[1];
		    $wfhr = $list_from_hour_un[2];
		    $thfhr = $list_from_hour_un[3];
		    $ffhr = $list_from_hour_un[4];
		    $sfhr = $list_from_hour_un[5];
		    $sufhr = $list_from_hour_un[6];


        	include('premium_sidebar.php');
        	?>
        	<title><?php echo ucfirst($premium_row['1'])." - ".$listing_row['1']; ?></title>
        	<?php
            echo '
	            <div class="bread_crumb">
	            	<label><a href="home.php" class="a_left">Home</a>/<a href="listing.php" class="a_right">Listing</a>/<a href="listing_details.php?id='.$_GET['id'].'" class="a_right">Listing Details</a></label>
	            </div>
	            <div class="listing">
	            	<table>

	            		<tr>
	            			<th>Listing Name</th>
	            			<td>'.$listing_row['1'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Location</th>
	            			<td>'.$listing_row['2'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Email</th>
	            			<td>'.$listing_row['3'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Owner</th>
	            			<td>'.$listing_row['4'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing City</th>
	            			<td>'.$listing_row['7'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Category</th>
	            			<td>'.$listing_row['5'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Tagline</th>
	            			<td>'.$listing_row['6'].'</td>
	            		</tr>
	            		<tr class="hour_operation ldtlbx">

	            			<div class="hours_sub">
	            			';
	            		if ($mfhr == "Open 24 Hour" OR $mthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Monday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($mfhr == "Closed" OR $mthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Monday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Monday</label><label class="value">'.$mfhr.' To '.$mthr.'</label></div></td>';
								}
							
						 
								if ($tfhr == "Open 24 Hour" OR $tthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Tuesday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($tfhr == "Closed" OR $tthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Tuesday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Tuesday</label><label class="value">'.$tfhr.' To '.$tthr.'</label></div></td>';
								}
							
							
								if ($wfhr == "Open 24 Hour" OR $wthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Wednesday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($wfhr == "Closed" OR $wthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Wednesday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Wednesday</label><label class="value">'.$wfhr.' To '.$wthr.'</label></div></td>';
								}
							 
								if ($thfhr == "Open 24 Hour" OR $ththr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Thursday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($thfhr == "Closed" OR $ththr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Thursday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Thursday</label><label class="value">'.$thfhr.' To '.$ththr.'</label></div></td>';
								}
							 
								if ($ffhr == "Open 24 Hour" OR $fthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Friday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($ffhr == "Closed" OR $fthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Friday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Friday</label><label class="value">'.$ffhr.' To '.$fthr.'</label></div></td>';
								}
							 
								if ($sfhr == "Open 24 Hour" OR $sthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Saturday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($sfhr == "Closed" OR $sthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Saturday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Saturday</label><label class="value">'.$sfhr.' To '.$sthr.'</label></div></td>';
								}
							
								if ($sufhr == "Open 24 Hour" OR $suthr == "Open 24 Hour") 
								{
									echo '<td><div class="hrow"><label class="name">Sunday</label><label class="value">Open 24 Hours</label></div></td>';
								}
								elseif ($sufhr == "Closed" OR $suthr == "Closed") 
								{
									echo '<td><div class="hrow"><label class="name">Sunday</label><label class="value">Closed</label></div></td>';
								}
								else
								{
									echo '<td><div class="hrow"><label class="name">Sunday</label><label class="value">'.$sufhr.' To '.$suthr.'</label></div></td>';
								}
	            		echo '
	            		</div>
	            		</tr>
	            		<tr>
	            			<th>Listing Description</th>
	            			<td>'.$listing_row['10'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Contact</th>
	            			<td>'.$listing_row['11'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Telephone</th>
	            			<td>'.$listing_row['12'].'</td>
	            		</tr>
	            		<tr class="listing_gallery">
	            			<th>Listing Gallery</th>
	            			<td><img src="../listed images/'.$listing_row['13'].'"></td>
	            			<td><img src="../listed images/'.$listing_row['14'].'"></td>
	            			<td><img src="../listed images/'.$listing_row['15'].'"></td>
	            		</tr>
	            		<tr>
	            			<th>Listing Video</th>
	            			<td>'.$listing_row['16'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Website</th>
	            			<td>'.$listing_row['17'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Date</th>
	            			<td>'.$listing_row['18'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Status</th>
	            			<td>'.$listing_row['29'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Facebook</th>
	            			<td>'.$listing_row['19'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Instagram</th>
	            			<td>'.$listing_row['20'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Package</th>
	            			<td>'.$listing_row['21'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Payment</th>
	            			<td>'.$listing_row['22'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Bookmarks</th>
	            			<td>'.mysqli_num_rows($fav).'</td>
	            		</tr>
	            		<tr>
	            			<th>Listing Views</th>
	            			<td>'.$listing_row['24'].'</td>
	            		</tr>

	            	</table>
	            	<a href="edit_listing.php?id='.$listing_row['0'].'" class="edit_a">Edit Listing</a>
			';
			if ($listing_row['22'] == 'success' AND $listing_row['25'] != '0') 
			{
				echo '<a href="activate_listing.php?id='.$listing_row['0'].'" class="edit_a">Activate Listing</a>
	            	<a href="deactive_listing.php?id='.$listing_row['0'].'" class="edit_a">Deactivate Listing</a>
	            	</div>';
			}
        }
        
?>