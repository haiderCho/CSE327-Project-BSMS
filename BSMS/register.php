<?php
	// Include the header file
	include("includes/header.php");
?>

<div id="content">
	<div class="post">
		<h2 class="title"><a href="#">User Registration</a></h2>
			<p class="meta"></p>
			<div class="entry">
				
				<!-- Form for user registration -->
				<form class="register" action="register_process.php" method="post">
					
					<?php
						// Check if registration is successful and display a success message
						if(isset($_GET['register'])) {
							echo '<font color="red">Registered Successfully..</font>';
							echo '<br><br>';
						}
					?>

					<!-- Full name input -->
					Full Name :<br>
					<input type="text" name="fnm" class="txt">
						<?php
							// Display any errors related to the full name
							if(isset($_SESSION['error']['fnm'])) {
								echo '<font color="red">'.$_SESSION['error']['fnm'].'</font>';
							}
						?>
					<br><br>

					<!-- Username input -->
					User Name :<br>
					<input type="text" name="unm" class="txt">
						<?php
							// Display any errors related to the username
							if(isset($_SESSION['error']['unm'])) {
								echo '<font color="red">'.$_SESSION['error']['unm'].'</font>';
							}
						?>
					<br><br>

					<!-- Password input -->
					Password :<br>
					<input type="password" name="pwd" class="txt">
						<?php
							// Display any errors related to the password
							if(isset($_SESSION['error']['pwd'])) {
								echo '<font color="red">'.$_SESSION['error']['pwd'].'</font>';
							}
						?>
					<br><br>

					<!-- Confirm password input -->
					Confirm Password :<br>
					<input type="password" name="cpwd" class="txt"><br><br>

					<!-- Email input -->
					E-Mail :<br>
					<input type="text" name="email" class="txt">
						<?php
							// Display any errors related to the email
							if(isset($_SESSION['error']['email'])) {
								echo '<font color="red">'.$_SESSION['error']['email'].'</font>';
							}
						?>
					<br><br>

					<!-- Contact number input -->
					Contact No :<br>
					<input type="text" name="cno" class="txt">
						<?php
							// Display any errors related to the contact number
							if(isset($_SESSION['error']['cno'])) {
								echo '<font color="red">'.$_SESSION['error']['cno'].'</font>';
							}
						?>
					<br><br>

					<!-- Security question selection -->
					Security Question :<br>
					<select name="question" class="txt">
						<option>What is your Favorite Book?</option>
						<option>Which is your Favorite Book Genre?</option>
					</select>
						<?php 
							// Display any errors related to the security question
							if(isset($_SESSION['error']['que'])) {
								echo '<font color="red">'.$_SESSION['error']['que'].'</font>';
							}
						?>
					<br><br>

					<!-- Security answer input -->
					Security Answer :<br>
					<input type="text" name="answer">
						<?php 
							// Display any errors related to the security answer
							if(isset($_SESSION['error']['answer'])) {
								echo '<font color="red">'.$_SESSION['error']['answer'].'</font>';
							}
						?>
					<br><br>

					<!-- Submit button for user registration -->
					<input type="submit" class="btn" value="Register">

					<p class="login_link">
						<!-- Login link for users with an existing account -->
						<a href="login.php" style="margin-left: 145px; text-decoration: none">Already Have an Account? - Login</a>
					</p>

				</form>

				<?php
					// Clear any stored error messages and the 'register' parameter
					unset($_SESSION['error']);
					unset($_GET['register']);
				?>

			</div>
	</div>
</div><!-- end #content -->

<?php
	// Include the footer file
	include("includes/footer.php");
?>