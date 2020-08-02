<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- Styling -->
   	<link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One|Lexend+Deca|Poiret+One|Rock+Salt|Shadows+Into+Light+Two&display=swap|Roboto:500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./style1.php">



	<title>Aryan</title>

</head>
<body>
<?php
	session_start();
	if (isset($_SESSION['username'])) {

        $uname.=$_SESSION['username'];
        $lname.=$_SESSION['lastname'];
        $contact.=$_SESSION['contact'];
        $email.=$_SESSION['email'];
        $password.=$_SESSION['password'];
if(empty($uname)){$uname="NULL";}
if(empty($lname)){$lname="NULL";}
if(empty($contact)){$contact="NULL";}
if(empty($email)){$email="NULL";}
if(empty($password)){$password="NULL";}
    }

    else{
		header("location: login.php");
	}
    session_destroy();
	?>

<h1 class="style"> Hello <?=$uname?></h1>
<div class="end"> The user data was recorded as following in the PHPMyAdmin SQL database: <br><br>

Profile picture : NULL<br>
First name : <?=$uname?><br>
Last name : <?=$lname?><br>
Contact : <?=$contact?><br>
Email id : <?=$email?><br>
Password : <?=$password?><br>
<br>
The details should match accordingly to the input by the user.
<br><br><br>
This was a recent update to the website to showcase the login/signup feature using PHP programming.<br><br>

The password is case sensitive value as ASCII bin.<br>
Further improvement to the profile page may include Uploading/Displaying profile picture, OAuth, security against SQL injection, Email verification API. <br><br>

Once logged out, www.aryan.social/index2.php link cannot be accessible, as the USER session will be destroyed. It will be redirected to login page for re-verification<br><br>



You have reached the end. Please stop digging.


</div>
    <a href="backend/logout.php"><button class="logout">Logout</button></a>





</body>
</html>