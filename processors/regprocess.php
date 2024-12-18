<?php
session_start();
require_once("dbconnect.php");

if (isset($_POST['submit'])) {
    // Check if required fields are set
    if (
        isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) &&
        isset($_POST['dob']) && isset($_POST['username']) && isset($_POST['terms_agreement'])
    ) {
        // Data from POST request
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $repass = $_POST['confirm_password'];
        $dob = $_POST['dob'];
        $username = strtolower($_POST['username']);
        $gen = isset($_POST['gender']) ? $_POST['gender'] : '';
        $country = isset($_POST['country']) ? $_POST['country'] : '';
        $interests = isset($_POST['interests']) ? $_POST['interests'] : '';
        $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
        $bio = isset($_POST['bio']) ? $_POST['bio'] : '';

        // Validate required fields
        if (empty($name) || empty($email) || empty($pass) || empty($repass) || empty($dob) || empty($username)) {
            echo '<div class="notify_info">
						<img src="images/info.png" width="16px" height="16px">
						Please fill in all required fields!
					</div>';
        } else {
            // Check password and confirm_password match
            if ($pass !== $repass) {
                echo '<div class="notify_info">
						<img src="images/info.png" width="16px" height="16px">
						Password and Confirm Password do not match!
					</div>';
            } else {
                // Check if the email already exists in the database
                $query_check_email = "SELECT * FROM user_info WHERE email = '$email'";
                $result_check_email = mysqli_query($con, $query_check_email);
				// Check if the username already exists in the database
                $query_check_usrname = "SELECT * FROM user_info WHERE username = '$username'";
                $result_check_usrname = mysqli_query($con, $query_check_usrname);
				
                // Email and username duplicate value check
                if (mysqli_num_rows($result_check_email) > 0) {
                    echo '<div class="notify_info">
						<img src="images/info.png" width="16px" height="16px">
						An account with this Email already exists!
					</div>';
                } else if (mysqli_num_rows($result_check_usrname) > 0) {
                    echo '<div class="notify_info">
						<img src="images/info.png" width="16px" height="16px">
						An account with this Username already exists. Please use a different Username!
					</div>';
                } else {
                    // Hashing password
                    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

                    // Image upload code
                    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                        $ext= explode(".",$_FILES['photo']['name']);
                        $c=count($ext);
                        $ext=$ext[$c-1];
                        $date=date("D:M:Y");
                        $time=date("h:i:s");
                        $image_name=md5($date.$time.$name);
                        $imageloc=$image_name.".".$ext;

                        if($imageloc != null){
                            move_uploaded_file($_FILES['photo']['tmp_name'],"userimages/$imageloc");
                            $imageloc = "/JoinYou/userimages/$imageloc";
                        } else {
                            $imageloc = '/JoinYou/images/avatar.jpg'; // Default image if no profile picture is uploaded
                        }
                    }

                    global $imageloc;
                    // Inserting user data to database system
                    $UserInfoQuery = "INSERT INTO user_info
                        (name,email,pass,propic,dob,gender,interests,bio,contact,username)
                        VALUES('$name','$email','$hashedPassword','$imageloc','$dob','$gen','$interests','$bio','$contact','$username');
                    ";
                    mysqli_query($con, $UserInfoQuery);

                    $userid = mysqli_insert_id($con); // fetch last auto inserted userid
                    $UserProfileQuery = "INSERT INTO user_profile_info (user_id, country, join_date) VALUES ($userid, '$country', NOW())";
                    if (mysqli_query($con, $UserProfileQuery)) {
                        echo '<div class="notify_info">
						<img src="images/info.png" width="16px" height="16px">
						Registration data saved successfully!<br>
						Redirecting to Login Page...
					</div>';
						header("Location: login.php?reg=success");
						exit();
                    } else {
                        echo '<div class="notify_info">
						<img src="images/info.png" width="16px" height="16px">
						Server Failure!
					</div>';
                    }
                }
            }
        }
    } else {
        echo '<p style="color: red">There was a problem with the submission process. Please try again!</p>';
    }
	$_SESSION['form_data'] = $_POST;
}
?>
