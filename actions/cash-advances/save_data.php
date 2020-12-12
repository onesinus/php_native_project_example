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
		$file = isset($_POST['data'][5]) ? $_POST['data'][5] : '';
		$status = $is_realized == True ? "Closed" : "Open";

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
				total,
				status,
				created_by
			) VALUES(
				'$ca_number', 
				'$project_name', 
				'$pic_name', 
				'$division', 
				'$is_realized', 
				0,
				'$status',
				'$user_id'
			);";
		
		}

		if ($conn->query($query) === TRUE) {
			echo "ok";
		}else {
			echo "Error: " . $conn->error;
		}
    }
?>