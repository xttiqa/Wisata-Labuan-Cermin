<?php
require_once("../connection.php");

if (isset($_GET["id"])) {
    $id = ($_GET["id"]);

    if (isset($_FILES['fotogaleri']) && $_FILES['fotogaleri']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['fotogaleri']['tmp_name'];
        $fotogaleri = addslashes(file_get_contents($tmpName));

        $qry = $connection->query("UPDATE galeri SET foto='$fotogaleri' WHERE id_galeri=$id");
    }
    if ($qry) {
        header("location:galeriadmin.php");
        exit();
    } else {
        echo "Error: " . $connection->error;
    }

} else {
    echo "Access denied";
}
?>
