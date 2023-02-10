<?php include('../db.php'); session_start(); ?>

<?php  

	$delete = mysqli_query($conn,"DELETE FROM blog WHERE id = '{$_GET['id']}' ");
	header('location:allow_blog.php');

?>