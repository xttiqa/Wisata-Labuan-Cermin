<?php
require_once("./connection.php");
include("header.php");

$namapemesan = $nomorhp = $tanggalpesan = $hariperjalanan = $paketwisata = $jumlahpeserta = $hargapaket = $total = "";
$checkbox1 = $checkbox2 = $checkbox3 = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namapemesan = htmlspecialchars($_POST["namapemesan"] ?? "");
    $nomorhp = htmlspecialchars($_POST["nomorhp"] ?? "");
    $tanggalpesan = htmlspecialchars($_POST["tanggalpesan"] ?? "");
    $hariperjalanan = intval($_POST["hariperjalanan"] ?? 1);
    $paketwisata = htmlspecialchars($_POST["paketwisata"] ?? "");
    $jumlahpeserta = intval($_POST["jumlahpeserta"] ?? 1);

    $checkbox1 = isset($_POST['checkbox1']) ? 1 : 0;
    $checkbox2 = isset($_POST['checkbox2']) ? 1 : 0;
    $checkbox3 = isset($_POST['checkbox3']) ? 1 : 0;

    $harga = 0;
    switch ($paketwisata) {
        case "Paket A": 
          $harga = 900000; 
          break;
        case "Paket A1": 
          $harga = 700000; 
          break;
        case "Paket A2": 
          $harga = 550000; 
          break;
        case "Paket B": 
          $harga = 450000; 
          break;
        case "Paket B1": 
          $harga = 300000; 
          break;
        case "Paket B2": 
          $harga = 150000; 
          break;
        case "Paket B3": 
          $harga = 450000; 
          break;
    }

    if (isset($_POST['hitung'])) {
        $total = $harga * $jumlahpeserta * $hariperjalanan;
        $hargapaket = $harga;
    } elseif (isset($_POST['submit'])) {
        if (isset($_FILES['buktibayar']) && $_FILES['buktibayar']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['buktibayar']['tmp_name'];
            $buktibayar = !empty($tmpName) && file_exists($tmpName) ? addslashes(file_get_contents($tmpName)) : '';

            $total = $harga * $jumlahpeserta * $hariperjalanan;
            $qry = $connection->query("INSERT INTO pemesanan 
                (nama_pemesan, nomor_hp, tanggal_pesan, hari_perjalanan, paket_wisata, checkbox1, checkbox2, checkbox3, jumlah_peserta, harga_paket, total, foto_buktibayar)
                VALUES ('$namapemesan', '$nomorhp', '$tanggalpesan', '$hariperjalanan', '$paketwisata', '$checkbox1', '$checkbox2', '$checkbox3', '$jumlahpeserta', '$hargapaket' ,'$total', '$buktibayar')");
        } else {
            $error = "File gagal diupload";
        }
    }
}
?>

