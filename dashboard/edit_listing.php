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
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$free_row['2']}'");
        	$listing_row = mysqli_fetch_row($listing);
        	$listing_id = $listing_row['0'];
        	// Listing Hour To Operation Unserialize
        	$list_to_hour_un = unserialize($listing_row['9']);

        	$mthr = $list_to_hour_un[0];
        	$tthr = $list_to_hour_un[1];
        	$wthr = $list_to_hour_un[2];
        	$ththr = $list_to_hour_un[3];
        	$fthr = $list_to_hour_un[4];
        	$sthr = $list_to_hour_un[5];
        	$suthr = $list_to_hour_un[6];

        	// Listing Hour From Operation Unserialize
        	$list_from_hour_un = unserialize($listing_row['8']);

        	$mfhr = $list_from_hour_un[0];
        	$tfhr = $list_from_hour_un[1];
        	$wfhr = $list_from_hour_un[2];
        	$thfhr = $list_from_hour_un[3];
        	$ffhr = $list_from_hour_un[4];
        	$sfhr = $list_from_hour_un[5];
        	$sufhr = $list_from_hour_un[6];

        	include('free_sidebar.php');
        	?>
        	<title><?php echo ucfirst($free_row['1'])." - Edit ".$listing_row['1']; ?></title>
        	<?php
        	echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='listing.php' class='a_right'>Listing</a>/<a href='edit_listing.php' class='a_right'>Edit Listing</a></label>
	            </div>
	            <div class='update_profile edit_listing'>
					<form method='POST' enctype='multipart/form-data'>
						<label>Listing Name</label>
						<input type='text' value='{$listing_row['1']}' name='listing_name'>
						<label>Listing Location</label>
						<textarea row='4' cols='5' name='listing_location' style='margin-bottom: 2%;'>".$listing_row['2']."</textarea>
						<label>Listing Owner</label>
						<input type='text' value='{$listing_row['4']}' name='listing_owner'>
						<label>Listing City</label>
						<input type='text' value='{$listing_row['7']}' name='listing_city'>
						<label>Listing Category</label>
						<input type='text' value='{$listing_row['5']}' name='listing_category'>
						<label>Listing Hours Operation</label>
						<div class='form_op'>
							<label class='day'>Monday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$mfhr}' selected>".$mfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$mthr}' selected>".$mthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Tuesday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$tfhr}' selected>".$tfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$tthr}' selected>".$tthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Wednesday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$wfhr}' selected>".$wfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$wthr}' selected>".$wthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Thursday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$thfhr}' selected>".$thfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$ththr}' selected>".$ththr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Friday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$ffhr}' selected>".$ffhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$fthr}' selected>".$fthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Saturday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$sfhr}' selected>".$sfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$sthr}' selected>".$sthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Sunday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$sufhr}' selected>".$sufhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$suthr}' selected>".$suthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
						</div>
						<label>Listing Description</label>
						<textarea row='6' cols='8' name='listing_description' style='height: 30%;margin-bottom: 3%;'>".$listing_row['10']."</textarea>
						<label>Listing Contact</label>
						<input type='text' value='{$listing_row['11']}' name='listing_contact'>
						<label>Listing Telephone</label>
						<input type='text' value='{$listing_row['12']}' name='listing_telephone'>
						<label>Listing Date</label>
						<input type='text' value='{$listing_row['18']}' name='listing_date' readonly>
						<div class='term_condition'>
						<label>Terms & Condition</label>
						<label>1.Once you edit your listing it will consider pending listing and will allow it soon.</label>
						<input type='checkbox' required><label>I agree all the terms and condition.</label>
						</div>
						<input type='submit' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit'])) 
            {
	            $listing_name = $_POST['listing_name'];
	            $listing_location = $_POST['listing_location'];
	            $listing_owner = $_POST['listing_owner'];
	            $listing_city = $_POST['listing_city'];
	            $listing_category = $_POST['listing_category'];
	            $listing_tagline = $_POST['listing_tagline'];
	            $listing_description = $_POST['listing_description'];
	            $listing_contact = $_POST['listing_contact'];
	            $listing_telephone = $_POST['listing_telephone'];
	            $listing_date = $_POST['listing_date'];


				// listing from hours update
				$listing_from_hour = $_POST['listing_from_hour'];
				$listing_from_hour_arr = array();

				foreach ($listing_from_hour as $a)
				{
			    	$listing_from_hour_arr[] = $a;
				}
				$listing_from_hour_serialize = serialize($listing_from_hour_arr);

				// listing to hours update
				$listing_to_hour = $_POST['listing_to_hour'];
				$listing_to_hour_arr = array();

				foreach ($listing_to_hour as $b)
				{
			    	$listing_to_hour_arr[] = $b;
				}
				$listing_to_hour_serialize = serialize($listing_to_hour_arr);

			
				$update_query = mysqli_query($conn,"UPDATE listing SET listing_name='$listing_name',listing_location='$listing_location',listing_member_name='$listing_owner',listing_category='$listing_category',listing_tagline='$listing_tagline',listing_city='$listing_city',listing_hour_open='$listing_from_hour_serialize',listing_hour_close='$listing_to_hour_serialize',listing_description='$listing_description',listing_contact='$listing_contact',listing_telephone='$listing_telephone',listing_date='$listing_date',status='0' WHERE id='$listing_id' ");

					if ($update_query == TRUE) 
					{
						echo"<script>alert('Your Listing Is Updated')</script>";
					}
					else
					{
						echo"<script>alert('Your Listing Is Not Updated')</script>";
					}
				}
				
			
		}					
        elseif (mysqli_num_rows($standard)>0)
        {
        	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}'");
        	$listing_row = mysqli_fetch_row($listing);
        	$listing_id = $listing_row['0'];

        	// Listing Hour To Operation Unserialize
        	$list_to_hour_un = unserialize($listing_row['9']);

        	$mthr = $list_to_hour_un[0];
        	$tthr = $list_to_hour_un[1];
        	$wthr = $list_to_hour_un[2];
        	$ththr = $list_to_hour_un[3];
        	$fthr = $list_to_hour_un[4];
        	$sthr = $list_to_hour_un[5];
        	$suthr = $list_to_hour_un[6];

        	// Listing Hour From Operation Unserialize
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
        	<title><?php echo ucfirst($standard_row['1'])." - Edit ".$listing_row['1']; ?></title>
        	<?php
        	echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='listing.php' class='a_right'>Listing</a>/<a href='edit_listing.php' class='a_right'>Edit Listing</a></label>
	            </div>
	            <div class='update_profile edit_listing'>
					<form method='POST' enctype='multipart/form-data'>
						<label>Listing Name</label>
						<input type='text' value='{$listing_row['1']}' name='listing_name'>
						<label>Listing Location</label>
						<textarea row='4' cols='5' name='listing_location' style='margin-bottom: 2%;'>".$listing_row['2']."</textarea>
						<label>Listing Owner</label>
						<input type='text' value='{$listing_row['4']}' name='listing_owner'>
						<label>Listing City</label>
						<input type='text' value='{$listing_row['7']}' name='listing_city'>
						<label>Listing Category</label>
						<input type='text' value='{$listing_row['5']}' name='listing_category'>
						<label>Listing Hours Operation</label>
						<div class='form_op'>
							<label class='day'>Monday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$mfhr}' selected>".$mfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$mthr}' selected>".$mthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Tuesday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$tfhr}' selected>".$tfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$tthr}' selected>".$tthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Wednesday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$wfhr}' selected>".$wfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$wthr}' selected>".$wthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Thursday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$thfhr}' selected>".$thfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$ththr}' selected>".$ththr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Friday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$ffhr}' selected>".$ffhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$fthr}' selected>".$fthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Saturday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$sfhr}' selected>".$sfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$sthr}' selected>".$sthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Sunday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$sufhr}' selected>".$sufhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$suthr}' selected>".$suthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
						</div>
						<label>Listing Description</label>
						<textarea row='4' cols='8' name='listing_description' style='height: 30%;margin-bottom: 3%;'>".$listing_row['10']."</textarea>
						<label>Listing Contact</label>
						<input type='text' value='{$listing_row['11']}' name='listing_contact'>
						<label>Listing Telephone</label>
						<input type='text' value='{$listing_row['12']}' name='listing_telephone'>
						<label>Listing Video</label>
						<input type='text' value='{$listing_row['16']}' name='listing_video'>
						<label>Listing Website</label>
						<input type='text' value='{$listing_row['17']}' name='listing_website'>
						<label>Listing Date</label>
						<input type='text' value='{$listing_row['18']}' name='listing_date' readonly>
						<div class='term_condition'>
						<label>Terms & Condition</label>
						<label>1.Once you edit your listing it will consider pending listing and will allow it soon.</label>
						<input type='checkbox' required><label>I agree all the terms and condition.</label>
						</div>
						<input type='submit' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit'])) 
            {
	            $listing_name = $_POST['listing_name'];
	            $listing_location = $_POST['listing_location'];
	            $listing_email = $_POST['listing_email'];
	            $listing_owner = $_POST['listing_owner'];
	            $listing_city = $_POST['listing_city'];
	            $listing_category = $_POST['listing_category'];
	            $listing_tagline = $_POST['listing_tagline'];
	            $listing_description = $_POST['listing_description'];
	            $listing_contact = $_POST['listing_contact'];
	            $listing_telephone = $_POST['listing_telephone'];
	            $listing_video = $_POST['listing_video'];
	            $listing_website = $_POST['listing_website'];
	            $listing_date = $_POST['listing_date'];


				// listing from hours update
				$listing_from_hour = $_POST['listing_from_hour'];
				$listing_from_hour_arr = array();

				foreach ($listing_from_hour as $a)
				{
			    	$listing_from_hour_arr[] = $a;
				}
				$listing_from_hour_serialize = serialize($listing_from_hour_arr);

				// listing to hours update
				$listing_to_hour = $_POST['listing_to_hour'];
				$listing_to_hour_arr = array();

				foreach ($listing_to_hour as $b)
				{
			    	$listing_to_hour_arr[] = $b;
				}
				$listing_to_hour_serialize = serialize($listing_to_hour_arr);

					
			
				
				$update_query = mysqli_query($conn,"UPDATE listing SET listing_name='$listing_name',listing_location='$listing_location',listing_member_name='$listing_owner',listing_category='$listing_category',listing_tagline='$listing_tagline',listing_city='$listing_city',listing_hour_open='$listing_from_hour_serialize',listing_hour_close='$listing_to_hour_serialize',listing_description='$listing_description',listing_contact='$listing_contact',listing_telephone='$listing_telephone',listing_date='$listing_date',listing_video_url='$listing_video',listing_website_url='$listing_website',status='0' WHERE id='$listing_id' ");

				if ($update_query == TRUE) 
				{
					echo"<script>alert('Your Listing Is Updated')</script>";
				}
				else
				{
					echo"<script>alert('Your Listing Is Not Updated')</script>";
				}
			}
        }
        elseif (mysqli_num_rows($premium)>0)
        {
           	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}'");
        	$listing_row = mysqli_fetch_row($listing);
        	$listing_id = $listing_row['0'];

        	// Listing Hour To Operation Unserialize
        	$list_to_hour_un = unserialize($listing_row['9']);

        	$mthr = $list_to_hour_un[0];
        	$tthr = $list_to_hour_un[1];
        	$wthr = $list_to_hour_un[2];
        	$ththr = $list_to_hour_un[3];
        	$fthr = $list_to_hour_un[4];
        	$sthr = $list_to_hour_un[5];
        	$suthr = $list_to_hour_un[6];

        	// Listing Hour From Operation Unserialize
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
        	<title><?php echo ucfirst($premium_row['1'])." - Edit ".$listing_row['1']; ?></title>
        	<?php
        	echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='listing.php' class='a_right'>Listing</a>/<a href='edit_listing.php' class='a_right'>Edit Listing</a></label>
	            </div>
	            <div class='update_profile edit_listing'>
					<form method='POST' enctype='multipart/form-data'>
						<label>Listing Name</label>
						<input type='text' value='{$listing_row['1']}' name='listing_name'>
						<label>Listing Location</label>
						<textarea row='4' cols='5' name='listing_location' style='margin-bottom: 2%;'>".$listing_row['2']."</textarea>
						<label>Listing Owner</label>
						<input type='text' value='{$listing_row['4']}' name='listing_owner'>
						<label>Listing City</label>
						<input type='text' value='{$listing_row['7']}' name='listing_city'>
						<label>Listing Category</label>
						<input type='text' value='{$listing_row['5']}' name='listing_category'>
						<label>Listing Hours Operation</label>
						<div class='form_op'>
							<label class='day'>Monday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$mfhr}' selected>".$mfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$mthr}' selected>".$mthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Tuesday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$tfhr}' selected>".$tfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$tthr}' selected>".$tthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Wednesday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$wfhr}' selected>".$wfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$wthr}' selected>".$wthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Thursday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$thfhr}' selected>".$thfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$ththr}' selected>".$ththr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Friday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$ffhr}' selected>".$ffhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$fthr}' selected>".$fthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Saturday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$sfhr}' selected>".$sfhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$sthr}' selected>".$sthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='day'>Sunday</label>
							<label class='open'>Open</label>
							<select class='form_ope open_select' name='listing_from_hour[]'>
									<option value='{$sufhr}' selected>".$sufhr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
							<label class='close'>Close</label>
							<select class='form_ope close_select' name='listing_to_hour[]'>
									<option value='{$suthr}' selected>".$suthr."</option>
									<option value='Closed'>Closed</option>
									<option value='Open 24 Hour'>Open 24 Hour</option>
									<option value='12:00 am'>12:00 am</option>
									<option value='01:00 am'>01:00 am</option>
									<option value='02:00 am'>02:00 am</option>
									<option value='03:00 am'>03:00 am</option>
									<option value='04:00 am'>04:00 am</option>
									<option value='05:00 am'>05:00 am</option>
									<option value='06:00 am'>06:00 am</option>
									<option value='07:00 am'>07:00 am</option>
									<option value='08:00 am'>08:00 am</option>
									<option value='09:00 am'>09:00 am</option>
									<option value='10:00 am'>10:00 am</option>
									<option value='11:00 am'>11:00 am</option>
									<option value='12:00 pm'>12:00 pm</option>
									<option value='01:00 pm'>01:00 pm</option>
									<option value='02:00 pm'>02:00 pm</option>
									<option value='03:00 pm'>03:00 pm</option>
									<option value='04:00 pm'>04:00 pm</option>
									<option value='05:00 pm'>05:00 pm</option>
									<option value='06:00 pm'>06:00 pm</option>
									<option value='07:00 pm'>07:00 pm</option>
									<option value='08:00 pm'>08:00 pm</option>
									<option value='09:00 pm'>09:00 pm</option>
									<option value='10:00 pm'>10:00 pm</option>
									<option value='11:00 pm'>11:00 pm</option>
							</select>
						</div>
						<label>Listing Description</label>
						<textarea row='4' cols='5' name='listing_description' style='height: 30%;margin-bottom: 3%;'>".$listing_row['10']."</textarea>
						<label>Listing Contact</label>
						<input type='text' value='{$listing_row['11']}' name='listing_contact'>
						<label>Listing Telephone</label>
						<input type='text' value='{$listing_row['12']}' name='listing_telephone'>
						<label>Listing Video</label>
						<input type='text' value='{$listing_row['16']}' name='listing_video'>
						<label>Listing Facebook</label>
						<input type='text' value='{$listing_row['19']}' name='listing_facebook'>
						<label>Listing Instagram</label>
						<input type='text' value='{$listing_row['20']}' name='listing_instagram'>
						<label>Listing Website</label>
						<input type='text' value='{$listing_row['17']}' name='listing_website'>
						<label>Listing Date</label>
						<input type='text' value='{$listing_row['18']}' name='listing_date' readonly>
						<div class='term_condition'>
						<label>Terms & Condition</label>
						<label>1.Once you edit your listing it will consider pending listing and will allow it soon.</label>
						<input type='checkbox' required><label>I agree all the terms and condition.</label>
						</div>
						<input type='submit' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit'])) 
            {
	            $listing_name = $_POST['listing_name'];
	            $listing_location = $_POST['listing_location'];
	            $listing_city = $_POST['listing_city'];
	            $listing_owner = $_POST['listing_owner'];
	            $listing_category = $_POST['listing_category'];
	            $listing_tagline = $_POST['listing_tagline'];
	            $listing_description = $_POST['listing_description'];
	            $listing_contact = $_POST['listing_contact'];
	            $listing_telephone = $_POST['listing_telephone'];
	            $listing_video = $_POST['listing_video'];
	            $listing_website = $_POST['listing_website'];
	            $listing_facebook = $_POST['listing_facebook'];
	            $listing_instagram = $_POST['listing_instagram'];
	            $listing_date = $_POST['listing_date'];


				// listing from hours update
				$listing_from_hour = $_POST['listing_from_hour'];
				$listing_from_hour_arr = array();

				foreach ($listing_from_hour as $a)
				{
			    	$listing_from_hour_arr[] = $a;
				}
				$listing_from_hour_serialize = serialize($listing_from_hour_arr);

				// listing to hours update
				$listing_to_hour = $_POST['listing_to_hour'];
				$listing_to_hour_arr = array();

				foreach ($listing_to_hour as $b)
				{
			    	$listing_to_hour_arr[] = $b;
				}
				$listing_to_hour_serialize = serialize($listing_to_hour_arr);

					
				
				$update_query = mysqli_query($conn,"UPDATE listing SET listing_name='$listing_name',listing_location='$listing_location',listing_member_name='$listing_owner',listing_category='$listing_category',listing_tagline='$listing_tagline',listing_city='$listing_city',listing_hour_open='$listing_from_hour_serialize',listing_hour_close='$listing_to_hour_serialize',listing_description='$listing_description',listing_contact='$listing_contact',listing_telephone='$listing_telephone',listing_date='$listing_date',listing_video_url='$listing_video',listing_website_url='$listing_website',listing_facebook_url='$listing_facebook',listing_instagram_url='$listing_instagram',status='0' WHERE id='$listing_id' ");
				
				if ($update_query == TRUE) 
				{
					echo"<script>alert('Your Listing Is Updated')</script>";
				}
				else
				{
					echo"<script>alert('Your Listing Is Not Updated')</script>";
				}
			}
        }
   
?>