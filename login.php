<!DOCTYPE html>
<html>
<head>
  <title>Login | JoinYou</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
	body {
		background-image: url("images/bgback.jpeg");
		background-size: cover;
	}
</style>
<body>
<link rel="stylesheet" href="stylesheet/styles.css">

	<header class="page-header">
	  <div class="logo">
	    <img src="images/logo.png">
	    <span class="logo-title">
		  <b>JoinYou</b>
	    </span>
	  </div>
	  <div>
		<a href="registration.php" title="Sign up"><span class="brdr-btn">Sign Up</span></a>
	  </div>
	</header>
	
	<div class="loginpage-block">
		<?php
			require('processors/loginprocess.php');

			// Redirect user if user already logged in
			if (isset($_SESSION['user_id'])) {
				header("Location: my_profile.php");
				exit();
			}

			// Check if the registration success
			if (isset($_GET['reg']) && $_GET['reg'] === 'success') {
				// Display the success message
				echo '<div class="notify_infook">
					<img src="images/correctsign.png" width="16px" height="16px">
					Registration successful! You can log in now.
				</div>';
			}
		?>
		<div class="login-form">
			<form action="" method="post">
				<div align="center">
					<h2> Login Form</h2>
					<hr>
				</div>
				<label for="email_or_username">Username or Email: </label>
				<input type="text" id="email_or_username" name="email_or_username" placeholder="Enter username or email..." value="<?php echo isset($_SESSION['loginname']) ? $_SESSION['loginname'] : ''; ?>" required>
				<br>
				<label for="password">Password: </label>
				<input type="password" id="password" name="password" placeholder="Enter password..." required>
				<br>
				<input type="submit" name="submit" value="LOGIN">
				<br>
				<label>
					<input type="checkbox" name="remember"> Remember me
				</label>
			</form>
			<br>
			
			<div class="signup-text">
				<p>Don't have an account? <a href="registration.php"><b>SIGN UP</b></a> for a NEW profile.</p>
			</div>
			<br>
		</div>
		<?php
		unset($_SESSION['loginname']);
		?>
	</div>
	
	<footer class="bfooter">
		<h3>JoinYou</h3>
		<br>
		©<?php echo date('Y'); ?>
		<br>
		All rights reserved.
	</footer>

</body>
</html>