<?php

	session_start() ;
	require 'class.IPInfoDB.php';
	include_once 'connection.php';
	

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
        
        $user_agent = $_SERVER['HTTP_USER_AGENT']; //user browser
        $ip_address = $_SERVER["REMOTE_ADDR"];     // user ip adderss
        $page_name = $_SERVER["SCRIPT_NAME"];      // page the user looking
        $query_string = $_SERVER["QUERY_STRING"];   // what query he used
        $current_page = $page_name."?".$query_string; 


// Load the class
        $ipinfodb = new IPInfoDB('33d489cac2ea7d01076fe35906a69be73bfe088fa0843e19026b5deed7057a1f');
        $result = $ipinfodb->getCity($ip_address);
        $details= " ";

        if (!empty($result) && is_array($result)) {
            foreach ($result as $key => $value) {
                $details.=", ".$value;

                //echo $key . ' : ' . $value . "\n";
            }}

        



        
        $stmt = $conn->prepare("UPDATE aryan_login1 SET ipaddress =(?) WHERE u_email = '$emailid' AND u_password= '$password'");
        //$stmt = $conn->prepare("INSERT INTO aryan_login1(ipaddress) VALUES (?)");
        $track="$details, $ip_address ,$user_agent ,$page_name ,$query_string";
        $stmt->bind_param('s', $track);





		if($display!=NULL){
			$_SESSION['username'] = $display['u_fname'];
            $_SESSION['lastname'] = $display['u_lname'];
            $_SESSION['contact'] = $display['u_contact'];
            $_SESSION['email'] = $display['u_email'];
			$_SESSION['password'] = $display['u_password'];
            $stmt->execute();
			header("location:../index2.php");
		}
		else{
			$_SESSION['error']="Details incorrect. Please login again..";
            header("location:../login.php");
		}



}


?>

