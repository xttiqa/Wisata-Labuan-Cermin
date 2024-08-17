<?php
require_once ("../connection.php");
include ("headeradmin.php");
$id = $_GET["id"];
$qry = $connection->query("select * from paket_wisata where id_paket='$id'");
if ($qry->num_rows >= 1) {
    $row = $qry->fetch_assoc();
    $pesan = "";
    echo "<style> .notice-tdk-ditemukan {display: none} </style>";
} else {
    $pesan = "Data tidak ditemukan";
}
?>

<div class="input-wisata-admin px-2 py-3">
    <div class="col-9 font-poppins" style="font-size: 25px; font-weight: 500">
        Edit
    </div>
    <form class="form-input-paket py-2" method="post" action="proseseditpaket.php?id=<?php echo $_GET["id"]; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Kode Paket</label>
            <input type="text" class="form-control w-50" name="kodepaket" value="<?= isset($row) ? $row["kode_paket"] : "" ?>">
        </div>
        <div class="form-group py-1">
            <label>Judul Paket</label>
            <input type="text" class="form-control w-50" name="judulpaket" value="<?= isset($row) ? $row["judul_paket"] : "" ?>">
        </div>
        <div class="form-group py-1">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea class="form-control w-50" id="exampleFormControlTextarea1" 
                rows="3" name="deskpaket"><?= isset($row) ? $row["deskripsi"] : "" ?></textarea>
        </div>
        <div class="form-group py-1">
            <label>Foto</label>
            <input type="file" class="form-control w-50" name="fotopaket">
            <?php if(isset($row['pict'])): ?>
                <?php
                    $imgData = base64_encode($row['pict']);
                    $src = 'data:image/jpeg;base64,' . $imgData;
                ?>
                <img src="<?= $src ?>" alt="Paket Foto" style="width: 200px; margin-top: 10px; border: 1px solid gray; padding: 20px;">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-dark my-3">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
</div>

<?php include ("footeradmin.php");