<?php
require_once("logincheck.php");
require("dbconnect.php");

// Get the recipient's ID from the URL
$sender_id = $_GET['request_id'];
$recipient_id = $_SESSION['user_id'];
// Update the friend_request table to mark the request as accepted
$update_query = "UPDATE friend_request SET status = 'rejected' WHERE sender_id = $sender_id AND recipient_id = $recipient_id";
$result1 = mysqli_query($con, $update_query);

// Swaping ids for sort-adding in friendship table
$user1 = $sender_id;
$user2 = $recipient_id;
if($user1 > $user2) {
    $temp = $user1;
    $user1 = $user2;
    $user2 = $temp;
}
// Insert a friendship record into the friendship table
$update_query2 = "UPDATE friendship SET status = 'rejected' WHERE first_user_id = $user1 AND second_user_id = $user2";
$result2 = mysqli_query($con, $update_query2);

if ($result1 && $result2) {
    header("Location: ../view_profile.php?user_id=$recipient_id&frreqacptd=false");
} else {
    echo '<div class="notify_info">
			<img src="images/info.png" width="16px" height="16px">
			Error rejecting friend request!
		</div>';
}
?>