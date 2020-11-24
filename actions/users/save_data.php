 <?php
	require "../../configurations/connect.php";

	if (isset($_POST)) {
		session_start();

		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		$username   = $_POST['username'];
		$password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$nik 		= $_POST['nik'];
		$role       = $_POST['role'];

		if($id) { // handle edit data
			$_SESSION['message'] = 'User has been updated';

			$query = "UPDATE 
						users 
					SET 
						username = '$username', 
						-- password = '$password', 
						nik = '$nik', 
						role = '$role' 
					WHERE 
						id = '$id';";
		}else { // handle add data	
			$_SESSION['message'] = 'User has been added';

			$query = "INSERT INTO users (
				username, 
				password, 
				nik,
				role
			) VALUES(
				'$username', 
				'$password', 
				'$nik', 
				'$role'
			);";
		}

		if ($conn->query($query) === TRUE) {
			Header('Location: ../../index.php?page=users');		
		}else {
			echo "Error: " . $conn->error;
		}
	}
		
	$conn->close();
?>