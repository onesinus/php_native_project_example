<?php	
	$host = "localhost"	;

	$username = "root";
	$password = "";
	$database = "ca";

	// $username = "id15523280_root";
	// $password = "fEh/(5=M{D8yu-7F";
	// $database = "id15523280_pettycash_and_ca";
	$conn = new mysqli($host, $username, $password, $database);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>