<?php include('header.php'); ?>
<?php include('prevent_user.php'); ?>

<?php  

	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE id = '{$_GET['listing_id']}' ");
	$listing_row = mysqli_fetch_row($listing);

	$user = mysqli_query($conn,"SELECT * FROM user_type WHERE id = '{$_SESSION['id']}' ");
	$user_row = mysqli_fetch_row($user);

	if (isset($_POST['submit'])) 
	{	
		$listing_id = $listing_row['0'];
		$member_email = $listing_row['3'];
		$listing_name = $listing_row['1'];
		$name = $user_row['1'];
		$email = $user_row['2'];
		$contact = $user_row['3'];
		$appointment_date = date("Y/m/d");
		$appointment_reason = $_POST['appointment_reason'];

		$insert = mysqli_query($conn,"INSERT INTO appointment (listing_id,member_email,user_name,user_email,user_contact,appointment_reason,listing_name,appointment_date) VALUES ('$listing_id','$member_email','$name','$email','$contact','$appointment_reason','$listing_name','$appointment_date')");
		
		if ($insert == TRUE) 
		{
			echo"<script>alert('Your Appointment is submitted to listing owner')</script>";
		}
		else
		{
			echo"<script>alert('Something is incorrect please try again')</script>";
		}
	}

?>
<title><?php echo $listing_row['1']; ?> - Get Appointment</title>
<div class='change_password get_appointment'>
	<h2>Get Appointment</h2>
	<form class='authen_form blog_upload' method='POST' enctype='multipart/form-data'>
		<label>Name</label>
		<label style="margin-bottom: 5%;height: 50px;line-height: 2.70rem;width: 100%;background: rgba(0, 0, 0, 0.075);border-radius: 5px;padding-left: 3%;"><?php echo $user_row['1']; ?></label>
		<label>Email</label>
		<label style="margin-bottom: 5%;height: 50px;line-height: 2.70rem;width: 100%;background: rgba(0, 0, 0, 0.075);border-radius: 5px;padding-left: 3%;"><?php echo $user_row['2']; ?></label>
		<label>Contact</label>
		<label style="margin-bottom: 5%;height: 50px;line-height: 2.70rem;width: 100%;background: rgba(0, 0, 0, 0.075);border-radius: 5px;padding-left: 3%;"><?php echo $user_row['3']; ?></label>
		<label>Appointment Reason</label>
		<textarea name='appointment_reason' rows='5' cols='6' placeholder='Appointment Reason'></textarea><br>
		<input type='submit' value='Get Appointment' name='submit'>
	</form>
</div>