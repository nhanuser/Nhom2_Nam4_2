<?php
include 'connect.php';
?>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$sql = "DELETE FROM post WHERE postID = $id";
        $qr = mysqli_query($conn, $sql);
        header("location: postmanager.php");
?>