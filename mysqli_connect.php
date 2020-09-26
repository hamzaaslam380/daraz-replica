<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	
	$con = new mysqli($servername,$username,$password,"daraz");
	if (mysqli_connect_errno())
  	{
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	
	if($con->connect_error){
		die("connection failed" . $conn->connect_error);	
	}
?>