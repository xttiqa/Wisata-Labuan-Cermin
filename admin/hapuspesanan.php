<?PHP
require_once("../connection.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $qry2 = $connection->query("select * from pemesanan where id_pemesan = $id;");
    if ($qry2->num_rows >= 1) {
        $qry = $connection->query("delete from pemesanan where id_pemesan = $id;");
        if ($qry) {
            header("location:paketwisata.php");
        }
    } else {
        header("location:paketwisata.php?error=contact_not_found");
    }
} else {
    echo "access denied";
}
?>