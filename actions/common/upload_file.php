<?php
    $dir = "../../uploaded_files/";

    if($_FILES) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $dir. $_FILES["file"]["name"]);
        echo $_FILES["file"]["name"];
    }
?>