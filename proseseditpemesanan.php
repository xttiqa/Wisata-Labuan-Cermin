<?php
require_once ("./connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitasi input
    $id = $_POST['id']; 
    $namapemesan = $_POST['namapemesan'];
    $nomorhp = $_POST['nomorhp'];
    $tanggalpesan = $_POST['tanggalpesan'];
    $hariperjalanan = $_POST['hariperjalanan'];
    $paketwisata = $_POST['paketwisata'];
    $jumlahpeserta = $_POST['jumlahpeserta'];
    

    $checkbox1 = isset($_POST['checkbox1']) ? 1 : 0;
    $checkbox2 = isset($_POST['checkbox2']) ? 1 : 0;
    $checkbox3 = isset($_POST['checkbox3']) ? 1 : 0;

    $prices = [
        "Paket A" => 1000000,
        "Paket A1" => 750000,
        "Paket A2" => 600000,
        "Paket B" => 900000,
        "Paket B1" => 500000,
        "Paket B2" => 350000,
        "Paket B3" => 400000
    ];

    $package_price = isset($prices[$paketwisata]) ? $prices[$paketwisata] : 0;
    $total = $package_price * $jumlahpeserta;

    if (isset($_FILES['buktibayar']) && $_FILES['buktibayar']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['buktibayar']['tmp_name'];
        $buktibayar = addslashes(file_get_contents($tmpName));

        $qry = $connection->query("UPDATE pemesanan 
                                   SET nama_pemesan='$namapemesan', nomor_hp='$nomorhp', tanggal_pesan='$tanggalpesan', 
                                       hari_perjalanan='$hariperjalanan', paket_wisata='$paketwisata', 
                                       checkbox1='$checkbox1', checkbox2='$checkbox2', checkbox3='$checkbox3', 
                                       jumlah_peserta='$jumlahpeserta', total='$total', foto_buktibayar='$buktibayar'
                                   WHERE id_pemesan='$id'");
    } else {
        $qry = $connection->query("UPDATE pemesanan 
                                   SET nama_pemesan='$namapemesan', nomor_hp='$nomorhp', tanggal_pesan='$tanggalpesan', 
                                       hari_perjalanan='$hariperjalanan', paket_wisata='$paketwisata', 
                                       checkbox1='$checkbox1', checkbox2='$checkbox2', checkbox3='$checkbox3', 
                                       jumlah_peserta='$jumlahpeserta', total='$total'
                                   WHERE id_pemesan='$id'");
    }

    if ($qry) {
        header("Location: ./daftarpesanan.php");
        exit();
    } else {
        echo "Error: " . $connection->error;
    }
}
?>
