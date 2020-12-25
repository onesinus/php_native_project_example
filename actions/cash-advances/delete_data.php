<?php
	require "../../configurations/connect.php";

	if (isset($_GET)) {
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
        $query = "DELETE FROM cash_advances WHERE id = '$id';";
        $query2 = "DELETE FROM cash_advance_details WHERE cash_advance_id = '$id'";

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