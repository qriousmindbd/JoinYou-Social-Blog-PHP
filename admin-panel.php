<?php
require_once("processors/logincheck.php");
require("processors/dbconnect.php");
require_once 'processors/db_functions.php';

$usersid = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel | JoinYou</title>
  <link rel="stylesheet" type="text/css" href="stylesheet/logged_styles.css">
  <link rel="stylesheet" type="text/css" href="stylesheet/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php require_once("logd_header.php"); ?>

    <form action="" method="post">
    <div class="profile-content">

        <div class="profile-content-left">