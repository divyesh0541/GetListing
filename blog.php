<?php include('header.php'); ?>
<style type="text/css">
	.blog_a
      {
        color: white !important;
      }
</style>
<?php  

	$select_blog = mysqli_query($conn,"SELECT * FROM blog WHERE status!=0");

?>
<title>Getlisting - Blogs</title>
<div class="blog">
<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>FIND LATEST AND BEST BLOGS</h2>
						<p>Just click to get the best and latest blogs.</p>
					</header>
					<div class="highlights">
						<?php  

							while ($select_blog_row = mysqli_fetch_row($select_blog)) 
							{
								echo "

										<section>
											<div class='content padding_reduce_content'>
												<header>
													<a href='blog_details.php?bid=".$select_blog_row['0']."'><img src='blog images/".$select_blog_row['6']."'></a>
													<h3>".$select_blog_row['3']."</h3>
													<h4>".$select_blog_row['5']."</h4>
												</header>
											</div>
										</section>

									";
							}

						?>
					</div>
				</div>
			</section>
</div>
<?php include('footer.php'); ?>