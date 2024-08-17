<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Administration</title>
    <link rel="icon" type="image/x-icon" href="../galeri/faviconperson.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url("../galeri/cover.png");
            background-size: cover !important;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh !important;
        }
        
        .form-login {
            border-radius: 15px;
            padding: 25px !important;
            background-color: rgba(255,255,255,.7);
        }

        .judul-login {
            font-size: 30px;
            font-weight: 600;
        }

        .form-label {
            font-weight: 600;
        }
        
        .form-control {
            width: 300px;
            padding: 5px;
            font-size: 13px;
            background-color: rgba(255,255,255,.7);
            border: 0px;
            border-radius: 0px;
            border-bottom: 1px solid black;
        }
        
        .icon-person {
            font-size: 120px;
            display: block;
            text-align: center;
        }

        .form-control:focus {
            box-shadow: 0px 0px 6px 2px black;
        }

        .form-check-input[type=checkbox]:checked {
            background-color: black !important;
        }

        .form-check-input[type=checkbox]:focus {
            box-shadow: none;
            border: none;
        }
    </style>
</head>

<body>
<form class="form-login position-absolute top-50 start-50 translate-middle" action="actionlogin.php" method="post">
    <span class="material-symbols-outlined icon-person">account_circle</span>            
    <div class="judul-login text-center">Login</div>
    <br>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" action="actionlogin.php">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="pasw" required>
    </div>
    <button type="submit" class="btn btn-dark button-submit" name="submit">Submit</button>
</form>
</body>
</html>