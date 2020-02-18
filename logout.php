<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HOPE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">
  </head>
  <body>

<div class="navbar" id="myTopNav">
    <a href="apply.html" class="auth">Sign Up</a>
    <a href="login.html" class="auth">Login</a>
    <a href="index.html">HOME</a>
    <a href="about.html">ABOUT</a>
    <a href="contact.html">CONTACT US</a>
</div>

<?php
session_start();
session_unset();
session_destroy();
header('location:index.html');
?>

</body>
</html>
