<?php  
	
	include('db.php');
	session_start();
	if (!isset($_SESSION['id'])) 
	{
		header('location:login.php');
	}
	else
	{
		$uid = $_SESSION['id'];
		$lid = $_GET['listing_id'];
	

		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE id='{$lid}' ");
		$listing_fetch_row = mysqli_fetch_row($listing_fetch);

		$user_fetch = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' ");
		$user_fetch_row = mysqli_fetch_row($user_fetch);
		

		$select_favourite = mysqli_query($conn,"SELECT * FROM favourite WHERE listing_id = '{$lid}' && member_email = '{$listing_fetch_row['3']}' && user_email = '{$user_fetch_row['2']}' ");

		if (mysqli_num_rows($select_favourite)>0) 
		{
			header('location:listing_page.php?lid='.$lid.'');
		}
		else
		{
			$insert = mysqli_query($conn,"INSERT INTO favourite (listing_id,listing_name,member_email,favourite,user_email,user_name) VALUES ('$lid','{$listing_fetch_row['1']}','{$listing_fetch_row['3']}','1','{$user_fetch_row['2']}','{$user_fetch_row['1']}')");
			
			$select_inc_fav = mysqli_query($conn,"SELECT * FROM favourite WHERE listing_id = '{$lid}' ");
			$fav_count = mysqli_num_rows($select_inc_fav);
			$fav_count_update = mysqli_query($conn,"UPDATE listing SET listing_favourite = '$fav_count' WHERE id = '$lid' ");
			$select_inc_fav_row = mysqli_fetch_row($select_inc_fav);
			header('location:listing_page.php?lid='.$lid.'');

		}
	}

?>