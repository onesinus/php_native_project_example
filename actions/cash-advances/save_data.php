<?php
	require "../../configurations/connect.php";

	if (isset($_POST)) {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
        }

		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		$project_name = isset($_POST['data'][0]) ? $_POST['data'][0] : '';
		$ca_number = isset($_POST['data'][1]) ? $_POST['data'][1] : '';
		$division = isset($_POST['data'][2]) ? $_POST['data'][2] : '';
		$pic_name = isset($_POST['data'][3]) ? $_POST['data'][3] : '';
		$is_realized = $_POST['data'][4] == 'true' ? 1 : 0;
		$total = isset($_POST['data'][5]) ? (int)$_POST['data'][5] : 0;
		$file = isset($_POST['data'][6]) ? $_POST['data'][6] : '';
		$status = "Open";
		
		$user = isset($_SESSION['user_logged_in']) ? $_SESSION['user_logged_in'] : null;
		$user_id = $user["id"];
		
		if ($id) {
			$_SESSION['message'] = 'Cash Advance has been updated';

			$query = "UPDATE 
						cash_advances 
					SET 
						doc_number = '$ca_number' 
					WHERE 
						id = '$id';";
		}else {
			$_SESSION['message'] = 'Cash Advance has been added';
			

			$query = "INSERT INTO cash_advances (
				doc_num, 
				description, 
				pic_name,
				division,
				is_realized,
				file,
				total,
				status,
				created_by
			) VALUES(
				'$ca_number', 
				'$project_name', 
				'$pic_name', 
				'$division', 
				'$is_realized', 
				'$file',
				$total,
				'$status',
				'$user_id'
			);";

			$query2 = "
				INSERT INTO cash_advance_details (
					cash_advance_id,
					description,
					qty,
					amount,
					total_amount,
					created_by
				) VALUES
			";

			foreach ($_POST['detail'] as $key => $value) {
				if(isset($value[0])) {
					$description = isset($value[0]) ? $value[0] : '';
					$qty = isset($value[1]) ? (int)$value[1] : 0;
					$amount = isset($value[2]) ? (int)$value[2] : 0;
					$total_amount = isset($value[3]) ? (int)$value[3] : 0;

					$query2 .= "(
						(SELECT MAX(id) FROM cash_advances),
						'$description',
						$qty,
						$amount,
						$total_amount,
						'$user_id'
					)";		

					if ($key+1 !== count($_POST['detail'])) {
						$query2 .= ",";
					}
				}
			}
		}

		if ($conn->query($query) === TRUE && $conn->query($query2) === TRUE) {
			echo "ok";
		}else {
			echo "Error: " . $conn->error;
		}
    }
?>