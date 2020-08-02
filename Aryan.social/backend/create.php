

<?php
	include_once 'connection.php';
	error_reporting(0);

	$FirstName = $_POST["fname"];
	$LastName = $_POST["lname"];
	$Contactno = $_POST["contact"];
	$Emailid = $_POST["email"];
	$Password= $_POST["password"];


	if(!_POST["Signup"]){
		echo "Please fill in the required details";
	}
	else{
		$sql1= "INSERT into aryan_login1 (u_fname, u_lname,u_contact,u_email, u_password)
		values ('$FirstName','$LastName','$Contactno','$Emailid','$Password')";

	}
if (mysqli_query($conn,$sql1)) {
		header('Location: ../index2.php');
		exit;
	}else{
	echo "unable to connect to server";
}


 
?>

