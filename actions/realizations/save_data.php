<?php
	require "../../configurations/connect.php";

	if (isset($_POST)) {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
        }

		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		$realization_number = isset($_POST['data'][0]) ? $_POST['data'][0] : '';
		$ca_id = isset($_POST['data'][1]) ? $_POST['data'][1] : '';
		$total = isset($_POST['data'][2]) ? (int)$_POST['data'][2] : 0;
		$difference = isset($_POST['data'][3]) ? (int)$_POST['data'][3] : 0;

		$status = "Open";
		
		$user = isset($_SESSION['user_logged_in']) ? $_SESSION['user_logged_in'] : null;
		$user_id = $user["id"];
		
		if ($id) {
			$_SESSION['message'] = 'Realization has been updated';

			$query = "UPDATE 
						realizations 
					SET 
						doc_number = '$realization_number' 
					WHERE 
						id = '$id';";
		}else {
			$_SESSION['message'] = 'Realization has been added';
			
			$query = "INSERT INTO realizations (
				doc_num, 
				cash_advance_id, 
				total,
				difference,
				status,
				created_by
			) VALUES(
				'$realization_number', 
				'$ca_id', 
				'$total', 
				'$difference', 
				'$status', 
				'$user_id'
			);";

			$query2 = "
				INSERT INTO realization_details (
					realization_id,
					description,
					amount,
					created_by
				) VALUES
			";

			foreach ($_POST['detail'] as $key => $value) {
				if(!empty($value[0])) {
					$description = isset($value[0]) ? $value[0] : '';
					$amount = isset($value[1]) ? (int)$value[1] : 0;

					$query2 .= "(
						(SELECT MAX(id) FROM realizations),
						'$description',
						$amount,
						'$user_id'
					)";		

					if ($key+1 !== count($_POST['detail'])) {
						$query2 .= ",";
					}
				}
			}

			$query3 = "
				UPDATE cash_advances SET status = 'On Realization' WHERE id = '$ca_id';
			";
		}

		if ($conn->query($query) === TRUE && $conn->query($query2) === TRUE && $conn->query($query3) === TRUE) {
			echo "ok";
		}else {
			echo "Error: " . $conn->error;
		}
    }
?>