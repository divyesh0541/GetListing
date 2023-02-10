<!-- Header Include -->
<?php include('header.php'); ?>

<!-- Verification code -->
<?php  
  
  
	if (isset($_POST['submit'])) 
    {
         $email = mysqli_query($conn,"SELECT email FROM user_type WHERE id = '{$_SESSION['id']}' ");
         $email_row = mysqli_fetch_row($email);
         $actual_email = $email_row['0'];
         $verify_code = $_POST['verify_code'];

         if ($verify_code !=  " ")
         {
           $query =  "SELECT id,type FROM listing WHERE listing_code='$verify_code' AND listing_email = '$actual_email' ";
           $result = mysqli_query($conn,$query);

           if (mysqli_num_rows($result)>0)
            {
                $row = mysqli_fetch_row($result);
                $listing_id = $row[0];

                $update_status = mysqli_query($conn,"UPDATE listing SET active_deactive = 'active' where id='$listing_id' ");
                if ($update_status == TRUE) 
                {
                  $row_type = $row[1];

                  if ($row_type == 'standard') 
                  {
                    header('location:payment_standard.php');
                  }
                  elseif ($row_type == 'premium') 
                  {
                    header('location:payment_premium.php');
                  }
                  elseif ($row_type == 'free') 
                  {
                    header('location:dashboard/home.php');
                  }
                  else
                  {
                    echo "GETLISTING";
                  }
                }
                
                
                
            }
            else
            {
              echo "<script>alert('Entered code is invalid')</script>";
            }  
         }
         else
         {
          echo "<script>alert('Please enter field')</script>";
         } 

      }

?>
<title>Getlisting - Listing Verification</title>
<form class="authen_form confirm_listing" method="POST">
	<h2>Confirm Your Business Listing</h2>
	<input type="text" placeholder="Verification Code" name="verify_code">
	<input type="submit" value="Verify" name="submit">
	<label class="note">Note : Confirm Your Listing To Complete Payment Process</label>
</form>

<?php include('footer.php'); ?>