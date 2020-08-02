<?php
	
	session_start() ;

	include'connection.php';
	

	error_reporting(0);

	
	if(isset($_POST['submit'])){
		echo "Please fill in all the details";
	}
	else{
		$emailid= $_POST['emailid'];
		$password= $_POST['password'];


		$getdbdetails= "SELECT u_email,u_lname,u_contact,u_password,u_fname FROM aryan_login1 WHERE u_email = '$emailid' AND u_password= '$password'"  ;
		
		 
		$rowsmatched= mysqli_query($conn,$getdbdetails);
		$display = mysqli_fetch_array($rowsmatched);

		if($display!=NULL){
			$_SESSION['username'] = $display['u_fname'];
            $_SESSION['lastname'] = $display['u_lname'];
            $_SESSION['contact'] = $display['u_contact'];
            $_SESSION['email'] = $display['u_email'];
			$_SESSION['password'] = $display['u_password'];

			header("location:../index2.php");
		}
		else{
			$_SESSION['error']="Details incorrect. Please login again..";
            header("location:../login.php");
		}



}


?>

