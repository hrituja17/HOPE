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
        min-height: 600px;
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

    $name=$_POST['name'];
    $pwd=$_POST['pwd'];

    $query = "SELECT Name,Password from signup where Name='$name' and Password='$pwd'";

    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
      session_start();
      $_SESSION['hope']='true';
      header('location:loggedin.html');
    }
    else{
      echo "<div style='margin-top:300px'></div>";
      echo "<h2 style='color:black; text-align:center;'>Wrong Name or Password</h2>";
      echo "<div style='text-align:center; padding: 100px 0 0 0;'>";
      echo "<h3><a href='login.html' style='text-decoration:none; background-color:red; padding:20px; color:white;'>Try Again</a></h3>";
      echo "</div>";
    }

    ?>
    <script src="core.js" type="text/javascript"></script>
    </body>
    </html>
