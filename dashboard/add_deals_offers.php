<!-- Header Include -->
<?php include('header.php'); ?>

<?php include('prevent_user.php'); ?>

<!-- User Roll Code For Dashboard-->
<?php 	
		
		$user = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='user'");
	    $free = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='free'");
	    $standard = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='standard'");
	    $premium = mysqli_query($conn,"SELECT * FROM user_type WHERE id='{$_SESSION['id']}' AND type='premium'");
	        
	    // Fetching all the above data
	    $user_row = mysqli_fetch_row($user);
	    $free_row = mysqli_fetch_row($free);
	    $standard_row = mysqli_fetch_row($standard);
	    $premium_row = mysqli_fetch_row($premium);

        // Dashboard as per the priority
        if (mysqli_num_rows($free)>0) 
        {
        	if (mysqli_num_rows($free)>0) 
	        {
	        	header('location:home.php');
	        }
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	include('standard_sidebar.php');
        	?>
        	<title><?php echo ucfirst($standard_row['1'])." - Add Deals Offers"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_deals_offers.php' class='a_right'>Add Deals & Offers</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Deals and offers</h2>
					<form class='authen_form blog_upload' method='POST' enctype='multipart/form-data'>
						<label>Deals Offers Title</label>
						<input type='text' placeholder='Deals Offers Title' name='deals_offers_title' required>
						<label>Deals Offers Description</label>
						<textarea name='deals_offers_description' rows='5' cols='6' placeholder='Deals Offers Description' required></textarea><br>
						<label>Terms And Conditions</label>
						<textarea name='deals_offers_t_and_c' rows='5' cols='6' placeholder='Terms And Conditions' required></textarea><br>
						<input type='submit' value='Add Deals Offers' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$standard_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$deals_offers_title = $_POST['deals_offers_title'];
				$deals_offers_description = $_POST['deals_offers_description'];
				$listing_id = $listing_fetch_row['0'];
				$deals_offers_t_and_c = $_POST['deals_offers_t_and_c'];
				$listing_name = $listing_fetch_row['1'];
				$member_email = $listing_fetch_row['3'];
				$deals_offers_date = date("Y/m/d");


				$insert_query = mysqli_query($conn,"INSERT INTO deals_offers (listing_id,member_email,deals_title,deals_description,deals_date,listing_name,deals_offers_t_and_c) VALUES ('$listing_id','$member_email','$deals_offers_title','$deals_offers_description','$deals_offers_date','$listing_name','$deals_offers_t_and_c') ");
					
					if ($insert_query == TRUE) 
					{
						echo"<script>alert('Deals and offers are submitted')</script>";	
					}
					else
					{
						echo"<script>alert('Correct your content, HINT Avoid ->(') ')</script>";
					}
	   		}
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');
        	?>
        	<title><?php echo ucfirst($premium_row['1'])." - Add Deals Offers"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='add_deals_offers.php' class='a_right'>Add Deals & Offers</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Add Deals and offers</h2>
					<form class='authen_form blog_upload' method='POST' enctype='multipart/form-data'>
						<label>Deals Offers Title</label>
						<input type='text' placeholder='Deals Offers Title' name='deals_offers_title' required>
						<label>Deals Offers Description</label>
						<textarea name='deals_offers_description' rows='5' cols='6' placeholder='Deals Offers Description' required></textarea><br>
						<label>Terms And Conditions</label>
						<textarea name='deals_offers_t_and_c' rows='5' cols='6' placeholder='Terms And Conditions' required></textarea><br>
						<input type='submit' value='Add Deals Offers' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE listing_email = '{$premium_row['2']}' ");
				$listing_fetch_row = mysqli_fetch_row($listing_fetch);
 
				$deals_offers_title = $_POST['deals_offers_title'];
				$deals_offers_t_and_c = $_POST['deals_offers_t_and_c'];
				$deals_offers_description = $_POST['deals_offers_description'];
				$listing_id = $listing_fetch_row['0'];
				$listing_name = $listing_fetch_row['1'];
				$member_email = $listing_fetch_row['3'];
				$deals_offers_date = date("Y/m/d");


				$insert_query = mysqli_query($conn,"INSERT INTO deals_offers (listing_id,member_email,deals_title,deals_description,deals_date,listing_name,deals_offers_t_and_c) VALUES ('$listing_id','$member_email','$deals_offers_title','$deals_offers_description','$deals_offers_date','$listing_name','$deals_offers_t_and_c') ");

				if ($insert_query == TRUE) 
				{
					echo"<script>alert('Deals and offers are submitted')</script>";	
				}
				else
				{
					echo"<script>alert('Correct your content, HINT Avoid ->(') ')</script>";
				}
				
	   		}
        }
        
?>