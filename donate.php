<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HOPE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">
    <style media="screen">
      body{
        background: url('bg.jpg') no-repeat center;
        background-size: cover;
        min-height: 1000px;
        text-align: center;
      }

      .login-modal h2{
        color: white;
      }
    </style>
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hope";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$donations=array("blood" => "Blood", "eye" => "Eye", "kidney" => "Kidney", "limb" => "Limb", "heart" => "Heart", "hair" => "Hair");

$name=$_POST['name'];
$dc=$_POST['dc'];
$age=$_POST['age'];
$gender=$_POST['gender'];

$sql = "INSERT INTO donate (Name, Donation, Age, Gender)
VALUES ('".$name."', '".$donations[$dc]."', '".$age."', '".$gender."')";

if ($conn->query($sql) === TRUE) {
    echo '<div class="login-modal" id="modal-login">';
    echo "<h2>You have registered for donation successfully!</h2>";
    echo "</div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</div>
<script src="core.js" type="text/javascript"></script>
</body>
</html>
