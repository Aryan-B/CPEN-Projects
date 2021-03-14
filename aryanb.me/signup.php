<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- Styling -->
   	<link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One|Lexend+Deca|Poiret+One|Rock+Salt|Shadows+Into+Light+Two&display=swap|Roboto:500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./suistyle.php">
</head>
<body>
<form class = "page" action="backend/create.php" method="POST">
<div class= "container">
	<div class = "box">
		First Name
		<input class="box1" type="text" name="fname" required placeholder="Required">
	</div>
	<div  class = "box">
		Last Name
		<input class="box1" type="text" name="lname" required placeholder="Required">
	</div>
	<div  class = "box">
		Contact no.	
		<input class="box1" type="text" name="contact" placeholder="Optional">
	</div>
	<div  class = "box">
		Email id
		<input class="box1" type="text" name="email" required placeholder="Required">
	</div>
	<div  class = "box">
		Password
		<input class="box1" type="password" name="password" required placeholder="Required">
	</div>
    <input class="submit" type="submit" value="Signup">
    <a href="index.html"><div class ="close"></div></a>
</div>

	


</form>
</body>
</html>