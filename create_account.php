<?php
/**
 * CS 4342 Database Management
 * @author Jesus Gutierrez
 * @version 1.0
 * Description: The purpose of this file is to serve as simple creating users system that validates username, password and full name.
 */

 /**
 * Php Section
 */

require_once('config.php');
if (isset($_POST['Submit'])){

    $userID = " ";
    /**
     * Grab information from the form submission and store values into variables.
     */
    $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : " ";
    $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : " ";
    $username = isset($_POST['username']) ? $_POST['username'] : " ";
    $password = isset($_POST['password']) ? $_POST['password'] : " ";
	$classification=isset($_POST['classification']) ? $_POST['classification'] : " ";
	$utep_id = isset($_POST['utep_id']) ? $_POST['utep_id'] : " ";
	$faculty = isset($_POST['faculty_radio']) ? $_POST['faculty_radio'] : " ";
	$student = isset($_POST['student_radio']) ? $_POST['student_radio'] : " ";
    $record_created = "User creation successful.";
    $record_error = "Error: " . $queryUser . "<br>" . $conn->error;

    //insert to User table;
     $queryUser  = "INSERT INTO User (UUsername, Password, First_Name, Last_Name)
                 VALUES ('".$username."', '".$password."', '".$firstName."', '".$lastName."');";
				 
	
	
	
	if($faculty!=" "){
		echo "Faculty= $faculty";
		$queryUser.="INSERT INTO Faculty (FUsername,FClassification)
                 VALUES ('".$username."',$classification);";
	}
	else if($student!=" "){
		echo "<br> Student=$student";
		$queryUser.="INSERT INTO Student (SUsername,UTEP_ID,SClassification,Major_GPA,Overall_GPA,Major)
				 VALUES ('$username', ".$utep_id.",'$classification',0,0,'');";
				 
		echo "<br> $queryUser";
	}


  if (mysqli_multi_query($conn, $queryUser)) {
        echo "<p align=center>$record_created </p> ";
    } else {
        echo "<p align=center>$record_error </p> ";
    }
}
?>

<!-- 
  Html Section for Create Acount Page
 -->

<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">  
<title>User Create Account</title>
</head>
<body>
<div class="create-account-grid">
    <h1>Create Account</h1>
    <div id=menu>
        <form action="create_account.php" method="post">
		
		<input type="radio" id="faculty_radio"  name="faculty_radio" value="faculty">
		<label for="faculty_radio">Faculty</label><br>
		<input type="radio" id="student_radio"  name="student_radio" value="student">
		<label for="student_radio">Student</label><br>
		<input class="text-box" type="text" name="first_name" placeholder="First name">
		<input class="text-box" type="text" name="last_name" placeholder="Last name">
		<input class="text-box" type="text" name="username" placeholder="New username">
		<input class="text-box" type="text" name="utep_id" placeholder="UTEP ID">
		<input class="text-box" type="text" name="classification" placeholder="Classification">
		<input class="text-box" type="text" name="password" placeholder="New password">
        <input class="submit-button"name='Submit' type="submit" value="Create Account">
        </form>
        <h2>Or</h2>
        <a class="account-button" href="student_login.php">Login Here</a>
        <a class="account-button" href="index.php">Back Home</a>
</div>
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

  .create-account-grid {
    position: fixed;
    top: 50%;
    left: 50%;
    /* bring your own prefixes */
    transform: translate(-50%, -50%);
    background: #05366B;
    padding: 5vh;
  }

  .create-account-grid h1 {
    text-align: center;
    font-size: 30px;
    letter-spacing: 1px;
    font-weight: 200;
    background-color: inherit;
  }

  .create-account-grid h2 {
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