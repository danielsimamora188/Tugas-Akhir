<?php

    $server_name = "localhost";
    $server_user = 'root';
    $server_pass = '';
    $db_name = 'sim';
    
    $conn = mysqli_connect($server_name,$server_user,$server_pass,$db_name);
    
    if (!$conn) {
        echo "Koneksi ke Database Gagal";
        exit();
    }

?>