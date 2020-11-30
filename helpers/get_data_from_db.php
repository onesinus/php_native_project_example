<?php
    require "./configurations/connect.php";

    function getLastId($tableName) {
        global $conn;
        
        $query = "SELECT MAX(id) as LastId FROM $tableName";
        $execute_query = $conn->query($query);    
        $data = $execute_query->fetch_assoc();
        return $data['LastId'];
    }
?>