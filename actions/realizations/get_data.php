<?php
	require "../../configurations/connect.php";

    $realization_id = isset($_GET['id_realization']) ? $_GET['id_realization'] : 0;
    if($realization_id) {
        $query = "
            SELECT 
                r.cash_advance_id,
                r.created_by,
                u.nik,
                ca.description,
                r.created_date,
                r.updated_date
            FROM 
                realizations r
            INNER JOIN
                cash_advances ca
            ON ca.id = r.cash_advance_id
            INNER JOIN
                users u
            ON u.id = r.created_by
            WHERE 
                r.is_deleted = 0
                AND
                r.id = '$realization_id'
            ";

        $realization = $conn->query($query);

        $datas = array();
        while ($row = $realization->fetch_assoc()) {
            array_push($datas, $row);
        }

        echo json_encode($datas);
    }else {
        echo json_encode([]);
    }

    $conn->close();
?>