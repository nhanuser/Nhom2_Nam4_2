<?php
include 'connect.php';
?>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql = "DELETE FROM menu WHERE MenuID = $id";
        $qr = mysqli_query($conn, $sql);
        header("location: index-menu.php");
?>