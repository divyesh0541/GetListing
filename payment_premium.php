<?php include('header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Getlisting - Payment</title>
<?php  
	
	if (isset($_POST['submit']))
	{
		$member = mysqli_query($conn,"SELECT * FROM user_type WHERE id = '{$_SESSION['id']}' ");
		$member_row = mysqli_fetch_row($member);

		$member_phone = $member_row['3'];
		$member_id = $member_row['0'];
		$member_name = $member_row['1'];
		$member_email = $member_row['2'];
		$amount = $_POST['amount'];
		$package = 'premium';
		$pur_date = date("Y/m/d");
		$exp_date = date('Y/m/d', strtotime('+1 year'));

		$insert_package = mysqli_query($conn,"INSERT INTO payment (member_id,member_email,member_name,amount,package,pur_date,exp_date) VALUES ('$member_id','$member_email','$member_name','$amount','$package','$pur_date','$exp_date')");
		

		if ($insert_package == TRUE)
		{
			echo"<script>alert('You successfully completed the payment process, your listing will displayed soon')</script>";
			$update_member = mysqli_query($conn,"UPDATE user_type SET type = 'premium' WHERE id='{$_SESSION['id']}' ");
			$update_listing = mysqli_query($conn,"UPDATE listing SET payment = 'success' WHERE listing_email = '{$member_row['2']}' ");
		}
		else
		{
			echo"<script>alert('Something is wrong')</script>";
		}
	}
	elseif (isset($_POST['cancel'])) 
	{
		$update_listing = mysqli_query($conn,"UPDATE listing SET payment = 'pending' WHERE listing_email = '{$member_row['2']}' ");
			header('location:dashboard/home.php');
	}

?>
<div class="payment">
	<form method="POST">
		<label class="label_payment">Make Payment Into Getlisting</label>
		<label>Card Holder Name</label>
		<input type="text" name="" required>
		<label>Card Number</label>
		<input type="text" name="" required>
		<div class="payment_expiry">
			<label class="lb1">Card Exp. Year</label>
			<label class="lb2">Card Exp. Month</label>
			<label>CVC</label>
			<select required>
				<option>2021</option>
				<option>2022</option>
				<option>2023</option>
				<option>2024</option>
				<option>2025</option>
				<option>2026</option>
				<option>2027</option>
				<option>2028</option>
				<option>2029</option>
				<option>2030</option>
				<option>2031</option>
				<option>2032</option>
				<option>2033</option>
				<option>2034</option>
				<option>2035</option>
				<option>2036</option>
				<option>2037</option>
				<option>2038</option>
				<option>2039</option>
				<option>2040</option>
			</select>
			<select required>
				<option>January</option>
				<option>Fabruary</option>
				<option>March</option>
				<option>April</option>
				<option>May</option>
				<option>June</option>
				<option>July</option>
				<option>August</option>
				<option>September</option>
				<option>October</option>
				<option>November</option>
				<option>December</option>
			</select>
			<input type="text" name="" required>
		</div>
		<label>Amount</label>
		<input type="text" name="amount" value="7999" placeholder="&#8377" required readonly>
		<input type="submit" name="cancel" value="Cancel">
		<input type="submit" name="submit" value="Submit">
	</form>
</div>
<?php include('footer.php'); ?>