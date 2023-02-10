<?php  

	include("../db.php");
	session_start();

	$id = $_GET['id'];
	$query = mysqli_query($conn,"UPDATE listing SET active_deactive = 'deactive' WHERE id = '$id' ");

	if ($query == TRUE)
	{	
		header('location:listing_details.php?id='.$id.'');
	}
?>