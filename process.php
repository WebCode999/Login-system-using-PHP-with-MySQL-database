<?php

	// connect to the sever and select database
	$con=mysqli_connect("localhost", "root", "", "login");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: ". mysqli_connect_error();
	}

	// escape variables for security
	$username = mysqli_real_escape_string($con, $_POST['user']);
	$password = mysqli_real_escape_string($con, $_POST['pass']);


	// Query the database for user
	$result = mysqli_query($con, "select * from users where username = '$username' and password = '$password'")
    			or die("Failed to query database " . mysqli_error());
	$row = mysqli_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password) {
    	echo "Login Success!!! Welcome " . $row['username']."!";
	} else {
    	echo "Failed to login!";
	}
?>