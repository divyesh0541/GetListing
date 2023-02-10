<?php include('header.php'); ?>
<?php  

	$select_blog = mysqli_query($conn,"SELECT * FROM blog WHERE id = '{$_GET['bid']}' ");
	$select_blog_row = mysqli_fetch_row($select_blog);

?>
<title><?php echo $select_blog_row['3']; ?> - Blog</title>
<label class="blog_details_title">Blog Details</label>
<div class="blog_details">
	<label><?php echo $select_blog_row['3']; ?></label>
	<hr>
	<div class="blog_details_box2">
		<label><?php echo $select_blog_row['4']; ?></label>	
		<?php echo "<img src='blog images/".$select_blog_row['6']."'>"; ?>
	</div>
	<hr>
	<label><?php echo $select_blog_row['5']; ?></label>
</div>
<?php include('footer.php'); ?>