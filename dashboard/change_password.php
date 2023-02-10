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
        if (mysqli_num_rows($user)>0) 
        {
            include('user_sidebar.php');
            ?>
        	<title><?php echo ucfirst($user_row['1'])." - Change Password"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='change_password.php' class='a_right'>Change Password</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Change You Password</h2>
					<form class='authen_form' method='POST'>
						<input type='password' placeholder='Old Password' name='old_password'>
						<input type='password' placeholder='New Password' name='new_password'>
						<input type='submit' value='Change Password' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				    
				$old_password = $user_row['4']; //from DB
				$new_password = $_POST['new_password'];

				if($_POST['old_password']!='' && ($_POST['old_password'] == $old_password))
				{
					$query = mysqli_query($conn,"UPDATE user_type SET password = '$new_password' WHERE id = '{$_SESSION['id']}' ");

					if ($query==TRUE) 
					{
						echo "<script>alert('Your password is changed successfully')</script>";
					}
					
				}
				else
				{
					echo "<script>alert('Old Password was wrong.')</script>";
				}
	   		}
        }
        elseif (mysqli_num_rows($free)>0) 
        {
        	include('free_sidebar.php');
        	?>
        	<title><?php echo ucfirst($free_row['1'])." - Change Password"; ?></title>
        	<?php
        	echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='change_password.php' class='a_right'>Change Password</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Change You Password</h2>
					<form class='authen_form' method='POST'>
						<input type='password' placeholder='Old Password' name='old_password' required>
						<input type='password' placeholder='New Password' name='new_password' required>
						<input type='submit' value='Change Password' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				    
				$old_password = $free_row['4']; //from DB
				$new_password = $_POST['new_password'];

				if($_POST['old_password']!='' && ($_POST['old_password'] == $old_password))
				{
					$query = mysqli_query($conn,"UPDATE user_type SET password = '$new_password' WHERE id = '{$_SESSION['id']}' ");

					if ($query==TRUE) 
					{
						echo "<script>alert('Your password is changed successfully')</script>";
					}
					
				}
				else
				{
					echo "<script>alert('Old Password was wrong.')</script>";
				}
	   		}
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	include('standard_sidebar.php');
        	?>
        	<title><?php echo ucfirst($standard_row['1'])." - Change Password"; ?></title>
        	<?php
        	echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='change_password.php' class='a_right'>Change Password</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Change You Password</h2>
					<form class='authen_form' method='POST'>
						<input type='password' placeholder='Old Password' name='old_password' required>
						<input type='password' placeholder='New Password' name='new_password' required>
						<input type='submit' value='Change Password' name='submit'>
					</form>
				</div>

            ";

            if (isset($_POST['submit']))
			{
				    
				$old_password = $standard_row['4']; //from DB
				$new_password = $_POST['new_password'];

				if($_POST['old_password']!='' && ($_POST['old_password'] == $old_password))
				{
					$query = mysqli_query($conn,"UPDATE user_type SET password = '$new_password' WHERE id = '{$_SESSION['id']}' ");

					if ($query==TRUE) 
					{
						echo "<script>alert('Your password is changed successfully')</script>";
					}
					
				}
				else
				{
					echo "<script>alert('Old Password was wrong.')</script>";
				}
	   		}
        }
        elseif (mysqli_num_rows($premium)>0)
        {
        	include('premium_sidebar.php');
        	?>
        	<title><?php echo ucfirst($premium_row['1'])." - Change Password"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='change_password.php' class='a_right'>Change Password</a></label>
	            </div>
	            <div class='change_password'>
	            	<h2>Change You Password</h2>
					<form class='authen_form' method='POST'>
						<input type='password' placeholder='Old Password' name='old_password' required>
						<input type='password' placeholder='New Password' name='new_password' required>
						<input type='submit' value='Change Password' name='submit'>
					</form>
				</div>

            ";

	            if (isset($_POST['submit']))
				{
				    
					$old_password = $premium_row['4']; //from DB
					$new_password = $_POST['new_password'];

					if($_POST['old_password']!='' && ($_POST['old_password'] == $old_password))
					{
						$query = mysqli_query($conn,"UPDATE user_type SET password = '$new_password' WHERE id = '{$_SESSION['id']}' ");

						if ($query==TRUE) 
						{
							echo "<script>alert('Your password is changed successfully')</script>";
						}
						
					}
					else
					{
						echo "<script>alert('Old Password was wrong.')</script>";
					}
	   			}
        }
        
?>