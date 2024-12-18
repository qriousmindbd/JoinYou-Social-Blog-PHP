<?php
  session_start();
  
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      // User is logged in, show home page content
  } else {
      // User is not logged in, redirect to login page or show appropriate message
      header("Location: login.php");
      exit();
  }
?>