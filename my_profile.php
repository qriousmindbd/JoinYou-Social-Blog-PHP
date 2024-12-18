<?php
  require("processors/dbconnect.php");
  require_once("processors/logincheck.php");
  require_once 'processors/db_functions.php';

  $usersid = $_SESSION['user_id'];

  // Fetch user profile info in profile page
  $user_info = fetchDataByUserId('user_info', "user_id = $usersid");
  $profile_info = fetchDataByUserId('user_profile_info', "user_id = $usersid");

  if (isset($_POST['postsubmit'])) {

  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Profile | JoinYou</title>
  <link rel="stylesheet" type="text/css" href="stylesheet/logged_styles.css">
  <link rel="stylesheet" type="text/css" href="stylesheet/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php require_once("logd_header.php"); ?>

  <header class="bgwhite">
  <div class="profile-header">
    <div class="cover-photo">
      <a href="edit-cover-photo.php">
        <div class="caption">✎ Edit cover</div>
      </a>
    </div>
    <div class="profile-action-area">
      <div class="action-info">
        <div class="profile-picture">
          <img src="<?php if ($user_info !== false) echo $user_info['propic'] ?>" alt="Profile Picture">
          <a href="edit-propic.php">
            <div class="overlay">
              <span class="edit-icon">✎</span>
            </div>
          </a>
        </div>
        <div class="basics">
            <h1 class="profile-name"><?php if ($user_info !== false) echo $user_info['name']; ?></h1><span class="view-clk-btn">Owner</span>
            <div class="bio-text">
              <p><?php if ($user_info !== false) echo $user_info['bio'] ?></p>
            </div>
        </div>
  	  </div>
      <div class="action-buttons">
        <a href="edit-prof.php"><span class="add-btn">✎ Edit Profile </span></a>
      </div>
    </div>
  </div>
  </header>

  <main class="profile-content">
    <div class="profile-content-left">
      <div class="profile-info">
        <div class="heading">
          <div class="heading-text"> ABOUT INFO </div>
          <div class="heading-line"></div>
        </div>

        <div class="content-block">
          <div class="content-block-head">
            <b>Personal Information</b>
          </div>
          <div class="content-block-body">
          <div class="content-block-elem"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i><b> Lives in</b> <?php if ($profile_info !== false && isset($profile_info['country'])) echo $profile_info['country'] ?></div>
          <div class="content-block-elem"><i class="fa fa-phone fa-lg" aria-hidden="true"></i><b> Contact : </b><?php if ($user_info !== false) echo $user_info['contact'] ?></div>
          <div class="content-block-elem"><i class="fa fa-wpexplorer fa-lg" aria-hidden="true"></i><b> Interests : </b><?php if ($user_info !== false) echo $user_info['interests'] ?></div>
          <div class="content-block-elem"><i class="fa fa-id-badge fa-lg" aria-hidden="true"></i><b> Gender : </b><?php if ($user_info !== false) echo $user_info['gender'] ?></div>
          <div class="content-block-elem"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i><b> Age : </b><?php if ($user_info !== false) echo calculateAge($user_info['dob']).' years old' ?></div>
          </div>
        </div>
      </div>
    </div>

    <div class="profile-content-right">
      <?php require_once("processors/submit_post.php"); ?>
      <div class="heading">
        <div class="heading-text"> CREATE A NEW POST </div>
        <div class="heading-line"></div>
      </div>
      
      <form action="" method="POST">
        <div class="new-post-blk">
          <div class="file-upload">
            <label for="file-input" class="file-label">
              <i class="fa fa-camera-retro fa-4x"></i><br>Upload Photo
            </label>
            <input type="file" id="file-input" class="file-input">
          </div>
          <div class="post-txt-box">
            <textarea name="post_content" id="post-content" placeholder="What's on your mind?" required></textarea>
          </div>
          <div class="post-btn">
            <input class="sub-btn" type="submit" name="postsubmit" value="Post">
          </div>
        </div>
      </form>

      <!-- Heading (styled) -->
      <div class="heading">
        <div class="heading-text"> POSTS </div>
        <div class="heading-line"></div>
      </div>
      
      <div class="profile-posts">
        <div class="post-heading">
          <div class="post-author-img">
            <img src="<?php if ($user_info !== false) echo $user_info['propic'] ?>" alt="Author">
          </div>
          <div class="post-author-details">
            <span class="post-author-name"><?php if ($user_info !== false) echo $user_info['name'] ?></span>
            <span class="post-author-time"><small>14th August, 2023 at 2:01 AM</small></span>
          </div>
          <div class="post-buttons">
            <button class="edit-button"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
            <button class="delete-button"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
          </div>
        </div>
        <div class="post-body">
          <p class="post-text"></p>
          <div class="images">
            <img src="image1.jpg" alt="Image 1">
            <img src="image2.jpg" alt="Image 2">
          </div>
          <div class="post-reaction">
            <span class="post-react-btn"><i class="fa fa-heart-o" aria-hidden="true"></i> Like</span>
            <span class="post-react-btn"><i class="fa fa-eye" aria-hidden="true"></i> Views (0)</span>
            <span class="post-react-btn"><i class="fa fa-share-alt" aria-hidden="true"></i> Share</span>
          </div>
        </div>
      </div>
    </div>
    
  </main>

  <?php require_once("logd_footer.php"); ?>
</body>
</html>