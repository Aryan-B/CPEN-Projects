<?php

	$dbServername= 'removed for security purposes';
	$dbUsername= 'removed for security purposes';
	$dbPassword='removed for security purposes';
	$dbName='removed for security purposes';

	$conn = new mysqli($dbServername,$dbUsername,$dbPassword,$dbName);

	if ($conn->connect_error) {
		echo "unable to connect to server";
	}














?> 