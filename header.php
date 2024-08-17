<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="./galeri/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labuan Cermin Tours</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
</head>
<body>
    <!--BANNER-->
    <img src="./galeri/Carousel/cover.png" class="img-fluid" alt="Responsive image">
    <!-- END-->

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-css">
        <div class="container-fluid position-relative">
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if (!isset($_SESSION['username'])): ?>
                <a href="./admin/login.php" class="link-icon">
                    <span class="material-symbols-outlined icon-person">account_circle</span>            
                </a>
            <?php else: ?>
                <a class="nav-link d-sm-flex align-items-sm-center" href="#" style="position: absolute; right: 85px;">
                    <span class="material-symbols-outlined icon-person" style="font-size: 40px !important">account_circle</span>  
                    <strong class="d-none d-sm-block ms-1 text-light font-poppins" style="font-size: 15px !important; margin-left: 5px !important"><?php echo ($_SESSION['username']) ?></strong>
                </a>
                <a href="logoutuser.php" class="position-absolute end-0">
                    <button type="button" style="width: 80px; top: -13px; font-size: 15px" class="btn btn-danger my-2 mx-2">Log Out</button>
                </a>
            <?php endif; ?>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active px-3 mx-2 text-light font-poppins" aria-current="page" href="index.php?p=beranda">Beranda</a>
                    <a class="nav-link active px-3 mx-2 text-light font-poppins" aria-current="page" href="index.php?p=fasilitas">Fasilitas</a>
                    <a class="nav-link active px-3 mx-2 text-light font-poppins" aria-current="page" href="index.php?p=galeri">Galeri</a>
                    <a class="nav-link active px-3 mx-2 text-light font-poppins" aria-current="page" href="index.php?p=paket-wisata">Paket Wisata</a>
                    <a class="nav-link active px-3 mx-2 text-light font-poppins" aria-current="page" href="pemesanan.php">Pemesanan</a>
                    
                    <?php if (!isset($_SESSION['username'])): ?>
                        <a class="nav-link active px-3 mx-2 text-muted font-poppins disabled" aria-current="page" href="daftarpesanan.php">Pesanan</a>
                    <?php else: ?>
                        <a class="nav-link active px-3 mx-2 text-light font-poppins" aria-current="page" href="daftarpesanan.php">Pesanan</a>
                    <?php endif; ?>
                    <a class="nav-link active px-3 mx-2 text-light font-poppins" aria-current="page" href="index.php?p=ulasan">Ulasan</a>
                </div>
            </div>
        </div>
    </nav>
    <!--NAVBAR END-->
</body>
</html>
