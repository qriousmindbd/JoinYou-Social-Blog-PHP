<?php
require_once("logincheck.php");
require("dbconnect.php");

// Get the recipient's ID from the URL
$sender_id = $_GET['request_id'];
$recipient_id = $_SESSION['user_id'];
// Update the friend_request table to mark the request as accepted
$update_query = "UPDATE friend_request SET status = 'accepted' WHERE sender_id = $sender_id AND recipient_id = $recipient_id";
$result1 = mysqli_query($con, $update_query);

$user1 = $sender_id;
$user2 = $recipient_id;
if($user1 > $user2) {
    $temp = $user1;
    $user1 = $user2;
    $user2 = $temp;
}
// Insert a friendship record into the friendship table
$insert_query = "INSERT INTO friendship (first_user_id, second_user_id, status) VALUES ($user1, $user2, 'accepted')";
$result2 = mysqli_query($con, $insert_query);

if ($result1 && $result2) {
    header("Location: ../view_profile.php?user_id=$sender_id&frreqacptd=true");
} else {
    echo '<div class="notify_info">
			<img src="images/info.png" width="16px" height="16px">
			Error accepting friend request!
		</div>';
}
?>