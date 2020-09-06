<?php

	//variabeles with connection params
	$host = "localhost";	
	$username = "root";
	$password = "";
	$dbName = "newtest";

	$conn = mysqli_connect($host, $username, $password, $dbName);


	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}