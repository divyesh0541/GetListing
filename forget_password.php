<?php include('header.php'); ?>

<?php  

	 if (isset($_POST['submit']))
  	{
	    $contact = $_POST['contact'];
      $random_password = mt_rand(100000, 999999);


	    $query = mysqli_query($conn,"UPDATE user_type SET password = '$random_password' WHERE contact = '$contact' ");
    
    
      if ($query == TRUE)
      {
          
        		   /* SMS sending code */
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://2factor.in/API/V1/ee46edc7-946b-11eb-80ea-0200cd936042/SMS/".$contact."/".$random_password."",
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
            header('location:login.php');
        }
            else
            {
                echo "<script>alert('Some error please try again')</script>";
            }
    }

?>

<!-- HTML FORM -->
<title>Getlisting - Forget Password</title>
<form class="authen_form authen_form_login" method="POST">
	<h2>Change You Password</h2>
	<input type="text" placeholder="Phone Number" name="contact">
	<input type="submit" value="Change Password" name="submit">
	<a href="signup.php">Didn't Join</a>
</form>

<?php include('footer.php'); ?>