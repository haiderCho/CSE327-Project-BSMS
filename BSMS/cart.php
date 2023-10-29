<?php
// Include the website header.
	include("includes/header.php");
?>

<div id="content">
	<div class="post">
		<h2 class="title"><a href="#">Cart</a></h2>
			<p class="meta"></p>
			<div class="entry">
			
<!-- Form to update cart quantities and submit for recalculating. -->

			<form action="addtocart.php" method="post">

			<!-- data Table structure for cart -->
				<table class="cart" cellspacing="0" border="0" width="100%">
					<tr align="center">
						<th width="7%">No</th>
						<th width="30%">Name</th>
						<th width="20%">Image</th>
						<th width="15%">Qty</th>
						<th width="10%">Price</th>
						<th width="10%">Rate</th>
						<th width="7%">Remove</th>
					</tr>

					<?php
					//total 0 books and 1 for initial counter in loops.
						$count=1;
						$total=0;

						if(isset($_SESSION['cart']))	//session for cart craetion exists.
						{
							//each item of the cart goes through the loop.
							foreach($_SESSION['cart'] as $id=>$val)
							{
								// Total cart amount = quantity * price.
								$rate=$val['qty'] * $val['price'];
								$total=$total+$rate;
								//display item information in a table.
								echo '<tr>
										<td>'.$count.'</td>
										<td>'.$val['nm'].'</td>
										<td><img src="'.$val['img'].'" width="80" height="60"></td>
										<td><input type="number" min="1" value="'.$val['qty'].'" style="width: 50px" name="'.$id.'"></td>
										<td>'.$val['price'].'</td>
										<td>'.$rate.'</td>
										<td><a style="color: red;text-decoration:none;" href="addtocart.php?id='.$id.'">X</a></td>
									</tr>';

								$count++;//increment for the counter loop.
							}
						}
					?>

					
					<!-- Display the total calculated above -->
					<tr style="font-weight: bold;">
						<td colspan="5">Total : </td>
						<td colspan="2">BDT. <?php echo $total; ?></td>
					</tr>
				</table>

				<div align="center" style="margin-top: 20px">
					<input type="submit" value="Re-calculate" class="btn_refresh">
					

					<?php echo '<a href="order.php?total='.$total.'" name="button" style="font-family: open sans;" style="margin-left: 10px">Confirm & Submit Order</a>'
					?>


				</div>

		</form>

			</div>
	</div>
</div><!-- end #content -->

<?php
	include("includes/footer.php");//including the website footer.
?>