<?php
	require "../../configurations/connect.php";

	if (isset($_GET)) {
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$ca_id = isset($_GET['ca_id']) ? $_GET['ca_id'] : 0;

		$query = "UPDATE realizations SET is_deleted = 1 WHERE id = '$id';";
		$query2 = "UPDATE realization_details SET is_deleted = 1 WHERE realization_id = '$id'";
        $query3 = "UPDATE cash_advances SET status = 'APPV' WHERE id = '$ca_id'";
		

		if ($conn->query($query) === TRUE && $conn->query($query2) === TRUE && $conn->query($query3) === TRUE) {
			session_start();
			$_SESSION['message'] = 'Realization has been deleted';

			Header('Location: ../../index.php?page=realizations');		
		}else {
			echo "Error: " . $conn->error;
		}
	}
		
	$conn->close();
?>