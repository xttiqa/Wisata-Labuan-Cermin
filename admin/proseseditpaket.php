<?php
require_once("../connection.php");

if (isset($_POST["kodepaket"]) && isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $kodepaket = $_POST["kodepaket"];
    $judulpaket = $_POST["judulpaket"];
    $deskripsi = $_POST["deskpaket"];

    if (isset($_FILES['fotopaket']) && $_FILES['fotopaket']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['fotopaket']['tmp_name'];
        $fotopaket = addslashes(file_get_contents($tmpName)); 
        $qry = $connection->query("UPDATE paket_wisata SET kode_paket='$kodepaket', judul_paket='$judulpaket', deskripsi='$deskripsi', pict='$fotopaket' WHERE id_paket=$id");
    } else {
        $qry = $connection->query("UPDATE paket_wisata SET kode_paket='$kodepaket', judul_paket='$judulpaket', deskripsi='$deskripsi' WHERE id_paket=$id");
    }

    if ($qry) {
        header("location:paketwisata.php");
        exit(); 
    } else {
        echo "Error: " . $connection->error;
    }
} else {
    echo "Access denied";
}
?>
