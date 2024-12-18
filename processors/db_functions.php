<?php
// Include the database configuration
include 'dbconnect.php';

// Function to fetch all column data from any table
function fetchDataByUserId($table, $condition = '', $selectiveColumns = '*') {
    global $con;

    // Prepare the SQL statement with selective columns and condition
    $sql = "SELECT $selectiveColumns FROM $table";
    if (!empty($condition)) {
        $sql .= " WHERE $condition";
    }

    $stmt = $con->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        if ($selectiveColumns === '*') {
            // Fetch a single row if all columns are selected
            $data = $result->fetch_assoc();
        } else {
            // Fetch all rows if specific columns are selected
            $data = $result->fetch_all(MYSQLI_ASSOC);
        }
        $stmt->close();
        return $data;
    } else {
        $stmt->close();
        return false;
    }
}


// Calculate Age using date of birth
function calculateAge($dateOfBirth) {
    $birthDate = new DateTime($dateOfBirth);
    $currentDate = new DateTime();
    // Calculate the difference in years
    $age = $currentDate->diff($birthDate)->y;

    return $age;
}




// Generating friendship button
function generateFriendshipButton($id1, $id2) {
    // Check if there is a pending friend request from id1 to id2
    $requestExists = checkFriendRequest($id1, $id2);

    // Check if there is an accepted friendship between id1 and id2
    $friendshipExists = checkFriendship($id1, $id2);

    if ($friendshipExists) {
        // If there is an accepted friendship
        return '<span class="view-clk-btn"><i class="fa fa-check" aria-hidden="true"></i> Friends </span>';
    } elseif ($requestExists) {
        // If there is a pending friend request from id1 to id2
        return '<span class="view-clk-btn"><i class="fa fa-user-check" aria-hidden="true"></i> Requested</span>';
    } elseif (isRequested($id1, $id2)) {
        // If there is a pending friend request from id2 to id1
        return '<a href="processors/accept_friend_request.php?request_id=' . $id2 . '"><span class="add-btn">Accept Request</span></a>
                <a href="processors/reject_friend_request.php?request_id=' . $id2 . '"><span class="reject-btn">Reject</span></a>';
    } else {
        // If there is no existing relationship or request
        return '<a href="processors/send_friend_request.php?recipient_id=' . $id2 . '"><span class="add-btn"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Friend</span></a>';
    }
}
// Check if there is a pending friend request from id1 to id2
function checkFriendRequest($id1, $id2) {
    global $con;

    // Perform a database query to check for a pending friend request
    $sql = "SELECT * FROM friend_request WHERE sender_id = ? AND recipient_id = ? AND status = 'pending'";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $id1, $id2);
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->num_rows > 0;
}
// Check if there is an accepted friendship between id1 and id2
function checkFriendship($id1, $id2) {
    global $con;

    // Perform a database query to check for an accepted friendship
    $sql = "SELECT * FROM friendship WHERE (first_user_id = ? AND second_user_id = ? OR first_user_id = ? AND second_user_id = ?) AND status = 'accepted'";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iiii", $id1, $id2, $id2, $id1);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0;
}
// Check if there is a pending friend request from id2 to id1
function isRequested($id1, $id2) {
    global $con;

    // Perform a database query to check for a pending friend request from id2 to id1
    $sql = "SELECT * FROM friend_request WHERE sender_id = ? AND recipient_id = ? AND status = 'pending'";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $id2, $id1);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0;
}

?>