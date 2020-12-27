<?php
	require "../../configurations/connect.php";

	if (isset($_GET)) {
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$ca_id = isset($_GET['ca_id']) ? $_GET['ca_id'] : 0;

        $query = "UPDATE realizations SET status = 'Closed' WHERE id = '$id';";
        $query2 = "UPDATE cash_advances SET status = 'Closed' WHERE id = '$ca_id';";

		if ($conn->query($query) === TRUE && $conn->query($query2) === TRUE) {
			session_start();
			$_SESSION['message'] = 'Realization has been approved';

			Header('Location: ../../index.php?page=realizations');		
		}else {
			echo "Error: " . $conn->error;
		}
	}
		
	$conn->close();
?>