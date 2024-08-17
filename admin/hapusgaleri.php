<?PHP
require_once("../connection.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $qry2 = $connection->query("select * from galeri where id_galeri = $id;");
    if ($qry2->num_rows >= 1) {
        $qry = $connection->query("delete from galeri where id_galeri = $id;");
        if ($qry) {
            header("location:galeriadmin.php");
        }
    } else {
        header("location:galeriadmin.php?error=contact_not_found");
    }
} else {
    echo "access denied";
}
?>