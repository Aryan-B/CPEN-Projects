<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- Styling -->
   	<link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One|Lexend+Deca|Poiret+One|Rock+Salt|Shadows+Into+Light+Two&display=swap|Roboto:500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./suistyle.php">
</head>

<?php 
session_start();
$error.=$_SESSION['error'];
session_destroy();
?>

<body>

<form class="page" action="backend/validate.php" method="POST">
<div class= "container">
<div class="box">
	Email id: 
	<input class="box1" type="text" name="emailid" required placeholder="Required">
</div>
<div class="box">
	Password:
	<input class="box1" type="password" name= "password" required placeholder="Required">

</div>

<input class="submit" type="submit" value="submit" >
<a href="index.html"><div class ="close"></div></a>

</div>
<div class ="error"><?=$error?></div>
</form>

</body>
</html>