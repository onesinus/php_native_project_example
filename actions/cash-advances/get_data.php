<?php
	require "../../configurations/connect.php";

    $ca_id = isset($_GET['id_ca']) ? $_GET['id_ca'] : 0;
    if($ca_id) {
        $query = "
            SELECT 
                ca.pic_name,
                ca.division,
                ca.file,
                ca.created_date ca_cd,
                ca.updated_date ca_ud,
                ca.total ca_total,
                cad.description cad_description,
                cad.total_amount cad_total 
            FROM 
                cash_advances ca
            INNER JOIN
                cash_advance_details cad
            ON ca.id = cad.cash_advance_id
            WHERE 
                ca.is_deleted = 0
                AND
                ca.id = '$ca_id'
            ";

        $ca = $conn->query($query);

        $datas = array();
        while ($row = $ca->fetch_assoc()) {
            array_push($datas, $row);
        }

        echo json_encode($datas);
    }else {
        echo json_encode([]);
    }

    $conn->close();
?>