<?php
require_once ("../connection.php");
include ("headeradmin.php");
$id = $_GET["id"];
$qry = $connection->query("select * from galeri where id_galeri='$id'");
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
    <form class="form-input-paket py-2" method="post" action="proseseditgaleri.php?id=<?php echo $_GET["id"]; ?>" enctype="multipart/form-data">
        <div class="form-group py-1">
            <label for="exampleInputPassword1">Foto</label>
            <input type="file" class="form-control w-50" name="fotogaleri">
            <?php if(isset($row['foto'])): ?>
                <?php
                    $imgData = base64_encode($row['foto']);
                    $src = 'data:image/jpeg;base64,' . $imgData;
                ?>
                <img src="<?= $src ?>" alt="Paket Foto" style="width: 100px; margin-top: 10px;">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-dark my-3">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
</div>

<?php include ("footeradmin.php");