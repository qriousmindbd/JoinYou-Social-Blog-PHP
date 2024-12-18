<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['post_content'])) {
    // The post content from the form
    $postContent = $_POST['post_content'];
    // Assuming you have a user session, retrieve the user's ID
    $userId = $_SESSION['user_id'];

    // Inserting the post into the user_posts table
    $sql = 'INSERT INTO user_posts (user_id, post_content, likes_count) VALUES ('.$userId.', "'.$postContent.'" , 0)';
    $result = mysqli_query($con, $sql);

    if($result) {
        echo '<div class="notify_infook">
					<img src="images/correctsign.png" width="16px" height="16px">
					Your post has been published!
				</div>';
    } else {
        echo '<div class="notify_info">
					Please write something in the post box..
				</div>';
    }
}