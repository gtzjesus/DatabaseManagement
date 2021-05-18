<?php

/**
 * CS 4342 Database Management
 * @author Jesus Gutierrez
 * @version 1.0
 * Description: The purpose of this file is to serve as simple login system that validates username and password.
 */

 /**
 * Php Section
 */

session_start();
require_once("config.php");
$_SESSION['logged_in'] = false;

if (!empty($_POST)){
  if (isset($_POST['Submit'])){
    $input_username = isset($_POST['username']) ? $_POST['username'] : " ";
    $input_password = isset($_POST['password']) ? $_POST['password'] : " ";
    $not_found = "User not found. Try again.";
    
    $queryStudent = "SELECT * FROM User  WHERE UUsername='".$input_username."' AND Password='".$input_password."';";
    $resultStudent = $conn->query($queryStudent);

    if ($resultStudent ->num_rows > 0  ) {
      //if there is a result, that means that the user was found in the database
      $_SESSION['student_user'] = $input_username; 
      $_SESSION['logged_in'] = true;
      header("Location: home.php");
    } else {
      echo "<p align=center>$not_found </p> ";
    }
  }
}
?>

<!-- 
  Html Section for Login Page
 -->

<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="css/styles.css"> 
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"> 
<title>User Sign In</title>
</head>
<body>
  <div class="login-grid">
    <h1>Sign In</h1>
    <br>
    <div id="menu">
      <form action="student_login.php" method="post"><input class="text-box" type="text" name="username" placeholder="Username"><input class="text-box" type="text" name="password" placeholder="Password">
      <input class="submit-button" name='Submit' type="submit" value="Sign in">
      </form>
    </div>
    <br>
    <h2>Or</h2>
    <a class="account-button" href="create_account.php">Create New Account</a>
    <a class="account-button" href="index.php">Back Home</a>
  </div>

</body>
</html>

<!-- 
  CSS Section for Login Page
 -->

<style>
  body {
    margin: 0;
    background: #FB9A49;
    color: #fff;
  }

  a {
    list-style: none;
    text-decoration: none;
    color: inherit;
  }

  .login-grid {
    position: fixed;
    top: 50%;
    left: 50%;
    /* bring your own prefixes */
    transform: translate(-50%, -50%);
    background: #05366B;
    padding: 5vh;
  }

  .login-grid h1 {
    text-align: center;
    font-size: 30px;
    letter-spacing: 1px;
    font-weight: 200;
    background-color: inherit;
  }

  .login-grid h2 {
    text-align: center;
    font-size: 15px;
    letter-spacing: 1px;
    font-weight: 200;
    background-color: inherit;
  }

  .text-box {
    border: none;
    background: transparent;
    border-bottom: 1px solid #ddd;
    outline: none;
    height: 30px;
    font-size: 15px;
    width: 100%;
    margin-top: 2vh;
    color: #ccc;
  }

  .submit-button {
    background-color: #D4DCE2;
    border: none;
    color: #3e3e3e;
    padding: 0.40rem;
    font-size: 15px;
    letter-spacing: 1px;
    font-weight: 200;
    text-align: center;
    display: table;
    margin: 1.5vh auto;
    text-decoration: none;
    border-radius: 0vh;
  }

  .account-button {
    background-color: inherit;
    border: none;
    color: #40B1E9;
    padding: 0rem;
    font-size: 15px;
    letter-spacing: 1px;
    font-weight: 200;
    text-align: center;
    display: table;
    margin: 1.5vh auto;
    text-decoration: none;
    border-radius: 0vh;
  }

  .account-button:hover {
    color: #FFF;
  }
</style>