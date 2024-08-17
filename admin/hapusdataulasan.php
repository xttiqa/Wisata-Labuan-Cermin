<?PHP
require_once("../connection.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $qry2 = $connection->query("select * from reviews where id_review = $id;");
    if ($qry2->num_rows >= 1) {
        $qry = $connection->query("delete from reviews where id_review = $id;");
        if ($qry) {
            header("location:dataulasan.php");
        }
    } else {
        header("location:dataulasan.php?error=contact_not_found");
    }
} else {
    echo "access denied";
}
?>