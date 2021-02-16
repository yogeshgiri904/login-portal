<?php
  include "conn.php";
  $loginAlert= false;
  $userExists= false;
  if($_POST)
  {
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];


    $emailSql = "SELECT * FROM `login` WHERE `email` LIKE '$email'";
    $userSql = "SELECT * FROM `login` WHERE `username` LIKE '$username'";

    $emailMatchResult = mysqli_query($conn, $emailSql);
    $userMatchResult = mysqli_query($conn, $userSql);

    $emailCheck = mysqli_num_rows($emailMatchResult);
    $UserCheck = mysqli_num_rows($userMatchResult);
    if($emailCheck >= 1)
    {
      echo '<div class="alert alert-danger" role="alert">
      Your email is already registered. <a href="index.php">Sign In</a> now?
      </div>';
    }
    else if($UserCheck >= 1)
    {
      echo '<div class="alert alert-danger" role="alert">';
      echo "'$username'";
      echo ' username not available. </div>';
    }
    else
    {
      $sql = "INSERT INTO `login` (`username`, `mobile`, `pass`, `email`, `date`) VALUES ('$username', '$mobile', '$pass', '$email', current_timestamp());";
      $result = mysqli_query($conn, $sql);
      if($result)
      {
        echo '<div class="alert alert-success" role="alert">
        Your account has been created successfully. <a href="index.php">Sign In</a> now?
        </div>';
        $loginAlert= true;
      }
    }

  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prabandhan - Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">

    <style>
        .login__form {
            position: absolute;
            top: 10%;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 1.5rem 2.5rem;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="cont">
  <div class="demo">
    <div class="login">
      <div class="login__form">
        <form method="POST">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" name="username" class="login__input name" placeholder="Username"/>
        </div>

        <div class="login__row">
            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
              <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
            </svg>
            <input type="text" name="email" class="login__input name" placeholder="Email"/>
        </div>

        <div class="login__row">
        <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
        </svg>
        <input type="text" name="mobile" class="login__input name" placeholder="Mobile"/>
        </div>

        <div class="login__row">
            <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
              <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
            </svg>
            <input type="password" name="pass" class="login__input pass" placeholder="Password"/>
        </div>

        <div class="login__row">
        <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
        </svg>
        <input type="password" name="cpass" class="login__input pass" placeholder="Confirm Password"/>
        </div>
        <input type="submit" name="submit" class="login__submit" value="Sign Up">
        <p class="login__signup">Already have an account? &nbsp;<a href="index.php">Sign In</a></p>
      </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>