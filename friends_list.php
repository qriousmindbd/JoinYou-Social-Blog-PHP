<?php
require_once("processors/logincheck.php");
require("processors/dbconnect.php");
require_once 'processors/db_functions.php';

((isset($_POST['s-country']))? $countryFilter = $_POST['s-country'] : $countryFilter = '');

$usersid = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Friends | JoinYou</title>
  <link rel="stylesheet" type="text/css" href="stylesheet/logged_styles.css">
  <link rel="stylesheet" type="text/css" href="stylesheet/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php require_once("logd_header.php"); ?>

    <form action="" method="post">
    <div class="profile-content">

        <div class="profile-content-left">
            <div class="search-container">
                <input type="text" class="search-input" name="searchkey" id="searchkey" placeholder="search user" value="<?php echo isset($_POST['searchkey']) ? $_POST['searchkey'] : ''; ?>">
                <button type="submit" class="search-button">
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <div class="heading">
                <div class="heading-text"> FILTER SEARCH </div>
                <div class="heading-line"></div>
            </div>
            <div class="filter-search">
                <select name="s-country" id="s-country">
                    <option value="">All Country</option>
                    <option value="Afghanistan"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Afghanistan') echo ' selected'; ?>>Afghanistan</option>
                    <option value="Albania"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Albania') echo ' selected'; ?>>Albania</option>
                    <option value="Algeria"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Algeria') echo ' selected'; ?>>Algeria</option>
                    <option value="Argentina"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Argentina') echo ' selected'; ?>>Argentina</option>
                    <option value="Australia"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Australia') echo ' selected'; ?>>Australia</option>
                    <option value="Austria"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Austria') echo ' selected'; ?>>Austria</option>
                    <option value="Bangladesh"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Bangladesh') echo ' selected'; ?>>Bangladesh</option>
                    <option value="Belgium"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Belgium') echo ' selected'; ?>>Belgium</option>
                    <option value="Brazil"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Brazil') echo ' selected'; ?>>Brazil</option>
                    <option value="Canada"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Canada') echo ' selected'; ?>>Canada</option>
                    <option value="China"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'China') echo ' selected'; ?>>China</option>
                    <option value="Colombia"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Colombia') echo ' selected'; ?>>Colombia</option>
                    <option value="Czech Republic"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Czech Republic') echo ' selected'; ?>>Czech Republic</option>
                    <option value="Egypt"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Egypt') echo ' selected'; ?>>Egypt</option>
                    <option value="France"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'France') echo ' selected'; ?>>France</option>
                    <option value="Germany"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Germany') echo ' selected'; ?>>Germany</option>
                    <option value="Greece"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Greece') echo ' selected'; ?>>Greece</option>
                    <option value="India"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'India') echo ' selected'; ?>>India</option>
                    <option value="Indonesia"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Indonesia') echo ' selected'; ?>>Indonesia</option>
                    <option value="Italy"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Italy') echo ' selected'; ?>>Italy</option>
                    <option value="Japan"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Japan') echo ' selected'; ?>>Japan</option>
                    <option value="Kenya"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Kenya') echo ' selected'; ?>>Kenya</option>
                    <option value="Malaysia"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Malaysia') echo ' selected'; ?>>Malaysia</option>
                    <option value="Mexico"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Mexico') echo ' selected'; ?>>Mexico</option>
                    <option value="Morocco"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Morocco') echo ' selected'; ?>>Morocco</option>
                    <option value="Netherlands"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Netherlands') echo ' selected'; ?>>Netherlands</option>
                    <option value="New Zealand"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'New Zealand') echo ' selected'; ?>>New Zealand</option>
                    <option value="Nigeria"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Nigeria') echo ' selected'; ?>>Nigeria</option>
                    <option value="Norway"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Norway') echo ' selected'; ?>>Norway</option>
                    <option value="Pakistan"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Pakistan') echo ' selected'; ?>>Pakistan</option>
                    <option value="Philippines"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Philippines') echo ' selected'; ?>>Philippines</option>
                    <option value="Poland"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Poland') echo ' selected'; ?>>Poland</option>
                    <option value="Portugal"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Portugal') echo ' selected'; ?>>Portugal</option>
                    <option value="Romania"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Romania') echo ' selected'; ?>>Romania</option>
                    <option value="Russia"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Russia') echo ' selected'; ?>>Russia</option>
                    <option value="Saudi Arabia"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Saudi Arabia') echo ' selected'; ?>>Saudi Arabia</option>
                    <option value="South Africa"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'South Africa') echo ' selected'; ?>>South Africa</option>
                    <option value="South Korea"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'South Korea') echo ' selected'; ?>>South Korea</option>
                    <option value="Spain"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Spain') echo ' selected'; ?>>Spain</option>
                    <option value="Sweden"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Sweden') echo ' selected'; ?>>Sweden</option>
                    <option value="Switzerland"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Switzerland') echo ' selected'; ?>>Switzerland</option>
                    <option value="Thailand"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Thailand') echo ' selected'; ?>>Thailand</option>
                    <option value="Turkey"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Turkey') echo ' selected'; ?>>Turkey</option>
                    <option value="United Arab Emirates"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'United Arab Emirates') echo ' selected'; ?>>United Arab Emirates</option>
                    <option value="United Kingdom"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'United Kingdom') echo ' selected'; ?>>United Kingdom</option>
                    <option value="United States"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'United States') echo ' selected'; ?>>United States</option>
                    <option value="Vietnam"<?php if(isset($_POST['s-country']) && $_POST['s-country'] == 'Vietnam') echo ' selected'; ?>>Vietnam</option>
                </select>

                <button type="submit" name="filter">Filter</button>
            </div>
        </div>

        <div class="profile-content-right">
            <?php
            $freq_result = fetchDataByUserId("friend_request", "recipient_id = '$usersid' AND status = 'pending'", 'sender_id, recipient_id, status, date');

            if ($freq_result !== false) {
                $req_count = 0;
                foreach ($freq_result as $freq_row) $req_count++;

                echo '<div class="heading">
                    <div class="heading-text"> FRIEND REQUESTS (' . $req_count . ')</div>
                    <div class="heading-line"></div>
                </div>';
            
                // Loop through each friend request
                foreach ($freq_result as $freq_row) {
                    // Get the sender's ID for each friend request
                    $uid = $freq_row['sender_id'];
            
                    $result = fetchDataByUserId('user_info', "user_id = $uid");
                    $row = $result;
            
                    // Retrieve user's country from user_profile_info
                    $result2 = fetchDataByUserId('user_profile_info', "user_id = $uid");
                    $row2 = $result2;
            
                    echo '<div class="user-card">';
            
                    // User profile picture
                    echo '<div class="user-image">';
                    echo '<a href="view_profile.php?user_id=' . $row['user_id'] . '"><img src="' . $row['propic'] . '" alt="' . $row['name'] . '"></a>';
                    echo '</div>';
            
                    // User details
                    echo '<div class="user-details"><a href="view_profile.php?user_id=' . $row['user_id'] . '">';
                    echo '<p class="user-name">' . $row['name'] . '</p>';
                    echo '<p class="user-location">From ' . $row2['country'] . '</p>';
                    echo '</a></div>';
            
                    // Add Friend and View Profile buttons
                    echo '<div>';
                    if ($_SESSION['user_id'] != $row['user_id']) {
                        echo generateFriendshipButton($usersid, $row['user_id']) . '<br>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
            }            
            ?>

            <div class="heading">
                <div class="heading-text"> PEOPLE YOU MAY KNOW </div>
                <div class="heading-line"></div>
            </div>

            <?php

            if (isset($_POST['searchkey'])) {
                $search_condition = "LOWER(name) LIKE LOWER('%" . $_POST['searchkey'] . "%')";
            } else {
                $search_condition = '';
            }
            
            $result = fetchDataByUserId('user_info', $search_condition, 'user_id, name, propic');
            
            if ($result !== false) {
                $countUserRows = 0;
                foreach ($result as $row) {
                    // Get the user's ID
                    $uid = $row['user_id'];
            
                    // Retrieve user's country from user_profile_info
                    $result2 = fetchDataByUserId('user_profile_info', "user_id = $uid");
                    $row2 = $result2;
            
                    $user_country = $row2['country'];
            
                    if (!$countryFilter || $user_country == $countryFilter) {
                        // Count user rows to show not found message
                        $countUserRows += 1;
            
                        echo '<div class="user-card">';
            
                        // User profile picture
                        echo '<div class="user-image">';
                        echo '<a href="view_profile.php?user_id=' . $row['user_id'] . '"><img src="' . $row['propic'] . '" alt="' . $row['name'] . '"></a>';
                        echo '</div>';
            
                        // User details
                        echo '<div class="user-details"><a href="view_profile.php?user_id=' . $row['user_id'] . '">';
                        echo '<p class="user-name">' . $row['name'] . '</p>';
                        echo '<p class="user-location">From ' . $row2['country'] . '</p>';
                        echo '</a></div>';
            
                        // Add Friend
                        echo '<div>';
                        if ($_SESSION['user_id'] != $row['user_id']) {
                            echo generateFriendshipButton($usersid, $row['user_id']) . '<br>';
                        }
                        echo '</div>';
            
                        echo '</div>';
                    }
                }
            
                if (!$countUserRows) {
                    echo '<div class="notify_info">
                        <img src="images/info.png" width="16px" height="16px">
                        No user found!
                    </div>';
                }
            } else {
                echo '<div class="notify_info">
                    <img src="images/info.png" width="16px" height="16px">
                    No user found!
                </div>';
            }
            ?>
        </div>
    
    </div>
    </form>

    <?php require_once("logd_footer.php"); ?>
</body>
</html>