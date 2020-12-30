<?php
	require "../../configurations/connect.php";

	if (isset($_POST)) {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		$ca_id = isset($_POST['ca_id']) ? $_POST['ca_id'] : 0;
		$payment_type = isset($_POST['data'][0]) ? $_POST['data'][0] : '';
		$amount = isset($_POST['data'][1]) ? $_POST['data'][1] : '';
		$realization_id = isset($_POST['data'][2]) ? $_POST['data'][2] : 0;
		$bank = isset($_POST['data'][3]) ? $_POST['data'][3] : '';
		$account_number = isset($_POST['data'][4]) ? $_POST['data'][4] : '';
		$account_name = isset($_POST['data'][5]) ? $_POST['data'][5] : '';

		$status = "Closed";
		
		$user = isset($_SESSION['user_logged_in']) ? $_SESSION['user_logged_in'] : null;
		$user_id = $user["id"];
		
		if ($id) {
			$_SESSION['message'] = 'Payment has been updated';

			$query = "SELECT 1";
		}else {
			$_SESSION['message'] = 'Payment has been added';
			
			$query = "INSERT INTO payments (
				realization_id, 
				cash_advance_id,
				payment_type, 
				bank,
				account_number,
				account_name,
				amount,
				status,
				created_by
			) VALUES(
				'$realization_id', 
				'$ca_id', 
				'$payment_type', 
				'$bank', 
				'$account_number', 
				'$account_name', 
				'$amount', 
				'$status', 
				'$user_id'
			);";

			$query2 = "
				UPDATE cash_advances SET status = 'Paid' WHERE id = '$ca_id';
			";
		}

		if ($conn->query($query) === TRUE && $conn->query($query2) === TRUE) {
			echo "ok";
		}else {
			echo "Error: " . $conn->error;
		}
    }
?>