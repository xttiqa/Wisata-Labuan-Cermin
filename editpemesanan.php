<?php
require_once ("./connection.php");
include ("header.php");

$id = $_GET["id"];
$qry = $connection->query("SELECT * FROM pemesanan WHERE id_pemesan = '$id'");
if ($qry->num_rows == 1) {
    $row = $qry->fetch_assoc();
    $namapemesan = $row['nama_pemesan'];
    $nomorhp = $row['nomor_hp'];
    $tanggalpesan = $row['tanggal_pesan'];
    $hariperjalanan = $row['hari_perjalanan'];
    $paketwisata = $row['paket_wisata'];
    $jumlahpeserta = $row['jumlah_peserta'];
    $total = $row['total'];
    $checkbox1 = $row['checkbox1'];
    $checkbox2 = $row['checkbox2'];
    $checkbox3 = $row['checkbox3'];
} else {
    $pesan = "Data tidak ditemukan";
}
?>

<div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col-9 pemesanans p-5">
      <?php if (isset($pesan)) { ?>
        <div class="alert alert-danger" role="alert"><?= htmlspecialchars($pesan) ?></div>
      <?php } ?>
      <div class="judul-halaman">Form Edit Pesanan Paket Wisata</div>
      <br>
      <form action="proseseditpemesanan.php?id=<?php echo $_GET["id"]; ?>" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">
        <div class="mb-3">
          <label for="namapemesan" class="form-label">Nama Pemesan</label>
          <input type="text" class="form-control" name="namapemesan" value="<?php echo htmlspecialchars($namapemesan); ?>" required>
        </div>
        <div class="mb-3">
          <label for="nomorhp" class="form-label">Nomor HP</label>
          <input type="text" class="form-control" name="nomorhp" value="<?php echo htmlspecialchars($nomorhp); ?>" required>
        </div>
        <div class="mb-3">
          <label for="tanggalpesan" class="form-label">Tanggal Pesan</label>
          <input type="date" class="form-control" name="tanggalpesan" value="<?php echo htmlspecialchars($tanggalpesan); ?>" required>
        </div>
        <div class="mb-3">
          <label for="hariperjalanan" class="form-label">Waktu Pelaksanaan Perjalanan (hari)</label>
          <input type="number" class="form-control" name="hariperjalanan" value="<?php echo htmlspecialchars($hariperjalanan); ?>" min="1" required>
        </div>
        <div class="judul-pelayanan">Pelayanan Paket Perjalanan</div>
        <select class="form-select" aria-label="Default select example" name="paketwisata" id="paketwisata" onchange="updateCheckboxes()" required>
          <option value="" <?php if ($paketwisata == "") echo 'selected'; ?>>Pilih paket perjalanan</option>
          <option value="Paket A" <?php if ($paketwisata == "Paket A") echo 'selected'; ?>>Paket Lengkap (Semua fasilitas)</option>
          <option value="Paket A1" <?php if ($paketwisata == "Paket A1") echo 'selected'; ?>>Paket A1 (Penginapan + Snorkeling)</option>
          <option value="Paket A2" <?php if ($paketwisata == "Paket A2") echo 'selected'; ?>>Paket A2 (Penginapan + Wisata Perahu)</option>
          <option value="Paket B" <?php if ($paketwisata == "Paket B") echo 'selected'; ?>>Paket Wisata Seru (Snorkeling + Wisata Perahu)</option>
          <option value="Paket B1" <?php if ($paketwisata == "Paket B1") echo 'selected'; ?>>Paket B1 (Snorkeling)</option>
          <option value="Paket B2" <?php if ($paketwisata == "Paket B2") echo 'selected'; ?>>Paket B2 (Wisata Perahu)</option>
          <option value="Paket B3" <?php if ($paketwisata == "Paket B3") echo 'selected'; ?>>Paket B3 (Penginapan)</option>
        </select>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="checkbox1" name="checkbox1" value="1" <?= $checkbox1 ? 'checked' : ''; ?>>
          <label class="form-check-label" for="checkbox1">Penginapan</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="checkbox2" name="checkbox2" value="1" <?= $checkbox2 ? 'checked' : ''; ?>>
          <label class="form-check-label" for="checkbox2">Snorkeling</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="checkbox3" name="checkbox3" value="1" <?= $checkbox3 ? 'checked' : ''; ?>>
          <label class="form-check-label" for="checkbox3">Wisata Perahu</label>
        </div>
        <div class="mb-3">
          <label for="jumlahpeserta" class="form-label">Jumlah Peserta</label>
          <input type="number" class="form-control" name="jumlahpeserta" value="<?php echo htmlspecialchars($jumlahpeserta); ?>" min="1" required>
        </div>
        <div class="mb-3">
          <label for="total" class="form-label">Jumlah Tagihan</label>
          <input type="text" class="form-control" name="total" value="<?php echo htmlspecialchars($total); ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Bukti Pembayaran</label>
            <input type="file" class="form-control w-50" name="buktibayar">
            <?php if (isset($row['foto_buktibayar']) && !empty($row['foto_buktibayar'])): ?>
            <?php
                $imgData = base64_encode($row['foto_buktibayar']);
                $src = 'data:image/jpeg;base64,' . $imgData;
            ?>
            <img src="<?= ($src) ?>" alt="Bukti Pembayaran" style="width: 200px; margin-top: 10px; border: 1px solid gray; padding: 20px;">
            <?php endif; ?>
        </div>
        <button type="submit" name="update" class="btn btn-dark">Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </form>
    </div>
    <div class="col"></div>
  </div>
</div>

<?php include ("footer.php"); ?>
