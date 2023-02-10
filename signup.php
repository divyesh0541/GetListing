<!-- Header Include -->
<?php include('header.php'); ?>
<style type="text/css">
  .signup_a
      {
        color: white !important;
      }
</style>
<!-- Sign code -->
<?php

 	if (isset($_POST['submit']))
 	{
 		$name = $_POST['name'];
 		$email = $_POST['email'];
		$contact = $_POST['contact'];
    $password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		$verify_code = mt_rand(100000, 999999);

    	if ($password == $confirm_password) 
    	{
      		
    	   
          $prevent_phone = mysqli_query($conn,"SELECT contact FROM user_type WHERE contact = '$contact' ");
          if (mysqli_num_rows($prevent_phone)>0) 
          {
            echo "<script>alert('Contact number already exist')</script>";
          }
          else
          {
            $query = mysqli_query($conn,"INSERT INTO user_type (name,email,contact,password,verify_code) VALUES ('$name','$email','$contact','$password','$verify_code')");
            if ($query == TRUE)
            {
                
                /* SMS sending code */
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://2factor.in/API/V1/ee46edc7-946b-11eb-80ea-0200cd936042/SMS/".$contact."/".$verify_code."",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                  CURLOPT_POSTFIELDS => "",
                  CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);
                header('location:verification.php');
            }
            else
            {
                echo "<script>alert('Can not register')</script>";
            }
          }
            
      }
    	else
    	{
      		echo "<script>alert('Password is not matched')</script>";
    	}
		
		
		
	}
 ?>
 <title>Getlisting - Signup</title>
<form class="authen_form authen_form_login" method="POST">
	<h2>Join The Get Listing</h2>
	<input type="text" placeholder="Name" name="name" required>
	<input type="email" placeholder="Email" name="email" required>
	<input type="text" placeholder="Phone Number" name="contact" required>
	<input type="password" placeholder="Password" name="password" required>
	<input type="password" placeholder="Confirm Password" name="confirm_password" required>
	<input type="submit" value="Join" name="submit">
	<a href="login.php">Already Join</a>
</form>

<?php include('footer.php'); ?>