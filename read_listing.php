<?php
	include('db.php');
	
	if(!empty($_POST["keyword"])) 
	{
		$query ="SELECT * FROM listing WHERE listing_name like '" . $_POST["keyword"] . "%' ORDER BY listing_name LIMIT 0,6";
		$result = mysqli_query($conn,$query);
		
		if(!empty($result)) 
		{
			?>
			<ul id="country-list1">
			<?php
				foreach($result as $listing)
				{
					?>
					<li onClick="selectCountry1('<?php echo $listing["listing_name"]; ?>');"><?php echo $listing["listing_name"]; 
					?></li>
					<?php 
				} 
					?>
			</ul>
		<?php 
		} 
	} 
?>