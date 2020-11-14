 <?php
	require "../../configurations/connect.php";

	if (isset($_POST)) {
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		$username   = $_POST['username'];
		$password   = $_POST['password'];
		$role       = $_POST['role'];

		if($id) { // handle edit data
			$query = "UPDATE users SET username = '$username', password = '$password', role = '$role' WHERE id = '$id';";
		}else { // handle add data	
			$query = "INSERT INTO users (username, password, role) VALUES('$username', '$password', '$role');";
		}

		if ($conn->query($query) === TRUE) {
			Header('Location: ../../index.php?page=users');		
		}else {
			echo "Error: " . $conn->error;
		}
	}
		
	$conn->close();
?>