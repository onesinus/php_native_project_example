 <?php
	require "../../configurations/connect.php";

	if (isset($_POST)) {
		$username   = $_POST['username'];
		$password   = $_POST['password'];
		$role       = $_POST['role'];

		$query = "INSERT INTO users (username, password, role) VALUES('$username', '$password', '$role')";

		if ($conn->query($query) === TRUE) {
			Header('Location: ../../index.php?page=users');		
		}else {
			echo "Error: " . $conn->error;
		}
	}
		
	$conn->close();
?>