<?php
require_once("./connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namareview = $_POST['namareview'];
    $review = $_POST['review'];

    // Insert data ke tabel ulasan
    $qry = $connection->query("INSERT INTO reviews (namareview, review) VALUES ('$namareview', '$review')");
}
?>

<body>
    <!--ISI REVIEW-->
    <div class="Fasilitas font-poppins" id="Fasilitas">
        <div class="judul-halaman">Ulasan</div>
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" class="form-control" name="namareview">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Pesan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="review"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Kirim</button>
        </form>
    </div>
    <!--ISI REVIEW END -->
    <div class="container mt-5">
    <div class="judul-halaman">Testimoni</div>
        <?php
        $qry = $connection->query("select * from reviews order by id_review asc;");
        $no = 0;
        while($row = $qry->fetch_assoc()) {
            $no++;
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . htmlspecialchars($row['namareview']) . "</h5>";
            echo "<p class='card-text'>" . htmlspecialchars($row['review']) . "</p>";
            echo "<p class='card-text'><small class='text-muted'>Posted on " . $row['waktu_dibuat'] . "</small></p>";
            echo "</div>";
            echo "</div>";
        }
        $connection->close();
        ?>
    </div>
</body>
