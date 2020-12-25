<?php
	require "../../configurations/connect.php";

	if (isset($_GET)) {
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
        $query = "UPDATE cash_advances SET is_deleted = 1 WHERE id = '$id';";
        $query2 = "UPDATE cash_advance_details SET is_deleted = 1 WHERE cash_advance_id = '$id'";

		if ($conn->query($query) === TRUE && $conn->query($query2) === TRUE) {
			session_start();
			$_SESSION['message'] = 'Cash Advance has been deleted';

			Header('Location: ../../index.php?page=cash-advances');		
		}else {
			echo "Error: " . $conn->error;
		}
	}
		
	$conn->close();
?>