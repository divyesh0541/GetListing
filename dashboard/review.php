<!-- Header Include -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
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
        	$review = mysqli_query($conn,"SELECT * FROM review WHERE user_email = '{$user_row['2']}'");

        	include('user_sidebar.php');
        	?>
            <title><?php echo ucfirst($user_row['1'])." - Review"; ?></title>
            <?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='review.php' class='a_right'>Review</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Listing</th>
							<th>Rating</th>
							<th>Message</th>
							<th>Date</th>
						</tr>
					";
	
						if (mysqli_num_rows($review)>0) 
						{
							$i = 1;
							while ($review_row = mysqli_fetch_row($review)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$review_row['2'].'</td>
									';
								echo "<td>";
								for($i=1; $i<=$review_row['7']; $i++)
								{
									echo '<img src="../images/star.png" />';
								}
								echo "</td>";
								echo '<td>'.$review_row['6'].'</td>
									  <td>'.$review_row['8'].'</td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Member Email</th>
								<th>Review</th>
								<th>Date</th>
							</tr>
						</table>
				</div>

					";

        }
        elseif (mysqli_num_rows($free)>0) 
        {
        	$review = mysqli_query($conn,"SELECT * FROM review WHERE member_email = '{$free_row['2']}'");

        	include('free_sidebar.php');
        	?>
            <title><?php echo ucfirst($free_row['1'])." - Review"; ?></title>
            <?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='review.php' class='a_right'>Review</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Listing</th>
							<th>Name</th>
							<th>Rating</th>
							<th>Message</th>
							<th>Date</th>
						</tr>
					";
	
						if (mysqli_num_rows($review)>0) 
						{
							$i = 1;
							while ($review_row = mysqli_fetch_row($review)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$review_row['2'].'</td>
									<td>'.$review_row['4'].'</td>
									';
								echo "<td>";
								for($i=1; $i<=$review_row['7']; $i++)
								{
									echo '<img src="../images/star.png" />';
								}
								echo "</td>";
								echo '<td>'.$review_row['6'].'</td>
									  <td>'.$review_row['8'].'</td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Name</th>
								<th>Rating</th>
								<th>Message</th>
								<th>Date</th>
							</tr>
						</table>
				</div>

					";
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	$review = mysqli_query($conn,"SELECT * FROM review WHERE member_email = '{$standard_row['2']}'");

        	include('standard_sidebar.php');
        	?>
            <title><?php echo ucfirst($standard_row['1'])." - Review"; ?></title>
            <?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='review.php' class='a_right'>Review</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Listing</th>
							<th>Name</th>
							<th>Rating</th>
							<th>Message</th>
							<th>Date</th>
						</tr>
					";
	
						if (mysqli_num_rows($review)>0) 
						{
							$i = 1;
							while ($review_row = mysqli_fetch_row($review)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$review_row['2'].'</td>
									<td>'.$review_row['4'].'</td>
									';
								echo "<td>";
								for($i=1; $i<=$review_row['7']; $i++)
								{
									echo '<img src="../images/star.png" />';
								}
								echo "</td>";
								echo '<td>'.$review_row['6'].'</td>
									  <td>'.$review_row['8'].'</td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Name</th>
								<th>Rating</th>
								<th>Message</th>
								<th>Date</th>
							</tr>
						</table>
				</div>

					";
        }
        elseif (mysqli_num_rows($premium)>0)
        {
			$review = mysqli_query($conn,"SELECT * FROM review WHERE member_email = '{$premium_row['2']}'");

        	include('premium_sidebar.php');
        	?>
            <title><?php echo ucfirst($premium_row['1'])." - Review"; ?></title>
            <?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='review.php' class='a_right'>Review</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Listing</th>
							<th>Name</th>
							<th>Rating</th>
							<th>Message</th>
							<th>Date</th>
						</tr>
					";
	
						if (mysqli_num_rows($review)>0) 
						{
							$i = 1;
							while ($review_row = mysqli_fetch_row($review)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$review_row['2'].'</td>
									<td>'.$review_row['4'].'</td>
									';
								echo "<td>";
								for($i=1; $i<=$review_row['7']; $i++)
								{
									echo '<img src="../images/star.png" />';
								}
								echo "</td>";
								echo '<td>'.$review_row['6'].'</td>
									  <td>'.$review_row['8'].'</td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Listing</th>
								<th>Name</th>
								<th>Rating</th>
								<th>Message</th>
								<th>Date</th>
							</tr>
						</table>
				</div>

					";


        }
        
?>