<?php
require_once ("./connection.php");
$qry = $connection->query("select * from galeri order by id_galeri asc;");
?>

<body>
<div class="judul-halaman">Galeri</div>
    <div class="row" style="padding: 10px 0px;">
        <?php $no = 0; while ($row = $qry->fetch_assoc()): ?>
        <?php
            $no++;
            $imgData = base64_encode($row['foto']);
            $src = 'data:image/jpeg;base64,' . $imgData;
        ?>
        <div class="col-md-6" style="padding: 5px;">
            <div class="thumbnail"> 
                <img src='<?php echo $src ?>' alt="Lights" style="width:100%">
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</body>