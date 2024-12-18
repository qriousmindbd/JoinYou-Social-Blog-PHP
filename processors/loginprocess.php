<?php
session_start();
require_once("dbconnect.php");

if (isset($_POST['submit'])) {
    $email_or_username = $_POST['email_or_username'];
    $password = $_POST['password'];

    // Retrieve user record from the database based on email/username
    $query = "SELECT user_id, email, pass, name FROM user_info WHERE email = '$email_or_username' OR username = '$email_or_username'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['pass'];

        // Verify the password
        if (password_verify($password, $stored_password)) {
            // Password is correct. User is authenticated.

            // Set the user ID for further use in the application.
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['name'];

            // Set userlogin true
            $_SESSION['logged_in'] = true;

            // Redirect the user to a logged-in area or dashboard.
            header("Location: /JoinYou/my_profile.php");
            exit();
        } else {
            // Password is incorrect. Show an error message.
            echo '<div class="notify_info">
					<img src="images/info.png" width="16px" height="16px">
					Password is incorrect! Try again...
				</div>';
        }
    } else {
        // User not found. Show an error message.
        echo '<div class="notify_info">
				<img src="images/info.png" width="16px" height="16px">
				Account not found! Please check your Email or Username again
			</div>';
    }
	
	$_SESSION['loginname'] = $email_or_username;
}
?>