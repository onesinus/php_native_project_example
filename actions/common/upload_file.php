<?php
    $dir = "../../uploaded_files/";
    move_uploaded_file($_FILES["file"]["tmp_name"], $dir. $_FILES["file"]["name"]);
    echo $_FILES["file"]["name"];
?>