<div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col-9 pemesanans p-5">
    <?php if (isset($qry)) { ?>
        <div class="alert alert-success" role="alert">Input data anda sudah disimpan!</div>
    <?php } elseif (isset($error)) { ?>
        <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
    <?php } ?>
      <div class="judul-halaman">Form Pemesanan Paket Wisata</div>
      <br>
      <form action="" method="post" enctype="multipart/form-data" onsubmit="return cekLogin()">
        <div class="mb-3">
          <label for="namapemesan" class="form-label">Nama Pemesan</label>
          <input type="text" class="form-control" name="namapemesan" value="<?= htmlspecialchars($namapemesan) ?>" required>
        </div>
        <div class="mb-3">
          <label for="nomorhp" class="form-label">Nomor HP</label>
          <input type="text" class="form-control" name="nomorhp" value="<?= htmlspecialchars($nomorhp) ?>" required>
        </div>
        <div class="mb-3">
          <label for="tanggalpesan" class="form-label">Tanggal Pesan</label>
          <input type="date" class="form-control" name="tanggalpesan" value="<?= htmlspecialchars($tanggalpesan) ?>" required>
        </div>
        <div class="mb-3">
          <label for="hariperjalanan" class="form-label">Waktu Pelaksanaan Perjalanan (hari)</label>
          <input type="number" class="form-control" name="hariperjalanan" value="<?= htmlspecialchars($hariperjalanan) ?>" min="1" required>
        </div>
        <div class="judul-pelayanan">Pelayanan Paket Perjalanan</div>
        <select class="form-select" aria-label="Default select example" name="paketwisata" id="paketwisata" onchange="updateCheckboxes()" required>
          <option value="">Pilih paket perjalanan</option>
          <option value="Paket A" <?= $paketwisata == "Paket A" ? 'selected' : '' ?>>Paket Lengkap (Semua fasilitas)</option>
          <option value="Paket A1" <?= $paketwisata == "Paket A1" ? 'selected' : '' ?>>Paket A1 (Penginapan + Snorkeling)</option>
          <option value="Paket A2" <?= $paketwisata == "Paket A2" ? 'selected' : '' ?>>Paket A2 (Penginapan + Wisata Perahu)</option>
          <option value="Paket B" <?= $paketwisata == "Paket B" ? 'selected' : '' ?>>Paket Wisata Seru (Snorkeling + Wisata Perahu)</option>
          <option value="Paket B1" <?= $paketwisata == "Paket B1" ? 'selected' : '' ?>>Paket B1 (Snorkeling)</option>
          <option value="Paket B2" <?= $paketwisata == "Paket B2" ? 'selected' : '' ?>>Paket B2 (Wisata Perahu)</option>
          <option value="Paket B3" <?= $paketwisata == "Paket B3" ? 'selected' : '' ?>>Paket B3 (Penginapan)</option>
        </select>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="checkbox1" name="checkbox1" value="1" <?= $checkbox1 ? 'checked' : '' ?>>
          <label class="form-check-label" for="checkbox1">Penginapan</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="checkbox2" name="checkbox2" value="1" <?= $checkbox2 ? 'checked' : '' ?>>
          <label class="form-check-label" for="checkbox2">Snorkeling</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="checkbox3" name="checkbox3" value="1" <?= $checkbox3 ? 'checked' : '' ?>>
          <label class="form-check-label" for="checkbox3">Wisata Perahu</label>
        </div>
        <div class="mb-3">
          <label for="jumlahpeserta" class="form-label">Jumlah Peserta</label>
          <input type="number" class="form-control" name="jumlahpeserta" value="<?= htmlspecialchars($jumlahpeserta) ?>" min="1" required>
        </div>
        <div class="mb-3">
          <label for="hargapaket" class="form-label">Harga Paket</label>
          <input type="text" class="form-control" name="hargapaket" value="<?= htmlspecialchars($hargapaket) ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="total" class="form-label">Jumlah Tagihan</label>
          <input type="text" class="form-control" name="total" value="<?= htmlspecialchars($total) ?>" readonly>
        </div>
        <div class="mb-3">
          <h5>Pembayaran melalui Transfer :</h5>
          <h6>Mandiri : 123456789 (TOURS LABUAN CERMIN)</h6>
          <h6>BNI : 214365879 (TOURS LABUAN CERMIN)</h6>
        </div>
        <div class="mb-3">
            <label>Bukti Pembayaran</label>
            <input type="file" class="form-control w-50" name="buktibayar">
        </div>
        <button type="submit" name="hitung" class="btn btn-dark">Hitung</button>
        <button type="submit" name="submit" class="btn btn-dark">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </form>
    </div>
    <div class="col"></div>
  </div>
</div>

<script>
    function cekLogin() {
        <?php if (!isset($_SESSION['username'])): ?>
            alert("Anda harus login terlebih dahulu!");
            return false;
        <?php endif; ?>
        return true;
    }

    function updateCheckboxes() {
        const paketwisata = document.getElementById('paketwisata').value;
        const checkboxes = {
            'Paket A': [true, true, true],
            'Paket A1': [true, true, false],
            'Paket A2': [true, false, true],
            'Paket B': [false, true, true],
            'Paket B1': [false, true, false],
            'Paket B2': [false, false, true],
            'Paket B3': [true, false, false]
        };

        const [c1, c2, c3] = checkboxes[paketwisata] || [false, false, false];
        document.getElementById('checkbox1').checked = c1;
        document.getElementById('checkbox2').checked = c2;
        document.getElementById('checkbox3').checked = c3;
    }
</script>

<?php include("footer.php"); ?>
