<?php
	require "../../configurations/connect.php";

	if (isset($_GET)) {
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
        $query = "UPDATE cash_advances SET status = 'APPV' WHERE id = '$id';";

		if ($conn->query($query) === TRUE) {
			session_start();
			$_SESSION['message'] = 'Cash Advance has been approved';

			Header('Location: ../../index.php?page=cash-advances');		
		}else {
			echo "Error: " . $conn->error;
		}
	}
		
	$conn->close();
?>