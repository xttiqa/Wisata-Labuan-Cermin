<?php 
require_once ("./connection.php");
include ("header.php");  
$qry = $connection->query("select * from pemesanan order by id_pemesan asc;");
?>

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-10 pemesanans p-5">
        <div class="judul-halaman">Data Pemesanan Paket Wisata</div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped font-poppins text-center" style="overflow-x: auto; font-size: 15px; margin-top: 25px">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Hari Perjalanan</th>
                    <th scope="col">Paket Wisata</th>
                    <th scope="col">Checkbox 1</th>
                    <th scope="col">Checkbox 2</th>
                    <th scope="col">Checkbox 3</th>
                    <th scope="col">Harga Wisata</th>
                    <th scope="col">Jumlah Orang</th>
                    <th scope="col">Total</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 0;
                    while($row = $qry->fetch_assoc()) {
                        $no++;
                        $imgData = base64_encode($row['foto_buktibayar']);
                        $src = 'data:image/jpeg;base64,' . $imgData;
                        echo "
                        <tr>
                            <th scope='row' class='td-column'>" . $no . "</th>
                            <td class='td-column'>" . htmlspecialchars($row["nama_pemesan"]) . "</td>
                            <td class='td-column'>" . htmlspecialchars($row["nomor_hp"]) . "</td>
                            <td class='td-column'>" . htmlspecialchars($row["tanggal_pesan"]) . "</td>
                            <td class='td-column'>" . htmlspecialchars($row["hari_perjalanan"]) . " hari</td>
                            <td class='td-column'>" . htmlspecialchars($row["paket_wisata"]) . "</td>
                            <td class='td-column'>" . ($row["checkbox1"] ? 'Y' : 'T') . "</td>
                            <td class='td-column'>" . ($row["checkbox2"] ? 'Y' : 'T') . "</td>
                            <td class='td-column'>" . ($row["checkbox3"] ? 'Y' : 'T') . "</td>
                            <td class='td-column'>Rp " . number_format($row["harga_paket"], 0, ',', '.') . "</td>
                            <td class='td-column'>" . htmlspecialchars($row["jumlah_peserta"]) . "</td>
                            <td class='td-column'>Rp " . number_format($row["total"], 0, ',', '.') . "</td>
                            <td class='td-column'><img src='{$src}' alt='Paket Foto' style='width: 100px;'></td>
                            <td>
                                <a href='editpemesanan.php?id=" . htmlspecialchars($row["id_pemesan"]) . "'>
                                <button type='button' class='btn btn-secondary px-3 py-1' style='font-size: 14px'>Edit</button>
                                </a>
                            </td>
                            <td>
                                <a href='hapuspesanan.php?id=" . htmlspecialchars($row["id_pemesan"]) . "'>
                                <button type='button' class='btn btn-danger px-3 py-1' style='font-size: 14px'>Delete</button>
                                </a>
                            </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
  </div>
</div>

<?php include ("footer.php"); ?>
