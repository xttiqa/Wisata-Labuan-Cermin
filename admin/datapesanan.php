<?php
require_once("../connection.php");
include("headeradmin.php");
$qry = $connection->query("select * from pemesanan order by id_pemesan ASC;");
?>

<div class="paket-wisata-admin px-2 py-3">
    <div class="row py-3">
        <div class="col-9 font-poppins" style="font-size: 25px; font-weight: 500">
            Data Pesanan
        </div>
    </div>
    <table class="table font-poppins" style="overflow-x: auto; font-size: 15px;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Pemesan</th>
            <th scope="col">Nomor HP</th>
            <th scope="col">Tanggal Pemesanan</th>
            <th scope="col">Hari Perjalanan</th>
            <th scope="col">Paket Wisata</th>
            <th scope="col">Harga Wisata</th>
            <th scope="col">Jumlah Orang</th>
            <th scope="col">Total</th>
            <th scope="col">Bukti Bayar</th>
            <th scope="col">Tolak</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 0;
          while ($row = $qry->fetch_assoc()) {
            $no++;
            $imgData = base64_encode($row['foto_buktibayar']);
            $src = 'data:image/jpeg;base64,' . $imgData;
            echo "<tr>
              <th scope='row' class='td-column'>" . $no . "</th>
              <td class='td-column'>" . htmlspecialchars($row["nama_pemesan"]) . "</td>
              <td class='td-column'>" . htmlspecialchars($row["nomor_hp"]) . "</td>
              <td class='td-column'>" . htmlspecialchars($row["tanggal_pesan"]) . "</td>
              <td class='td-column'>" . htmlspecialchars($row["hari_perjalanan"]) . "</td>
              <td class='td-column'>" . htmlspecialchars($row["paket_wisata"]) . "</td>
              <td class='td-column'>" . htmlspecialchars($row["harga_paket"]) . "</td>
              <td class='td-column'>" . htmlspecialchars($row["jumlah_peserta"]) . "</td>
              <td class='td-column'>" . htmlspecialchars($row["total"]) . "</td>
              <td class='td-column'><img src='{$src}' alt='Paket Foto' style='width: 100px;'></td>
              <td>
                <a href='hapuspesanan.php?id=" . $row["id_pemesan"] . "'>
                  <button type='button' class='btn btn-danger px-3 py-1' style='font-size: 14px'>Delete</button>
                </a>
              </td>
            </tr>";
          }
          ?>
        </tbody>
      </table>
</div>

<?php include("footeradmin.php"); ?>
