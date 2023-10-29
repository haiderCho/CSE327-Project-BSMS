<?php
	// Include the header file
	include("includes/header.php");
?>

<div id="content">
	<div class="post">
		<h2 class="title"><a href="#">Login</a></h2>
			<p class="meta"></p>
			<div class="entry">
				
				<!-- Form for user login -->
				<form class="login" action="login_process.php" method="post">
					
					<!-- Username input -->
					User Name :<br>
					<input type="text" name="unm" class="txt"><br><br>

					<!-- Password input -->
					Password :<br>
					<input type="password" name="pwd" class="txt"><br><br>

					<?php
						// Check for any session errors and display them
						if(!empty($_SESSION['error'])) {
							foreach($_SESSION['error'] as $er) {
								echo '<font color="red">'.$er.'</font><br>';
							}
							// Clear session errors
							unset($_SESSION['error']);
						}
					?>

					<br>

					<!-- Submit button for user login -->
					<input type="submit" class="btn" value="Login">
					
					<!-- Admin login link -->
					<a href="admin/index.php" style="text-decoration: none; margin-left: 83px" class="btn" value="Admin Login">Admin Login</a>

					<p class="login_link">
						<!-- Forget password link -->
						<a href="forget_password.php" style="text-decoration: none">Forget Password ?</a>
						<!-- Registration link -->
						<a href="register.php" style="margin-left: 100px;text-decoration: none">Register</a>
					</p>

				</form>

			</div>
	</div>
</div><!-- end #content -->

<?php
	// Include the footer file
	include("includes/footer.php");
?>