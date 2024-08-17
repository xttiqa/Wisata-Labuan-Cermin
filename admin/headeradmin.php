<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../galeri/favicon-admin.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labuan Cermin Tours</title>
    <link rel="stylesheet" href="../css/adminstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="container">
    <!--BANNER-->
    <div class="banner-atas">
        <img src="../galeri/logoo.png" alt="..." class="img-thumbnail">
        <div class="col judul-banner font-poppins">
            Web Administrasi
            <br>
            Labuan Cermin Tours
        </div>
    </div>

      <!--NAVBAR-->
      <nav class="navbar navbar-expand-lg navbar-light navbar-css">
        <div class="container-fluid position-relative">
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active px-4 mx-1 text-dark font-poppins" aria-current="page" href="#">Home</a>
                    <a class="nav-link active px-4 mx-1 text-dark font-poppins" aria-current="page" href="#">Set User</a>
                </div>
            </div>
          </div>
      </nav>
      <!--NAVBAR END-->

      <!--MENU-->
      <div class="container menu-konten">
          <div class="row">
              <div class="col-2 bg-dark text-light">
                  <div class="navbar-nav my-4">
                      <a class="px-2 py-1 my-2 nav-link active text-light font-poppins" style="font-size: 14px" aria-current="page" href="datawisata.php">Paket Wisata</a>
                      <a class="px-2 py-1 my-2 nav-link active text-light font-poppins" style="font-size: 14px" aria-current="page" href="datagaleri.php">Galeri</a>
                      <a class="px-2 py-1 my-2 nav-link active text-light font-poppins" style="font-size: 14px" aria-current="page" href="dataulasan.php">Ulasan</a>
                      <a class="px-2 py-1 my-2 nav-link active text-light font-poppins" style="font-size: 14px" aria-current="page" href="datapesanan.php">Data Pemesanan</a>
                      <a href="logout.php">
                          <button type="button" style="width: 100px" class="btn btn-danger my-2 mx-2">Log Out</button>
                      </a>
                    </div>
                </div>
                <div class="col-10 isi-konten"  style="overflow-x: scroll">