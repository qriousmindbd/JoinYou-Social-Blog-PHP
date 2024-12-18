<?php
require_once("logincheck.php");
require("dbconnect.php");

// Get the recipient's ID from the URL
$recipient_id = $_GET['recipient_id'];
$sender_id = $_SESSION['user_id'];

// Insert the friend request into the database
$sql = "INSERT INTO friend_request (sender_id, recipient_id, status) VALUES ('$sender_id', '$recipient_id', 'pending')";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Location: ../view_profile.php?user_id=$recipient_id&frreqsend=true");
} else {
    echo '<div class="notify_info">
			<img src="images/info.png" width="16px" height="16px">
			Error sending friend request!
		</div>';
}
?>