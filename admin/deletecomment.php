<?php
include 'connect.php';
?>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql = "DELETE FROM comments WHERE id = $id";
        $qr = mysqli_query($conn, $sql);
        header("location: commentmanager.php");
?>