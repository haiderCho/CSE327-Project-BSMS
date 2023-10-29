<?php
	include("includes/header.php");

	include("includes/connection.php");
	//including header and connection files
?>


<!-- contents of web page -->
<div id="content">
	<div class="post">
		<h2 class="title"><a href="#">Order - Cash On Delivery</a></h2>
			<p class="meta"></p>
			<div class="entry">
				


				<!-- Order form with required fields-->
				<form style="color: black" role="form" action="order_process.php" class="register" method="post">
					
					<?php

					// If order is set in the GET request, display success message.
                        if(isset($_GET['order']))
                        {
                            echo '<font style="color:red">Order Successfully Placed</font><br><br>';
                        }
                    ?>

                    <?php
					// Check for errors in session and display them.
						if(!empty($_SESSION['error']))
						{
							foreach($_SESSION['error'] as $er)
							{
								echo '<font color="red">'.$er.'</font><br>';
							}
							unset($_SESSION['error']);
						}
					?>

					<br>
					<!-- inputs for form--> 

					Full Name :<br>
					<input type="text" name="fnm" class="txt" placeholder="First Name or Surname"><br><br>


					Address :<br>
					<input type="text" name="add" class="txt" placeholder="Address"><br><br>


					Postal Code :<br>
					<input type="text" name="pc" class="txt" placeholder="Postal Code"><br><br>


					City :<br>
					<input type="text" name="city" class="txt" placeholder="City"><br><br>


					Area :<br>
					<input type="text" name="state" class="txt" placeholder="State"><br><br>


					Mobile Number :<br>
  					<input type="text" name="mno" class="txt" placeholder="Mobile Number"><br><br>

					<button type="submit" name="sub" class="btn btn-default">Confirm & Proceed</button>
						
				</form>

			</div>
	</div>
</div><!-- end #content -->

<?php
	include("includes/footer.php");
	//including footer.
?>