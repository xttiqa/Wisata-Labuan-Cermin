<?php
require_once ("../connection.php");
include ("headeradmin.php");
$qry = $connection->query("select * from paket_wisata order by id_paket asc;");
?>

    <div class="paket-wisata-admin px-2 py-3">
    <div class="row py-3">
        <div class="col-9 font-poppins" style="font-size: 25px; font-weight: 500">
            Paket Wisata
        </div>
        <div class="col-3 d-flex justify-content-end">
            <a href="inputwisata.php"><button type="button" class="btn btn-dark">Input</button></a>
        </div>
    </div>
    <table class="table font-poppins" style="overflow-x: auto; font-size: 15px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Paket</th>
      <th scope="col">Judul Paket</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Foto</th>
      <th scope="col">Edit</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $no = 0;
        while($row = $qry->fetch_assoc()) {
            $no++;
            $imgData = base64_encode($row['pict']);
            $src = 'data:image/jpeg;base64,' . $imgData;
            echo
            "<tr>
              <th scope='row' class='td-column'>" . $no . "</th>
              <td class='td-column'>" . $row["kode_paket"] . "</td>
              <td class='td-column'>" . $row["judul_paket"] . "</td>
              <td class='td-column'>" . $row["deskripsi"] . "</td>
              <td class='td-column'><img src='{$src}' alt='Paket Foto' style='width: 100px;'></td>
              <td>
                <a href='editwisata.php?id=" . $row["id_paket"] . "'>
                  <button type='button' class='btn btn-secondary px-3 py-1' style='font-size: 14px'>Edit</button>
                </a>
              </td>
              <td>
                <a href='hapuswisata.php?id=" . $row["id_paket"] . "'>
                  <button type='button' class='btn btn-danger px-3 py-1' style='font-size: 14px'>Delete</button>
                </a>
              </td>
            </tr>";
        }
    ?>
  </tbody>
</table>
    </div>

<?php include ("footeradmin.php"); ?>
