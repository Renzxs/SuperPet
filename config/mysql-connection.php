<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "superpet_db";
    $conn = "";

    try {
        $conn = mysqli_connect($server, $user, $password, $db);
    } catch(error){
        echo "Failed to connect";
    }

?>