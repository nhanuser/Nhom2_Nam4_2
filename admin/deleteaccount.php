<?php
include 'connect.php';
?>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql = "DELETE FROM admin WHERE adminID = $id";
        $qr = mysqli_query($conn, $sql);
        header("location: accountmanager.php");
?>