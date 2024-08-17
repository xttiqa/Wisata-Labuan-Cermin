<?php
require_once ("../connection.php");
include ("headeradmin.php");
$qry = $connection->query("select * from reviews order by id_review asc;");
?>

    <div class="paket-wisata-admin px-2 py-3">
    <div class="row py-3">
        <div class="col-9 font-poppins" style="font-size: 25px; font-weight: 500">
            Ulasan
        </div>
    </div>
    <table class="table font-poppins" style="overflow-x: auto; font-size: 15px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Ulasan</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $no = 0;
        while($row = $qry->fetch_assoc()) {
            $no++;
            echo
            "<tr>
              <th scope='row' class='td-column'>" . $no . "</th>
              <td class='td-column'>" . $row["namareview"] . "</td>
              <td class='td-column'>" . $row["review"] . "</td>
              <td>
                <a href='hapusdataulasan.php?id=" . $row["id_review"] . "'>
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
