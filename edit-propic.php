<?php
  require("processors/dbconnect.php");
  require_once("processors/logincheck.php");
  require_once 'processors/db_functions.php';

  $usersid = $_SESSION['user_id'];

  // Store user profile info in session data
  $user_info = fetchDataByUserId('user_info', "user_id = $usersid");
  $profile_info = fetchDataByUserId('user_profile_info', "user_id = $usersid");
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Profile Picture | JoinYou</title>
<link rel="stylesheet" type="text/css" href="stylesheet/logged_styles.css">
<link rel="stylesheet" type="text/css" href="stylesheet/styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <?php require_once("logd_header.php"); ?>

  <div class="content900">
    
    <h1>Upload Your Profile Picture</h1>
    
    <?php
    // Fetch users current profile picture
    $userData = fetchDataByUserId('user_info', "user_id = $usersid");
    $currentProfilePicPath = $userData['propic'];

    // Handle the form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_FILES['propic']) && $_FILES['propic']['error'] === UPLOAD_ERR_OK) {
        $ext= explode(".",$_FILES['propic']['name']);
        $c=count($ext);
        $ext=$ext[$c-1];
        $date=date("D:M:Y");
        $time=date("h:i:s");
        $image_name=md5($date.$time.$usersid);
        $imageloc=$image_name.".".$ext;

        if($imageloc != null){
            move_uploaded_file($_FILES['propic']['tmp_name'],"userimages/$imageloc");
            $imageloc = "/JoinYou/userimages/$imageloc";
        } else {
            $imageloc = '/JoinYou/userimages/avatar.jpg'; // Default image if no profile picture is uploaded
        }

        $ppup_query = "UPDATE user_info SET propic = '$imageloc' WHERE user_id = $usersid";
        if(mysqli_query($con, $ppup_query)) {
          echo '<div class="notify_infook">
          <img src="images/info.png" width="16px" height="16px">
          Profile picture uploaded and updated successfully!
        </div>';
        }
      }
    }
    ?>

    <img class="profile-pic" src="<?php echo $currentProfilePicPath; ?>" alt="Current Profile Picture">

    <div class="uploadp">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <label for="propic">Choose a profile picture (JPEG or PNG):</label>
        <input type="file" name="propic" id="propic" accept=".jpg, .jpeg, .png" required>
        <input type="submit" value="Upload">
    </form>
    </div>
  </div>

  <?php require_once("logd_footer.php"); ?>
</body>
</html>