<?php
include 'connect.php';
?>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql = "DELETE FROM mails WHERE id = $id";
        $qr = mysqli_query($conn, $sql);
        header("location: contactmanager.php");
?>