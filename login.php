<!-- Header Include -->
<?php include('header.php'); ?>
<style type="text/css">
  .login_a
      {
        color: white !important;
      }
</style>
<!-- Login code -->
<?php  

	if (isset($_POST['submit'])) 
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
 
 		$query = mysqli_query($conn,"SELECT * FROM user_type WHERE email = '$email' and password = '$password' and status != '0'");
 
   if($query) 
   {

		if (mysqli_num_rows($query)>0) 
		{	
  		  	$row = mysqli_fetch_row($query);
        	$_SESSION['id'] = $row[0];
  			header('location:dashboard/home.php');
		}
		else
		{
  			echo"<script>alert('Email or password not matched')</script>";
		}
	}
}

?>
<title>Getlisting - Login</title>
<form class="authen_form authen_form_login" method="POST">
	<h2>Log Into Get Listing</h2>
	<input type="email" placeholder="Email" name="email">
	<input type="password" placeholder="Password" name="password">
	<input type="submit" value="Login" name="submit">
	<a href="signup.php" class="aa_link">Didn't Join</a><span>|</span><a href="forget_password.php" class="ab_link aa_link">Forget Password</a><span>|</span><a href="verification.php" class="ab_link">Not Verified</a>
</form>

<?php include('footer.php'); ?>