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
        if (mysqli_num_rows($free)>0) 
        {
        	header('location:home.php');
        }
        elseif (mysqli_num_rows($standard)>0)
        {
        	$announcement = mysqli_query($conn,"SELECT * FROM announcement WHERE member_email = '{$standard_row['2']}'");

        	include('standard_sidebar.php');
        	?>
        	<title><?php echo ucfirst($standard_row['1'])." - Announcement"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='announcement.php' class='a_right'>Announcement</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Announcement Title</th>
							<th>Announcement Description</th>
							<th>Announcement Date</th>
						</tr>
					";
	
						if (mysqli_num_rows($announcement)>0) 
						{
							$i = 1;
							while ($announcement_row = mysqli_fetch_row($announcement)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$announcement_row['4'].'</td>
									<td>'.$announcement_row['5'].'</td>
									<td>'.$announcement_row['6'].'</td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Announcement Title</th>
								<th>Announcement Description</th>
								<th>Announcement Date</th>
							</tr>
						</table>
				</div>

					";
        }
        elseif (mysqli_num_rows($premium)>0)
        {
			$announcement = mysqli_query($conn,"SELECT * FROM announcement WHERE member_email = '{$premium_row['2']}'");

        	include('premium_sidebar.php');
        	?>
        	<title><?php echo ucfirst($premium_row['1'])." - Add Announcement"; ?></title>
        	<?php
            echo "
	            <div class='bread_crumb'>
	            	<label><a href='home.php' class='a_left'>Home</a>/<a href='announcement.php' class='a_right'>Announcement</a></label>
	            </div>
	            <div class='listing'>
					<table>
						<tr>
							<th>Sr No</th>
							<th>Announcement Title</th>
							<th>Announcement Description</th>
							<th>Announcement Date</th>
						</tr>
					";
	
						if (mysqli_num_rows($announcement)>0) 
						{
							$i = 1;
							while ($announcement_row = mysqli_fetch_row($announcement)) 
							{
								echo '

								<tr>
									<td>'.$i.'</td>
									<td>'.$announcement_row['4'].'</td>
									<td>'.$announcement_row['5'].'</td>
									<td>'.$announcement_row['6'].'</td>
								</tr>

								';
								$i++;
							}
							
						}
						
						
					echo "
							<tr>
								<th>Sr No</th>
								<th>Announcement Title</th>
								<th>Announcement Description</th>
								<th>Announcement Date</th>
							</tr>
						</table>
				</div>

					";


        }
        
?>