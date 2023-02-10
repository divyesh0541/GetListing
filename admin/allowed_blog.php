<?php include('../db.php'); session_start(); ?>

<?php  

	$update = mysqli_query($conn,"UPDATE blog SET status = '1' WHERE id = '{$_GET['id']}' ");
	header('location:allow_blog.php');
?>