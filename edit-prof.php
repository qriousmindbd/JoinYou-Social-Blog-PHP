<?php
  require("processors/dbconnect.php");
  require_once("processors/logincheck.php");
  require_once("processors/db_functions.php");

  $userId = $_SESSION['user_id'];

  // Fetch user's existing personal information
  $user_info = fetchDataByUserId('user_info', "user_id = $userId");
  $profile_info = fetchDataByUserId('user_profile_info', "user_id = $userId");

  // Check if the form is submitted for updating information
  if (isset($_POST['update_profile'])) {
    // Retrieve and sanitize updated personal information from the form
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $interests = mysqli_real_escape_string($con, $_POST['interests']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);

    // Update the user's personal information in the database
    $updateUserQuery = "UPDATE user_info SET contact = '$contact', interests = '$interests', gender = '$gender', dob = '$dob' WHERE user_id = $userId";
    $result = mysqli_query($con, $updateUserQuery);

    // Update the country information in the user_profile_info table
    $updateCountryQuery = "UPDATE user_profile_info SET country = '$country' WHERE user_id = $userId";
    $resultCountry = mysqli_query($con, $updateCountryQuery);

    if ($result && $resultCountry) {
      // Redirect to the profile page after successful update
      header("Location: my_profile.php");
      exit();
    } else {
      $error_message = "Error updating profile. Please try again.";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile | JoinYou</title>
  <link rel="stylesheet" type="text/css" href="stylesheet/logged_styles.css">
  <link rel="stylesheet" type="text/css" href="stylesheet/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>/* Apply styles to the form container */
form {
  max-width: 500px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style labels */
label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
}

/* Style text input fields */
input[type="text"],
input[type="date"],
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* Style submit button */
input[type="submit"] {
  background-color: #007BFF;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.3s;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}</style>
</head>
<body>
<?php require_once("logd_header.php"); ?>



<form action="" method="POST">
  <h1> Edit Profile Information </h1><br>
  <!-- Personal Information Fields -->
  <label for="country">Country:</label>
  <select name="country" id="country">
    <option value="Afghanistan" <?php if ($profile_info['country'] == "Afganistan") echo "selected"; ?>>Afghanistan</option>
    <option value="Albania" <?php if ($profile_info['country'] == "Albania") echo "selected"; ?>>Albania</option>
    <option value="Algeria" <?php if ($profile_info['country'] == "Algeria") echo "selected"; ?>>Algeria</option>
    <option value="Argentina" <?php if ($profile_info['country'] == "Argentina") echo "selected"; ?>>Argentina</option>
    <option value="Australia" <?php if ($profile_info['country'] == "Australia") echo "selected"; ?>>Australia</option>
    <option value="Austria" <?php if ($profile_info['country'] == "Austria") echo "selected"; ?>>Austria</option>
    <option value="Bangladesh" <?php if ($profile_info['country'] == "Bangladesh") echo "selected"; ?>>Bangladesh</option>
    <option value="Belgium" <?php if ($profile_info['country'] == "Belgium") echo "selected"; ?>>Belgium</option>
    <option value="Brazil" <?php if ($profile_info['country'] == "Brazil") echo "selected"; ?>>Brazil</option>
    <option value="Canada" <?php if ($profile_info['country'] == "Canada") echo "selected"; ?>>Canada</option>
    <option value="China" <?php if ($profile_info['country'] == "China") echo "selected"; ?>>China</option>
    <option value="Colombia" <?php if ($profile_info['country'] == "Colombia") echo "selected"; ?>>Colombia</option>
    <option value="Czech Republic" <?php if ($profile_info['country'] == "Czech Republic") echo "selected"; ?>>Czech Republic</option>
    <option value="Egypt" <?php if ($profile_info['country'] == "Egypt") echo "selected"; ?>>Egypt</option>
    <option value="France" <?php if ($profile_info['country'] == "France") echo "selected"; ?>>France</option>
    <option value="Germany" <?php if ($profile_info['country'] == "Germany") echo "selected"; ?>>Germany</option>
    <option value="Greece" <?php if ($profile_info['country'] == "Greece") echo "selected"; ?>>Greece</option>
    <option value="India" <?php if ($profile_info['country'] == "India") echo "selected"; ?>>India</option>
    <option value="Indonesia" <?php if ($profile_info['country'] == "Indonesia") echo "selected"; ?>>Indonesia</option>
    <option value="Italy" <?php if ($profile_info['country'] == "Italy") echo "selected"; ?>>Italy</option>
    <option value="Japan" <?php if ($profile_info['country'] == "Japan") echo "selected"; ?>>Japan</option>
    <option value="Kenya" <?php if ($profile_info['country'] == "Kenya") echo "selected"; ?>>Kenya</option>
    <option value="Malaysia" <?php if ($profile_info['country'] == "Malaysia") echo "selected"; ?>>Malaysia</option>
    <option value="Mexico" <?php if ($profile_info['country'] == "Mexico") echo "selected"; ?>>Mexico</option>
    <option value="Morocco" <?php if ($profile_info['country'] == "Morocco") echo "selected"; ?>>Morocco</option>
    <option value="Netherlands" <?php if ($profile_info['country'] == "Netherlands") echo "selected"; ?>>Netherlands</option>
    <option value="New Zealand" <?php if ($profile_info['country'] == "New Zealand") echo "selected"; ?>>New Zealand</option>
    <option value="Nigeria" <?php if ($profile_info['country'] == "Nigeria") echo "selected"; ?>>Nigeria</option>
    <option value="Norway" <?php if ($profile_info['country'] == "Norway") echo "selected"; ?>>Norway</option>
    <option value="Pakistan" <?php if ($profile_info['country'] == "Pakistan") echo "selected"; ?>>Pakistan</option>
    <option value="Philippines" <?php if ($profile_info['country'] == "Philippines") echo "selected"; ?>>Philippines</option>
    <option value="Poland" <?php if ($profile_info['country'] == "Poland") echo "selected"; ?>>Poland</option>
    <option value="Portugal" <?php if ($profile_info['country'] == "Portugal") echo "selected"; ?>>Portugal</option>
    <option value="Romania" <?php if ($profile_info['country'] == "Romania") echo "selected"; ?>>Romania</option>
    <option value="Russia" <?php if ($profile_info['country'] == "Russia") echo "selected"; ?>>Russia</option>
    <option value="Saudi Arabia" <?php if ($profile_info['country'] == "Saudi Arabia") echo "selected"; ?>>Saudi Arabia</option>
    <option value="South Africa" <?php if ($profile_info['country'] == "South Africa") echo "selected"; ?>>South Africa</option>
    <option value="South Korea" <?php if ($profile_info['country'] == "South Korea") echo "selected"; ?>>South Korea</option>
    <option value="Spain" <?php if ($profile_info['country'] == "Spain") echo "selected"; ?>>Spain</option>
    <option value="Sweden" <?php if ($profile_info['country'] == "Sweden") echo "selected"; ?>>Sweden</option>
    <option value="Switzerland" <?php if ($profile_info['country'] == "Switzerland") echo "selected"; ?>>Switzerland</option>
    <option value="Thailand" <?php if ($profile_info['country'] == "Thailand") echo "selected"; ?>>Thailand</option>
    <option value="Turkey" <?php if ($profile_info['country'] == "Turkey") echo "selected"; ?>>Turkey</option>
    <option value="United Arab Emirates" <?php if ($profile_info['country'] == "United Arab Emirates") echo "selected"; ?>>United Arab Emirates</option>
    <option value="United Kingdom" <?php if ($profile_info['country'] == "United Kingdom") echo "selected"; ?>>United Kingdom</option>
    <option value="United States" <?php if ($profile_info['country'] == "United States") echo "selected"; ?>>United States</option>
    <option value="Vietnam" <?php if ($profile_info['country'] == "Vietnam") echo "selected"; ?>>Vietnam</option>
  </select>

  <label for="contact">Contact:</label>
  <input type="text" id="contact" name="contact" value="<?php echo $user_info['contact']; ?>" required>

  <label for="interests">Interests:</label>
  <input type="text" id="interests" name="interests" value="<?php echo $user_info['interests']; ?>" required>

  <label for="gender">Gender:</label>
  <input type="text" id="gender" name="gender" value="<?php echo $user_info['gender']; ?>" required>

  <label for="dob">Date of Birth:</label>
  <input type="date" id="dob" name="dob" value="<?php echo $user_info['dob']; ?>" required>

  <input type="submit" name="update_profile" value="Update Profile">
</form>

<!-- Display error message if there was an error during update -->
<?php if (isset($error_message)) { ?>
  <p class="notify-red"><?php echo $error_message; ?></p>
<?php } ?>

<?php require_once("logd_footer.php"); ?>
</body>
</html>
