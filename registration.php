<!DOCTYPE html>
<html>
<head>
  <title>Registration | JoinYou</title>
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
	  </div>
	  <div class="logo-title">
		JoinYou
	  </div>
	  <div>
	    <a href="login.php" title="Login"><span class="brdr-btn">Log In</span></a>
	  </div>
	</header>
	
	<div class="regpage-block">
	<?php
		include("processors/regprocess.php");

		// Redirect user if user already logged in
		if (isset($_SESSION['user_id'])) {
			header("Location: my_profile.php");
			exit();
		}
	?>
		<div class="reg-form">
		<div align="center">
		  <h2> Registration Form</h2>
		  <hr>
		</div>
		<p>
			<h3>Please fill in the following fields to create a new account:</h3>
		</p>
			<form action="" method="post" enctype="multipart/form-data">
			<table width="100%"><tr>
			<td width="20%">
				<!-- Name -->
				<label for="name">Full Name:<font color="red"><sup>*</sup></font></label>
			</td><td width="80%">
				<input type="text" id="name" name="name" value="<?php echo isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : ''; ?>" required>
				<small>Enter your full name (e.g., John Doe). This field is required.</small>
			<br><br></td></tr>
			
			<tr><td width="20%">
				<!-- Email -->
				<label for="email">Email:<font color="red"><sup>*</sup></font></label>
			</td><td width="80%">
				<input type="email" id="email" name="email" value="<?php echo isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : ''; ?>" required>
				<small>Enter a valid email address. This field is required.</small>
			<br><br></td></tr>
			
			<tr><td width="20%">
				<!-- Password -->
				<label for="password">Password:<font color="red"><sup>*</sup></font></label>
			</td><td width="80%">
				<input type="password" id="password" name="password" required>
				<small>Choose a strong password with at least 8 characters. This field is required.</small>
			<br><br></td></tr>

			<tr><td width="20%">
				<!-- Confirm Password -->
				<label for="confirm_password">Confirm Password:<font color="red"><sup>*</sup></font></label>
			</td><td width="80%">
				<input type="password" id="confirm_password" name="confirm_password" required>
				<small>Re-enter your password to confirm. This field is required.</small>
			<br><br></td></tr>

			<tr><td width="20%">
				<!-- Profile Picture -->
				<label for="photo">Profile Picture:</label>
			</td><td width="80%">
				<input type="file" id="photo" name="photo" value="<?php echo isset($_SESSION['form_data']['imgfile']) ? $_SESSION['form_data']['imgfile'] : ''; ?>"><br>
				<small>Select a profile picture from your device (optional).</small>
			<br><br></td></tr>
			
			<tr><td width="20%">
				<!-- Username -->
				<label for="username">Username:<font color="red"><sup>*</sup></font></label>
			</td><td width="80%">
				<input type="text" id="username" name="username" value="<?php echo isset($_SESSION['form_data']['username']) ? $_SESSION['form_data']['username'] : ''; ?>" required>
				<small>Choose a unique username for your profile URL. This field is required.</small>
			<br><br></td></tr>
			
			<tr><td width="20%">
				<!-- Date of Birth -->
				<label for="dob">Date of Birth:<font color="red"><sup>*</sup></font></label>
			</td><td width="80%">
				<input type="date" id="dob" name="dob" value="<?php echo isset($_SESSION['form_data']['dob']) ? $_SESSION['form_data']['dob'] : ''; ?>" required><br>
				<small>Select your date of birth. This field is required.</small>
			<br><br></td></tr>
			
			<tr><td width="20%">
				<!-- Gender -->
				<label for="gender">Gender:</label>
			</td><td width="80%">
				<input type="radio" id="gender_male" name="gender" value="Male" checked>
				<label for="gender_male">Male</label>
				<input type="radio" id="gender_female" name="gender" value="Female">
				<label for="gender_female">Female</label>
				<input type="radio" id="gender_other" name="gender" value="other">
				<label for="gender_other">Other</label><br>
				<small>Select your gender (optional).</small>
			<br><br></td></tr>
			
			<tr><td width="20%">
				<!-- Country -->
				<label for="country">Country:</label>
			</td><td width="80%">
				<select name="country" id="country">
					<option value="" disabled selected>Select your country</option>
					<option value="Afghanistan">Afghanistan</option>
					<option value="Albania">Albania</option>
					<option value="Algeria">Algeria</option>
					<option value="Argentina">Argentina</option>
					<option value="Australia">Australia</option>
					<option value="Austria">Austria</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Belgium">Belgium</option>
					<option value="Brazil">Brazil</option>
					<option value="Canada">Canada</option>
					<option value="China">China</option>
					<option value="Colombia">Colombia</option>
					<option value="Czech Republic">Czech Republic</option>
					<option value="Egypt">Egypt</option>
					<option value="France">France</option>
					<option value="Germany">Germany</option>
					<option value="Greece">Greece</option>
					<option value="India">India</option>
					<option value="Indonesia">Indonesia</option>
					<option value="Italy">Italy</option>
					<option value="Japan">Japan</option>
					<option value="Kenya">Kenya</option>
					<option value="Malaysia">Malaysia</option>
					<option value="Mexico">Mexico</option>
					<option value="Morocco">Morocco</option>
					<option value="Netherlands">Netherlands</option>
					<option value="New Zealand">New Zealand</option>
					<option value="Nigeria">Nigeria</option>
					<option value="Norway">Norway</option>
					<option value="Pakistan">Pakistan</option>
					<option value="Philippines">Philippines</option>
					<option value="Poland">Poland</option>
					<option value="Portugal">Portugal</option>
					<option value="Romania">Romania</option>
					<option value="Russia">Russia</option>
					<option value="Saudi Arabia">Saudi Arabia</option>
					<option value="South Africa">South Africa</option>
					<option value="South Korea">South Korea</option>
					<option value="Spain">Spain</option>
					<option value="Sweden">Sweden</option>
					<option value="Switzerland">Switzerland</option>
					<option value="Thailand">Thailand</option>
					<option value="Turkey">Turkey</option>
					<option value="United Arab Emirates">United Arab Emirates</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="United States">United States</option>
					<option value="Vietnam">Vietnam</option>
  				</select>
				<small>Enter your current city or region (optional).</small>
			<br><br></td></tr>
			
			<tr><td width="20%">
				<!-- Interests/Hobbies -->
				<label for="interests">Interests/Hobbies:</label>
			</td><td width="80%">
				<input type="text" id="interests" name="interests" value="<?php echo isset($_SESSION['form_data']['interests']) ? $_SESSION['form_data']['interests'] : ''; ?>">
				<small>List your interests and hobbies (optional).</small>
			<br><br></td></tr>
			
			<tr><td width="20%">
				<!-- Contact Number -->
				<label for="interests">Contact Number:</label>
			</td><td width="80%">
				<input type="text" id="contact" name="contact" value="<?php echo isset($_SESSION['form_data']['contact']) ? $_SESSION['form_data']['contact'] : ''; ?>">
				<small>Enter your contact number here (optional).</small>
			<br><br></td></tr>
			
			<tr><td width="20%">
				<!-- Bio/About Me -->
				<label for="bio">Bio/About Me:</label>
			</td><td width="80%">
				<small>Write a brief description about yourself (optional).</small>
				<textarea id="bio" name="bio"><?php echo isset($_SESSION['form_data']['bio']) ? $_SESSION['form_data']['bio'] : ''; ?></textarea>
			<br><br></td></tr>
			</table>
				<!-- Terms of Service and Privacy Policy Agreement -->
				<input type="checkbox" id="terms_agreement" name="terms_agreement" value="true" required>
				<label for="terms_agreement">I agree to the <a href="/terms" target="_blank">Terms of Service</a> and <a href="/privacy" target="_blank">Privacy Policy</a>.</label>
				<br><br>

				<!-- Submit Button -->
				<input type="submit" name="submit" value="Register">
			</form>
			<br>

		</div>
	</div>
	
	<div class="bfooter">
		<h3>JoinYou</h3>
		<br>
		©<?php echo date('Y'); ?>
		<br>
		All rights reserved.
	</div>

</body>
</html>