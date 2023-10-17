<?php
	include("includes/header.php");
?>

<div id="content">
	<div class="post">
		<h2 class="title"><a href="#">Latest Books</a></h2>
			<p class="meta"></p>
			<div class="entry">

				<?php
					include("includes/connection.php");

					$sql = "SELECT * FROM book ORDER BY b_id DESC LIMIT 0,9";
					$result = $link->query($sql);

					while($row = $result->fetch_assoc())
					{
						echo '<div class="book_box">
								<a href="book_detail.php?id='.$row['b_id'].'">
									<img src="'.$row['b_img'].'">
									<h2>'.$row['b_nm'].'</h2>
									<p>BDT. '.$row['b_price'].'</p>
								</a>
							</div>';
					}
				?>
				

				<div style="clear:both;"></div>

			</div>
	</div>
</div><!-- end #content -->

<?php
	include("includes/footer.php");
?>