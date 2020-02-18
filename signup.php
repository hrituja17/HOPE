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

$count=0;

$name_error = $email_error = $pwd_error = $rpwd_error = $contact_error = "";
$name = $email = $pwd = $rpwd = $contact= "";

//$name=$_POST['name'];
//$pwd=$_POST['pwd'];
//$rpwd=$_POST['rpwd'];
//$email=$_POST['email'];
//$contact=$_POST['contact'];

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (empty($_POST["name"])) {
    $name_error = "Name is required";
    $count++;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $count++;
      $name_error = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
  $email_error = "Email is required";
  $count++;
} else {
  $email = test_input($_POST["email"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $count++;
    $email_error = "Invalid email format";
  }
}

if (empty($_POST["contact"])) {
    $contact_error = "Phone number is required";
    $count++;
  } else {
    $contact = test_input($_POST["contact"]);
    if (!preg_match("/^[0-9]{10}$/",$contact)){
      $count++;
      $contact_error = "Invalid phone number";
    }
  }

  if (empty($_POST["pwd"])) {
    $pwd_error = "Password is required";
    $count++;
  } else {
    $pwd = test_input($_POST["pwd"]);
    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/',$pwd)){
      $count++;
      $pwd_error = "Invalid password. The password must contain alphabets(both lowercase and uppercase), digits and special characters, and should be of mininmum length 8";
    }
  }

 $rpwd = test_input($_POST["rpwd"]);
if ($pwd!=$rpwd){
    $rpwd_error = "The passwords do not match. Please check and re-enter.";
    $count++;
}
    if ($count == 0)
    {
      $sql = "INSERT INTO signup (Name, Password, Repassword, Email, Contact)
      VALUES ('".$name."', '".$pwd."', '".$rpwd."', '".$email."', '".$contact."')";

      if ($conn->query($sql) === TRUE) {
          echo '<div class="login-modal" id="modal-login">';
          echo "<h2>You have signed up successfully</h2>";
          echo "</div>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
} else {
  echo "<h1 style='color:white;'>SORRY THE FORM COULD NOT BE SUBMITTED...INVALID DATA!</h2>";
  echo "<h2 style='color: white'>$name_error</h2><br>";
  echo "<h2 style='color: white'>$email_error</h2><br>";
  echo "<h2 style='color: white'>$pwd_error</h2><br>";
  echo "<h2 style='color: white'>$rpwd_error</h2><br>";
  echo "<h2 style='color: white'>$contact_error</h2><br>";
}

$conn->close();
?>
</div>
<script src="core.js" type="text/javascript"></script>
</body>
</html>
