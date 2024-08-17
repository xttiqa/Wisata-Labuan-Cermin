<?php
session_start();
include ("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];        
    $passw = $_POST["pasw"];

    $sql = mysqli_query($connection, "select * from users where (username ='$user' and passw ='$passw')");
    $sesi = mysqli_num_rows($sql);
    if ($sesi == 1) {
        $data_pengguna = mysqli_fetch_array($sql);
        
        $_SESSION['id_users'] = $data_pengguna['id_users'];
        $_SESSION['username'] = $data_pengguna['username'];
        $_SESSION['passw'] = $data_pengguna['passw'];
        $_SESSION['posisi'] = $data_pengguna['posisi'];

        if ($data_pengguna['posisi'] == 'admin') {
            header("Location: ./datawisata.php");
        } else {
            header("Location: ../index.php?p=beranda");
        }
    } else {
        session_destroy();
        echo "<script>alert('Anda Gagal Log In');</script>";
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
    }
} else {
    session_destroy();
    include "login.php";
}
?>
