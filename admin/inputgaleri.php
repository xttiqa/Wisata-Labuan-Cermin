<?php
require_once ("../connection.php");
include ("headeradmin.php");
if (isset($_FILES['fotogaleri']) && $_FILES['fotogaleri']['error'] === UPLOAD_ERR_OK) {
    $tmpName = $_FILES['fotogaleri']['tmp_name'];

    if (!empty($tmpName) && file_exists($tmpName)) {
        $fotogaleri = addslashes(file_get_contents($tmpName));
        $qry3 = $connection->query("INSERT INTO galeri (foto) VALUES ('$fotogaleri');");
    } else {
        $error = "File kosong";
    }
} 

?>

<div class="input-wisata-admin px-2 py-3">
    <?php if (isset($qry3)) { ?>
        <div class="alert alert-success" role="alert">Input data anda sudah disimpan!</div>
    <?php } elseif (isset($error)) { ?>
        <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
    <?php } ?>
    <div class="col-9 font-poppins" style="font-size: 25px; font-weight: 500">
        Galeri
    </div>
    <form class="form-input-paket py-2" action="" method="post" enctype="multipart/form-data">
        <div class="form-group py-1">
            <label for="exampleInputPassword1">Foto</label>
            <input type="file" class="form-control w-50" name="fotogaleri">
        </div>
        <button type="submit" class="btn btn-dark my-3">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
</div>

<?php include ("footeradmin.php"); ?>
