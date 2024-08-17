<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databases = "db_pariwisata";

    $connection = new mysqli($servername, $username, $password, $databases);
    
    if (!$connection) {
        die("Connection failed: ".$connection->connect_error);
        echo "Gagal Koneksi ... <br>";
    }
?>