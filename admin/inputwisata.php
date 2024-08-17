<?php
require_once ("../connection.php");
include ("headeradmin.php");

if (isset($_POST["kodepaket"])) {
    $kodepaket = $_POST["kodepaket"];
    $judulpaket = $_POST["judulpaket"];
    $deskripsi = $_POST["deskpaket"];
    
    if (isset($_FILES['fotopaket']) && $_FILES['fotopaket']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['fotopaket']['tmp_name'];
        
        if (!empty($tmpName) && file_exists($tmpName)) {
            $fotopaket = addslashes(file_get_contents($tmpName));
            
            $qry1 = $connection->query("INSERT INTO paket_wisata (kode_paket, judul_paket, deskripsi, pict) VALUES ('$kodepaket', '$judulpaket', '$deskripsi', '$fotopaket');");
        } 
    } else {
        $error = "File gagal diupload";
    }
}
?>

<div class="input-wisata-admin px-2 py-3">
    <?php if (isset($qry1)) { ?>
        <div class="alert alert-success" role="alert">Input data anda sudah disimpan!</div>
    <?php } elseif (isset($error)) { ?>
        <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
    <?php } ?>
    <div class="col-9 font-poppins" style="font-size: 25px; font-weight: 500">
        Paket Wisata
    </div>
    <form class="form-input-paket py-2" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Kode Paket</label>
            <input type="text" class="form-control w-50" name="kodepaket">
        </div>
        <div class="form-group py-1">
            <label for="exampleInputPassword1">Judul Paket</label>
            <input type="text" class="form-control w-50" name="judulpaket">
        </div>
        <div class="form-group py-1">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea class="form-control w-50" id="exampleFormControlTextarea1" rows="3" name="deskpaket"></textarea>
        </div>
        <div class="form-group py-1">
            <label for="exampleInputPassword1">Foto</label>
            <input type="file" class="form-control w-50" name="fotopaket">
        </div>
        <button type="submit" class="btn btn-dark my-3">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
</div>

<?php include ("footeradmin.php"); ?>
