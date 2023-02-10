<!-- Header Include -->
<?php include('header.php'); ?>
<?php  

	include('db.php');
	if (!isset($_SESSION['id'])) 
	{
		header('location:login.php');
	}

?>
<?php  
	$user_select = mysqli_query($conn,"SELECT * FROM user_type WHERE id = '{$_SESSION['id']}' ");
	$user_select_fetch = mysqli_fetch_row($user_select);
	global $conn;
	$listing_id = $_GET['lid'];

	$listing = mysqli_query($conn,"SELECT * FROM listing WHERE id = '$listing_id' ");
	$listing_fetch = mysqli_fetch_row($listing);

	if (isset($_POST['submit'])) 
	{

		error_reporting(0);

		$listing_id = $listing_fetch['0'];	
		$listing_name = $listing_fetch['1'];
		$member_email = $listing_fetch['3'];
		$name = $user_select_fetch['1'];
		$email = $user_select_fetch['2'];
		$message = $_POST['message'];
		$rating = $_POST['rating'];
		$review_date = date("Y/m/d");

		$review = mysqli_query($conn,"SELECT * FROM review WHERE listing_id = '$listing_id' && member_email = '$member_email' && user_email = '$email' ");
		$review_row = mysqli_fetch_row($review);

		if (mysqli_num_rows($review)>0)
		{
			echo"<script>alert('You Can Only submit one review')</script>";
		}
		else
		{
			$insert = mysqli_query($conn,"INSERT INTO review (listing_id,member_email,user_name,user_email,user_message,user_rating,review_date,listing_name) VALUES ('$listing_id','$member_email','$name','$email','$message','$rating','$review_date','$listing_name')");
			
			$select_rating_pre = mysqli_query($conn,"SELECT AVG(user_rating) FROM review WHERE listing_id = '$listing_id'");
			$select_rating_pre_row = mysqli_fetch_row($select_rating_pre);
			$avg_rating = $select_rating_pre_row['0'];
			

			$update_avg = mysqli_query($conn,"UPDATE listing SET avg_rating = '$avg_rating' WHERE id = '$listing_id'");
			
			if ($insert == TRUE)
			{
				echo"<script>alert('Your Review Is Submitted')</script>";
			}
		}
		

	}

?>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<title><?php echo $listing_fetch['1']; ?> - Write Review</title>
<form class="authen_form write_rev" method="POST">
	<h2>Write Review</h2>
	<label style="margin-bottom: 5%;height: 50px;line-height: 2.70rem;width: 100%;text-align: left;background: rgba(0, 0, 0, 0.075);border-radius: 5px;padding-left: 2%;font-weight: 500;"><?php echo $user_select_fetch['1'];?></label>
	
	<label style="margin-bottom: 5%;height: 50px;line-height: 2.70rem;width: 100%;text-align: left;background: rgba(0, 0, 0, 0.075);border-radius: 5px;padding-left: 2%;font-weight: 500;"><?php echo $user_select_fetch['2'];?></label>

	<div class="rate_stars">
		<input class="star star-5" id="star-5" type="radio" name="rating" value="5" />
  		<label class="star star-5" for="star-5"></label>
  		<input class="star star-4" id="star-4" type="radio" name="rating" value="4" />
  		<label class="star star-4" for="star-4"></label>
  		<input class="star star-3" id="star-3" type="radio" name="rating" value="3" />
  		<label class="star star-3" for="star-3"></label>
  		<input class="star star-2" id="star-2" type="radio" name="rating" value="2" />
  		<label class="star star-2" for="star-2"></label>
  		<input class="star star-1" id="star-1" type="radio" name="rating" value="1" />
  		<label class="star star-1" for="star-1"></label>
	</div>
	<textarea cols="5" rows="5" name="message" placeholder="Message"></textarea><br>
	<input type="submit" value="Give Review" name="submit">
</form>


<?php include('footer.php'); ?>