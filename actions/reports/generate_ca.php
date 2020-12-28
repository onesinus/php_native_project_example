<?php
	require "../../configurations/connect.php";

	if (isset($_POST)) {
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';

        $query = "
            SELECT * FROM cash_advances
        ";

        if($date) {
            $query .= "WHERE created_date >= '$date 00:00:00' AND created_date <= '$date 23:59:59'";
        }

        if($status != 'All') {
            $query .= " AND status = '$status'";
        }

        if ($data = $conn->query($query)) {
            $arr_datas = array();
            while ($row = $data->fetch_assoc()) {
                array_push($arr_datas, $row);
            }
			echo json_encode($arr_datas);
		}else {
			echo json_encode([]);
		}
    }

    $conn->close();
?>