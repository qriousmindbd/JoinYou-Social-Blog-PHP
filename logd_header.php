<?php
$current_page = $_SERVER['PHP_SELF'];
$page_name = basename($current_page);
?>
  
  <div class="nav-header">
    <a href="my_profile.php" title="My Profile"><div class="<?php if($page_name === 'my_profile.php'){echo 'nav-btn-selected';} else{echo 'nav-btn';} ?>"><i class="fa fa-user-circle"></i><br><?php echo $_SESSION['user_name']; ?></div></a>
    <a href="#" title="Feeds"><div class="nav-btn"><i class="fa fa-newspaper-o"></i><br>Feeds</div></a>
    <a href="friends_list.php" title="Friends"><div class="<?php if($page_name === 'friends_list.php'){echo 'nav-btn-selected';} else{echo 'nav-btn';} ?>"><i class="fa fa-users"></i><br>Friends</div></a>
    <a href="friends_list.php" title="Notifications"><div class="nav-btn"><i class="fa fa-search"></i><br>Search</div></a>
    <a href="#" title="Menu"><div class="nav-btn"><i class="fa fa-bars"></i><br>Menu</div></a>
  </div>
  <div class="head-margin-top"></div>