<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title>Getlisting - </title>
<?php include('header.php'); ?>

<?php include('prevent_admin.php'); ?>

<?php  

	$admin = mysqli_query($conn,"SELECT * FROM admin WHERE id='{$_SESSION['admin_id']}'");
	$admin_row = mysqli_fetch_row($admin);

	$blog_details = mysqli_query($conn,"SELECT * FROM blog WHERE id = '{$_GET['id']}'");
	$blog_details_row = mysqli_fetch_row($blog_details);

	if (mysqli_num_rows($admin)>0) 
        {
            echo '

            	<div class="sidebar">
	            	<label><a href="home.php">Home</a></label>
	            	<label><a href="profile.php">Profile</a></label>
	            	<label><a href="feedback.php">Feedbacks</a></label>
	            	<label><a href="allow_listing.php">Allow Listing</a></label>
	            	<label><a href="allow_blog.php">Allow Blog</a></label>
	            	<label><a href="change_password.php">Change Password</a></label>
	            	<label><a href="logout.php">Logout</a></label>
	            </div>
	            <div class="bread_crumb">
	            	<label><a href="home.php" class="a_left">Home</a>/<a href="allow_blog.php" class="a_right">Allow Blog</a>/<a href="allow_blog_details.php?id='.$_GET['id'].'" class="a_right">Blog Details</a></label>
	            </div>
	            <div class="allow_listing">
	            	<table>

	            		<tr>
	            			<th>Blog Title</th>
	            			<td>'.$blog_details_row['3'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Blog Description</th>
	            			<td>'.$blog_details_row['4'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Blog Date</th>
	            			<td>'.$blog_details_row['5'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Blog Member Email</th>
	            			<td>'.$blog_details_row['2'].'</td>
	            		</tr>
	            		<tr>
	            			<th>Blog Gallery</th>
	            			<td><img src="../blog images/'.$blog_details_row['6'].'" class="blog_imgs"></td>
	            		</tr>

	            	</table>
	            	<a href="allowed_blog.php?id='. $blog_details_row['0'] .'" class="allow">Allow Blog</a>
	            	<a href="reject_blog.php?id='. $blog_details_row['0'] .'" class="reject">Reject Blog</a>
	            </div>
			';

        }

?>
<title>Getlisting - <?php echo $blog_details_row['3']; ?></title>