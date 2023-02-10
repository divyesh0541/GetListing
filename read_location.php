<?php
	include('db.php');

	if(!empty($_POST["keyword_location"])) 
	{
		$query ="SELECT * FROM listing WHERE listing_city like '" . $_POST["keyword_location"] . "%' ORDER BY listing_city LIMIT 0,6";
		$result = mysqli_query($conn,$query);
		
		if(!empty($result)) 
		{
			?>
			<ul id="country-list2">
			<?php
				foreach($result as $listing)
				{
					?>
					<li onClick="selectCountry2('<?php echo $listing["listing_city"]; ?>');"><?php echo $listing["listing_city"]; 
					?></li>
					<?php 
				} 
					?>
			</ul>
		<?php 
		} 
	} 
?>