<?php
require_once ("./connection.php");
$qry = $connection->query("select * from paket_wisata order by id_paket asc;");
?>

<body>
  <!--PAKET WISATA-->
  <div class="judul-halaman">Paket Wisata</div>
  <div class="container">
    <div class="row">
      <?php $no = 0; while ($row = $qry->fetch_assoc()): ?>
        <?php
            $no++;
            $imgData = base64_encode($row['pict']);
            $src = 'data:image/jpeg;base64,' . $imgData;
        ?>
        <div class="col-md-6 mb-4">
          <div class="card border border-3 h-100" style="width: 100%;">
            <img class="card-img-top" src='<?php echo $src ?>' alt="Card image cap" style="height: 220px; object-fit: cover">
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul_paket"] ?></h5>
              <p class="card-text"><?= $row["deskripsi"] ?></p>
              <a href="#" class="btn btn-dark">Pesan Sekarang</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
  <!--PAKET WISATA END-->
</body>

</html>
